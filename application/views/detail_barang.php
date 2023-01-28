	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="<?=base_url($barang['foto']);?>" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="<?=base_url($barang['foto']);?>" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="<?=base_url($barang['foto']);?>" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
                    <form action="<?=base_url();?>controller/tambah_keranjang/<?=$barang['id_barang']?>" method="post">
					<div class="s_product_text">
						<h3><?=$barang['nama']?></h3>
						<h2>Rp. <?=number_format($barang['harga'])?></h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Jenis</span> : <?=$barang['jenis']?></a></li>
							<li><a href="#"><span>Status</span> : Ready Stock</a></li>
						</ul>
						<p><?=$barang['detail']?></p>
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="jumlah_pesan" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							 class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
						</div>
						<div class="card_area d-flex align-items-center">
                            <?php if ($this->session->userdata('logged_in')==true):?>
                                
                            <button class="primary-btn "  type="submit" >Add to Cart</button>
                            <?php else:?>
                            <button class="primary-btn tidak-bisa-akses"   >Add to Cart</button>
                            <?php endif; ?>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                        </div>
                    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	
	