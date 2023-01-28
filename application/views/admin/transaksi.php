<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Transaksi

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
						<?php if ($this->session->userdata('error')):?>
						<div id="message_error" class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-ban"></i> Maaf !</h4>
								<?php echo $this->session->userdata('error');?>
							</div>
							<?php elseif ($this->session->userdata('success')):?>
							<div id="message_success" class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Success !</h4>
								<?php echo $this->session->userdata('success');?>
							</div>
							<?php endif;?>
							<a href="<?=base_url();?>admin/cetak_transaksi/semua" target="_blank"
									class="btn btn-primary btn-sm "><i class="fa fa-print"></i> Cetak Semua Transaksi</a>
						<a href="#"
									class="btn btn-primary btn-sm semua-transaksi"><i class="fa fa-print"></i> Cetak Transaksi Pertahun</a>
									
									<a href="#"
									class="btn btn-primary btn-sm transaksi-perbulan"><i class="fa fa-print"></i> Cetak Transaksi Per Bulan</a>
						<table id="example1" class="table table-bordered table-striped wrap example1">
					
							<thead>
							
								<tr>
									<th style="width:20px">NO</th>
									<th style="width:20px">Nomor Transaksi</th>
									<th style="width:20px">Nama Pelanggan</th>
									<th style="width: 20px;" >Tanggal Transaksi</th>
									<th style="width:20px">Nomor HP</th>
									<th style="width: 20px;">Status</th>
									<th style="width: 200px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
		$no=1;
		foreach ($transaksi as $field2) :
		?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$field2['nomor_transaksi']?></td>
									<td><?=$field2['nama']?></td>
									<td><?=$field2['tgl_transaksi']?></td>
									<td><?=$field2['no_hp']?></td>
									<td><?php if ($field2['status']=='B'):?>
										<span class="label label-warning">Menunggu Pembayaran</span>
										<?php elseif ($field2['status']=='K'):?>
										<span class="label label-danger">Konfirmasi Pembayaran</span>
										<?php elseif ($field2['status']=='L'):?>
										<span class="label label-success"> Lunas</span>
										<?php elseif ($field2['status']=='P'):?>
										<span class="label label-success"> Proses Pengerjaan</span><br>
									<label for="">	Selesai Tanggal : <?=$field2['tgl_selesai']?></label>
									<?php elseif ($field2['status']=='F'):?>
										<span class="label label-success"> Finish</span><br>
										<?php endif; ?>
								</td>
									<td>
										<a href="#" class="btn btn-info btn-sm detail-transaksi" data="<?=$field2['nomor_transaksi']?>" ><i class="fa fa-search"></i> </a>
										<?php if ($field2['status']=='K'):?>
											<a href="#" class="btn btn-success btn-sm konfirmasi-pembayaran" data="<?=base_url();?>admin/pembayaran/terima/<?=$field2['nomor_transaksi']?>" ><i class="fa fa-check"></i> Konfirmasi </a>
											<a href="#" class="btn btn-danger btn-sm tolak-pembayaran" data="<?=base_url();?>admin/pembayaran/tolak/<?=$field2['nomor_transaksi']?>" ><i class="fa fa-times"></i> Tolak </a>
											<a href="#" class="btn btn-warning btn-sm bukti-bayar" data="<?=$field2['nomor_transaksi']?>" ><i class="fa fa-money"></i>  </a>
											<?php elseif ($field2['status']=='L'):?>
											<a href="#" class="btn btn-warning btn-sm bukti-bayar" data="<?=$field2['nomor_transaksi']?>" ><i class="fa fa-money"></i>  </a>
											<a href="#" class="btn btn-success btn-sm proses-transaksi" data="<?=base_url();?>admin/proses/<?=$field2['nomor_transaksi']?>" ><i class="fa fa-refresh"></i> Proses </a> 
											<?php elseif ($field2['status']=='P'):?>
											<a href="#" class="btn btn-warning btn-sm bukti-bayar" data="<?=$field2['nomor_transaksi']?>" ><i class="fa fa-money"></i>  </a>
											<a href="#" class="btn btn-success btn-sm finish-transaksi" data="<?=base_url();?>admin/finish/<?=$field2['nomor_transaksi']?>" ><i class="fa fa-flag"></i>  Finish Transaksi</a>
											<?php elseif ($field2['status']=='F'):?>
											<a href="#" class="btn btn-warning btn-sm bukti-bayar" data="<?=$field2['nomor_transaksi']?>" ><i class="fa fa-money"></i>  </a>
											<?php endif; ?>

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



