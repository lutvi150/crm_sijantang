<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_user';
    }

    public function get_data_user()
    {
        $user = $this->get_all_user();
        if ($user) {
            foreach ($user as $key => $value) {
                $jumlah_order = $this->count_user_order($value->username, 'jumlah_pesan')->jumlah_pesan;
                $total_belanja = $this->count_user_order($value->username, 'total_harga')->total_harga;
                $resultUser[] = (object) [
                    'id_user' => $value->id_user,
                    'username' => $value->username,
                    'nama' => $value->nama,
                    'alamat' => $value->alamat,
                    'no_hp' => $value->no_hp,
                    'tgl_registrasi' => $value->tgl_registrasi,
                    'foto' => $value->foto,
                    'jumlah_order' => $jumlah_order,
                    'total_belanja' => $total_belanja,
                ];
            }
        } else {
            $resultUser[] = null;
        }
        return $resultUser;
    }
    public function get_all_user(Type $var = null)
    {
        $this->db->from($this->table . " as a");
        $this->db->where('a.status_data', 'Sudah');
        $this->db->where('a.level', 'pelanggan');
        $this->db->join('tb_data_diri_user as b', 'a.username=b.username');
        $this->db->select('a.username,a.tgl_registrasi,a.id_user,b.nama,b.alamat,b.no_hp,b.foto');
        return $this->db->get()->result();
    }
    // count order user
    public function count_user_order($username, $sum)
    {
        $this->db->from('tb_keranjang');
        $this->db->select_sum($sum);
        $this->db->where('status_item', 'Finish');
        $this->db->where('id_user', $username);
        return $this->db->get()->row();
    }

}

/* End of file ModelUser.php */
