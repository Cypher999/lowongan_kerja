<!DOCTYPE html>
<html>
	<?php $this->view("applyer/report_company/__partials/head");?>
	<body>	
	<?php $this->view("applyer/menu");?>
	<div class='container mb-5'>
		<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);
		}?>
			<div class="card p-3">
				<div class="card-header"><h2>Daftar Report</h2><br>Perusahaan : <?php echo $data["report_company"][0]["nm_com"];?></div>
				<div class="card-body"> 
					<?php foreach ($data["report_company"] as $report) {?>
					<div class="row"> <div class="col-lg-12">						
					<div class="card p-3">
						<div class="card-header">
							Dari :<?php echo $report["nm_lengkap"];?><br>
							<?php echo $report["tgl"];?>
						</div>
						<div class="card-body">
							<?php echo $report["keluhan"];?>
						</div>
						<div class="card-footer">
							<a href="<?php echo BASE_URL."?a=Report_company/del&&key=".$report["id_report_company"]; ?>"><input type="button" value="hapus" class="btn btn-outline-danger"></a>
						</div>
					</div>
					</div></div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("applyer/report_company/__partials/js");?>
	</body>
</html>