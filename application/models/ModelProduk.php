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
    public function get_produk_front(Type $var = null)
    {
        $this->db->from($this->table);
        $this->db->join('tb_foto_produk', 'tb_produk.id_produk = tb_foto_produk.id_produk', 'left');
        $this->db->order_by('tb_produk.id_produk', 'desc');
        $this->db->where('tb_foto_produk.foto_unggulan', 1);
        $this->db->where('nama_produk !=', '-');
        return $this->db->get()->result_array();
    }
}

/* End of file ModelProduk.php */
