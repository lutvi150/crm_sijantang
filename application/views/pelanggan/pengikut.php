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
		<div class="box box-success box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Detail Kunjungan Dan Pengikut</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="<?php echo base_url();?>index.php/control/" method="post">


					<div class="row">
						<div class="col-md-12 text-center">
							<a href="#" class="btn btn-info">Nomor Kunjungan : <?=$kunjungan['nomor_kunjungan']?></a>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>NIK</label>
								<input type="text" readonly name="nik_pengunjung" value="<?=$kunjungan['nik_pengunjung']?>"
									id="nik_pengunjung" class="form-control" placeholder="nik pengunjung">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama_pengunjung" value="<?=$kunjungan['nama_pengunjung']?>"
									id="nama_pengunjung" class="form-control" placeholder="Nama Pengunjung" readonly>
							</div>
							<div class="form-group">
								<label>Foto</label>

							</div>
							<div class="form-group">

								<img class="gambar-pengikut" name="foto3" id="foto3"
									src="<?php echo base_url($kunjungan['foto_pengunjung']);?>" alt="">
							</div>

						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>NIK</label>
								<input type="text" readonly name="nik_tahanan" value="<?=$kunjungan['nik_di_kunjungi']?>"
									id="nik_tahanan" class="form-control" placeholder="nik tahanan">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama_tahanan" value="<?=$kunjungan['nama_di_kunjungi']?>" id="nama_tahanan"
									class="form-control" placeholder="nama tahanan" readonly>
							</div>
							<div class="form-group">
								<label>Foto</label>

							</div>
							<div class="form-group">

								<img class="gambar-pengikut" name="foto4" id="foto4"
									src="<?php echo base_url($kunjungan['foto_tahanan']);?>" alt="">
							</div>



							<!-- /.form-group -->
						</div>

						<!-- /.col -->
					</div>
					<!-- /.row -->
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box  box-success">
						<div class="box-header">
							<h3 class="box-title">Pengikut</h3>

							<div class="box-tools">
								<div class="input-group input-group-sm" style="width: 150px;">
									<input type="text" name="table_search" class="form-control pull-right" placeholder="Pencarian">

									<div class="input-group-btn">
										<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>

						</div>
						<!-- /.box-header -->

						<div class="box-body table-responsive no-padding">
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
						<div class="col-md-12">
						<?php if ($kunjungan['status']=='Draf'):?>
              <button type="button" class="btn btn-success tambah-pengikut" ><i
                class='fa fa-plus-square'></i>
              Tambah Data
			</button>
			<?php endif; ?>
            </div>
							<table class="table table-hover">
								<tr>
									<th style="width: 20px;">NO</th>
									<th>Nik</th>
									<th>Nama</th>
									<th style="width: 200px">Status</th>
									<th style="width: 20px">Aksi</th>
                </tr>
                <?php
                $no=1;
                foreach ($pengikut as  $value):?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$value['nik'];?></td>
									<td><?=$value['nama'];?></td>
									<td>
                    <?php if ($value['status']=='L'):?>
                    <span class="label label-success">laki laki</span>
                    <?php elseif ($value['status']=='P'):?>
                    <span class="label label-danger">Perempuan</span>
                    <?php elseif($value['status']=='A'):?>
                    <span class="label label-info">Anak Anak</span>
<?php endif; ?>
									</td>
									<td><?php if ($kunjungan['status']=='Draf'):?>
									<a class="btn btn-danger btn-xs" href="<?=base_url();?>pengunjung/hapus_pengikut/<?=$kunjungan['nomor_kunjungan']?>/<?=$value['id']?>"><i class="fa fa-trash"></i> Hapus</a><?php endif; ?></td>
                </tr>
<?php endforeach; ?>
							</table>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer text-center">
				<?php if ($kunjungan['status']=='Draf'):?>
				<button type="button" class="btn btn-danger konfirmasi-finish">
					<i class="fa fa-save"></i> FINISH
				</button>
<?php endif; ?>
				</form>
			</div>
		</div>
	</section>
	<!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade" id="tambah_pengikut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">

		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Pengikut<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>
					
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url();?>pengunjung/simpan_pengikut/<?=$kunjungan['nomor_kunjungan']?>" method="post">

            <input type="hidden" name="nomor_kunjungan" id="nomor_kunjungan" value="<?=$kunjungan['nomor_kunjungan']?>">
						<div class="form-group">
							<label for="">Nik </label>
							<input type="text" required name="nik_pengikut" id="nik_pengikut" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Nama</label>
							<input type="text" required name="nama_pengikut" id="nama" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Status</label>
							<select name="status" id="status" class="form-control">
								<option value="L">Laki Laki</option>
                <option value="P">Perempuan</option>
                <option value="A">Anak Anak</option>
							</select>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-dark">Simpan</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal konfirmasi finish -->
<div class="modal fade" id="konfirmasi_finish_pengikut" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form action="<?=base_url();?>pengunjung/finish_pengajuan/<?=$kunjungan['nomor_kunjungan']?>" method="post">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Finish <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h5>
         
      </div>
      <div class="modal-body">
        Yakin akan finish ? pengajuan yang sudah finish tidak dapat di ubah lagi 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-primary">Ya</button>
      </div>
      </form>
    </div>
  </div>
</div>