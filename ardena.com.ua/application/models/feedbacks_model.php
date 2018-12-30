<?php
class Feedbacks_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function list_feedbacks($offset = 0, $good_id = -1)
	{
		$sql = 'SELECT `goods`.title, `users`.`name` AS `user_name`, `users`.`line` AS `user_line`, `users`.`user_from` AS `user_from`, `goods_comments`.*
		FROM `goods_comments`
		LEFT JOIN `goods` ON (`goods_comments`.good_id = `goods`.id)
		LEFT JOIN `users` ON (`goods_comments`.user_id = `users`.id)';
		if($good_id > -1) {$sql .= ' WHERE `goods`.id = '.$good_id;}
		$sql .= ' ORDER BY `goods_comments`.`id` DESC LIMIT '.$offset.',50';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function approve_feedback($id)
	{
		$this->db->where('id', $id);
		$this->db->update('goods_comments', array(
			'approved' => "1"
		));
	}
	
	function disapprove_feedback($id)
	{
		$this->db->where('id', $id);
		$this->db->update('goods_comments', array(
			'approved' => "0"
		));
	}
	
	function show_on_main($id)
	{
		$this->db->where('id', $id);
		$this->db->update('goods_comments', array(
			'show' => "1"
		));
	}
	
	function hide_on_main($id)
	{
		$this->db->where('id', $id);
		$this->db->update('goods_comments', array(
			'show' => "0"
		));
	}
	
	function delete_feedback($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('goods_comments');
	}
}