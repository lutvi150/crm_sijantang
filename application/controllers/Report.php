<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelProduk', 'produk');

    }

    public function cetak_produk()
    {
        $data['judul'] = 'LAPORAN DATA PRODUK';
        $data['produk'] = $this->produk->get_produk();
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $mpdf->SetTitle('Laporan Produk');
        $mpdf->SetAuthor('Laporan Produk');
        $mpdf->SetCreator('Laporan Produk');
        $mpdf->SetDisplayMode('fullpage');
        // $mpdf->SetWatermarkText('Laporan Produk');
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($this->load->view('report/printDataProduk', $data, true));
        $mpdf->Output('Laporan Produk.pdf', 'I');
        // echo json_encode($data['kartu']);
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
        $data['judul'] = 'Laporan ' . $status_data;
        $data['transaksi'] = $data_transaksi;
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $mpdf->SetTitle('Laporan Tranksaksi');
        $mpdf->SetAuthor('Laporan Tranksaksi');
        $mpdf->SetCreator('Laporan Tranksaksi');
        $mpdf->SetDisplayMode('fullpage');
        // $mpdf->SetWatermarkText('Laporan Tranksaksi');
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($this->load->view('report/printTransaksi', $data, true));
        $mpdf->Output('Laporan Tranksaksi.pdf', 'I');
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
        $data['judul'] = 'Laporan ' . $status_data;
        $data['data_user'] = $data_user;
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $mpdf->SetTitle('Laporan Data User');
        $mpdf->SetAuthor('Laporan Data User');
        $mpdf->SetCreator('Laporan Data User');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($this->load->view('report/printUser', $data, true));
        $mpdf->Output('Laporan Data User.pdf', 'I');
    }

}

/* End of file  Report.php */
