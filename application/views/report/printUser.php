<?php $this->load->view('report/head');?>

<body>
	<?php $this->load->view('report/kopsurat');?>
	<table style="width: 100%;">
		<tr style="background-color: rgb(192, 120, 120);">
		<td style="width:20px">NO</td>
									<td style="width:20px">Username</td>
									<td style="width:20px">Nama</td>
									<td>Alamat</td>
									<td style="width: 20px;" >Tanggal Registrasi</td>
									<td style="width:20px">Nomor HP</td>
								</tr><tbody><?php
$no = 1;
foreach ($data_user as $field2):
?>
								<tr>
									<td><?=$no++?></td>
									<td><?=$field2['username']?></td>
									<td><?=$field2['nama']?></td>
									<td><?=$field2['alamat']?></td>
									<td><?=$field2['tgl_registrasi']?></td>
									<td><?=$field2['no_hp']?></td>
								</tr>
								<?php endforeach;?>
							</tbody>
	</table>
</body>


</html>
