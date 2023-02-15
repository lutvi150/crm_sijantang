-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2023 pada 03.16
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bukti_bayar`
--

CREATE TABLE `tb_bukti_bayar` (
  `id_bukti_bayar` varchar(20) NOT NULL,
  `nomor_transaksi` varchar(50) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_upload` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bukti_bayar`
--

INSERT INTO `tb_bukti_bayar` (`id_bukti_bayar`, `nomor_transaksi`, `bukti_bayar`, `alasan`, `tgl_upload`) VALUES
('BB020220230001', '020220230001', 'upload/original_image/600a37a40cff96d47ef7bcfdc3b25e1a.jpg', '-', '02-02-2023'),
('BB030220230001', '030220230001', 'upload/original_image/4977f8cdc840a06b2c7090dfd968aea5.jpg', 'Stok barang Cuci piring Sudah habis', '03-02-2023'),
('BB070120200001', '070120200003', 'upload/original_image/a5b35fe6a17aad42533b4f8d5ee3f127.png', '-', '07-01-2020'),
('BB070220230001', '030220230001', 'upload/original_image/6bc1b97589d9917366f72e1f519914f9.jpg', '-', '07-02-2023'),
('BB241120190001', '161120190001', '/upload/thumb_image/068238f4236b06212f86f90e7f2d86fc.jpg', '-', '24-11-2019'),
('BB241120190002', '161120190001', '/upload/thumb_image/4d199ce5dbf9eec20d767f6d3203eef3.jpg', '-', '24-11-2019'),
('BB241120190003', '161120190002', '/upload/thumb_image/1123913bf5e72a4c7d3d41827637375b.png', '-', '24-11-2019'),
('BB241120190004', '241120190001', '/upload/thumb_image/6f6f0cccfe4409297e6eab17bc2ea996.png', 'bukti bayar palsu ', '24-11-2019'),
('BB310120230001', '310120230001', 'upload/original_image/a44a8635423277066743fa1bad944e6d.jpg', '-', '31-01-2023'),
('BB310120230002', '310120230002', 'upload/original_image/a80e1b11ef6232055d5a12c5ba8e5a0d.jpg', '-', '31-01-2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id_chat` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `sumber` varchar(50) DEFAULT NULL,
  `tanggal_chat` varchar(50) DEFAULT NULL,
  `chat` text DEFAULT NULL,
  `status_baca` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_chat`
--

INSERT INTO `tb_chat` (`id_chat`, `id_user`, `sumber`, `tanggal_chat`, `chat`, `status_baca`) VALUES
(1, 15, 'user', '02 Feb 2023 20:22:38', 'maaf produk yang anda jual kualitas masih kurang baik sabunnya pun kurang harum', '1'),
(2, 15, 'admin', '02 Feb 2023 20:23:18', 'baik ibuk', '1'),
(3, 15, 'user', '03 Feb 2023 10:16:21', 'apakah produk sabun masih tersedia ibu', '1'),
(4, 15, 'admin', '03 Feb 2023 10:17:30', 'masih ibuk selanjutnya cek saja pada produk kami', '1'),
(5, 15, 'admin', '03 Feb 2023 10:20:23', 'produk yang tawarkan menggunakan bahan dengan kualitas baik', '1'),
(6, 15, 'user', '03 Feb 2023 10:21:48', 'wah apa saja buk bsa kah menjelaskannya kepada saya', '1'),
(7, 15, 'admin', '03 Feb 2023 10:22:35', 'kami menggunakan produk minyak yang tidak membuat kering', '1'),
(8, 15, 'admin', '03 Feb 2023 10:23:00', 'juga produk sabun kami mimiliki banyak busa dan tahan ', '1'),
(9, 15, 'admin', '03 Feb 2023 10:23:55', 'harganyapun sedang dalam masa dicount yuuk silahkan ibuk untuk membeli produk kami ini mumpung harga yang ditawarkan sedang miring', '1'),
(10, 15, 'user', '03 Feb 2023 10:24:31', 'baik ibuk saya tertarik untuk membeli produk yang ibu tawarkan tadi', '0'),
(11, 15, 'user', '03 Feb 2023 10:24:52', 'saya akan pergi ke keranjang dulu ya buk terimakasih', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_diri_user`
--

CREATE TABLE `tb_data_diri_user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_data_diri_user`
--

