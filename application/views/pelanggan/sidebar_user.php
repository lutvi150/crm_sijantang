<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url();?>asset/img/icon-admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$nama?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="<?php echo base_url();?>pelanggan/menu_anda">
            <i class="fa fa-home"></i><span>Home</span>
           
          </a>
        
        </li>
        <li>
          <a href="<?=base_url();?>controller"><i class="fa fa-book"></i>Katalog Design</a>
        </li>
        <li>
          <a href="<?php echo base_url();?>pelanggan/data_uniq_request">
            <i class="fa fa-briefcase"></i> <span>Uniq Request</span>
          
          </a>
        </li>
        
        <li>
          <a href="<?php echo base_url();?>pelanggan/data_transaksi">
            <i class="fa fa-money"></i> <span>Transaksi Anda</span>
          
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

 