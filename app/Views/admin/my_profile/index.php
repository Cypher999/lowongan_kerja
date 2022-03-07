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
			<div class='card'>
				<div class='card-header'><h2>Profil Saya</h2></div>
				<div class='card-body'>
					<?php if(count($data["profil"])>0){
					 foreach($data["profil"] as $profil){?>
					<div class="row">
						<div class="col">
							<form action="#" method="post" enctype="multipart/form-data">
						<label>No. KTP</label><br>
						<label style="border:solid black 3px" class="p-1"><?php echo $profil["ktp"];?></label><br>
						<label>Nama Lengkap</label><br>
						<label style="border:solid black 3px" class="p-1"><?php echo $profil["nm_lengkap"];?></label><br>
						<label>Alamat lengkap</label><br>
						<label style="border:solid black 3px" class="p-1"><?php echo $profil["alt_leng"];?></label><br>
						<label>Provinsi</label><br>
						<label style="border:solid black 3px" class="p-1"><?php echo $profil["prov"];?></label><br>
						<label>Kabupaten / Kota</label><br>
						<label style="border:solid black 3px" class="p-1"><?php echo $profil["kab"];?></label><br>
						<label>Kecamatan</label><br>
						<label style="border:solid black 3px" class="p-1"><?php echo $profil["kec"];?></label><br>
						<label>Desa</label><br>
						<label style="border:solid black 3px" class="p-1"><?php echo $profil["desa"];?></label><br>
						<label>Nomor HP</label><br>
						<label style="border:solid black 3px" class="p-1"><?php echo $profil["no_hp"];?></label><br>
						<label>E-mail</label><br>
						<label style="border:solid black 3px" class="p-1"><?php echo $profil["email"];?></label><br>
						<label>Pendidikan Terakhir</label><br>
						<label style="border:solid black 3px" class="p-1"><?php echo $profil["pend_ter"];?></label><br>
						<label>Keahlian / skill</label><br>
						<label style="border:solid black 3px" class="p-1"><?php echo $profil["skill"];?></label><br>
						<label>Pengalaman Kerja / bidang</label><br>
						<label style="border:solid black 3px" class="p-1"><?php 
						if($profil["exp"]!=""){
						$exp=explode("[split]",$profil["exp"]);
						if($exp[1]=="M"){$exp[1]="Minggu";}
						else if($exp[1]=="B"){$exp[1]="Bulan";}
						else if($exp[1]=="T"){$exp[1]="Tahun";}

						echo $exp[0]." ".$exp[1]." / ".$exp[2];}?></label><br>
						<label>Scan Ijazah terakhir (format jpg)</label><br>
						<?php
							$file_ijz="img/ij/".$_GET['key'].".png";
							$file_ktp="img/ktp/".$_GET['key'].".png";
							$file_kk="img/kk/".$_GET['key'].".png";
							if(!file_exists($file_ijz)){
								$file_ijz="";
							}
							if(!file_exists($file_ktp)){
								$file_ktp="";
							}
							if(!file_exists($file_kk)){
								$file_kk="";
							}
							?>
						<img width="100" height="100" id='prev_ijazah' src="<?php echo $file_ijz;?>"><br>
						<label>Scan KTP / Surat keterangan capil (format jpg)</label><br>
						<img width="100" height="100" id='prev_ktp' src="<?php echo $file_ktp;?>"><br>
						<label>Scan Kartu Keluarga</label><br>
						<img width="100" height="100" id='prev_kk' src="<?php echo $file_kk;?>"><br>
						<label class="text-secondary"> catatan : Maksimal file ukuran 500 Kb</label>
						<div class="row">
							<div class="col"><a href='<?php echo BASE_URL."?a=My_profile/edit";?>'><input type='button' value="Edit Profil" class="btn btn-outline-secondary"></a>
							</div>
						</div>
					</form>
						</div>
						<div class="col">
							<label>Foto Profil</label><br>
							<?php
							$file="img/profile_logo/".$_GET['key'].".png";
							if(!file_exists($file)){
								if($data["user"][0]["jekel"]=="L"){
									$file="img/profile_logo/A.png";
								}
								else{
									$file="img/profile_logo/B.png";	
								}
							}
							?>
							<img width="300" height="500" id="prev_profil" src="<?php echo BASE_URL.$file;?>"><br>
						</div>
					</div>
					<?php } }else{?>
					<div class="row">
						<div class="col">
						<h2>Profil anda belum diisi</h2>
						</div>
						<div class="col">
							<label>Foto Profil</label><br>
							<?php
							$file="img/profile_logo/".$_SESSION['user_loker'].".png";
							if(!file_exists($file)){
								if($data["user"][0]["jekel"]=="L"){
									$file="img/profile_logo/A.png";
								}
								else{
									$file="img/profile_logo/B.png";	
								}
							}
							?>
							<img width="300" height="500" id="prev_profil" src="<?php echo BASE_URL.$file;?>"><br>
						</div>
					</div>
					<div class="row">
							<div class="col"><a href='<?php echo BASE_URL."?a=My_profile/edit";?>'><input type='button' value="Edit Profil" class="btn btn-outline-secondary"></a>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/my_profile/__partials/js");?>
	</body>
</html>
