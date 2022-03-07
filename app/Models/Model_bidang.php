<?php
class Model_bidang{
	private $table;
	public $db;
	function __construct(){
		$this->db=new Db();
		$this->table='bidang';
	}

	function read_all(){
		return $this->db->table_name($this->table)->select("*")->result();
	}
	function read_one($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->select("*")->where("kd_bid='".$a."'")->result();
	}
	public function update($a){
		$a["kd_bid"]=$this->db->escape_str($a["kd_bid"]);
		return $this->db->table_name($this->table)->set_var($a['form-data'])->where("kd_bid='".$a["kd_bid"]."'")->update();
	}
	public function insert($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function delete($a){
		return $this->db->table_name($this->table)->where("kd_bid='".$a."'")->delete();
	}
}
?>
