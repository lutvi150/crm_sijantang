<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tambah Produk

		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Produk</li>
		</ol>
	</section>
	<section class="content">
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Produk</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
							class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i
							class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="<?php echo base_url();?>admin/simpan_kemasan" enctype="multipart/form-data" method="post"
					class="form-horizontal ">
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
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="box-body">
									<div class="form-group">
										<label for="">Nama Produk</label>
										<input type="text" class="form-control" id="nama" name="nama"
											placeholder="Nama Produk">
									</div>
									<div class="form-group">
										<label class="control-label">Jenis</label>
										<input type="text" required name="jenis" id="jenis" class="form-control"
											placeholder="Jenis">
									</div>
									<div class="form-group">
										<label class="control-label">Harga Modal</label>
										<input type="text" required name="harga_modal" id="harga_modal"
											class="form-control" placeholder="Harga Modal">
									</div>

									<div class="form-group">
										<label class="control-label">Harga Jual</label>
										<input type="text" required name="harga" id="harga" class="form-control"
											placeholder="Harga Jual">
									</div>
									<div class="form-group">
										<label class="control-label">Keterangan</label>
										<textarea name="detail" id="detail" class="form-control" cols="30"
											rows="10">Isi dengan detail Keterangan Produk</textarea>
									</div>
									<div class="form-group">
										<label class="control-label">Satuan</label>
										<input type="text" required name="satuan" id="satuan" class="form-control"
												placeholder="Satuan Pemesanan">
									</div>
									<div class="form-group">
										<label class="control-label">Stock</label>
										<input type="number" required name="stock" id="stock" class="form-control"
												placeholder="Stock Barang">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<table class="table table-border">
									<thead>
										<th>Foto</th>
										<th style="width: 5%;"><button type="button" class="btn btn-info btn-xs tambah-foto" data-toggle="modal" data-target="#add-image">Tambah Foto</button></th>
									</thead>
									<tbody class="show_foto">
										<tr class="row_1">
											<td>
												<button type="button" onclick="image_priview()" class="btn btn-info"  ><i class="fa fa-image"></i>Foto Produk</button>
											</td>
											<td>
												<button type="button" onclick="remove_image()" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
											</td>
										</tr>
									</tbody>
								</table>
							

								<!-- /.form-group -->
							</div>
							<!-- /.col -->
						</div>
					</div>
					<!-- /.row -->
			</div>
			<!-- /.box-body -->
			<div class="box-footer flot-left">
				<a href="<?=base_url('admin/barang');?>" class="btn btn-primary">
					<i class="fa fa-reply"></i> Kembali
				</a>
				<button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modelId">
					<i class="fa fa-save"></i> Simpan
				</button>
				</form>
			</div>
		</div>
	</section>
</div>
<!-- use for priview produk -->

<div class="modal fade" id="modal-priview-image" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Image Produk</h5>
			</div>
			<div class="modal-body">
				<img style="width: 100%;height: 500px;" src="<?=base_url()?>assets/img/no-image-found-360x260.png" alt="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- use for modal add image -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
  Launch
</button>

<!-- Modal -->
<div class="modal fade" id="add-image" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="<?=base_url('admin/upload_foto_produk');?>" method="post">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Gambar Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				  <label for="">Upload Foto Produk</label>
				  <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
				  <small id="helpId" class="text-muted">Help text</small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</form>
	</div>
</div>
<!-- Button trigger modal -->
<script>
	$(document).ready(function () {
		sessionStorage.setItem('row_brg',1);
	});
	function tambah() { 
		let storage=sessionStorage.getItem('row_brg');
		let newStorage=parseInt(storage)+1;
		sessionStorage.setItem('row_brg',newStorage);
		$(".show_foto").append(`<tr class="row_${newStorage}">
											<td>
												<button type="button" onclick="image_priview()" class="btn btn-info"  ><i class="fa fa-image"></i>Foto Produk</button>
											</td>
											<td>
												<button type="button" onclick="remove_image(${newStorage})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
											</td>
										</tr>`);
	 }
	 function image_priview() {
		$("#modal-priview-image").modal('show');
	   }
	   function remove_image() { 
		$("row_"+1).remove();
		let storage=sessionStorage.getItem('row_brg');
		let newStorage=parent(storage)+1;
		sessionStorage.setItem('row_brg',newStorage);
	    }
</script>