INSERT INTO `tb_data_diri_user` (`id_user`, `nama`, `alamat`, `username`, `no_hp`, `foto`) VALUES
(1, 'saya', 'Piliang Batusangkar', 'saya', '082285498049', '/upload/thumb_image/5788a2eff9d09cee4fe8d3bbe38ae3af.jpg'),
(2, 'saya2', 'Padang\r\nPadang', 'saya2', '082285498005', '/upload/thumb_image/5788a2eff9d09cee4fe8d3bbe38ae3af.jpg'),
(3, 'mahmudi', 'adada', 'mahmudi', '082285498049', 'upload/original_image/298d1eb89781829b8a46ae32a74adfaa.png'),
(4, 'andi', 'andi', 'andi', 'andi', 'upload/original_image/de73fb66b53e825fd6b2f18f186ab1cf.png'),
(5, 'Rendi', 'Padang', 'rendi', '082285498003', 'upload/original_image/99a90e5859e4161262bbf39395293f93.jpg'),
(6, 'rudi', 'padang', 'rudi', '082285498003', 'upload/original_image/ab628f0837c0c938ffd6719e29781688.jpg'),
(7, 'Hadi', 'Padang Provinsi Sumatera Barat', 'hadi', '082285498004', 'upload/original_image/241f02dff4d849c9261153c1c76b3dd7.jpg'),
(8, 'sara', 'limau manih', 'sara', '089658635226', 'upload/original_image/b16ba53fe35c93ccd69ea2fc596cb0ae.jpg'),
(9, 'dina', 'batusangkar', 'dina', '089376462682', 'error'),
(10, 'rio', 'sijantang', 'rio', '08965432341', 'error');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_feedback_transaksi`
--

CREATE TABLE `tb_feedback_transaksi` (
  `id_feedback` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `id_produk` int(20) DEFAULT NULL,
  `rate` varchar(5) DEFAULT NULL,
  `komentar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_foto_produk`
--

CREATE TABLE `tb_foto_produk` (
  `id_foto_produk` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(20) DEFAULT NULL,
  `foto_produk` varchar(255) DEFAULT NULL,
  `foto_unggulan` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_foto_produk`
--

INSERT INTO `tb_foto_produk` (`id_foto_produk`, `id_produk`, `foto_produk`, `foto_unggulan`) VALUES
(1, 3, 'upload/9352e32d179bff8332d520957047c0d7.PNG', '0'),
(5, 3, 'upload/bf194e6f905fab22f297138abfd64f8f.PNG', '1'),
(7, 4, 'upload/fa1fb2f7ca35182aff7dc8faefeea6e1.jpeg', '0'),
(8, 4, 'upload/ed8a098e4018657816f917b6ced646a0.jpeg', '0'),
(9, 4, 'upload/e51b9e10583097f593b5c038a4ae3acd.jpeg', '1'),
(10, 5, 'upload/ef60ea9d0220209a14ab99dce6bdaab7.jpg', '1'),
(11, 6, 'upload/323899d3a4543a4f6c66e7cdf8d96475.jpg', '1'),
(12, 7, 'upload/b1ba1ccf1e843ddbc22fbf8d3fdc960b.jpeg', '1'),
(13, 8, 'upload/dc85465675c549d0c4a4de6e83ec4c26.jpg', '1'),
(14, 9, 'upload/af41b68188953ca0b0cd03b6af2d7d58.jpg', '0'),
(15, 10, 'upload/c108b9e440b8f1c2d84b3deacd9c290a.jpg', '1'),
(16, 11, 'upload/45ce75b3b604fd7913932a6e76f481bb.jpeg', '1'),
(17, 12, 'upload/a4a64fa8cee90e96f06f08ee624d5614.jpeg', '1'),
(18, 13, 'upload/819df69acb59e24515c2964323774a84.jpg', '1'),
(19, 14, 'upload/d412f06cbf5f617f1ff561eb2ba000cd.jpeg', '1'),
(20, 9, 'upload/bdc0c69d6c099dbfbb767d50ef51afaa.jpg', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(10) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `jumlah_pesan` varchar(30) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `tgl_input` varchar(30) NOT NULL,
  `nomor_transaksi` varchar(30) NOT NULL,
  `status_item` varchar(30) NOT NULL,
  `total_harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_produk`, `jumlah_pesan`, `id_user`, `tgl_input`, `nomor_transaksi`, `status_item`, `total_harga`) VALUES
