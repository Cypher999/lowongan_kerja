<!DOCTYPE html>
<html>
	<?php $this->view("admin/home/__partials/head");?>
	<body>	
	<?php $this->view("admin/menu");?>
	<div class='container mb-5 p-2'>
		<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);;
		}
			?>
			<div class="card-header">
				<h2 align="center">Selamat datang kembali admin<br> Silahkan kelola website find a job</h2>
			</div>
			<div class='row mb-5 p-2'>
				<div class="col-lg-4 mb-3">
					<div class="card">
						<div class="card-header"><h3>Data Perusahaan</h3></div>
						<div class="card-body">
							<table class="table table-bordered">
								<tr>
									<td>Jumlah perusahaan</td><td>:</td><td><?php echo count($data['company']);?></td>
								</tr>
								<tr>
									<td>Belum di ACC</td><td>:</td><td><?php echo $data['company_no_acc'];?></td>
								</tr>
							</table>
						</div>
						<div class="card-footer"><a href='?a=Company'>Lihat selengkapnya</a></div>
					</div>
				</div>
				<div class="col-lg-4 mb-3">
					<div class="card">
						<div class="card-header"><h3>Data User</h3></div>
						<div class="card-body"><h3><?php echo count($data['users']);?></h3></div>
						<div class="card-footer"><a href='?a=User'>Lihat selengkapnya</a></div>
					</div>
				</div>
				<div class="col-lg-4 mb-3">
					<div class="card">
						<div class="card-header"><h3>Jumlah Lowongan Pekerjaan</h3></div>
						<div class="card-body"><h3><?php echo count($data['low_ker']);?></h3></div>
						<div class="card-footer"><a href='?a=Loker_all'>Lihat selengkapnya</a></div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/home/__partials/js");?>
	</body>
</html>