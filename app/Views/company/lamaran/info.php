<!DOCTYPE html>
<html>
	<head>
		<?php $this->view('company/lamaran/_partials/head');?>
	</head>
	<body>
		<?php $this->view("company/menu");?>
		<div class='container d-flex h-100 justify-content-center'>
			<div class='card col-md-8 p-5 '>
				<div class='card-header'><h2>Informasi Interview lamaran</h2></div>
				<div class='card-body'>
					<?php if(isset($_SESSION["flash"])){
			echo $_SESSION["flash"]; unset($_SESSION["flash"]);
			 }?>
					<form action='?a=Lamaran/submit_info&&key=<?php echo $_GET['key'];?>' method='post'>
						<label>Jadwal Interview Online</label>
						<div class="row">
							<div class="col">
								<input type='date' name='tgl_online' class="form-control">
							</div>
							<div class="col">
								<select name='jam_online'>
								<?php for($i=0;$i<=24;$i++){?>
									<option value='<?php echo $i;?>'><?php echo $i;?></option>
								<?php }?>
								</select>
							</div>
							<div class="col">
								<select name='menit_online'>
								<?php for($i=0;$i<=60;$i++){?>
									<option value='<?php echo $i;?>'><?php echo $i;?></option>
								<?php }?>
								</select>
							</div>
						</div>
						
						
						<label>Jadwal Interview Offline</label>
						<div class="row">
							<div class="col">
								<input type='date' name='tgl_offline' class="form-control">
							</div>
							<div class="col">
								<select name='jam_offline'>
								<?php for($i=0;$i<=24;$i++){?>
									<option value='<?php echo $i;?>'><?php echo $i;?></option>
								<?php }?>
								</select>
							</div>
							<div class="col">
								<select name='menit_offline'>
								<?php for($i=0;$i<=60;$i++){?>
									<option value='<?php echo $i;?>'><?php echo $i;?></option>
								<?php }?>
								</select>
							</div>
						</div>
						<label>Link Zoom</label>
						<textarea name='zoom' class='form-control' col='30' row='5'></textarea>
						<div class='row'>
							<div class='col'><input class="btn btn-outline-primary" type='submit' value='Simpan'></div>
							<div class='col'><a href='?a=Detail_loker/daftar_pelamar&&key=<?php echo $_SESSION['id_loker'];?>'><input class="btn btn-outline-secondary" type='button' value='Kembali'></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view('company/lamaran/_partials/js');?>
	</body>
</html>