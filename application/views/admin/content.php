 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			Home
 			<small></small>
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li class="active">Dashboard</li>
 		</ol>
 	</section>

 	<!-- Main content -->
 	<section class="content">
 		<!-- Small boxes (Stat box) -->
 		<div class="row">
 			<div class="col-lg-3 col-xs-6">
 				<!-- small box -->
 				<div class="small-box bg-aqua">
 					<div class="inner">
 						<h3><?=$jumlah_pelanggan?></h3>

 						<p>Jumlah Barang</p>
 					</div>
 					<div class="icon">
 						<i class="ion ion-bag"></i>
 					</div>
 					<a href="<?=base_url();?>admin/barang" class="small-box-footer">Info Lanjut <i class="fa fa-arrow-circle-right"></i></a>
 				</div>
 			</div>
 			<!-- ./col -->
 			<div class="col-lg-3 col-xs-6">
 				<!-- small box -->
 				<div class="small-box bg-green">
 					<div class="inner">
 						<h3><?=$jumlah_transaksi?></h3>

 						<p>Jumlah Transaksi</p>
 					</div>
 					<div class="icon">
 						<i class="ion ion-stats-bars"></i>
 					</div>
 					<a href="<?=base_url();?>admin/data_transaksi" class="small-box-footer">Info Lanjut <i class="fa fa-arrow-circle-right"></i></a>
 				</div>
 			</div>
 			<!-- ./col -->
 			<div class="col-lg-3 col-xs-6">
 				<!-- small box -->
 				<div class="small-box bg-yellow">
 					<div class="inner">
 						<h3><?=$jumlah_user?></h3>

 						<p>Total User</p>
 					</div>
 					<div class="icon">
 						<i class="ion ion-person-add"></i>
 					</div>
 					<a href="<?=base_url();?>admin/data_user" class="small-box-footer">Info Lanjut <i class="fa fa-arrow-circle-right"></i></a>
 				</div>
 			</div>
 			<!-- ./col -->
 			<div class="col-lg-3 col-xs-6">
 				<!-- small box -->
 				<div class="small-box bg-red">
 					<div class="inner">
 						<h3>Rp <?=$total_transaksi?></h3>

 						<p>Total Transaksi</p>
 					</div>
 					<div class="icon">
 						<i class="ion ion-pie-graph"></i>
 					</div>
 					<a href="<?=base_url();?>admin/data_transaksi" class="small-box-footer">Info lanjut <i class="fa fa-arrow-circle-right"></i></a>
 				</div>
 			</div>
 			<!-- ./col -->
 		</div>
 		<!-- /.row -->
 		<!-- Main row -->

 		<div class="row">
 			<!-- Left col -->
 			<!-- Main content -->
 			<section class="content">

 				<!-- Default box -->
 				<div class="box">
 					<div class="box-header with-border">
 						<h3 class="box-title"></h3>

 						<div class="box-tools pull-right">
 							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
 								title="Collapse">
 								<i class="fa fa-minus"></i></button>
 							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
 								title="Remove">
 								<i class="fa fa-times"></i></button>
 						</div>
 					</div>
 					<div class="box-body">
 						<div class="col-md-12 text-center">
 							<h1>Selamat Datang di <?=$this->config->item('app_name')?></h1>

 						</div>
 					</div>
 					<!-- /.box-body -->
 					<div class="box-footer">

 					</div>
 					<!-- /.box-footer-->
 				</div>
 				<div class="box">
 					<div class="box-header with-border">
 						<h3 class="box-title">Total Transaksi Perbulan</h3>

 						<div class="box-tools pull-right">
 							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
 								title="Collapse">
 								<i class="fa fa-minus"></i></button>
 							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
 								title="Remove">
 								<i class="fa fa-times"></i></button>
 						</div>
 					</div>
 					<div class="box-body">
 						<div class="col-md-12 text-center">
 							<div class="chart">
 								<canvas id="diagram" style="height:250px"></canvas>
 							</div>

 						</div>
 					</div>
 					<!-- /.box-body -->
 					<div class="box-footer">

 					</div>
 					<!-- /.box-footer-->
 				</div>
 				<!-- /.box -->

 			</section>
 			<!-- /.content -->


 		</div>
 </div>
