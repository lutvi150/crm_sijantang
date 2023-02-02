<footer class="main-footer">

	<div class="pull-right hidden-xs">
		<b>Version</b> 1.0.0
	</div>
	<strong>Copyright &copy; <?=date('Y')?> <a href="#"><?=$this->config->item('app_name')?></a>.</strong> All rights
	reserved.

</footer>

<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/fastclick/lib/fastclick.js"></script>
<!-- Sparkline -->

<script src="<?php echo base_url(); ?>assets/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/jquery-knob/dist/jquery.knob.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/moment/min/moment.min.js"></script>

<script src="<?php echo base_url(); ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
	$('#tanggal_perhari').datepicker();
	$('#datepicker3').datepicker({
		format: "dd-mm-yyyy"
	});
	// sudah ada desain
	$('.sudah-ada').click(function (e) {
		let id=$(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>admin/detail_uniq",
			data: {"id":id},
			dataType: "JSON",
			success: function (response) {
				$('#priview_image').html('<img src="<?=base_url();?>'+response.uniq_request.document+'" style="width: 100%; height: 500px; text-align: center;" alt="">');
		$('#sudah_ada').modal('show');
			}
		});
	});
	// belum ada desain
	$('.belum-ada').click(function (e) {
		$('#belum_ada').modal('show');
	});
	// hitung otomatis
	$('#harga_satuan').keyup(function (e) {
		let id = $('#harga_satuan').val();
		let jumlah = $('#total_pesanan').val();
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>admin/hitung_jumlah_biaya",
			data: {
				"id": id,
				"jumlah": jumlah
			},
			dataType: "JSON",
			success: function (response) {
				$('#total_harga').val(response.biaya);
				$('#terbilang').val(response.terbilang);
			}
		});
	});
	// tetapkan harga
	$('.tetapkan-harga').click(function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>admin/detail_uniq",
			data: {
				"id": id
			},
			dataType: "JSON",
			success: function (response) {
				console.log(response);

				$('#id_uniq_request').val(id);
				$('#total_pesanan').val(response.uniq_request.jumlah_belanja);
				$('#tetapkan_harga').modal('show');
			}
		});
	});
	// view uniq request
	$('.view-uniq').click(function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>admin/detail_uniq",
			data: {
				"id": id
			},
			dataType: "JSON",
			success: function (response) {
				console.log(response);
				$('#keterangan_uniq').html(response.uniq_request.keterangan);
				$('#nama').val(response.pelanggan.nama);
				$('#alamat').val(response.pelanggan.alamat);
				$('#no_hp').val(response.pelanggan.no_hp);
				$('#detail_request').modal('show');
			}
		});
	});
	// cetak transaksi
	$('.transaksi-perbulan').click(function (e) {
		$('#transaksi_perbulan').modal('show')
	});
	// cetak semua transaksi
	$('.semua-transaksi').click(function (e) {
		$('#semua_transaksi').modal('show');
	});
	// cetak user pertanggal
	$('.cetak-user-pertanggal').click(function (e) {
		$('#cetak_user_pertanggal').modal('show');
	});
	// finish transaksi
	$('.finish-transaksi').click(function (e) {
		let id = $(this).attr('data');
		$('#form_finish_transaksi').attr('action', id);
		$('#finish_transaksi').modal('show');
	});

	// proses transakssi
	$('.proses-transaksi').click(function (e) {
		let id = $(this).attr('data');
		console.log(id);
		$('#form_proses_transaksi').attr("action", id);
		$('#proses_transaksi').modal('show');
	});
	// tolak pembayaran
	$('.tolak-pembayaran').click(function (e) {
		let id = $(this).attr('data');
		console.log(id);
		$('#form_tolak_pembayaran').attr("action", id);
		$('#tolak_pembayaran').modal('show');
	});
	// konfirmasi pembayaran
	$('.konfirmasi-pembayaran').click(function (e) {
		let id = $(this).attr('data');
		$('#form_terima_pembayaran').attr('action', id);
		$("#terima_pembayaran").modal('show');
	});
	// lihat bukti bayar
	$('.bukti-bayar').click(function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url()?>admin/bukti_bayar",
			data: {
				"id": id
			},
			dataType: "JSON",
			success: function (response) {
				console.log(response.bukti_bayar);
				$('.image-bukti-bayar').attr("src", "<?=base_url();?>" + response.bukti_bayar);
				$('#view_bukti_bayar').modal('show');
			}
		});
	});
	// detail transaksi
	$('.detail-transaksi').click(function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>admin/detail_transaksi",
			data: {
				"id": id
			},
			dataType: "JSON",
			success: function (response) {

				var html = "";
				response.jenis_barang.forEach(element => {
					html += `<tr>
								<td>` + element.nama_produk + `</td>
								<td>` + element.harga_jual + `</td>
								<td>` + element.jumlah_pesan + `</td>
								<td>` + element.total_harga + `</td>
							</tr>`
				});
				$('.banyak_barang').html(html);
				$('#tgl_selesai').val(response.data_transaksi.tgl_selesai);
				$('#tgl_pesanan').val(response.data_transaksi.tgl_transaksi);
				$('#total_bayar').text('Rp. ' + response.data_transaksi.total_tagihan);
				$('#terbilang').text(response.terbilang);
				$('#nama').val(response.data_transaksi.nama);
				$('#alamat').val(response.data_transaksi.alamat);
				$('#no_hp').val(response.data_transaksi.no_hp);
				$('#detail_transaksi').modal('show');
			}
		});

	});

	$('#datepicker1').datepicker({
		autoclose: true
	});

	$('.konfirmasi').click(function (e) {
		var id = $(this).attr('data');

		$('#id_produk').val(id);
		$('#konfirmasi').modal('show');
	});
	$('.detail-produk').click(function (e) {
		var id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>admin/detail_produk",
			data: {
				"id": id
			},
			dataType: "JSON",
			success: function (response) {
				console.log(response);
				$('#text_detail_produk').text(response.keterangan);
				$('#detail_produk').modal('show');
			}
		});
	});
	$('.lihat-foto').click(function (e) {
		var id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>admin/detail_produk",
			data: {
				"id": id
			},
			dataType: "JSON",
			success: function (response) {
				console.log(response);
				$('#foto').attr("src", "<?=base_url()?>" + response.foto);
				$('#lihat_foto').modal('show');
			}
		});
	});
	var loadFile = function (event) {
		var reader = new FileReader();
		reader.onload = function () {
			var output = document.getElementById('output');
			output.src = reader.result;
		};
		reader.readAsDataURL(event.target.files[0]);
	};
	window.setTimeout(function () {
		$("#message_success").fadeTo(1000, 0).slideUp(500, function () {
			$(this).remove();
		});
	}, 6000);
	window.setTimeout(function () {
		$("#message_error").fadeTo(1000, 0).slideUp(500, function () {
			$(this).remove();
		});
	}, 6000);

	$('.example1').DataTable();
	// tampila diagram

</script>

</body>

</html>
