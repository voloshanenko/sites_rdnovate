<?php
class Mycart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mycart_model', 'mcm');
		$this->load->library('pagecomposer');
	}

	public function index()
	{
		$data = array(
			'meta_title' => 'Корзина',
			'meta_keywords' => 'Корзина',
			'meta_description' => 'Корзина',
			'page_h1' => 'Корзина',
			'css' => array('common', 'front'),
			'js' => array('jquery.min', 'jquery.cookie', 'user'),
			'auth' => $this->session->userdata('id'),
			'user' => ($this->session->userdata('id'))?$this->mcm->get_user($this->session->userdata('id')):NUll
		);
		$this->pagecomposer->compose_frontend('mycart/cart_page', $data);
	}

	public function add()
	{
		$product = $this->mcm->get_good_info($_POST['sku'], TRUE);
		$item = array(
			'id' => $product['url'],
			'qty' => $_POST['qty'],
			'price' => $product['dc_price'] > 0 ? $product['dc_price'] : $product['price'],
			'name' => $product['title'],
			'pic' => $product['image'],
			'code' => $product['id']
		);
		$this->cart->insert($item);
		echo $this->load->view('mycart/small_cart', array('mycart' => $this->cart->contents()), TRUE);
	}

	public function remove()
	{
		$data = array(
			'rowid' => $_POST['id'],
			'qty'   => 0
		);
		$this->cart->update($data);
		echo $this->load->view('mycart/small_cart', array('mycart' => $this->cart->contents()), TRUE);
	}

	public function rem($id)
	{
		$data = array(
			'rowid' => $id,
			'qty'   => 0
		);
		$this->cart->update($data);
		redirect('/mycart');
	}

	public function update()
	{
		$this->cart->update($_POST);
		redirect('mycart');
	}

	public function checkout()
	{
		$this->load->helper('security');
		$data = xss_clean($_POST);
		
		$user = $this->mcm->get_user($this->session->userdata('id'));

		$order_id = $this->put_order_to_db($user, urldecode($data['comments']), $data['delivery'], $data['payment']);

		$this->send_email_to_user($user, $order_id, urldecode($data['comments']), $data['delivery'], $data['payment']);
		$this->send_email_to_admin($user, $order_id, urldecode($data['comments']), $data['delivery'], $data['payment']);

		$this->cart->destroy();
		echo '1';
	}

	public function checkout_confirm()
	{
		$page_data = array(
			'meta_title' => 'Спасибо за заказ!',
			'meta_keywords' => 'Спасибо за заказ!',
			'meta_description' => 'Спасибо за заказ!',
			'page_h1' => 'Спасибо, Ваш заказ принят!',
			'css' => array('common', 'front'),
			'js' => array('jquery.min', 'jquery.cookie', 'user')
		);
		$this->pagecomposer->compose_frontend('mycart/checkout_confirm', $page_data);
	}

	private function put_order_to_db($user, $cmnts, $delivery, $payment)
	{
		$products = serialize($this->cart->contents());
		$user = serialize($user);
		
		$this->config->load('site');
		
		$deliverys = explode(';', $this->config->item('delivery_variants'));
		$dv = explode('=', $deliverys[$delivery]);
		
		$payments =  explode(';', $this->config->item('payments_variants'));
		$pv = explode('=', $payments[$payment]);

		return $this->mcm->save_order(array(
			'user' => $user,
			'products' => $products,
			'date' => date('Y-m-d h:i:s'),
			'status' => 0,
			'summ' => $this->cart->total(),
			'comments' => htmlspecialchars(strip_tags($cmnts)),
			'delivery' => $dv[0] . (($dv[1]=="0") ? "" : " (".$dv[1]." грн)"),
			'payment' => $pv[0] . (($pv[1]=="0") ? "" : " (".$pv[1]." грн)")
		));
	}

	public function bill($order_id)
	{
		$raw = $this->mcm->get_order_by_id($order_id);
		$order = array(
			'number' => $order_id,
			'user' => unserialize($raw['user']),
			'products' => unserialize($raw['products'])
		);
		echo $this->load->view('mycart/raw_bill',$order,TRUE);
	}

	private function send_email_to_user($user, $order_id, $c, $delivery, $payment)
	{
		$this->config->load('site');
		
		$deliverys = explode(';', $this->config->item('delivery_variants'));
		$dv = explode('=', $deliverys[$delivery]);
		
		$payments =  explode(';', $this->config->item('payments_variants'));
		$pv = explode('=', $payments[$payment]);
		
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);

		$this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
		$this->email->to($user['email']);

		$this->email->subject($this->config->item('from_name').": Ваш заказ № $order_id (от " . date('d.m.Y') . ")");
		$this->email->message($this->load->view('mycart/checkout_letter', array(
			'items' => $this->cart->contents(),
			'total' => $this->cart->total(),
			'id' => $order_id,
			'comments' => $c,
			'user' => $user,
			'delivery' => $dv[0] . (($dv[1]=="0") ? "" : " (".$dv[1]." грн)"),
			'payment' => $pv[0] . (($pv[1]=="0") ? "" : " (".$pv[1]." грн)")
		), TRUE));

		$this->email->send();
	}

	private function send_email_to_admin($user, $order_id, $c, $delivery, $payment)
	{
		$this->config->load('site');
		
		$deliverys = explode(';', $this->config->item('delivery_variants'));
		$dv = explode('=', $deliverys[$delivery]);
		
		$payments =  explode(';', $this->config->item('payments_variants'));
		$pv = explode('=', $payments[$payment]);
		
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);

		$this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
		$this->email->to($this->config->item('orders_email'));

		$this->email->subject($this->config->item('from_name').": заказ № $order_id (от " . date('d.m.Y') . ")");
		$this->email->message($this->load->view('mycart/checkout_letter', array(
			'items' => $this->cart->contents(),
			'total' => $this->cart->total(),
			'id' => $order_id,
			'comments' => $c,
			'user' => $user,
			'delivery' => $dv[0] . (($dv[1]=="0") ? "" : " (".$dv[1]." грн)"),
			'payment' => $pv[0] . (($pv[1]=="0") ? "" : " (".$pv[1]." грн)"),
            'letter_end' => $this->get_contents('legal')
		), TRUE));

		$this->email->send();
	}

    private function get_contents($file)
    {
        $filename = getcwd().'/textblocks/'.$file.'.php';
        return file_get_contents($filename);
    }
}