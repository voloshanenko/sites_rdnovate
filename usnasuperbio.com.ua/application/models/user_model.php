<?php
class User_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function check_admin($data)
	{
		$q = $this->db->get_where('system_admins', array('login' => $data['login'], 'password' => md5($data['password'])));
		if( $q->num_rows() > 0 )
		{
			$r = $q->result_array();
			if( $r[0]['locked'] == '0' )
			{ 
				$this->session->set_userdata(array(
					'real_name' => 'Администратор',
					'email' => 'admin@usnasuperbio.com.ua',
					'id' => $r[0]['id'],
					'r' => $r[0]['role'],
				));
				return 'A';
			}
			else 
			{
				return '0';
			}
		}
		return '0';
	}

	public function check_user_by_password($data)
	{
		$query = $this->db->get_where('users', array('login' => $data['login'], 'password' => md5($data['password'])));
		if($query->num_rows() > 0)
		{
			$user = $query->row_array();
			if($user['activated'] == 1)
			{
				return $user;
			}
		}
		else
		{
			return NULL;
		}
	}

	public function add_user($data)
	{
		$data['activated'] = 1;
		$data['reg_date'] = date('Y-m-d');
        $this->load->helper('security');
        $data = xss_clean($data);
		$this->db->insert('users', $data);

		$query = $this->db->get_where('users', array('login' => $data['login'], 'password' => $data['password']));
		$user = $query->row_array();
		return $user['id'];
	}

	public function user_exists($data)
	{
		$query = $this->db->get_where('users', array('login' => $data['login'], 'email' => $data['email']));
		return ($query->num_rows() > 0);
	}

	public function update_user($data)
	{
		if( ! $data['password'])
		{
			unset($data['password']);
		}
		else
		{
			$data['password'] = md5($data['password']);
		}
		$this->db->where('id', $data['id']);
		unset($data['id']);
		$this->db->update('users', $data);
		$this->session->set_userdata('real_name', $data['name']);
	}

	public function get_user($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row_array();
	}

	public function get_users_orders($id)
	{
		$i = 0;
		$result = array();
		$sql = 'select * from orders where `user` like \'%id%'.$id.'%\' ORDER BY `id` DESC';
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $order)
		{
			$i++;
			$order['products'] = unserialize($order['products']);
			$result[$i] = $order;
		}
		return $result;
	}

	public function get_user_by_email($email)
	{
		$query = $this->db->get_where('users', array('email' => $email));
		if( $query->num_rows() > 0 )
			return $query->row_array();
		else
			return -1;
	}

	public function update_password($uid, $pwd)
	{
		$this->db->where('id', $uid);
		$this->db->update('users', array(
			'password' => md5($pwd)
		));
	}
}