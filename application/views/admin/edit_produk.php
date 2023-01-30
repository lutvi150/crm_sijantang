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
				<form action="<?php echo base_url(); ?>admin/simpan_produk/update" id="store-produk" method="post"
					class="form-horizontal ">
					<?php if ($this->session->userdata('error')): ?>
					<div id="message_error" class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-ban"></i> Maaf !</h4>
						<?php echo $this->session->userdata('error'); ?>
					</div>
					<?php elseif ($this->session->userdata('success')): ?>
					<div id="message_success" class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Success !</h4>
						<?php echo $this->session->userdata('success'); ?>
					</div>
					<?php endif;?>
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="box-body">
									<div class="form-group">
										<label for="">Nama Produk</label>
										<input type="text" value="<?=$nama_produk?>" class="form-control" id="nama" name="nama"
											placeholder="Nama Produk">
											<span class="text-error enama"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Jenis</label>
										<input type="text" value="<?=$jenis?>" required name="jenis" id="jenis" class="form-control"
											placeholder="Jenis">
											<span class="text-error ejenis"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Harga Modal</label>
										<input type="text" required name="harga_modal" id="harga_modal" value="<?=$harga_modal?>"
											class="form-control" placeholder="Harga Modal">
											<span class="text-error eharga_modal"></span>
									</div>

									<div class="form-group">
										<label class="control-label">Harga Jual</label>
										<input type="text" required name="harga_jual" id="harga_jual" value="<?=$harga_modal?>" class="form-control"
											placeholder="Harga Jual">
											<span class="text-error eharga_jual"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Keterangan</label>
										<textarea name="keterangan" id="keterangan" class="form-control" cols="30"
											rows="10"><?=$keterangan?></textarea>
											<span class="text-error eketerangan"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Satuan</label>
										<input type="text" required name="satuan" id="satuan" value="<?=$keterangan?>" class="form-control"
											placeholder="Satuan Pemesanan">
											<span class="text-error esatuan"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Stock</label>
										<input type="number" required name="stock" value="<?=$stock?>" id="stock" class="form-control"
											placeholder="Stock Barang">
											<span class="text-error estock"></span>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="alert alert-info" role="alert">
									<strong>Pemberitahuan</strong>
									<ul>
										<li>Foto Unggulan adalah foto utama ketika produk muncul di katalog pelanggan
										</li>
									</ul>
								</div>
								<table class="table table-border">
									<thead>
										<th>Foto</th>
										<th style="width: 5%;"><button type="button"
												class="btn btn-info btn-xs tambah-foto" data-toggle="modal"
												data-target="#add-image">Tambah Foto</button></th>
									</thead>
									<tbody class="show_foto">
										<tr class="row_1">
											<td>
												<button type="button" onclick="image_priview()" class="btn btn-info"><i
														class="fa fa-image"></i>Foto Produk</button>
											</td>
											<td>
												<button type="button" onclick="remove_image()"
													class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
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
				<button type="button" class="btn btn-success" onclick="store_produk()" >
					<i class="fa fa-save" ></i> Simpan
				</button>
				</form>
			</div>
		</div>
	</section>
</div>
<!-- use for priview produk -->

<div class="modal fade" id="modal-priview-image" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Image Produk</h5>
			</div>
			<div class="modal-body image-priview">
				<img style="width: 100%;height: 500px;" src="<?=base_url()?>assets/img/no-image-found-360x260.png"
					alt="">
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
		<form id="store-image" action="<?=base_url('admin/upload_foto_produk');?>" method="post">
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
						<input type="file" name="foto_produk" id="" class="form-control" placeholder=""
							aria-describedby="helpId">
						<small id="helpId" style="color: red;" class="eimage text-muted">Foto yang diizinkan hanya JPG
							atau PNG</small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" onclick="store_image()" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Button trigger modal -->
