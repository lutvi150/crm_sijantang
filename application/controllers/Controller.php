<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelProduk', 'produk');

    }

    public function menu($link, $data)
    {
        if ($this->session->userdata('logged_in') == true) {
            $data2 = $this->model->ambil_data_user($this->session->userdata('username'))->row_array();
        } else {
            $data2 = 'a';
        }
        //print_r($data2);
        $this->load->view('header_depan', $data2);
        $this->load->view($link, $data);
        $this->load->view('footer_depan');
    }
    public function index()
    {
        if ($this->session->userdata('level') == 'admin') {
            redirect('admin');
        }
        // $data['kemasan'] = $this->model->get_data('tb_produk', 'id_produk', 'DESC')->result_array();
        $data['kemasan'] = $this->produk->get_produk_front();
        $this->menu('beranda', $data);
    }
    public function provinsi(Type $var = null)
    {
        $data = $this->model->get_data('provinsi', 'id_prov', 'ASC')->result_array();
        echo json_encode($data);
    }
    public function kabupaten(Type $var = null)
    {
        $id = $this->input->get('id_prov');
        $response = $this->model->find_data('kabupaten', 'id_prov', $id)->result_array();
        echo json_encode($response);
    }
    public function kecamatan(Type $var = null)
    {
        $id = $this->input->get('id_kab');
        $response = $this->model->find_data('kecamatan', 'id_kab', $id)->result_array();
        echo json_encode($response);
    }
    public function tarif_kecamatan(Type $var = null)
    {
        $id = $this->input->get('tar');
        $response = $this->model->find_data('kecamatan', 'id_kec', $id)->row_array();
        echo json_encode($response);
    }
    public function detail_barang($id_produk)
    {

        // redirect('controller/detail_barang_costume');
        // exit;
        $data['barang'] = $this->model->find_data('tb_produk', 'id_produk', $id_produk)->row();
        $data['foto'] = $this->model->find_data('tb_foto_produk', 'id_produk', $id_produk)->result();
        $this->menu('detail_barang', $data);
    }
    // costume detal
    public function detail_barang_costume(Type $var = null)
    {
        $data = null;
        $this->load->view('detail_barang_c', $data, false);

    }
    public function login()
    {
        $this->menu('login', 'a');
    }
    // kontak
    public function kontak(Type $var = null)
    {
        $this->menu('kontak', '');
    }
    // detail barang
    public function detail_product()
    {
        $id = $this->input->get('id');
        $data = $this->model->find_data('tb_produk', 'id_produk', $id)->row_array();
        echo json_encode($data);
    }
    // tambah ke keranjang
    public function tambah_keranjang($id)
    {
        $data_barang = $this->model->find_data('tb_produk', 'id_produk', $id)->row_array();
        $jumlah = $this->input->post('jumlah_pesan');

        $data =
            [
            'id_produk' => $id,
            'jumlah_pesan' => $jumlah,
            'id_user' => $this->session->userdata('username'),
            'tgl_input' => date('d-m-Y'),
            'status_item' => 'Draf',
            'nomor_transaksi' => '_',
            'total_harga' => $jumlah * $data_barang['harga_jual'],
        ];
        $this->model->create_data('tb_keranjang', $data);
        redirect('controller/keranjang_belanja');
        // print_r($data);
    }
    // detail barang untuk keranjang
    public function barang_keranjang()
    {
        $id = $this->input->get('id');
        $data = $this->model->find_data('tb_keranjang', 'id_keranjang', $id)->row_array();
        echo json_encode($data);
    }
    // ubah jumlah yang akan di pesan
    public function ubah_pesan()
    {
        $id_keranjang = $this->input->post('id_keranjang');
        $jumlah_pesan = $this->input->post('jumlah_pesan');
        $check_id_produk = $this->model->find_data('tb_keranjang', 'id_keranjang', $id_keranjang)->row_array();
        $check_data_barang = $this->model->find_data('tb_produk', 'id_produk', $check_id_produk['id_produk'])->row_array();
        $data =
            [
            'jumlah_pesan' => $jumlah_pesan,
            'total_harga' => $check_data_barang['harga_jual'] * $jumlah_pesan,
        ];
        $this->model->update_data('tb_keranjang', 'id_keranjang', $id_keranjang, $data);
        $this->session->set_flashdata('success', 'Jumlah Barang yang akan di pesan berhasil di ubah');
        redirect('controller/keranjang_belanja');
        //print_r($data);

    }
    // hapus barang di keranjang
    public function hapus_barang($id)
    {
        $this->model->delete_data('tb_keranjang', 'id_keranjang', $id);
        $this->session->set_flashdata('success', 'Data Berhasil Di Hapus dari keranjang');
        redirect('controller/keranjang_belanja');
    }
    // data kabupaten
    public function data_kabupaten(Type $var = null)
    {
        $id = $this->input->get('id');
        $response = $this->model->find_data('kabupaten', 'id_prov', $id)->result_array();
        echo json_encode($response);
    }
    public function terbilang_keranjang(Type $var = null)
    {
        $id_user = $this->session->userdata('username');
        $check_data = $this->model->data_keranjang($id_user);
        if ($check_data->num_rows() == '0') {
            $data['status_data'] = '0';
        } else {
            $data['status_data'] = '1';
            $data['keranjang'] = $check_data->result_array();
            foreach ($check_data->result_array() as $value) {
                $hasil[] = $value['total_harga'];
            }
            $data['total_belanja'] = array_sum($hasil);
            $data['terbilang'] = $this->terbilang($data['total_belanja']) . " rupiah";
        }
        $angka = $this->input->get('angka');
        //$tarif=$
        $jumlah = $angka + $data['total_belanja'];
        $response['terbilang'] = $this->terbilang($jumlah);
        $response['angka'] = $jumlah;
        echo json_encode($response);
    }
    public function terbilang_angka(Type $var = null)
    {
        //$angka=8500;
        $angka = $this->input->get('angka');
        $response = $this->terbilang($angka);
        echo json_encode($response . " Rupiah");
    }
    public function keranjang_belanja()
    {

        $id_user = $this->session->userdata('username');
        $data['user'] = $this->model->find_data('tb_data_diri_user', 'username', $this->session->userdata('username'))->row();
        $check_data = $this->model->data_keranjang($id_user);
        if ($check_data->num_rows() == '0') {
            $data['status_data'] = '0';
        } else {
            $data['status_data'] = '1';
            $data['keranjang'] = $check_data->result_array();
            foreach ($check_data->result_array() as $value) {
                $hasil[] = $value['total_harga'];
            }
            $data['total_belanja'] = array_sum($hasil);
            $data['terbilang'] = $this->terbilang($data['total_belanja']) . " rupiah";
        }
        $this->menu('pelanggan/keranjang', $data);
    }
    // untuk proses transakssi
    public function proses_transaksi()
    {
        $bank = $this->input->post('bank');
        $provinsi = $this->input->post('provinsi');
        $kabupaten = $this->input->post('kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $status = $this->input->post('status_bayar');
        $id_user = $this->session->userdata('username');
        $nama_penerima = $this->input->post('nama_penerima');
        $nomor_kontak = $this->input->post('nomor_kontak');
        $alamat = $this->input->post('alamat');
        $nomor_transaksi = $this->model->nomor_otomatis();
        $check_data = $this->model->data_keranjang($id_user);
        if ($check_data->num_rows() == '0') {
            $data['status_data'] = '0';
        } else {
            $data['status_data'] = '1';
            foreach ($check_data->result_array() as $value) {
                $update = [
                    'nomor_transaksi' => $nomor_transaksi,
                    'status_item' => 'Finish',
                ];
                $this->model->update_data('tb_keranjang', 'id_keranjang', $value['id_keranjang'], $update);
                $hasil[] = $value['total_harga'];
            }
            $total_belanja = array_sum($hasil);
            // use for check discount
            $check_dicount = $this->model->find_data('tb_setting', 'setting_name', 'discount')->row();
            $total_discount = 0;
            if ($check_dicount !== null) {
                $discount = json_decode($check_dicount->value);
                if ($discount->minimal_transaksi > 0) {
                    $count_transaksi = $this->model->jml_tran_proses($id_user, 'F')->num_rows();
                    if ($count_transaksi % $discount->minimal_transaksi == 0) {
                        $total_discount = $total_belanja * $discount->persentase_discount;
                        $total_belanja = $total_belanja - $total_discount;
                    }
                }
            }
            $data =
                [
                'nomor_transaksi' => $nomor_transaksi,
                'id_user' => $id_user,
                'total_tagihan' => $total_belanja,
                'status' => 'B',
                'tgl_transaksi' => date('d-m-Y'),
                'tgl_selesai' => '-',
                'id_bukti_bayar' => '-',
                'jenis_transaksi' => 'Biasa',
                'bank' => $bank,
                'status_bayar' => '',
                'ongkir' => 0,
                'discount' => $total_discount,
                'alamat' => 'Di kirim atas nama ' . $nama_penerima . ' Dengan nomor kontak :' . $nomor_kontak . " Alamat pengiriman:" . $alamat,
            ];
            // print_r($data);
            $this->model->create_data('tb_transaksi', $data);
            $this->session->set_flashdata('success', 'Transaksi Berhasil di buat, silahkan lakukan pembayaran');
            redirect('controller/keranjang_belanja');
        }
        //print_r($bank);
    }
    // proses
    public function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . " Belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . " Puluh" . $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . " Ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai / 1000) . " Ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai / 1000000) . " Juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai / 1000000000) . " Milyar" . $this->penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai / 1000000000000) . " Trilyun" . $this->penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    public function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }
    public function daftar()
    {
        $this->menu('daftar', 'as');
    }
    public function simpan_daftar()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $ulangi_password = md5($this->input->post('ulangi_password'));
        if ($username == null) {
            $this->session->set_flashdata('error', 'Username  Tidak Boleh Kosong');
            redirect('controller/daftar');
        } else {
            if ($password == $ulangi_password) {
                $check = $this->model->find_data('tb_user', 'username', $username);
                if ($check->num_rows() > 0) {
                    $this->session->set_flashdata('error', 'Username ini sudah terdaftar, silahkan gunakan username lain');
                    redirect('controller/daftar');
                } else {
                    $data_input = array(
                        'username' => $username,
                        'password' => $password,
                        'tgl_registrasi' => date('d-m-Y'),
                        'status_data' => 'Belum',
                        'level' => 'pelanggan',
                    );
                    //print_r($data_input);
                    $this->model->create_data('tb_user', $data_input);
                    $this->session->set_flashdata('success', 'Pendaftaran Berhasil Silahkan Login');
                    redirect('controller/daftar');
                }
            } else {
                //echo'tidak sama';
                $this->session->set_flashdata('error', 'Maaf password yang anda masukkan tidak sama');
                redirect('controller/daftar');
            }
        }
    }
    public function verifikasi_login()
    {

        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $check_data = $this->model->check_account($username, $password);
        if ($check_data->num_rows() > 0) {
            $data = $check_data->row_array();
            $level = $data['level'];
            $id = $data['id_user'];
            $nrp = $data['username'];
            $status_data = $data['status_data'];
            $ses_data = array(
                'id_user' => $id,
                'username' => $nrp,
                'level' => $level,
                'logged_in' => true,
            );
            //print_r($ses_data);
            $this->session->set_userdata($ses_data);
            if ($level == 'admin') {
                redirect('admin');
            } elseif ($level == 'pelanggan') {
                if ($status_data == 'Belum') {
                    redirect('pelanggan/isi_data_diri');
                } else {
                    redirect('controller');
                    $this->session->set_flashdata('error', 'Maaf Username ini tidak di sistem');
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Maaf Password yang anda masukkan salah');
            redirect('controller/login');
        }
    }
    public function view_error()
    {
        $this->output->set_status_header('404');
        $this->load->view('404');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('controller/login');
    }
}
