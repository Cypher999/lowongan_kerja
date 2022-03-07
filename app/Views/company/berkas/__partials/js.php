<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/bootstrap.min.js'></script>
<script type="text/javascript">
	function prev_img(a){
	var gbr=document.getElementById(a);
	gbr.src=URL.createObjectURL(event.target.files[0]);
}
</script>