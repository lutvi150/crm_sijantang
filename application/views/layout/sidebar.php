<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?=base_url();?>assets/img/icon-admin.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<?php if ($this->session->userdata('level') == 'pelanggan'): ?>
				<p><?=$nama?> </p>
				<?php else: ?>
				<p>Admin</p>
				<?php endif;?>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
							class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<?php if ($this->session->userdata('level') == 'admin'): ?>
			<!-- use this for admin menu -->
			<li class="">
				<a href="<?php echo base_url(); ?>admin">
					<i class="fa fa-home"></i><span>Home</span>
				</a>
			</li>
			<li class="">
				<a href="<?php echo base_url(); ?>Controller">
					<i class="fa fa-home"></i><span>Katalog Produk</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>admin/barang">
					<i class="fa fa-briefcase"></i> <span>Produk</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>admin/data_transaksi">
					<i class="fa fa-money"></i> <span>Data Transaksi</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>admin/data_user">
					<i class="fa fa-users"></i> <span>Data User</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>admin/get_new_chat">
					<i class="fa fa-book"></i> <span>Chat</span>
				</a>
			</li>
			<li>
				<a href="<?=base_url(); ?>admin/setting">
					<i class="fa fa-wrench"></i> <span>Setting</span>
				</a>
			</li>
			<?php elseif ($this->session->userdata('level') == 'pelanggan'): ?>
			<!-- use this for use menu -->
			<li class="">
				<a href="<?php echo base_url(); ?>pelanggan/menu_anda">
					<i class="fa fa-home"></i><span>Home</span>
				</a>
			</li>
			<li>
				<a href="<?=base_url();?>controller"><i class="fa fa-book"></i>Katalog Produk</a>
			</li>

			<li>
				<a href="<?php echo base_url(); ?>pelanggan/data_transaksi">
					<i class="fa fa-money"></i> <span>Menu Transaksi</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>pelanggan/chat">
					<i class="fa fa-money"></i> <span>Chat Admin</span>
				</a>
			</li>
			<?php endif;?>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
