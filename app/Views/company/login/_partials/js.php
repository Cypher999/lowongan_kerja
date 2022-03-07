<script src='<?php echo BASE_URL;?>assets/js/jquery.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/bootstrap.min.js'></script>
<script>
	function masuk_keranjang(a){
			$.ajax({
				url:"?a=Keranjang/create&&key="+a,
				success:function(hasil){
					alert(hasil);
				},
				error:function(){
					alert('Gagal')
				}
			});
	};
</script>