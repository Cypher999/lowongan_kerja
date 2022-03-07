<?php
class Model_interview{
	private $table;
	public $db;
	public function __construct(){
		$this->db=new Db();
		$this->table='interview';
	}
	
	public function insert($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function cek_jadwal($a){
		return $this->db->select("*")->table_name($this->table)->where("id_lam='".$a."'")->num_rows();
	}
	public function read_id_lam($a){
		return $this->db->select("*")->table_name($this->table)->where("id_lam='".$a."'")->result();
	}
	public function delete($a){
		return $this->db->table_name($this->table)->where("id_berkas='".$a."' and id_user='".$_SESSION['user_loker']."'")->delete();
	}
	public function del_lam($a){
		return $this->db->table_name($this->table)->where("id_lam='".$a."'")->delete();
	}
}
?>