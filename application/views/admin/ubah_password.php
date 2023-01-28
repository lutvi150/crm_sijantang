<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Ganti Password

		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Password</a></li>
			<li class="active">Ubah Password</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-7">
				<!-- Horizontal Form -->
				<div class="box box-success">
					<div class="box box-primary box-solid">
						<div class=" box box-header border">
							<h3 class="box-title">Ubah Password</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form class="form-horizontal">
							<div class="box-body">
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
							</div>

							<div class="form-group">
								<label for="inputPassword1" class="col-sm-3 control-label">Password Lama</label>

								<div class="col-sm-9">
									<input type="password" class="form-control" id="inputPassword1" name="password_lama"
										placeholder="Password Lama">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword2" class="col-sm-3 control-label">Password Baru</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" id="inputPassword1" name="password_baru"
										placeholder="Password Baru">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-3 control-label">Ulangi Password</label>

								<div class="col-sm-9">
									<input type="password" class="form-control" id="inputPassword1"
										name="ulangi_password" placeholder=" Ulangi Password">
								</div>
							</div>

					</div>
					<!-- /.box-body -->
					<div class="box-footer">

						<button type="submit" class="btn btn-info pull-right"><i class="fa fa-exchange"></i>
							Ganti</button>
					</div>
					<!-- /.box-footer -->
					</form>
				</div>

			</div>
			<!--/.col (right) -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
