<!DOCTYPE html>
<html>
	<?php $this->view("admin/company_profile/__partials/head");?>
	<body>
		<?php $this->view("admin/menu");?>

		<div class='container mb-5 p-2'>
			<div class='card'>
				<div class='card-header'><h2>Data Perusahaan</h2></div>
				<div class='card-body'>
					<?php foreach($data["company"] as $company){?>
					<div class="row">
						<div class="col">
							<a href='?a=Company'>Kembali</a><br>
							<label>No. Surat Izin Perusahaan</label><br>
							<label class="text-secondary"><?php echo $company['no_induk'];?></label><br>
							<label>Nama Pemilik Perusahaan</label><br>
							<label class="text-secondary"><?php echo $company['nm_pem'];?></label><br>
							
							<label>Nama Perusahaan</label><br>
							<label class="text-secondary"><?php echo $company['nm_com'];?></label><br>
							<label>Alamat lengkap</label><br>
							<label class="text-secondary"><?php echo $company['lok'];?></label><br>
							<label>Provinsi</label><br>
							<label class="text-secondary"><?php echo $company['prov'];?></label><br>
							<label>Kabupaten / Kota</label><br>
							<label class="text-secondary"><?php echo $company['kab'];?></label><br>
							<label>Kecamatan</label><br>
							<label class="text-secondary"><?php echo $company['kec'];?></label><br>
							<label>Desa</label><br>
							<label class="text-secondary"><?php echo $company['des'];?></label><br>
							<label>Alamat di peta</label><br>
							<label class="text-secondary col-lg-6"><?php echo $company['alt_map'];?></label><br>
							
							<label>Nomor HP Perusahaan</label><br>
							<label class="text-secondary"><?php echo $company['no_hp'];?></label><br>
							<label>E-mail Perusahaan</label><br>
							<label class="text-secondary"><?php echo $company['email'];?></label><br>
							<label>Bidang Perusahaan</label><br>
							<label class="text-secondary"><?php echo $company['bidang'];?></label><br>
							<label>Hari kerja</label><br>
							<label class="text-secondary"><?php echo $company['hari_kerja'];?></label><br>
							<label>Jam kerja</label><br>
							<label class="text-secondary"><?php echo $company['jam_kerja'];?></label><br>
							<label>Keahlian / skill yang dibutuhkan</label><br>
							<label class="text-secondary"><?php echo $company['skill'];?></label><br>
							<label>Deskripsi Perusahaan </label><br>
							<label class="text-secondary col-lg-6"><?php 
							$profil=explode("[NEWLINE]", $company['profil']);
							foreach ($profil as $prof) {
								echo "<p>".$prof."</p>";
							};?></label><br>
							<label>Benefit Perusahaan </label><br>
							<ul><?php 
							$list_ben=explode("[NEW_NUM]", $company['list_ben']);
							foreach ($list_ben as $lb) {
								echo "<li>".$lb."</li>";
							};?></ul><br>
							<label>Scan Surat Izin Perusahaan (format jpg)</label><br>
							<img width="100" height="100" src="<?php echo BASE_URL."img/surat_izin/".$company['id_company'].".jpg"?>" id='prev_izin'><br>
							<label>Scan KTP / Surat keterangan capil (format jpg)</label><br>
							<img width="100" height="100" src="<?php echo BASE_URL."img/ktp/".$company['id_user'].".jpg"?>" id='prev_ktp'><br>								
					</div>
					<div class="col">
						<label>Logo Perusahaan</label><br>
						<img width="300" height="500" id="prev_log" src="<?php echo BASE_URL;?>img/company_logo/<?php echo $company['id_company'];?>.jpeg"><br>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/company_profile/__partials/js");?>
	</body>
</html>
