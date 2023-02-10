<?php
$value_discount = json_decode($discount->value);
?>
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Setting Aplikasi

		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">



				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Setting Aplikasi</h3>
					</div>
					<!-- /.box-header -->

					<div class="box-body">


						<table id="example1" class="table table-bordered table-striped nowrap example1">

							<thead>

								<tr>
									<th style="width:20px">NO</th>
									<th style="width:20px">Jenis Settingan</th>
									<th>Setting</th>
								</tr>
							</thead>
							<tr>
								<td>1</td>
								<td><?=$discount->setting_name?></td>
								<td>
									<div class="form-group">
									  <label for="">Minimal Transaksi</label>
									  <input type="text" onkeyup="update_dicount(<?=$discount->id_setting?>,'<?=$discount->setting_name?>')"name="minimal_transaksi_discount" value="<?=$value_discount->minimal_transaksi?>" id="minimal_transaksi_dicount" class="form-control" placeholder="" aria-describedby="helpId">
									  <small id="helpId" class="text-muted"></small>
									</div>
									<div class="form-group">
										<label for="">Persentase Discount</label>
										<input type="text" name="persentase_discount" id="persentase_discount" onkeyup="update_dicount(<?=$discount->id_setting?>,'<?=$discount->setting_name?>')" value="<?=$value_discount->persentase_discount?>" class="form-control" placeholder="" aria-describedby="helpId">
										<small id="helpId" class="text-muted"></small>
									  </div>

								</td>
							</tr>
							<tbody>

						</table>
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
<script>
	update_dicount=(id,setting_name)=>{
		let data={
			id_setting:id,
			minimal_transaksi:$(`input[name=minimal_transaksi_${setting_name}]`).val(),
			persentase_discount:$(`input[name=persentase_${setting_name}]`).val(),
		}
		console.log(data);
		$.ajax({
			type: "POST",
			url: "<?=base_url('admin/update_setting')?>",
			data: data,
			dataType: "JSON",
			success: function (response) {

			}
		});
	}
</script>

