<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data User

		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">



				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data User</h3>
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
						<a href="<?=base_url();?>report/cetak_user/semua" target="_blank"
									class="btn btn-primary "><i class="fa fa-print"></i> Cetak Data</a>
									<a href="#" class="btn btn-danger btn-sm cetak-user-pertanggal"><i class="fa fa-print"></i> Cetak Berdasarkan Tanggal Pendaftaran</a>
						<table id="example1" class="table table-bordered table-striped nowrap example1">

							<thead>

								<tr>
									<th style="width:20px">NO</th>
									<th style="width:20px">Username</th>
									<th style="width:20px">Nama</th>
									<th>Alamat</th>
									<th style="width: 20px;" >Tanggal Registrasi</th>
									<th style="width:20px">Nomor HP</th>
									<th style="width: 20px">Foto</th>
								</tr>
							</thead>
							<tbody>
								<?php
$no = 1;
foreach ($data_user as $field2):
?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$field2['username']?></td>
									<td><?=$field2['nama']?></td>
									<td><?=$field2['alamat']?></td>
									<td><?=$field2['tgl_registrasi']?></td>
									<td><?=$field2['no_hp']?></td>
									<td><?php base_url($field2['foto'])?></td>
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

<!-- Modal  Foto-->
<style>
	.tulisan {
		font-weight: bold;

	}

</style>
<div class="modal fade" id="detail-user" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title tulisan">Detail User<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>

			</div>
			<div class="modal-body">
				<div class="" id="isi-user">

				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="cetak_user_pertanggal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>report/cetak_user/pertanggal" method="post" target="_blank">
			<div class="modal-header">
				<h5 class="modal-title">Cetak Berdasarkan Tanggal Pendaftaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				  <label for="">Tanggal Pendaftaran</label>
				  <input type="text" name="dari_tgl" id="datepicker3" class="form-control" placeholder="" aria-describedby="helpId">
				  <small id="helpId" class="text-muted">Input Tanggal Pendaftaran</small>
				</div>
				<!-- <div class="form-group">
				  <label for="">Sampai Tanggal</label>
				  <input type="text" name="sampai_tgl" id="" class="form-control" placeholder="" aria-describedby="helpId">
				  <small id="helpId" class="text-muted">Help text</small>
				</div> -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Cetak</button>
			</div>
			</form>
		</div>
	</div>
</div>

