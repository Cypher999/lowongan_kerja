<?php
class Home extends Controller{
	private $Model_user;
	private $Model_low_ker;
	private $Model_pelamar;
	private $Model_lamaran;
	private $Model_company;
	private $Model_interview;
	private $tipe_user;
	private $php_mail;
	public function __construct(){
		$this->Model_user=$this->model("Model_user");
		$this->Model_low_ker=$this->model("Model_low_ker");
		$this->Model_pelamar=$this->model("Model_pelamar");
		$this->Model_lamaran=$this->model("Model_lamaran");
		$this->Model_company=$this->model("Model_company");
		$this->Model_interview=$this->model("Model_interview");
		$this->Model_bidang=$this->model("Model_bidang");
		$this->Model_bid_ker=$this->model("Model_bid_ker");
		$this->php_mail=new php_mailer();
		if(isset($_SESSION["user_loker"])){
			$cek_tipe=$this->Model_user->read_one($_SESSION["user_loker"]);
			$this->tipe_user=$cek_tipe[0]["tipe_user"];
		}
	}
	private function cek_lengkap(){
		$empty="0";
		$data=$this->Model_pelamar->read_user($_SESSION["user_loker"]);
		$cek_data=$this->Model_pelamar->cek_user($_SESSION["user_loker"]);
		if($cek_data>0){
			$data=array_values($data[0]);
			foreach ($data as $dt) {
				if($dt==""){
					$empty="1";
				}
			}	
		}
		if(($cek_data<=0)||($empty==1)){
			return "0";
		}
		else{
			return "1";
		}
	}
	public function logout(){
		session_destroy();
		header("Location: ".BASE_URL);
	}
	public function forgot(){
		if($_POST['user']==""){
			$_SESSION['flash']="<h2>masukkan username terlebih dahulu</h2>";
			header("Location: ?a=Home/login");
		}
		else{
			$_SESSION['name']=$_POST['user'];
			$data['forgot']=$this->model("Model_user")->read_username($_POST['user']);
			$this->view("no_login/home/forgot",$data);
		}
	}
	function load_loker(){
		$berisi["bid"]=false;
		$berisi["gj"]=false;
		$berisi["key"]=false;
		if((isset($_POST["bid"]))&&($_POST["bid"]!="")){
			$berisi["bid"]=true;
		}
		if((isset($_POST["gj"]))&&($_POST["gj"]!="")){
			$berisi["gj"]=true;
		}
		if((isset($_POST["key"]))&&($_POST["key"]!="")){
			$berisi["key"]=true;
		}
		if((!$berisi["bid"])&&(!$berisi["gj"])&&(!$berisi["key"])){
			$data["low_ker"]=$this->Model_low_ker->read_all();
		}
		else if(($berisi["bid"])&&(!$berisi["gj"])&&(!$berisi["key"])){
			$data["low_ker"]=$this->Model_low_ker->read_bidang(htmlspecialchars($_POST["bid"]));
		}
		else if((!$berisi["bid"])&&($berisi["gj"])&&(!$berisi["key"])){
			$data["low_ker"]=$this->Model_low_ker->read_gaji(htmlspecialchars($_POST["gj"]));
		}
		else if((!$berisi["bid"])&&(!$berisi["gj"])&&($berisi["key"])){
			$data["low_ker"]=$this->Model_low_ker->read_key(htmlspecialchars($_POST["key"]));
		}

		else if(($berisi["bid"])&&($berisi["gj"])&&(!$berisi["key"])){
			$data["low_ker"]=$this->Model_low_ker->read_bidang_gaji(htmlspecialchars($_POST["bid"]),htmlspecialchars($_POST["gj"]));
		}
		else if(($berisi["bid"])&&($berisi["gj"])&&($berisi["key"])){
			$data["low_ker"]=$this->Model_low_ker->read_bidang_gaji_key(htmlspecialchars($_POST["bid"]),htmlspecialchars($_POST["gj"]),htmlspecialchars($_POST["key"]));
		}

		else if((!$berisi["bid"])&&($berisi["gj"])&&($berisi["key"])){
			$data["low_ker"]=$this->Model_low_ker->read_gaji_key(htmlspecialchars($_POST["gj"]),htmlspecialchars($_POST["key"]));
		}

		else if(($berisi["bid"])&&(!$berisi["gj"])&&($berisi["key"])){
			$data["low_ker"]=$this->Model_low_ker->read_bidang_key(htmlspecialchars($_POST["bid"]),htmlspecialchars($_POST["key"]));
		}

		$data["company_no_acc"]=0;
		echo $this->Model_low_ker->db->show_error();
		$this->view("no_login/home/list_loker",$data);
	}
	function index(){
		$data["users"]=$this->model("Model_user")->read_all();
		$data["company"]=$this->Model_company->read_all();
		$data["company_no_acc"]=0;
		$data["bid_ker"]=$this->Model_bid_ker->read_all();
		$data["low_ker"]=$this->Model_low_ker->read_all();
		foreach ($data["company"] as $company){
			if($company['status']==0){
				$data["company_no_acc"]++;
			}
		}
		if(isset($_SESSION["user_loker"])){
			if($this->tipe_user=="A"){
				$this->view("admin/home/index",$data);
			}
			else if($this->tipe_user=="C"){				
				$verified=$this->Model_user->read_one($_SESSION["user_loker"]);
				if($verified[0]["verified"]==1){
					$data['statistik']['C']=0;
					$data['total_loker']=array();
					$data['data_pelamar']=array();
					$data['statistik']['X']=0;
					$data['statistik']['B']=0;
					$data['statistik']['A']=0;
					$data["data_pelamar"]=array();
					$id_company=$this->Model_company->read_one_user($_SESSION["user_loker"]);
					if(count($id_company)>0){
						$data["total_loker"]=$this->Model_low_ker->read_company($id_company[0]['id_company']);
					foreach ($data["total_loker"] as $total_loker) {
						$data["stat_pelamar"]=$this->Model_lamaran->read_lam_all($total_loker['id_loker']);
						foreach($data["stat_pelamar"] as $stat_pelamar){
							array_push($data["data_pelamar"],$stat_pelamar);
						}
					}
					foreach ($data["data_pelamar"] as $data_pelamar){
						if($data_pelamar['stat_lam']=="C"){
							$data['statistik']['C']+=1;
						}
						else if($data_pelamar['stat_lam']=="X"){
							$data['statistik']['X']+=1;
						}
						else if($data_pelamar['stat_lam']=="B"){
							$ada_jadwal=$this->Model_interview->read_id_lam($data_pelamar['id_lam']);
							if(count($ada_jadwal)>0){
								$data['statistik']['A']+=1;	
							}else{
								$data['statistik']['B']+=1;
							}
						}
					}
					}
					
					$this->view("company/home/index",$data);
				}
				else{
					$this->view("please_verify");	
				}
			}
			else if($this->tipe_user=="P"){
				$verified=$this->Model_user->read_one($_SESSION["user_loker"]);
				if($verified[0]["verified"]==1){
					
				$data["cek_lengkap"]=$this->cek_lengkap();
				$this->view("applyer/home/index",$data);
				}
				else{
					$this->view("please_verify");	
				}
			}
		}
		else{
			$this->view("no_login/home/index",$data);	
		}
	}
	function login(){
		$this->view("no_login/home/login");
	}
	function signup(){
		$this->view("no_login/home/signup");
	}
	function sign_up(){
		$a['user']["id_user"]=random(5);
		$a['pelamar']["ktp"]=htmlspecialchars($_POST["no_ktp"]);
		$a['company']["id_company"]=random(10);
		$a['company']["no_induk"]=htmlspecialchars($_POST["no_ktp"]);
		$a['user']["nm_user"]=htmlspecialchars($_POST["nm_user"]);
		$a['user']["nm_lengkap"]=htmlspecialchars($_POST["nm_lengkap"]);
		$a['user']["tipe_user"]=htmlspecialchars($_POST["type"]);
		$a['user']["jekel"]=htmlspecialchars($_POST["jekel"]);
		$a['user']["no_hp"]=htmlspecialchars($_POST["no_hp"]);
		$a['user']["email"]=htmlspecialchars($_POST["email"]);
		$a['user']["password"]=md5($_POST["pass"]);
		$a['user']["per_1"]=htmlspecialchars($_POST["per_1"]);
		$a['user']["per_2"]=htmlspecialchars($_POST["per_2"]);
		$a['user']["jaw_1"]=htmlspecialchars($_POST["jaw_1"]);
		$a['user']["jaw_2"]=htmlspecialchars($_POST["jaw_2"]);
		$a['user']["verified"]="0";
		$a['user']["kd_ver"]=random(50);		
		$cek_nama=$this->Model_user->read_username($a['user']["nm_user"]);
		$cek_email=$this->Model_user->read_username($a['user']["email"]);
		if($a['user']["tipe_user"]=="P"){
			$cek_ktp=$this->Model_pelamar->cek_ktp($_POST["no_ktp"]);
		}
		else if($a['user']["tipe_user"]=="C"){
			$cek_ktp=$this->Model_company->cek_company($_POST["no_ktp"]);
		}
		if((count($cek_email)>0)||(count($cek_nama)>0)){
			$_SESSION["flash"]="<h2>Username atau email sudah ada</h2>";
			header("Location: ?a=Home/signup");
		}
		else if($cek_ktp>0){
			$_SESSION["flash"]="<h2>Nomor ktp atau no. induk perusahaan sudah digunakan</h2>";
			header("Location: ?a=Home/signup");
		}
		else if($_POST['pass']!=$_POST['konf']){
			$_SESSION["flash"]="<h2>Password konfirmasi tidak sama</h2>";
			header("Location: ?a=Home/signup");
		}
		else{
			$sign_up=$this->Model_user->insert($a);
			if($a['user']["tipe_user"]=="P"){
				$sign_up2=$this->Model_pelamar->insert_ktp($a);
			}
			else if($a['user']["tipe_user"]=="C"){
				$sign_up2=$this->Model_company->insert_id_company($a);
			}
			if($sign_up&&$sign_up2){
				$_SESSION["user_loker"]=$a['user']["id_user"];
				$email_param["to"]=$_POST["email"];
				$email_param["subject"]="Verifikasi Email Anda";
				$email_param["content"]="Selamat, akun anda sudah terdaftar, silahkan klik link berikut ini untuk verifikasi ".BASE_URL."?a=Ver&&ver_key=".$a['user']["kd_ver"];
				$this->php_mail->set_param($email_param)->do_send();
				if($_FILES["file_prof"]["name"]!=""){
					$nm_fl=$_FILES["file_prof"]["name"];
					$tipe_fl=explode(".",$_FILES["file_prof"]["name"]);
					$tipe_fl=$tipe_fl[1];
					$tmp=$_FILES["file_prof"]["tmp_name"];
					if(($tipe_fl=="jpeg")||($tipe_fl=="jpg")||($tipe_fl=="png")||($tipe_fl=="bmp")){
						move_uploaded_file($tmp, "img/profile_logo/".$a['id_user'].".png");
					}
				}
				header("Location: ?");
			}
			else{
				echo $this->Model_company->db->show_error();
			}	
		}
		
	}
	public function log_in(){
		if($_POST["tbl"]=="login"){
			$data["username"]=htmlspecialchars($_POST["user"]);
			$data["password"]=md5($_POST["pass"]);
			$cek_login=$this->Model_user->cek_login($data);
			$valid["nama"]=$cek_login["nama"];
			$valid["password"]=$cek_login["password"];
			if(($valid["nama"]=="1")&&($valid["password"]=="1")){
				$id_user=$this->Model_user->read_username($data["username"]);
				$_SESSION["user_loker"]=$id_user[0]["id_user"];
				header("Location: ".BASE_URL."?");
			}
			else if(($valid["nama"]=="1")&&($valid["password"]=="0")){
				$_SESSION["flash"]="<h2>Password Salah</h2>";
				header("Location: ".BASE_URL."?a=Home/login");
			}
			else if($valid["nama"]=="0"){
				$_SESSION["flash"]="<h2>Username Tidak Ditemukan</h2>";
				header("Location: ".BASE_URL."?a=Home/login");
			}	
		}
		else if($_POST["tbl"]=="forgot"){
			$this->forgot();
		}
		
	}
}
?>
