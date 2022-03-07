<?php
class Model_lamaran{
	private $table;
	public $db;
	public function __construct(){
		$this->db=new Db();
		$this->table='lamaran';
	}
	function print_card($a){
		return $this->db->table_name($this->table)->select("kartu_loker.*,user.*,low_ker.*,lamaran.*,company.*,pelamar.*")->where("lamaran.id_lam='".$a."'")->inner_join(["kartu_loker on kartu_loker.id_lam=lamaran.id_lam","user on lamaran.id_user=user.id_user","pelamar on lamaran.id_user=pelamar.id_user","low_ker on lamaran.id_loker=low_ker.id_loker","company on low_ker.id_company=company.id_company"])->result();
	}
	public function read_all_user(){
		return $this->db->select("low_ker.nm_job,low_ker.id_loker,lamaran.tgl_lam,lamaran.id_lam")->inner_join(["low_ker on lamaran.id_loker=low_ker.id_loker"])->table_name($this->table)->where("lamaran.id_user='".$_SESSION["user_loker"]."'")->result();
	}
	public function read_daftar_pelamar($a){
		return $this->db->select("low_ker.id_loker,low_ker.id_company,lamaran.id_loker,lamaran.id_lam,lamaran.tgl_lam,lamaran.stat_lam,user.id_user,	user.nm_user,user.nm_lengkap")->inner_join(["low_ker on lamaran.id_loker=low_ker.id_loker","user on lamaran.id_user=user.id_user"])->table_name($this->table)->where("low_ker.id_loker='".$a."'")->result();
	}
	public function read_user($a){
		return $this->db->select("*")->table_name($this->table)->where("id_user='".$a."'")->result();
	}
	public function cek_user($a){
		return $this->db->select("*")->table_name($this->table)->where("id_user='".$a."'")->num_rows();
	}
	public function cek_lam($a){
		return $this->db->select("*")->table_name($this->table)->where("id_loker='".$a."' and id_user='".$_SESSION["user_loker"]."'")->num_rows();
	}
	public function read_lam_ind($a){
		return $this->db->select("*")->table_name($this->table)->where("id_loker='".$a."' and id_user='".$_SESSION["user_loker"]."'")->result();
	}
	public function read_lam_all($a){
		return $this->db->select("*")->table_name($this->table)->where("id_loker='".$a."'")->result();
	}
	public function read_one($a){
		return $this->db->select("*")->table_name($this->table)->where("id_lam='".$a."'")->result();
	}
	public function stat_lam($a){
		return $this->db->select("low_ker.id_loker,low_ker.nm_job,low_ker.id_loker,low_ker.prov,low_ker.kab,low_ker.kec,low_ker.des,low_ker.sal_min,low_ker.sal_max,company.no_induk,company.id_company,company.nm_com,lamaran.stat_lam,lamaran.id_lam")->table_name($this->table)->where("lamaran.id_user='".$_SESSION["user_loker"]."' and lamaran.id_lam='".$a."'")->inner_join(["low_ker on lamaran.id_loker=low_ker.id_loker","company on low_ker.id_company=company.id_company"])->result();
	}
	public function acc_lamaran($a){
		return $this->db->table_name($this->table)->set_var(["stat_lam"=>$a["stat_lam"]])->where("id_lam='".$a["id_lam"]."'")->update();	
	}
	public function update_status_lamaran($a){
		return $this->db->table_name($this->table)->set_var(["stat_lam"=>$a["stat_lam"]])->where("id_user='".$a["id_user"]."' and id_loker='".$a["id_loker"]."'")->update();
	}

	public function insert($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function delete_loker($a){
		return $this->db->table_name($this->table)->where("id_loker='".$a."'")->delete();
	}
	public function delete_user($a){
		return $this->db->table_name($this->table)->where("id_user='".$a."'")->delete();	
	}
	public function delete_lam($a){
		return $this->db->table_name($this->table)->where("id_lam='".$a."'")->delete();
	}
}
?>
