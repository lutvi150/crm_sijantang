<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<title><?=$this->config->item('app_name')?></title>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="<?=base_url();?>assets/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title></title>
	<!-- bootstrap -->
	<!-- <link rel="stylesheet" href="<? base_url(); ?>assets/bootstrap/dist/css/bootstrap.min.css"> -->
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="<?=base_url();?>assets/css/linearicons.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/themify-icons.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/nice-select.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/nouislider.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/magnific-popup.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/main.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/costume.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/costume/costume-admin.css">
<script src="<?=base_url();?>assets/js/vendor/jquery-2.2.4.min.js"></script>
</head>


<!-- Modal -->
<div class="modal fade" id="tidak_bisa_akses" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Maaf<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Maaf Anda Harus Login Terlebih dahulu
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="<?=base_url();?>"><img class="image-logo" src="<?=base_url();?>assets/img/logo_app.jpg" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="<?=base_url();?>">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
								<!-- <ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>controller/tracking">Tracking</a></li>
								</ul> -->
							</li>
							<li class="nav-item"><a class="nav-link" href="<?=base_url();?>controller/kontak">Kontak Kami</a></li>
							<?php if ($this->session->userdata('logged_in') == true): ?>
								<?php if ($this->session->userdata('level') == 'pelanggan'): ?>
									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>pelanggan/chat">Chat Admin</a></li>
									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>pelanggan/menu_anda">Menu Anda</a></li>

									<li class="nav-item"><a class="nav-link" href="#"><?=$nama?></a></li>
									<li class="nav-item"><a class="nav-link" href="<?=base_url();?>controller/logout">Logout</a></li>
								<?php endif;?>
							<?php elseif ($this->session->userdata('logged_in') !== true): ?>
								<li class="nav-item"><a class="nav-link" href="<?=base_url();?>controller/login">Belum Login</a></li>
							<?php endif;?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<?php if ($this->session->userdata('logged_in') == true): ?>
								<?php if ($this->session->userdata('level') == 'pelanggan'): ?>
									<li class="nav-item"><a href="<?=base_url();?>controller/keranjang_belanja" class="cart"><span class="ti-bag"></span></a></li>
								<?php endif;?>
							<?php elseif ($this->session->userdata('logged_in') !== true): ?>

								<li class="nav-item"><a href="#" class="cart tidak-bisa-akses"><span class="ti-bag"></span></a></li>
							<?php endif;?>

							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->