(1, '2', '13', 'saya', '29-01-2020', '290120200001', 'Finish', '39000'),
(2, '2', '13', 'saya', '29-01-2020', '290120200001', 'Finish', '39000'),
(3, '3', '3', 'rudi', '31-01-2023', '310120230001', 'Finish', '90000'),
(4, '3', '2', 'rudi', '31-01-2023', '310120230001', 'Finish', '60000'),
(5, '4', '4', 'hadi', '31-01-2023', '310120230002', 'Finish', '360000'),
(6, '3', '1', 'hadi', '31-01-2023', '310120230002', 'Finish', '30000'),
(7, '5', '2', 'sara', '31-01-2023', '310120230003', 'Finish', '50000'),
(8, '5', '2', 'sara', '31-01-2023', '310120230003', 'Finish', '50000'),
(10, '5', '1', 'dina', '02-02-2023', '020220230001', 'Finish', '25000'),
(11, '14', '1', 'dina', '03-02-2023', '030220230001', 'Finish', '3000'),
(12, '14', '1', 'dina', '03-02-2023', '030220230002', 'Finish', '3000'),
(13, '14', '3', 'dina', '03-02-2023', '030220230003', 'Finish', '9000'),
(14, '8', '1', 'rio', '12-02-2023', '120220230001', 'Finish', '13000'),
(15, '11', '6', 'rio', '12-02-2023', '120220230001', 'Finish', '7800'),
(16, '8', '1', 'rio', '13-02-2023', '130220230001', 'Finish', '13000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_modal` int(20) DEFAULT NULL,
  `stock` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `keterangan`, `jenis`, `harga_jual`, `satuan`, `harga_modal`, `stock`) VALUES
