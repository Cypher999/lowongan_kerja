<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/bootstrap.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/jquery.dataTables.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/dataTables.bootstrap4.min.js'></script>
<script>
$(document).ready(function(){
	$(".table").DataTable();
	$(document).on("click",".show_dec",function(){
		var key=$(this).attr("data-id");
		$(".dec-confirm").attr("action","<?php echo BASE_URL."index.php?a=Company/dec_com&&key=";?>"+key);
	});
});
</script>