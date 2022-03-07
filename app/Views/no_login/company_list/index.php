<!DOCTYPE html>
<html>
	<?php $this->view("no_login/company_list/__partials/head");?>
	<body>	
	<?php $this->view("no_login/menu");?>
	<div class='container mb-5'>
			<div class='row'>
				<div class="col-lg-12 mt-4">
					<div class="row mt-6">
						<div class="col-lg-12 mb-4">
							<div class="card" style="border-left:4px solid blue;">
								<div class="card-body">
									<div class=" d-flex text-uppercase font-weight-bold">
										<div class="mr-auto">Daftar Perusahaan</div>
									</div>
									<select class="form-control bid">
											<option value="">--Semua Jenis Perusahaan--</option>
											<?php foreach($data["bidang"] as $bidang){?>
												<option value="<?php echo $bidang["kd_bid"];?>"><?php echo $bidang["bidang"];?></option>
											<?php }?>
										</select>
								</div>
							</div>
						</div>
					</div>
						<div class="row mt-6 res">
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("no_login/company_list/__partials/js");?>
		<script>
			$(document).ready(function(){
				load_loker("");
				$(document).on("change",".bid",function(){
					var bid=$(this).val();
					load_loker(bid);

				});
			});
			function load_loker(bid){
				var url=base_url()+"?a=Company_list/load_company";
				var dt={"bid":bid};
				$.ajax({
					url:url,
					type:"post",
					data:dt,
					success:function(res){
						$(".res").html(res);
					},
					error:function(){
						alert("Terjadi kesalahan");
					}
				})
			}
			</script>
	</body>
</html>