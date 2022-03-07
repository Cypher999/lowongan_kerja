<!DOCTYPE html>
<html>
	<?php $this->view("admin/user_list/__partials/head");?>
	<body>	
	<?php $this->view("admin/menu");?>
	<div class='container mb-5'>
		<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);
		}?>
		<div class="card">
			<div class="card-header"><h2>Data User</h2></div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama User</th>
							<th>Status Verifikasi</th>
							<th>Jenis User</th>
							<th>Kontrol</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data['users'] as $users) {?>
						<tr>
							<td><?php echo $users['nm_user'];?></td>
							<td><?php
							if($users['verified']=="1"){
							 echo "Terverifikasi";
							}
							else{
								echo "Belum terverifikasi";
							}?></td>
							<td><?php
							if($users['tipe_user']=="P") {
							 echo "Pelamar pekerjaan";
							}
							else if($users['tipe_user']=="C") {
							 echo "Pengelola Perusahaan";
							}
							?></td>
							
							<td><?php if($users['tipe_user']=="P") {?>
								<a href='<?php echo BASE_URL;?>?a=My_profile&&key=<?php echo $users['id_user'];?>' title='Lihat profil'><i class='far fa-address-book'></i></a>
							<?php } if($users['tipe_user']=="C") {
								$id_company=$this->model("Model_company")->read_one_user($users['id_user']);
								if(count($id_company)>0){
								?>
								<a href='<?php echo BASE_URL;?>?a=Company_profile&&key=<?php echo $id_company[0]['id_company'];?>' title='Lihat data perusahaan'><i class='far fa-address-book'></i></a><?php } else{?>
									<a href='#' class="text-secondary" title='Belum ada data perusahaan'><i class='far fa-address-book'></i></a>
								<?php }?>
							<?php } ?>
							<a href='<?php echo BASE_URL;?>?a=User/delete&&key=<?php echo $users['id_user'];?>' title='Hapus User'><i class='fas fa-times'></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/user_list/__partials/js");?>
	</body>
</html>