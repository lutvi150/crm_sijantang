<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Chat Masuk

		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">



				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Chat Masuk</h3>
					</div>
					<!-- /.box-header -->

					<div class="box-body">



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

						<table id="example1" class="table table-bordered table-striped nowrap example1">

							<thead>

								<tr>
									<th style="width:20px">NO</th>
									<th style="width:20px">Nama</th>
									<th>Alamat</th>
									<th style="width:20px">Nomor HP</th>
									<th style="width: 20px">Pesan Baru</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_user as $key => $value): ?>
								<tr>
									<td><?=$key + 1?></td>
									<td><?=$value->nama?></td>
									<td><?=$value->alamat?></td>
									<td><?=$value->no_hp?></td>
									<td>
										<a href="<?=base_url('admin/chat/' . $value->id_user)?>" class="btn btn-success btn-xs"><?=$value->jumlah_pesan?> Pesan baru</button>
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

