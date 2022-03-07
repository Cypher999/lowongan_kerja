<!DOCTYPE html>
<html>
	<?php $this->view("no_login/recover/__partials/head");?>
	<body>
		<div class='container mb-5 p-2'>
			<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);;
		}?>
			<div class='card  col-lg-8'>
				<div class='card-header'><h2>Pulihkan Password Password</h2></div>
				<div class='card-body'>
					<form action="?a=Recover/recover_pass" method='post' enctype="multipart/form-data">
						<label>Password baru</label>
						<input type='password' placeholder="password baru" class="form-control" name='br'>
						<label>Konfirmasi Password baru</label>
						<input type='password' placeholder="konfirmasi" class="form-control" name='kf'><br>
						<button class="btn btn-outline-primary" type='submit' title='simpan perubahan'><i class='fa fa-save'></i></button>
					</form>
				</div>
			</div>
		</div>
		<?php $this->view("no_login/recover/__partials/js");?>
	</body>
</html>
