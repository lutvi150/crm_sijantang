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
						<a href="<?=base_url();?>admin/cetak_pengajuan" target="_blank"
									class="btn btn-warning "><i class="fa fa-print"></i> Cetak Data</a>
							<thead>
								<tr>
									<th style="width: 20px">NO</th>
									<th style="width: 20px">Nomor Antrian</th>
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
		foreach ($tb_kunjungan as $field2) :
		?>
		<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $field2['nomor_kunjungan'];?> </td>
									<td><?php echo $field2['nik_di_kunjungi'];?></td>
									<td><?=$field2['waktu']?></td>
									<td><?php echo $field2['nama_tahanan'];?></td>
									<td> <img id="output" class="gambar" name="foto2"
											src="<?=base_url($field2['foto']);?>" alt=""></td>
									<td>
									<a href="<?=base_url();?>admin/pengikut/<?=$field2['nomor_kunjungan']?>"
											class="btn btn-info btn-xs"><i class="fa fa-info"></i> Detail</a>
										<?php if($field2['status']=='Proses'):?>
										<!-- <a href="#"
											class="btn btn-success btn-xs"><i class="fa fa-check"></i> Terima</a>
											<a href="#"
											class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Tolak</a>
								 -->
										<?php elseif($field2['status']=='Diterima'):?>
										<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>
											Diterima</button> <?php elseif($field2['status']=='Ditolak'):?>
										<button data="<?=$field2['nomor_kunjungan']?>" class="btn btn-danger btn-xs alasan-penolakan"><i class="fa fa-ban"></i> Ditolak</button>
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
<div class="modal fade" id="alasan_penolakan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Alasan Penolakan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div id="alasan-ditolak">

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				
			</div>
		</div>
	</div>
</div>