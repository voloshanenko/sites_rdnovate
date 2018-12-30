<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagecomposer
{
	private $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('parser');
	}

	public function compose_frontend($template, $data)
	{
		$data['catalogue_menu'] = $this->gen_catalogue_menu();
		$data['mainmenu'] = $this->gen_mainmenu();
		$data['news_box'] = $this->get_news(5);
		$data['shout'] = $this->get_shout();
		$this->ci->load->model('main_model', 'mmdl');
		$data['scroll_feedbacks'] = $this->ci->mmdl->get_feedbacks(15, FALSE);
		$data['scroll_ads'] = $this->ci->mmdl->get_ads(28, 10);
		$this->ci->parser->parse('assets/front_header', $data);
		$this->ci->parser->parse('assets/page_top', $data);
		$this->ci->parser->parse('assets/left_sidebar', $data);
		$this->ci->parser->parse($template, $data);
		$this->ci->parser->parse('assets/sidebar', $data);
		$this->ci->parser->parse('assets/front_footer', $data);
	}
	
	private function get_shout()
	{
		$this->ci->db->select('id, title, text');
		$this->ci->db->limit(10);
		$q = $this->ci->db->get('facts');
		$facts = $q->result_array();
		shuffle($facts);
		$data['items'] = $facts;
		return $this->ci->load->view('assets/shout', $data, TRUE);
	}

	public function compose_page($path_to_template, $data)
	{
		$this->ci->parser->parse('assets/header', $data);
		$this->ci->parser->parse($path_to_template, $data);
		$this->ci->parser->parse('assets/footer', $data);
	}

	public function just_output($template, $data)
	{
		$this->ci->parser->parse($path_to_template, $data);
	}

	private function get_news()
	{
		$this->ci->db->order_by('ordering');
		$this->ci->db->where('on_mainpage', '1');
		$q = $this->ci->db->get('pages');
		$data['data'] = $q->result_array();
		return $this->ci->load->view('assets/block_news', $data, TRUE);
	}

	private function gen_mainmenu()
	{
		$this->ci->db->order_by('ordering');
		$q = $this->ci->db->get('mainmenu');
		$data['arr'] = $q->result_array();
		return $this->ci->load->view('assets/mainmenu', $data, TRUE);
	}

	private function gen_catalogue_menu()
	{
		$this->ci->db->select('id, url, title, parent_id');
		$this->ci->db->order_by('parent_id');
		$q = $this->ci->db->get('goods_categories');
		$data['cat_menu_arr'] = $q->result_array();
		return $this->ci->load->view('assets/catalogue_menu', $data, TRUE);
	}
}