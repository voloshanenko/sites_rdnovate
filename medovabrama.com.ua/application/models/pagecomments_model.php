<?php
class Pagecomments_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function list_comments($offset = 0, $page_id = -1)
	{
		$sql = 'SELECT `pages`.title, `users`.`name` AS `user_name`, `users`.`line` AS `user_line`, `users`.`user_from` AS `user_from`, `page_comments`.*
		FROM `page_comments`
		LEFT JOIN `pages` ON (`page_comments`.page_url = `pages`.url)
		LEFT JOIN `users` ON (`page_comments`.user_id = `users`.id)';
		if($page_id > -1) {$sql .= ' WHERE `pages`.id = '.$page_id;}
		$sql .= ' ORDER BY `page_comments`.`id` DESC LIMIT '.$offset.',50';
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function approve($id)
	{
		$this->db->where('id', $id);
		$this->db->update('page_comments', array(
			'approved' => "1"
		));
	}
	
	function disapprove($id)
	{
		$this->db->where('id', $id);
		$this->db->update('page_comments', array(
			'approved' => "0"
		));
	}
	
	function show_on_main($id)
	{
		$this->db->where('id', $id);
		$this->db->update('page_comments', array(
			'show' => "1"
		));
	}
	
	function hide_on_main($id)
	{
		$this->db->where('id', $id);
		$this->db->update('page_comments', array(
			'show' => "0"
		));
	}
	
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('page_comments');
	}
}