<?php
class Feed extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('main_model', 'mm');
    }

    function export_goods()
    {
    	$this->load->config('site');
        $data = array(
        	'title' => $this->config->item('ad_exp_header'),
            'items' => $this->mm->get_exported_goods()
        );
        header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET');
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Headers: Content-Type, *');
        echo $this->load->view('feed/export_goods.php', $data, true);
    }
}