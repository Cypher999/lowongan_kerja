<!DOCTYPE html>
<html>
	<?php $this->view("admin/detail_loker/__partials/head");?>
	<body>
		<?php $this->view("admin/menu");?>

			<div class='container mb-5 p-2'>
			<div class="row table-bordered p-3">
					<div class="col-lg-4">
						<a href='<?php echo BASE_URL;?>?a=company_profile&&key=<?php echo $data["detail"][0]["id_company"];?>'><img src="<?php echo BASE_URL;?>img/company_logo/<?php echo $data["detail"][0]["id_company"];?>.jpeg" width="100" height="100"></a>
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
						<div class="row">
							<div class="col">
								<a href='?a=Loker&&key=<?php echo $data['detail'][0]['id_user'];?>'>Kembali</a>
							</div>
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
								<li>Setelah lamaran anda di terima pihak instansi, anda akan diarahkan menuju tes online dengan 20 soal selama 10-15 menit</li>
								<li>Setelah selesai mengerjakan soal tes, hasil akan langsung diumumkan dan anda harus menunggu sampai info mengenai interview online (melalui link zoom) dan offline(dengan datang langsung) diumumkan</li>
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
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/detail_loker/__partials/js");?>
	</body>
</html>
