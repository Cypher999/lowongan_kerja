<?php $key=htmlspecialchars($_GET["key"]);?>
<!DOCTYPE html>
<html>
	<?php $this->view("applyer/tes/__partials/head");?>
	<body>
		<?php $this->view("applyer/menu");?>

		<div class='container mb-5 p-2'>
			<div class="card">	
				<div class="card-body">
					<h4>Anda akan diarahkan menuju tes dengan soal sebanyak 20 buah, dikerjakan selama 30 menit, tekan MULAI untuk memulai tes</h4><br>
					<a href='<?php echo BASE_URL."?a=Tes/start&&key=".$key;?>'>Mulai tes</a>
				</div>
			</div>
		</div>
		<?php $this->view("footer");?>
		<?php $this->view("applyer/tes/__partials/js");?>
	</body>
</html>
