<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"><h2>Edit berkas</h2></div>
					<div class="modal-body">
						<?php foreach ($data["berkas"] as $berkas){?>
						<button type="button" data-dismiss='modal' class="btn-outline-danger btn-sm" title="close"><i class="fa fa-times"></i></button>
						<form action="?a=Berkas/update&&key=<?php echo $berkas['id_berkas'];?>" method="post" enctype="multipart/form-data">
							<label>Topik berkas</label>
							<input name="nm_topik" placeholder="(exp. seminar pengembangan diri, sertifikan keterampilan dsb)" class="form-control" value="<?php echo $berkas['nm_topik'];?>">
							<label>Keterangan berkas</label>
							<textarea name="ket" class="form-control" cols="30" rows="5"><?php echo $berkas['ket'];?></textarea>
							<img src="<?php echo BASE_URL;?>img/bks/<?php echo $berkas['id_berkas'];?>.jpeg" id='prev_berkas_e' width="300" height="300"><br>
							<input type='file' name="fl_berkas" onchange="prev_img('prev_berkas_e')"><br>
							<input type='submit' value="Upload" class="btn btn-outline-primary">
						</form>
						<?php } ?>
					</div>
				</div>
			</div>