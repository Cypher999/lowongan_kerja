<?php
$_SESSION["id_loker"]=$_GET['key'];
?>
<!DOCTYPE html>
<html>
	<?php $this->view("admin/detail_loker/__partials/head");?>
	<body>
		<?php $this->view("admin/menu");?>

		<div class='container mb-5 p-2'>
			<div class="card p-2" style="border-left: solid green 3px">
				<h2>Daftar Pelamar</h2>
			</div>
			<div class="card p-2">
				<a href='<?php echo BASE_URL."?a=Loker&&key=".$data["read_one"][0]["id_user"];?>'>Kembali</a>
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
							 <td><?php if($low_ker["stat_lam"]=="C"){
							 	echo "Pelamar belum menjawab soal tes";
							 }
							 else if($low_ker["stat_lam"]=="X"){
							 	echo "Pelamar sudah menjawab soal tes, menunggu pertimbangan selanjutnya";
							 }
							 else if($low_ker["stat_lam"]=="B"&&$cek_jadwal==0){
							 	echo "Pelamar sudah dinyatakan layak untuk interview, menunggu informasi interview";
							 }
							 else if($cek_jadwal>0){
							 	echo "Informasi interview sudah diberikan";
							 }?></td>
							<td><a href='<?php echo BASE_URL."?a=Detail_loker/lihat_berkas&&key=".$low_ker["id_user"];?>'>Lihat berkas pelamar</a><br>
								<?php if($low_ker["stat_lam"]=="X"){
							 	echo "<a href='".BASE_URL."?a=Tes/review&&key=".$low_ker["id_loker"]."&&applyer=".$low_ker["id_user"]."'>Lihat hasil tes</a><br>";
							 	echo "<a href='".BASE_URL."?a=Lamaran/acc_lamaran&&key=".$low_ker["id_lam"]."'>ACC Lamaran</a><br>";
							 }
							 else if($low_ker["stat_lam"]=="B"){
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
		<?php $this->view("admin/detail_loker/__partials/js");?>
	</body>
</html>
