<?php $key=htmlspecialchars($_GET["key"]);?>
<!DOCTYPE html>
<html>
	<?php $this->view("applyer/tes/__partials/head");?>
	<body>

		<div class='container mb-5 p-2'>
			<div class="card">	
				<div class="card-body">
					<span class="min"></span>:<span class="sec"></span>
					<ol>
					<?php foreach($data["soal"] as $soal){?>
						<li><?php echo $soal["soal"]?><br>
							<ul style="list-style-type: none;">
								<li><input type='radio' name='<?php echo $soal["id_soal"];?>' onclick='set_answer("<?php echo $soal["id_soal"];?>","A");' value='A'><?php echo $soal["pil_a"]?></li>
								<li><input type='radio' onclick='set_answer("<?php echo $soal["id_soal"];?>","B");' name='<?php echo $soal["id_soal"];?>' value='B'><?php echo $soal["pil_b"]?></li>
								<li><input type='radio' name='<?php echo $soal["id_soal"];?>' onclick='set_answer("<?php echo $soal["id_soal"];?>","C");' value='C'><?php echo $soal["pil_c"]?></li>
								<li><input type='radio' name='<?php echo $soal["id_soal"];?>' onclick='set_answer("<?php echo $soal["id_soal"];?>","D");' value='D'><?php echo $soal["pil_d"]?></li>
							</ul>
						</li>
					<?php }?>
					</ol>
					<button class="btn btn-primary" onclick="send_answer();" type="button">Selesai</button>
				</div>
			</div>
		</div>
		<?php $this->view("applyer/tes/__partials/start_js");?>
	</body>
</html>
