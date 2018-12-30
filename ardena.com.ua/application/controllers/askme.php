<?php
class Askme extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function send()
	{
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);

		$this->config->load('site');
		$this->load->helper('security');
		$data = xss_clean($_POST);

		$this->email->from($data['from_email'], $data['from_name']);
		$this->email->to($this->config->item('orders_email'));
		$this->email->subject($this->config->item('from_name') . ': ' . $data['subject']);
		$this->email->message( htmlspecialchars(strip_tags($data['message'])) );

		$this->email->send();
	}
}