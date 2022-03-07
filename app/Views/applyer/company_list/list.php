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