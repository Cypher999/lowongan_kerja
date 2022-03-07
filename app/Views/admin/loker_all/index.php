<!DOCTYPE html>
<html>
	<?php $this->view("admin/loker_all//__partials/head");?>
	<body>	
	<?php $this->view("admin/menu");?>
	<div class='container mb-5'>
		<div class="card">
			<div class="card-header"><h2>Data Perusahaan</h2></div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama Perusahaan penyedia</th>
							<th>Nama Posisi</th>
							<th>Kontrol</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data['loker'] as $loker) {?>
						<tr>
							<td><?php echo $loker['nm_com'];?></td>
							<td><?php echo $loker['nm_job'];?></td>
							
							
							<td><a class="text-primary" href='<?php echo BASE_URL."?a=Detail_loker/daftar_pelamar&&key=".$loker['id_loker'];?>' title="Lihat daftar Loker"><i class="fas fa-address-card"></i></a>
								<a class="text-primary" href='<?php echo BASE_URL."?a=Detail_loker&&key=".$loker['id_loker'];?>' title="Lihat data perusahaan"><i class="fas fa-search"></i></a>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/loker_all//__partials/js");?>
	</body>
</html>