<!DOCTYPE html>
<html>
	<?php $this->view("applyer/berkas/__partials/head");?>
	<body>	
	<?php $this->view("applyer/menu");?>
	<div class='container mb-5'>
		<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);;
		}?>
		<div class='card col-lg-12 p-2'>
				<div class='card-header'><h2>Berkas saya</h2></div>
					<span class="text-secondary">Disini anda bisa mengunggah file berkas anda seperti sertifikat, piagam, surat rekomendasi, surat keterangan atau semacamnya yang bisa anda jadikan sebagai surat pendukung dalam mencari pekerjaan, semakin banyak berkas anda maka kepercayaan pencari kerja anda akan semakin besar</span><br><br><br>
					<button class="btn btn-primary col-md-2 p-2 btn-sm" data-toggle='modal' data-target='#modal-new' type="button"><i class="fas fa-plus"></i>Tambah Berkas</button>
					<div class="row mt-6">
						<?php if(count($data["berkas"])<=0){
							echo "<h2>Anda belum mengupload berkas pendukung</h2>";
						} else{
							foreach($data["berkas"] as $berkas){?>
								<div class="col-lg-3 mb-3 p-2">
						<div class="card">
							<img src="<?php echo BASE_URL;?>img/bks/<?php echo $berkas['id_berkas'];?>.jpeg" class='card-img-top' width="100" height="150">
							<div class="card-body">
								<div class="mb-3">
									<span class='text-primary'>
										<i class="fa fa-calendar"></i><?php $wkt=date_create($berkas['tgl_berkas']);
										$tgl=date_format($wkt,"d");
										$bln=date_format($wkt,"M");
										$thn=date_format($wkt,"Y");
										echo $tgl." ".$bln." ".$thn;
										?>
									</span><br>
									<span class='text-success'>
										<?php echo $berkas['nm_topik'];?>
									</span><br>
									<span class='text-secondary'>
										<?php echo $berkas['ket'];?>
									</span>
								</div>
								<div class="row">
									<div class="col p-2">
									<a data-toggle='modal' data-target='#modal-edit' data-id='<?php echo $berkas['id_berkas'];?>' href='#' class='edit-call'><input type="button" class="btn btn-outline-warning" value="Edit Berkas"></a>
									</div>
									<div class="col p-2">
									<a href='?a=Berkas/delete&&key=<?php echo $berkas['id_berkas'];?>'><input type="button" class="btn btn-outline-danger" value="Hapus Berkas"></a>
									</div>
								</div>
							</div>
						</div>
						</div>
						<?php }
						}?>
						
					</div>

				</div>
		</div>
		<div class="modal" id='modal-new'>
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"><h2>Upload berkas</h2></div>
					<div class="modal-body">
						<button type="button" data-dismiss='modal' class="btn-outline-danger btn-sm" title="close"><i class="fa fa-times"></i></button>
						<form action="?a=Berkas/insert" method="post" enctype="multipart/form-data">
							<label>Topik berkas</label>
							<input name="nm_topik" placeholder="(exp. seminar pengembangan diri, sertifikan keterampilan dsb)" class="form-control">
							<label>Keterangan berkas</label>
							<textarea name="ket" class="form-control" cols="30" rows="5"></textarea>
							<img src="" id='prev_berkas' width="300" height="300"><br>
							<input type='file' name="fl_berkas" onchange="prev_img('prev_berkas')"><br>
							<input type='submit' value="Upload" class="btn btn-outline-primary">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" id='modal-edit'>
			
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("applyer/berkas/__partials/js");?>
	</body>
</html>