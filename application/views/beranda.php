<!-- Modal detail product-->
<div class="modal fade" id="detail_product" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Barang

				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

			</div>
			<div class="modal-body">
				<div class="" id="text_detail_product"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal tambah ke keranjang-->
<div class="modal fade" id="tambah_keranjang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="" id="form_tambah_keranjang" method="post">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi

					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Jumlah di Pesan</label>
						<input type="text" name="jumlah_pesan" id="" class="form-control" placeholder="" aria-describedby="helpId">
						<small id="helpId" class="text-muted">Masukkan Jumlah Yang akan di pesan</small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-success">Ya</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- start banner Area -->
<section class="banner-area">
	<div class="container">
		<div class="row fullscreen align-items-center justify-content-start">
			<div class="col-lg-12">
				<div class="active-banner-slider owl-carousel">
					<!-- single-slide -->
					<div class="row single-slide align-items-center d-flex">
						<div class="col-lg-5 col-md-6">
							<div class="banner-content">
								<h1>Dasawisma Sijantang<br>New Produk!</h1>
								<p>Silahkan Pilih prouk sesuai kebutuhan anda</p>
								<div class="add-bag d-flex align-items-center">
									<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
									<span class="add-text text-uppercase">Add to Bag</span>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="banner-img">
								<img class="img-fluid" src="<?=base_url();?>upload/thumb_image/15.png" alt="">
							</div>
						</div>
					</div>
					<!-- single-slide -->
					<div class="row single-slide">
						<div class="col-lg-5 col-md-6">
						<div class="banner-content">
								<h1>Dasawisma Sijantang<br>New Produk!</h1>
								<p>Silahkan Pilih prouk sesuai kebutuhan anda</p>
								<div class="add-bag d-flex align-items-center">
									<a class="add-btn" href=""><span class="lnr lnr-cross"></span></a>
									<span class="add-text text-uppercase">Add to Bag</span>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="banner-img">
								<img class="img-fluid" src="<?=base_url();?>upload/thumb_image/15.png" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- start features Area -->
<section class="features-area section_gap">
	<div class="container">
		<div class="row features-inner">
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="<?=base_url();?>asset/img/features/f-icon1.png" alt="">
					</div>
					<h6>Free Delivery</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="<?=base_url();?>asset/img/features/f-icon2.png" alt="">
					</div>
					<h6>Proses Cepat</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="<?=base_url();?>asset/img/features/f-icon3.png" alt="">
					</div>
					<h6>24/7 Support</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="<?=base_url();?>asset/img/features/f-icon4.png" alt="">
					</div>
					<h6>Secure Payment</h6>
					<p>Free Shipping on all order</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end features Area -->


<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Daftar Produk Terbaik Kami</h1>
						<p>Ini Adalah Beberapa Produk Yang Bisa Anda Pesan </p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- single product -->
				<?php foreach ($kemasan as $value): ?>
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<a href="<?=base_url();?>controller/detail_barang/<?=$value['id_produk']?>">
								<img class="img-fluid gambar-produk" src="<?=base_url($value['foto_produk']);?>" alt=""></a>
							<div class="product-details">
								<h6><?=$value['nama_produk']?></h6>
								<div class="price">
									<h6>Rp.<?=number_format($value['harga_jual'])?>,- </h6>
									<!-- <h6 class="l-through">Rp.600,-</h6> -->
								</div>
								<div class="prd-bottom">
									<?php if ($this->session->userdata('logged_in') == true): ?>
										<a href="#" data="<?=base_url();?>controller/tambah_keranjang/<?=$value['id_produk']?>" class="social-info tambah-keranjang">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
										<a href="" class="social-info">
											<span class="lnr lnr-heart"></span>
											<p class="hover-text">Wishlist</p>
										</a>

									<?php elseif ($this->session->userdata('logged_in') !== true): ?>
										<!-- jika belumlogin -->

										<a href="#" class="social-info tidak-bisa-akses">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
										<a href="#" class="social-info tidak-bisa-akses">
											<span class="lnr lnr-heart"></span>
											<p class="hover-text">Wishlist</p>
										</a>

									<?php endif;?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Produk Terlaris</h1>
						<p>Daftar Produk Terlaris Kami</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- single product -->
				<?php foreach ($kemasan as $value): ?>
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<a href="<?=base_url();?>controller/detail_barang/<?=$value['id_produk']?>">
								<img class="img-fluid gambar-produk" src="<?=base_url($value['foto_produk']);?>" alt=""></a>
							<div class="product-details">
								<h6><?=$value['nama_produk']?></h6>
								<div class="price">
									<h6>Rp.<?=number_format($value['harga_jual'])?>,- </h6>
									<!-- <h6 class="l-through">Rp.600,-</h6> -->
								</div>
								<div class="prd-bottom">
									<?php if ($this->session->userdata('logged_in') == true): ?>
										<a href="#" data="<?=base_url();?>controller/tambah_keranjang/<?=$value['id_produk']?>" class="social-info tambah-keranjang">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
										<a href="" class="social-info">
											<span class="lnr lnr-heart"></span>
											<p class="hover-text">Wishlist</p>
										</a>

									<?php elseif ($this->session->userdata('logged_in') !== true): ?>
										<!-- jika belumlogin -->

										<a href="#" class="social-info tidak-bisa-akses">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
										<a href="#" class="social-info tidak-bisa-akses">
											<span class="lnr lnr-heart"></span>
											<p class="hover-text">Wishlist</p>
										</a>

									<?php endif;?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</section>
<!-- end product Area -->
