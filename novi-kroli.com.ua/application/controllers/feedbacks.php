<?php
class Feedbacks extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('feedbacks_model', 'model');
		$this->load->library('pagecomposer');
	}
	
	function show($offset = 0)
	{
		$data = array(
			'meta_title' => 'Отзывы о товарах - Администрирование',
			'meta_description' => 'Отзывы о товарах - Администрирование',
			'meta_keywords' => '',
			'page_h1' => 'Отзывы о товарах - Администрирование',
			'content' => '',
			'css' => array('common', 'admin', 'start/jquery-ui'),
			'js' => array('jquery.min', 'jquery-ui', 'admin'),
			'feedbacks' => $this->model->list_feedbacks($offset)
		);
		// Pagination
		$this->load->library('pagination');
		$config['base_url'] = '/admin/items/feedbacks/';
		$config['total_rows'] = $this->db->count_all('goods_comments');
		$config['per_page'] = '50';
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['pagination_links'] = $this->pagination->create_links();
		$this->pagecomposer->compose_page('admin/feedbacks_list', $data);
	}
	
	function grid()
	{
		$param = $_POST['param'];
		$value = $_POST['val'];
		$data = array(
			'feedbacks' => $this->model->list_feedbacks(0, $value)
		);
		echo $this->load->view('admin/feedbacks_clean_list', $data, TRUE);
	}
	
	function show_on_main($id)
	{
		$this->model->show_on_main($id);
		echo "1";
	}
	
	function hide_on_main($id)
	{
		$this->model->hide_on_main($id);
		echo "1";
	}
	
	function approve($id)
	{
		$this->model->approve_feedback($id);
		echo "1";
	}
	
	function disapprove($id)
	{
		$this->model->disapprove_feedback($id);
		echo "1";
	}
	
	function delete($id)
	{
		$this->model->delete_feedback($id);
		echo "1";
	}
}