<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$this->config->item('app_name')?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="shortcut icon" href="<?php echo base_url();?>gambar/logodepan.png" type="image/x-icon">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
	<!-- Date Picker -->
	<link rel="stylesheet"
		href="<?php echo base_url();?>assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/Ionicons/css/ionicons.min.css">

	<link rel="stylesheet" href="<?php echo base_url();?>assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet"
		href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
	<!-- <link rel="stylesheet" href="<?=base_url();?>assets/costume/costume.css"> -->

	<style>
		.gambar2 {
			width: 35px;
			height: 30px;
			border-radius: 15%;
		}

		.gambar1 {
			width: 35px;
			height: 30px;
			border-radius: 15%;
		}

	</style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><img class="gambar1" src="<?php echo base_url();?>assets/img/logo_app.jpg"
						alt=""></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><img class="gambar2" src="<?php echo base_url();?>assets/img/logo_app.jpg" alt=""><b>
						<?=$this->config->item('app_name')?></b></span>

			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
						<li class="dropdown messages-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">


						</li>
						<!-- Notifications: style can be found in dropdown.less -->
						<li class="dropdown notifications-menu">

							<ul class="dropdown-menu">
								<li class="header">You have 10 notifications</li>
								<li>
									<!-- inner menu: contains the actual data -->

								</li>
								<li class="footer"><a href="#">View all</a></li>
							</ul>
						</li>
						<!-- Tasks: style can be found in dropdown.less -->

						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?=base_url();?>assets/img/no-image-found-360x260.png" class="user-image"
									alt="User Image">
								<span class="hidden-xs">-</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?=base_url();?>assets/img/no-image-found-360x260.png" class="img-circle"
										alt="User Image">

									<p>
										-
										<small>-</small>
									</p>
								</li>
								<!-- Menu Body -->
								<li class="user-body">
								<li class="user-body">
									<div class="row">
										<div class="col-xs-4 text-center">
											<!-- <a href="<?php echo base_url();?>index.php/control_admin/profil">Profile</a> -->
										</div>
										<div class="col-xs-2 text-center">
											<a href="#"></a>
										</div>
										<div class="col-xs-6 text-center">
											<!-- <a href="<?php echo base_url();?>index.php/control_admin/ubah_pass">Ubah Pasword</a> -->
										</div>
									</div>
									<!-- /.row -->
								</li>
								<!-- /.row -->
						</li>
						<!-- Menu Footer-->
						<li class="user-footer text-center">
							<div class="col-md-4">
								<a href="#" class=""></a>
							</div>
							<div class="col-md-4">
								<a href="#" class=""></a>
							</div>
							<div class="col-md-4">
								<a href="<?=base_url();?>controller/logout" class="btn btn-default btn-flat">Keluar</a>
							</div>
						</li>
					</ul>
					</li>
					<!-- Control Sidebar Toggle Button -->
					<li>
						<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
					</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->






		<div class="box box-default">
			<!-- Content Header (Page header) -->
			<section class="content-header">

			</section>


			<section class="content">

				<!-- SELECT2 EXAMPLE -->
				<div class="box box-default">
					<div class="box-header with-border">

						<marquee behavior="altenate" direction="left">
							<h3 class="box-title"> FORMULIR DATA DIRI</h3>
						</marquee>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
									class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i
									class="fa fa-remove"></i></button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="alert alert-warning alert-dismissible">
								<button type="button" class="close" data-dismiss="alert"
									aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i>Peringatan!!</h4>
								Sistem mendeteksi anda sebagai user baru, harap isi data diri terlebih dahulu
							</div>
							<?php if ($this->session->userdata('error')):?>
							<div id="message_error" class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert"
									aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-ban"></i> Maaf !</h4>
								<?php echo $this->session->userdata('error');?>
							</div>
							<?php endif;?>
							<form action="<?=base_url();?>pelanggan/simpan_data_diri" id="isi_data_diri"
								enctype="multipart/form-data" method="post" class="form-horizontal">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4  control-label">Nama</label>
										<div class="col-sm-8">
											<input type="text" required name="nama" class="form-control"
												placeholder="nama">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4  control-label">Nomor Kontak</label>
										<div class="col-sm-8">
											<input type="text" required name="no_hp" class="form-control"
												placeholder="No Hp">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-sm-2  control-label">Alamat</label>
										<div class="col-sm-10">
											<textarea name="alamat" class="form-control id="" cols=" 5" rows="5"
												placeholder="alamat"></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-sm-4  control-label">Foto</label>
										<style>
											.gambar {
												width: 400px;
												height: 250px;
											}

										</style>
										<div class="col-sm-8">
											<input type="file" onchange="loadFile(event)" name="images"
												id="middle-name">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4  control-label"></label>
										<div class="col-sm-8">
											<img id="output" class="gambar" name="images"
												src="<?php echo base_url();?>assets/img/no-image-found-360x260.png"
												alt="">
										</div>

									</div>
								</div>

						</div>
						<!-- /.row -->
					</div>
					<!-- /.box-body -->
					<div class="box-footer text-center">
						<button type="button" class="btn btn-danger daftar-data-diri" data-toggle="modal"
							data-target="#modelId">
							<i class="fa fa-save"></i> Daftar
						</button>

					</div>

					</form>
					<!-- Modal -->
					<div class="modal fade" id="modal_konfirmasi" tabindex="-1" role="dialog"
						aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog modal-sm" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Konfirmasi Daftar</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Yakin Akan Daftar ?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
									<button type="button" class="btn btn-primary konfirmasi-daftar">Ya</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<footer class="main-footer">

				<div class="pull-right hidden-xs">
					<b>Version</b> 1.0.0
				</div>
				<strong>Copyright &copy; <?=date('Y');?> <a href="#"><?=$this->config->item('app_name')?></a>.</strong>
				All rights
				reserved.

			</footer>

		</div>
		<!-- ./wrapper -->

		<!-- jQuery 3 -->
		<script src="<?php echo base_url();?>assets/jquery/dist/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="<?php echo base_url();?>assets/jquery-ui/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);

		</script>

		<!-- Bootstrap 3.3.7 -->

		<script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/chart.js/Chart.js"></script>
		<!-- FastClick -->
		<script src="<?php echo base_url();?>assets/fastclick/lib/fastclick.js"></script>
		<!-- Sparkline -->

		<script src="<?php echo base_url();?>assets/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="<?php echo base_url();?>assets/jquery-knob/dist/jquery.knob.min.js"></script>

		<!-- daterangepicker -->
		<script src="<?php echo base_url();?>assets/moment/min/moment.min.js"></script>

		<!-- Timepicker -->
		<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url();?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="<?php echo base_url();?>assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js">
		</script>
		<!-- Slimscroll -->
		<script src="<?php echo base_url();?>assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>

		<!-- AdminLTE App -->
		<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

		<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
		<script>
			//Date picker
			$('#datepicker1').datepicker({
				autoclose: true
			});
			$('.daftar-data-diri').click(function (e) {
				$('#modal_konfirmasi').modal('show');
			});
			$('.konfirmasi-daftar').click(function (e) {
				$('#isi_data_diri').submit();
			});
			window.setTimeout(function () {
				$("#message_error").fadeTo(1000, 0).slideUp(500, function () {
					$(this).remove();
				});
			}, 6000);
			var loadFile = function (event) {
				var reader = new FileReader();
				reader.onload = function () {
					var output = document.getElementById('output');
					output.src = reader.result;
				};
				reader.readAsDataURL(event.target.files[0]);
			};

		</script>
</body>

</html>
