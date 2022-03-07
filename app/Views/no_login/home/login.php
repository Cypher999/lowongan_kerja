<!DOCTYPE html>
<html>
	<head>
		<?php $this->view('no_login/home/__partials/head');?>
	</head>
	<body>
		<div class='container d-flex h-100 justify-content-center'>
			<div class='card col-md-8 p-5 '>
				<div class='card-header'>Login</div>
				<div class='card-body'>
					<?php if(isset($_SESSION["flash"])){
			echo $_SESSION["flash"]; unset($_SESSION["flash"]);
			 }?>
					<a href='?'><button class="btn btn-outline-danger" type='button'>Kembali</button></a>
					<form action='?a=Home/log_in' method='post'>
						<label>Username / email</label>
						<input class="form-control" type='text' name='user'>
						<label>Password</label>
						<input class="form-control" type='password' name='pass'>
						<div class='row'>
							<div class='col'><button name='tbl' class="btn btn-outline-primary" value="login" type='submit'>Login</button></div>
							<div class='col'><a href='?a=Home/Signup'><input class="btn btn-outline-secondary" type='button' value='Signup'></a>
							</div>
							<div class='col'><button name='tbl' class="btn btn-outline-warning" type='submit' value='forgot'>Lupa Password</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php $this->view('no_login/home/__partials/js');?>
	</body>
</html>