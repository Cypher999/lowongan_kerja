<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/bootstrap.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/jquery.dataTables.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/dataTables.bootstrap4.min.js'></script>
<script>
$(document).ready(function(){
	$(".table-list-lamaran").DataTable();
});
function prev_img(a){
	var gbr=document.getElementById(a);
	gbr.src=URL.createObjectURL(event.target.files[0]);
}
</script>