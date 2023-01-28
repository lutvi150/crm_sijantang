<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Keranjang Belanja</h1>
				<nav class="d-flex align-items-center">
					<a href="#">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="#">Keranjang</a>
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
			<div class="table-responsive">
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
				<form action="<?=base_url();?>controller/proses_transaksi" method="post">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Jenis Barang</th>
							<th scope="col">Harga</th>
							<th scope="col">Jumlah</th>
							<th scope="" style="width: 200px;">Total</th>
							<th scope="col" style="width: 100px;"></th>
						</tr>
					</thead>
					<tbody>
						<?php if ($status_data == '0'): ?>
						<?php elseif ($status_data == '1'): ?>
						<?php foreach ($keranjang as $value): ?>
						<tr>
							<td>
								<div class="media">
									<div class="d-flex">
										<img class="gambar-keranjang" src="<?=base_url($value['foto'])?>" alt="">
									</div>
									<div class="media-body">
										<p><?=$value['nama']?></p>
									</div>
								</div>
							</td>
							<td>
								<h5>Rp. <?=number_format($value['harga'])?></h5>
							</td>
							<td>
								<div class="product_count">
									<p><?=$value['jumlah_pesan'] . " " . $value['satuan']?> </p>
								</div>
							</td>
							<td>
								<h5>Rp. <?=number_format($value['total_harga'])?></h5>
							</td>
							<td>
								<a href="#" data="<?=base_url();?>controller/hapus_barang/<?=$value['id_keranjang']?>"
									class="btn btn-danger btn-sm konfirmasi-hapus-b"><i class="fa fa-trash"></i></a>
								<a href="#" data="<?=$value['id_keranjang']?>"
									class="btn btn-warning btn-sm konfirmasi-edit-b"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						<?php endforeach;?>
						<?php endif;?>
						<tr class="shipping_area">
							<td>

							</td>
							<td>

							</td>
							<td>
								<h5>Pegiriman</h5>
							</td>
							<td>

								<div class="shipping_box">

									<h6>Pilih Status <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
									<select name="status_bayar" class="shipping_select" id="jenis_ambil">
										<option value="1">Kirim</option>
										<option value="2">Ambil Di Tempat</option>
									</select>
									<div id="isi_jenis_ambil">

									</div>
									<div id="isi_kabupaten"></div>
									<div id="isi_kecamatan"></div>
									<div id="tarif_ongkir"></div>

								</div>
							</td>
						</tr>

						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<h5>Total Keseluruhan</h5>
							</td>
							<td>
								<?php if ($status_data=='1') {
    								echo "<h5 ><div id='total'>Rp. ".number_format($total_belanja)."</div></h5>";
}
?>
							</td>
						</tr>

						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<h5>PIlih Jenis Bank</h5>
							</td>
							<td>
								<div class="form-check">
									<label class="form-check-label">
									<input type="radio" class="form-check-input" name="bank" id="" value="bri" >BRI -
								  </label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
									<input type="radio" class="form-check-input" name="bank" id="" value="bni" >BNI -
								  </label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
									<input type="radio" class="form-check-input" name="bank" id="" value="mandiri" >Mandiri -
								  </label>
								</div>
							</td>
						</tr>
						<tr>
							<td>

							</td>
							<td>

							</td>
							<td>
								<h5>Terbilang</h5>
							</td>
							<td>
								<?php if ($status_data == '1') {
    echo "<h5><div id='terbilang'>".$terbilang."</div></h5>";
}?>
							</td>
						</tr>
						<tr class="out_button_area">
							<td>

							</td>
							<td>

							</td>
							<td>

							</td>
							<td>
								<div class="checkout_btn_inner d-flex align-items-center">
									<a class="gray_btn" href="<?=base_url();?>">Lanjut Belanja</a>
									<?php if ($status_data=='1'):?>
									<button class="primary-btn" type="submit" >Proses
										Belanja</button>
									<?php elseif ($status_data=='0'):?>
									<a class="primary-btn belum-belanja" href="#">Proses
										Belanja</a>
									<?php endif; ?>
								</div>
							</td>
						</tr>
					</form>
					</tbody>
				</table>
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
