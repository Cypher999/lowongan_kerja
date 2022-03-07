<?php $jaw_ben=0;
$skor=0;
?>
<!DOCTYPE html>
<html>
	<?php $this->view("applyer/tes/__partials/head");?>
	<body>

		<div class='container mb-5 p-2'>
			<div class="card">	
				<div class="card-body">
					<span class="min"></span>:<span class="sec"></span>
					<ol>
					<?php foreach($data["jwb"] as $soal){?>
						<li><?php echo $soal["soal"]?><br>
							<ol type='a'>
								<li><?php echo $soal["pil_a"]?></li>
								<li><?php echo $soal["pil_b"]?></li>
								<li><?php echo $soal["pil_c"]?></li>
								<li><?php echo $soal["pil_d"]?></li>
							</ol><br>
							Jawaban anda : <?php
							if($soal['jawaban']==$soal['pil_ben']){
								$jaw_ben++;
							}
							 echo $soal['jawaban'];?>
							
						</li>
					<?php }?>
					</ol><br>
					Jawaban yang benar : <?php echo $jaw_ben;?> dari <?php echo count($data["jwb"]);?> soal<br>
					Skor : <?php echo ($jaw_ben/count($data["jwb"]))*100;?><BR>
					<a href='<?php echo BASE_URL."?a=Detail_loker&&key=".$_GET['key'];?>'>Kembali</a>
				</div>
			</div>
		</div>
		<?php $this->view("applyer/tes/__partials/js");?>
	</body>
</html>
