<?php $per_ker=[1=>"Siapakah nama teman terbaik anda ?",2=>"Apa Nama Hewan Peliharaan anda ?",3=>"Apa nama sekolah anda sewaktu masih kecil ?",4=>"Siapa nama ibu anda ?",5=>"Dimana Orangtua anda Tinggal ?",6=>"Apa bintang film favorit anda ?"];?>
<!DOCTYPE html>
<html>
	<head>
		<?php $this->view('no_login/home/__partials/head');?>
	</head>
	<body>
		<div class='container d-flex h-100 justify-content-center'>
			<div class='card col-md-8 p-5 '>
				<div class='card-header'>Silahkan jawab pertanyaan keamanan</div>
				<div class='card-body'>
					<?php if(isset($_SESSION["flash"])){
			echo $_SESSION["flash"]; unset($_SESSION["flash"]);
			 }?>
					<a href='?'><button class="btn btn-outline-danger" type='button'>Kembali</button></a>
					<form action='?a=Recover/forgot_process' method='post'>
						<?php foreach($data['forgot'] as $forgot){?>
						<label>Pertanyaan 1</label><br>
						<label><?php if(array_key_exists($forgot['per_1'], $per_ker)){
							echo $per_ker[$forgot['per_1']];
						}else{
							echo $forgot['per_1'];
						} ?></label><br>
						<label>Jawaban</label>
						<input class="form-control" type='text' name='jaw_1'>
						<label>Pertanyaan 2</label><br>
						<label><?php if(array_key_exists($forgot['per_2'], $per_ker)){
							echo $per_ker[$forgot['per_2']];
						}else{
							echo $forgot['per_2'];
						} ?></label><br>
						<label>Jawaban</label>
						<input class="form-control" type='text' name='jaw_2'>
						<?php } ?>
						<div class='row'>
							<div class='col'><input class="btn btn-outline-primary" type='submit' value='Proses'></div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php $this->view('no_login/home/__partials/js');?>
	</body>
</html>