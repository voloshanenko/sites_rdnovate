<?php
class Facts extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->library('pagecomposer');
        $this->load->model('facts_model', 'model');
	}

	function show($id)
	{
        $fact = $this->model->get_fact($id);
		$data = array(
			'meta_title' => $fact['meta_title'] ? $fact['meta_title'] : $fact['title'],
			'meta_keywords' => $fact['keywords'] ? $fact['keywords'] : $fact['meta_title'],
			'meta_description' => $fact['description'] ? $fact['description'] : $fact['meta_title'],
			'css' => array('common', 'front'),
			'js' => array('jquery.min', 'jquery.cookie', 'user'),
			'content' => $fact
		);
		$this->pagecomposer->compose_frontend('facts/item', $data);
	}
}