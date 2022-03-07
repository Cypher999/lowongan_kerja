
<!DOCTYPE html>
<html>
	<?php $this->view("applyer/detail_loker/__partials/head");?>
	<body>
		<?php $this->view("applyer/menu");?>

		<div class='container mb-5 p-2'>
			<div class="card p-2" style="border-left: solid green 3px">
				<h2>Lamaran Saya</h2>
			</div>
			<div class="card p-2">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama Instansi / Perusahaan</th>
							<th>Posisi Yang Dilamar</th>
							<th>Tanggal Lamaran</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data["lamaran"] as $lam){?>
						<tr>
							<td><?php echo $lam["nm_com"];?></td>
							<td><?php echo $lam["nm_job"];?></td>
							<td><?php
							$wkt=date_create($lam["tgl_lam"]);
							$tgl=date_format($wkt,"d");
							$bln=date_format($wkt,"M");
							$thn=date_format($wkt,"Y");
							 echo $tgl." ".$bln." ".$thn;?></td>
							<td><a href='<?php echo BASE_URL."?a=Detail_loker/stat_lam&&key=".$lam["id_lam"];?>' class="text-primary p-2" title='lihat lamaran'><i class="fas fa-search"></i></a>
								<a href='<?php echo BASE_URL."?a=Detail_loker/delete&&key=".$lam["id_lam"];?>' class="text-danger p-2" title='hapus lamaran'><i class="fas fa-trash"></i></a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div><br>
			<span class="text-secondary">Perhatian : lamaran tidak bisa dihapus setelah di acc oleh perusahaan / instansi terkait</span>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("applyer/detail_loker/__partials/js");?>
	</body>
</html>
