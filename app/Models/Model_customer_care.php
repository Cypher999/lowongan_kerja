<?php
class Model_customer_care{
	private $table;
	public $db;
	public function __construct(){
		$this->db=new Db();
		$this->table='customer_care';
	}
	public function read_one($a){
		return $this->db->table_name($this->table)->inner_join(["user on customer_care.id_user=user.id_user"])->where("customer_care.id_custom='".$a."'")->select("user.*,customer_care.*")->result();
	}
	public function read_all(){
		return $this->db->table_name($this->table)->select("*")->order_by(["tgl desc"])->result();	
	}
	public function create($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function update($a){
		return $this->db->table_name($this->table)->set_var($a["f"])->where("id_custom='".$a['id_custom']."'")->update();	
	}
	public function delete($a){
		return $this->db->table_name($this->table)->where("id_custom='".$a."'")->delete();	
	}
	public function delete_user($a){
		return $this->db->table_name($this->table)->where("id_user='".$a."'")->delete();	
	}
}
?>