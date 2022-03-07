<!DOCTYPE html>
<html>
	<?php $this->view("company/kritik_company/__partials/head");?>
	<body>	
	<?php $this->view("company/menu");?>
	<div class='container mb-5'>
		<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);
		}?>
			<div class="card p-3 m-3">
				<div class="card-header"><h2>Daftar Masukkan</h2></div>
				<div class="card-body"> 
					<?php if(count($data["kritik"])<=0){?>
						<h2>Tidak ada data untuk saat ini</h2>
					<?php }else {?>
					<?php foreach ($data["kritik"] as $kritik) {?>
					<div class="row"> <div class="col-lg-12">						
					<div class="card p-3">
						<div class="card-header">
							Dari :<?php echo $kritik["nm_lengkap"];?><br>
							<?php echo $kritik["tgl"];?>
						</div>
						<div class="card-body">
							<?php echo $kritik["isi"];?>
						</div>
						<div class="card-footer">
							<a href="<?php echo BASE_URL."?a=Kritik_company/del&&key=".$kritik["id_kritik_company"]; ?>"><input type="button" value="hapus" class="btn btn-outline-danger"></a>
						</div>
					</div>
					</div></div>
					<?php } }?>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("company/kritik_company/__partials/js");?>
	</body>
</html>