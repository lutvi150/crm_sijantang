<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Ajukan Kunjungan

		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Kunjungan</li>
		</ol>
	</section>


	<section class="content">

		<!-- SELECT2 EXAMPLE -->
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Detail Kunjungan</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
							class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i
							class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="<?php echo base_url();?>index.php/control/simpan_tahanan" method="post" class="form-horizontal">
					<div class="alert alert-warning alert-dismissible">

						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i>Peringatan!!</h4>
						Silah kan isikan NIK orang yang ingin anda kunjungi
					</div>
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
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-sm-4  control-label">NIK</label>
								<div class="col-sm-8">
								<input type="text" name="nik" value="" id="nik" onkeyup="temukan_data_napi()"
									class="form-control" placeholder="nik">
                           </div>
							</div>
							

							<div class="form-group">
								<label class="col-sm-4  control-label">Nama</label>
								<div class="col-sm-8">
								<input type="text" name="nama" id="nama" class="form-control" placeholder="nama"
									readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label">Jenis Kelamin</label>
								<div class="col-sm-8">
								<input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin"
									readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label">Alias</label>
								<div class="col-sm-8">
								<input type="text" name="alias" id="alias" class="form-control" placeholder="alias"
									readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label">Tempat</label>
								<div class="col-sm-8">
								<input type="text" nama="tempat" id="tempat" class="form-control" placeholder="tempat"
									readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4  control-label">Tanggal Lahir</label>
								<div class="col-sm-8">
								<input type="text" nama="tanggal_lahir" id="tanggal_lahir" class="form-control"
									placeholder="Tanggal lahir" readonly>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-4  control-label">agama</label>
								<div class="col-sm-8">
								<input type="text" nama="agama" id="agama" class="form-control" placeholder="Agama"
									readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4  control-label">Kasus</label>
								<div class="col-sm-8">
								<input type="text" name="kasus" id="kasus" class="form-control" placeholder="kasus"
									readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label">Pasal</label>
								<div class="col-sm-8">
								<input type="text" name="pasal" id="pasal" class="form-control" placeholder="Pasal"
									readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label">Kamar</label>
								<div class="col-sm-8">
								<input type="text" name="kamar" id="kamar" class="form-control" placeholder="kamar"
									readonly>
								</div>
							</div>

						</div>
						<div class="col-md-6">
							
							

							<div class="form-group">
								<label class="col-sm-4  control-label">Alamat</label>
								<div class="col-sm-8">
								<textarea name="alamat" id="alamat" class="form-control " cols=" 5" rows="5"
									placeholder="alamat" readonly></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label">Kewarganegaraan</label>
								<div class="col-sm-8">
								<input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control"
									placeholder="kewarganegaraan" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label">Tanggal Masuk</label>
								<div class="col-sm-8">
								<input type="text" name="tgl_masuk" id="tgl_masuk" class="form-control"
									placeholder="Tanggal masuk tahanan" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label">Vonis</label>
								<div class="col-sm-8">
								<input type="text" name="tgl_keluar" id="tgl_keluar" class="form-control"
									placeholder="Vonis Tahanan" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4  control-label"></label>
								<style>
									.gambar {
										width: 320px;
										height: 235px;
									}

								</style>

							</div>
							<div class="form-group">
									<label class="col-sm-4  control-label">Foto</label>
									<div class="col-sm-8">
								<img class="gambar" name="foto" id="foto"
									src="<?php echo base_url();?>gambar/no-image-found-360x260.png" alt="">
									</div>
							</div>


							<!-- /.form-group -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
			</div>
			<!-- /.box-body -->
			<div class="box-footer text-center">
				<button type="button" class="btn btn-danger view-ajukan">
					<i class="fa fa-save"></i> Ajukan
				</button>
				</form>
			</div>
		</div>
	</section>
	<!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade" id="view_ajukan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><label for="">Jadwal Kunjungan</label> <button type="button" class="close"
							data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button></h5>

				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-horizontal">
							<div class="col-md-12">
								<div class="box-body">
									<form action="<?=base_url();?>pengunjung/simpan_pengajuan" method="post">
									<div class="form-group">
										<label for="inputnik" class="col-sm-2 control-label"></label>

										<div class="col-sm-10">
											<input type="hidden" class="form-control" name="nik2" id="nik2" placeholder="nik">
										</div>
									</div>
									<div class="form-group">
										<label for="inputanggal" class="col-sm-2 control-label">Tanggal</label>
										<div class="col-sm-10">
											<input type="text" name="tanggal" class="form-control" id="datepicker3"
												placeholder="tanggal">
										</div>
									</div>
					

									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Jam</label>
										<div class="bootstrap-timepicker col-sm-10">
											<input type="text" name="jam" class="form-control" id="timepickermodal"
												placeholder="Jam">
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Ajukan</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
