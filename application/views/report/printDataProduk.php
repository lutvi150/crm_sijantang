<?php $this->load->view('report/head');?>

<body>
	<?php $this->load->view('report/kopsurat');?>
	<table style="width: 100%;">
		<tr style="background-color: rgb(192, 120, 120);">
			<td>NO</td>
			<td>Nama</td>
			<td>Jenis</td>
			<td>Harga Jual</td>
			<td>Harga Modal</td>
			<td>Margin Keuntungan</td>
			<td>Stock</td>
		</tr>
		</tr>
		<tbody>
								<?php
		$no=1;
		foreach ($produk as $field1) :
		?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $field1-> nama_produk;?> </td>
									<td><?php echo $field1-> jenis;?> </td>
									<td><?=number_format($field1-> harga_jual);?></td>
									<td><?=number_format($field1->harga_modal)?></td>
									<td><?php $keuntungan=$field1->harga_jual-$field1->harga_modal;$persentase=round((($keuntungan/$field1->harga_modal)*100),2); echo number_format($keuntungan).'/ '.$persentase."% dari modal"; ?></td>
									<td><?=$field1->stock." ". $field1->satuan?></td>
								
								</tr>
								<?php endforeach;?>
							</tbody>
	</table>
</body>


</html>
