<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Uniq Request Anda

		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">



				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Uniq Request</h3>
					</div>
					<!-- /.box-header -->

					<div class="box-body">

						<!-- <p class="text-muted font-13 m-b-30">
							<a href="" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>
								Cetak Keseluruhan</a>
							<a href="#" class="btn btn-danger btn-sm " data-target="cetak-per-tahun"><i class="fa fa-print"></i> Cetak
								Laporan Pertahun</a>
							<a href="#" data-toggle="modal" data-target="#modal_per_bulan"
								class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Cetak Laporan Perbulan</a> -->

						</p>
						<!-- <a href="<?=base_url();?>admin/cetak_user" target="_blank"
									class="btn btn-primary "><i class="fa fa-print"></i> Cetak Data</a> -->
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
						<table id="example1" class="table table-bordered table-striped nowrap example1">

							<thead>

								<tr>
									<th style="width:20px">NO</th>
									<th style="width:20px" class="text-center">Nama desain</th>
									<th style="width:20px" class="text-center">Jumlah Pesanan</th>
									<th style="width: 20px;" class="text-center">Harga Kesepakatan</th>
									<th style="width:20px" class="text-center">Total Harga</th>
									<th style="width: 20px;" class="text-center">Status</th>
									<th style="width: 20px" class="text-center">Desain</th>
									<th style="width: 20px;" class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
		$no=1;
		foreach ($uniq_request as $field2) :
		?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$field2['nama_desain']?></td>
									<td><?=$field2['jumlah_belanja']?></td>
									<td><?php if ($field2['status_request']=='H'):?>
										<span class="label label-danger">Harga Belum Ditetapkan</span>
										<?php else: ?>
										<span class="label label-success "><?='Rp. '.number_format($field2['harga_satuan'])?></span>
										<?php endif; ?>
									</td>
									<td><?php if ($field2['status_request']=='H'):?>
										<span class="label label-danger">Harga Belum Ditetapkan</span>
										<?php else: ?>
										<span
											class="label label-success "><?='Rp. '.number_format($field2['harga_satuan']*$field2['jumlah_belanja'])?></span>
										<?php endif; ?></td>
									<td>
										<?php if ($field2['status_request']=='H'):?>
										<span class="label label-danger">Menunggu Konfirmasi</span>
										<?php else: ?>
										<span class="label label-success ">Menunggu Persetujuan User</span>
										<?php endif; ?>
									</td>
									<td>
										<?php if ($field2['document']=='-'):?> 
											<a href="#" data="<?=$field2['id_uniq_request']?>" class="btn btn-info btn-sm view-design belum-ada">
												<i class="fa fa-search"></i> Desain
											</a>
										<?php else :?>
											<a href="#" data="<?=$field2['id_uniq_request']?>" class="btn btn-info btn-sm view-design sudah-ada">
												<i class="fa fa-search"></i> Desain
											</a>
										<?php endif;?>
									</td>
									<td>
										<a href="#" data="<?=$field2['id_uniq_request'];?>"
											class="btn btn-info btn-sm view-uniq"><i class="fa fa-search"></i>
											Detail</a>
										<?php if($field2['status_request']=='H'): ?>
										<a href="#" data="<?=$field2['id_uniq_request']?>" class="btn btn-success btn-sm tetapkan-harga"><i
												class="fa fa-money"></i>Tetapkan Harga</a>
										<?php endif; ?>
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

<!-- Modal  detail pesanan-->
<div class="modal fade" id="detail_request" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title tulisan">Detail Uni Request<button type="button" class="close"
						data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>

			</div>
			<div class="modal-body">
					<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Nama</label>
							<input type="text" name="" id="nama" readonly class="form-control" placeholder="" aria-describedby="helpId">
						  </div>
						  <div class="form-group">
							<label for="">Alamat</label>
							<input type="text" readonly name="" id="alamat" class="form-control" placeholder="" aria-describedby="helpId">
						  </div>
						  <div class="form-group">
							<label for="">Nomor Kontak</label>
							<input type="text" readonly name="" id="no_hp" class="form-control" placeholder="" aria-describedby="helpId">
						  </div>
					</div>
					<div class="col-md-6">
							<div class="form-group">
									<label for="">Tanggal Pesanan</label>
									<input type="text" name="" id="tgl_pesanan" readonly class="form-control" placeholder="" aria-describedby="helpId">
								  </div>
								  <div class="form-group">
									<label for="">Tgl Selesai</label>
									<input type="text" readonly name="" id="tgl_selesai" class="form-control" placeholder="" aria-describedby="helpId">
								  </div>
								
					</div>
					<div class="col-md-12">
						Detail Barang Yang di Request
				<div class="col-md-12" id="keterangan_uniq">

				</div>
					</div>
					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="tetapkan_harga" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>admin/tetapkan_harga_satuan" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Harga</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id_uniq_request" id="id_uniq_request">
				<div class="form-group">
					<label for="">Harga/ satuan</label>
					<input type="text" name="harga_satuan" required id="harga_satuan" class="form-control" placeholder=""
						aria-describedby="helpId">
					<small id="helpId" class="text-muted">Harga Persatuan</small>
				</div>

				<div class="form-group">
					<label for="">Total Pesanan</label>
					<input type="text" name="total_pesanan" id="total_pesanan" readonly class="form-control" placeholder=""
						aria-describedby="helpId">
					<small id="helpId" class="text-muted">Total Pesanan</small>
				</div>

				<div class="form-group">
					<label for="">Total Harga</label>
					<input type="text" name="total_harga" id="total_harga" readonly class="form-control" placeholder=""
						aria-describedby="helpId">
					<small id="helpId" class="text-muted">Total Harga</small>
				</div>
				<div class="form-group">
						<label for="">Terbilang</label>
						<textarea name="terbilang"  id="terbilang" cols="30" rows="3" class="form-control" readonly ></textarea>
						<small id="helpId" class="text-muted">Terbilang</small>
					  </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="belum_ada" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Desain</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				Uniq Request ini belum memiliki desain
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="sudah_ada" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Desain</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
			<div id="priview_image">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>