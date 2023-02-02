<?php
class Model extends CI_Model
{
    // perintah untuk membuat nomor otomatis
    public function nomor_otomatis()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');
        $a = $this->db->query("SELECT MAX(RIGHT(nomor_transaksi,4)) AS no_max FROM tb_transaksi WHERE tgl_transaksi='$tanggal'");
        $no = "";
        if ($a->num_rows() > 0) {
            foreach ($a->result() as $n) {
                $tmp = ((int) $n->no_max) + 1;
                $no = sprintf("%04s", $tmp);
            }
        } else {
            $no = "0001";
        }
        return date('dmY') . $no;
    }
    public function nomor_bukti_bayar_otomatis()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');
        $a = $this->db->query("SELECT MAX(RIGHT(id_bukti_bayar,4)) AS no_max FROM tb_bukti_bayar WHERE tgl_upload='$tanggal'");
        $no = "";
        if ($a->num_rows() > 0) {
            foreach ($a->result() as $n) {
                $tmp = ((int) $n->no_max) + 1;
                $no = sprintf("%04s", $tmp);
            }
        } else {
            $no = "0001";
        }
        return 'BB' . date('dmY') . $no;
    }
    // mengambil data
    public function get_data($tabel, $order_reference, $order)
    {
        $this->db->order_by($order_reference, $order);
        return $this->db->get($tabel);
    }
    // get data with limit
    public function get_data_limit($table, $limit, $order_reference, $order)
    {
        $this->db->order_by($order_reference, $order);
        return $this->db->get($table, $limit);
    }
    // untuk update data di database
    public function update_data($table, $id_reference, $referensi, $object)
    {
        $this->db->where($id_reference, $referensi);
        $this->db->update($table, $object);
    }
    // perintah simpan data
    public function create_data($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    // perintah mencari data
    public function find_data($tabel, $id_tabel, $id)
    {
        $this->db->where($id_tabel, $id);
        return $this->db->get($tabel);
    }
    public function hitung_database($tabel)
    {
        return $this->db->get($tabel);
    }
    public function check_account($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('tb_user');

    }
    public function update($password_lama, $data)
    {
        $this->db->where('password', $password_lama);
        $this->db->update('tb_user', $data);

    }
    // for delete personil data
    public function delete_data($table, $id_reference, $referensi)
    {
        $this->db->where($id_reference, $referensi);
        $this->db->delete($table);
    }
    // model get data user
    public function get_data_user()
    {
        $this->db->from('tb_user');
        $this->db->join('tb_data_diri_user', 'tb_data_diri_user.username = tb_user.username');
        $this->db->where('tb_user.level', 'pelanggan');
        return $this->db->get();

    }
    // model get data user
    public function get_data_user_per($id)
    {
        $this->db->from('tb_user');
        $this->db->join('tb_data_diri_user', 'tb_data_diri_user.username = tb_user.username');
        $this->db->where('tb_user.level', 'pelanggan');
        $this->db->where('tgl_registrasi', $id);

        return $this->db->get();

    }
    // tambahan fungsi
    public function ambil_data_user($username)
    {
        $this->db->from('tb_user');
        $this->db->join('tb_data_diri_user', 'tb_data_diri_user.username = tb_user.username');
        $this->db->where('tb_user.username', $username);

        return $this->db->get();
    }
    // data keranjang
    public function data_keranjang($id)
    {
        $this->db->from('tb_keranjang');
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_keranjang.id_produk');
        $this->db->join('tb_foto_produk', 'tb_produk.id_produk = tb_foto_produk.id_produk', 'left');
        $this->db->order_by('tb_produk.id_produk', 'desc');
        $this->db->where('tb_foto_produk.foto_unggulan', 1);
        $this->db->where('id_user', $id);
        $this->db->where('status_item', 'Draf');
        $this->db->order_by('id_keranjang', 'desc');
        return $this->db->get();
    }
    public function transaksi()
    {
        $this->db->from('tb_transaksi');
        $this->db->join('tb_user', 'tb_user.username = tb_transaksi.id_user');
        $this->db->join('tb_data_diri_user', 'tb_data_diri_user.username = tb_user.username');

        return $this->db->get();
    }
    public function detail_transaksi($id)
    {
        $this->db->from('tb_transaksi');
        $this->db->where('nomor_transaksi', $id);
        $this->db->join('tb_user', 'tb_user.username = tb_transaksi.id_user');
        $this->db->join('tb_data_diri_user', 'tb_data_diri_user.username = tb_user.username');
        return $this->db->get();
    }
    public function detail_barang_dipesan($id)
    {
        $this->db->from('tb_keranjang');
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_keranjang.id_produk');
        $this->db->where('nomor_transaksi', $id);
        $this->db->order_by('id_keranjang', 'desc');
        return $this->db->get();
    }
    public function transaksi_pertahun($tahun, $status)
    {
        $this->db->from('tb_transaksi');
        $this->db->join('tb_user', 'tb_user.username = tb_transaksi.id_user');
        $this->db->join('tb_data_diri_user', 'tb_data_diri_user.username = tb_user.username');
        if ($status == 'pertahun') {
            $this->db->where('SUBSTRING(tb_transaksi.tgl_transaksi,7,4)', $tahun);
        } else if ($status == 'bulan') {
            $this->db->where('SUBSTRING(tb_transaksi.tgl_transaksi,4,7)', $tahun);
        } elseif ($status == 'semua') {

        }
        return $this->db->get();
    }
    public function jml_tran_proses($id, $jenis)
    {
        $this->db->from('tb_transaksi');
        $this->db->where('status', $jenis);
        $this->db->where('id_user', $id);
        return $this->db->get();
    }
    public function chart_transaksi($tahun)
    {
        $this->db->from('tb_transaksi');
        $this->db->where('SUBSTRING(tb_transaksi.tgl_transaksi,4,7)', $tahun);
        return $this->db->count_all_results();
    }

}
