
 
    
<div class="box box-default">
		<div class="container">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Pendaftaran</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Daftar</li>
		</ol>
	</section>


	<section class="content">

		<!-- SELECT2 EXAMPLE -->
		
		<div  class="box box-primary box-solid">
			<div class="box-header with-border">
				
           <marquee behavior="altenate" direction="left"><h3 class="box-title"> FORM PENDAFTARAN</h3></marquee>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
							class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i
							class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			<form action="<?php echo base_url(); ?>pengunjung/simpan_data_pengunjung" method="POST" enctype="multipart/form-data">
					<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i>Peringatan!!</h4>
							Mohon di isi data anda agar bisa di lanjutkan ke menu berikutnya
						  </div>
				<div class="row">

					<div class="col-md-6">
                      <div class="form-group">
							<label>Foto</label>

							<script>
								var loadFile = function (event) {
									var reader = new FileReader();
									reader.onload = function () {
										var output = document.getElementById('output');
										output.src = reader.result;
									};
									reader.readAsDataURL(event.target.files[0]);
								};

							</script>
							<style>
								.gambar {
									width: 400px;
									height: 287px;
								}

							</style>
						<div class="form-control">
								<input type="file" onchange="loadFile(event)" name="foto2" id="middle-name">
							</div>
						</div>
						<div class="form-group">

							<img id="output" class="gambar" name="foto2" src="<?php echo base_url();?>asset/img/no-image-found-360x260.png" alt="">
							</div>
						<div class="form-group">
							<label>NIK</label>
							<input type="text" name="nik" class="form-control" placeholder="nik">
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama_pengunjung" class="form-control" placeholder="nama">
						</div>
						
					</div>
					<div class="col-md-6">
							<div class="form-group">
									<label>Tempat</label>
									<input type="text" name="tempat_lahir" class="form-control" placeholder="tempat lahir">
									</div>
						<div class="form-group">
							<label for="">Tanggal Lahir</label>
							<div class="input-group date">
								<input type="date"name="tanggal_lahir" class="form-control pull-right" id="datepicker1"
									placeholder="tanggal lahir">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea name="alamat" class="form-control id="" cols=" 5" rows="5"
								placeholder="alamat"></textarea>
						</div>
						<div class="form-group">
							<label>agama</label>
							<select name="agama" id="" class="form-control">
								<option value="">-Pilih-</option>
								<option value="islam">Islam</option>
								<option value="kristen">Kristen</option>
								<option value="hindu">Hindu</option>
								<option value="budha">Budha</option>
							</select>
						</div>
						
						<div class="form-group">
							<label>Pekerjaan</label>
							<input type="text" name="pekerjaan" class="form-control" placeholder="pekerjaan">
						</div>
						<div class="form-group">
							<label>Kewarganegaraan</label>
							<input type="text" name="kewarganegaraan" class="form-control" placeholder="kewarganegaraan">
						</div>
						
					</div>

				</div>
				<!-- /.row -->
			</div>
			<!-- /.box-body -->
				</form>
			<div class="box-footer text-center">
				<button type="button" class="btn btn-danger" >
					<i class="fa fa-save"></i> Daftar
				</button>
				
<div></div>
			</div>
		</div>
	</section>
	</div>

