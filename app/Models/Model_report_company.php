<?php
class Model_report_company{
	private $table;
	public $db;
	public function __construct(){
		$this->db=new Db();
		$this->table='report_company';
	}
	public function read_one($a){
		return $this->db->table_name($this->table)->where("id_report_company='".$a."'")->select("*")->result();
	}
	public function read_company_user($a,$b){
		return $this->db->table_name($this->table)->where("id_company='".$a."' and id_user='".$b."'")->select("*")->result();
	}
	public function read_company_single($a){
		return $this->db->table_name($this->table)->where("report_company.id_company='".$a."'")->inner_join(["user on report_company.id_user=user.id_user","company on report_company.id_company=company.id_company"])->select("report_company.*,user.*,company.*")->result();
	}
	public function read_all($a){
		return $this->db->table_name($this->table)->select("*")->result();	
	}
	public function create($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function update($a){
		return $this->db->table_name($this->table)->set_var($a["f"])->where("id_report_company='".$a['id_custom']."'")->update();	
	}
	public function delete($a){
		return $this->db->table_name($this->table)->where("id_report_company='".$a."'")->delete();	
	}
	public function delete_user($a){
		return $this->db->table_name($this->table)->where("id_user='".$a."'")->delete();	
	}
	public function delete_com($a){
		return $this->db->table_name($this->table)->where("id_company='".$a."'")->delete();	
	}
}
?>