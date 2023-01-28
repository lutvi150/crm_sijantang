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
						<table id="example1" class="table table-bordered table-striped wrap example1">
					
							<thead>
							
								<tr>
									<th style="width:20px">NO</th>
									<th style="width:20px" class="text-center">Nama Desain</th>
									<th style="width:20px" class="text-center">Jumlah Pesan</th>
									<th style="width: 20px;" class="text-center" >Tanggal Pesan</th>
									<th style="width: 20px;" class="text-center">Total Tagihan</th>
                                    <th style="width: 20px" class="text-center">Status Request</th>
                                    <th style="width: 20px;">Detail Request</th>
									<th style="width: 20px;" class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
                            <?php if ($status_data=='0'):?>
                            <tr>
                            <td colspan="10" >
                            Tidak Ada Data Di Temukan
                            </td></tr>
                            <?php else :?>
								<?php
		$no=1;
		foreach ($uniq_request as $field2) :
		?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$field2['nama_desain']?></td>
									<td><?=$field2['jumlah_belanja']?></td>
									<td><?=$field2['tgl_request']?></td>
									<td>Rp. <?=$field2['total_tagihan']?></td>
									<td>
									<?php if ($field2['status_request']=='H'):?>
										<span class="label label-warning">Menunggu Konfirmasi Admin</span>
										<?php elseif ($field2['status_request']=='K'):?>
										<span class="label label-danger">Konfirmasi Pembayaran</span>
										<?php elseif ($field2['status_request']=='L'):?>
										<span class="label label-success"> Lunas</span>
										<?php elseif ($field2['status_request']=='P'):?>
										<span class="label label-success"> Proses Pengerjaan</span><br>
									<label for="">	Selesai Tanggal : <?=$field2['tgl_selesai']?></label>
									<?php elseif ($field2['status_request']=='F'):?>
										<span class="label label-success"> Finish</span><br>
										<?php endif; ?>
                                    </td>
                                    <td><a href="#" data="<?=$field2['id_request']?>" class="btn btn-info btn-xs detail-request"><i class="fa fa-search"></i>Detail Request</a></td>
									<td>
									<?php if ($field2['status_request']=='B'):?>
										<a href="#" class="btn btn-success btn-xs upload-bukti" data="<?=$field2['nomor_transaksi']?>"><i class="fa fa-upload"></i> Upload Bukti Bayar</a>
										
									<?php endif; ?>
									</td>
								</tr>
								<?php endforeach;?>
                                    <?php endif; ?>
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
<div class="modal fade" id="detail_request" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title tulisan">Detail Request<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>

			</div>
			<div class="modal-body">
                <div class="form-group">
                  <label for="">Nama Desain</label>
                  <input type="text" readonly name="nama_desain" id="nama_desain" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                       <div class="col-md-12">
                            <label for="">Jumlah Pesan</label>
                        <input type="text" readonly name="jumlah_belanja" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="">Harga Satuan</label>
                        <input type="text" readonly name="harga" id="harga" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="">Satuan</label>
                        <input readonly type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="">Status</label>
                        <input type="text"  name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      
                       </div>
                       <div class="col-md-12">
                           <div class="col-md-12 text-lefth">
                               <h3>Keterangan</h3>
                           </div>
                           <div class="col-md-12">
a
                           </div>
                       </div>
                       <div class="col-md-12">
                           <div class="col-md-12 text-lefth">
                               <h3>Foto</h3>
                           </div>
                           <div class="col-md-12 col-sm-12">
                               <img class="gambar-modal" src="<?=base_url();?>upload/original_image/c39bc5507dcf24d36f25e384fcf77df3.png" alt="">
                           </div>
                       </div>
            </div>
           
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal  Kunjungan-->
<div class="modal fade" id="upload_bukti" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url();?>pelanggan/upload_bukti_bayar" method="post" enctype="multipart/form-data" >
			<div class="modal-header">
				<h5 class="modal-title tulisan">Upload Bukti Bayar<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>

			</div>
			<div class="modal-body">
				<input type="hidden" name="nomor_transaksi" id="nomor_transaksi">
				<div class="form-group">
				  <label for="">Foto Bukti Bayar </label>
				  <input type="file" name="bukti_b" id="bukti_b" class="form-control" placeholder="" aria-describedby="helpId">
				  <small id="helpId" class="text-muted red">Silahkan Upload Foto Bukti Bayar Anda, Format yang di Izinkan JPG,PNG</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-success"><i class="fa fa-upload"></i>Upload</button>
			</div>
			</form>
		</div>
		</div>
	</div>
</div>


