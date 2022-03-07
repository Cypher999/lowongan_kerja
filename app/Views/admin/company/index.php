<!DOCTYPE html>
<html>
	<?php $this->view("admin/company/__partials/head");?>
	<body>	
	<?php $this->view("admin/menu");?>
	<div class='container mb-5'>
		<div class="card">
			<div class="card-header"><h2>Data Perusahaan</h2>
				<?php if(isset($_SESSION["flash"])){
					echo "<br>".$_SESSION["flash"];
					unset($_SESSION["flash"]);}?></div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama Perusahaan</th>
							<th>Pemilik perusahaan</th>
							<th>Status perusahaan</th>
							<th>Daftar laporan<br>(klik pada nomor untuk melihat lebih lengkap)</th>
							<th>Kontrol</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data['per'] as $per) {?>
						<tr>
							<td><?php echo $per['nm_com'];?></td>
							<td><?php echo $per['nm_lengkap'];?></td>
							<td><?php
							$stat_per=array("0"=>"Belum Aktif","1"=>"Aktif","X"=>"Ditolak");
							echo $stat_per[$per['status']];
							?></td>
							<td><a href="<?php echo BASE_URL."?a=Report_company/list&&key=".$per["id_company"];?>"><?php
							$jml_rep=$this->Model_report_company->read_company_single($per["id_company"]);
							echo count($jml_rep);?></a></td>
							<td><a class="text-primary" href='<?php echo BASE_URL."?a=Loker&&key=".$per['id_user'];?>' title="Lihat daftar Loker"><i class="fas fa-address-card"></i></a>
								<a class="text-primary" href='<?php echo BASE_URL."?a=Company_profile&&key=".$per['id_company'];?>' title="Lihat data perusahaan"><i class="fas fa-archive"></i></a>
								<a class="text-primary" href='<?php echo BASE_URL."?a=Company_profile/company_data&&key=".$per['id_company'];?>' title="Lihat profil perusahaan"><i class="far fa-address-book"></i></a>
								<?php
							if($per['status']=="0"){?>
								<a class="text-secondary" href='<?php echo BASE_URL."?a=Company/acc_com&&key=".$per['id_company'];?>' title="ACC Perusahaan ini"><i class="fas fa-registered"></i></a>
								<?php } ?>
								<a class="text-danger" href='<?php echo BASE_URL."?a=Company/delete_com&&key=".$per['id_company'];?>' title="Hapus Perusahaan ini"><i class="fas fa-trash"></i></a>
							<?php
							if($per['status']!="X"){?>
								<a class="text-danger show_dec" data-id="<?php echo $per['id_company'];?>" href="#" data-toggle="modal" data-target='#modal_dec' title="Tolak Perusahaan ini"><i class="fas fa-times"></i></a>
							<?php } else { ?>
								<a class="text-danger" href="<?php echo BASE_URL."index.php?a=Company/acc_com&&key=".$per['id_company'];?>" title="Acc Perusahaan ini"><i class="fas fa-check"></i></a>
							<?php } ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		</div>
		<div class="modal" id="modal_dec">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h2>Keterangan Penolakan Perusahaan</h2>
					</div>
					<div class="modal-body">
						<form action="" class="dec-confirm" method="post">
							<textarea cols="20" rows="5" name="ket_reject" placeholder="masukkan keterangan"></textarea><br>
							<input type="submit" class="btn btn-outline-primary" value="simpan">
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/company/__partials/js");?>
	</body>
</html>