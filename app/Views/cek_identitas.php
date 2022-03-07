<h1>Data Ditemukan</h1>
<h3>Data Pelamar</h3>
<?php foreach($data["cek_kartu"] as $ck){?>
<table>
	<tr>
		<td>No. KTP</td>
		<td>:</td>
		<td><?php echo $ck["ktp"];?></td>
	</tr>
	<tr>
		<td>Nama Pelamar</td>
		<td>:</td>
		<td><?php echo $ck["nm_lengkap"];?></td>
	</tr>
	<tr>
		<td>Alamat Pelamar</td>
		<td>:</td>
		<td><?php echo $ck["alt_leng"];?></td>
	</tr>
</table><br>
<h3>Data lamaran</h3>
<table>
	<tr>
		<td>Nama instansi / Perusahaan</td>
		<td>:</td>
		<td><?php echo $ck["nm_com"];?></td>
	</tr>
	<tr>
		<td>Nama lowongan</td>
		<td>:</td>
		<td><?php echo $ck["nm_job"];?></td>
	</tr>
</table>
<?php }?>