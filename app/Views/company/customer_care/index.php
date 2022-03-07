<!DOCTYPE html>
<html>
	<?php $this->view("company/customer_care/__partials/head");?>
	<body>	
	<?php $this->view("company/menu");?>
	<div class='container mb-5'>
		<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);
		}?>
			<div class="card p-3">
				<div class="card-header"><h2>Layanan <i>Customer's Care</i></h2></div>
				<div class="card-body"> 
					<form action="<?php echo BASE_URL."?a=Customer_care/do_send";?>" method="post">
						
						<label>Pesan yg ingin disampaikan</label>
						<textarea name="isi" cols='40' rows='10' class="form-control"></textarea><br>
						<input type="submit" value="Kirim" class="btn btn-primary"><br>
						<p>catatan : Gunakanlah kalimat yang sopan dan bijak, pihak admin berhak menghapus tanpa peringatan akun yang menggunakan kata yang tidak bijak</p>
					</form>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("company/customer_care/__partials/js");?>
	</body>
</html>