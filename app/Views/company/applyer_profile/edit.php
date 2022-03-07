<!DOCTYPE html>
<html>
	<?php $this->view("applyer/my_profile/__partials/head");?>
	<body>
		<?php $this->view("applyer/menu");?>

		<div class='container mb-5 p-2'>
			<div class='card'>
				<div class='card-header'><h2>Profil Saya</h2></div>
				<div class='card-body'>
					<?php
					 foreach($data["profil"] as $profil){?>
					<div class="row">
						<div class="col">
							<form action="?a=My_profile/update" method="post" enctype="multipart/form-data">
						<label>No. KTP</label>
						<input type='text' class="form-control" name='ktp' placeholder="nomor ktp" pattern="[0-9]{1,}" required="" value="<?php echo $profil["ktp"];?>">
						<label>Nama Lengkap</label>
						<input type='text' class="form-control" name='nm_lengkap' placeholder="nama lengkap" pattern="[A-Z a-z]{1,}" required="" value="<?php echo $profil["nm_lengkap"];?>">
						<label>Alamat lengkap</label>
						<textarea class="form-control" name='alt_leng' cols='30' rows='3'><?php echo $profil["alt_leng"];?></textarea>
						<label>Provinsi</label>
						<input type='text' class="form-control" name='prov' placeholder="provinsi" pattern="[A-Za-z0-9]{1,}" required="" value="<?php echo $profil["prov"];?>">
						<label>Kabupaten / Kota</label>
						<input type='text' class="form-control" name='kab' placeholder="kabupaten / kota" pattern="[A-Za-z0-9]{1,}" required="" value="<?php echo $profil["kab"];?>">
						<label>Kecamatan</label>
						<input type='text' class="form-control" name='kec' placeholder="kecamatan" pattern="[A-Za-z0-9]{1,}" required="" value="<?php echo $profil["kec"];?>">
						<label>Desa</label>
						<input type='text' class="form-control" name='desa' placeholder="desa" pattern="[A-Za-z0-9]{1,}" required="" value="<?php echo $profil["desa"];?>">
						<label>Nomor HP</label>
						<input type='text' class="form-control" name='nope' placeholder="no_hp" pattern="[0-9]{1,}" required="" value="<?php echo $profil["no_hp"];?>">
						<label>E-mail</label>
						<input type='text' class="form-control" name='email' placeholder="email" pattern="[a-zA-Z0-9.%_+]+@[A-Za-z0-9]+\.[a-z]{2,}" required="" value="<?php echo $profil["email"];?>">
						<label>Pendidikan Terakhir</label>
						<select class="form-control" name='pend_ter'>
							<option value='-'>Tidak bersekolah</option>
							<option value='SD' <?php if($profil["pend_ter"]=="SD"){echo "selected";};?>>SD/ Sederajat</option>
							<option value='SMP' <?php if($profil["pend_ter"]=="SMP"){echo "selected";};?>>SMP/ Sederajat</option>
							<option value='SMA' <?php if($profil["pend_ter"]=="SMA"){echo "selected";};?>>SMA/ Sederajat</option>
							<option value='D3' <?php if($profil["pend_ter"]=="D3"){echo "selected";};?>>D3/D4</option>
							<option value='S1' <?php if($profil["pend_ter"]=="S1"){echo "selected";};?>>S1</option>
							<option value='S2' <?php if($profil["pend_ter"]=="S2"){echo "selected";};?>>S2</option>
							<option value='S3' <?php if($profil["pend_ter"]=="S3"){echo "selected";};?>>S3</option>
						</select>
						<label>Keahlian / skill</label>
						<textarea class="form-control" name='skill' cols='30' rows='3'> <?php echo $profil["skill"];?></textarea><br>
						<span class="text-secondary">Contoh mengisi keahlian seperti : desainer grafis, programer,las,otomotif dst. Gunakan tanda koma sebagai pemisah</span><br>
						<label>Pengalaman Kerja / bidang</label>
						<div class='row'>
							<?php if($profil["exp"]!=""){$exp=explode("[split]", $profil["exp"]);?>
							<div class='col'><input type='number' class="form-control" name='exp' placeholder="Pengalaman Kerja" required="" value="<?php echo $exp[0];?>"></div>
							<div class='col'>

								<select class="form-control" name='exp_time'>
									<option value='M' <?php if ($exp[1]=="M"){echo "selected";}?>>Minggu</option>
									<option value='B' <?php if ($exp[1]=="B"){echo "selected";}?>>Bulan</option>
									<option value='T' <?php if ($exp[1]=="T"){echo "selected";}?>>Tahun</option>
								</select> 
							</div>
							<div class='col'>
								<input type='text' class="form-control" name='bidang' placeholder="bidang" pattern="[a-zA-Z0-9]" required="" value="<?php echo $exp[2];?>">
							</div>
							<?php } else{ ?>
								<div class='col'><input type='number' class="form-control" name='exp' placeholder="Pengalaman Kerja" required="" value=""></div>
							<div class='col'>

								<select class="form-control" name='exp_time'>
									<option value='M'>Minggu</option>
									<option value='B'>Bulan</option>
									<option value='T'>Tahun</option>
								</select> 
							</div>
							<div class='col'>
								<input type='text' class="form-control" name='bidang' placeholder="bidang" pattern="[a-zA-Z0-9]{1,}" required="" value="">
							</div>
							<?php } ?>
						</div><br>
						<?php
							$file_ijz="img/ij/".$profil["id_user"].".png";
							$file_ktp="img/ktp/".$profil["id_user"].".png";
							$file_kk="img/kk/".$profil["id_user"].".png";
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
						<span class="text-secondary">Pengalaman kerja dibuktikan dengan surat keterangan dari instansi kerja / magang pemilik akun, unggah di bagian "berkas saya"</span>
						<label>Scan Ijazah terakhir (format jpg)</label><br>
						<img width="100" height="100" id='prev_ijazah' src="<?php echo $file_ijz;?>"><br>
						<input type="file" name='file_ijazah' onchange="prev_img('prev_ijazah')"><br>
						<label>Scan KTP / Surat keterangan capil (format jpg)</label><br>
						<img width="100" height="100" id='prev_ktp' src="<?php echo $file_ktp;?>"><br>
						<input type="file" name='file_ktp' onchange="prev_img('prev_ktp')"><br>
						<label>Scan Kartu Keluarga</label><br>
						<img width="100" height="100" id='prev_kk' src="<?php echo $file_kk;?>"><br>
						<input type="file" name='file_kk' onchange="prev_img('prev_kk')"><br>
						<label class="text-secondary"> catatan : Maksimal file ukuran 500 Kb</label>
						<div class="row">
							<div class="col"><input type='submit' value="Simpan Data" class="btn btn-outline-secondary">
							</div>
							<div class="col"><input type='reset' value="Reset" class="btn btn-outline-danger">
							</div>
						</div>
					</form>
						</div>
						<div class="col">
							<?php
							$file="img/profile_logo/".$profil["id_user"].".png";
							if(!file_exists($file)){
								if($data["user"][0]["jekel"]=="L"){
									$file="img/profile_logo/A.png";
								}
								else{
									$file="img/profile_logo/B.png";	
								}
							}
							?>
							<label>Foto Profil</label><br>
							<img width="300" height="500" src="<?php echo $file;?>"><br>
							<input type="button" value="Ubah foto profil" data-toggle='modal' data-target='#form-foto' class="btn btn-outline-success">
						</div>
					</div>
					<?php } ?>
					
				</div>
			</div>
			<div class="modal" id='form-foto'>
				<div class="modal-dialog">
					<div class='modal-content'>
						<div class="modal-header"><h2>Ubah Foto</h2></div>
						<div class="modal-body">
							<form action='<?php echo BASE_URL;?>?a=My_profile/change_photo' method='post' enctype='multipart/form-data'>
								<label>Foto Profil</label><br>
							<img width="300" height="300" id="prev_profil" src="<?php echo $file;?>"><br>
							<input type='file' name='ch_pt' onchange="prev_img('prev_profil');"><br>
							<input type="submit" value="Ubah"  class="btn btn-outline-success">	
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("applyer/my_profile/__partials/js");?>
	</body>
</html>
