<?php
class Company extends Controller{
	private $Model_company;
	public $Model_report_company;
	private $Model_lamaran;
	private $Model_low_ker;
	private $Model_user;
	private $Model_bidang;
	private $Model_interview;
	private $Model_hasil_tes;
	private $Model_kartu_loker;
	private $path;

	private $php_mail;
	public function __construct(){
		$this->Model_company=$this->model("Model_company");
		$this->Model_report_company=$this->model("Model_report_company");
		$this->Model_lamaran=$this->model("Model_lamaran");
		$this->Model_low_ker=$this->model("Model_low_ker");
		$this->Model_bidang=$this->model("Model_bidang");
		$this->Model_user=$this->model("Model_user");
		$this->Model_interview=$this->model("Model_interview");
		$this->Model_hasil_tes=$this->model("Model_hasil_tes");
		$this->Model_kartu=$this->model("Model_kartu_loker");
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
			else{
				$this->path="no_login";	
			}
		}
	}
	function index(){
		$data["per"]=$this->Model_company->read_all();
		$this->view($this->path."/company/index",$data);
	}
	public function delete_com(){
		if($this->path=="admin"){
			$key=htmlspecialchars($_GET['key']);
		}
		else if($this->path=="company"){
			$cek_comp=$this->Model_company->read_one_user($_SESSION["user_loker"]);
			$key=$cek_comp[0]["id_company"];
		}
		$company_logo="img/company_logo/".$key.".jpeg";
		$surat_izin="img/surat_izin/".$key.".jpeg";
		if(file_exists($company_logo)){
			unlink($company_logo);
		}
		if(file_exists($surat_izin)){
			unlink($surat_izin);
		}
		$cek_low_ker=$this->Model_low_ker->read_company($key);
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
						$del_kartu=$this->Model_kartu_loker->del_lam($isi_lamaran["id_lam"]);	
						if(!$del_lam){
							echo "5 ".$this->Model_interview->db->show_error();
							exit();
						}
						if(!$del_kartu){
							echo "8 ".$this->Model_kartu_loker->db->show_error();
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
		
		$del_com=$this->Model_company->delete($key);
		if($del_com){
			$_SESSION['flash']='<h2>Perusahaan sudah dihapus</h2>';
			header("Location: ".BASE_URL."?a=Company");
		}
		else{
			echo $this->Model_company->db->show_error();
		}
	}

	public function acc_com(){
		$id_company=htmlspecialchars($_GET['key']);
		$acc_com=$this->Model_company->acc_com($id_company);
		if($acc_com){
			$read_company=$this->Model("Model_company")->read_one($id_company);
			$cek_user=$this->Model("Model_user")->read_one($read_company[0]["id_user"]);
			$email_conf["to"]=$cek_user[0]["email"];
			$email_conf["subject"]="Informasi Status Perusahaan";
			$email_conf["content"]="Salam, disini pihak the r@tJob ingin menyampaikan kepada anda bahwa perusahaan anda, <b>".$read_company[0]["nm_com"]."</b> Telah dinyatakan layak untuk di ACC oleh pihak the r@tJob, untuk selanjutnya anda bisa mengelola perusahaan anda saat anda login dan lamaran lamaran yang anda tambahkan akan bisa dilihat oleh para pelamar<br><br>
			tertanda<br>
			pihak admin the r@tJob";
			$this->php_mail->set_param($email_conf)->do_send();
			$_SESSION['flash']='<h2>Perusahaan sudah di acc</h2>';
			echo "<script>window.location.href='".BASE_URL."?a=Company';</script>";
		}
		else{
			echo $this->Model_company->db->show_error();
		}
	}
	public function dec_com(){
		$data["id_company"]=htmlspecialchars($_GET['key']);
		$data["form-data"]["ket_reject"]=htmlspecialchars($_POST["ket_reject"]);
		$data["form-data"]["status"]="X";
		$dec_com=$this->Model_company->update($data);
		if($dec_com){
			$read_company=$this->Model("Model_company")->read_one($data["id_company"]);
			$cek_user=$this->Model("Model_user")->read_one($read_company[0]["id_user"]);
			$email_conf["to"]=$cek_user[0]["email"];
			$email_conf["subject"]="Informasi Status Perusahaan";
			$email_conf["content"]="Salam, disini pihak the r@tJob ingin menyampaikan kepada anda bahwa perusahaan anda, <b>".$read_company[0]["nm_com"]."</b> Ditolak oleh admin the r@tJob dengan alasan <b>".$data["form-data"]["ket_reject"]."</b>, jika anda merasa ada kesalahan atau keluhan, silahkan menghubungi admin<br><br>
			tertanda<br>
			pihak admin the r@tJob";
			$this->php_mail->set_param($email_conf)->do_send();
			$_SESSION['flash']='<h2>Perusahaan sudah di tolak</h2>';
			echo "<script>window.location.href='".BASE_URL."?a=Company';</script>";
		}
		else{
			echo $this->Model_company->db->show_error();
		}
	}
}
?>