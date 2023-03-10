<?php
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('pdf');
        $this->load->model('ModelProduk', 'produk');
        $this->load->model('ModelChat', 'chat');
        $this->load->model('ModelKeranjang', 'keranjang');
        $this->load->model('ModelUser', 'user');
        $this->load->library('form_validation');

        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('logged_in') !== true) {
            $this->session->set_flashdata('error', 'Maaf hak akses anda di tolak');
            redirect('controller/login');
        }
        if ($this->session->userdata('level') !== 'admin') {
            $this->session->set_flashdata('error', 'Maaf hak akses anda di tolak');
            redirect('controller/login');
        }

    }
    public function menu($link, $data)
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view($link, $data);
        $this->load->view('admin/footer');
    }
    public function index()
    {
        $data['jumlah_pelanggan'] = $this->model->get_data('tb_produk', 'id_produk', 'ASC')->num_rows();
        $data['jumlah_transaksi'] = $this->model->get_data('tb_transaksi', 'id_transaksi', 'ASC')->num_rows();
        $data['jumlah_user'] = $this->model->find_data('tb_user', 'level', 'pelanggan')->num_rows();
        $total_transaksi = $this->model->find_data('tb_transaksi', 'status', 'F');
        if ($total_transaksi->num_rows() == '0') {
            $data['total_transaksi'] = '0';
        } else {
            foreach ($total_transaksi->result_array() as $value) {
                $hasil[] = $value['total_tagihan'];
            }

            $data['total_transaksi'] = number_format(array_sum($hasil));
        }

        $this->menu('admin/content', $data);
        //print_r($data);
    }
    public function home()
    {
        $this->menu('admin/content', 'a');
    }
    public function barang()
    {

        $barang = $this->produk->get_produk();
        if ($barang) {
            foreach ($barang as $key => $value) {
                $terjual = $this->keranjang->get_best_seller($value->id_produk)->jumlah_pesan;
                $persentase = 0;
                if ($value->stock > 0 && $terjual > 0) {
                    $persentase = round(($terjual / $value->stock) * 100, 2);
                }
                $keuntungan = $value->harga_jual - $value->harga_modal;
                $persentase_keuntungan = round(($keuntungan / $value->harga_modal) * 100, 2);
                $resultBarang[] = (object) [
                    'nama_produk' => $value->nama_produk,
                    'jenis' => $value->jenis,
                    'harga_jual' => $value->harga_jual,
                    'harga_modal' => $value->harga_modal,
                    'stock' => $value->stock,
                    'id_produk' => $value->id_produk,
                    'terjual' => $terjual,
                    'persentase' => $persentase,
                    'keuntungan' => $keuntungan,
                    'persentase_keuntungan' => $persentase_keuntungan,
                    'satuan' => $value->satuan,
                ];
            }
            $data['barang'] = $resultBarang;
        } else {
            $data['barang'] = null;
        }
        $this->menu('admin/barang', $data);
    }
    // use for upload image produk
    public function upload_foto_produk(Type $var = null)
    {

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_produk')) {
            $response = ['status' => 'failed', 'error' => $this->upload->display_errors()];
        } else {
            $data = $this->upload->data();
            $this->model->update_data('tb_foto_produk', 'id_produk', $this->input->post('id_produk'), ['foto_unggulan' => 0]);
            $response = ['status' => 'success'];
            $insert = [
                'id_produk' => $this->input->post('id_produk'),
                'foto_produk' => 'upload/' . $data['file_name'],
                'foto_unggulan' => 1,
            ];
            $this->model->create_data('tb_foto_produk', $insert);
        }
        echo json_encode($response);

    }
    // function get image
    public function get_foto_produk(Type $var = null)
    {
        $id_produk = $this->input->post('id_produk');
        $getFoto = $this->model->find_data('tb_foto_produk', 'id_produk', $id_produk)->result();
        echo json_encode($getFoto);
    }
    // remove foto produk
    public function remove_foto_produk(Type $var = null)
    {
        $id_foto_produk = $this->input->post('id_foto_produk');
        $getFoto = $this->model->find_data('tb_foto_produk', 'id_foto_produk', $id_foto_produk)->row();
        if (file_exists(base_url() . $getFoto->foto_produk)) {
            unlink(base_url() . $getFoto->foto_produk);
        }
        $this->model->delete_data('tb_foto_produk', 'id_foto_produk', $id_foto_produk);
        $response = [
            'status' => 'success',
        ];
        echo json_encode($response);
    }
    // make the foto featured
    public function jadikan_foto_unggulan(Type $var = null)
    {
        $id_produk = $this->input->post('id_produk');
        $id_foto_produk = $this->input->post('id_foto_produk');
        $this->model->update_data('tb_foto_produk', 'id_produk', $id_produk, ['foto_unggulan' => 0]);
        $this->model->update_data('tb_foto_produk', 'id_foto_produk', $id_foto_produk, ['foto_unggulan' => 1]);
        echo json_encode(['status' => 'success']);
    }
    public function tambah_produk()
    {
        $insert = [
            'nama_produk' => '-',
            'keterangan' => '-',
            'jenis' => '-',
            'harga_jual' => 0,
            'harga_modal' => 0,
            'satuan' => '-',
            'stock' => 0,
        ];
        $checkData = $this->model->find_data('tb_produk', 'nama_produk', '-')->row();
        if ($checkData == null) {
            $id = $this->model->create_data('tb_produk', $insert);
        } else {
            $id = $checkData->id_produk;
        }
        $data['id'] = $id;
        $this->menu('admin/tambah_produk', $data);
    }
    // untuk hapus data barang
    public function hapus_data_barang()
    {
        $id = $this->input->post('id_produk');
        $this->model->delete_data('tb_produk', 'id_produk', $id);
        $this->session->set_flashdata('success', 'Data Kemasan berhasil di hapus');
        redirect('admin/barang');
    }
    // data transaksi
    public function data_transaksi()
    {
        $data['transaksi'] = $this->model->transaksi()->result_array();
        $this->menu('admin/transaksi', $data);
        //print_r($data);
    }
    // bukti bayar detail
    public function bukti_bayar()
    {
        $id = $this->input->get('id');
        $data_transaksi = $this->model->find_data('tb_transaksi', 'nomor_transaksi', $id)->row_array();
        $bukti_bayar = $this->model->find_data('tb_bukti_bayar', 'id_bukti_bayar', $data_transaksi['id_bukti_bayar'])->row_array();
        echo json_encode($bukti_bayar);

    }
    // proses pekerjaan
    public function proses($nomor_transaksi)
    {
        $data_transaksi = $this->model->find_data('tb_transaksi', 'nomor_transaksi', $nomor_transaksi)->row_array();
        $data_user = $this->model->find_data('tb_data_diri_user', 'username', $data_transaksi['id_user'])->row_array();
        $tgl_selesai = $this->input->post('tgl_selesai');
        if ($tgl_selesai == null) {
            $this->session->set_flashdata('error', 'Tanggal Selesai Belum Di Isi');
            redirect('admin/data_transaksi');
        } else {
            $data =
                [
                'status' => 'P',
                'tgl_selesai' => $tgl_selesai,
            ];
            $pesan = 'Transaksi anda dengan nomor ' . $nomor_transaksi . 'sudah di proses tanggal selesai ' . $tgl_selesai;
            $nomor = $data_user['no_hp'];
            $this->send_sms($pesan, $nomor);
            $this->model->update_data('tb_transaksi', 'nomor_transaksi', $nomor_transaksi, $data);
            $this->session->set_flashdata('success', 'Transaksi Berhasil di Proses');
            redirect('admin/data_transaksi');
            //    print_r($data);
        }

    }
    // finish transaksi
    public function finish($id)
    {
        $data_transaksi = $this->model->find_data('tb_transaksi', 'nomor_transaksi', $id)->row_array();
        $data_user = $this->model->find_data('tb_data_diri_user', 'username', $data_transaksi['id_user'])->row_array();
        $data =
            [
            'status' => 'F',
        ];
        $pesan = 'Transaksi anda dengan nomor ' . $id . ' Sudah selesai di kerjakan';
        $nomor = $data_user['no_hp'];
        $this->send_sms($pesan, $nomor);
        $this->model->update_data('tb_transaksi', 'nomor_transaksi', $id, $data);
        $this->session->set_flashdata('success', 'Transaksi Berhasil di Finish');
        redirect('admin/data_transaksi');
    }
    // proses pembayaran
    public function pembayaran($status, $id)
    {
        $data_transaksi = $this->model->find_data('tb_transaksi', 'nomor_transaksi', $id)->row_array();
        $data_user = $this->model->find_data('tb_data_diri_user', 'username', $data_transaksi['id_user'])->row_array();
        if ($status == 'terima') {
            $data =
                [
                'status' => 'L',
            ];
            $pesan = 'Bukti pembayaran anda untuk nomor transaksi ' . $id . ' telah di konfirmasi admin';
            $nomor = $data_user['no_hp'];
            $this->send_sms($pesan, $nomor);
            $this->model->update_data('tb_transaksi', 'nomor_transaksi', $id, $data);
            $this->session->set_flashdata('success', 'Pembayaran Berhasil Proses');
            redirect('admin/data_transaksi');
        } elseif ($status == 'tolak') {
            $alasan = $this->input->post('alasan');
            if ($alasan == null) {
                $this->session->set_flashdata('error', 'Alasan harus di isi');
                redirect('admin/data_transaksi');
            } else {

                $no_bukti_bayar = $this->model->find_data('tb_transaksi', 'nomor_transaksi', $id)->row_array();

                $data =
                    [
                    'status' => 'B',
                ];
                $data_alasan = [
                    'alasan' => $this->input->post('alasan'),

                ];
                $pesan = 'Bukti pembayaran anda untuk nomor transaksi ' . $id . ' di tolak, alasan penolakan bisa di check di akun anda';
                $nomor = $data_user['no_hp'];
                $this->send_sms($pesan, $nomor);
                $this->model->update_data('tb_transaksi', 'nomor_transaksi', $id, $data);
                $this->model->update_data('tb_bukti_bayar', 'id_bukti_bayar', $no_bukti_bayar['id_bukti_bayar'], $data_alasan);
                $this->session->set_flashdata('success', 'Pembayaran Berhasil Di Tolak');
                redirect('admin/data_transaksi');
            }

        }
    }
    public function detail_transaksi()
    {
        //$id='161120190001';
        $id = $this->input->get('id');
        $data['data_transaksi'] = $this->model->detail_transaksi($id)->row_array();
        $data['jenis_barang'] = $this->model->detail_barang_dipesan($id)->result_array();
        $data['terbilang'] = $this->penyebut($data['data_transaksi']['total_tagihan']) . ' Rupiah';
        echo json_encode($data);
    }
    // simpan kemasan
    public function simpan_produk($status)
    {
        $id_produk = $this->input->post('id_produk');
        $checkFoto = $this->model->find_data('tb_foto_produk', 'id_produk', $id_produk)->row();
        if ($checkFoto == null) {
            $response = [
                'status' => 'foto produk not found',
                'msg' => 'Tidak bisa di simpan, karena tidak ada foto produk',
            ];
        } else {
            $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
                'required' => 'Nama Tidak boleh kosong',
            ]);
            $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required', [
                'required' => 'Jenis Tidak Boleh kosong',
            ]);
            $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', [
                'required' => 'Satuan Tidak boleh kosong',
            ]);
            $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required|numeric', [
                'required' => 'Harga Jual Tidak boleh kosong',
                'numeric' => 'Harga Jual harus berupa angka',
            ]);
            $this->form_validation->set_rules('harga_modal', 'Harga Modal', 'trim|required|numeric', [
                'required' => 'Harga Modal Tidak boleh kosong',
                'numeric' => 'Harga Modal harus berupa angka',
            ]);
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required', [
                'required' => 'Keterangan Tidak boleh kosong',
            ]);
            $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', [
                'required' => 'Satuan Tidak boleh kosong',
            ]);
            $this->form_validation->set_rules('stock', 'Stock', 'trim|required|numeric', [
                'required' => 'Stock Tidak boleh kosong',
                'numeric' => 'Stoc harus berupa angka',
            ]);

            if ($this->form_validation->run() == false) {
                $response = [
                    'status' => 'validation failed',
                    'msg' => $this->form_validation->error_array(),
                ];
            } else {

                $data =
                    [
                    'nama_produk' => $this->input->post('nama'),
                    'jenis' => $this->input->post('jenis'),
                    'satuan' => $this->input->post('satuan'),
                    'harga_jual' => $this->input->post('harga_jual'),
                    'harga_modal' => $this->input->post('harga_modal'),
                    'keterangan' => $this->input->post('keterangan'),
                    'stock' => $this->input->post('stock'),

                ];
                $this->model->update_data('tb_produk', 'id_produk', $id_produk, $data);
                if ($status == 'store') {
                    $msg = 'Data produk berhasil di tambahkan';
                } else {
                    $msg = 'Data produk berhasil di perbarui';
                }
                $response = [
                    'status' => 'success',
                    'msg' => $msg,
                ];
            }
        }
        echo json_encode($response);
    }
    public function simpan_kemasan_edit($id)
    {
        $foto = $this->upload('foto');
        if ($foto == 'error') {
            $data =
                [
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'satuan' => $this->input->post('satuan'),
                'harga' => $this->input->post('harga'),
                'detail' => $this->input->post('detail'),
            ];
        } else {

            $data =
                [
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'satuan' => $this->input->post('satuan'),
                'harga' => $this->input->post('harga'),
                'detail' => $this->input->post('detail'),
                'foto' => $foto,
            ];

        }
        $this->model->update_data('tb_produk', 'id_produk', $id, $data);
        $this->session->set_flashdata('success', 'Kemasan Berhasil di Update');
        redirect('admin/barang');
    }
    // detail produk
    public function detail_produk()
    {
        $id = $this->input->get('id');
        $data = $this->model->find_data('tb_produk', 'id_produk', $id)->row_array();
        echo json_encode($data);
    }
    // data user
    public function data_user()
    {
        $this->benchmark->mark('code_start');

        $data['data_user'] = $this->user->get_data_user();
        $this->benchmark->mark('code_end');
        $this->menu('admin/data_user', $data);
        //print_r($data);
    }
    // view uniq request
    public function uniq_request()
    {
        $data['uniq_request'] = $this->model->get_data('tb_uniq_request', 'id_uniq_request', 'DESC')->result_array();
        $this->menu('admin/uniq_request_admin', $data);
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
    // hitung jumlah biaya
    public function hitung_jumlah_biaya()
    {
        $id = $this->input->get('id');
        $jumlah = $this->input->get('jumlah');
        //$id='100';
        //$jumlah='200';
        $total = $id * $jumlah;
        $data =
            [
            'biaya' => 'Rp.' . number_format($total),
            'terbilang' => $this->penyebut($total) . ' Rupiah',
        ];
        echo json_encode($data);

    }
    // tetapkan harga satuan
    public function tetapkan_harga_satuan()
    {
        $id_uniq = $this->input->post('id_uniq_request');
        $harga_satuan = $this->input->post('harga_satuan');
        $jumlan_pesan = $this->input->post('total_pesanan');
        $jumlah = $harga_satuan * $jumlan_pesan;
        $data =
            [
            'harga_satuan' => $harga_satuan,
            'total_harga' => $jumlah,
            'status_request' => 'E',
        ];
        //print_r($data);
        $this->model->update_data('tb_uniq_request', 'id_uniq_request', $id_uniq, $data);
        $this->session->set_flashdata('success', 'Harga Berhasil di tambahkan');
        redirect('admin/uniq_request');
    }
    public function cetak_user($status)
    {
        if ($status == 'semua') {
            $data_user = $this->model->get_data_user()->result_array();
            $status_data = 'Semua Data User Yang Mendaftar';
        } else if ($status == 'pertanggal') {
            $tanggal = $this->input->post('dari_tgl');
            if ($tanggal == null) {
                $this->session->set_flashdata('error', 'Tanggal Tidak Boleh Kosong');
                redirect('admin/data_user');
            } else {

                $data_user = $this->model->get_data_user_per($tanggal)->result_array();
                $status_data = 'Data User Yang Mendaftar Tanggal : ' . $tanggal;
            }

        }
        $pdf = new FPDF('l', 'mm', 'Legal'); //Ukuran kertas
        //Membuat halaman baru
        $pdf->AddPage();
        //seting jenis font yang di gunakan
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(20, 40, $pdf->image(base_url() . 'asset/img/.jpg', 115, 40, 150), 0, 0, 'C');
        //mencetak setting
        $pdf->Cell(20, 7, $pdf->image(base_url() . 'asset/img/.jpg', $pdf->GetX(), $pdf->GetY(), 20), 0, 0, 'C');
        $pdf->Cell(240, 6, 'DASA WISMA SIJANTANG', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 15);
        //mencetak setting
        $pdf->Cell(320, 6, 'DATA PELANGGAN YANG TERDAFTAR PADA SISTEM', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(340, 1, '', ':', 0, 1, 'C');
        $pdf->Cell(300, 5, '', 0, 1, 'C');
        //Membri spasi kEBawah
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(270, 6, $status_data, 0, 1);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(7, 10, 'No', 1, 0, 'C');
        $pdf->Cell(47, 10, 'Nama User ', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Tanggal Registrasi ', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Nomor Kontak', 1, 0, 'C');
        $pdf->Cell(225, 10, 'Alamat', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 8);
        $no = 1;
        $no2 = 1;

        foreach ($data_user as $row) {
            $nomor = $no++;

            $pdf->Cell(7, 10, $no2, 1, 0, 'C');
            $pdf->Cell(47, 10, $row['nama'], 1, 0, 'C');
            $pdf->Cell(30, 10, $row['tgl_registrasi'], 1, 0, 'C');
            $pdf->Cell(30, 10, $row['no_hp'], 1, 0, 'C');

            $pdf->Cell(225, 10, $row['alamat'], 1, 1, 'L');

            if ($nomor % 9 == 0) {

                $pdf->SetFont('Arial', 'B', 10);
                $pdf->Cell(0, 20, 'Halaman ' . $pdf->PageNo(), 0, 0, 'R');

                $pdf->AddPage();
            }
        }

        //$pdf->SetFont('Arial','I',8);
        $pdf->cell(280, 10, '', 0, 0);

        $pdf->Cell(0, 4, 'Batusangkar,' . date('d M Y'), 0, 1);
        $pdf->cell(280, 4, '', 0, 0);
        $pdf->Cell(0, 4, 'Direktur ', 0, 1);
        $pdf->cell(256, 6, '', 0, 0);
        $pdf->Cell(0, 6, ' ', 0, 1);
        $pdf->ln(20);
        $pdf->SetFont('Arial', 'BU', 8);
        $pdf->cell(280, 6, '', 0, 0);
        $pdf->Cell(0, 6, 'Fadjar, A.Md', 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->cell(256, 2, '', 0, 0);
        $pdf->Cell(0, 1, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetY(270);
        $pdf->Cell(0, 9, 'Halaman ' . $pdf->PageNo(), 0, 1, 'R');

        $pdf->Output();
    }
    public function cetak_transaksi($status)
    {
        if ($status == 'pertahun') {

            $tahun = $this->input->post('tahun');
            if ($tahun == null) {
                $this->session->set_flashdata('error', 'Tahun Tidak Boleh Kosong');
                redirect('admin/data_transaksi');
            } else {
                $data_transaksi = $this->model->transaksi_pertahun($tahun, $status)->result_array();
                $status_data = 'Data Transaksi Tahun : ' . $tahun;
            }
            // print_r($data_transaksi);
        } else if ($status == 'bulan') {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $tanggal = $bulan . '-' . $tahun;
            if ($bulan == null) {
                $this->session->set_flashdata('error', 'Tanggal Tidak Boleh Kosong');
                redirect('admin/data_user');
            } else {

                $data_transaksi = $this->model->transaksi_pertahun($tanggal, $status)->result_array();
                $status_data = 'Data Transaksi Bulan ' . $bulan . ' Tahun ' . $tahun;
            }
        } elseif ($status == 'semua') {
            $data_transaksi = $this->model->transaksi_pertahun('0', $status)->result_array();
            $status_data = 'Semua Data Transaksi ';
        }
        $pdf = new FPDF('l', 'mm', 'Legal'); //Ukuran kertas
        //Membuat halaman baru
        $pdf->AddPage();
        //seting jenis font yang di gunakan
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(240, 6, '-', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 15);
        //mencetak setting
        $pdf->Cell(320, 6, 'DATA PELANGGAN YANG TERDAFTAR PADA SISTEM', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(340, 1, '', ':', 0, 1, 'C');
        $pdf->Cell(300, 5, '', 0, 1, 'C');
        //Membri spasi kEBawah
        $pdf->SetFont('Arial', 'BU', 12);

        $pdf->Cell(50, 10, '', 0, 0, 'C');
        $pdf->Cell(270, 6, $status_data, 0, 1);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(50, 10, '', 0, 0, 'C');
        $pdf->Cell(7, 10, 'No', 1, 0, 'C');
        $pdf->Cell(47, 10, 'Nomor Transaksi ', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Tanggal Transaksi ', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Tanggal Selesai', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Nama Pelanggan', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Nomor HP', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Total Tagihan', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Status Pesanan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 8);
        $no = 1;
        $no2 = 1;

        foreach ($data_transaksi as $row) {
            $nomor = $no++;

            $pdf->Cell(50, 10, '', 0, 0, 'C');
            $pdf->Cell(7, 10, $nomor, 1, 0, 'C');
            $pdf->Cell(47, 10, $row['nomor_transaksi'], 1, 0, 'C');
            $pdf->Cell(30, 10, $row['tgl_registrasi'], 1, 0, 'C');
            $pdf->Cell(30, 10, $row['tgl_selesai'], 1, 0, 'C');
            $pdf->Cell(30, 10, $row['nama'], 1, 0, 'C');
            $pdf->Cell(30, 10, $row['no_hp'], 1, 0, 'C');
            $pdf->Cell(30, 10, 'Rp.' . number_format($row['total_tagihan']), 1, 0, 'C');
            $pdf->Cell(30, 10, $row['status'], 1, 1, 'C');

            if ($nomor % 11 == 0) {

                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(0, 20, 'Halaman ' . $pdf->PageNo(), 0, 0, 'R');

                $pdf->AddPage();
            }
        }

        $pdf->SetFont('Arial', '', 8);
        $pdf->cell(250, 10, '', 0, 0);

        $pdf->Cell(0, 4, 'Batusangkar,' . date('d M Y'), 0, 1);
        $pdf->cell(50, 4, '', 0, 0);
        $pdf->cell(200, 4, 'Keterangan', 0, 0, 'L');
        $pdf->Cell(0, 4, 'Direktur ', 0, 1);
        $pdf->cell(50, 4, '', 0, 0);
        $pdf->cell(206, 4, 'F : Status Pesanan Sudah Finish', 0, 1, 'L');
        $pdf->cell(50, 4, '', 0, 0);
        $pdf->cell(206, 4, 'B : Menunggu Pembayaran', 0, 1, 'L');
        $pdf->cell(50, 4, '', 0, 0);
        $pdf->cell(206, 4, 'P : Sedang dalam Proses', 0, 1, 'L');
        $pdf->cell(50, 4, '', 0, 0);
        $pdf->cell(206, 4, 'K : Menunggu Konfirmasi Admin untuk pembayaran', 0, 0, 'L');
        $pdf->Cell(0, 4, ' ', 0, 1);
        $pdf->ln(5);
        $pdf->SetFont('Arial', 'BU', 8);
        $pdf->cell(250, 6, '', 0, 0);
        $pdf->Cell(0, 6, 'Fadjar, A.Md', 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->cell(256, 2, '', 0, 0);
        $pdf->Cell(0, 1, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetY(270);
        $pdf->Cell(0, 9, 'Halaman ' . $pdf->PageNo(), 0, 1, 'R');

        $pdf->Output();
    }
    public function edit_produk($id)
    {
        $data = $this->model->find_data('tb_produk', 'id_produk', $id)->row_array();
        $this->menu('admin/edit_produk', $data);
    }

    // function uplaod
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
            return 'upload/thumb_image/' . $result[$nama]['file_name'];
        }

    }
    // fungsi cetak
    public function cetak_barang($status)
    {
        if ($status == 'semua') {
            $barang = $this->model->get_data('tb_produk', 'id_produk', 'DESC')->result_array();
            $status_data = 'Semua Data';
        } else {
            # code...
        }

        $pdf = new FPDF('l', 'mm', 'Legal'); //Ukuran kertas
        //Membuat halaman baru
        $pdf->AddPage();
        //seting jenis font yang di gunakan
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(20, 40, $pdf->image(base_url() . 'asset/img/crm_b.jpg', 115, 40, 150), 0, 0, 'C');
        //mencetak setting
        $pdf->Cell(20, 7, $pdf->image(base_url() . 'asset/img/crm.jpg', $pdf->GetX(), $pdf->GetY(), 20), 0, 0, 'C');
        $pdf->Cell(240, 6, '-', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 15);
        //mencetak setting

        $pdf->Cell(320, 5, 'webesite: www.RumahKemasan.com', 0, 1, 'C');
        $pdf->Cell(340, 1, '', ':', 0, 1, 'C');
        $pdf->Cell(300, 5, '', 0, 1, 'C');
        //Membri spasi kEBawah

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(270, 6, $status_data, 0, 1);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(7, 10, 'No', 1, 0, 'C');
        $pdf->Cell(47, 10, 'Nama Barang ', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Jenis', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Satuan', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Harga', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Desain Kemasan', 1, 0, 'C');
        $pdf->Cell(145, 10, 'Detail', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 8);

        $no = 1;
        $no2 = 1;

        foreach ($barang as $row) {
            $nomor = $no++;

            $pdf->Cell(7, 20, $no2, 1, 0, 'C');
            $pdf->Cell(47, 20, $row['nama'], 1, 0, 'C');
            $pdf->Cell(50, 20, $row['jenis'], 1, 0, 'C');
            $pdf->Cell(30, 20, $row['satuan'], 1, 0, 'C');
            $pdf->Cell(30, 20, $row['harga'], 1, 0, 'C');
            $gambar = base_url() . $row['foto'];
            $pdf->Cell(30, 20, $pdf->image($gambar, 180, $pdf->GetY() + 2.4, 15), 1, 0);
            $pdf->Cell(145, 20, $row['detail'], 1, 1, 'L');

            if ($nomor % 9 == 0) {

                $pdf->SetFont('Arial', 'B', 10);
                $pdf->Cell(0, 20, 'Halaman ' . $pdf->PageNo(), 0, 0, 'R');

                $pdf->AddPage();
            }
        }

        $pdf->cell(280, 10, '', 0, 0);
        $pdf->Cell(0, 4, 'Batusangkar,' . date('d M Y'), 0, 1);
        $pdf->cell(280, 4, '', 0, 0);
        $pdf->Cell(0, 4, 'Direktur ', 0, 1);
        $pdf->cell(256, 6, '', 0, 0);
        $pdf->Cell(0, 6, ' ', 0, 1);
        $pdf->ln(20);
        $pdf->SetFont('Arial', 'BU', 8);
        $pdf->cell(280, 6, '', 0, 0);
        $pdf->Cell(0, 6, 'Fadjar, A.Md', 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->cell(256, 2, '', 0, 0);
        $pdf->Cell(0, 1, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetY(270);
        $pdf->Cell(0, 9, 'Halaman ' . $pdf->PageNo(), 0, 1, 'R');

        $pdf->Output();
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
    // sms fitur
    public function send_sms($message1, $number1)
    {
        ob_start();
        // setting
        $apikey = '53967ae44f61f89b2bb9e2bd05164398'; // api key
        $urlendpoint = 'http://sms241.xyz/sms/api_sms_masking_send_json.php'; // url endpoint api
        $callbackurl = 'http://your_url_for_get_auto_update_status_sms'; // url callback get status sms

        // create header json
        $senddata = array(
            'apikey' => $apikey,
            'callbackurl' => $callbackurl,
            'datapacket' => array(),
        );

        // create detail data json
        // data 1
        $sendingdatetime1 = "";
        array_push($senddata['datapacket'], array(
            'number' => trim($number1),
            'message' => urlencode(stripslashes(utf8_encode($message1))),
            'sendingdatetime' => $sendingdatetime1));

        // data 2
        // $number2='081xxx';
        // $message2='Message 2';
        // $sendingdatetime2 ="2017-01-01 23:59:59";
        // array_push($senddata['datapacket'],array(
        //     'number' => trim($number2),
        //     'message' => urlencode(stripslashes(utf8_encode($message2))),
        //     'sendingdatetime' => $sendingdatetime2));

        // send sms
        $dt = json_encode($senddata);
        $curlHandle = curl_init($urlendpoint);
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $dt);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($dt))
        );
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 5);
        curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 5);
        $responjson = curl_exec($curlHandle);
        curl_close($curlHandle);
        header('Content-Type: application/json');
        echo $responjson;
    }
    // use for make chat
    public function get_new_chat(Type $var = null)
    {
        $chat = $this->chat->get_new_chat();
        $searchat = [];
        $data_chat = [];
        if ($chat !== null) {
            foreach ($chat as $key => $value) {
                $searchat[] = $value->id_user;
            };
            $data_chat = $this->chat->get_data_user($searchat);
            foreach ($data_chat as $key => $value) {
                $chat_new[] = (object) [
                    'id_user' => $value->id_user,
                    'nama' => $value->nama,
                    'alamat' => $value->alamat,
                    'no_hp' => $value->no_hp,
                    'foto' => $value->foto,
                    'jumlah_pesan' => $this->chat->count_message($value->id_user),
                ];
            }
        }
        $data['data_user'] = $chat_new;
        $this->menu('admin/chat', $data);
    }
    public function chat($id_user)
    {
        $data['id_user'] = $id_user;
        $this->chat->update_status_chat($id_user);
        $this->menu('admin/detail_chat', $data);
    }
    // store chat
    public function store_chat(Type $var = null)
    {
        $chat = $this->input->post('chat');
        $insert = [
            'id_user' => $this->input->post('id_user'),
            'sumber' => 'admin',
            'tanggal_chat' => date('d M Y H:i:s'),
            'chat' => $chat,
            'status_baca' => 1,
        ];
        $response = [
            'status' => 'success',
        ];
        $this->chat->insert_chat($insert);
        echo json_encode($response);
    }
    public function get_chat(Type $var = null)
    {
        $id = $this->input->post('id_user');
        $chat = $this->chat->get_chat($id);
        echo json_encode($chat);
    }
    // use for grafik
    public function get_chart(Type $var = null)
    {
        $tahun = date('Y');
        for ($i = 1; $i <= 12; $i++) {
            if ($i < 10) {
                $bulan = '0' . $i . '-' . $tahun;
            } else {
                $bulan = $i . '-' . $tahun;
            }
            $data['bulan'][] = $bulan;
            $data['data'][] = $this->model->chart_transaksi($bulan);
        }
        echo json_encode($data);
    }
    // use for setting menu
    public function setting(Type $var = null)
    {
        $checkDiscount = $this->model->find_data('tb_setting', 'setting_name', 'discount')->row();
        if ($checkDiscount == null) {
            $insert = [
                'setting_name' => 'discount',
                'value' => json_encode([
                    'minimal_transaksi' => 0,
                    'persentase_discount' => 0,
                ]),
            ];
            $create = $this->model->create_data('tb_setting', $insert);
            $insert['id_setting'] = $create;
            $data['discount'] = (object) $insert;
        } else {
            $data['discount'] = $checkDiscount;
        }
        $this->menu('admin/setting', $data);
    }
    // use for update setting
    public function update_setting(Type $var = null)
    {
        $update = [
            'value' => json_encode([
                'minimal_transaksi' => $this->input->post('minimal_transaksi'),
                'persentase_discount' => $this->input->post('persentase_discount'),
            ]),
        ];
        $this->model->update_data('tb_setting', 'id_setting', $this->input->post('id_setting'), $update);
        echo json_encode(['status' => 'success', 'update' => $update]);
    }

}
