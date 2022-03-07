<?php
class Model_kritik_company{
	private $table;
	public $db;
	public function __construct(){
		$this->db=new Db();
		$this->table='kritik_company';
	}
	public function read_one($a){
		return $this->db->table_name($this->table)->where("id_kritik_company='".$a."'")->select("*")->result();
	}
	public function read_company_user($a){
		return $this->db->table_name($this->table)->where("kritik_company.id_company='".$a."'")->select("kritik_company.*,user.*")->inner_join(["user ON kritik_company.id_user=user.id_user"])->result();
	}
	public function read_all($a){
		return $this->db->table_name($this->table)->select("*")->result();	
	}
	public function create($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function update($a){
		return $this->db->table_name($this->table)->set_var($a["f"])->where("id_kritik_company='".$a['id_custom']."'")->update();	
	}
	public function delete($a){
		return $this->db->table_name($this->table)->where("id_kritik_company='".$a."'")->delete();	
	}
	public function delete_user($a){
		return $this->db->table_name($this->table)->where("id_user='".$a."'")->delete();	
	}
	public function delete_com($a){
		return $this->db->table_name($this->table)->where("id_company='".$a."'")->delete();	
	}
}
?>