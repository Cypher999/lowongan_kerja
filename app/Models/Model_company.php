<?php
class Model_company{
	private $table;
	public $db;
	function __construct(){
		$this->db=new Db();
		$this->table='company';
	}
	public function update($a){
		$a["id_company"]=$this->db->escape_str($a["id_company"]);
		return $this->db->table_name($this->table)->set_var($a['form-data'])->where("id_company='".$a["id_company"]."'")->update();
	}
	public function insert($a){
		return $this->db->table_name($this->table)->set_var($a['form-data'])->create();
	}
	public function acc_com($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->set_var(["status"=>"1"])->where("id_company='".$a."'")->update();
	}
	function read_all(){
		return $this->db->table_name($this->table)->select("bidang.*,
		company.*,
		user.*")->inner_join(["bidang on company.kd_bid=bidang.kd_bid","user on company.id_user=user.id_user"])->result();
	}
	function read_one($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->select("bidang.*,
		company.*")->inner_join(["bidang on company.kd_bid=bidang.kd_bid"])->where("company.id_company='".$a."'")->result();
	}
	function read_bidang($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->select("bidang.*,
		company.*")->inner_join(["bidang on company.kd_bid=bidang.kd_bid"])->where("company.kd_bid='".$a."'")->result();
	}
	function read_one_user($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->select("bidang.*,
		company.*")->inner_join(["bidang on company.kd_bid=bidang.kd_bid"])->where("company.id_user='".$a."'")->result();
	}

	function read_all_except_dec(){
		return $this->db->table_name($this->table)->select("bidang.*,company.*")->inner_join(["bidang on company.kd_bid=bidang.kd_bid"])->where("company.status='1'")->result();
	}
	public function cek_company($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->select("*")->where("no_induk='".$a."'")->num_rows();
	}
	public function insert_id_company($a){
		return $this->db->table_name($this->table)->set_var(["id_company"=>$a['company']['id_company'],"id_user"=>$a['user']['id_user'],"status"=>"0","kd_bid"=>"-"])->create();
	}
	function read_profil($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->select("company.*,
		bidang.*")->inner_join(["bidang ON company.kd_bid=bidang.kd_bid"])->where("company.id_company='".$a."'")->result();
	}
	public function delete($a){
		return $this->db->table_name($this->table)->where("id_company='".$a."'")->delete();
	}
}
?>
