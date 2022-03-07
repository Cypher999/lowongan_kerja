<!DOCTYPE html>
<html>
	<?php $this->view("company/home/__partials/head");?>
	<body>	
	<?php $this->view("company/menu");?>
	<div class='container mb-5 p-2'>
		<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);;
		}
			?>
			<div class='row'>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-5 pt-5 mt-5 bg-primary text-light" align="middle">
					<h2>Welcome to r@tjob<br> Silahkan Kelola Perusahaan Anda</h2>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="row mt-5 mb-5">
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<h2>Mencari Pekerjaan Sekarang Tidak Susah</h2><br>
							<p>Anda tidak perlu khawatir ketinggalan informasi, anda tidak perlu khawatir lagi jika seandainya harus bolak balik menuju ketempat lamaran kerja saat anda ingin melamar, di situs ini anda akan mendapatkan informasi lengkap soal beberapa lowongan pekerjaan dari perusahaan yang terpercaya, silahkan login atau daftar jika anda belum memiliki akun</p>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<img class='d-block col-sm-6 col-md-6 col-lg-6 col-xl-6' src='<?php echo BASE_URL;?>img/slide1.jpeg'>
						</div>
					</div>
					<div class="row mt-5  mb-5">
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<img class='d-block col-sm-6 col-md-6 col-lg-6 col-xl-6' src='<?php echo BASE_URL;?>img/slide2.jpeg'>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<h2>Pasang Lowongan anda Disini</h2><br>
							<p>Anda pemilik perusahaan? lapangan kerja? biro? dan semacamnya? sedang mencari karyawan untuk melengkapi tenaga yang kurang? pasang lowongan kerja anda disini, anda tidak perlu khawatir lowongan anda tidak dipedulikan atau semacamnya karena akan ada banyak pelamar dengan kualifikasi sesuai yang dapat melihat lamaran anda</p>
						</div>
						
					</div>
					<div class="row mt-5">
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<h2>24/7 Support</h2><br>
							<p>Anda memiliki keluhan atau kesulitan? silahkan kirimkan pesan ke customer's care kami, sertakan alamat email anda dan kami akan memberi balasan dengan segera</p>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<img class='d-block col-sm-6 col-md-6 col-lg-6 col-xl-6' src='<?php echo BASE_URL;?>img/slide3.jpeg'>
						</div>
					</div>
				</div>
			</div>
			<div class='row mb-5 p-2'>
				<div class="col-lg-6 mb-3">
					<div class="card">
						<div class="card-header"><h3>Data lowongan pekerjaan</h3></div>
						<div class="card-body"><h3><?php echo count($data['total_loker']);?></h3></div>
						<div class="card-footer"><a href='<?php echo BASE_URL."?a=Loker";?>'>Lihat selengkapnya</a></div>
					</div>
				</div>
				<div class="col-lg-6 mb-3">
					<div class="card">
						<div class="card-header"><h3>Statistik pelamar pekerjaan</h3></div>
						<div class="card-body">
							<table class="table table-bordered">
								<tr>
									<td>Total pelamar</td><td>:</td><td><?php echo count($data['data_pelamar']);?></td>
								</tr>
								<tr>
									<td>pelamar yang belum tes</td><td>:</td><td><?php echo $data['statistik']['C']; ?> (<?php if(count($data['data_pelamar'])>0){$per['c']=((($data['statistik']['C'])/count($data['data_pelamar']))*100); echo number_format($per['c'],'2');} ?> %)</td>
								</tr>
								<tr>
									<td>Pelamar yang sudah tes dan menunggu persetujuan</td><td>:</td><td><?php echo $data['statistik']['X']; ?> (25 %)</td>
								</tr>
								<tr>
									<td>Pelamar yang belum menerima jadwal interview</td><td>:</td><td><?php echo $data['statistik']['B']; ?> (25 %)</td>
								</tr>
								<tr>
									<td>Pelamar yang sudah menerima jadwal interview</td><td>:</td><td><?php echo $data['statistik']['A']; ?> (25 %)</td>
								</tr>

								</tr>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("company/home/__partials/js");?>
	</body>
</html>