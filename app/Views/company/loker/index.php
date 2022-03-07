<!DOCTYPE html>
<html>
	<?php $this->view("company/loker/__partials/head");?>
	<body>
		<?php $this->view("company/menu");?>

		<div class='container mb-5 p-2'>
			<?php if ((isset($_SESSION['flash']))&&($_SESSION['flash']!="")){
				echo $_SESSION['flash'];
				unset($_SESSION['flash']);
			}?>
			<div class="card p-2" style="border-left: solid green 3px">
				<h2>Lamaran Yang Tersedia</h2>
			</div>
			<div class="card p-2">
				<a href="#" class="text-success" data-toggle='modal' data-target='#modal-add'><i class="fas fa-plus"></i> Tambah Lamaran</a>
				<a href='<?php echo BASE_URL."?a=Company_profile"?>' class="text-success"><i class="fas fa-back"></i> Kembali</a>
				<table class="table table-list-lamaran table-bordered">
					<thead>
						<tr>
							<th>Nama Posisi tujuan</th>
							<th>Tanggal input lamaran</th>
							<th>Bidang Pekerjaan</th>
							<th>Jumlah Pelamar</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data["low_ker"] as $low_ker){?>
						<tr>
							<td><?php echo $low_ker["nm_job"];?></td>
							<td><?php $wkt=date_create($low_ker["tgl_submit"]);
							$tgl=date_format($wkt,"d");
							$bln=date_format($wkt,"M");
							$thn=date_format($wkt,"Y");
							 echo $tgl." ".$bln." ".$thn;?></td>
							 
							 <td><?php echo $low_ker["bid_ker"];?></td>
							 <td><?php echo $low_ker["jml_pel"];?></td>
							<td><a class="text-primary" href='<?php echo BASE_URL."?a=Detail_loker/daftar_pelamar&&key=".$low_ker['id_loker'];?>' title="Lihat daftar pelamar"><i class="fas fa-address-card"></i></a>
							<a class="text-warning" onclick="show_edit_form('<?php echo $low_ker['id_loker'];?>');"  href='#' data-toggle='modal' data-target='#modal-edit'  title="Edit Lamaran"><i class="fas fa-edit"></i></a>
							<a class="text-secondary" href='<?php echo BASE_URL."?a=Detail_loker&&key=".$low_ker['id_loker'];?>' title="Lihat detail"><i class="fas fa-search"></i></a>
							<a href='<?php echo BASE_URL."?a=Loker/delete&&key=".$low_ker['id_loker'];?>' class="text-danger" title="Hapus Lamaran"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="modal" id='modal-edit'>

			</div>
			<div class="modal" id='modal-add'>
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h2>Tambah lowongan Pekerjaan</h2>
						</div>
						<div class="modal-body">
							<input type="button" value="[ X ]" class="btn btn-outline-danger" data-dismiss="modal">
						<form action='?a=Loker/insert' method='post' enctype='multipart/form-data'>
							<label>Nama Pekerjaan</label>
							<input type="text" class="form-control" name=nm_job placeholder="Nama pekerjaan">
							<label>Bidang Pekerjaan</label>
							<select class="form-control" name="bid_ker">
							<?php foreach($data["bid_ker"] as $bid_ker){?>
								<option value="<?php echo $bid_ker["kd_bid_ker"];?>"><?php echo $bid_ker["bid_ker"];?></option>
							<?php }?>
							</select>
							<label>Provinsi</label>
							<input type="text" class="form-control" name='prov' placeholder="provinsi">
							<label>Kabupaten</label>
							<input type="text" class="form-control" name='kab' placeholder="kabupaten">
							<label>Kecamatan</label>
							<input type="text" class="form-control" name='kec' placeholder="kecamatan">
							<label>Desa</label>
							<input type="text" class="form-control" name='des' placeholder="desa">
							<label>Alamat di peta</label>
							<input type="text" class="form-control" name='alt_map' placeholder="alamat di peta(copy dari link google maps)">
							<label>Gaji terendah</label>
							<input name='sal_min' class="form-control" type="text" pattern="[0-9]{1,}" placeholder="gaji terendah" required="">
							<label>Gaji tertinggi</label>
							<input name='sal_max' type="text" class="form-control" pattern="[0-9]{1,}" placeholder="gaji tertinggi" required="">
							<label>Pengalaman minimal</label><br>
							<div class="row">
								<div class="col"><input type="number" name='peng-num' required="" class="form-control"></div>
								<div class="col">
									<select name='peng-tp'>
										<option value="minggu">Minggu</option>
										<option value="bulan">Bulan</option>
										<option value="tahun">Tahun</option>
									</select>
								</div>
							</div><br>
							<label>Alamat lengkap</label><br>
							<textarea cols=30 rows=5 name='tempat' required=""></textarea><br>
							<label>Jam kerja</label>
							<input type="text" class="form-control" name='jam_ker' placeholder="jam kerja" required="">
							<label>Rincian kualifikasi</label><br>
							<textarea cols=30 rows=5 name='rinc_kul'></textarea><br>
							<label>Tanggung jawab</label><br>
							<textarea cols=30 rows=5 name='tg_jw'></textarea><br>
							<span class="text-secondary">untuk rincian kualifikasi dan tanggung jawab, gunakan sintaks [new_num] sebagai tanda penomoran</span><br>
							<div class="row">
								<div class="col"><input type="submit" value='simpan lamaran' class="btn btn-outline-primary"></div>
								<div class="col"><input type="reset" value='reset' class="btn btn-outline-primary"></div>
							</div>

						</form>
					</div>
				</div>
			</div>
		<?php $this->view("footer");?>
		<?php $this->view("company/loker/__partials/js");?>
	</body>
</html>
