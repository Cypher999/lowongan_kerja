<!DOCTYPE html>
<html>
	<?php $this->view("company/berkas/__partials/head");?>
	<body>	
	<?php $this->view("company/menu");?>
	<div class='container mb-5'>
		<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);;
		}?>
		<div class='card col-lg-12 p-2'>
				<div class='card-header'><h2>Berkas milik <?php echo $data["berkas"][0]["nm_lengkap"];?></h2></div>
					<span class="text-secondary">Disini terdapat file berkas seperti sertifikat, piagam, surat rekomendasi, surat keterangan atau semacamnya yang bisa anda jadikan sebagai sbahan pertimbangan untuk pelamar pekerjaan</span><br><br><br>
					
					<div class="row mt-6">
						<?php if(count($data["berkas"])<=0){
							echo "<h2>User ini belum mengupload berkas pendukung</h2>";
						} else{
							foreach($data["berkas"] as $berkas){?>
								<div class="col-lg-3 mb-3 p-2">
						<div class="card">
							<img src="<?php echo BASE_URL;?>img/bks/<?php echo $berkas['id_berkas'];?>.jpeg" class='card-img-top' width="100" height="150">
							<div class="card-body">
								<div class="mb-3">
									<span class='text-primary'>
										<i class="fa fa-calendar"></i><?php $wkt=date_create($berkas['tgl_berkas']);
										$tgl=date_format($wkt,"d");
										$bln=date_format($wkt,"M");
										$thn=date_format($wkt,"Y");
										echo $tgl." ".$bln." ".$thn;
										?>
									</span><br>
									<span class='text-success'>
										<?php echo $berkas['nm_topik'];?>
									</span><br>
									<span class='text-secondary'>
										<?php echo $berkas['ket'];?>
									</span>
								</div>
							</div>
						</div>
						</div>
						<?php }
						}?>
						
					</div>

				</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("company/berkas/__partials/js");?>
	</body>
</html>