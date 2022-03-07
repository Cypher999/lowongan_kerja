<!DOCTYPE html>
<html>
	<?php $this->view("no_login/home/__partials/head");?>
	<body>	
	<?php $this->view("no_login/menu");?>
	<div class='container mb-5 col-lg-10'>
		<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);
		}?>
			<div class='row'>
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pb-5 pt-5 mt-5 bg-primary text-light" align="middle">
					<h2>Welcome to r@tjob</h2>
				</div>

				<div class="col-lg-12">
					<div class="row mt-6">
						<div class="col-lg-12 mb-4 mt-4">
							<div class="card" style="border-left:4px solid blue;">
								<div class="card-body">
									<div class=" d-flex text-uppercase font-weight-bold">
										<div class="mr-auto">Lowongan kerja tersedia</div>
									</div>
										<label>Cari Berdasarkan </label><br><hr>
										<label>Bidang / Spesifikasi Pekerjaan</label>
										<select class="form-control bid">
											<option value="">--Semua Bidang--</option>
											<?php foreach($data["bid_ker"] as $bidang){?>
												<option value="<?php echo $bidang["kd_bid_ker"];?>"><?php echo $bidang["bid_ker"];?></option>
											<?php }?>
										</select>
										<label>Kisaran Penghasilan (Rp)</label>
										<input class="form-control gj" placeholder="masukkan kisaran penghasilan">
										<label>Masukkan Kata Kunci Lain</label>
										<input class="form-control key" placeholder="kata kunci">
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-6 loker-place">						
						
					</div>
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
		</div>
			<?php $this->view("footer");?>
			<?php $this->view("no_login/home/__partials/js");?>
			<script>
				var dt={};
			$(document).ready(function(){
				load_loker("");
				$(document).on("change",".bid",function(){
					var bid=$(this).val();
					if(bid.length>0&&bid!=""){
						dt["bid"]=bid;
					}
					else{
						dt["bid"]="";	
					}
					load_loker();
				});
				$(document).on("change",".key",function(){
					var key=$(this).val();
					if(key.length>0&&key!=""){
						dt["key"]=key;
					}
					else{
						dt["key"]="";
					}
					load_loker();
				});
				$(document).on("change",".gj",function(){
					var key=$(this).val();
					if(key.length>0&&key!=""){
						dt["gj"]=key;
					}
					else{
						dt["gj"]="";
					}
					load_loker();
				});
			});
			function load_loker(){
				var url=base_url()+"?a=Home/load_loker";
				$.ajax({
					url:url,
					type:"post",
					data:dt,
					success:function(res){
						$(".loker-place").html(res);
					},
					error:function(){
						alert("Terjadi kesalahan");
					}
				})
			}
			</script>
	</body>
</html>