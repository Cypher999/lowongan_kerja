<?php
class Customer_care extends Controller{
	private $Model_customer_care;
	private $Model_perusahaan;
	private $Model_user;
	private $path;
	private $php_mail;
	public function __construct(){
		$this->Model_customer_care=$this->model("Model_customer_care");
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
	public function index(){
		if($this->path!="admin"){
			$this->view($this->path."/customer_care/index");
		}
		else{
			$data["customer_care"]=$this->Model_customer_care->read_all();
			$this->view($this->path."/customer_care/index",$data);	
		}
	}
	public function reply(){
		$key=htmlspecialchars($_GET["key"]);
		$key=$this->Model_customer_care->db->escape_str($key);
		$data["customer_care"]=$this->Model_customer_care->read_one($key);
		echo $this->Model_customer_care->db->show_error();
		$this->view($this->path."/customer_care/reply",$data);
	}
	public function send_reply(){
		$key=htmlspecialchars($_GET["key"]);
		$key=$this->Model_customer_care->db->escape_str($key);
		$data["customer_care"]=$this->Model_customer_care->read_one($key);
		$wkt=date_create($data["customer_care"][0]["tgl"]);
		$tgl=date_format($wkt,"d");
		$bln=date_format($wkt,"M");
		$thn=date_format($wkt,"Y");
		$a["to"]=$data["customer_care"][0]["email"];
		$a["subject"]="Balasan atas pesan";
		$a["content"]="Salam, berikut adalah umpan balik dari kami perihal pesan yang anda kirim pada ".$tgl." ".$bln." ".$thn.". ".htmlspecialchars($_POST["balasan"]);
		print_r($a);
		$this->php_mail->set_param($a);
		$this->php_mail->do_send();
		echo "Email sudah dikirim <a href='".BASE_URL."?a=Customer_care'>Kembali</a>";
	}
	public function del(){
		$key=htmlspecialchars($_GET["key"]);
		$key=$this->Model_customer_care->db->escape_str($key);
		$delete=$this->Model_customer_care->delete($key);
		if ($delete){
			$_SESSION["flash"]="Data Sudah Dihapus";
			header("Location: ".BASE_URL."?a=Customer_care");
		}
		else{
			echo $this->Model_customer_care->db->show_error();
		}
	}
	public function do_send(){
		$a["id_custom"]=random(5);
		if(isset($_SESSION["user_loker"])){
			$a["id_user"]=$_SESSION["user_loker"];
		}
		else{
			$a["id_user"]="";
		}
		$a["isi"]=htmlspecialchars($_POST["isi"]);
		$a["tgl"]=date("Y-m-d h:i:s");
		$save=$this->Model_customer_care->create($a);
		if($save){
			$_SESSION["flash"]="<h2>Terimakasih atas masukkan anda</h2>";
			header("Location: ".BASE_URL);
		}
		else{
			echo $this->Model_customer_care->db->show_error();
		}
	}
}
?>