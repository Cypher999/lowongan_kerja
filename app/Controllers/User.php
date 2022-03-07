<?php
class User extends Controller{
	private $Model_user;
	private $Model_customer_care;
	private $Model_report_company;
	private $Model_kritik_company;
	private $Model_pelamar;
	private $Model_hasil_tes;
	private $Model_interview;
	private $Model_lamaran;
	private $Model_company;
	private $Model_low_ker;
	private $Model_berkas;
	private $path;
	public function __construct(){
		$this->Model_user=$this->model("Model_user");
		$this->Model_customer_care=$this->model("Model_customer_care");
		$this->Model_report_company=$this->model("Model_report_company");
		$this->Model_kritik_company=$this->model("Model_kritik_company");
		$this->Model_berkas=$this->model("Model_berkas");
		$this->Model_pelamar=$this->model("Model_pelamar");
		$this->Model_hasil_tes=$this->model("Model_hasil_tes");
		$this->Model_interview=$this->model("Model_interview");
		$this->Model_lamaran=$this->model("Model_lamaran");
		$this->Model_company=$this->model("Model_company");
		$this->Model_low_ker=$this->model("Model_low_ker");
		if(isset($_SESSION["user_loker"])){
			$cek_tipe=$this->Model_user->read_one($_SESSION["user_loker"]);
			if($cek_tipe[0]["tipe_user"]=="A"){
				$this->path="admin";
			}
			else{
				header("Location: ?");
				exit();
			}
		}
	}
	function index(){
		$this->Model_user=$this->model("Model_user");
		$data["users"]=$this->Model_user->read_all();
		$this->view($this->path."/user_list/index",$data);
	}
	public function delete(){
		$key=htmlspecialchars($_GET["key"]);
		$cek_user=$this->Model_user->read_one($key);
		$del_custom_care=$this->Model_customer_care->delete_user($key);
		$del_report_company=$this->Model_report_company->delete_user($key);
		$del_kritik_company=$this->Model_kritik_company->delete_user($key);
		if(!$del_custom_care){
			echo $this->Model_customer_care->db->show_error();
		}
		if(!$del_report_company){
			echo $this->Model_report_company->db->show_error();
		}
		if(!$del_kritik_company){
			echo $this->Model_kritik_company->db->show_error();
		}
		if($cek_user[0]["tipe_user"]=="P"){
			$cek_berkas=$this->Model_berkas->read_berkas($key);
			if(!$cek_berkas){
				echo $this->Model_berkas->db->show_error();
			}
			else{
				foreach ($cek_berkas as $cb) {
					$cek_file="img/bks/".$cb["id_berkas"].".jpeg";
					if(file_exists($cek_file)){
						unlink($cek_file);
					}
					$del_berkas=$this->Model_berkas->del_adm($cb["id_berkas"]);
				}
			}
			$del_hasil_tes=$this->Model_hasil_tes->delete_user($key);
			if(!$del_hasil_tes){
				echo $this->Model_hasil_tes->db->show_error();
			}
			$cek_lamaran=$this->Model_lamaran->read_user($key);
			if(!$cek_lamaran){
				echo $this->Model_lamaran->db->show_error();	
			}
			else{
				$del_interview=$this->Model_lamaran->delete_lam($cek_lamaran[0]["id_lam"]);
				if($del_interview){
					echo $this->Model_lamaran->db->show_error();
				}
			}
			$del_lamaran=$this->Model_lamaran->delete_user($key);
			if(!$del_lamaran){
				echo $this->Model_lamaran->db->show_error();
			}
			$del_pelamar=$this->Model_pelamar->del_user($key);
			if(!$del_pelamar){
				echo $this->Model_pelamar->db->show_error();
			}
		}
		else if($cek_user[0]["tipe_user"]=="C"){
			$cek_user_company=$this->Model_company->read_one_user($key);
			$company_logo="img/company_logo/".$cek_user_company[0]["id_company"].".jpeg";
			$surat_izin="img/surat_izin/".$cek_user_company[0]["id_company"].".jpeg";
			if(file_exists($company_logo)){
				unlink($company_logo);
			}
			if(file_exists($surat_izin)){
				unlink($surat_izin);
			}
			$cek_low_ker=$this->Model_low_ker->read_company($cek_user_company[0]["id_company"]);
			if(!$cek_low_ker){
				echo "0 ".$cek_low_ker;
				exit();
			}
			if(count($cek_low_ker)>0){
				foreach ($cek_low_ker as $clk) {
					$cek["soal"]=$this->Model_soal->read_soal($clk["id_loker"]);
					$cek["lamaran"]=$this->Model_lamaran->read_lam_all($clk["id_loker"]);
					if(!$cek["soal"]){
						echo "1 ".$this->Model_soal->db->show_error();
						exit();
					}
					if(!$cek["lamaran"]){
						echo "2 ".$this->Model_lamaran->db->show_error();
						exit();
					}
					if(count($cek["soal"])>0){
						foreach($cek["soal"] as $isi_soal){
							$del_jaw=$this->Model_hasil_tes->del_soal($isi_soal["id_soal"]);
							if(!$del_jaw){
								echo "3 ".$this->Model_hasil_tes->db->show_error();
								exit();
							}
						}
						$delete_soal=$this->Model_soal->delete_loker($clk["id_loker"]);
						if(!$delete_soal){
							echo "4 ".$this->Model_soal->db->show_error();
							exit();
						}
					}
					if(count($cek["lamaran"])>0){
						foreach($cek["lamaran"] as $isi_lamaran){
							$del_lam=$this->Model_interview->del_lam($isi_lamaran["id_lam"]);	
							if(!$del_lam){
								echo "5 ".$this->Model_interview->db->show_error();
								exit();
							}
						}
						$delete_lamaran=$this->Model_lamaran->delete_loker($clk["id_loker"]);
						if(!$delete_lamaran){
							echo "6 ".$this->Model_lamaran->db->show_error();
							exit();
						}
					}
					$delete=$this->Model_low_ker->delete($clk["id_loker"]);
					if(!$delete){
						echo "7 ".$this->Model_low_ker->db->show_error();
						exit();
					}
				}	
			}
			
			$del_com=$this->Model_company->delete($cek_user_company[0]["id_company"]);
			if(!$del_com){
				echo $this->Model_company->db->show_error();
			}
			$del_report_company_2=$this->Model_report_company->delete_com($cek_user_company[0]["id_company"]);
			if(!$del_report_company_2){
				echo $this->Model_report_company->db->show_error();
			}
			$del_kritik_company_2=$this->Model_kritik_company->delete_com($cek_user_company[0]["id_company"]);
			if(!$del_kritik_company_2){
				echo $this->Model_kritik_company->db->show_error();
			}
		}
		$ktp="img/ktp/".$key.".png";
		$ij="img/ij/".$key.".png";
		$kk="img/kk/".$key.".png";
		$profile_logo="img/profile_logo/".$key.".png";
		if(file_exists($ktp)){
			unlink($ktp);
		}
		if(file_exists($ij)){
			unlink($ij);
		}
		if(file_exists($kk)){
			unlink($kk);
		}
		if(file_exists($profile_logo)){
			unlink($profile_logo);
		}
		$delete_user=$this->Model_user->delete($key);
		if($delete_user){
			$_SESSION["flash"]="<h2>Data sudah dihappus</h2>";
			header("Location: ".BASE_URL."?a=User");
		}
		else{
			echo $this->Model_user->db->show_error();
		}
	}
}
?>