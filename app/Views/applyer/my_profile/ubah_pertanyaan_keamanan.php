<?php
$per_ker=[1=>"Siapakah nama teman terbaik anda ?",2=>"Apa Nama Hewan Peliharaan anda ?",3=>"Apa nama sekolah anda sewaktu masih kecil ?",4=>"Siapa nama ibu anda ?",5=>"Dimana Orangtua anda Tinggal ?",6=>"Apa bintang film favorit anda ?"];
$p1=False;
$p2=False;
?>
<!DOCTYPE html>
<html>
	<?php $this->view("applyer/my_profile/__partials/head");?>
	<body>
		<?php $this->view("applyer/menu");?>

		<div class='container mb-5 p-2'>
			<?php if (isset($_SESSION["flash"])){
			echo $_SESSION["flash"];
			unset($_SESSION["flash"]);;
		}?>
			<div class='card  col-lg-8'>
				<div class='card-header'><h2>Ubah Pertanyaan Keamanan</h2></div>
				<div class='card-body'>
					<form action="?a=My_profile/update_security" method='post' enctype="multipart/form-data">
						<?php foreach($data["security"] as $sec){?>
						<label>Pertanyaan 1</label><br>
						<?php $i=1; foreach ($per_ker as $pk){?>
							<input type="radio" name="per_1" value="<?php echo $i;?>" class="no_per_1" <?php if($i==$sec["per_1"]){$p1=True;echo "checked";}?>><?php echo $pk.($i==$sec["per_1"]);?><br>
						<?php $i++;}?>
						<input type="radio" class="show_per_1" id="rad_per_1" <?php if (!$p1){echo "checked";}?>>Lainnya<br>
								<div id="place_per_1">
									<?php if (!$p1){?>
										<input class='form-control' name='per_1' value="<?php echo $sec["per_1"];?>">
									<?php }?>
								</div><br>
						<label>Jawaban 1</label><br>
						<textarea class="form-control" cols="30" rows="5" name='jaw_1'><?php echo $sec['jaw_1'];?></textarea><br>
						<label>Pertanyaan 2</label><br>
						<?php $i=1; foreach ($per_ker as $pk){?>
							<input <?php if($i==$sec["per_2"]){$p2=True;echo "checked";}?> class="no_per_2" type="radio" name="per_2" value="<?php echo $i;?>"><?php echo $pk;?><br>
						<?php $i++;}?><br>
						<input type="radio" class="show_per_2" id="rad_per_2" <?php if (!$p2){echo "checked";}?>>Lainnya<br>
								<div id="place_per_2">
									<?php if (!$p2){?>
										<input class='form-control' name='per_1' value="<?php echo $sec["per_2"];?>">
									<?php }?>
								</div><br>
						
						<label>Jawaban 2</label><br>
						<textarea class="form-control" cols="30" rows="5" name='jaw_2'><?php echo $sec['jaw_2'];?></textarea><br>
						<button class="btn btn-outline-primary" type='submit'><i class="fa fa-save"></i></button>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
		
		<?php $this->view("footer");?>
		<?php $this->view("applyer/my_profile/__partials/js");?>
		<script>
			$(document).ready(function(){
				$(document).on("click",".show_per_1",function(){
					var abc=document.getElementsByClassName("no_per_1");
					var pj=abc.length;
					$("#place_per_1").html("<input class='form-control' name='per_1'>");	
					for($i=0;$i<pj;$i++){
						abc[$i].checked=false;
					}
				});
				$(document).on("click",".show_per_2",function(){
					var abc=document.getElementsByClassName("no_per_2");
					var pj=abc.length;
					$("#place_per_2").html("<input class='form-control' name='per_2'>");
					for($i=0;$i<pj;$i++){
						abc[$i].checked=false;
					}
				});
				$(document).on("click",".no_per_1",function(){
					$("#place_per_1").empty();
					document.getElementById("rad_per_1").checked=false;
				});
				$(document).on("click",".no_per_2",function(){
					$("#place_per_2").empty();
					document.getElementById("rad_per_2").checked=false;
				});
			});
		</script>
	</body>
</html>
