<script src='<?php echo BASE_URL;?>assets/js/jquery.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/jquery.dataTables.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/dataTables.bootstrap4.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/bootstrap.min.js'></script>
<script>
	var mi=30;
	var sc=0;
	var ans={};
	function send_answer(){
		$.ajax({
				url:"<?php echo BASE_URL;?>?a=Tes/result&&key=<?php echo $_GET['key'];?>",
				data:ans,
				type:"POST",
				success:function(hasil){
					window.location.href="<?php echo BASE_URL?>?a=Tes/review&&key=<?php echo $_GET['key'];?>";
				}
			});
	}
	function hitung_waktu(){
		if(sc>-1){
			sc=sc-1;
			if(sc==-1){
				mi=mi-1;
				sc=59;
			}
		}
		if(mi<0){
			sc=0;
			send_answer();
		}
		$(".sec").html(sc);
		$(".min").html(mi);
	}
	function set_answer(a,b){
		ans[a]=b;
		$("#"+a).attr("class","btn btn-warning");
	}
	setInterval(function(){hitung_waktu()},1000);
	
	
</script>
