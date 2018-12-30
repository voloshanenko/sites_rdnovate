<?php
class Orders_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function list_orders($offset)
	{
		$i = 0;
		$result = array();
		$this->db->order_by('id', 'desc');
		$this->db->limit(50, $offset);
		$query = $this->db->get('orders');
		$query_result = $query->result_array();
		foreach ($query_result as $order)
		{
			$i++;
			$order['products'] = unserialize($order['products']);
			$order['user'] = unserialize($order['user']);
			$result[$i] = $order;
		}
		return $result;
	}

	function set_order_status($id, $status)
	{
		$this->db->where('id', $id);
		$this->db->update('orders', array(
			'status' => $status
		));
	}

	function delete_order($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('orders');
	}
}