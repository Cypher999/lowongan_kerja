<?php
$per_ker=[1=>"Siapakah nama teman terbaik anda ?",2=>"Apa Nama Hewan Peliharaan anda ?",3=>"Apa nama sekolah anda sewaktu masih kecil ?",4=>"Siapa nama ibu anda ?",5=>"Dimana Orangtua anda Tinggal ?",6=>"Apa bintang film favorit anda ?"];
?>
<!DOCTYPE html>
<html>
	<head>
		<?php $this->view('no_login/home/__partials/head');?>
	</head>
	<body>
		<div class='container d-flex h-100 justify-content-center'>
			<div class='card col-lg-8 p-3'>
				<?php if (isset($_SESSION["flash"])){
					echo $_SESSION["flash"];
					unset($_SESSION["flash"]);
				}?>
				<div class='card-header'><h2>Signup</h2></div>
				<div class='card-body'>
					<div class="row">
						<div class="col">
							<form action="<?php echo BASE_URL;?>?a=Home/sign_up" method="post" enctype="multipart/form-data">
						<label>No. ktp / No. induk perusahaan (bagi perusahaan)</label>
						<input type='text' class="form-control label_ktp" name='no_ktp' placeholder="nomor ktp / nomor induk perusahaan" required=""><br>
						<span class="text-secondary">Bagi user pengelola perusahaan, harap lengkapi data-data perusahaan di menu profil perusahaan setelah verifikasi</span>
						<label>Nama Lengkap</label>
						<input type='text' class="form-control" name='nm_lengkap' placeholder="nama lengkap" pattern="[A-Z a-z]{1,}" required="">
						<label>Nama User (untuk login)</label>
						<input type='text' class="form-control" name='nm_user' placeholder="nama user" required="">
						<label>Jenis kelamin</label>
						<input type="radio" name="jekel" value="L">Laki-laki<input type="radio" name="jekel" value="P">Perempuan
						<label>Tipe user</label>
						<select name="type" class="form-control">
							<option value="P">Pencari Kerja</option>
							<option value="C">Pengelola perusahaan</option>
						</select>
						<label>Nomor HP</label>
						<input type='text' class="form-control" name='no_hp' placeholder="no_hp" pattern="[0-9]{1,}" required="">
						<label>E-mail</label>
						<input type='text' class="form-control" name='email' placeholder="e-mail"  required="">
						<label>Pertanyaan keamanan 1</label><br>
						<?php $i=1; foreach ($per_ker as $pk){?>
							<input type="radio" class="no_per_1" name="per_1" value="<?php echo $i;?>">	<?php echo $pk;?><br>
						<?php $i++;}?><br>
						<input type="radio" class="show_per_1" id="rad_per_1">Lainnya<br>
								<div id="place_per_1"></div>
						<label>Jawaban Pertanyaan 1</label>
						<textarea cols="30" rows="5" name="jaw_1" class="form-control"></textarea><br>
						<label>Pertanyaan keamanan 2</label><br>
						<?php $i=1; foreach ($per_ker as $pk){?>
							<input type="radio" class="no_per_2" name="per_2" value="<?php echo $i;?>"><?php echo $pk;?><br>
						<?php $i++;}?><br>
						<input type="radio" class="show_per_2" id="rad_per_2">Lainnya<br>
								<div id="place_per_2"></div>
						<label>Jawaban Pertanyaan 2</label>
						<textarea cols="30" rows="5" name="jaw_2" class="form-control"></textarea><br>
						<label>Password</label>
						<input type='password' class="form-control" name='pass' placeholder="password"  required="">
						<label>Konfirmasi password</label>
						<input type='password' class="form-control" name='konf' placeholder="password"  required="">
						<div class="row">
							<div class="col"><input type='submit' value="Signup" class="btn btn-outline-secondary">
							</div>
							<div class="col"><a href='<?php echo BASE_URL;?>'> Kembali</a></div>
							<div class="col">Sudah punya akun? klik <a href='<?php echo BASE_URL;?>?a=Home/login'> disini</a>
							</div>
						</div>
						</div>
						<div class="col">
							<label>Foto Profil</label><br>
							<img width="300" height="500" id="prev_profil" src=""><br>
							<input type="file" name='file_prof' onchange="prev_img('prev_profil');">
						</div>
					</form>
						
					</div>
					
				</div>
			</div>
		</div>
		<?php $this->view('no_login/home/__partials/js');?>
		<script>
			$(document).ready(function(){
				$(document).on("click",".show_per_1",function(){
					var abc=document.getElementsByClassName("no_per_1");
					var pj=abc.length;
					$("#place_per_1").html("<input class='form-control' name='per_1'>");	
					for($i=0;$i<pj;$i++){
						abc[$i].checked=false;
					}
				});
				$(document).on("click",".show_per_2",function(){
					var abc=document.getElementsByClassName("no_per_2");
					var pj=abc.length;
					$("#place_per_2").html("<input class='form-control' name='per_2'>");
					for($i=0;$i<pj;$i++){
						abc[$i].checked=false;
					}
				});
				$(document).on("click",".no_per_1",function(){
					$("#place_per_1").empty();
					document.getElementById("rad_per_1").checked=false;
				});
				$(document).on("click",".no_per_2",function(){
					$("#place_per_2").empty();
					document.getElementById("rad_per_2").checked=false;
				});
			});
		</script>
	</body>
</html>