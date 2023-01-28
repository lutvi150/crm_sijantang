<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Uniq Request</h1>
				<nav class="d-flex align-items-center">
					<a href="#">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">Uniq Request</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->
<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">
		<div class="cart_inner">
			<div>
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
				<div id="" class="alert alert-info alert-dismissible">
					<h4><i class="icon fa fa-info"></i> Pemberitahuan !</h4>
					Jika anda ingin design sendiri, atau request design anda dapat melakukannya pada menu di bawah,
					silah sampaikan seperti apa yang anda inginkan, jika anda sudah ada design, silahkan upload design
					anda di bawah
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="contact_info">
							<div class="info_item">
								<i class="lnr lnr-home"></i>
								<h6>Lima Kaum, Kabupaten Tanah Datar</h6>
								<p>Sumatra Barat</p>
							</div>
							<div class="info_item">
								<i class="lnr lnr-phone-handset"></i>
								<h6><a href="#">0822-8503-0187</a></h6>
								<p>Senin - Jumat 08.00 - 16.00</p>
							</div>
							<div class="info_item">
								<i class="lnr lnr-envelope"></i>
								<h6><a href="#">cs@rumahkemasan.com</a></h6>
								<p>Silahkan kirim komplain atau kendala anda pada kami</p>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<form class="row contact_form" action="<?=base_url();?>pelanggan/simpan_uniq_request" method="post" enctype="multipart/form-data" id="contactForm"
							novalidate="novalidate">
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" required name="keterangan" id="keterangan" rows="1"
										placeholder="Enter Message" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Enter Message'"></textarea>
								</div>
								<div class="form-group">
									<input type="text" required class="form-control" id="nama_design" name="nama_design"
										placeholder="Masukkan Nama Desain anda" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Masukkan Nama Desain anda'">
								</div>
								<div class="form-group">
									<input type="text" required class="form-control" id="jumlah" name="jumlah"
										placeholder="Mesukkan Jumlah yang akan anda pesan" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Masukkan Jumlah yang akan anda pesan'">
								</div>
								<div class="form-group">
									<input type="file" class="form-control" id="document" name="document"
										placeholder="" onfocus="this.placeholder = ''"
										onblur="this.placeholder = ''">
								</div>
							</div>
							<div class="col-md-12 text-right">
								<button type="submit" value="submit" class="primary-btn">Kirim Pesanan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Cart Area =================-->
<!-- modal konfirmasi hapus -->
<div class="modal fade" id="modal_hapus_b" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="f_modal_hapus_b" method="post">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi Hapus </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Yakin Akan Hapus Dari Keranjang ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-primary">Ya</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- modal konfirmasi edit -->
<div class="modal fade" id="modal_edit_b" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>controller/ubah_pesan" id="" method="post">
				<div class="modal-header">
					<h5 class="modal-title">Edit Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id_keranjang" id="id_keranjang">
					<div class="form-group">
						<label for="">Jumlah Yang akan di pesan</label>
						<input type="text" name="jumlah_pesan" id="jumlah_pesan" class="form-control" placeholder=""
							aria-describedby="helpId">
						<small id="helpId" class="text-muted">Masukkan Jumlah barang yang akan di pesan</small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-primary">Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal pilih barang -->
<div class="modal fade" id="belum_belanja" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Peringatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Maaf Keranjang Belanja Anda Masih Kosong, silahkan pilih barang yang anda inginkan terlebih dahulu
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
