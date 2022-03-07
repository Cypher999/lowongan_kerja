<?php
class Lamaran extends Controller{
	private $Model_lamaran;
	private $Model_user;
	private $Model_interview;
	private $Model_kartu_loker;
	private $php_mail;
	public function __construct(){
		$this->Model_lamaran=$this->model("Model_lamaran");
		$this->Model_user=$this->model("Model_user");
		$this->Model_interview=$this->model("Model_interview");
		$this->Model_kartu_loker=$this->model("Model_kartu_loker");
		$this->php_mail=new php_mailer();
		if(isset($_SESSION["user_loker"])){
			$status_user=$this->Model_user->read_one($_SESSION["user_loker"]);
			if(($status_user[0]["tipe_user"]!="C")and($status_user[0]["tipe_user"]!="A")){
				header("Location: ?");
				exit();
			}
		}
		else{
			header("Location: ?");
			exit();
		}
		
	}
	public function acc_lamaran(){
		$a["id_lam"]=htmlspecialchars($_GET['key']);
		$a['stat_lam']='B';
		$acc_lamaran=$this->Model_lamaran->acc_lamaran($a);
		if($acc_lamaran){
			$read_lam=$this->model("Model_lamaran")->read_one($a["id_lam"]);
			$read_user=$this->model("Model_user")->read_one($read_lam[0]["id_user"]);
			$read_lowker=$this->model("Model_low_ker")->read_one($read_lam[0]["id_loker"]);
			$read_company=$this->model("Model_company")->read_one($read_lowker[0]["id_company"]);
			$email_param["to"]=$read_user[0]["email"];
			$email_param["subject"]="Informasi Penerimaan Kerja";
			$email_param["content"]="Saudara/i <b>".$read_user[0]["nm_lengkap"]."</b>, lamaran anda pada perusahaan <b>".$read_company[0]["nm_com"]."</b> bagian <b>".$read_lowker[0]["nm_job"]."</b> Telah di ACC. Untuk informasi lebih lanjut anda bisa login ke akun anda dan pilih opsi pekerjaan -> lihat lamaran saya.<br><br>

				Terimakasih atas perhatiannya";
				
			$this->php_mail->set_param($email_param)->do_send();
			$_SESSION["flash"]="<h2>Lamaran sudah di ACC</h2>";
			$new_kartu["id_kartu"]=random(5);
			$new_kartu["id_lam"]=$_GET["key"];
			$insert_kartu=$this->Model_kartu_loker->insert($new_kartu);
			if(!$insert_kartu){
				echo $this->Model_kartu_loker->db->show_error();
				exit();
			}
			header("Location: ?");
		}
	}
	public function dec_lamaran(){
		$a["id_lam"]=htmlspecialchars($_GET['key']);
		$a['stat_lam']='D';
		$acc_lamaran=$this->Model_lamaran->acc_lamaran($a);
		if($acc_lamaran){
			$read_lam=$this->model("Model_lamaran")->read_one($a["id_lam"]);
			$read_user=$this->model("Model_user")->read_one($read_lam[0]["id_user"]);
			$read_lowker=$this->model("Model_low_ker")->read_one($read_lam[0]["id_loker"]);
			$read_company=$this->model("Model_company")->read_one($read_lowker[0]["id_company"]);
			$email_param["to"]=$read_user[0]["email"];
			$email_param["subject"]="Informasi Penerimaan Kerja";
			$email_param["content"]="Mohon maaf, Saudara/i <b>".$read_user[0]["nm_lengkap"]."</b>, berdasarkan pertimbangan yang matang oleh pihak perusahaan, lamaran anda pada perusahaan <b>".$read_company[0]["nm_com"]."</b> bagian <b>".$read_lowker[0]["nm_job"]."</b>, telah ditolak oleh instansi terkait. Namun jangan putus asa, di the r@tJob, kami mempunyai banyak lowongan pekerjaan yang sesuai dengan minat anda, dan pasti ada perusahaan yang membutuhkan orang-orang seperti anda, tetap semangat.<br><br>

				Terimakasih atas perhatiannya";
				
			$this->php_mail->set_param($email_param)->do_send();
			$_SESSION["flash"]="<h2>Lamaran sudah di ACC</h2>";
			header("Location: ?");
		}
	}
	public function informasi_lamaran(){
		$this->view("company/lamaran/info");
	}
	public function submit_info(){
		$a["id_interview"]=random(6);
		$a["id_lam"]=htmlspecialchars($_GET['key']);
		$a["tgl_online"]=htmlspecialchars($_POST["tgl_online"])." ".$_POST['jam_online'].":".$_POST['menit_online'];
		$a["tgl_offline"]=htmlspecialchars($_POST["tgl_offline"])." ".$_POST['jam_offline'].":".$_POST['menit_offline'];
		$a["link_zoom"]=htmlspecialchars($_POST["zoom"]);
		$kirim_informasi=$this->Model_interview->insert($a);
		if($kirim_informasi){

			$read_lam=$this->model("Model_lamaran")->read_one($a["id_lam"]);
			$read_user=$this->model("Model_user")->read_one($read_lam[0]["id_user"]);
			$read_lowker=$this->model("Model_low_ker")->read_one($read_lam[0]["id_loker"]);
			$read_company=$this->model("Model_company")->read_one($read_lowker[0]["id_company"]);
			$email_param["to"]=$read_user[0]["email"];
			$email_param["subject"]="Informasi Penerimaan Kerja";
			$email_param["content"]="Saudara/i <b>".$read_user[0]["nm_lengkap"]."</b>, lamaran anda pada perusahaan <b>".$read_company[0]["nm_com"]."</b> bagian <b>".$read_lowker[0]["nm_job"]."</b> Telah di tindak lanjuti. dan berikut pihak perusahaan telah memberikan jadwal interview untuk anda.<br>
			<table>
			<tr><td>jadwal online (via link zoom)</td><td>:</td>".$a["tgl_online"] ." WIB<td></tr>
				 <tr><td>link zoom </td><td>:</td>".$a["link_zoom"] ."<td></tr>
				 <tr><td>jadwal offline(datang langsung ke perusahaan) </td><td>:</td>".$a["tgl_offline"]." WIB<td></tr>
				 </table><br>
			Untuk informasi lebih lanjut anda bisa login ke akun anda dan pilih opsi pekerjaan -> lihat lamaran saya.

				Terimakasih atas perhatiannya";
				
			$this->php_mail->set_param($email_param)->do_send();
			$_SESSION["flash"]="<h2>Informasi Lamaran Sudah dikirim</h2>";
			header("Location: ?");
		}
		else{
			echo $this->Model_interview->db->show_error();
		}
	}
	public function index(){
		$id_user=htmlspecialchars($_GET['key']);
		$data["profil"]=$this->Model_pelamar->read_user($id_user);
		$data["user"]=$this->Model_user->read_one($id_user);
		$data["profil"][0]["email"]=$data["user"][0]["email"];
		$data["profil"][0]["nm_lengkap"]=$data["user"][0]["nm_lengkap"];
		$data["profil"][0]["no_hp"]=$data["user"][0]["no_hp"];
		$this->view("company/applyer_profile/index",$data);
	}
}
?>