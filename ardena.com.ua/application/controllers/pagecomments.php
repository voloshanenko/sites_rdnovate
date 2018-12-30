<?php
class Pagecomments extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pagecomments_model', 'model');
		$this->load->library('pagecomposer');
	}
	
	function show($offset = 0)
	{
		$data = array(
			'meta_title' => 'Комментарии к статьям - Администрирование',
			'meta_description' => 'Комментарии к статьям - Администрирование',
			'meta_keywords' => '',
			'page_h1' => 'Комментарии к статьям - Администрирование',
			'content' => '',
			'css' => array('common', 'admin', 'start/jquery-ui'),
			'js' => array('jquery.min', 'jquery-ui', 'admin'),
			'feedbacks' => $this->model->list_comments($offset)
		);
		// Pagination
		$this->load->library('pagination');
		$config['base_url'] = '/admin/items/pagecomments/';
		$config['total_rows'] = $this->db->count_all('page_comments');
		$config['per_page'] = '50';
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['pagination_links'] = $this->pagination->create_links();
		$this->pagecomposer->compose_page('admin/pagecomments_list', $data);
	}
	
	function grid()
	{
		$param = $_POST['param'];
		$value = $_POST['val'];
		$data = array(
			'feedbacks' => $this->model->list_comments(0, $value)
		);
		echo $this->load->view('admin/pagecomments_clean_list', $data, TRUE);
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
		$this->model->approve($id);
		echo "1";
	}
	
	function disapprove($id)
	{
		$this->model->disapprove($id);
		echo "1";
	}
	
	function delete($id)
	{
		$this->model->delete($id);
		echo "1";
	}
}