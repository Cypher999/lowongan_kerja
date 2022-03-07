<?php
$nm_user=$this->model("Model_user")->read_one($_SESSION['user_loker']);
$nm_user=$nm_user[0]['nm_user'];
?>
<nav class="navbar navbar-expand-md bg-success navbar-dark" style="z-index: 1000;width: 100%">
	<a class="navbar-brand" href="<?php echo BASE_URL;?>">r@tjob</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsiblenavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsiblenavbar">
		<ul class="navbar-nav">			
			<li class="nav-item pl-3 pr-3">
				<div class='nav-link'>
					<a class="btn sing-it" href="?a=My_profile">User : <?php echo $nm_user;?></a>
				</div>
			</li>
			<li class="nav-item">
				<div class="dropdown nav-link">
					<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Menu user</button>
					<div class="dropdown-menu">
					<a class='dropdown-item'  href='?a=My_profile'>Data Profil</a>
					<a class='dropdown-item'  href='?a=Berkas'>Data Berkas</a>
					<a class='dropdown-item'  href='?a=My_profile/ubah_nm'>Ubah data user</a>
					<a class='dropdown-item'  href='?a=My_profile/ubah_ps'>Ubah password</a>
					<a class='dropdown-item'  href='?a=My_profile/ubah_pertanyaan_keamanan'>Ubah pertanyaan keamanan</a>
					</div>
				</div>
			</li>
			<li class="nav-item">
				<div class="dropdown nav-link">
					<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Pekerjaan</button>
					<div class="dropdown-menu">
					<a class="dropdown-item" href="?a=Company_list">Lihat Perusahaan</a>
					<a class="dropdown-item" href="?a=Detail_loker/list">Lihat Lamaran Saya</a>
					
					</div>
				</div>
			</li>
			<li class="nav-item">
				<div class='nav-link'>
					<a class="btn sing-it" href="?a=Customer_care">Customer Care</a>
				</div>
			</li>
			<li class="nav-item">
				<div class="nav-link">
					<a class="btn sing-it" href="?a=Home/logout">Logout</a>
				</div>
			</li>
		</ul>
	</div>
</nav>