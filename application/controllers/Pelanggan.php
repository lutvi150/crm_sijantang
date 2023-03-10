<?php
class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelChat', 'chat');

        if ($this->session->userdata('logged_in') !== true) {
            $this->session->set_flashdata('error', 'Maaf hak akses anda di tolak');
            redirect('controller/login');
        }
        if ($this->session->userdata('level') !== 'pelanggan') {
            $this->session->set_flashdata('error', 'Maaf hak akses anda di tolak');
            redirect('controller/login');
        }

    }
    public function menu($link, $data)
    {
        $username = $this->session->userdata('username');
        $data_diri = $this->model->find_data('tb_data_diri_user', 'username', $username)->row_array();
        $this->load->view('layout/header', $data_diri);
        $this->load->view('layout/sidebar', $data_diri);
        $this->load->view($link, $data);
        $this->load->view('pelanggan/footer');
        // print_r($data_diri);
    }
    public function menu2($link, $data)
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
    // menampilkan data transaksi
    public function data_transaksi()
    {
        $username = $this->session->userdata('username');
        $data['transaksi'] = $this->model->find_data('tb_transaksi', 'id_user', $username)->result_array();
        $this->menu('pelanggan/transaksi_pelanggan', $data);
    }
    // use for review
    public function FunctionName($id_transaksi)
    {
        $transaksi = $this->model->find_data('tb_transaksi', 'id_transaksi', $id_transaksi)->result();
    }
    // upload bukti bayar
    public function upload_bukti_bayar()
    {
        $nomor_transaksi = $this->input->post('nomor_transaksi');
        $bukti_bayar = $this->upload('bukti_b');
        if ($bukti_bayar == 'error') {
            $this->session->set_flashdata('error', 'Maaf bukti bayar yang anda upload tidak memenuhi kriteria sistem, silahkan upload kembali');
            redirect('pelanggan/data_transaksi');
        } else {
            $id_bukti_bayar = $this->model->nomor_bukti_bayar_otomatis();
            $data =
                [
                'id_bukti_bayar' => $id_bukti_bayar,
                'nomor_transaksi' => $nomor_transaksi,
                'bukti_bayar' => $bukti_bayar,
                'alasan' => '-',
                'tgl_upload' => date('d-m-Y'),
            ];
            $data_update =
                [
                'status' => 'K',
                'id_bukti_bayar' => $id_bukti_bayar,
            ];

            //  print_r($id_bukti_bayar);

            $this->model->update_data('tb_transaksi', 'nomor_transaksi', $nomor_transaksi, $data_update);
            $this->model->create_data('tb_bukti_bayar', $data);
            $this->session->set_flashdata('success', 'Upload Bukti Pembayaran Berhasil Di Lakukan');
            $this->session->set_flashdata('success', 'Upload bukti Bayar berhasil di lakukan');
            redirect('pelanggan/data_transaksi');
        }
    }
    // detail transaksi
    public function detail_transaksi()
    {
        $id = $this->input->get('id');
        $data['keranjang'] = $this->model->find_data('tb_keranjang', 'nomor_transaksi', $id)->result_array();
        echo json_encode($data);
    }
    public function detail_transaksi_priview()
    {
        //$id='161120190001';
        $id = $this->input->post('id');
        $data['data_transaksi'] = $this->model->detail_transaksi($id)->row_array();
        $data['jenis_barang'] = $this->model->detail_barang_dipesan($id)->result_array();
        $data['terbilang'] = $this->penyebut($data['data_transaksi']['total_tagihan']) . ' Rupiah';
        echo json_encode($data);
    }

    public function isi_data_diri()
    {
        $this->load->view('pelanggan/isi_data_diri');
    }
    public function simpan_data_diri()
    {
        $username = $this->session->userdata('username');
        $data = [
            'username' => $username,
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'foto' => $this->upload('images'),
        ];
        $status =
            ['status_data' => 'Sudah'];
        $this->model->update_data('tb_user', 'username', $username, $status);
        $this->model->create_data('tb_data_diri_user', $data);
        $this->session->set_flashdata('success', 'Data diri Berhasil di simpan');
        redirect('controller');
    }
    public function uniq_request()
    {
        $this->menu2('pelanggan/uniq_request', 'a');
    }
    // proses uniq request
    public function simpan_uniq_request()
    {
        $username = $this->session->userdata('username');
        $keterangan = $this->input->post('keterangan');
        $nama_design = $this->input->post('nama_design');
        $jumlah = $this->input->post('jumlah');
        $document = $this->upload('document');
        if ($document == 'error') {
            $sample = '-';
        } else {
            $sample = $document;
        }

        $data =
            [
            'keterangan' => $keterangan,
            'nama_desain' => $nama_design,
            'jumlah_belanja' => $jumlah,
            'document' => $sample,
            'id_pemesan' => $username,
            'harga_satuan' => '-',
            'tgl_request' => date('d-m-Y'),
            'total_harga' => '-',
            'status_request' => 'H',
        ];
        $this->model->create_data('tb_uniq_request', $data);
        $this->session->set_flashdata('success', 'Unig Request Berhasil di Kirim');
        redirect('pelanggan/uniq_request');
    }
    // data uniq request
    public function data_uniq_request()
    {
        $username = $this->session->userdata('username');
        $data['uniq_request'] = $this->model->find_data('tb_uniq_request', 'id_pemesan', $username)->result_array();
        //print_r($data);
        $this->menu('pelanggan/uniq_request_user', $data);
    }
    // menu anda
    public function menu_anda()
    {
        $username = $this->session->userdata('username');
        $data['jumlah_transaksi'] = $this->model->find_data('tb_transaksi', 'id_user', $username)->num_rows();
        $data['transaksi_proses'] = $this->model->jml_tran_proses($username, 'P')->num_rows();
        $data['transaksi_berhasil'] = $this->model->jml_tran_proses($username, 'F')->num_rows();
        $total_transaksi = $this->model->jml_tran_proses($username, 'F');
        if ($total_transaksi->num_rows() == '0') {
            $data['total_transaksi'] = 'Rp. 0';
        } else {
            foreach ($total_transaksi->result_array() as $value) {
                $hasil[] = $value['total_tagihan'];
            }
            $data['total_transaksi'] = 'Rp.' . number_format(array_sum($hasil));
        }

        $this->menu('pelanggan/home', $data);
        //print_r($data);
    }
    // detail uniq request
    public function detail_uniq()
    {
        $id = $this->input->get('id');
        $data['uniq_request'] = $this->model->find_data('tb_uniq_request', 'id_uniq_request', $id)->row_array();
        $data['pelanggan'] = $this->model->find_data('tb_data_diri_user', 'username', $data['uniq_request']['id_pemesan'])->row_array();
        echo json_encode($data);

    }
    //   setuju untuk transaksi
    public function setuju_request($id)
    {
        $data_uniq = $this->model->find_data('tb_uniq_request', 'id_uniq_request', $id)->row_array();
        $nomor_transaksi = $this->model->nomor_bukti_bayar_otomatis();
        $data_update =
            [
            'status_request' => 'S',
        ];
        $data =

            [
            'nomor_transaksi' => $nomor_transaksi,
            'id_user' => $data_uniq['id_pemesan'],
            'total_tagihan' => $data_uniq['total_harga'],
            'status' => 'B',
            'tgl_transaksi' => date('d-m-Y'),
            'tgl_selesai' => '-',
            'id_bukti_bayar' => '-',
            'jenis_transaksi' => 'Uniq',
        ];
        //print_r($data);
        $this->model->create_data('tb_transaksi', $data);
        $this->model->update_data('tb_uniq_request', 'id_uniq_request', $id, $data_update);
        $this->session->set_flashdata('success', 'Uniq Request anda Berhasil di proses, silahkan lakukan pembayaran');
        redirect('pelanggan/data_transaksi');
    }
    public function upload($nama)
    {
        $config['upload_path'] = './upload/original_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($nama)) {
            return 'error';
        } else {
            $result = array($nama => $this->upload->data());
            // resize gambar
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/original_image/' . $result[$nama]['file_name'];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = false;
            $config['quality'] = '100%';
            $config['width'] = 236;
            $config['height'] = 239;
            $config['new_image'] = './upload/thumb_image/' . $result[$nama]['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->image_lib->clear();
            return 'upload/original_image/' . $result[$nama]['file_name'];
        }
    }
    // chat
    public function chat(Type $var = null)
    {
        $this->menu('pelanggan/chat', '');
    }
    // store chat
    public function store_chat(Type $var = null)
    {
        $chat = $this->input->post('chat');
        $insert = [
            'id_user' => $this->session->userdata('id_user'),
            'sumber' => 'user',
            'tanggal_chat' => date('d M Y H:i:s'),
            'chat' => $chat,
            'status_baca' => 0,
        ];
        $response = [
            'status' => 'success',
        ];
        $this->chat->insert_chat($insert);
        echo json_encode($response);
    }
    public function get_chat(Type $var = null)
    {
        $id = $this->session->userdata('id_user');
        $chat = $this->chat->get_chat($id);
        echo json_encode($chat);
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
            $hasil = "minus " . trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }
        return $hasil;
    }

}
