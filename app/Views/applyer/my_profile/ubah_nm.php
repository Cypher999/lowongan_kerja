<!DOCTYPE html>
<html>
	<?php $this->view("applyer/my_profile/__partials/head");?>
	<body>
		<?php $this->view("applyer/menu");?>

		<div class='container mb-5 p-2'>
			<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);;
		}?>
			<div class='card  col-lg-8'>
				<div class='card-header'><h2>Ubah Data User</h2></div>
				<div class='card-body'>
					<form action="?a=My_profile/change_data" method='post' enctype="multipart/form-data">
						<?php foreach($data["lama"] as $lama){?>
						<label>nama lengkap</label><br>
						<label class="form-control"><?php echo $lama["nm_lengkap"];?></label><button title='Edit nama' data-toggle='modal' data-target='#modal-nm' class="btn btn-outline-success" type='button'><i class='fas fa-edit'></i></button><br>
						<label>email</label><br>
						<label class="form-control"><?php echo $lama["email"];?></label>
						<button title='Edit Email' data-toggle='modal' data-target='#modal-email' class="btn btn-outline-primary" type='button'><i class='fas fa-edit'></i></button><br>
						<label>no hp</label><br>
						<label class="form-control"><?php echo $lama["no_hp"];?></label>
						<button title='Edit no hp' data-toggle='modal' data-target='#modal-hp' class="btn btn-outline-secondary" type='button'><i class='fas fa-edit'></i></button><br>
						<?php } ?>
						
					</form>
				</div>
			</div>
		</div>
		<div class='modal' id='modal-hp'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class="modal-header">
						<h2>Edit nomor hp</h2>
					</div>
					<div class='modal-body'>
						<button data-dismiss='modal' class="btn btn-outline-danger" type='button'><i class='fas fa-times'></i></button>
						<form action='<?php echo BASE_URL;?>?a=My_profile/change_hp' method='post' enctype='multipart/form-data'> 
							<label>Nomor baru</label>
							<input class="form-control" placeholder="no hp" name="no"><br>
							<button class="btn btn-outline-primary" type='submit'><i class="fa fa-save"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class='modal' id='modal-email'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class="modal-header">
						<h2>Edit email</h2>
					</div>
					<div class='modal-body'>
						<button data-dismiss='modal' class="btn btn-outline-danger" type='button'><i class='fas fa-times'></i></button>
						<form action='<?php echo BASE_URL;?>?a=My_profile/change_email' method='post' enctype='multipart/form-data'> 
							<label>Email baru</label>
							<input class="form-control" placeholder="email baru" name="email"><br>
							<button class="btn btn-outline-primary" type='submit'><i class="fa fa-save"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class='modal' id='modal-nm'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class="modal-header">
						<h2>Edit nama</h2>
					</div>
					<div class='modal-body'>
						<button data-dismiss='modal' class="btn btn-outline-danger" type='button'><i class='fas fa-times'></i></button>
						<form action='<?php echo BASE_URL;?>?a=My_profile/change_name' method='post' enctype='multipart/form-data'> 
							<label>Nama baru</label>
							<input class="form-control" placeholder="nama baru" name="nm"><br>
							<button class="btn btn-outline-primary" type='submit'><i class="fa fa-save"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("applyer/my_profile/__partials/js");?>
	</body>
</html>
