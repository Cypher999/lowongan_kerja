<?php
class Recover extends Controller{
	private $Model_user;
	private $Model_recover_password;
	private $tipe_user;
	private $php_mail;
	public function __construct(){
		$this->Model_user=$this->model("Model_user");
		$this->Model_recover_password=$this->model("Model_recover_password");
		$this->php_mail=new php_mailer();
	}
	public function do_recover(){
		$cek_recover=$this->Model_recover_password->read_one($_GET["rec_key"]);
		if(count($cek_recover)>0){
			$_SESSION["recover_key"]=$cek_recover[0]["id_user"];
			$this->view("no_login/recover/index");
			$del_recover=$this->Model_recover_password->delete($_GET["rec_key"]);
		}	
		else{
			echo "Link Pemulihan tidak ditemukan<br>";
			echo "<a href='".BASE_URL."'>Kembali</a>";
		}	
	}
	public function recover_pass(){
		$a['br']=md5($_POST["br"]);
		$a['kf']=md5($_POST["kf"]);
		$a['id_user']=$_SESSION["recover_key"];
		if($a["br"]==$a["kf"]){
			$change_password=$this->Model_user->update_pass($a);
			unset($_SESSION["recover_key"]);
			$cek_user=$this->Model_user->read_one($a["id_user"]);
			echo "<h2>Password sudah dipulihkan, silahkan login kembali</h2><br>";
			echo "<a href='".BASE_URL."?a=Home/login'>Kembali ke login</a>";
			$email_param["to"]=$cek_user[0]["email"];
			$email_param["subject"]="Konfirmasi Aktivitas Anda";
			$email_param["content"]="<b>INFO</b> <BR> Pada tanggal ".date('Y/m/d')." anda telah melakukan pemulihan password, abaikan pesan ini jika itu benar benar anda, namun jika anda merasa ada kesalahan, silahkan hubungi admin dengan cara membalas pesan ini<br> Terimakasih atas perhatiannya";
			$this->php_mail->set_param($email_param)->do_send();

		}
		else{
			$_SESSION["flash"]="<h2>Password konfirmasi tidak sama</h2>";
			header("Location: ".BASE_URL."?a=Recover/recover_pass");		
		}
		
	}
	public function forgot_process(){
		$read_keamanan=$this->Model_user->read_username($_SESSION['name']);
		$data["jaw_1"]=htmlspecialchars($_POST["jaw_1"]);
		$data["jaw_2"]=htmlspecialchars($_POST["jaw_2"]);
		if(($data["jaw_1"]==$read_keamanan[0]["jaw_1"])&&($data["jaw_2"]==$read_keamanan[0]["jaw_2"])){
			$for_pro["id_rec"]=random(25);
			$for_pro["id_user"]=$read_keamanan[0]["id_user"];
			$for_pro["tgl"]=date('Y-m-d h:i:s');
			$new_pro=$this->Model_recover_password->insert($for_pro);
			if($new_pro){
				$email_param["to"]=$read_keamanan[0]["email"];
				$email_param["subject"]="Konfirmasi Lupa Password";
				$email_param["content"]="<b>RAHASIA</b> berikut adalah link untuk pemulihan password anda, jika anda merasa tidak memilih opsi lupa password maka ABAIKAN link ini dan hubungi admin ".BASE_URL."?a=Recover/do_recover&&rec_key=".$for_pro["id_rec"];
				$this->php_mail->set_param($email_param)->do_send();
				echo "Link pemulihan password sudah dikirimkan ke email anda <a href='".BASE_URL."'></a>";
			}
			else{
				echo $this->Model_recover_password->db->show_error();
			}
		}
		else{
			echo $this->Model_user->db->show_error();
			echo "Pertanyaan keamanan salah <a href='".BASE_URL."'>Kembali</a>";
		}
	}
	
}
?>
