<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Tambah data Bidang</h2>
				</div>
				<div class="modal-body">
					<?php foreach($data["bidang"] as $bd){?>
					<form action="<?php echo BASE_URL."?a=Bidang/update&&key=".$bd["kd_bid"];?>" method="post" enctype="multipart/form-data">
						<label>Nama Bidang</label>
						<input class="form-control" name="bid" placeholder="nama bidang" value="<?php echo $bd["bidang"];?>">
						<input class="btn btn-primary" type="submit" value="Simpan">
					</form>
					<?php }?>
				</div>
			</div>
		</div>