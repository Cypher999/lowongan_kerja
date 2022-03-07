<?php
class Model_recover_password{
	private $table;
	public $db;
	public function __construct(){
		$this->db=new Db();
		$this->table='recover_password';
	}
	public function read_one($a){
		return $this->db->table_name($this->table)->select("recover_password.id_rec,recover_password.id_user,recover_password.tgl,user.nm_user,user.email")->inner_join(["user on recover_password.id_user=user.id_user"])->where("recover_password.id_rec='".$a."'")->result();
	}
	public function read_one_user($a){
		return $this->db->table_name($this->table)->select("recover_password.id_rec,recover_password.id_user,recover_password.tgl,user.nm_user,user.email")->inner_join(["user on recover_password.id_user=user.id_user"])->where("recover_password.id_user='".$a."'")->result();
	}
	public function insert($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function delete($a){
		return $this->db->table_name($this->table)->where ("id_rec='".$a."'")->delete();
	}
}
?>