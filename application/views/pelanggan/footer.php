<footer class="main-footer">

	<div class="pull-right hidden-xs">
		<b>Version</b> 1.0.0
	</div>
	<strong>Copyright &copy; <?=date('Y')?> <a href="#"> <?=$this->config->item('app_name')?></a>.</strong> All rights
	reserved.

</footer>

<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/fastclick/lib/fastclick.js"></script>
<!-- Sparkline -->

<script src="<?php echo base_url();?>assets/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/jquery-knob/dist/jquery.knob.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/moment/min/moment.min.js"></script>

<!-- Timepicker -->
<script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
	
	$('#tanggal_perhari').datepicker();
	$('#datepicker3').datepicker();
	$('#timepickermodal').timepicker();

	
	$('#datepicker1').datepicker({
		autoclose: true
	});
	// sudah ada desain
	$('.sudah-ada').click(function (e) { 
		let id=$(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>pelanggan/detail_uniq",
			data: {"id":id},
			dataType: "JSON",
			success: function (response) {
				$('#priview_image').html('<img src="<?=base_url();?>'+response.uniq_request.document+'" style="width: 100%; height: 500px; text-align: center;" alt="">');
		$('#sudah_ada').modal('show');
			}
		});
	});
	// view uniq request
	$('.view-uniq').click(function (e) {
		let id = $(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>pelanggan/detail_uniq",
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
	// setuju transaksi
	$('.setuju-transaksi').click(function (e) {
		let id=$(this).attr('data');
		$('#form_setuju_transaksi').attr('action',id); 
		$('#setuju_transaksi').modal('show');
	});
	$('.konfirmasi').click(function (e) {
		var id = $(this).attr('data');

		$('#id_barang').val(id);
		$('#konfirmasi').modal('show');
	});
	// untuk melihat detail pesanan
	$('.detail-pesanan').click(function (e) { 
		var id=$(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>pelanggan/detail_transaksi",
			data: {"id":id},
			dataType: "json",
			success: function (response) {
				console.log(response);
				
		$('#detail_pesanan').modal('show');
			}
		});
	});
	// untuk upload bukti bayar
	$('.upload-bukti').click(function (e) { 
		var id=$(this).attr('data');
		$('#nomor_transaksi').val(id);
		$('#upload_bukti').modal('show');
	});
	$('.detail-produk').click(function (e) { 
		var id=$(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>admin/detail_produk",
			data: {"id":id},
			dataType: "JSON",
			success: function (response) {
				console.log(response);
		$('#text_detail_produk').text(response.detail);		
		$('#detail_produk').modal('show');
			}
		});
	});
	$('.lihat-foto').click(function (e) { 
		var id =$(this).attr('data');
		$.ajax({
			type: "GET",
			url: "<?=base_url();?>admin/detail_produk",
			data: {"id":id},
			dataType: "JSON",
			success: function (response) {
				console.log(response);
				$('#foto').attr("src","<?=base_url()?>"+response.foto);
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
<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agus", "September", "Oktober",
  			"November", "Desember"
  		],
			datasets : [
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [12,13,14,14,16,17,18,2,10,12,13,15]
				}
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("diagram").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>
</body>

</html>
