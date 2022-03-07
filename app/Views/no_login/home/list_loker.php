<?php foreach($data["low_ker"] as $low_ker){
							if($low_ker['status']==1){?>
						<div class="col-lg-3 mb-3">
							<div class="card">
								<a href='<?php echo BASE_URL;?>?a=Detail_loker&&key=<?php echo $low_ker["id_loker"];?>'><img src="<?php echo BASE_URL;?>img/company_logo/<?php echo $low_ker["id_company"];?>.jpeg" class='card-img-top'></a>
								<div class="card-body">
									<div class="mb-3">
										<span class='text-primary'>
											<?php echo $low_ker["nm_job"];?>, area <?php echo $low_ker["kab"];?>
										</span><br>
										<span class='text-secondary'>
											<?php echo $low_ker["nm_com"];?>
										</span><br>
										<i class='fa fa-map-marker'></i> <?php echo $low_ker["prov"];?><br>
										<span class='text-success'>
											IDR <?php echo $low_ker["sal_min"];?> - IDR <?php echo $low_ker["sal_max"];?>
										</span>
									</div>
								</div>
							</div>
						</div>
						<?php } }?>