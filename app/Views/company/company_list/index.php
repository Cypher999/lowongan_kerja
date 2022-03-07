<!DOCTYPE html>
<html>
	<?php $this->view("applyer/company_list/__partials/head");?>
	<body>	
	<?php $this->view("applyer/menu");?>
	<div class='container mb-5'>
			<div class='row'>
				<div id='slider' class='carousel slide col-lg-12' data-ride='carousel' style='margin-bottom:25px;'>
					<ol class='carousel-indicators'>
						<li data-target='#slider' data-slide-to='0' class="active"></li>
						<li data-target='#slider' data-slide-to='1'></li>
						<li data-target='#slider' data-slide-to='2'></li>
					</ol>
					<div class='carousel-inner'>
						<div class='carousel-item active' align="middle">
							<img class='d-block' width="500" height="500" src='<?php echo BASE_URL;?>img/slide1.jpeg'>
						</div>
						<div class='carousel-item' align="middle">
							<img class='d-block' width="500" height="500" src='<?php echo BASE_URL;?>img/slide2.jpeg'>
						</div>
						<div class='carousel-item' align="middle">
							<img class='d-block' width="500" height="500" src='<?php echo BASE_URL;?>img/slide3.jpeg'>
						</div>
					</div>
					<a class='carousel-control-prev' href='#slider' role='button' data-slide='prev'>
						<span class='carousel-control-prev-icon' aria-hidden='true'></span>
						<span class='sr-only'>Previous</span>
					</a>
					<a class='carousel-control-next' href='#slider' role='button' data-slide='next'>
						<span class='carousel-control-next-icon' aria-hidden='true'></span>
						<span class='sr-only'>Next</span>
					</a>
				</div>
				<div class="col-lg-12">
					<div class="row mt-6">
						<div class="col-lg-12 mb-4">
							<div class="card" style="border-left:4px solid blue;">
								<div class="card-body">
									<div class=" d-flex text-uppercase font-weight-bold">
										<div class="mr-auto">Daftar Perusahaan</div>
									</div>
								</div>
							</div>
						</div>
						<?php foreach($data["per"] as $per){?>
						<div class="col-lg-3 mb-3">
							<div class="card">
								<a href='<?php echo BASE_URL;?>?a=Company_profile&&key=<?php echo $per["id_company"];?>'><img src="<?php echo BASE_URL;?>img/company_logo/<?php echo $per["id_company"];?>.jpeg" class='card-img-top'></a>
								<div class="card-body">
									<div class="mb-3">
										<i class='fa fa-map-marker'></i> <?php echo $data["per"][0]["kab"];?>,<?php echo $data["per"][0]["prov"];?><br>
										<i class='fa fa-building'></i><?php echo $data["per"][0]["bidang"];?><br>
										<i class='fa fa-calendar'></i> <?php echo $data["per"][0]["hari_kerja"];?><br>
										<i class='fa fa-clock'></i> <?php echo $data["per"][0]["jam_kerja"];?><br>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("applyer/company_list/__partials/js");?>
	</body>
</html>