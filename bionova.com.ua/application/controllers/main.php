<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagecomposer');
		$this->load->model('main_model', 'mm');
	}

	public function index()
	{
		$this->config->load('site');
		$data = array(
			'meta_title' => $this->config->item('front_title'),
			'meta_keywords' => $this->config->item('front_keywords'),
			'meta_description' => $this->config->item('front_description'),
			'page_h1' => "ЮснаСуперБио",
			'css' => array('common', 'front', 'start/jquery-ui'),
			'js' => array('jquery.min', 'jquery-ui', 'jquery.cookie', 'user'),
			'content' => array(
				'articles' => $this->mm->get_main_page_articles()
			)
		);
		$items_per_tab = $this->config->item('items_per_tab');
		$data['new'] = $this->get_new_goods($items_per_tab);
		$data['recommended'] = $this->get_recommended_goods($items_per_tab);
		$data['sale'] = $this->get_sale_goods($items_per_tab);
		$data['discounted'] = $this->get_discounted_goods($items_per_tab);
		$data['marteking'] = $this->get_marteking_goods($items_per_tab);
		$data['feedbacks'] = $this->get_feedbacks($items_per_tab);
		$this->pagecomposer->compose_frontend('main/main_page', $data);
	}

	private function get_feedbacks($num)
	{
		return $this->load->view('main/feedbacks', array('data' => $this->mm->get_feedbacks($num)), TRUE);
	}

	private function get_new_goods($num)
	{
		return $this->load->view('main/tab_goods', array('data' => $this->mm->get_new_goods($num)), TRUE);
	}

	private function get_recommended_goods($num)
	{
		return $this->load->view('main/tab_goods', array('data' => $this->mm->get_recommended_goods($num)), TRUE);
	}

	private function get_discounted_goods($num)
	{
		return $this->load->view('main/tab_goods', array('data' => $this->mm->get_discounted_goods($num)), TRUE);
	}

	private function get_sale_goods($num)
	{
		return $this->load->view('main/tab_goods', array('data' => $this->mm->get_sale_goods($num)), TRUE);
	}

	private function get_marteking_goods($num)
	{
		return $this->load->view('main/tab_goods', array('data' => $this->mm->get_marteking_goods($num)), TRUE);
	}

}