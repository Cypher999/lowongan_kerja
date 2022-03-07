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
				<div class="card-header"><h2>Sampaikan Laporan</h2></div>
				<div class="card-body"> 
					<form action="<?php echo BASE_URL."?a=Report_company/do_send&&to=".$data["to"];?>" method="post">
						
						<label>Kenapa anda me-report perusahaan ini?</label>
						<textarea name="keluhan" cols='40' rows='10' class="form-control"></textarea><br>
						<input type="submit" value="Kirim" class="btn btn-primary"><br>
						<p>catatan : Gunakanlah kata kata yang sopan dan bijak</p>
					</form>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("applyer/report_company/__partials/js");?>
	</body>
</html>