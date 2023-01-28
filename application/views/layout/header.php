<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$this->config->item('app_name')?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="shortcut icon" href="<?php echo base_url();?>gambar/logodepan.png" type="image/x-icon"><!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/morris.js/morris.css">
  
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/costume/costume-admin.css"> 
	
<script src="<?php echo base_url();?>assets/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url();?>assets/form-master/dist/jquery.form.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img  class="gambar1"src="<?php echo base_url();?>gambar/logoapp.jpg" alt=""></span>
      <!-- logo for regular state and mobile devices -->
      <b> <?=$this->config->item('app_name')?></b></span>
  
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
              <?php if ($this->session->userdata('level')=='admin'):?>
              <img src="<?=base_url();?>assets/img/icon-admin.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
              <?php elseif ($this->session->userdata('level')=='pelanggan'):?>
              <img src="<?php echo base_url($foto);?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$nama;?></span>
                    <?php endif; ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if ($this->session->userdata('level')=='admin'):?>
                <img src="<?=base_url();?>assets/img/icon-admin.png" class="img-circle" alt="User Image">

                <p>
                 Admin
                  <small></small>
                </p>
                <?php elseif ($this->session->userdata('level')=='pelanggan'):?>
                <img src="<?php echo base_url($foto);?>" class="img-circle" alt="User Image">

                <p>
                  <?=$nama;?>
                  <small></small>
                </p>
                <?php endif; ?>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="<?php echo base_url();?>index.php/control_admin/profil">Profile</a>
                    </div>
                    <div class="col-xs-2 text-center">
                      <a href="#"></a>
                    </div>
                    <div class="col-xs-6 text-center">
                      <a href="#">Ubah Pasword</a>
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


  


  