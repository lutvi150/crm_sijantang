<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Transaksi Anda

		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">



				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Transaksi</h3>
					</div>
					<!-- /.box-header -->

					<div class="box-body">

						<!-- <p class="text-muted font-13 m-b-30">
							<a href="" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>
								Cetak Keseluruhan</a>
							<a href="#" class="btn btn-danger btn-sm " data-target="cetak-per-tahun"><i class="fa fa-print"></i> Cetak
								Laporan Pertahun</a>
							<a href="#" data-toggle="modal" data-target="#modal_per_bulan"
								class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Cetak Laporan Perbulan</a> -->

						</p>
						<!-- <a href="<?=base_url();?>admin/cetak_user" target="_blank"
									class="btn btn-primary "><i class="fa fa-print"></i> Cetak Data</a> -->
									<?php if ($this->session->userdata('error')): ?>
              <div id="message_error" class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Maaf !</h4>
                  <?php echo $this->session->userdata('error'); ?>
              </div>
              <?php elseif ($this->session->userdata('success')): ?>
              <div id="message_success" class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Success !</h4>
                  <?php echo $this->session->userdata('success'); ?>
              </div>
              <?php endif;?>
						<table id="example1" class="table table-bordered table-striped wrap example1">

							<thead>

								<tr>
									<th style="width:20px">NO</th>
									<th style="width:20px" class="text-center">Nomor Transaksi</th>
									<th style="width:20px" class="text-center">Detail Pesanan(Klik Untuk Lihat)</th>
									<th style="width: 20px;" class="text-center" >Tanggal Pesan</th>
									<th style="width:20px" class="text-center">Tanggal Selesai</th>
									<th style="width: 20px;" class="text-center">Total Tagihan</th>
									<th style="width: 20px" class="text-center">Status</th>
									<th style="width: 20px;" class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
$no = 1;
foreach ($transaksi as $field2):
?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$field2['nomor_transaksi']?></td>
									<td><a href="#" data="<?=$field2['nomor_transaksi']?>" class="btn btn-info btn-xs detail-pesanan"><i class="fa fa-search"></i>Detail Pesanan</a></td>
									<td><?=$field2['tgl_transaksi']?></td>
									<td><?=$field2['tgl_selesai']?></td>
									<td>Rp. <?=$field2['total_tagihan'] + $field2['ongkir']?></td>
									<td>
									<?php if ($field2['status'] == 'B'): ?>
										<span class="label label-warning">Menunggu Pembayaran</span>
										<?php elseif ($field2['status'] == 'K'): ?>
										<span class="label label-danger">Konfirmasi Pembayaran</span>
										<?php elseif ($field2['status'] == 'L'): ?>
										<span class="label label-success"> Lunas</span>
										<?php elseif ($field2['status'] == 'P'): ?>
										<span class="label label-success"> Proses Pengerjaan</span><br>
									<label for="">	Selesai Tanggal : <?=$field2['tgl_selesai']?></label>
									<?php elseif ($field2['status'] == 'F'): ?>
										<span class="label label-success"> Finish</span><br>
										<?php endif;?>
									</td>
									<td>
									<?php if ($field2['status'] == 'B'): ?>
										<a href="#" class="btn btn-success btn-xs upload-bukti" data="<?=$field2['nomor_transaksi']?>"><i class="fa fa-upload"></i> Upload Bukti Bayar</a>

									<?php endif;?>
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>

						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>

<!-- Modal  detail pesanan-->
<div class="modal fade" id="detail_pesanan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title tulisan">Detail Pesanan<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>

			</div>
			<div class="modal-body">
			<table class="table table-bordered">
						<thead>
							<th>Nama Barang</th>
							<th>Harga Satuan</th>
							<th>Jumlah Pesan</th>
							<th>Total Harga</th>
						</thead>
						<tbody class="banyak_barang">

						</tbody>
						<tfoot>
							<th>

							Terbilang
							</th>
							<th id="terbilang" colspan="6" class="text-right">
								Tiga Puluh Juta Rupiah
							</th>
						</tfoot>
						<tfoot>
							<th>
								Total Belanja
							</th>
							<th id="total_bayar" colspan="6" class="text-right">
									Rp. 30.000.000
							</th>
						</tfoot>
					</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal  Kunjungan-->
<div class="modal fade" id="upload_bukti" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>pelanggan/upload_bukti_bayar" method="post" enctype="multipart/form-data" >
			<div class="modal-header">
				<h5 class="modal-title tulisan">Upload Bukti Bayar<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>

			</div>
			<div class="modal-body">
				<input type="hidden" name="nomor_transaksi" id="nomor_transaksi">
				<div class="form-group">
				  <label for="">Foto Bukti Bayar </label>
				  <input type="file" name="bukti_b" id="bukti_b" class="form-control" placeholder="" aria-describedby="helpId">
				  <small id="helpId" class="text-muted red">Silahkan Upload Foto Bukti Bayar Anda, Format yang di Izinkan JPG,PNG</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-success"><i class="fa fa-upload"></i>Upload</button>
			</div>
			</form>
		</div>
		</div>
	</div>
</div>


