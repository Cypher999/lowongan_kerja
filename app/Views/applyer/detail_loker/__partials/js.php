<script src='<?php echo BASE_URL;?>assets/js/jquery.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/jquery.dataTables.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/dataTables.bootstrap4.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/bootstrap.min.js'></script>
<script src='<?php echo BASE_URL;?>assets/js/qrcode.min.js'></script>
<script>
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 100,
	height : 100
});
$(document).ready(function(){
	$(".table").DataTable({
			"responsive": true,
			"processing": true,
			"columnDefs": [
				{ "orderable": false, "targets": [] }
			]
		});
});
function makeCode (a) {		
	var elText = a;
	qrcode.makeCode(elText);
}
function prev_img(a){
	var gbr=document.getElementById(a);
	gbr.src=URL.createObjectURL(event.target.files[0]);
}
</script>
