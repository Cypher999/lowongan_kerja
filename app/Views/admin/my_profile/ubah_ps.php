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
				<div class='card-header'><h2>Ubah Password</h2></div>
				<div class='card-body'>
					<form action="?a=My_profile/change_password" method='post' enctype="multipart/form-data">
						<label>Password lama</label>
						<input type='password' placeholder="password lama" class="form-control" name='lm'>
						<label>Password baru</label>
						<input type='password' placeholder="password baru" class="form-control" name='br'>
						<label>Konfirmasi Password baru</label>
						<input type='password' placeholder="konfirmasi" class="form-control" name='kf'><br>
						<button class="btn btn-outline-primary" type='submit' title='simpan perubahan'><i class='fa fa-save'></i></button>
					</form>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/my_profile/__partials/js");?>
	</body>
</html>
