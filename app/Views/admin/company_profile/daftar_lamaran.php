<!DOCTYPE html>
<html>
	<?php $this->view("admin/company_profile/__partials/head");?>
	<body>
		<?php $this->view("admin/menu");?>

		<div class='container mb-5 p-2'>
			<div class="card p-2" style="border-left: solid green 3px">
				<h2>Lamaran Yang Tersedia</h2>
			</div>
			<div class="card p-2">
				<a href="#" class="text-success"><i class="fas fa-plus"></i> Tambah Lamaran</a>
				<table class="table table-list-lamaran table-bordered">
				<a href='<?php echo BASE_URL."?a=Company_profile&&key=".$_GET['key'];?>' class="text-success"><i class="fas fa-back"></i> Kembali</a>
				<table class="table table-list-lamaran table-bordered">
					<thead>
						<tr>
							<th>Nama Posisi tujuan</th>
							<th>Tanggal input lamaran</th>
							<th>Jumlah Pelamar</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data["low_ker"] as $low_ker){?>
						<tr>
							<td><?php echo $low_ker["nm_job"];?></td>
							<td><?php $wkt=date_create($low_ker["tgl_submit"]);
							$tgl=date_format($wkt,"d");
							$bln=date_format($wkt,"M");
							$thn=date_format($wkt,"Y");
							 echo $tgl." ".$bln." ".$thn;?></td>
							 <td><?php echo $low_ker["jml_pel"];?></td>
							<td><a class="text-primary" href='<?php echo BASE_URL."?a=Detail_loker/daftar_pelamar&&key=".$low_ker['id_loker'];?>' title="Lihat daftar pelamar"><i class="fas fa-address-card"></i></a>
							<a class="text-warning" href='#' title="Edit Lamaran"><i class="fas fa-edit"></i></a>
							<a class="text-secondary" href='#' title="Lihat detail"><i class="fas fa-search"></i></a>
							<a href='#' class="text-danger" title="Hapus Lamaran"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/company_profile/__partials/js");?>
	</body>
</html>
