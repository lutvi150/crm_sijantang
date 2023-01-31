<?php $this->load->view('report/head');?>

<body>
	<?php $this->load->view('report/kopsurat');?>
	<table style="width: 100%;">
		<tr style="background-color: rgb(192, 120, 120);">
									<td style="width:20px">NO</td>
									<td style="width:20px">Nomor Transaksi</td>
									<td style="width:20px">Tanggal Transaksi</td>
									<td style="width:20px;" >Nama Pembeli</td>
									<td style="width:20px">Alamat</td>
									<td style="width:20px">No. Kontak</td>
									<td style="width:20px">Jumlah</td>
								</tr><tbody>
								<?php
$no = 1;
$jumlah =[];
foreach ($transaksi as $field2):
?>
<?php $jumlah[]=$field2['total_tagihan']; ?>
								<tr>
									<td><?= $no++?></td>
									<td><?=$field2['nomor_transaksi']?></td>
									<td><?=$field2['tgl_transaksi']?></td>
									<td><?=$field2['nama']?></td>
									<td><?=$field2['alamat']?></td>
									<td><?=$field2['no_hp']?></td>
									<td>Rp. <?=number_format($field2['total_tagihan'])?>
								</td>
								</tr>
								<?php endforeach;?>
								<?php $count=array_sum($jumlah)?>
								<tr>
									<td colspan="6" >Jumlah</td>
									<td>Rp. <?=number_format($count)?></td>
								</tr>
							</tbody>
	</table>
</body>


</html>
