<?php $this->load->view('report/head');?>

<body>
	<?php $this->load->view('report/kopsurat');?>
	<table style="width: 100%;">
		<tr style="background-color: rgb(192, 120, 120);">
									<td style="width:20px">NO</td>
									<td style="width:20px">Nomor Transaksi</td>
									<td style="width:20px">Nama Pelanggan</td>
									<td style="width: 20px;" >Tanggal Transaksi</td>
									<td style="width:20px">Nomor HP</td>
									<td style="width: 20px;">Status</td>
								</tr><tbody>
								<?php
$no = 1;
foreach ($transaksi as $field2):
?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$field2['nomor_transaksi']?></td>
									<td><?=$field2['nama']?></td>
									<td><?=$field2['tgl_transaksi']?></td>
									<td><?=$field2['no_hp']?></td>
									<td><?php if ($field2['status'] == 'B'): ?>
										<span class="label label-warning">Menunggu Pembayaran</span>
										<?php elseif ($field2['status'] == 'K'): ?>
										<span class="label label-danger">Konfirmasi Pembayaran</span>
										<?php elseif ($field2['status'] == 'L'): ?>
										<span class="label label-success"> Lunas</span>
										<?php elseif ($field2['status'] == 'P'): ?>
										<span class="label label-success"> Proses Pengerjaan</span><br>
									<label for="">	Selesai Tanggal : <?=$field2['tgl_selesai']?></label>
									<?php elseif ($field2['status'] == 'F'): ?>
										<span class="label label-success"> Finish</span><br>
										<?php endif;?>
								</td>
								</tr>
								<?php endforeach;?>
							</tbody>
	</table>
</body>


</html>
