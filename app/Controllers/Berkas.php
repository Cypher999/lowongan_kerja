<?php
class Berkas extends Controller{
	private $Model_user;
	private $Model_berkas;
	public function __construct(){
		$this->Model_user=$this->model("Model_user");
		$this->Model_berkas=$this->model("Model_berkas");
	}
	public function index(){
		$id_user=$_SESSION['user_loker'];
		$data["berkas"]=$this->Model_berkas->read_berkas($id_user);
		$this->view("applyer/berkas/index",$data);	
	}
	public function form_edit(){
		$id_berkas=htmlspecialchars($_GET['key']);
		$data["berkas"]=$this->Model_berkas->read_one($id_berkas);
		$this->view("applyer/berkas/form_edit",$data);	
	}
	public function delete(){
		$key=htmlspecialchars($_GET['key']);
		$delete=$this->Model_berkas->delete($key);
		if($delete){
			$_SESSION["flash"]="<h2>Berkas sudah dihapus</h2>";
			header("Location: ".BASE_URL."?a=Berkas");
		}
	}
	public function insert(){
		$a['id_berkas']=random(6);
		$a['id_user']=$_SESSION['user_loker'];
		$a['tgl_berkas']=date("Y/m/d h:i:s");
		$a['nm_topik']=htmlspecialchars($_POST['nm_topik']);
		$a['ket']=htmlspecialchars($_POST['ket']);
		$nama=$_FILES["fl_berkas"]["name"];
		$tipe=explode(".", $_FILES["fl_berkas"]["name"]);
		$tipe=$tipe[1];
		$fl=$_FILES["fl_berkas"]["tmp_name"];
		if(($nama=="")||($a["nm_topik"]=="")&&($a["ket"]=="")){
			$_SESSION["flash"]="<h2>Data tidak lengkap</h2>";
		}
		else{
			$insert=$this->Model_berkas->insert($a);
			if($insert){
				move_uploaded_file($fl, "img/bks/".$a['id_berkas'].".jpeg");	
				$_SESSION["flash"]="<h2>Berkas sudah ditambahkan</h2>";
			}
		}
		header("Location: ".BASE_URL."?a=Berkas");
	}
	public function update(){
		$a['id_berkas']=htmlspecialchars($_GET['key']);
		$a['form-data']['id_user']=$_SESSION['user_loker'];
		$a['form-data']['nm_topik']=htmlspecialchars($_POST['nm_topik']);
		$a['form-data']['ket']=htmlspecialchars($_POST['ket']);
		$nama=$_FILES["fl_berkas"]["name"];
		$tipe=explode(".", $_FILES["fl_berkas"]["name"]);
		$tipe=$tipe[1];
		$fl=$_FILES["fl_berkas"]["tmp_name"];
		if(($a['form-data']["nm_topik"]=="")&&($a['form-data']["ket"]=="")){
			$_SESSION["flash"]="<h2>Data tidak lengkap</h2>";
		}
		else{
			$insert=$this->Model_berkas->update($a);
			if($insert){
				if($nama!=""){
					$cek_file="img/bks/".$a['id_berkas'].".jpeg";
					if(file_exists($cek_file)){
						unlink($cek_file);
					}
					move_uploaded_file($fl, "img/bks/".$a['id_berkas'].".jpeg");		
				}
				$_SESSION["flash"]="<h2>Berkas sudah diedit</h2>";
			}
		}
		header("Location: ".BASE_URL."?a=Berkas");
	}
}
?>