<script>
	let baseUrl = "<?=base_url();?>";
	let id = "<?=$id_produk?>";
	$(document).ready(function () {
		get_image();
	});

	function store_image() {
		$(".eimage").text('Foto yang diizinkan hanya JPG atau PNG');
		$("#store-image").ajaxForm({
			type: "POST",
			url: $("#store-image").attr('action'),
			data: {
				id_produk: id
			},
			dataType: "JSON",
			success: function (response) {
				if (response.status == 'failed') {
					$('.eimage').text(response.error)
				} else {
					$("#add-image").modal('hide');
					Swal.fire('Upload Foto Berhasil')
					get_image();
				}
			},
			error: function () {
				Swal.fire('Something went wrong');
			}
		}).submit();
	}

	function get_image() {
		$.ajax({
			type: "POST",
			url: "<?=base_url();?>admin/get_foto_produk",
			data: {
				id_produk: id
			},
			dataType: "JSON",
			success: function (response) {
				let html = "";
				let foto_unggulan = "";
				$.each(response, function (index, value) {
					if (value.foto_unggulan == 0) {
						foto_unggulan =
							`<button type="button" onclick="jadikan_foto_unggulan('${value.id_foto_produk}')" class="btn btn-info"  ><i class="fa fa-check"></i>Jadikan Foto Unggulan</button>`;
					} else {
						foto_unggulan =
							`<button type="button" class="btn btn-success"  ><i class="fa fa-check"></i>Foto Unggulan</button>`
					}
					html += `<tr class="row_${value.id_foto_produk}">
											<td>
												<button type="button" onclick="image_priview('${value.foto_produk}')" class="btn btn-info"  ><i class="fa fa-image"></i>Foto Produk</button>
											</td>
											<td>${foto_unggulan}</td>
											<td>
												<button type="button" onclick="remove_image(${value.id_foto_produk})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
											</td>
										</tr>`;
				});
				$(".show_foto").html(html);
			}
		});
	}

	//   use for make photo feature
	function jadikan_foto_unggulan(id_foto_produk){
		$.ajax({
			type: "POST",
			url: baseUrl + "/admin/jadikan_foto_unggulan",
			data: {
				id_foto_produk: id_foto_produk,
				id_produk: id
			},
			dataType: "JSON",
			success: function (response) {
				if (response.status == 'success') {
					get_image();
					Swal.fire('Foto barhasil dijasikan foto unggulan');
				}
			},
			error: function () {
				Swal.fire('Something went wrong');
			}
		});
	}

	function image_priview(image) {
		$(".image-priview").html(`<img style="width: 100%;height: 500px;" src="<?=base_url()?>${image}" alt="">`);
		$("#modal-priview-image").modal('show');
	}

	function remove_image(id) {
		$(".row_" + id).remove();
		$.ajax({
			type: "POST",
			url: baseUrl + "/admin/remove_foto_produk",
			data: {
				id_foto_produk: id
			},
			dataType: "JSON",
			success: function (response) {
				if (response.status == 'success') {
					Swal.fire('Hapus foto berhasil');
				}
			},
			error: function () {
				Swal.fire('Something went wrong');
			}
		});
	}
	function store_produk() {
		$(".text-error").text('');
		$("#store-produk").ajaxForm({
			type: "POST",
			url: $("#store-produk").attr('action'),
			data: {id_produk:id},
			dataType: "JSON",
			success: function (response) {
				if (response.status=='foto produk not found') {
				Swal.fire(`${response.msg}`);
				}else if (response.status=='validation failed') {
					$.each(response.msg, function (index, value) {
						$(".e"+index).html(value);
					});
				} else{
					Swal.fire({title:`${response.msg}`,confirmButtonText:'Oke'}).then((result)=>{
						if (result.isConfirmed) {
						location.href=baseUrl+'/admin/barang'
						}
					});
				}
			},
			error: function () {
				Swal.fire('Something went wrong');
			}
		}).submit();
	 }

</script>
