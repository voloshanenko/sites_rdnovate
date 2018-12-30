<?php
class Facts_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function get_fact($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('facts');
        return $query->row_array();
	}
}