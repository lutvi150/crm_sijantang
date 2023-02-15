<div class="footer-copyright-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="footer-copy-right">
					<p>Copyright © <?=date('Y')?>. All rights reserved. Template by <a href="#"><?=$this->config->item('app_name')?></a></p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script src="<?=base_url();?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootsrap js -->
<!-- <script src="<?=base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script> -->
<script src="<?=base_url();?>assets/js/vendor/popper.js">
</script>
<script src="<?=base_url();?>assets/js/vendor/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.ajaxchimp.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.nice-select.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.sticky.js"></script>
<script src="<?=base_url();?>assets/js/nouislider.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script>
<!-- ck editor -->
<script src="<?=base_url();?>assets/ckeditor/ckeditor.js"></script>
<!--gmaps Js-->
<script src="<?=base_url();?>assets/js/gmaps.min.js"></script>
<script src="<?=base_url();?>assets/js/main.js"></script>
<script>
	// pilih jenis status
	$("#sjenis_ambil").change(function(e) {
		let id = $(this).children("option:selected").val();
		let html = '';
		let html2 = ``;
		if (id == '1') {
			$.ajax({
				type: "GET",
				url: "<?=base_url();?>controller/provinsi",
				data: "data",
				dataType: "JSON",
				success: function(response) {
					console.log(response);
					response.forEach(prov => {
						html2 += `<option value="` + prov.id_prov + `">` + prov.nama +
							`</option>`;
					});
					html += `<select id="provinsi" name="provinsi" class="shipping_select provinsi">
											<option value="">Pilih Provinsi</option>
											` + html2 + `
										</select>
										`;
					$("#isi_jenis_ambil").html(html);
					$("#provinsi").change(function(e) {
						let id_prov = $(this).children("option:selected").val();
						let html3 = ``;
						let html4 = ``;
						$.ajax({
							type: "GET",
							url: "<?=base_url();?>controller/kabupaten",
							data: {
								"id_prov": id_prov
							},
							dataType: "JSON",
							success: function(response2) {
								console.log(response2);
								response2.forEach(kabupaten => {
									html4 += `<option value="` + kabupaten
										.id_kab + `">` + kabupaten.nama +
										`</option>`;
								});
								html3 += `<select id="kabupaten" name="kabupaten" class="shipping_select provinsi">
											<option value="">Pilih Kabupaten</option>
											` + html4 + `
										</select>
										`;
								$("#isi_kabupaten").html(html3);
								$("#kabupaten").change(function(e) {
									let id_kab = $(this).children(
										"option:selected").val();
									let html5 = ``;
									let html6 = ``;
									let html7 = ``;
									$.ajax({
										type: "GET",
										url: "<?=base_url();?>controller/kecamatan",
										data: {
											"id_kab": id_kab
										},
										dataType: "JSON",
										success: function(
											response3) {
											response3.forEach(
												kec => {
													html5
														+=
														`<option value="` +
														kec
														.id_kec +
														`">` +
														kec
														.nama +
														`</option>`;
												});
											html6 += `<select id="kecamatan" name="kecamatan" class="shipping_select provinsi">
											<option value="">Pilih Kecamatan</option>
											` + html5 + `
										</select>
										`;
											$("#isi_kecamatan").html(html6);
											$("#kecamatan").change(function(e) {
												let tar = $(this).children("option:selected").val();
												console.log(tar);
												$.ajax({
													type: "GET",
													url: "<?=base_url();?>controller/tarif_kecamatan",
													data: {
														"tar": tar
													},
													dataType: "JSON",
													success: function(response4) {
														console.log(response4);

														html7 = `
										<select name="ongkir" id="ongkir" class="shipping_select" id="">
										<option value="` + response4.ongkir + `">JNE OKE Rp. ` + response4.ongkir + `</option>
										<option value="` + response4.ongkir_jne_yes + `">JNE YES Rp. ` + response4.ongkir_jne_yes + `</option>
										<option value="` + response4.ongkir_jne_reg + `">JNE REGULAR Rp. ` + response4.ongkir_jne_reg + `</option>
										<option value="` + response4.ongkir_pos_express + `">POS EXPRES Rp. ` + response4.ongkir_pos_express + `</option>
										<option value="` + response4.ongkir_pos_kilat + `">POS KILAT Rp. ` + response4.ongkir_pos_kilat + `</option>
										<option value="` + response4.ongkir_tiki_express + `">TIKI EXPRES Rp. ` + response4.ongkir_tiki_express + `</option>
										<option value="` + response4.ongkir_tiki_reguler + `">TIKI REGULER Rp.` + response4.ongkir_tiki_reguler + `</option>
										</select>`;
														$("#tarif_ongkir").html(html7);
														$("#ongkir").change(function(e) {
															let terif = $(this).children("option:selected").val();
															let harga = $("#total").text();
															let harga_1 = harga.replace("Rp. ", "");
															let harga_2 = harga_1.replace(",", "");
															let total_semua = parseInt(harga_2) + parseInt(terif);
															$("#total").text("Rp. " + total_semua);

															$.ajax({
																type: "GET",
																url: "<?=base_url();?>controller/terbilang_keranjang",
																data: {
																	"angka": terif
																},
																dataType: "JSON",
																success: function(response) {
																	$("#terbilang").text(response.terbilang);
																	$("#total").text("Rp. " + response.angka);
																	console.log(response);
																}
															});

														});
													}
												});

											});
										}
									});
								});
							}
						});
					});
				}
			});

		} else {
			html += ``;

			$("#isi_jenis_ambil").html(html);
		}

	});
	// provinsi
	$("#provinsi").click(function(e) {
		console.log('hi');

	});
	$("#provinsi").change(function(e) {
		let id = $(this).children('option:selected').val();
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>controller/data_kabupaten",
			data: {
				"id": id
			},
			dataType: "JSON",
			success: function(response) {
				//console.log(response);
				let html_kabupaten = '';
				response.forEach(element => {
					html_kabupten = `<option value="` + element.id_prov + `">` + element.nama +
						`</option>`;
				});
				let isi_kabupaten = `<select name="" class="form-control" id="">
										` + html_kabupaten + `
									</select>`;
				console.log(isi_);

				//$("#isi-kabupaten").html(isi_kabupaten);
			}
		});

	});
	window.setTimeout(function() {
		$("#message_error").fadeTo(1000, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 6000);
	window.setTimeout(function() {
		$("#message_success").fadeTo(1000, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 6000);
	// untuk detail prodcut
	$('.detail-product').click(function(e) {
		var id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>controller/detail_product",
			data: {
				"id": id
			},
			dataType: "JSON",
			success: function(response) {
				$('#text_detail_product').text(response.detail);
				$('#detail_product').modal('show');
			}
		});
	});
	// tambah ke keranjang
	$('.tambah-keranjang').click(function(e) {
		var link = $(this).attr('data');
		$('#form_tambah_keranjang').attr('action', link);
		$('#tambah_keranjang').modal('show');
	});
	$('.tidak-bisa-akses').click(function(e) {
		$('#tidak_bisa_akses').modal('show');
	});
	// konfirmasi hapus barang di keranjang
	$('.konfirmasi-hapus-b').click(function(e) {
		var link = $(this).attr('data');
		$('#f_modal_hapus_b').attr('action', link);
		$('#modal_hapus_b').modal('show');
	});
	$('.konfirmasi-edit-b').click(function(e) {
		var id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>controller/barang_keranjang",
			data: {
				"id": id
			},
			dataType: "JSON",
			success: function(response) {
				$('#id_keranjang').val(response.id_keranjang);
				$('#jumlah_pesan').val(response.jumlah_pesan);
				$('#modal_edit_b').modal('show');
			}
		});
	});
	// konfirmasi untuk suruh belanja
	$('.belum-belanja').click(function(e) {
		$('#belum_belanja').modal('show');
	});
</script>
</body>

</html>
