<!DOCTYPE html>
<html>
	<?php $this->view("admin/company_profile/__partials/head");?>
	<body>
		<?php $this->view("admin/menu");?>

		<div class='container mb-5 p-2'>
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
						<?php if($data["company"][0]["status"]=="0"){?>
						<div class="row">
							<span class="text-danger">Perusahaan ini masih dalam proses acc, pastikan berkas yg di upload benar benar otentik</span><br>
							<a href='<?php echo BASE_URL."?a=Company"?>'> Kembali </a>
						</div>
						<?php } else {?>
						<div class="row">
							<div class="col">
								<a href='<?php echo BASE_URL."?a=Company"?>'> Kembali </a>
							</div>
						</div>
						<?php } ?>
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
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/company_profile/__partials/js");?>
	</body>
</html>
