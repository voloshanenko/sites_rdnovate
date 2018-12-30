<?php
class Mycart_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function get_order_by_id($id)
	{
		$this->db->where('id', $id);
		$q = $this->db->get('orders');
		return $q->result_array();
	}

	function get_good_info($sku)
	{
		$url = substr($sku, strlen("qty_"));
		$info = $this->db->get_where('goods', array('url' => $url));
		return $info->row_array();
	}

	function check_user($data)
	{
		$q = $this->db->get_where('users', array('login' => $data['login'], 'password' => md5($data['password'])));
		if($q->num_rows() > 0)
		{
			$user = $q->row_array();
			return $user;
		}
		else
		{
			$data['password'] = md5($data['password']);
			$data['activated'] = 1;
			$this->db->insert('users', $data);
			$q = $this->db->get_where('users', array('login' => $data['login'], 'password' => $data['password']));
			$user = $q->row_array();
			return $user;
		}
	}

	function get_user($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row_array();
	}

	function save_order($data)
	{
		$this->db->insert('orders', $data);
		return $this->db->insert_id();
	}
}