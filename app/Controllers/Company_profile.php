<?php
class Company_profile extends Controller{
	private $Model_company;
	private $Model_lamaran;
	private $Model_low_ker;
	private $Model_user;
	private $Model_bidang;
	private $Model_interview;
	private $path;
	public function __construct(){
		$this->Model_company=$this->model("Model_company");
		$this->Model_lamaran=$this->model("Model_lamaran");
		$this->Model_low_ker=$this->model("Model_low_ker");
		$this->Model_bidang=$this->model("Model_bidang");
		$this->Model_user=$this->model("Model_user");
		$this->Model_interview=$this->model("Model_interview");
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
			
		}
		else{
				$this->path="no_login";	
			}
	}
	function index(){
		$id_company="";
		if($this->path=="company"){
			$data_company=$this->Model_company->read_one_user($_SESSION['user_loker']);
			if(count($data_company)>0){
				$id_company=$data_company[0]['id_company'];	
			}
		}
		else{
		$id_company=htmlspecialchars($_GET["key"]);	
		}
		$data["company"]=$this->Model_company->read_profil($id_company);
		$data["low_ker"]=$this->Model_low_ker->read_company($id_company);
		$this->Model_low_ker->db->show_error();
		$this->view($this->path."/company_profile/index",$data);
	}
	public function update(){
		$data_company=$this->Model_company->read_one_user($_SESSION['user_loker']);
		if(count($data_company)>0){
			$a["id_company"]=$data_company[0]['id_company'];
		}
		else{
			$a["id_company"]=random(10);	
		}
		$a['form-data']['no_induk']=htmlspecialchars($_POST["no_induk"]);
		$a['form-data']['nm_com']=htmlspecialchars($_POST["nm_per"]);
		$a['form-data']['list_ben']=htmlspecialchars($_POST["list_ben"]);
		$a['form-data']['kd_bid']=htmlspecialchars($_POST["bid"]);
		$a['form-data']['skill']=htmlspecialchars($_POST["skill"]);
		$a['form-data']['profil']=htmlspecialchars($_POST["profil"]);
		$a['form-data']['prov']=htmlspecialchars($_POST["prov"]);
		$a['form-data']['kab']=htmlspecialchars($_POST["kab"]);
		$a['form-data']['kec']=htmlspecialchars($_POST["kec"]);
		$a['form-data']['des']=htmlspecialchars($_POST["desa"]);
		$a['form-data']['lok']=htmlspecialchars($_POST["alt_leng"]);
		$a['form-data']['alt_map']=htmlspecialchars($_POST["alt_map"]);
		$a['form-data']['hari_kerja']=htmlspecialchars($_POST["hari_kerja"]);
		$a['form-data']['jam_kerja']=htmlspecialchars($_POST["jam_kerja"]);
		if(count($data_company)>0){
			$update=$this->Model_company->update($a);
		}
		else{
			$a["form-data"]["id_company"]=$a["id_company"];
			$a["form-data"]["status"]="0";
			$a["form-data"]["id_user"]=$_SESSION["user_loker"];
			$update=$this->Model_company->insert($a);	
		}
		if($update){
			$nama['izin']=$_FILES['file_izin']['name'];
			$nama['ktp']=$_FILES['file_ktp']['name'];
			$nama['log']=$_FILES['file_log']['name'];
			if($nama['izin']!=""){
				$tipe['izin']=explode(".", $nama['izin']);
				$tipe['izin']=$tipe['izin'][1];
				$fl['izin']=$_FILES['file_izin']['tmp_name'];
				if(($tipe['izin']=="jpeg")||($tipe['izin']=="jpg")||($tipe['izin']=="png")||($tipe['izin']=="bmp")){
					$cek_file['izin']="img/surat_izin/".$a['id_company'].".jpg";
					if(file_exists($cek_file['izin'])){
						unlink($cek_file['izin']);
					}
					move_uploaded_file($fl['izin'], $cek_file['izin']);
				}	
			}
			if($nama['ktp']!=""){
				$tipe['ktp']=explode(".", $nama['ktp']);
				$tipe['ktp']=$tipe['ktp'][1];
				$fl['ktp']=$_FILES['file_ktp']['tmp_name'];
				if(($tipe['ktp']=="jpeg")||($tipe['ktp']=="jpg")||($tipe['ktp']=="png")||($tipe['ktp']=="bmp")){
					$cek_file['ktp']="img/ktp/".$_SESSION['user_loker'].".jpg";
					if(file_exists($cek_file['ktp'])){
						unlink($cek_file['ktp']);
					}
					move_uploaded_file($fl['ktp'], $cek_file['ktp']);
				}	
			}
			if($nama['log']!=""){
				$tipe['log']=explode(".", $nama['log']);
				$tipe['log']=$tipe['log'][1];
				$fl['log']=$_FILES['file_log']['tmp_name'];
				if(($tipe['log']=="jpeg")||($tipe['log']=="jpg")||($tipe['log']=="png")||($tipe['log']=="bmp")){
					$cek_file['log']="img/company_logo/".$a['id_company'].".jpeg";
					if(file_exists($cek_file['log'])){
						unlink($cek_file['log']);
					}
					move_uploaded_file($fl['log'], $cek_file['log']);
				}	
			}
			
		}
		echo "<script>window.location.href='".BASE_URL."?a=Company_profile&&key=".$a['no_induk']."';</script>";
	}
	function company_data(){
		$id_company="";
		if($this->path=="company"){
			$data_company=$this->Model_company->read_one_user($_SESSION['user_loker']);
			$id_company=$data_company[0]['id_company'];	
			$data["company"]=$this->Model_company->read_profil($id_company);
			$data["user"]=$this->model("Model_user")->read_one($_SESSION["user_loker"]);
		}
		else{
			$id_company=htmlspecialchars($_GET["key"]);	
			$data["company"]=$this->Model_company->read_profil($id_company);
			$data["user"]=$this->model("Model_user")->read_one($data["company"][0]['id_user']);
		}
		
		$data["bidang"]=$this->Model_bidang->read_all();
		
		echo $this->Model_bidang->db->show_error();
		$data["company"][0]["nm_pem"]=$data["user"][0]["nm_lengkap"];
		$data["company"][0]["no_hp"]=$data["user"][0]["no_hp"];
		$data["company"][0]["email"]=$data["user"][0]["email"];
		$this->view($this->path."/company_profile/company_data",$data);	
	}
	
}
?>

