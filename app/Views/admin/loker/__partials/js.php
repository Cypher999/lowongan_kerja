<script src='<?php echo BASE_URL;?>assets/js/jquery.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/bootstrap.min.js'></script>
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
function show_edit_form(a){
	var url_k="<?php echo BASE_URL;?>?a=Loker/form_edit&&key="+a;
		$.ajax({
			url:url_k,
			success:function(hasil){
				$("#modal-edit").html(hasil);
			}
		});
}
</script>