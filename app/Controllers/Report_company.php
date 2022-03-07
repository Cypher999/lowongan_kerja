<?php
class Report_company extends Controller{
	private $Model_report_company;
	private $Model_company;
	private $Model_user;
	private $php_mail;
	public function __construct(){
		$this->Model_company=$this->model("Model_company");
		$this->Model_report_company=$this->model("Model_report_company");
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
		$this->view($this->path."/report_company/index",$data);
	}
	function list(){
		$key=htmlspecialchars($_GET["key"]);
		$data["report_company"]=$this->Model_report_company->read_company_single($key);
		$this->view($this->path."/report_company/index",$data);
	}
	function do_send(){
		$a["id_report_company"]=random(5);
		$a["id_user"]=$_SESSION["user_loker"];
		$a["id_company"]=htmlspecialchars($_GET["to"]);
		$a["keluhan"]=htmlspecialchars($_POST["keluhan"]);
		$a["tgl"]=date("Y-m-d");
		$send=$this->Model_report_company->create($a);
		if($send){
			$_SESSION["flash"]="<h2>Laporan sudah dikirim</h2>";
			header("Location: ".BASE_URL."?a=Company_profile&&key=".$a["id_company"]);
		}
		else{
			echo $this->Model_report_company->db->show_error();
		}
	}
	function cancel_report(){
		$a=htmlspecialchars($_GET["key"]);
		$cek=$this->Model_report_company->read_one($a);
		$del=$this->Model_report_company->delete($a);
		if($del){
			$_SESSION["flash"]="<h2>Laporan sudah dibatalkan</h2>";
			header("Location: ".BASE_URL."?a=Company_profile&&key=".$cek[0]["id_company"]);
		}
		else{
			echo $this->Model_kritik_company->db->show_error();
		}
	}

}
?>