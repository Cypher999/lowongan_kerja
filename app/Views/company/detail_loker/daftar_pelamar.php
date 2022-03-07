<?php
$_SESSION["id_loker"]=$_GET['key'];
?>
<!DOCTYPE html>
<html>
	<?php $this->view("company/detail_loker/__partials/head");?>
	<body>
		<?php $this->view("company/menu");?>

		<div class='container mb-5 p-2'>
			<div class="card p-2" style="border-left: solid green 3px">
				<h2>Daftar Pelamar</h2>
			</div>
			<div class="card p-2">
				<a href='<?php echo BASE_URL."?a=Loker&&key=".$data["read_one"][0]["id_company"];?>'>Kembali</a>
				<table class="table table-list-lamaran table-bordered">
					<thead>
						<tr>
							<th colspan=3>Nama Posisi yang dilamar</th>
							<th>nama_posisi</th>
						</tr>
						<tr>
							<th>Nama Pelamar</th>
							<th>Tanggal mengirim lamaran</th>
							<th>Status Pelamar</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data["low_ker"] as $low_ker){?>
						<tr>
							<td><?php echo $low_ker["nm_lengkap"];?></td>
							<td><?php $wkt=date_create($low_ker["tgl_lam"]);
							$tgl=date_format($wkt,"d");
							$bln=date_format($wkt,"M");
							$thn=date_format($wkt,"Y");
							$cek_jadwal=$this->model("Model_interview")->cek_jadwal($low_ker['id_lam']);
							 echo $tgl." ".$bln." ".$thn;?></td>
							 <td><?php if($low_ker["stat_lam"]=="D"){
							 	echo "Lamaran Ditolak";
							 }
							 else if($low_ker["stat_lam"]=="X"){
							 	echo "Pelamar sedang menunggu pertimbangan selanjutnya";
							 }
							 else if($low_ker["stat_lam"]=="B"&&$cek_jadwal==0){
							 	echo "Pelamar sudah dinyatakan layak untuk interview, menunggu informasi interview";
							 }
							 else if($cek_jadwal>0){
							 	echo "Informasi interview sudah diberikan";
							 }?></td>
							<td><a href='<?php echo BASE_URL."?a=Detail_loker/lihat_berkas&&key=".$low_ker["id_user"];?>'>Lihat berkas pelamar</a><br>
								<?php if($low_ker["stat_lam"]=="X"){
							 	echo "<a href='".BASE_URL."?a=Lamaran/acc_lamaran&&key=".$low_ker["id_lam"]."'>ACC Lamaran</a><br>";
							 	echo "<a href='".BASE_URL."?a=Lamaran/dec_lamaran&&key=".$low_ker["id_lam"]."'>Tolak Lamaran</a><br>";
							 }
							 else if(($low_ker["stat_lam"]=="B")&&($low_ker["stat_lam"]!="D")){
							 	echo "<a href='".BASE_URL."?a=Lamaran/informasi_lamaran&&key=".$low_ker["id_lam"]."'>Kirim informasi interview</a><br>";
							 }?>
							<a href='<?php echo BASE_URL."?a=Applyer_profile&&key=".$low_ker["id_user"];?>'>Lihat profil pelamar</a><br>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		<?php $this->view("footer");?>
		<?php $this->view("company/detail_loker/__partials/js");?>
	</body>
</html>
