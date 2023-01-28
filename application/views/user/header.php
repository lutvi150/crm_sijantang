<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?=$this->config->item('app_name')?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon-->
	<link rel="shortcut icon" href="<?=base_url();?>asset/img/fav.png">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/bootstrap.min.css">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/font-awesome.min.css">
	<!-- owl.carousel CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/owl.carousel.css">
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/owl.theme.css">
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/owl.transitions.css">
	<!-- animate CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/animate.css">
	<!-- normalize CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/normalize.css">
	<!-- meanmenu icon CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/meanmenu.min.css">
	<!-- main CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/main.css">
	<!-- educate icon CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/educate-custon-icon.css">
	<!-- morrisjs CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/morrisjs/morris.css">
	<!-- mCustomScrollbar CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/scrollbar/jquery.mCustomScrollbar.min.css">
	<!-- metisMenu CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/metisMenu/metisMenu.min.css">
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/metisMenu/metisMenu-vertical.css">
	<!-- calendar CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/calendar/fullcalendar.min.css">
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/calendar/fullcalendar.print.min.css">
	<!-- style CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/style.css">
	<!-- responsive CSS
		============================================ -->
	<link rel="stylesheet" href="<?=base_url();?>asset/kiaalap-master/css/responsive.css">
	<!-- modernizr JS
		============================================ -->
	<script src="<?=base_url();?>asset/kiaalap-master/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Start Left menu area -->
        <div class="left-sidebar-pro">
            <nav id="sidebar" class="">
                <div class="sidebar-header">
                    <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
                </div>
                <div class="left-custom-menu-adp-wrap comment-scrollbar">
                    <nav class="sidebar-nav left-sidebar-menu-pro">
                        <ul class="metismenu" id="menu1">
                            <li>
                                <a class="has-arrow" href="index.html">
                                       <span class="educate-icon educate-home icon-wrap"></span>
                                       <span class="mini-click-non">Home</span>
                                    </a>
                            </li>
                            <li>
                                <a title="Landing Page" href="events.html" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Barang</span></a>
                            </li>
                            <li>
                                <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Transaksi</span></a>
                                
                            </li>
                            <li>
                                <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Laporan</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                    <li><a title="All Library" href="library-assets.html"><span class="mini-sub-pro">Library Assets</span></a></li>
                                    <li><a title="Add Library" href="add-library-assets.html"><span class="mini-sub-pro">Add Library Asset</span></a></li>
                                    <li><a title="Edit Library" href="edit-library-assets.html"><span class="mini-sub-pro">Edit Library Asset</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <!-- End Left menu area -->
        <!-- Start Welcome area -->
        <div class="all-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="logo-pro">
                            <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-advance-area">
                <div class="header-top-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="header-top-wraper">
                                    <div class="row">
                                        <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                            <div class="menu-switcher-pro">
                                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                        <i class="educate-icon educate-nav"></i>
                                                    </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                            <div class="header-top-menu tabl-d-n">
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <div class="header-right-info">
                                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                 
                                                    <li class="nav-item">
                                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                                <img src="img/product/pro4.jpg" alt="" />
                                                                <span class="admin-name">Admin</span>
                                                                <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                            </a>
                                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                            <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                            </li>
                                                            <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                            </li>
                                                            <li><a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
                                                            </li>
                                                            <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                                                            </li>
                                                            <li><a href="#"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               