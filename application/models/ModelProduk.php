<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelProduk extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->table = 'tb_produk';
	}

	public function get_produk(Type $var = null)
	{
		$this->db->from($this->table);
		$this->db->order_by('id_produk', 'desc');
		$this->db->where('nama_produk !=', '-');
		return $this->db->get()->result();
	}
}
                        
/* End of file ModelProduk.php */
