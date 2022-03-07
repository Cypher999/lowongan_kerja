<?php
class Bid_ker extends Controller{
	private $Model_user;
	private $Model_bid_ker;
	public function __construct(){
		$this->Model_user=$this->model("Model_user");
		$this->Model_bid_ker=$this->model("Model_bid_ker");
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
		$data["bid_ker"]=$this->Model_bid_ker->read_all();
		$this->view("admin/bid_ker/index",$data);	
	}
	public function form_edit(){
		$id_bidang=htmlspecialchars($_GET['key']);
		$data["bid_ker"]=$this->Model_bid_ker->read_one($id_bidang);
		$this->view("admin/bid_ker/form_edit",$data);	
	}
	public function delete(){
		$key=htmlspecialchars($_GET['key']);
		$delete=$this->Model_bid_ker->delete($key);
		if($delete){
			$_SESSION["flash"]="<h2>Data bidang sudah dihapus</h2>";
			header("Location: ".BASE_URL."?a=Bid_ker");
		}
	}
	public function insert(){
		$a['kd_bid_ker']=random(5);
		$a['bid_ker']=htmlspecialchars($_POST['bid']);
		$insert=$this->Model_bid_ker->insert($a);
		if($insert){
			$_SESSION["flash"]="<h2>Bidang sudah ditambahkan</h2>";
			header("Location: ".BASE_URL."?a=Bid_ker");
		}
		else{
			echo $this->Model_bid_ker->db->show_error();
		}
	}
	public function update(){
		$a['kd_bid_ker']=htmlspecialchars($_GET['key']);
		$a['form-data']['bid_ker']=htmlspecialchars($_POST['bid']);
		$insert=$this->Model_bid_ker->update($a);
		if($insert){
			$_SESSION["flash"]="<h2>Bidang Pekerjaan sudah diupdate</h2>";
			header("Location: ".BASE_URL."?a=Bid_ker");
		}
		else{
			echo $this->Model_bid_ker->db->show_error();
		}
	}
}
?>
