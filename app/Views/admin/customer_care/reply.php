<!DOCTYPE html>
<html>
	<?php $this->view("admin/customer_care/__partials/head");?>
	<body>	
	<?php $this->view("admin/menu");?>
	<div class='container mb-5'>
		<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);
		}?>
			<div class="card p-3 mt-3">
				<div class="card-header"><h2>Kirim Balasan</h2></div>
				<div class="card-body"> 
					<?php foreach ($data["customer_care"] as $cc){?>
					<form action="<?php echo BASE_URL;?>?a=Customer_care/send_reply&&key=<?php echo $cc['id_custom']?>" method="post" enctype="multipart/form-data">
						<label>Tujuan</label>
						<input type="text" class="form-control" value="<?php echo $cc['email'];?>" readonly>
						<label>Pesan dari Pengguna</label><br>
						<textarea col=5 row=5 class="form-control"><?php echo $cc['isi'];?></textarea><br>
						<label>Balasan</label><br>
						<textarea col=5 row=5 name="balasan" class="form-control"></textarea><br>
						<input type="submit" class="btn btn-primary" value="Kirim Pesan">
					<?php }?>
					</form>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/customer_care/__partials/js");?>
	</body>
</html>