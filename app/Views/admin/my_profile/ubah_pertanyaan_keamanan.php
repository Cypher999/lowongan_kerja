<!DOCTYPE html>
<html>
	<?php $this->view("admin/my_profile/__partials/head");?>
	<body>
		<?php $this->view("admin/menu");?>

		<div class='container mb-5 p-2'>
			<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);;
		}?>
			<div class='card  col-lg-8'>
				<div class='card-header'><h2>Ubah Pertanyaan Keamanan</h2></div>
				<div class='card-body'>
					<form action="?a=My_profile/update_security" method='post' enctype="multipart/form-data">
						<?php foreach($data["security"] as $sec){?>
						<label>Pertanyaan 1</label><br>
						<textarea class="form-control" cols="30" rows="5" name='per_1'><?php echo $sec['per_1'];?></textarea>
						<label>Pertanyaan 2</label><br>
						<textarea class="form-control" cols="30" rows="5" name='per_2'><?php echo $sec['per_2'];?></textarea>
						<label>Jawaban 1</label><br>
						<textarea class="form-control" cols="30" rows="5" name='jaw_1'><?php echo $sec['jaw_1'];?></textarea>
						<label>Jawaban 1</label><br>
						<textarea class="form-control" cols="30" rows="5" name='jaw_2'><?php echo $sec['jaw_2'];?></textarea><br>
						<button class="btn btn-outline-primary" type='submit'><i class="fa fa-save"></i></button>
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
		<?php $this->view("admin/my_profile/__partials/js");?>
	</body>
</html>
