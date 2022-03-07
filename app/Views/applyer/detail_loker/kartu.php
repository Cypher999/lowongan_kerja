<?php
$hari=array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis","Fri"=>"Jum at","Sat"=>"Sabtu","Sun"=>"Minggu");
$bln=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
?>
<div style="width:50%;padding-left: 250px">
<h1>Surat Lamaran Kerja</h1>
<br>
<h3>Identitas Diri</h3>
<?php foreach($data["kartu"] as $krt){?>
<table>
<tr>
	<td>Nama Pelamar</td>
	<td>:</td>
	<td><?php echo $krt["nm_lengkap"];?></td>
	<td rowspan="4" style="width:200px">
	<td rowspan="4"><?php $cek_foto="img/profile_logo/".$krt["id_user"].".png";
		if(!file_exists($cek_foto)){
			if($krt["jekel"]=="P"){
				$cek_foto="img/profile_logo/A.png";
			}
			else{
				$cek_foto="img/profile_logo/B.png";	
			}
		}?>
		<img width="200" height="200" src="<?php echo $cek_foto;?>"></td>
</tr>
<tr>
	<td>Nama Pelamar</td>
	<td>:</td>
	<td><?php echo $krt["nm_lengkap"];?></td>
</tr>
<tr>
	<td>Alamat Lengkap</td>
	<td>:</td>
	<td><?php echo $krt["alt_leng"];?></td>
</tr>
<tr>
	<td>Pendidikan Terakhir</td>
	<td>:</td>
	<td><?php echo $krt["pend_ter"];?></td>
</tr>
</table><br>
<h2>Rincian Lamaran</h2>
<table>
<tr>
	<td>Nama Perusahaan / instansi</td>
	<td>:</td>
	<td><?php echo $krt["nm_com"];?></td>
</tr>
<tr>
	<td>Posisi yang Dilamar</td>
	<td>:</td>
	<td><?php echo $krt["nm_job"];?></td>
</tr>
<tr>
	<td>Tanggal Submit Lamaran</td>
	<td>:</td>
	<td><?php 
	$wkt=date_create($krt["tgl_lam"]);
	$tgl=date_format($wkt,"d");
	$hr=date_format($wkt,"D");
	$bl=date_format($wkt,"m");
	$thn=date_format($wkt,"Y");
	echo $hari[$hr]." ".$tgl." ".$bln[$bl-1]." ".$thn;?></td>
</tr>
<tr>
	<td>Alamat</td>
	<td>:</td>
	<td>Provinsi <?php echo $krt["prov"];?> Kabupaten <?php echo $krt["kab"];?> Kecamatan <?php echo $krt["kec"];?> Desa / jalan <?php echo $krt["des"];?></td>
</tr>
</table><br>
<div id='qrcode' style="width:100px; height:100px; margin-top:15px;"></div><br>
<p>kode QR diatas untuk mengecek keabsahan data lamaran kerja</p>
<?php $this->view("applyer/detail_loker/__partials/js");?>
<script>
	makeCode("<?php echo BASE_URL."?a=Detail_loker/cek_kartu&&key=".$krt["id_kartu"];?>");
	window.print();
</script>
<?php } ?>