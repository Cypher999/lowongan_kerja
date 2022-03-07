<?php
class Model_berkas{
	private $table;
	public $db;
	public function __construct(){
		$this->db=new Db();
		$this->table='berkas';
	}
	public function read_berkas($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->select("berkas.id_berkas,berkas.id_user,berkas.tgl_berkas,berkas.nm_topik,berkas.ket,user.nm_lengkap")->inner_join(["user on berkas.id_user=user.id_user"])->where("berkas.id_user='".$a."'")->result();
	}

	public function read_one($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->select("berkas.id_berkas,berkas.id_user,berkas.tgl_berkas,berkas.nm_topik,berkas.ket,user.nm_lengkap")->inner_join(["user on berkas.id_user=user.id_user"])->where("berkas.id_berkas='".$a."' and user.id_user='".$_SESSION['user_loker']."'")->result();
	}

	public function insert($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function update($a){
		$a["id_berkas"]=$this->db->escape_str($a["id_berkas"]);
		return $this->db->table_name($this->table)->set_var($a['form-data'])->where("id_berkas='".$a['id_berkas']."' and id_user='".$_SESSION['user_loker']."'")->update();
	}
	public function delete($a){

		return $this->db->table_name($this->table)->where ("id_berkas='".$a."' and id_user='".$_SESSION['user_loker']."'")->delete();
	}
	public function del_adm($a){
		$a=$this->db->escape_str($a);
		return $this->db->table_name($this->table)->where ("id_berkas='".$a."'")->delete();
	}
}
?>