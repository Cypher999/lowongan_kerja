<!DOCTYPE html>
<html>
	<?php $this->view("applyer/detail_loker/__partials/head");?>
	<body>
		<?php $this->view("applyer/menu");?>

			<div class='container mb-5 p-2'>
				<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);
		}?>
			<div class="row table-bordered p-3">
					<div class="col-lg-4">
						<a href='<?php echo BASE_URL;?>?a=Company_profile&&key=<?php echo $data["detail"][0]["id_company"];?>'><img src="<?php echo BASE_URL;?>img/company_logo/<?php echo $data["detail"][0]["id_company"];?>.jpeg" width="100" height="100"></a>
					</div>
					<div class="col-lg-8">
						<div class="row">
							<h5><?php echo $data["detail"][0]["nm_com"];?></h5>
						</div>
						<div class="row">
							<div class="col"><i class='fa fa-map-marker'></i> <?php echo $data["detail"][0]["kab"];?>,<?php echo $data["detail"][0]["prov"];?></div>
							<div class="col"><i class='fa fa-building'></i><?php echo $data["detail"][0]["bidang"];?></div>
							<div class="col"><i class='fa fa-calendar'></i> <?php echo $data["detail"][0]["hari_kerja"];?></div>
							<div class="col"><i class='fa fa-clock'></i> <?php echo $data["detail"][0]["jam_kerja"];?></div>
						</div>
						<div class="row p-2">
							<?php if($data["cek_lamaran"]<=0){?>
							<div class="col p-2"><a href='?a=Detail_loker/insert&&key=<?php echo $data["detail"][0]["id_loker"]?>'><button type='button' class='btn btn-outline-primary'><i class='far fa-clipboard'></i>Submit lamaran</button></a></div>
						<?php } else if($data["cek_lamaran"]>0){?>
							<div class="col p-2"><a href='?a=Detail_loker/stat_lam&&key=<?php echo $data["lam_ind"][0]["id_lam"]?>'><button type='button' class='btn btn-outline-primary'><i class='far fa-clipboard'></i>Cek lamaran</button></a></div>
						<?php } ?>

						</div>
					</div>
			</div>
			<div class='row'>
				<div class="col-lg-12">
					<div class="row mt-6">
						<div class="col-lg-6 mb-3 p-2">	
							<div class="p-3" style="border-bottom:solid Gray 3px">
							<h2>Lokasi</h2>
						</div>
							<iframe src="<?php echo $data["detail"][0]["alt_map"];?>" width="400" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
						<div class="col-lg-6 mb-3 p-2">	
							<div class="p-3" style="border-bottom:solid Gray 3px">
							<h2>Rincian Pekerjaan</h2>
						</div>
							<table>
										<tr><td>Posisi yang dilamar</td><td>:</td><td><?php echo $data["detail"][0]["nm_job"];?>, area <?php echo $data["detail"][0]["kab"];?></td></tr>
										<tr><td>Nama instansi</td><td>:</td><td><?php echo $data["detail"][0]["nm_com"];?></td></tr>
										<tr><td>Lokasi</td><td>:</td><td>Prov. <?php echo $data["detail"][0]["prov"];?> Kabupaten <?php echo $data["detail"][0]["kab"];?></td></tr>
										<tr><td>Estimasi pendapatan</td><td>:</td><td>IDR <?php echo $data["detail"][0]["sal_min"];?> - IDR <?php echo $data["detail"][0]["sal_max"];?></td></tr>
									</table>
						</div>
					</div>
					<div class="row mt-6">
						<div class="p-3" style="border-bottom:solid Gray 3px">
							<h2>Persyaratan</h2>
						</div>
						<div class="col-lg-12 mb-3 p-2">	
							<h5>Cara Melamar</h5>
							<ul>
								<li>Melengkapi data diri dengan data data yang akurat di menu profil</li>
								<li>Pastikan Email anda aktif dan terhubung ke ponsel</li>
								<li>Anda hanya tinggal menekan tombol submit lamaran, pihak instansi akan melakukan review terhadap profil anda sesuai dengan data data yang sudah anda isi</li>
								<li>anda harus menunggu sampai info mengenai interview online (melalui link zoom) dan offline(dengan datang langsung) diumumkan</li>
								<li>keberhasilan pelamar merupakan prestasi pelamar itu sendiri</li>
							</ul>
							<h5>Kualifikasi</h5>
							<ul>
								<?php $kual=explode("[new_num]", $data["detail"][0]["rinc_kul"]);
								foreach($kual as $kl){?>
									<li><?php echo $kl;?></li>
								<?php }?>
								
							</ul>
							<h5>Tanggung Jawab</h5>
							<ul>
								<?php $tanggung=explode("[new_num]", $data["detail"][0]["tg_jw"]);
								foreach($tanggung as $tg){?>
									<li><?php echo $tg;?></li>
								<?php }?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class='card p-2 col-lg-12 bg-danger'>
				Disclaimer : Pelamar tidak dikenakan biaya apapun selama proses lamaran, jangan percaya oknum yang meminta biaya tambahan yang mengatasnamakan r@tjob
			</div>
						<div class='row'>
				<div class="col-lg-12">
					<div class="row mt-6">
						<div class="p-3" style="border-bottom:solid Gray 3px">
							<h2>Lowonga pekerjaan lainnya di <?php echo $data["detail"][0]["nm_com"];?></h2>
						</div>
						<?php foreach($data["loker_lain"] as $loker_lain){?>
						<div class="col-lg-12 mb-3 p-2">	
							<div class='row'>
								<div class='col'><a href='<?php echo BASE_URL;?>?a=Detail_loker&&key=<?php echo $loker_lain['id_loker'];?>'><h3 class='text-primary'><?php
								$wkt=date_create($loker_lain["tgl_submit"]);
								$day=date_format($wkt,"d");
								$month=date_format($wkt,"M");
								$year=date_format($wkt,"Y");
								 echo $loker_lain["nm_job"]?>, <?php echo $loker_lain["kab"]?></h3></a></div>
							</div>
							<div class='row'>
								<div class="col"><i class='fas fa-clock'></i> <?php echo $day." ".$month." ".$year;?></div>
								<div class="col"><i class='fa fa-map-marker'></i> <?php echo $loker_lain["kab"]?></div>
								<div class="col"><span class='text-success'>IDR <?php echo $loker_lain["sal_min"]?>- IDR <?php echo $loker_lain["sal_max"]?></span></div>
								<div class="col"><i class='fas fa-briefcase'></i><?php echo $loker_lain["exp"]?></div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("applyer/detail_loker/__partials/js");?>
	</body>
</html>
