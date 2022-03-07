<?php
class My_profile extends Controller{
	private $Model_pelamar;
	private $Model_user;
	private $php_mail;
	private $path;
	public function __construct(){
		$this->Model_pelamar=$this->model("Model_pelamar");
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
			else{
				$this->path="no_login";	
			}
		}
	}
	public function ubah_nm(){
		$data["lama"]=$this->Model_user->read_one($_SESSION["user_loker"]);
		$this->view($this->path."/my_profile/ubah_nm",$data);
	}
	public function ubah_pertanyaan_keamanan(){
		$data["security"]=$this->Model_user->read_one($_SESSION["user_loker"]);
		@$this->view($this->path."/my_profile/ubah_pertanyaan_keamanan",$data);
	}
	public function ubah_ps(){
		$this->view($this->path."/my_profile/ubah_ps");
	}
	public function update_security(){
		$a['form-data']['per_1']=htmlspecialchars($_POST["per_1"]);
		$a['form-data']['per_2']=htmlspecialchars($_POST["per_2"]);
		$a['form-data']['jaw_1']=htmlspecialchars($_POST["jaw_1"]);
		$a['form-data']['jaw_2']=htmlspecialchars($_POST["jaw_2"]);
		$a['id_user']=$_SESSION["user_loker"];
		$update_security=$this->Model_user->update_security($a);
		if($update_security){
			$_SESSION["flash"]="<h2>Pertanyaan sudah dirubah</h2>";
			header("Location: ".BASE_URL."?a=My_profile/ubah_pertanyaan_keamanan");
		}
		else{	
			$_SESSION["flash"]="<h2>Terjadi Kesalahan</h2>";
			header("Location: ".BASE_URL."?a=My_profile/ubah_pertanyaan_keamanan");
		}
	}
	public function change_password(){
		$a['lm']=md5($_POST["lm"]);
		$a['br']=md5($_POST["br"]);
		$a['kf']=md5($_POST["kf"]);
		$a['id_user']=$_SESSION["user_loker"];
		$ps_lm=$this->Model_user->read_one($_SESSION["user_loker"]);
		if($ps_lm[0]["password"]==$a["lm"]){
			if($a["br"]==$a["kf"]){
				$change_password=$this->Model_user->update_pass($a);
				$_SESSION["flash"]="<h2>Password sudah dirubah</h2>";
				header("Location: ".BASE_URL."?a=My_profile/ubah_ps");	
			}
			else{
				$_SESSION["flash"]="<h2>Password konfirmasi tidak sama</h2>";
				header("Location: ".BASE_URL."?a=My_profile/ubah_ps");		
			}
		}
		else{	
			$_SESSION["flash"]="<h2>Password lama tidak sama</h2>";
			header("Location: ".BASE_URL."?a=My_profile/ubah_ps");
		}
	}
	public function change_hp(){
		$a['no_hp']=htmlspecialchars($_POST["no"]);
		$a['id_user']=$_SESSION["user_loker"];
		$nm_lm=$this->Model_user->read_one($_SESSION["user_loker"]);
		$cek=$this->Model_user->cek_hp($a);
		if(($cek>0)&&($nm_lm[0]["no_hp"]!=$a['no_hp'])){
			$_SESSION["flash"]="<h2>Nomor Kontak sudah ada</h2>";
			header("Location: ".BASE_URL."?a=My_profile/ubah_nm");
		}
		else{
			$change_name=$this->Model_user->update_hp($a);
			$_SESSION["flash"]="<h2>Nomor Kontal sudah dirubah</h2>";
			header("Location: ".BASE_URL."?a=My_profile/ubah_nm");
		}
	}
	public function change_name(){
		$a['br']=htmlspecialchars($_POST["nm"]);
		$a['id_user']=$_SESSION["user_loker"];
		
		$change_name=$this->Model_user->update_nm($a);
		$_SESSION["flash"]="<h2>Nama sudah dirubah</h2>";
		header("Location: ".BASE_URL."?a=My_profile/ubah_nm");
		
	}
	public function change_email(){
		$a['f']['email']=htmlspecialchars($_POST["email"]);
		$a['f']['kd_ver']=random(50);
		$a['f']['verified']='0';
		$a['id_user']=$_SESSION["user_loker"];
		$nm_lm=$this->Model_user->read_one($_SESSION["user_loker"]);
		$cek=$this->Model_user->cek_email($a);
		if(($cek>0)&&($nm_lm[0]["email"]!=$a['email'])){
			$_SESSION["flash"]="<h2>Email sudah ada</h2>";
			header("Location: ".BASE_URL."?a=My_profile/ubah_nm");
		}
		else{
			$change_email=$this->Model_user->update($a);
			echo "Untuk Alasan keamanan, akun yang kami nonaktifkan, kami sudah mengirim email verifikasi ke alamat email anda yang baru<br><a href='".BASE_URL."'>Kembali</a>";
			$email_param["to"]=$a['f']['email'];
				$email_param["subject"]="Verifikasi Email Anda";
				$email_param["content"]="Untuk Alasan keamanan, akun yang mengalami perubahan email akan dinonaktifkan kembali<br> namun kami sudah menyediakan link verifikasi ke email anda, klik link tersebut untuk memastikan bahwa anda benar benar melakukan perubahan email, dan akun anda akan aktif kembali<br> ".BASE_URL."Ver?ver_key=".$a['f']['kd_ver'];
				$this->php_mail->set_param($email_param)->do_send();
		}
	}
	public function index(){
		if($this->path!="admin"){
			$data["profil"]=$this->model("Model_pelamar")->read_user($_SESSION["user_loker"]);
			$data["user"]=$this->model("Model_user")->read_one($_SESSION["user_loker"]);
		}
		else if($this->path=="admin"){
			$data["profil"]=$this->model("Model_pelamar")->read_user($_GET['key']);
			$data["user"]=$this->model("Model_user")->read_one($_GET['key']);	
		}
		if(count($data["profil"])>0){
			$data["profil"][0]["email"]=$data["user"][0]["email"];
			$data["profil"][0]["nm_lengkap"]=$data["user"][0]["nm_lengkap"];
			$data["profil"][0]["no_hp"]=$data["user"][0]["no_hp"];
		}
		$this->view($this->path."/my_profile/index",$data);
	}
	public function change_photo(){
		$fl["DP"]["nama"]=$_FILES["ch_pt"]["name"];
		$fl["DP"]["tipe"]=explode(".", $_FILES["ch_pt"]["name"]);
		$fl["DP"]["tipe"]=$fl["DP"]["tipe"][1];
		$fl["DP"]["uk"]=$_FILES["ch_pt"]["size"];
		$fl["DP"]["fl"]=$_FILES["ch_pt"]["tmp_name"];
		$cek_file="img/profile_logo/".$_SESSION['user_loker'].".png";
		if($fl["DP"]["nama"]!=""){
			if(file_exists($cek_file)){
				unlink($cek_file);
			}
			if(($fl["DP"]["tipe"]=="jpg")||($fl["DP"]["tipe"]=="png")||($fl["DP"]["tipe"]=="bmp")||($fl["DP"]["tipe"]=="jpeg")||($fl["DP"]["tipe"]=="PNG")||($fl["DP"]["tipe"]=="BMP")||($fl["DP"]["tipe"]=="JPEG")){
				move_uploaded_file($fl["DP"]["fl"], "img/profile_logo/".$_SESSION['user_loker'].".png");
				$_SESSION["flash"]="<h2>Foto berhasil Diunggah</h2>";
			}
		}
		header("Location: ".BASE_URL."?a=My_profile");
	}
	public function edit(){
		$data["profil"]=$this->Model_pelamar->read_user($_SESSION["user_loker"]);
		$data["user"]=$this->Model_user->read_one($_SESSION["user_loker"]);
		$data["profil"][0]["email"]=$data["user"][0]["email"];
		$data["profil"][0]["nm_lengkap"]=$data["user"][0]["nm_lengkap"];
		$data["profil"][0]["no_hp"]=$data["user"][0]["no_hp"];
		$this->view("applyer/my_profile/edit",$data);	
	}
	public function update(){
		$a["ktp"]=htmlspecialchars($_POST["ktp"]);
		$a["id_user"]=$_SESSION["user_loker"];
		$a['form_data']["alt_leng"]=htmlspecialchars($_POST["alt_leng"]);
		$a['form_data']["prov"]=htmlspecialchars($_POST["prov"]);
		$a['form_data']["kab"]=htmlspecialchars($_POST["kab"]);
		$a['form_data']["kec"]=htmlspecialchars($_POST["kec"]);
		$a['form_data']["desa"]=htmlspecialchars($_POST["desa"]);
		$a['form_data']["pend_ter"]=htmlspecialchars($_POST["pend_ter"]);
		$a['form_data']["skill"]=htmlspecialchars($_POST["skill"]);
		$a['form_data']["exp"]=htmlspecialchars($_POST["exp"])."[split]".htmlspecialchars($_POST["exp_time"])."[split]".htmlspecialchars($_POST["bidang"]);
		$update=$this->Model_pelamar->update($a);
		if($update){
			$fl["ijazah"]["nama"]=$_FILES["file_ijazah"]["name"];
			$fl["ijazah"]["tipe"]=explode(".", $_FILES["file_ijazah"]["name"]);
			$fl["ijazah"]["tipe"]=$fl["ijazah"]["tipe"][1];
			$fl["ijazah"]["uk"]=$_FILES["file_ijazah"]["size"];
			$fl["ijazah"]["fl"]=$_FILES["file_ijazah"]["tmp_name"];

			$fl["ktp"]["nama"]=$_FILES["file_ktp"]["name"];
			$fl["ktp"]["tipe"]=explode(".", $_FILES["file_ktp"]["name"]);
			$fl["ktp"]["tipe"]=$fl["ktp"]["tipe"][1];
			$fl["ktp"]["uk"]=$_FILES["file_ktp"]["size"];
			$fl["ktp"]["fl"]=$_FILES["file_ktp"]["tmp_name"];

			$fl["kk"]["nama"]=$_FILES["file_kk"]["name"];
			$fl["kk"]["tipe"]=explode(".", $_FILES["file_kk"]["name"]);
			$fl["kk"]["tipe"]=$fl["kk"]["tipe"][1];
			$fl["kk"]["uk"]=$_FILES["file_kk"]["size"];
			$fl["kk"]["fl"]=$_FILES["file_kk"]["tmp_name"];

			$cek["ijazah"]="img/ij/".$_SESSION['user_loker'].".png";
			$cek["ktp"]="img/ktp/".$_SESSION['user_loker'].".png";
			$cek["kk"]="img/kk/".$_SESSION['user_loker'].".png";

			if($fl["ijazah"]["nama"]!=""){
				if(($fl["ijazah"]["tipe"]=="jpg")||($fl["ijazah"]["tipe"]=="jpeg")||($fl["ijazah"]["tipe"]=="png")||($fl["ijazah"]["tipe"]=="bmp")||($fl["ijazah"]["tipe"]=="JPG")||($fl["ijazah"]["tipe"]=="JPEG")||($fl["ijazah"]["tipe"]=="PNG")||($fl["ijazah"]["tipe"]=="BMP")){
					if(file_exists($cek["ijazah"])){
						unlink($cek["ijazah"]);
					}
					move_uploaded_file($fl["ijazah"]["fl"], "img/ij/".$_SESSION['user_loker'].".png");
				}
			}

			if($fl["ktp"]["nama"]!=""){
				if(($fl["ktp"]["tipe"]=="jpg")||($fl["ktp"]["tipe"]=="jpeg")||($fl["ktp"]["tipe"]=="png")||($fl["ktp"]["tipe"]=="bmp")||($fl["ktp"]["tipe"]=="JPG")||($fl["ktp"]["tipe"]=="JPEG")||($fl["ktp"]["tipe"]=="PNG")||($fl["ktp"]["tipe"]=="BMP")){
					if(file_exists($cek["ktp"])){
						unlink($cek["ktp"]);
					}
					move_uploaded_file($fl["ktp"]["fl"], "img/ktp/".$_SESSION['user_loker'].".png");
				}
			}

			if($fl["kk"]["nama"]!=""){
				if(($fl["kk"]["tipe"]=="jpg")||($fl["kk"]["tipe"]=="jpeg")||($fl["kk"]["tipe"]=="png")||($fl["kk"]["tipe"]=="bmp")||($fl["kk"]["tipe"]=="JPG")||($fl["kk"]["tipe"]=="JPEG")||($fl["kk"]["tipe"]=="PNG")||($fl["kk"]["tipe"]=="BMP")){
					if(file_exists($cek["kk"])){
						unlink($cek["kk"]);
					}
					move_uploaded_file($fl["kk"]["fl"], "img/kk/".$_SESSION['user_loker'].".png");
					
				}
			}
			$_SESSION["flash"]="<h2>Data berhasil diupdate</h2>";
			header("Location: ".BASE_URL."?a=My_profile");
		}
		else{
			$_SESSION["flash"]=$this->Model_pelamar->db->show_error();
			header("Location: ".BASE_URL."?a=My_profile");	
		}
		
	}
}
?>