<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelKeranjang extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_keranjang';
    }
    public function get_best_seller($id_produk)
    {
        $this->db->from($this->table);
        $this->db->select_sum('jumlah_pesan');
        $this->db->where('status_item', 'Finish');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->row();
    }

}

/* End of file ModelKeranjang.php */
