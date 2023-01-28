

<!-- Modal -->
<div class="modal fade" id="modal_cetak_pdf" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form action="" id="form_cetak_pdf" target="_blank" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<input type="hidden" value="<?=$waktu_data?>" name="waktu">
				Yakin mau cetak PDF ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<button type="submit" class="btn btn-primary">Ya</button>
			</div>
		</form>
		</div>
	</div>
</div>
<div class="content-wrapper">
<!-- <script>
	window.print();
</script> -->
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
						<div class="form-group">
						  <label for=""></label>
						<a class="btn btn-success btn-sm modal-cetak-pdf" data="<?=base_url();?>admin/laporan_pdf<?=$link;?>" href="#"><i class="fa fa-print"></i>Cetak PDF</a>
						</div>
						<label for="">Laporan :<?=$jenis_laporan;?></label>
						<table id="" class="table table-bordered table-striped nowrap ">
							<thead>
								<tr>
									<th style="width: 20px">NO</th>
									<th style="width: 20px">Nomor Antrian</th>
									<th style="width: 20px">NIK Yang di Kunjungi</th>
									<th>Waktu Kunjungan</th>
									<th>Nama Tahanan</th>
									<th>Foto</th>
									<th>Status</th>
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

