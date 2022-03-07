<!DOCTYPE html>
<html>
	<?php $this->view("applyer/detail_loker/__partials/head");?>
	<body>
		<?php $this->view("applyer/menu");?>

<div class='container mb-5 p-2'>
			<div class="row table-bordered p-3">
				<?php if ($data["detail"][0]["stat_lam"]=="X"){?>
				<h3>Selamat, Lamaran anda sedang di proses oleh instansi terkait, hasil akan diumumkan di website ini atau melalui email</h3>
			<?php } else if (($data["detail"][0]["stat_lam"]=="B")&&($data["detail"][0]["cek_jadwal"]==0)){?>
				<h3>Selamat, Lamaran anda sudah diproses oleh pihak instansi, jadwal untuk interview online dan offline sedang diatur, informasi interview akan diumumkan langsung melalui email atau langsung di website ini</h3>
			<?php } else if (($data["detail"][0]["stat_lam"]=="B")&&($data["detail"][0]["cek_jadwal"]!=0)){?>
				<h3>Selamat anda telah lulus menuju tahap interview, silahkan jadwal interview online dan offline</h3>
			<?php } ?>
			</div>
			<div class='row'>
				<div class="col-lg-12 mb-3 p-3">
							<div class="card p-3">
						<div class="card-header">Rincian pekerjaan yang dilamar</div>
						<div class='row'>
							<div class='col-lg-6 mb-3'>
								<img src="<?php echo BASE_URL."img/company_logo/".$data["detail"][0]["id_company"].".jpeg"?>" width='300' height='300' class='card-img-top'>
							</div>
							<div class='col-lg-6 mb-3'>
								<div class='row'>
									<table>
										<tr><td>Posisi yang dilamar</td><td>:</td><td><?php echo $data["detail"][0]["nm_job"];?></td></tr>
										<tr><td>Nama instansi</td><td>:</td><td><?php echo $data["detail"][0]["nm_com"];?></td></tr>
										<tr><td>Lokasi</td><td>:</td><td>Prov. <?php echo $data["detail"][0]["prov"];?> Kabupaten <?php echo $data["detail"][0]["kab"];?></td></tr>
										<tr><td>Estimasi pendapatan</td><td>:</td><td>IDR <?php echo $data["detail"][0]["sal_min"];?> - IDR <?php echo $data["detail"][0]["sal_max"];?></td></tr>
									</table>
									<?php if ($data["detail"][0]["stat_lam"]=="B"){?>
									</div><div class="row">
										<a href="<?php echo BASE_URL."?a=Detail_loker/cetak_kartu&&key=".$_GET["key"]?>"><input type="button" class="btn btn-outline-secondary" value="Cetak kartu lamaran"></a>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
					<?php  if ($data["detail"][0]["stat_lam"]=="X"){?>
					<p>Jadwal Interview sedang diproses</p>
					<?php }  else if (($data["detail"][0]["stat_lam"]=="B")&&($data["detail"][0]["cek_jadwal"]!=0)){?>
						<div class='col-lg-12'>
					<div class='row p-2'>
						<div class='col-lg-6'>
							<div class='card p-3'>
								<div class='card-header'><h3>Interview Online Via ZOOM Meeting</h3></div>
								<?php
								$wkt_online=date_create($data["detail"][0]["tgl_online"]);
								$jm_online=date_format($wkt_online,"h:i");
								$tgl_online=date_format($wkt_online,"d");
								$bln_online=date_format($wkt_online,"M");
								$thn_online=date_format($wkt_online,"Y");

								$wkt_offline=date_create($data["detail"][0]["tgl_offline"]);
								$jm_offline=date_format($wkt_offline,"h:i");
								$tgl_offline=date_format($wkt_offline,"d");
								$bln_offline=date_format($wkt_offline,"M");
								$thn_offline=date_format($wkt_offline,"Y");
								?>
								<div class="card-body">
									<i class='far fa-clock'></i><?php echo $jm_online;?> WIB 
									<i class='far fa-calendar'></i> <?php echo $tgl_online." ".$bln_online." ".$thn_online;?><br>
									<a href='<?php echo $data["detail"][0]["link_zoom"];?>'>Klik link berikut untuk masuk ke zoom meeting </a> atau scan kode qr dibawah ini<br>
									<div id='qrcode' style="width:100px; height:100px; margin-top:15px;"></div>
								</div>
							</div>
						</div>
						<div class='col-lg-6'>
							<div class='card p-3'>
								<div class='card-header'><h3>Interview Offline langsung ditempat</h3></div>
								<div class="card-body">
									<div class='row p-1'>
										<i class='far fa-clock'></i><?php echo $jm_offline;?> WIB 
									<i class='far fa-calendar'></i> <?php echo $tgl_offline." ".$bln_offline." ".$thn_offline;?><br>
									</div>
									<div class='row p-1'>
										<div class='col p-1'><i class='fas fa-map-marker'></i><?php echo "Desa ".$data["detail"][0]["des"]." Kecamatan ".$data["detail"][0]["kec"]." Kabupaten ".$data["detail"][0]["kab"]." Provinsi ".$data["detail"][0]["prov"];?></div>
									</div>
									Jangan lupa membawa identitas diri seperti KTP, KK Dan fotokopi ijazah terakhir serta kartu lamaran yang telah dicetak sebelumnya
								</div>
							</div>
						</div>
					</div>
				</div>
					<?php } ?>
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
		<script>
			makeCode("<?php echo $data["detail"][0]["link_zoom"];?>");
		</script>
	</body>
</html>