(6, 'Gas Elpiji', 'Produk inimempunyai garansi apabila tidak bisa dipasang pada regulator anda dapat ditukar kembali dengan syarat belum digunakan', 'Peralatan Rumah Tangga', 22000, 'Tabung', 22000, 6),
(7, 'Minyak Tanak (Minyak Harum Kelapa)', 'Produk ini dibuat dengan Santan Kelapa asli\r\nKetahanan Produk hanya berlaku sampai dengan 6 bulan apabila diluar Kulkas\r\nApabila didalam kulkas bisa tahan lebih dari 1 tahun', 'Makanan', 23000, 'Botol', 23000, 7),
(8, 'Rendang Telur', 'Rendang telur dibuat dengan bahan pilihan menggunakan telur bebek aslii dengan banyak campuran rempah-rempah\r\nRendang Telur sangat gurih walaupun sudah lama dalam masa penyimpanan\r\nSatu bungkus beratnya 250 gr', 'Makanan', 13000, 'Bungkus', 13000, 13),
(9, 'Beras', 'Beras ini merupakan Tipe Simeru yang pulen dan enak juga berasnya panjang-panjang\r\nDitanam di sawah sendiri dengan minim penggunaan peptisida', 'Makanan', 10000, 'Liter', 10000, 35),
(10, 'Telur Itik', 'Telur ini berasal dari itik lepas yang mengandung Kuning telur yang berwarna orange', 'Bahan Mentah', 2300, 'Butir', 2300, 28),
(11, 'Telur Ayam Buras', 'Telur ayam ini diambil dari Kandang warga sendiri \r\nukuran telur jumbo', 'Bahan Mentah', 1300, 'Butir', 1300, 35),
(12, 'Serabi', 'Serabi ini dimasak setiap hari sehingga rasanya dijamin enak\r\nMenggunakan bahan yang Fresh setiap harinya \r\nDapat diorder untuk hidangan pada berbagai acara', 'Makanan', 800, 'Bungkus', 800, 19),
(13, 'Tas Botol', 'Tas ini dibuat dengan menggunakan barang daur ulang yaitu botol aqua gelas\r\ndaya tahan tas ini mampu membawa barang hingga 10kg\r\nWarna dan desain dapat dtentukan oleh pelanggan', 'Aksesoris', 34000, 'Pieces', 32000, 6),
(14, 'Sabun Cuci Piring', 'Sabun cuci ini memiki busa yang melimpah dan harum\r\nsabun ini juga tidak kasar untuk tangan', 'Peralatan Rumah Tangga', 3000, 'Botol', 3000, 16),
(15, '-', '-', '-', 0, '-', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id_setting` bigint(20) UNSIGNED NOT NULL,
  `setting_name` varchar(50) DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_setting`
--

INSERT INTO `tb_setting` (`id_setting`, `setting_name`, `value`) VALUES
(2, 'discount', '{\"minimal_transaksi\":0,\"persentase_discount\":0}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `nomor_transaksi` varchar(30) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `total_tagihan` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_transaksi` varchar(30) NOT NULL,
  `tgl_selesai` varchar(30) NOT NULL,
  `id_bukti_bayar` varchar(20) NOT NULL,
  `jenis_transaksi` varchar(20) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `ongkir` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `nomor_transaksi`, `id_user`, `total_tagihan`, `status`, `tgl_transaksi`, `tgl_selesai`, `id_bukti_bayar`, `jenis_transaksi`, `bank`, `status_bayar`, `ongkir`, `alamat`) VALUES
(1, '290120200001', 'saya', '39000', 'B', '29-01-2020', '-', '-', 'Biasa', 'mandiri', '', '5900', 'Provinsi Sumatera Utara KabupatenKAB. TAPANULI UTARA Kecamatan 1'),
(2, '310120230001', 'rudi', '60000', 'F', '31-01-2023', '31-01-2023', 'BB310120230001', 'Biasa', 'bri', '', '0', 'Di kirim atas nama rudi Dengan nomor kontak :082285498003 Alamat pengiriman:padang'),
(3, '310120230002', 'hadi', '390000', 'F', '31-01-2023', '31-01-2023', 'BB310120230002', 'Biasa', 'bri', '', '0', 'Di kirim atas nama Hadi Dengan nomor kontak :082285498004 Alamat pengiriman:Padang Provinsi Sumatera Barat'),
(4, '020220230001', 'dina', '25000', 'F', '02-02-2023', '03-02-2023', 'BB020220230001', 'Biasa', 'bri', '', '0', 'Di kirim atas nama dina Dengan nomor kontak :089376462682 Alamat pengiriman:batusangkar'),
(5, '030220230001', 'dina', '3000', 'L', '03-02-2023', '-', 'BB070220230001', 'Biasa', 'bri', '', '0', 'Di kirim atas nama dina Dengan nomor kontak :089376462682 Alamat pengiriman:batusangkar'),
(6, '030220230002', 'dina', '3000', 'B', '03-02-2023', '-', '-', 'Biasa', 'bri', '', '0', 'Di kirim atas nama dina Dengan nomor kontak :089376462682 Alamat pengiriman:batusangkar'),
(7, '030220230003', 'dina', '9000', 'B', '03-02-2023', '-', '-', 'Biasa', 'bri', '', '0', 'Di kirim atas nama dina Dengan nomor kontak :089376462682 Alamat pengiriman:batusangkar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status_data` varchar(10) NOT NULL,
  `tgl_registrasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `status_data`, `tgl_registrasi`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Belum', '25-09-2019'),
(9, 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46', 'pelanggan', 'Sudah', '07-01-2020'),
(11, 'rudi', '1755e8df56655122206c7c1d16b1c7e3', 'pelanggan', 'Sudah', '31-01-2023'),
(12, 'judika', '8514244b167cf32ca2174771c5546aa1', 'pelanggan', 'Belum', '31-01-2023'),
(14, 'hadi', '76671d4b83f6e6f953ea2dfb75ded921', 'pelanggan', 'Sudah', '31-01-2023'),
(15, 'dina', 'e274648aed611371cf5c30a30bbe1d65', 'pelanggan', 'Sudah', '31-01-2023'),
(16, 'bara', '35dd129e9cd44c21dcd4ddf2c30adf78', 'pelanggan', 'Belum', '31-01-2023'),
(18, 'rio', 'd5ed38fdbf28bc4e58be142cf5a17cf5', 'pelanggan', 'Sudah', '05-02-2023');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
  ADD PRIMARY KEY (`id_bukti_bayar`);

--
-- Indeks untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD UNIQUE KEY `id_chat` (`id_chat`);

--
-- Indeks untuk tabel `tb_data_diri_user`
--
ALTER TABLE `tb_data_diri_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_feedback_transaksi`
--
ALTER TABLE `tb_feedback_transaksi`
  ADD UNIQUE KEY `id_feedback` (`id_feedback`);

--
-- Indeks untuk tabel `tb_foto_produk`
--
ALTER TABLE `tb_foto_produk`
  ADD UNIQUE KEY `id_foto_produk` (`id_foto_produk`);

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD UNIQUE KEY `id` (`id_setting`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id_chat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_data_diri_user`
--
ALTER TABLE `tb_data_diri_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_feedback_transaksi`
--
ALTER TABLE `tb_feedback_transaksi`
  MODIFY `id_feedback` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_foto_produk`
--
ALTER TABLE `tb_foto_produk`
  MODIFY `id_foto_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_setting` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
