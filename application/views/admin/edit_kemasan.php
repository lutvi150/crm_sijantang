<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tambah Kemasan

		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Kemasan</li>
		</ol>
	</section>
	<section class="content">
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Data Kemasan</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
							class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i
							class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="<?php echo base_url();?>admin/simpan_kemasan_edit/<?=$id_barang?>" enctype="multipart/form-data" method="post" class="form-horizontal ">
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
					<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label class="col-sm-4  control-label">Nama</label>
								<div class="col-sm-8">
								<input type="text" required name="nama" id="nama" value="<?=$nama?>" class="form-control" placeholder="Nama Kemasan">
							</div>
							</div>
							
							
							<div class="form-group">
							<label class="col-sm-4 control-label">Jenis</label>
								<div class="col-sm-8">
								   <input type="text" required name="jenis"  value="<?=$jenis?>"  id="jenis" class="form-control"
									placeholder="Jenis">
							    </div>
						   </div>
						   <div class="form-group">
							<label class="col-sm-4 control-label">Detail Kemasan</label>
							 <div class="col-sm-8">
								<textarea name="detail" id="detail" class="form-control" cols="30" rows="10"><?=$detail?> </textarea>
							 </div>
						</div>
							<div class="form-group">
							   <label class="col-sm-4 control-label">Satuan</label>
								<div class="col-sm-8">
								   <input type="text" required name="satuan"  value="<?=$satuan?>"  id="satuam" class="form-control"
									placeholder="Satuam Pemesanan">
							    </div>
						   </div>

							<div class="form-group">
								<label class="col-sm-4 control-label">Harga</label>
								<div class="col-sm-8">
										<input type="text" name="harga" id="harga"  value="<?=$satuan?>"  class="form-control"
										placeholder="Harga Persatuan">
								</div>
								
							</div>
							
						</div>
						<div class="col-md-6">
							
							
							<div class="form-group">
								<label class="col-sm-4 control-label">Foto Untuk Sample</label>

								<style>
									.gambar {
										width: 300px;
										height: 293px;
									}

								</style>
								
										<div class="col-sm-8">
									<input type="file" onchange="loadFile(event)" name="foto" id="middle-name">
								
								</div>
							</div>
							<div class="form-group">
									<label class="col-sm-4 control-label"></label>
									<div class="col-sm-8">
								<img id="output" class="gambar" name="foto"
									src="<?=base_url($foto);?>" alt="">
									</div>
							</div>


							<!-- /.form-group -->
						</div>
						<!-- /.col -->
					</div>
				</div>
					<!-- /.row -->
			</div>
			<!-- /.box-body -->
			<div class="box-footer text-center">
				<button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modelId">
					<i class="fa fa-save"></i> Simpan
				</button>
				</form>
			</div>
		</div>
	</section>
</div>
<!-- Button trigger modal -->
