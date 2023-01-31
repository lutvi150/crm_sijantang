<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Pengunjung

		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="col-xs-12">



			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Pengunjung</h3>
				</div>
				<!-- /.box-header -->

				<div class="box-body">

					<p class="text-muted font-13 m-b-30">
						<!-- <a href="" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>
							Cetak Keseluruhan</a>
						<a href="#" class="btn btn-danger btn-sm " data-target="cetak-per-tahun"><i
								class="fa fa-print"></i> Cetak
							Laporan Pertahun</a>
						<a href="#" data-toggle="modal" data-target="#modal_per_bulan" class="btn btn-warning btn-sm"><i
								class="fa fa-print"></i> Cetak Laporan Perbulan</a> -->

					</p>
					
					<table border="1" id="example1" class="table table-bordered table-striped">
					<a href="<?=base_url();?>admin/cetak_total" target="_blank"
									class="btn btn-danger "><i class="fa fa-print"></i> Cetak Total Kunjungan</a>
						<thead>
							<tr>
								<th style="vertical-align : middle;text-align:center;width: 20px;" class="text-center" valign="center" rowspan="2">NO</th>
								<th style="vertical-align : middle;text-align:center;" class="text-center" rowspan="2">Tanggal</th>
								<th class="text-center" valign="center" colspan="3">Jumlah Tamu</th>
							<tr>
								<th  class="text-center">Pria</th>
								<th class="text-center">wanita</th>
								<th class="text-center">Anak anak</th>
							</tr>



							</tr>
						</thead>
						<tbody>
						<?php
						$no=1;
						foreach ($laporan as $value):?>
							<tr>
								<td class="text-center"><?=$no++?></td>
								<td class="text-center"><?=$value['tanggal']?></td>
								<td class="text-center"><?=$value['L']?></td>
								<td class="text-center"><?=$value['P']?></td>
								<td class="text-center"><?=$value['A']?></td>
							</tr>
<?php endforeach; ?>
						</tbody>
						<tfoot>
							<th style="background-color: rgb(134, 145, 167);"></th>
							<th style="background-color: rgb(134, 145, 167);" >Total</th>
							<th class="text-center  " style="background-color: rgb(134, 145, 167);" ><?=$jumlah_p?></th>
							<th class="text-center" style="background-color: rgb(134, 145, 167);" ><?=$jumlah_l?></th>
							<th class="text-center" style="background-color: rgb(134, 145, 167);"><?=$jumlah_a?></th>
						</tfoot>

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