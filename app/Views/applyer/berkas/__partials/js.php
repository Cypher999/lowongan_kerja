<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/bootstrap.min.js'></script>
<script type="text/javascript">
	function prev_img(a){
	var gbr=document.getElementById(a);
	gbr.src=URL.createObjectURL(event.target.files[0]);
}
$(document).ready(function(){
	$(document).on('click','.edit-call',function(){
		var key=$(this).attr('data-id');
		var url_k="<?php echo BASE_URL;?>?a=Berkas/form_edit&&key="+key;
		$.ajax({
			url:url_k,
			success:function(hasil){
				$("#modal-edit").html(hasil);
			}
		});
	});
	$(document).on('hide.bs.modal','.edit-call',function(){
		$("#modal-edit").html("");
	});
});
</script>