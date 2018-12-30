<?php
class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagecomposer');
		$this->load->model('page_model');
	}

	public function item($url)
	{
		$page = $this->page_model->item($url);
		$data = array(
			'meta_title' => $page['title'],
			'meta_keywords' => $page['keywords'],
			'meta_description' => $page['description'],
			'css' => array('common', 'front'),
			'js' => array('jquery.min', 'jquery.cookie', 'user'),
			'content' => $page,
			'feedbacks' => $this->page_model->get_comments($url)
		);
		$this->pagecomposer->compose_frontend('page/item', $data);
	}

	public function items($id, $page = 0)
	{
		$this->load->config('site'); 
		$limit = (int)$this->config->item('number_of_products_on_page');
		
		$category = $this->page_model->category($id, $page, $limit);
		
		$this->load->library('pagination');
		$config['base_url'] = '/pages/'.$this->uri->segment(2).'/';
		$config['total_rows'] = $this->page_model->get_pages_number($id);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		
		$data = array(
			'meta_title' => $category['category']['caption'],
			'meta_keywords' => $category['category']['caption'],
			'meta_description' => $category['category']['caption'],
			'css' => array('common', 'front'),
			'js' => array('jquery.min', 'jquery.cookie', 'user'),
			'content' => $category, 
			'pagination_links' => $this->pagination->create_links()
		);
		$this->pagecomposer->compose_frontend('page/items', $data);
	}
	
	public function listbytag($tag)
	{
		$this->load->helper('security');
		$tag = xss_clean($tag);
		$category = $this->page_model->tag($tag);
		$data = array(
			'meta_title' => $tag,
			'meta_keywords' => $tag,
			'meta_description' => $tag,
			'css' => array('common', 'front'),
			'js' => array('jquery.min', 'jquery.cookie', 'user'),
			'content' => $category,
			'tag' => $tag
		);
		$this->pagecomposer->compose_frontend('page/bytag', $data);
	}
	
	function leave_comment()
	{
		$this->load->helper('security');
		$data  = xss_clean($_POST);
		
		$page = $this->page_model->item( $data['page_url'] );
		
		$this->page_model->add_comment($data);
		$this->send_comment_email($data, $page);
		echo "1";
	}
	
	function make_search()
	{
		$this->load->helper('security');
		$data  = xss_clean($_POST);
		
		$data = array(
			'results' => $this->page_model->make_search($data['word'])
		);
		
		echo $this->load->view('page/search_results', $data, TRUE);
	}
	
	function save_comment($id)
	{
		$this->load->helper('security');
		$data = xss_clean($_POST);
		echo $this->page_model->update_comment($id, $data['text']);
	}
	
	private function send_comment_email($data, $page)
	{
		$this->config->load('site');
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);

		$this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
        $this->email->to($this->config->item('spam_email'));

		$this->email->subject('Комментарий к статье '.$page['title']); 
		$this->email->message("<p>Статья: $page[title]</p><p>".$data['text']."</p>");

		$this->email->send();
	}
}