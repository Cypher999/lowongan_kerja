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
			<div class="card p-3">
				<div class="card-header"><h2>Daftar Pesan Layanan Pelanggan</h2></div>
				<div class="card-body"> 
					<?php foreach ($data["customer_care"] as $cc) {?>
					<div class="row"> <div class="col-lg-12">						
					<div class="card p-3">
						<div class="card-header">
							Dari :<?php 
							if($cc["id_user"]!=""){
								$cek_user=$this->Model("Model_user")->read_one($cc["id_user"]);
								echo $cek_user[0]["nm_lengkap"];
							}else{
								echo "Anonim";
							}?><br>
							<?php echo $cc["tgl"];?>
						</div>
						<div class="card-body">
							<?php echo $cc["isi"];?>
						</div>
						<div class="card-footer">
							<a href="<?php echo BASE_URL."?a=customer_care/del&&key=".$cc["id_custom"]; ?>"><input type="button" value="hapus" class="btn btn-outline-danger"></a>
							<a href="<?php echo BASE_URL."?a=customer_care/reply&&key=".$cc["id_custom"]; ?>"><input type="button" value="kirim balasan" class="btn btn-outline-primary"></a>
						</div>
					</div>
					</div></div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/customer_care/__partials/js");?>
	</body>
</html>