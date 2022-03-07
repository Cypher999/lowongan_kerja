<?php
class Loker_all extends Controller{
	private $path;
	public function __construct(){
		if(isset($_SESSION["user_loker"])){
			$cek_tipe=$this->model("Model_user")->read_one($_SESSION["user_loker"]);
			if($cek_tipe[0]["tipe_user"]=="P"){
				$this->path="applyer";
			}
			else if($cek_tipe[0]["tipe_user"]=="C"){
				$this->path="company";
			}
			else if($cek_tipe[0]["tipe_user"]=="A"){
				$this->path="admin";
			}
			else{
				$this->path="no_login";	
			}
		}
	}
	public function index(){
		$data['loker']=$this->model("Model_low_ker")->read_all();
		$this->view($this->path."/loker_all/index",$data);
	}

}
?>