<!-- Modal -->
<div class="modal fade" id="detail_transaksi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Transaksi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="" id="nama" readonly class="form-control" placeholder="" aria-describedby="helpId">
					  </div>
					  <div class="form-group">
						<label for="">Alamat</label>
						<input type="text" readonly name="" id="alamat" class="form-control" placeholder="" aria-describedby="helpId">
					  </div>
					  <div class="form-group">
						<label for="">Nomor Kontak</label>
						<input type="text" readonly name="" id="no_hp" class="form-control" placeholder="" aria-describedby="helpId">
					  </div>
				</div>
				<div class="col-md-6">
						<div class="form-group">
								<label for="">Tanggal Pesanan</label>
								<input type="text" name="" id="tgl_pesanan" readonly class="form-control" placeholder="" aria-describedby="helpId">
							  </div>
							  <div class="form-group">
								<label for="">Tgl Selesai</label>
								<input type="text" readonly name="" id="tgl_selesai" class="form-control" placeholder="" aria-describedby="helpId">
							  </div>
							
				</div>
				<div class="col-md-12">
					Detail Barang Yang di Pesan
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
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="terima_pembayaran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form id="form_terima_pembayaran" action="" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Terima Pembayaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				Yakin akan terima pembayaran ini ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<button type="submit" class="btn btn-primary">Ya</button>
			</div>
										</form>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="view_bukti_bayar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Bukti Bayar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12 text-center">
					<img class="image-bukti-bayar" src=""  alt="">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="tolak_pembayaran" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="form_tolak_pembayaran" action="<?=base_url();?>admin/pembayaran/tolak" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Alasan Penolakn</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				  <label for="">Alasan Penolakan</label>
				 <textarea name="alasan" id="alasan" class="form-control" cols="30" rows="3"></textarea>
				  <small id="helpId" class="text-muted">Berikan alasan penolakan anda</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="proses_transaksi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_proses_transaksi" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Tentukan Tanggal Selesai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				  <label for="">Tanggal Selesai</label>
				  <input type="text" name="tgl_selesai" id="datepicker3" class="form-control" placeholder="" aria-describedby="helpId">
				  <small id="helpId" class="text-muted">Input Tanggal Selesai</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
		</div>
	</div>
</div>

<div class="modal fade" id="finish_transaksi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form id="form_finish_transaksi" action="" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Finish Transaksi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				Yakin akan finish transaksi ini ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<button type="submit" class="btn btn-primary">Ya</button>
			</div>
										</form>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="semua_transaksi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<form action="<?=base_url();?>admin/cetak_transaksi/pertahun" target="_blank" method="post">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Semua Transaksi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				  <label for=""></label>
				  <select name="tahun" id="tahun" class="form-control">
					  <option value="">Pilih Tahun Laporan</option>
					  <?php for ($i=2017; $i < 2030 ; $i++):?>
					  <option value="<?=$i?>"><?=$i?></option>
					  <?php endfor; ?>
				  </select>
				  <small id="helpId" class="text-muted">Pilih Tahun laporan</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Cetak</button>
			</div>
		</form>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="transaksi_perbulan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form action="<?=base_url();?>admin/cetak_transaksi/bulan" method="post" target="_blank">
			<div class="modal-header">
				<h5 class="modal-title">Laporan Perbulan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
		<div class="col-md-6">
			<div class="form-group">
			  <label for="">Tanggal</label>
			  <select name="bulan" id="" class="form-control">
				<option value="01">Januari</option>
				<option value="02">Februari</option>
				<option value="03">Maret</option>
				<option value="04">April</option>
				<option value="05">Mei</option>
				<option value="06">Juni</option>
				<option value="07">Juli</option>
				<option value="08">Agustus</option>
				<option value="09">September</option>
				<option value="10">Oktober</option>
				<option value="11">November</option>
				<option value="12">Desember</option>
			</select>
			  <small id="helpId" class="text-muted">Pilih Bulan</small>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="">Tahun</label>
				<select name="tahun" id="tahun" class="form-control">
					<?php for ($i=2017; $i < 2030 ; $i++):?>
					<option value="<?=$i?>"><?=$i?></option>
					<?php endfor; ?>
				</select>
				<small id="helpId" class="text-muted">Pilih Tahun laporan</small>
			  </div>
		</div>	
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Prose</button>
			</div>
		</form>
		</div>
	</div>
</div>