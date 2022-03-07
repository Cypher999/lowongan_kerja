<?php
class Detail_loker extends Controller{
	private $Model_company;
	private $Model_low_ker;
	private $Model_lamaran;
	private $Model_berkas;
	private $Model_interview;
	private $Model_user;
	private $Model_kartu_loker;
	private $path;
	private $php_mail;
	public function __construct(){
		$this->Model_company=$this->model("Model_company");
		$this->Model_lamaran=$this->model("Model_lamaran");
		$this->Model_low_ker=$this->model("Model_low_ker");
		$this->Model_berkas=$this->model("Model_berkas");
		$this->Model_interview=$this->model("Model_interview");
		$this->Model_user=$this->model("Model_user");
		$this->Model_kartu_loker=$this->model("Model_kartu_loker");
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
		$id_loker=htmlspecialchars($_GET["key"]);
		$data["detail"]=$this->Model_low_ker->read_one($id_loker);
		if(isset($_SESSION["user_loker"])){
		$data["cek_lamaran"]=$this->Model_lamaran->cek_lam($data["detail"][0]["id_loker"]);
		if($data["cek_lamaran"]>0){
			$data["lam_ind"]=$this->Model_lamaran->read_lam_ind($data["detail"][0]["id_loker"]);
		}
		}
		$data["loker_lain"]=$this->Model_low_ker->read_company($data["detail"][0]["id_company"],$id_loker);
		$this->view($this->path."/detail_loker/index",$data);
	}
	function list(){
		$data["lamaran"]=$this->Model_lamaran->read_all_user();
		$i=0;
		for($i=0;$i<count($data["lamaran"]);$i++){
			$lihat_loker=$this->Model_low_ker->read_one($data["lamaran"][$i]['id_loker']);
			$lihat_per=$this->Model_company->read_one($lihat_loker[0]['id_company']);
			$data["lamaran"][$i]["nm_com"]=$lihat_per[0]["nm_com"];
		}
		$this->view($this->path."/detail_loker/list",$data);	
	}
	function cetak_kartu(){
		$key=htmlspecialchars($_GET["key"]);
		$data["kartu"]=$this->Model_lamaran->print_card($key);
		$cek_kartu=$this->Model_kartu_loker->cek_lam($key);
		if($cek_kartu>0){
			$this->view($this->path."/detail_loker/kartu",$data);	
		}
	}
	function stat_lam(){
		$id_lam=htmlspecialchars($_GET["key"]);
		$data["detail"]=$this->Model_lamaran->stat_lam($id_lam);
		$cek_jadwal=$this->Model_interview->cek_jadwal($data["detail"][0]["id_lam"]);
		$data["detail"][0]["cek_jadwal"]=$cek_jadwal;
		$data["loker_lain"]=$this->Model_low_ker->read_company($data["detail"][0]["id_company"],$data["detail"][0]["id_loker"]);

		if($cek_jadwal>0){
			$read_jadwal=$this->Model_interview->read_id_lam($id_lam);
			$data["detail"][0]["tgl_online"]=$read_jadwal[0]["tgl_online"];
			$data["detail"][0]["tgl_offline"]=$read_jadwal[0]["tgl_offline"];
			$data["detail"][0]["link_zoom"]=$read_jadwal[0]["link_zoom"];
		}


		$this->view($this->path."/detail_loker/stat_lam",$data);
	}

	function daftar_pelamar(){
		$id_loker=htmlspecialchars($_GET["key"]);
		$data["low_ker"]=$this->Model_lamaran->read_daftar_pelamar($id_loker);
		$data['read_one']=$this->Model_low_ker->read_one($id_loker);
		$this->view($this->path."/detail_loker/daftar_pelamar",$data);
	}
	function lihat_berkas(){
		$id_user=htmlspecialchars($_GET['key']);
		$cek_user=$this->Model_user->read_one($id_user);
		$data["nama_user"]=$cek_user[0]["nm_lengkap"];
		$data["berkas"]=$this->Model_berkas->read_berkas($id_user);
		$this->view($this->path."/berkas/index",$data);	
	}
	function insert(){
		$a["id_lam"]=random(5);
		$a['id_user']=$_SESSION['user_loker'];
		$a["id_loker"]=htmlspecialchars($_GET["key"]);
		$a["tgl_lam"]=date("Y/m/d h:i:s");
		$a['stat_lam']="X";
		$cek=$this->Model_lamaran->cek_lam($a["id_loker"]);
		
		if($cek<=0){
			$insert=$this->Model_lamaran->insert($a);
			if($insert){
				$cek_loker=$this->Model("Model_low_ker")->read_one($a["id_loker"]);
				$cek_company=$this->Model("Model_company")->read_one($cek_loker[0]["id_company"]);
				$cek_user=$this->Model("Model_user")->read_one($cek_company[0]["id_user"]);
				$cek_nama_pelamar=$this->Model("Model_user")->read_one($a["id_user"]);
				$m["to"]=$cek_user[0]["email"];
				$m["subject"]="Notifikasi Lamaran Masuk";
				$m["content"]="Salam, tuan/nyonya <b>".$cek_user[0]["nm_lengkap"]."</b>, kami ingin menyampaikan
				bahwa saudara/i <b>".$cek_nama_pelamar[0]["nm_lengkap"]."</b> Telah mengirimkan lamaran pekerjaan di perusahaan anda pada bagian <b>".$cek_loker[0]["nm_job"]."</b>, kami harap anda akan secepatnya meninjau lamaran tersebut<br>
				terimakasih atas perhatiannya";
				$this->php_mail->set_param($m)->do_send();
				header("Location: ".BASE_URL."?a=Detail_loker/stat_lam&&key=".$a["id_lam"]);
			}	
			else{
				echo  $this->Model_lamaran->db->show_error();
				echo "aaww";
			}
		}
		else{
			$_SESSION["flash"]="<h2>Lamaran Sudah Ada</h2>";
			header("Location: ".BASE_URL."?");
			echo "aaww2";
		}
		
		
	}
	public function cek_kartu(){
		$key=htmlspecialchars($_GET["key"]);
		$a["cek_kartu"]=$this->Model_kartu_loker->cek_kartu($key);
		if(count($a["cek_kartu"])>0){
			$this->view("cek_identitas",$a);
		}
		else{
			echo "lamaran tidak teridentifikasi";
		}
	}
	public function delete(){
		$key=htmlspecialchars($_GET["key"]);
		$delete=$this->model("Model_lamaran")->delete_lam($key);
		if($delete){
			$_SESSION["flash"]="<h2>Lamaran Sudah Dihapus</h2>";
			header("Location: ".BASE_URL."?a=Detail_loker/list");
		}
		else{
			echo "lamaran tidak teridentifikasi";
		}
	}
}
?>