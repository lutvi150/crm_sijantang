<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Kunjungan

		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">



				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Daftar Kunjungan Anda</h3>
					</div>
					<!-- /.box-header -->

					<div class="box-body">

						<p class="text-muted font-13 m-b-30">
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
						<table id="example1" class="table table-bordered table-striped nowrap example1">
							<thead>
								<tr>
									<th style="width: 20px" >NO</th>
									<th style="width: 20px">Nomor Kunjungan</th>
									<th style="width: 20px">NIK Yang di Kunjungi</th>
									<th>Waktu Kunjungan</th>
									<th>Nama Tahanan</th>
									<th>Foto</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
				<?php if ($status_data=='0'):?>
				<tr>
					<td class="text-center" colspan="8" >Tidak Ada Ada yang Masuk</td>
				</tr>
				<?php elseif($status_data=='1'):?>
				
									<?php
		$no=1;
		foreach ($tb_kunjungan as $field2) :?>
					
								<tr>				<td><?php echo $no++; ?></td>
									<td><?php echo $field2['nomor_kunjungan'];?> </td>
									<td><?php echo $field2['nik_di_kunjungi'];?></td>
									<td><?=$field2['waktu']?></td>
									<td><?php echo $field2['nama_tahanan'];?></td>
									<td> <img id="output" class="gambar" name="foto2"
											src="<?=base_url($field2['foto']);?>" alt=""></td>
									<td>
										<?php if ($field2['status']=='Draf'):?>
										<a href="<?=base_url();?>pengunjung/pengikut/<?=$field2['nomor_kunjungan']?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<a href="#" data="<?=$field2['nomor_kunjungan']?>" class="btn btn-success btn-xs konfirmasi-kirim"><i class="fa fa-flag"></i> Kirim</a>
										<?php elseif($field2['status']=='Proses'):?>
										<a href="<?=base_url();?>pengunjung/pengikut/<?=$field2['nomor_kunjungan']?>" class="btn btn-info btn-xs"><i class="fa fa-info"></i> Detail</a>
										<button class="btn btn-warning btn-xs"><i class="fa fa-refresh"></i> Proses</button>
										<?php elseif($field2['status']=='Diterima'):?>
										<a href="<?=base_url();?>pengunjung/pengikut/<?=$field2['nomor_kunjungan']?>" class="btn btn-info btn-xs"><i class="fa fa-info"></i> Detail</a>
										<button class="btn btn-success btn-xs"><i class="fa fa-check"></i> Diterima</button>										<?php elseif($field2['status']=='Ditolak'):?>
										<a href="<?=base_url();?>pengunjung/pengikut/<?=$field2['nomor_kunjungan']?>" class="btn btn-info btn-xs"><i class="fa fa-info"></i> Detail</a>
										<button  data="<?=$field2['nomor_kunjungan']?>" class="btn btn-danger btn-xs alasan-penolakan-user"><i class="fa fa-ban"></i> Ditolak</button>
										<?php endif; ?>
									</td>
								</tr>
								<?php endforeach;?>
								<?php endif; ?>
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
<div class="modal fade" id="konfirmasi_kirim" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>pengunjung/kirim_pengajuan" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi Kirim<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>
					
			</div>
			<div class="modal-body">
				<input type="hidden" name="nomor_pengajuan" value="" id="nomor_pengajuan">
				Yakin akan kirim pengajuan anda ? pengajuan yang sudah di kirim tidak dapat di ubah lagi
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
<div class="modal fade" id="alasan_penolakan-user" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Alasan Penolakan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div id="alasan-ditolak-user">

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				
			</div>
		</div>
	</div>
</div>

