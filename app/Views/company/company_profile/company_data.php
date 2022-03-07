<!DOCTYPE html>
<html>
	<?php $this->view("company/company_profile/__partials/head");?>
	<body>
		<?php $this->view("company/menu");?>

		<div class='container mb-5 p-2'>
			<div class='card'>
				<div class='card-header'><h2>Data Perusahaan</h2></div>
				<div class='card-body'>
					<?php foreach($data["company"] as $company){?>
					<form action="?a=Company_profile/update" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col">
								<label>No. Surat Izin Perusahaan</label>
								<input type='text' class="form-control" name='no_induk' placeholder="nomor surat izin" pattern="[0-9a-zA-Z]{1,}" required="" value="<?php echo $company['no_induk'];?>">
								<label>Nama Pemilik Perusahaan</label>
								<label class='form-control'><?php echo $company['nm_pem'];?></label><br>
								<span class="text-secondary">Nama perusahaan sama dengan nama lengkap pada data user, pastikan anda mengisinya dengan data yg benar benar real, pihak pengelola website mempunyai hak untuk memblokir tanpa peringatan dan melaporkan perusahaan pada pihak berwajib jika terdapat indikasi pemalsuan data</span><br>
								<label>Nama Perusahaan</label>
								<input type='text' class="form-control" name='nm_per' placeholder="nama perusahaan" pattern="[A-Z a-z]{1,}" required="" value="<?php echo $company['nm_com'];?>">
								<label>Alamat lengkap</label>
								<textarea class="form-control" name='alt_leng' cols='30' rows='3'><?php echo $company['lok'];?></textarea>
								<label>Provinsi</label>
								<input type='text' class="form-control" name='prov' placeholder="provinsi" pattern="[A-Z a-z 0-9]{1,}" required="" value="<?php echo $company['prov'];?>">
								<label>Kabupaten / Kota</label>
								<input type='text' class="form-control" name='kab' placeholder="kabupaten / kota" pattern="[A-Z a-z 0-9]{1,}" required="" value="<?php echo $company['kab'];?>">
								<label>Kecamatan</label>
								<input type='text' class="form-control" name='kec' placeholder="kecamatan" pattern="[A-Z a-z 0-9]{1,}" required="" value="<?php echo $company['kec'];?>">
								<label>Desa</label>
								<input type='text' class="form-control" name='desa' placeholder="desa" pattern="[A-Z a-z 0-9]{1,}" required="" value="<?php echo $company['des'];?>">
								<label>Alamat di peta</label>
								<input type='text' class="form-control" name='alt_map' placeholder="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12472.776210958777!2d-89.83461357010256!3d38.59840357388368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x887608efb672ce45%3A0x473b5d14afe0968c!2s105%20Bow%20Dr%2C%20Lebanon%2C%20IL%2062254%2C%20Amerika%20Serikat!5e0!3m2!1sid!2sid!4v1609854398619!5m2!1sid!2sid" required="" value="<?php echo $company['alt_map'];?>"><br>
								
								<label>Nomor HP Perusahaan</label>
								<label class='form-control'><?php echo $company['no_hp'];?></label><br>
								<label>E-mail Perusahaan</label>
								<label class='form-control'><?php echo $company['email'];?></label><br>
								<label>Bidang Perusahaan</label>
								<select class="form-control" name='bid'>
									<?php foreach($data["bidang"] as $bidang){?>
										<option value="<?php echo $bidang['kd_bid'];?>" <?php if($bidang['kd_bid']==$company['kd_bid']){echo "selected";}?>><?php echo $bidang['bidang'];?></option>
									<?php }?>
								</select><br>
								<label>Hari kerja</label>
								<input type='text' class="form-control" name='hari_kerja' required="" value="<?php echo $company['hari_kerja'];?>">
								<label>Jam kerja</label>
								<input type='text' class="form-control" name='jam_kerja' required="" value="<?php echo $company['jam_kerja'];?>">
								<label>Keahlian / skill yang dibutuhkan</label>
								<textarea class="form-control" name='skill' cols='30' rows='3'><?php echo $company['skill'];?></textarea><br>
								<span class="text-secondary">Contoh mengisi keahlian seperti : desainer grafis, programer,las,otomotif dst. Gunakan tanda koma sebagai pemisah</span><br>
								<label>Deskripsi Perusahaan </label>
								<textarea class="form-control" name='profil' cols='30' rows='10'><?php echo $company['profil'];?></textarea><br>
								<span class="text-secondary">gunakan sintaks [NEWLINE] untuk pindah ke baris baru</span>
								<label>Benefit Perusahaan </label>
								<textarea class="form-control" name='list_ben' cols='30' rows='10'><?php echo $company['list_ben'];?></textarea><br>
								<span class="text-secondary">gunakan sintaks [NEW_NUM] untuk membuat penomoran baru</span>
								<label>Scan Surat Izin Perusahaan (format jpg)</label><br>
								<img width="100" height="100" src="<?php echo BASE_URL."img/surat_izin/".$company['id_company'].".jpg"?>" id='prev_izin'><br>
								<input type="file" name='file_izin' onchange="prev_img('prev_izin');"><br>
								<label>Scan KTP / Surat keterangan capil (format jpg)</label><br>
								<img width="100" height="100" src="<?php echo BASE_URL."img/ktp/".$_SESSION['user_loker'].".jpg"?>" id='prev_ktp'><br>
								<input type="file" name='file_ktp' onchange="prev_img('prev_ktp');"><br>
								<label class="text-secondary"> catatan : Maksimal file ukuran 500 Kb</label>
								<div class="row">
									<div class="col"><input type='submit' value="Simpan Data" class="btn btn-outline-secondary">
									</div>
									<div class="col"><input type='reset' value="Reset" class="btn btn-outline-danger">
									</div>
								</div>
						</div>
						<div class="col">
							<label>Logo Perusahaan</label><br>
							<img width="300" height="500" id="prev_log" src="<?php echo BASE_URL;?>img/company_logo/<?php echo $company['id_company'];?>.jpeg"><br>
							<input type="file" name='file_log' onchange="prev_img('prev_log');">
						</div>
					</div>
					</form>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("company/company_profile/__partials/js");?>
	</body>
</html>
