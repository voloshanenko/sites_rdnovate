<?php
class Page_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function item($url)
	{
		$query = $this->db->get_where('pages', array('url'=>$url));
		return $query->row_array();
	}
	
	public function category($cid, $offset, $limit)
	{
		$cq = $this->db->get_where('pages_categories', array('id' => $cid));
		$result['category'] = $cq->row_array();
		
		$pq = $this->db->get_where('pages', array('category_id' => $cid), $limit, $offset);
		$result['pages'] = $pq->result_array();
		
		return $result;
	}
	
	public function tag($tag)
	{
		$this->db->like('tags',$tag,'both');
		$pq = $this->db->get('pages');
		$result['pages'] = $pq->result_array();
		
		return $result;
	}
	
	function get_comments($url)
	{
		$sql = "SELECT `page_comments`.* , `users`.`name` AS `user_name`, `users`.`line` AS `user_line`, `users`.`user_from` AS `user_from` 
		FROM `page_comments`
			LEFT JOIN `users` ON (`page_comments`.user_id = `users`.id)
		WHERE
			`page_comments`.approved=1 AND `page_comments`.page_url='$url'
		ORDER BY `page_comments`.`id` DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function add_comment($data)
	{
		$data['date'] = date('Y-m-d H:i');
		$data['approved'] = 0;
		$data['show'] = 0;
		$data['text'] = trim(htmlspecialchars(strip_tags($data['text'])));
		$this->db->insert('page_comments', $data);
	}
	
	function make_search($word)
	{
		$this->db->like('title', $word, 'both');
		$this->db->or_like('intro', $word, 'both');
		//$this->db->or_like('fulltext', $word, 'both');
		$query = $this->db->get('pages');
		return $query->result_array();
	}
	
	function get_pages_number($cid)
	{
		$pq = $this->db->get_where('pages', array('category_id' => $cid));
		return $pq->num_rows();
	}
	
	function update_comment($id, $text)
	{
		$this->db->where('id', $id);
		$this->db->update('page_comments', array(
			'text' => $text
		));
		echo "Saved";
	}
}