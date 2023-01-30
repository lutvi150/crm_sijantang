<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Produk

		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Produk </h3>
					</div>
					<!-- /.box-header -->

					<!-- <a href="" target="_blank" class="btn btn-warning "><i class="fa fa-print"></i> Cetak PDF</a> -->

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
						<a href="<?=base_url();?>admin/tambah_produk" class="btn btn-success btn-sm "><i
								class="fa fa-plus"></i> Tambah Produk</a>
						<a href="<?=base_url();?>admin/cetak_barang/semua" target="_blank"
							class="btn btn-danger btn-sm "><i class="fa fa-print"></i> Cetak Data</a>

						<table id="example1" class="table table-bordered table-striped example1 wrap">
							<thead>
								<tr>
									<th>NO</th>
									<th>Nama</th>
									<th>Jenis</th>
									<th>Harga Jual</th>
									<th>Harga Modal</th>
									<th>Margin Keuntungan</th>
									<th>Stock</th>
									<th>Foto(Klik untuk lihat foto)</th>
									<th class="wrap">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
		$no=1;
		foreach ($barang as $field1) :
		?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $field1-> nama_produk;?> </td>
									<td><?php echo $field1-> jenis;?> </td>
									<td><?=number_format($field1-> harga_jual);?></td>
									<td><?=number_format($field1->harga_modal)?></td>
									<td><?php $keuntungan=$field1->harga_jual-$field1->harga_modal;$persentase=round((($keuntungan/$field1->harga_modal)*100),2); echo number_format($keuntungan).'/ '.$persentase."% dari modal"; ?></td>
									<td><?=$field1->stock." ". $field1->satuan?></td>
									<td><button class="btn btn-info" type="button">Foto</button></td>
									<td class="wrap">
										<a href="#" class="btn btn-primary btn-xs detail-produk"
											data="<?=$field1->id_produk;?>"><i class="fa fa-edit"></i> Detail</a>
										<a href="<?=base_url();?>admin/edit_produk/<?=$field1->id_produk;?>"
											class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<a href="#" data="<?=$field1->id_produk;?>"
											class="btn btn-danger btn-xs konfirmasi"><i class="fa fa-trash"></i>
											Delete</a>
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>

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


<!-- Modal -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>admin/hapus_data_barang" method="post">
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi Hapus Data<button type="button" class="close"
							data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button></h5>

				</div>
				<div class="modal-body">
					Anda Yakin Akan Menghapus Data Ini ?
					<input type="hidden" name="id_produk" id="id_produk" value="">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-primary">Ya</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal detail barang -->
<div class="modal fade" id="detail_produk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Produk<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>

			</div>
			<div class="modal-body">
				<div id="text_detail_produk"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal lihat foto -->
<div class="modal fade" id="lihat_foto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Foto<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>

			</div>
			<div class="modal-body">
				<div class="text-center">

					<img class="gambar-modal" name="foto" id="foto" src="<?=base_url($field1->foto);?>" alt="">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
