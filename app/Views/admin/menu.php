<?php
$nm_user=$this->model("Model_user")->read_one($_SESSION['user_loker']);
$nm_user=$nm_user[0]['nm_user'];
?>
<nav class="navbar navbar-expand-md bg-success navbar-dark" style="z-index: 1000;width: 100%">
	<a class="navbar-brand" href="<?php echo BASE_URL;?>">the r@tJob</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsiblenavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsiblenavbar">
		<ul class="navbar-nav">			
			<li class="nav-item pl-3 pr-3">
				<div class='nav-link'>
					<a class="btn sing-it" href="#" >User : <?php echo $nm_user;?></a>
				</div>
			</li>
			<li class="nav-item">
				<div class="dropdown nav-link">
					<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Menu user</button>
					<div class="dropdown-menu">
					<a class='dropdown-item'  href='?a=My_profile/ubah_ps'>Ubah password</a>
					<a class='dropdown-item'  href='?a=My_profile/ubah_pertanyaan_keamanan'>Ubah pertanyaan keamanan</a>
					</div>
				</div>
			</li>
			<li class="nav-item">
				<div class="dropdown nav-link">
					<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Menu data</button>
					<div class="dropdown-menu">
					<a class='dropdown-item' href="?a=Company">Data Perusahaan</a>
					<a class='dropdown-item' href="?a=Bidang">Data Bidang Perusahaan</a>
					<a class='dropdown-item' href="?a=Bid_ker">Data Bidang Pekerjaan</a>
					<a class='dropdown-item' href="?a=Loker_all">Data Lowongan Pekerjaan</a>
					<a class='dropdown-item' href="?a=User">Data User</a>
					</div>
				</div>
			</li>
			<li class="nav-item">
				<div class="nav-link">
					<a class="btn" href="?a=Customer_care">Daftar <i>Customer care</i></a>
				</div>
			</li>
			<li class="nav-item">
				<div class="nav-link">
					<a class="btn" href="?a=Home/logout">Logout</a>
				</div>
			</li>
		</ul>
	</div>
</nav>