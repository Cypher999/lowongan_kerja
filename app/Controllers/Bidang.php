<?php
class Bidang extends Controller{
	private $Model_user;
	private $Model_bidang;
	public function __construct(){
		$this->Model_user=$this->model("Model_user");
		$this->Model_bidang=$this->model("Model_bidang");
		if(isset($_SESSION["user_loker"])){
			$status_user=$this->Model_user->read_one($_SESSION["user_loker"]);
			if($status_user[0]["tipe_user"]!="A"){
				header("Location: ?");
				exit();
			}
		}
		else{
			header("Location: ?");
			exit();
		}
	}
	public function index(){
		$id_user=$_SESSION['user_loker'];
		$data["bidang"]=$this->Model_bidang->read_all();
		$this->view("admin/bidang/index",$data);	
	}
	public function form_edit(){
		$id_bidang=htmlspecialchars($_GET['key']);
		$data["bidang"]=$this->Model_bidang->read_one($id_bidang);
		$this->view("admin/bidang/form_edit",$data);	
	}
	public function delete(){
		$key=htmlspecialchars($_GET['key']);
		$delete=$this->Model_bidang->delete($key);
		if($delete){
			$_SESSION["flash"]="<h2>Data bidang sudah dihapus</h2>";
			header("Location: ".BASE_URL."?a=Bidang");
		}
	}
	public function insert(){
		$a['kd_bid']=random(5);
		$a['bidang']=htmlspecialchars($_POST['bid']);
		$insert=$this->Model_bidang->insert($a);
		if($insert){
			$_SESSION["flash"]="<h2>Bidang sudah ditambahkan</h2>";
			header("Location: ".BASE_URL."?a=Bidang");
		}
		else{
			echo $this->Model_bidang->db->show_error();
		}
	}
	public function update(){
		$a['kd_bid']=htmlspecialchars($_GET['key']);
		$a['form-data']['bidang']=htmlspecialchars($_POST['bid']);
		$insert=$this->Model_bidang->update($a);
		if($insert){
			$_SESSION["flash"]="<h2>Bidang sudah diupdate</h2>";
			header("Location: ".BASE_URL."?a=Bidang");
		}
		else{
			echo $this->Model_bidang->db->show_error();
		}
	}
}
?>
