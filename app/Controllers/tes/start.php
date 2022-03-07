<?php $key=htmlspecialchars($_GET["key"]);?>
<!DOCTYPE html>
<html>
	<?php $this->view("applyer/tes/__partials/head");?>
	<body>

		<div class='container mb-5 p-2'>
			<div class="row">
				<div class="col-lg-8 mb-4 table-bordered">
					<div class="mt-3">
					<span class="min"></span>:<span class="sec"></span><br>
					<span class="soal-indicator">1</span>
					<div id="soal-place">
						<?php echo $data["soal"][0]["soal"]?><br>
							<ul style="list-style-type: none;">
								<li><input type='radio' name='<?php echo $data["soal"][0]["id_soal"];?>' onclick='set_answer("<?php echo $data["soal"][0]["id_soal"];?>","A");' value='A'><?php echo $data["soal"][0]["pil_a"]?></li>
								<li><input type='radio' onclick='set_answer("<?php echo $soal[0]["id_soal"];?>","B");' name='<?php echo $data["soal"][0]["id_soal"];?>' value='B'><?php echo $data["soal"][0]["pil_b"]?></li>
								<li><input type='radio' name='<?php echo $data["soal"][0]["id_soal"];?>' onclick='set_answer("<?php echo $data["soal"][0]["id_soal"];?>","C");' value='C'><?php echo $data["soal"][0]["pil_c"]?></li>
								<li><input type='radio' name='<?php echo $data["soal"][0]["id_soal"];?>' onclick='set_answer("<?php echo $data["soal"][0]["id_soal"];?>","D");' value='D'><?php echo $data["soal"][0]["pil_d"]?></li>
							</ul>
					<button class="btn btn-primary button-prev"  type="button">Prev</button>
					<button class="btn btn-primary button-next" type="button">Next</button>
					<button class="btn btn-primary" onclick="send_answer();" type="button">Selesai</button>
					</div>
				</div>
				</div>
				<div class="col-lg-4 mb-4 table-bordered">					
					<div id="soal-page ">
						<?php $bar=1; $btn=1; foreach ($data["soal"] as $soal){?>
							<input value="<?php echo $btn;?>" type="button" class="btn btn-primary soal-btn mr-2 mb-2 mt-2" id="<?php echo $soal["id_soal"];?>" num-id="<?php echo $btn;?>" data-id="<?php echo $soal["id_soal"];?>"> 
							<?php $btn+=1; $bar+=1; if ($bar>3){echo "<br>";$bar=1;}?>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<?php $this->view("applyer/tes/__partials/start_js");?>
		<script>
			var soal_index={};
			<?php $btn=1; foreach ($data["soal"] as $soal){?>
				soal_index[<?php echo $btn;?>]="<?php echo $soal["id_soal"];?>";
			<?php $btn+=1;}?>
			var min_soal=1;
			var max_soal=<?php echo $btn-1;?>;
			var cur_soal=1;
			$(document).ready(function(){
				var base_url="http://localhost/lowongan_kerja/";				
				$(document).on("click",".button-prev",function(){
					var key="";
					cur_soal=parseInt(cur_soal);
					cur_soal-=1;
					if(parseInt(cur_soal)<=0){
						cur_soal=max_soal;
					}
					key=soal_index[cur_soal];
					$(".soal-indicator").html(cur_soal);
					$("#soal-place").html("<h2>Loading</h2>");
					$.ajax({
						url:base_url+"?a=Tes/read_one_soal&&key="+key,
						success:function(hasil){
							$("#soal-place").html(hasil)
						},
						error:function(){
							$("#soal-place").html("Terjadi Kesalahan")	
						}
					});
				});
				$(document).on("click",".button-next",function(){
					var key="";
					cur_soal=parseInt(cur_soal);
					cur_soal+=1;
					if(parseInt(cur_soal)>max_soal){
						cur_soal=1;
					}
					key=soal_index[cur_soal];
					$(".soal-indicator").html(cur_soal);
					$("#soal-place").html("<h2>Loading</h2>");
					$.ajax({
						url:base_url+"?a=Tes/read_one_soal&&key="+key,
						success:function(hasil){
							$("#soal-place").html(hasil)
						},
						error:function(){
							$("#soal-place").html("Terjadi Kesalahan")	
						}
					});
				});
				$(document).on("click",".soal-btn",function(){
					var key=$(this).attr("data-id");
					cur_soal=$(this).attr("num-id");
					$("#soal-place").html("<h2>Loading</h2>");
					$(".soal-indicator").html(cur_soal);
					$.ajax({
						url:base_url+"?a=Tes/read_one_soal&&key="+key,
						success:function(hasil){
							$("#soal-place").html(hasil)
						},
						error:function(){
							$("#soal-place").html("Terjadi Kesalahan")	
						}
					});	
				});
			});
		</script>
	</body>
</html>
