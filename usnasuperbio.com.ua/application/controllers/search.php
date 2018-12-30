<?php
class Search extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('search_model', 'mdl');
		$this->load->library('pagecomposer');
	}

	public function byword()
	{
		$this->load->helper('security');
		$input = xss_clean($_POST);
		$symbols = array("'", '"', '%', '`', '~', '!', '#', '$', '^', '&', '*', '[', ']');
		$input = str_replace($symbols, "", $input);
		$data = array(
			'meta_title' => "Поиск",
			'meta_keywords' => "Поиск",
			'meta_description' => "Поиск",
			'page_h1' => $_POST['searchword']." - Поиск - ЮснаСуперБио",
			'css' => array('common', 'front'),
			'js' => array('jquery.min', 'jquery.cookie', 'user'),
			'content' => $this->mdl->find_goods_by_word($input['searchword']),
			'searchword' => $input['searchword']
		);
		$this->pagecomposer->compose_frontend('search/results', $data);
	}

	public function byletter($letter)
	{
		$this->load->helper('security');
		$input = xss_clean($letter);

		$data = array(
			'meta_title' => "Поиск",
			'meta_keywords' => "Поиск",
			'meta_description' => "Поиск",
			'page_h1' => $input." - Поиск - ЮснаСуперБио",
			'css' => array('common', 'front'),
			'js' => array('jquery.min', 'jquery.cookie', 'user'),
			'content' => $this->mdl->find_goods_by_letter($input),
			'searchword' => ''
		);
		$this->pagecomposer->compose_frontend('search/results', $data);
	}

	public function tag($tag)
	{
		$this->load->helper('security');
		$input = urldecode(xss_clean($tag));

		$data = array(
			'meta_title' => $input." - поиск по тегу",
			'meta_keywords' => $input." - поиск по тегу",
			'meta_description' => $input." - поиск по тегу",
			'page_h1' => $input." - Поиск - ЮснаСуперБио",
			'css' => array('common', 'front'),
			'js' => array('jquery.min', 'jquery.cookie', 'user'),
			'content' => $this->mdl->search_by_tag($input),
			'searchword' => $input
		);
		$this->pagecomposer->compose_frontend('search/results', $data);

	}
}