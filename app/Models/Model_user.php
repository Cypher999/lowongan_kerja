<?php
class Model_user{
	private $table;
	public $db;
	public function __construct(){
		$this->db=new Db();
		$this->table='user';
	}
	public function insert($a){
		return $this->db->table_name($this->table)->set_var($a['user'])->create();
	}
	public function cek_login($a){
		$username=$a["username"];
		$password=$a["password"];
		$valid["nama"]="0";
		$valid["password"]="0";
		$cek_nama=$this->db->table_name($this->table)->select("*")->where("nm_user='".$username."' or email='".$username."'")->num_rows();
		if($cek_nama>0){
			$valid["nama"]="1";
			$cek_password=$this->db->table_name($this->table)->select("*")->where("nm_user='".$username."' or email='".$username."'")->result();
			if($cek_password[0]["password"]==$password){
				$valid["password"]="1";
			}
		}
		return $valid;
	}

	public function read_username($a){
		return $this->db->table_name($this->table)->select("*")->where("nm_user='".$a."' or email='".$a."'")->result();
	}
	public function update_nm($a){
		return $this->db->table_name($this->table)->set_var(['nm_lengkap'=>$a['br']])->where("id_user='".$a['id_user']."'")->update();
	}
	public function update($a){
		return $this->db->table_name($this->table)->set_var($a['f'])->where("id_user='".$a['id_user']."'")->update();
	}
	public function update_hp($a){
		return $this->db->table_name($this->table)->set_var(['no_hp'=>$a['no_hp']])->where("id_user='".$a['id_user']."'")->update();
	}
	public function update_pass($a){
		return $this->db->table_name($this->table)->set_var(['password'=>$a['br']])->where("id_user='".$a['id_user']."'")->update();
	}
	public function verify_user($a){
		return $this->db->table_name($this->table)->set_var(['verified'=>'1'])->where("kd_ver='".$a."'")->update();
	}
	public function update_security($a){
		return $this->db->table_name($this->table)->set_var($a["form-data"])->where("id_user='".$a['id_user']."'")->update();
	}
	public function cek_nama($a){
		return $this->db->table_name($this->table)->select("*")->where("nm_user='".$a['nm']."'")->num_rows();
	}
	public function cek_email($a){
		return $this->db->table_name($this->table)->select("*")->where("email='".$a['f']['email']."'")->num_rows();
	}
	public function cek_hp($a){
		return $this->db->table_name($this->table)->select("*")->where("no_hp='".$a['no_hp']."'")->num_rows();
	}
	public function read_one($a){
		return $this->db->table_name($this->table)->select("*")->where("id_user='".$a."'")->result();
	}
	public function delete($a){
		return $this->db->table_name($this->table)->where("id_user='".$a."'")->delete();
	}
	public function read_all(){
		return $this->db->table_name($this->table)->select("*")->result();
	}

}
?>