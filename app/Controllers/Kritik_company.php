<?php
class Kritik_company extends Controller{
	private $Model_kritik_company;
	private $Model_company;
	private $Model_user;
	private $php_mail;
	public function __construct(){
		$this->Model_company=$this->model("Model_company");
		$this->Model_kritik_company=$this->model("Model_kritik_company");
		$this->Model_user=$this->model("Model_user");
		$this->php_mail=new php_mailer();
		if(isset($_SESSION["user_loker"])){
			$cek_tipe=$this->Model_user->read_one($_SESSION["user_loker"]);
			if($cek_tipe[0]["tipe_user"]=="P"){
				$this->path="applyer";
			}
			else if($cek_tipe[0]["tipe_user"]=="C"){
				$this->path="company";
			}
			else if($cek_tipe[0]["tipe_user"]=="A"){
				$this->path="admin";
			}
			
		}
		else{
				$this->path="no_login";	
			}
	}
	function index(){
		$data["to"]=htmlspecialchars($_GET["to"]);
		$this->view($this->path."/kritik_company/index",$data);
	}
	function list(){
		$cek_company=$this->Model_company->read_one_user($_SESSION["user_loker"]);
		$data["kritik"]=$this->Model_kritik_company->read_company_user($cek_company[0]["id_company"]);
		$this->view($this->path."/kritik_company/index",$data);
	}
	function do_send(){
		$a["id_kritik_company"]=random(5);
		$a["id_user"]=$_SESSION["user_loker"];
		$a["id_company"]=htmlspecialchars($_GET["to"]);
		$a["isi"]=htmlspecialchars($_POST["isi"]);
		$a["tgl"]=date("Y-m-d");
		$send=$this->Model_kritik_company->create($a);
		if($send){
			$_SESSION["flash"]="<h2>Krtik / Masukkan sudah dikirim</h2>";
			header("Location: ".BASE_URL."?a=Company_profile&&key=".$a["id_company"]);
		}
		else{
			echo $this->Model_kritik_company->db->show_error();
		}
	}
	function del(){
		$a=htmlspecialchars($_GET["key"]);
		$del=$this->Model_kritik_company->delete($a);
		if($del){
			$_SESSION["flash"]="<h2>Data sudah dihapus</h2>";
			header("Location: ".BASE_URL."?a=Kritik_company/list");
		}
		else{
			echo $this->Model_kritik_company->db->show_error();
		}
	}
}
?>