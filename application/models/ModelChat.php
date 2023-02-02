<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelChat extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_chat';
    }

    public function insert_chat($object)
    {
        $insert = $this->db->insert($this->table, $object);
        return $this->db->insert_id();
    }
    public function get_chat($id)
    {
        $this->db->from($this->table);
        $this->db->join('tb_user', 'tb_chat.id_user = tb_user.id_user');
        $this->db->join('tb_data_diri_user', 'tb_user.username = tb_data_diri_user.username');
        $this->db->where('tb_chat.id_user', $id);
        $this->db->order_by('tb_chat.tanggal_chat', 'desc');
        return $this->db->get()->result();

    }
    public function get_new_chat(Type $var = null)
    {
        $this->db->from($this->table);
        $this->db->select('id_user');
        $this->db->distinct('id_user');
        return $this->db->get()->result();
    }
    public function get_data_user($id)
    {
        $this->db->from('tb_user as a');
        $this->db->select('a.id_user,b.nama,b.alamat,b.no_hp,b.foto');
        $this->db->join('tb_data_diri_user as b', 'a.username = b.username');
        $this->db->where_in('a.id_user', $id);
        return $this->db->get()->result();
    }
    // count message
    public function count_message($id_user)
    {
        $this->db->from($this->table);
        $this->db->where('id_user', $id_user);
        $this->db->where('status_baca', 0);
        return $this->db->count_all_results();
    }
    // use for update status chat
    public function update_status_chat($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('status_baca', 0);
        $this->db->update($this->table, ['status_baca' => 1]);

    }

}

/* End of file ModelChat.php */
