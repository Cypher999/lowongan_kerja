<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h2>Edit lowongan Pekerjaan</h2>
						</div>
						<div class="modal-body">
							<input type="button" value="[ X ]" class="btn btn-outline-danger" data-dismiss="modal">
							<?php foreach ($data['loker'] as $loker){?>
						<form action='?a=Loker/update&&key=<?php echo $loker['id_loker'];?>' method='post' enctype='multipart/form-data'>
							<label>Nama Pekerjaan</label>
							<input type="text" class="form-control" value="<?php echo $loker['nm_job'];?>" name=nm_job placeholder="Nama pekerjaan">
							<label>Bidang Pekerjaan</label>
							<select class="form-control" name="bid_ker">
							<?php foreach($data["bid_ker"] as $bid_ker){?>
								<option value="<?php echo $bid_ker["kd_bid_ker"];?>" <?php if($bid_ker["kd_bid_ker"]==$loker["kd_bid_ker"]){echo "selected";}?>><?php echo $bid_ker["bid_ker"];?></option>
							<?php }?>
							</select>
							<label>Provinsi</label>
							<input type="text" class="form-control" name='prov' placeholder="provinsi" value="<?php echo $loker['prov'];?>">
							<label>Kabupaten</label>
							<input type="text" value="<?php echo $loker['kab'];?>" class="form-control" name='kab' placeholder="kabupaten">
							<label>Kecamatan</label>
							<input type="text" class="form-control" value="<?php echo $loker['kec'];?>" name='kec' placeholder="kecamatan">
							<label>Desa</label>
							<input type="text" class="form-control" name='des' placeholder="desa" value="<?php echo $loker['des'];?>">
							<label>Alamat di peta</label>
							<input type="text" class="form-control" name='alt_map' placeholder="alamat di peta(copy dari link google maps)" value="<?php echo $loker['alt_map'];?>">
							<label>Gaji terendah</label>
							<input name='sal_min' class="form-control" type="text" pattern="[0-9]{1,}" placeholder="gaji terendah" required="" value="<?php echo $loker['sal_min'];?>">
							<label>Gaji tertinggi</label>
							<input name='sal_max' type="text" class="form-control" pattern="[0-9]{1,}" placeholder="gaji tertinggi" required="" value="<?php echo $loker['sal_max'];?>">
							<label>Pengalaman minimal</label><br>
							<?php
							$exp=explode(" ", $loker['exp']);
							?>
							<div class="row">
								<div class="col"><input type="number" name='peng-num' required="" class="form-control" value="<?php echo $exp[0];?>"></div>
								<div class="col">
									<select name='peng-tp'>
										<option value="minggu" <?php if ($exp[1]=="minggu"){echo "selected";}?>>Minggu</option>
										<option value="bulan" <?php if ($exp[1]=="bulan"){echo "selected";}?>>Bulan</option>
										<option value="tahun" <?php if ($exp[1]=="tahun"){echo "selected";}?>>Tahun</option>
									</select>
								</div>
							</div><br>
							<label>Alamat lengkap</label><br>
							<textarea cols=30 rows=5 name='tempat' required=""><?php echo $loker['tempat'];?></textarea><br>
							<label>Jam kerja</label>
							<input type="text" class="form-control" name='jam_ker' placeholder="jam kerja" required="" value="<?php echo $loker['jam_ker'];?>">
							<label>Rincian kualifikasi</label><br>
							<textarea cols=30 rows=5 name='rinc_kul'><?php echo $loker['rinc_kul'];?></textarea><br>
							<label>Tanggung jawab</label><br>
							<textarea cols=30 rows=5 name='tg_jw'><?php echo $loker['tg_jw'];?></textarea><br>
							<span class="text-secondary">untuk rincian kualifikasi dan tanggung jawab, gunakan sintaks [new_num] sebagai tanda penomoran</span><br>
							<div class="row">
								<div class="col"><input type="submit" value='simpan lamaran' class="btn btn-outline-primary"></div>
								<div class="col"><input type="reset" value='reset' class="btn btn-outline-primary"></div>
							</div>

						</form>
						<?php } ?>
					</div>
				</div>