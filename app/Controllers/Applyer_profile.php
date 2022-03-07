<?php
class Applyer_profile extends Controller{
	private $Model_pelamar;
	private $Model_user;
	private $path;
	public function __construct(){
		$this->Model_pelamar=$this->model("Model_pelamar");
		$this->Model_user=$this->model("Model_user");
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
			else{
				$this->path="no_login";	
			}
		}
		else{
			header("Location :".BASE_URL);
		}
	}
	public function index(){
		$id_user=htmlspecialchars($_GET['key']);
		$data["profil"]=$this->Model_pelamar->read_user($id_user);
		$data["user"]=$this->Model_user->read_one($id_user);
		$data["profil"][0]["email"]=$data["user"][0]["email"];
		$data["profil"][0]["nm_lengkap"]=$data["user"][0]["nm_lengkap"];
		$data["profil"][0]["no_hp"]=$data["user"][0]["no_hp"];
		$this->view($this->path."/applyer_profile/index",$data);
	}
}
?>