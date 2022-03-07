<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Tambah data Bidang Pekerjaan</h2>
				</div>
				<div class="modal-body">
					<?php foreach($data["bid_ker"] as $bd){?>
					<form action="<?php echo BASE_URL."?a=Bid_ker/update&&key=".$bd["kd_bid_ker"];?>" method="post" enctype="multipart/form-data">
						<label>Nama Bidang Pekerjaan</label>
						<input class="form-control" name="bid" placeholder="nama bidang" value="<?php echo $bd["bid_ker"];?>">
						<input class="btn btn-primary" type="submit" value="Simpan">
					</form>
					<?php }?>
				</div>
			</div>
		</div>