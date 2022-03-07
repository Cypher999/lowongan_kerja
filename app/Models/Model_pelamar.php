<?php
class Model_pelamar{
	private $table;
	public $db;
	public function __construct(){
		$this->db=new Db();
		$this->table='pelamar';
	}
	public function read_user($a){
		return $this->db->table_name($this->table)->select("*")->where("id_user='".$a."'")->result();
	}
	public function cek_user($a){
		return $this->db->table_name($this->table)->select("*")->where("id_user='".$a."'")->num_rows();
	}
	public function del_user($a){
		return $this->db->table_name($this->table)->where("id_user='".$a."'")->delete();
	}
	public function cek_ktp($a){
		return $this->db->table_name($this->table)->select("*")->where("ktp='".$a."'")->num_rows();
	}
	public function update($a){
		return $this->db->table_name($this->table)->set_var($a['form_data'])->where("id_user='".$a["id_user"]."'")->update();
	}
	public function insert_ktp($a){
		return $this->db->table_name($this->table)->set_var(["ktp"=>$a['pelamar']['ktp'],"id_user"=>$a['user']['id_user']])->create();
	}
}
?>