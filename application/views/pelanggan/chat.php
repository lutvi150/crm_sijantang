<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Chat Anda

		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">



				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Transaksi</h3>
					</div>
					<!-- /.box-header -->

					<div class="box-body">

						<!-- <p class="text-muted font-13 m-b-30">
							<a href="" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>
								Cetak Keseluruhan</a>
							<a href="#" class="btn btn-danger btn-sm " data-target="cetak-per-tahun"><i class="fa fa-print"></i> Cetak
								Laporan Pertahun</a>
							<a href="#" data-toggle="modal" data-target="#modal_per_bulan"
								class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Cetak Laporan Perbulan</a> -->

						</p>
						<!-- <a href="<?=base_url();?>admin/cetak_user" target="_blank"
									class="btn btn-primary "><i class="fa fa-print"></i> Cetak Data</a> -->
									<?php if ($this->session->userdata('error')): ?>
              <div id="message_error" class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-ban"></i> Maaf !</h4>
                  <?php echo $this->session->userdata('error'); ?>
              </div>
              <?php elseif ($this->session->userdata('success')): ?>
              <div id="message_success" class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Success !</h4>
                  <?php echo $this->session->userdata('success'); ?>
              </div>
			  <?php endif;?>
<!-- Construct the card with style you want. Here we are using card-danger -->
<!-- Then add the class direct-chat and choose the direct-chat-* contexual class -->
<!-- The contextual class should match the card, so we are using direct-chat-danger -->
<div class="card card-danger direct-chat direct-chat-danger">
  <div class="card-header">
    <h3 class="card-title">Direct Chat</h3>
    <div class="card-tools">
      <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">3</span>
      <button type="button" class="btn btn-tool" data-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
        <i class="fas fa-comments"></i>
      </button>
      <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <!-- Conversations are loaded here -->
    <div class="direct-chat-messages">
      <!-- Message. Default to the left -->
      <div class="direct-chat-msg">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-left">Alexander Pierce</span>
          <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
        </div>
        <!-- /.direct-chat-infos -->
        <img class="direct-chat-img" src="/docs/3.0/assets/img/user1-128x128.jpg" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          Is this template really for free? That's unbelievable!
        </div>
        <!-- /.direct-chat-text -->
      </div>
      <!-- /.direct-chat-msg -->
      <!-- Message to the right -->
      <div class="direct-chat-msg right">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-right">Sarah Bullock</span>
          <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
        </div>
        <!-- /.direct-chat-infos -->
        <img class="direct-chat-img" src="/docs/3.0/assets/img/user3-128x128.jpg" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          You better believe it!
        </div>
        <!-- /.direct-chat-text -->
      </div>
      <!-- /.direct-chat-msg -->
      <!-- Message. Default to the left -->
      <div class="direct-chat-msg">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-left">Alexander Pierce</span>
          <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
        </div>
        <!-- /.direct-chat-infos -->
        <img class="direct-chat-img" src="/docs/3.0/assets/img/user1-128x128.jpg" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          Working with AdminLTE on a great new app! Wanna join?
        </div>
        <!-- /.direct-chat-text -->
      </div>
      <!-- /.direct-chat-msg -->
      <!-- Message to the right -->
      <div class="direct-chat-msg right">
        <div class="direct-chat-infos clearfix">
          <span class="direct-chat-name float-right">Sarah Bullock</span>
          <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
        </div>
        <!-- /.direct-chat-infos -->
        <img class="direct-chat-img" src="/docs/3.0/assets/img/user3-128x128.jpg" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          I would love to.
        </div>
        <!-- /.direct-chat-text -->
      </div>
      <!-- /.direct-chat-msg -->
    </div>
    <!--/.direct-chat-messages-->
    <!-- Contacts are loaded here -->
    <div class="direct-chat-contacts">
      <ul class="contacts-list">
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user1-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Count Dracula
                <small class="contacts-list-date float-right">2/28/2015</small>
              </span>
              <span class="contacts-list-msg">How have you been? I was...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user7-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Sarah Doe
                <small class="contacts-list-date float-right">2/23/2015</small>
              </span>
              <span class="contacts-list-msg">I will be waiting for...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user3-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Nadia Jolie
                <small class="contacts-list-date float-right">2/20/2015</small>
              </span>
              <span class="contacts-list-msg">I'll call you back at...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user5-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Nora S. Vans
                <small class="contacts-list-date float-right">2/10/2015</small>
              </span>
              <span class="contacts-list-msg">Where is your new...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user6-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                John K.
                <small class="contacts-list-date float-right">1/27/2015</small>
              </span>
              <span class="contacts-list-msg">Can I take a look at...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
        <li>
          <a href="#">
            <img class="contacts-list-img" src="/docs/3.0/assets/img/user8-128x128.jpg">
            <div class="contacts-list-info">
              <span class="contacts-list-name">
                Kenneth M.
                <small class="contacts-list-date float-right">1/4/2015</small>
              </span>
              <span class="contacts-list-msg">Never mind I found...</span>
            </div>
            <!-- /.contacts-list-info -->
          </a>
        </li>
        <!-- End Contact Item -->
      </ul>
      <!-- /.contacts-list -->
    </div>
    <!-- /.direct-chat-pane -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <form action="#" method="post">
      <div class="input-group">
        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
        <span class="input-group-append">
          <button type="button" class="btn btn-primary">Send</button>
        </span>
      </div>
    </form>
  </div>
  <!-- /.card-footer-->
</div>
<!--/.direct-chat -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>



