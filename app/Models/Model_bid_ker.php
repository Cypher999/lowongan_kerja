<?php
class Model_bid_ker{
	private $table;
	public $db;
	function __construct(){
		$this->db=new Db();
		$this->table='bid_ker';
	}

	function read_all(){
		return $this->db->table_name($this->table)->select("*")->result();
	}
	function read_one($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->select("*")->where("kd_bid_ker='".$a."'")->result();
	}
	public function update($a){
		$a["kd_bid_ker"]=$this->db->escape_str($a["kd_bid_ker"]);
		return $this->db->table_name($this->table)->set_var($a['form-data'])->where("kd_bid_ker='".$a["kd_bid_ker"]."'")->update();
	}
	public function insert($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function delete($a){
		return $this->db->table_name($this->table)->where("kd_bid_ker='".$a."'")->delete();
	}
}
?>
