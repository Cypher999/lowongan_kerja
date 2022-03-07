<?php
class Company_list extends Controller{
	private $Model_company;
	private $Model_user;
	private $path;
	public function __construct(){
		$this->Model_company=$this->model("Model_company");
		$this->Model_user=$this->model("Model_user");
		$this->Model_bidang=$this->model("Model_bidang");
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
		$data["bidang"]=$this->Model_bidang->read_all();
		$this->view($this->path."/company_list/index",$data);
	}
	function load_company(){
		if(empty($_POST["bid"])){
			$data["per"]=$this->Model_company->read_all_except_dec();
		}
		else{
			$data["per"]=$this->Model_company->read_bidang(htmlspecialchars($_POST["bid"]));
		}
		$this->view($this->path."/company_list/list",$data);
	}
}
?>