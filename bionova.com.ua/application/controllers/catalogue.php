<?php
class Catalogue extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagecomposer');
		$this->load->model('catalogue_model', 'cm');
	}

	function show_category($url, $page = 0)
	{
		if( $this->session->userdata('fc') )
		{
			$cat = $this->cm->get_category_by_url($url);
			if($cat['id'] != $this->session->userdata('fc'))
			{
				$this->session->unset_userdata(array('fv' => '', 'fc' => ''));
			}
		}
		
		$this->load->config('site'); 
		$limit = (int)$this->config->item('number_of_products_on_page');
		$cat_data = $this->cm->get_category_contents($url, $page, $limit);

		$this->load->library('pagination');
		$config['base_url'] = '/'.$this->uri->segment(1).'/';
		$config['total_rows'] = $this->cm->get_items_count($url);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 2;
		$config['num_links'] = 20;
		$this->pagination->initialize($config);

		$data = array(
			'meta_title' => $cat_data['category']['title'],
			'meta_keywords' => $cat_data['category']['keywords'],
			'meta_description' => $cat_data['category']['description'],
			'page_h1' => $cat_data['category']['title'],
			'css' => array('common', 'front'),
			'js' => array('jquery.min', 'jquery.cookie', 'user'),
			'content' => $cat_data,
			'vendors' => $this->cm->get_vendors($url),
			'path' => $this->cm->get_parents($cat_data['category']['id']),
			'pagination_links' => $this->pagination->create_links()
		);
		$this->pagecomposer->compose_frontend('catalogue/category', $data);
	}

	function show_item($url)
	{
		$content['item'] = $this->cm->get_item_info($url);
		$content['same'] = $this->cm->get_other_items_from_cat($content['item']['category_id'], $content['item']['url']);
		$content['path'] = $this->cm->get_parents($content['item']['category_id']);
		$data = array(
			'meta_title' => $content['item']['title'],
			'meta_keywords' => $content['item']['keywords'],
			'meta_description' => $content['item']['meta_description'],
			'page_h1' => $content['item']['title'],
			'css' => array('common', 'front', 'start/jquery-ui'),
			'js' => array('jquery.min', 'jquery-ui', 'jquery.cookie', 'user'),
			'content' => $content,
			'feedbacks' => $this->cm->get_feedbacks($url)
		);
		$this->pagecomposer->compose_frontend('catalogue/item', $data);
	}

	function sort($col = '', $ord = 'DESC', $cid)
	{
		$this->session->unset_userdata(array('col' => '', 'ord' => ''));
		$this->session->set_userdata('col', $col);
		$this->session->set_userdata('ord', $ord);
		
		$cat = $this->cm->get_category_by_id($cid);
		redirect($cat['url']);
	}

	function filter($vid = -1, $cid = -1)
	{
		$this->session->unset_userdata(array('fv' => '', 'fc' => ''));
		$this->session->set_userdata('fv', $vid);
		$this->session->set_userdata('fc', $cid);
		
		$cat = $this->cm->get_category_by_id($cid);
		redirect($cat['url']);
	}

	function leave_comment()
	{
		$this->load->helper('security');
		$data  = xss_clean($_POST);
		
		$item = $this->cm->get_item_by_id($data['good_id']);
		
		$this->cm->add_comment($data);
		$this->send_comment_email($data, $item);
		echo "1";
	}
	
	function save_comment($id)
	{
		$this->load->helper('security');
		$data  = xss_clean($_POST);
		$this->cm->update_comment($id, $data['text']);
		echo "1";
	}
	
	private function send_comment_email($data, $item)
	{
		$this->config->load('site');
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);

		$this->email->from('robot@usnasuperbio.com.ua', 'UsnaSuperBio mail robot');
		$this->email->to($this->config->item('spam_email'));

		$this->email->subject('Комментарий к товару '.$item['title']); 
		$this->email->message("<p>Товар: $item[title]</p><p>".$data['text']."</p>");

		$this->email->send();
	}
}