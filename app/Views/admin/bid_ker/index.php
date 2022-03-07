<!DOCTYPE html>
<html>
	<?php $this->view("admin/bid_ker/__partials/head");?>
	<body>	
	<?php $this->view("admin/menu");?>
	<div class='container mb-5'>
		<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);
		}?>
		<div class="card">
			<div class="card-header"><h2>Data Bidang Pekerjaan</h2></div>
			<div class="card-body">
				<a href="#" class="text-primary" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus"></i>Tambah Data</a>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama Bidang Pekerjaan</th>
							<th>Kontrol</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data['bid_ker'] as $bd) {?>
						<tr>
							<td><?php echo $bd['bid_ker'];?></td>
							<td><a data-toggle="modal" data-target="#modal-edit" data-id='<?php echo $bd['kd_bid_ker'];?>' class='cmd-edit' title='Edit Bidang'><i class='fas fa-edit'></i></a>
							<a href='<?php echo BASE_URL;?>?a=Bid_ker/delete&&key=<?php echo $bd['kd_bid_ker'];?>' title='Hapus Bidang'><i class='fas fa-times'></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal" id="modal-add">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Tambah data Bidang</h2>
				</div>
				<div class="modal-body">
					<form action="<?php echo BASE_URL."?a=Bid_ker/insert";?>" method="post" enctype="multipart/form-data">
						<label>Nama Bidang</label>
						<input class="form-control" name="bid" placeholder="nama bidang">
						<input class="btn btn-primary" type="submit" value="Simpan">
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id="modal-edit">
		
	</div>
		<?php $this->view("footer");?>
		<?php $this->view("admin/user_list/__partials/js");?>
		<script>
			$(document).ready(function(){
				$(".table").DataTable();
				$(document).on('click','.cmd-edit',function(){
					var key=$(this).attr("data-id");
					$.ajax({
						url:"<?php echo BASE_URL;?>?a=Bid_ker/form_edit&&key="+key,
						success:function(hasil){
							$("#modal-edit").html(hasil);
						},
						error:function(){
							alert("Terjadi Kesalahan");
						}
					})
				})
			});

		</script>
	</body>
</html>