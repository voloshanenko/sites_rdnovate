<?php
class Orders extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('orders_model', 'om');
		$this->load->library('pagecomposer');
	}

	public function show($offset = 0)
	{
		$data = array(
			'meta_title' => 'Заказы - Администрирование',
			'meta_description' => 'Заказы - Администрирование',
			'meta_keywords' => '',
			'page_h1' => 'Заказы - Администрирование',
			'content' => '',
			'css' => array('common', 'admin'),
			'js' => array('jquery.min', 'jquery.cookie', 'admin'),
			'orders' => $this->om->list_orders($offset)
		);
		// Pagination
		$this->load->library('pagination');
		$config['base_url'] = '/admin/items/orders/';
		$config['total_rows'] = $this->db->count_all('orders');
		$config['per_page'] = '50';
		$config['uri_segment'] = 4;
		$config['num_links'] = 20;
		$this->pagination->initialize($config);
		$data['pagination_links'] = $this->pagination->create_links();
		$this->pagecomposer->compose_page('admin/orders_list', $data);
	}

	function set_status()
	{
		$this->om->set_order_status($_POST['id'], $_POST['status']);
		echo "Готово!";
	}

	function del($id)
	{
		$this->om->delete_order($id);
		redirect('/admin/items/orders/0/');
	}
}