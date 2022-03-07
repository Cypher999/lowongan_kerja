<!DOCTYPE html>
<html>
	<?php $this->view("applyer/company_profile/__partials/head");?>
	<body>
		<?php $this->view("applyer/menu");?>

		<div class='container mb-5 p-2'>
			<?php if(isset($_SESSION["flash"])){
				echo $_SESSION["flash"];
				unset($_SESSION["flash"]);
			}?>
			<div class="row table-bordered p-3">
					<div class="col-lg-4">
						<img src="<?php echo BASE_URL;?>img/company_logo/<?php echo $data["company"][0]["id_company"];?>.jpeg" width="100" height="100">
					</div>
					<div class="col-lg-8">
						<div class="row">
							<h5><?php echo $data["company"][0]["nm_com"];?></h5>
						</div>
						<div class="row">
							<div class="col"><i class='fa fa-map-marker'></i><?php echo $data["company"][0]["kab"];?>, <?php echo $data["company"][0]["prov"];?></div>
							<div class="col"><i class='fa fa-building'></i><?php echo $data["company"][0]["bidang"];?></div>
							<div class="col"><i class='fa fa-calendar'></i> <?php echo $data["company"][0]["hari_kerja"];?></div>
							<div class="col"><i class='fa fa-clock'></i> <?php echo $data["company"][0]["jam_kerja"];?></div>
						</div>
						<div class="row">
							<div class="col">
							<a href="<?php echo BASE_URL."?a=Kritik_company&&to=".$data["company"][0]["id_company"]?>"><input type="button" value="beri masukkan" class="btn btn-outline-success"></a></div>
							<div class="col">
							<?php 
							$cek_report=$this->Model("Model_report_company")->read_company_user($data["company"][0]["id_company"],$_SESSION["user_loker"]);
							if(count($cek_report)<=0){?>
							<a href="<?php echo BASE_URL."?a=Report_company&&to=".$data["company"][0]["id_company"]?>"><input type="button" value="Laporkan Perusahaan" class="btn btn-outline-danger"></a>
							<?php } else{?>
								<p>Anda sudah melaporkan perusahaan ini</p>
								<a href="<?php echo BASE_URL."?a=Report_company/cancel_report&&key=".$cek_report[0]["id_report_company"];?>">Batalkan report</a><?php } ?></div>
						</div>
					</div>
			</div>
			<div class='row'>
				<div class="col-lg-12">
					<div class="row mt-6">
						<div class="col-lg-12 mb-4">
							<div class="card" style="border-left:4px solid blue;">
								<div class="card-body">
									<div class=" d-flex text-uppercase font-weight-bold">
										<div class="mr-auto">Tentang Perusahaan</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 mb-3">
							<div class="row">
								<div class="col-lg-12 mb-3">
									<H5>Benefit</H5>
									<ul>
										<?php $benefit=explode("[NEW_NUM]", $data["company"][0]["list_ben"]);
									foreach ($benefit as $ben) {?>
										<li><?php echo $ben;?></li>
									<?php } ?>
									</ul>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 mb-3">
									<iframe src="<?php echo $data["company"][0]["alt_map"];?>" width="300" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								</div>
							</div>
						</div>
						<div class="col-lg-8 mb-3">
									<H2> <?php echo $data["company"][0]["nm_com"];?></H2>
									<?php $profil=explode("[NEWLINE]", $data["company"][0]["profil"]);
									foreach ($profil as $pr) {?>
										<p><?php echo $pr;?></p>
									<?php }
									 ?>
									
								
						</div>
					</div>
					<div class="row mt-6">
						<div class="card p-3 col-lg-12" style="border-left:solid blue 3px">
							<h2>Lowongan kerja lainnya di <?php echo $data["company"][0]["nm_com"];?></h2>
						</div>
						<?php foreach ($data["low_ker"] as $low_ker){?>
						<div class="col-lg-12 mb-3 p-2">	
							<div class='row p-2'>
								<div class='col-lg-12'>
									<h2 class="text-primary">
										<a href='<?php echo BASE_URL;?>?a=Detail_loker&&key=<?php echo $low_ker['id_loker'];?>'><?php echo $low_ker["nm_job"];?></a>
									</h2>
								</div>
							</div>
							<div class='row p-2'>
								<div class='col-md-4'>
									<i class="far fa-clock"></i><?php
									$wkt=date_create($low_ker["tgl_submit"]);
									$day=date_format($wkt,"d");
									$month=date_format($wkt,"M");
									$year=date_format($wkt,"Y");
									 echo $day." ".$month." ".$year;?>
								</div>
								<div class='col-md-4'>
									<i class="fa fa-map-marker"></i><?php echo $low_ker["kab"];?>
								</div>
								<div class='col-md-4'>
									<i class="fas fa-briefcase"></i><?php echo $low_ker["exp"];?> Experience
								</div>
								<div class='col-md-4'>
									<span class="text-success">IDR <?php echo $low_ker["sal_min"];?>- IDR <?php echo $low_ker["sal_max"];?></span>
								</div>
							</div>
							<div class='row p-2'>
								<div class='col-md-12'>
									Responsiblities <br>
									<ul>
										<?php $respon=explode("[new_num]", $low_ker["tg_jw"]);
										foreach ($respon as $res){?>
										<li><?php echo $res;?></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("applyer/company_profile/__partials/js");?>
	</body>
</html>
