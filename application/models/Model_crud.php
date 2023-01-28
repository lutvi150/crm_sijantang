<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_crud extends CI_Model
{
	public function insertData($table, $object)
	{
		$this->db->insert($table, $object);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function findData($table, $reference, $id)
	{
		$this->db->from($table);
		$this->db->where($reference, $id);
		return $this->db->get();
	}
	public function deleteData($table, $reference, $id)
	{
		$this->db->where($reference, $id);
		$this->db->delete($table);
	}
	public function updateData($table, $reference, $id, $object)
	{
		$this->db->where($reference, $id);
		$this->db->update($table, $object);
	}
	public function insertBacth($table, $object)
	{
		$this->db->insert_batch($table, $object);
	}
	public function getData($table, $reference, $order)
	{
		$this->db->from($table);
		$this->db->order_by($reference, $order);
		return $this->db->get()->result();
	}
}

/* End of file Model.php */
