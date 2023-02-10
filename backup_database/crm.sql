/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `tb_bukti_bayar` (
  `id_bukti_bayar` varchar(20) NOT NULL,
  `nomor_transaksi` varchar(50) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_upload` varchar(20) NOT NULL,
  PRIMARY KEY (`id_bukti_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_chat` (
  `id_chat` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(20) DEFAULT NULL,
  `sumber` varchar(50) DEFAULT NULL,
  `tanggal_chat` varchar(50) DEFAULT NULL,
  `chat` text,
  `status_baca` varchar(2) DEFAULT NULL,
  UNIQUE KEY `id_chat` (`id_chat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

CREATE TABLE `tb_data_diri_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

CREATE TABLE `tb_feedback_transaksi` (
  `id_feedback` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(20) DEFAULT NULL,
  `id_produk` int(20) DEFAULT NULL,
  `rate` varchar(5) DEFAULT NULL,
  `komentar` text,
  UNIQUE KEY `id_feedback` (`id_feedback`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_foto_produk` (
  `id_foto_produk` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_produk` int(20) DEFAULT NULL,
  `foto_produk` varchar(255) DEFAULT NULL,
  `foto_unggulan` varchar(2) DEFAULT NULL,
  UNIQUE KEY `id_foto_produk` (`id_foto_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(10) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(30) NOT NULL,
  `jumlah_pesan` varchar(30) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `tgl_input` varchar(30) NOT NULL,
  `nomor_transaksi` varchar(30) NOT NULL,
  `status_item` varchar(30) NOT NULL,
  `total_harga` varchar(30) NOT NULL,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

CREATE TABLE `tb_produk` (
  `id_produk` int(20) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_modal` int(20) DEFAULT NULL,
  `stock` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE `tb_setting` (
  `id_setting` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(20) DEFAULT NULL,
  `value` json DEFAULT NULL,
  UNIQUE KEY `id_setting` (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
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
  `alamat` text NOT NULL,
  `discount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status_data` varchar(10) NOT NULL,
  `tgl_registrasi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO `tb_bukti_bayar` (`id_bukti_bayar`, `nomor_transaksi`, `bukti_bayar`, `alasan`, `tgl_upload`) VALUES
('BB070120200001', '070120200003', 'upload/original_image/a5b35fe6a17aad42533b4f8d5ee3f127.png', '-', '07-01-2020');
INSERT INTO `tb_bukti_bayar` (`id_bukti_bayar`, `nomor_transaksi`, `bukti_bayar`, `alasan`, `tgl_upload`) VALUES
('BB090220230001', '090220230001', 'upload/original_image/fea444ac6104f084046d749f5ad0e987.jpg', '-', '09-02-2023');
INSERT INTO `tb_bukti_bayar` (`id_bukti_bayar`, `nomor_transaksi`, `bukti_bayar`, `alasan`, `tgl_upload`) VALUES
('BB090220230002', '090220230002', 'upload/original_image/303ec07faaef6fa41446c4871f6f678c.jpg', '-', '09-02-2023');
INSERT INTO `tb_bukti_bayar` (`id_bukti_bayar`, `nomor_transaksi`, `bukti_bayar`, `alasan`, `tgl_upload`) VALUES
('BB241120190001', '161120190001', '/upload/thumb_image/068238f4236b06212f86f90e7f2d86fc.jpg', '-', '24-11-2019'),
('BB241120190002', '161120190001', '/upload/thumb_image/4d199ce5dbf9eec20d767f6d3203eef3.jpg', '-', '24-11-2019'),
('BB241120190003', '161120190002', '/upload/thumb_image/1123913bf5e72a4c7d3d41827637375b.png', '-', '24-11-2019'),
('BB241120190004', '241120190001', '/upload/thumb_image/6f6f0cccfe4409297e6eab17bc2ea996.png', 'bukti bayar palsu ', '24-11-2019'),
('BB310120230001', '310120230001', 'upload/original_image/a44a8635423277066743fa1bad944e6d.jpg', '-', '31-01-2023'),
('BB310120230002', '310120230002', 'upload/original_image/a80e1b11ef6232055d5a12c5ba8e5a0d.jpg', '-', '31-01-2023');

INSERT INTO `tb_chat` (`id_chat`, `id_user`, `sumber`, `tanggal_chat`, `chat`, `status_baca`) VALUES
(1, 14, 'user', '02 Feb 2023 17:39:12', 'tesss', '1');
INSERT INTO `tb_chat` (`id_chat`, `id_user`, `sumber`, `tanggal_chat`, `chat`, `status_baca`) VALUES
(2, 14, 'user', '02 Feb 2023 17:55:23', 'tesss', '1');
INSERT INTO `tb_chat` (`id_chat`, `id_user`, `sumber`, `tanggal_chat`, `chat`, `status_baca`) VALUES
(3, 14, 'user', '02 Feb 2023 17:58:15', 'makan nasi', '1');
INSERT INTO `tb_chat` (`id_chat`, `id_user`, `sumber`, `tanggal_chat`, `chat`, `status_baca`) VALUES
(4, 14, 'user', '02 Feb 2023 17:58:20', '', '1'),
(5, 11, 'user', '02 Feb 2023 18:11:51', 'hi admin, saya butuh bantuan', '1'),
(6, 11, 'admin', '02 Feb 2023 18:40:42', 'ya apa yang bisa saya bantu', '1'),
(7, 14, 'admin', '02 Feb 2023 18:41:31', 'baik, kendalanya akan kami proses', '1');

INSERT INTO `tb_data_diri_user` (`id_user`, `nama`, `alamat`, `username`, `no_hp`, `foto`) VALUES
(1, 'saya', 'Piliang Batusangkar', 'saya', '082285498049', '/upload/thumb_image/5788a2eff9d09cee4fe8d3bbe38ae3af.jpg');
INSERT INTO `tb_data_diri_user` (`id_user`, `nama`, `alamat`, `username`, `no_hp`, `foto`) VALUES
(2, 'saya2', 'Padang\r\nPadang', 'saya2', '082285498005', '/upload/thumb_image/5788a2eff9d09cee4fe8d3bbe38ae3af.jpg');
INSERT INTO `tb_data_diri_user` (`id_user`, `nama`, `alamat`, `username`, `no_hp`, `foto`) VALUES
(3, 'mahmudi', 'adada', 'mahmudi', '082285498049', 'upload/original_image/298d1eb89781829b8a46ae32a74adfaa.png');
INSERT INTO `tb_data_diri_user` (`id_user`, `nama`, `alamat`, `username`, `no_hp`, `foto`) VALUES
(4, 'andi', 'andi', 'andi', 'andi', 'upload/original_image/de73fb66b53e825fd6b2f18f186ab1cf.png'),
(5, 'Rendi', 'Padang', 'rendi', '082285498003', 'upload/original_image/99a90e5859e4161262bbf39395293f93.jpg'),
(6, 'rudi', 'padang', 'rudi', '082285498003', 'upload/original_image/ab628f0837c0c938ffd6719e29781688.jpg'),
(7, 'Hadi', 'Padang Provinsi Sumatera Barat', 'hadi', '082285498004', 'upload/original_image/241f02dff4d849c9261153c1c76b3dd7.jpg');



INSERT INTO `tb_foto_produk` (`id_foto_produk`, `id_produk`, `foto_produk`, `foto_unggulan`) VALUES
(1, 3, 'upload/9352e32d179bff8332d520957047c0d7.PNG', '0');
INSERT INTO `tb_foto_produk` (`id_foto_produk`, `id_produk`, `foto_produk`, `foto_unggulan`) VALUES
(5, 3, 'upload/bf194e6f905fab22f297138abfd64f8f.PNG', '1');
INSERT INTO `tb_foto_produk` (`id_foto_produk`, `id_produk`, `foto_produk`, `foto_unggulan`) VALUES
(7, 4, 'upload/fa1fb2f7ca35182aff7dc8faefeea6e1.jpeg', '0');
INSERT INTO `tb_foto_produk` (`id_foto_produk`, `id_produk`, `foto_produk`, `foto_unggulan`) VALUES
(8, 4, 'upload/ed8a098e4018657816f917b6ced646a0.jpeg', '0'),
(9, 4, 'upload/e51b9e10583097f593b5c038a4ae3acd.jpeg', '1');

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_produk`, `jumlah_pesan`, `id_user`, `tgl_input`, `nomor_transaksi`, `status_item`, `total_harga`) VALUES
(1, '2', '13', 'saya', '29-01-2020', '290120200001', 'Finish', '39000');
INSERT INTO `tb_keranjang` (`id_keranjang`, `id_produk`, `jumlah_pesan`, `id_user`, `tgl_input`, `nomor_transaksi`, `status_item`, `total_harga`) VALUES
(2, '2', '13', 'saya', '29-01-2020', '290120200001', 'Finish', '39000');
INSERT INTO `tb_keranjang` (`id_keranjang`, `id_produk`, `jumlah_pesan`, `id_user`, `tgl_input`, `nomor_transaksi`, `status_item`, `total_harga`) VALUES
(3, '3', '3', 'rudi', '31-01-2023', '310120230001', 'Finish', '90000');
INSERT INTO `tb_keranjang` (`id_keranjang`, `id_produk`, `jumlah_pesan`, `id_user`, `tgl_input`, `nomor_transaksi`, `status_item`, `total_harga`) VALUES
(4, '3', '2', 'rudi', '31-01-2023', '310120230001', 'Finish', '60000'),
(5, '4', '4', 'hadi', '31-01-2023', '310120230002', 'Finish', '360000'),
(6, '3', '1', 'hadi', '31-01-2023', '310120230002', 'Finish', '30000'),
(7, '4', '1', 'hadi', '09-02-2023', '090220230001', 'Finish', '90000'),
(8, '4', '3', 'hadi', '09-02-2023', '090220230001', 'Finish', '270000'),
(9, '4', '1', 'hadi', '09-02-2023', '090220230001', 'Finish', '90000'),
(10, '4', '3', 'hadi', '09-02-2023', '090220230001', 'Finish', '270000'),
(11, '4', '2', 'hadi', '09-02-2023', '090220230002', 'Finish', '180000');

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `keterangan`, `jenis`, `harga_jual`, `satuan`, `harga_modal`, `stock`) VALUES
(2, 'Jaguang', 'Isi dengan detail products', 'Kotak', 3000, 'Kilo', 2900, NULL);
INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `keterangan`, `jenis`, `harga_jual`, `satuan`, `harga_modal`, `stock`) VALUES
(3, 'Produk 1', 'Makanan khas desa sijantang', 'makanan', 30000, 'Makanan khas desa sijantang', 30000, 10);
INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `keterangan`, `jenis`, `harga_jual`, `satuan`, `harga_modal`, `stock`) VALUES
(4, 'Masakan Ikan', 'Bahan dari ikan pilhan, rasanya peda,', 'Makanan', 90000, 'Bahan dari ikan pilhan, rasanya peda,', 90000, 90);
INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `keterangan`, `jenis`, `harga_jual`, `satuan`, `harga_modal`, `stock`) VALUES
(5, '-', '-', '-', 0, '-', 0, 0);

INSERT INTO `tb_setting` (`id_setting`, `setting_name`, `value`) VALUES
(1, 'discount', '{\"minimal_transaksi\": \"3\", \"persentase_discount\": \"30\"}');


INSERT INTO `tb_transaksi` (`id_transaksi`, `nomor_transaksi`, `id_user`, `total_tagihan`, `status`, `tgl_transaksi`, `tgl_selesai`, `id_bukti_bayar`, `jenis_transaksi`, `bank`, `status_bayar`, `ongkir`, `alamat`, `discount`) VALUES
(1, '290120200001', 'saya', '39000', 'B', '29-01-2020', '-', '-', 'Biasa', 'mandiri', '', '5900', 'Provinsi Sumatera Utara KabupatenKAB. TAPANULI UTARA Kecamatan 1', NULL);
INSERT INTO `tb_transaksi` (`id_transaksi`, `nomor_transaksi`, `id_user`, `total_tagihan`, `status`, `tgl_transaksi`, `tgl_selesai`, `id_bukti_bayar`, `jenis_transaksi`, `bank`, `status_bayar`, `ongkir`, `alamat`, `discount`) VALUES
(2, '310120230001', 'rudi', '60000', 'F', '31-01-2023', '31-01-2023', 'BB310120230001', 'Biasa', 'bri', '', '0', 'Di kirim atas nama rudi Dengan nomor kontak :082285498003 Alamat pengiriman:padang', NULL);
INSERT INTO `tb_transaksi` (`id_transaksi`, `nomor_transaksi`, `id_user`, `total_tagihan`, `status`, `tgl_transaksi`, `tgl_selesai`, `id_bukti_bayar`, `jenis_transaksi`, `bank`, `status_bayar`, `ongkir`, `alamat`, `discount`) VALUES
(3, '310120230002', 'hadi', '390000', 'F', '31-01-2023', '31-01-2023', 'BB310120230002', 'Biasa', 'bri', '', '0', 'Di kirim atas nama Hadi Dengan nomor kontak :082285498004 Alamat pengiriman:Padang Provinsi Sumatera Barat', NULL);
INSERT INTO `tb_transaksi` (`id_transaksi`, `nomor_transaksi`, `id_user`, `total_tagihan`, `status`, `tgl_transaksi`, `tgl_selesai`, `id_bukti_bayar`, `jenis_transaksi`, `bank`, `status_bayar`, `ongkir`, `alamat`, `discount`) VALUES
(4, '090220230001', 'hadi', '270000', 'F', '09-02-2023', '08-02-2023', 'BB090220230001', 'Biasa', 'bri', '', '0', 'Di kirim atas nama Hadi Dengan nomor kontak :082285498004 Alamat pengiriman:Padang Provinsi Sumatera Barat', '0'),
(5, '090220230002', 'hadi', '180000', 'F', '09-02-2023', '02-02-2023', 'BB090220230002', 'Biasa', 'bri', '', '0', 'Di kirim atas nama Hadi Dengan nomor kontak :082285498004 Alamat pengiriman:Padang Provinsi Sumatera Barat', '0');

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `status_data`, `tgl_registrasi`) VALUES
(1, '12', '21232f297a57a5a743894a0e4a801fc3', 'pelanggan', 'Belum', '24-09-2019');
INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `status_data`, `tgl_registrasi`) VALUES
(2, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'pelanggan', 'Belum', '24-09-2019');
INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `status_data`, `tgl_registrasi`) VALUES
(3, '13', 'c51ce410c124a10e0db5e4b97fc2af39', 'pelanggan', 'sudah', '25-09-2019');
INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `status_data`, `tgl_registrasi`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Belum', '25-09-2019'),
(5, 'saya', '20c1a26a55039b30866c9d0aa51953ca', 'pelanggan', 'Sudah', '25-10-2019'),
(6, 'saya2', 'b8fb98698faf6e84aeaed82a0abc9f15', 'pelanggan', 'Sudah', '25-10-2019'),
(7, 'mahmudi', 'c076347da1f53515da5a1cfbe794247c', 'pelanggan', 'Sudah', '24-11-2019'),
(8, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'pelanggan', 'Belum', '15-12-2019'),
(9, 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46', 'pelanggan', 'Sudah', '07-01-2020'),
(10, 'antoni', 'db5489b0b7e667a8faff8075f84ab955', 'pelanggan', 'Belum', '31-01-2023'),
(11, 'rudi', '1755e8df56655122206c7c1d16b1c7e3', 'pelanggan', 'Sudah', '31-01-2023'),
(12, 'judika', '8514244b167cf32ca2174771c5546aa1', 'pelanggan', 'Belum', '31-01-2023'),
(13, 'rendi', 'd209fc47646bba5e5fdc3d3bbaad4b9c', 'pelanggan', 'Sudah', '31-01-2023'),
(14, 'hadi', '76671d4b83f6e6f953ea2dfb75ded921', 'pelanggan', 'Sudah', '31-01-2023');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;