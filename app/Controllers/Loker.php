<?php
class Loker extends Controller{
	private $Model_company;
	private $Model_lamaran;
	private $Model_low_ker;
	private $Model_user;
	private $Model_bidang;
	private $Model_interview;
	private $Model_kartu_loker;
	private $path;
	public function __construct(){
		$this->Model_company=$this->model("Model_company");
		$this->Model_lamaran=$this->model("Model_lamaran");
		$this->Model_low_ker=$this->model("Model_low_ker");
		$this->Model_bidang=$this->model("Model_bidang");
		$this->Model_user=$this->model("Model_user");
		$this->Model_interview=$this->model("Model_interview");
		$this->Model_kartu=$this->model("Model_kartu_loker");
		$this->Model_bid_ker=$this->model("Model_bid_ker");
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
	public function index(){
		$id_company="";
		if($this->path=="company"){
			$data_company=$this->Model_company->read_one_user($_SESSION['user_loker']);
			$id_company=$data_company[0]['id_company'];	
		}
		else if($this->path=="admin"){
			$data_company=$this->Model_company->read_one_user($_GET['key']);
			$id_company=$data_company[0]['id_company'];	
		}
		else{
			$id_company=htmlspecialchars($_GET["key"]);
		}
		
		$data["low_ker"]=$this->Model_low_ker->read_company($id_company);
		for($i=0;$i<count($data['low_ker']);$i++){
			$jml_pel=$this->Model_lamaran->read_daftar_pelamar($data['low_ker'][$i]["id_loker"]);	
			$data["low_ker"][$i]["jml_pel"]=count($jml_pel);
		}
		$data["bid_ker"]=$this->Model_bid_ker->read_all();
		echo $this->Model_low_ker->db->show_error();
		$this->view($this->path."/loker/index",$data);
	}
	public function insert(){
		$cek_user=$this->Model_company->read_one_user($_SESSION['user_loker']);
		$a['id_loker']=random(5);
		$a['id_company']=$cek_user[0]['id_company'];
		$a['kd_bid_ker']=htmlspecialchars($_POST['bid_ker']);
		$a['nm_job']=htmlspecialchars($_POST['nm_job']);
		$a['prov']=htmlspecialchars($_POST['prov']);
		$a['kab']=htmlspecialchars($_POST['kab']);
		$a['kec']=htmlspecialchars($_POST['kec']);
		$a['des']=htmlspecialchars($_POST['des']);
		$a['alt_map']=htmlspecialchars($_POST['alt_map']);
		$a['sal_min']=htmlspecialchars($_POST['sal_min']);
		$a['sal_max']=htmlspecialchars($_POST['sal_max']);
		$a['tgl_submit']=date('Y/m/d h:i:s');
		$a['exp']=htmlspecialchars($_POST['peng-num'])." ".htmlspecialchars($_POST['peng-tp']);
		$a['tempat']=htmlspecialchars($_POST['tempat']);
		$a['jam_ker']=htmlspecialchars($_POST['jam_ker']);
		$a['rinc_kul']=htmlspecialchars($_POST['rinc_kul']);
		$a['tg_jw']=htmlspecialchars($_POST['tg_jw']);
		$insert=$this->Model_low_ker->create($a);
		if($insert){
			$_SESSION['flash']='<h2>Lowongan baru telah ditambahkan</h2>';
			echo "<script>window.location.href='".BASE_URL."?a=Loker&&key=".$a['no_induk']."';</script>";
		}
		else{
			echo $this->Model_low_ker->db->show_error();
		}
	}
	public function update(){
		$cek_user=$this->Model_company->read_one_user($_SESSION['user_loker']);
		$a['id_loker']=$_GET['key'];
		$a['form-data']['nm_job']=htmlspecialchars($_POST['nm_job']);
		$a['form-data']['prov']=htmlspecialchars($_POST['prov']);
		$a['form-data']['kd_bid_ker']=htmlspecialchars($_POST['bid_ker']);
		$a['form-data']['kab']=htmlspecialchars($_POST['kab']);
		$a['form-data']['kec']=htmlspecialchars($_POST['kec']);
		$a['form-data']['des']=htmlspecialchars($_POST['des']);
		$a['form-data']['alt_map']=htmlspecialchars($_POST['alt_map']);
		$a['form-data']['sal_min']=htmlspecialchars($_POST['sal_min']);
		$a['form-data']['sal_max']=htmlspecialchars($_POST['sal_max']);
		$a['form-data']['exp']=htmlspecialchars($_POST['peng-num'])." ".htmlspecialchars($_POST['peng-tp']);
		$a['form-data']['tempat']=htmlspecialchars($_POST['tempat']);
		$a['form-data']['jam_ker']=htmlspecialchars($_POST['jam_ker']);
		$a['form-data']['rinc_kul']=htmlspecialchars($_POST['rinc_kul']);
		$a['form-data']['tg_jw']=htmlspecialchars($_POST['tg_jw']);
		$update=$this->Model_low_ker->update($a);
		if($update){
			$_SESSION['flash']='<h2>Lowongan telah diupdate</h2>';
			echo "<script>window.location.href='".BASE_URL."?a=Loker&&key=".$cek_user[0]['no_induk']."';</script>";
		}
		else{
			echo $this->Model_low_ker->db->show_error();
		}
	}
	public function form_edit(){
		$id_loker=htmlspecialchars($_GET['key']);
		$data['loker']=$this->Model_low_ker->read_one($id_loker);
		$data["bid_ker"]=$this->Model_bid_ker->read_all();
		$this->view($this->path."/loker/form_edit",$data);
	}
	public function delete(){
		$id_loker=htmlspecialchars($_GET['key']);
		$cek["soal"]=$this->Model_soal->read_soal($id_loker);
		$cek["lamaran"]=$this->Model_lamaran->read_lam_all($id_loker);
		if(count($cek["soal"])>0){
			foreach($cek["soal"] as $isi_soal){
				$del_jaw=$this->Model_hasil_tes->del_soal($isi_soal["id_soal"]);
			}
			$delete_soal=$this->Model_soal->delete_loker($id_loker);
		}
		if(count($cek["lamaran"])>0){
			foreach($cek["lamaran"] as $isi_lamaran){
				$del_kartu=$this->Model_kartu_loker->del_lam($isi_lamaran["id_lam"]);
				$del_lam=$this->Model_interview->del_lam($isi_lamaran["id_lam"]);	
			}
			$delete_lamaran=$this->Model_lamaran->delete_loker($id_loker);
		}
		$delete=$this->Model_low_ker->delete($id_loker);
		if($delete){
			echo "<script>window.location.href='".BASE_URL."?a=Loker';</script>";
			header("Location: ".BASE_URL."?a=Loker");
		}
		else{
			echo $this->Model_low_ker->db->show_error();
		}
	}
}
?>

