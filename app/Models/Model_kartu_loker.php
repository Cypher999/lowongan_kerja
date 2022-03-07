<?php
class Model_kartu_loker{
	private $table;
	public $db;
	public function __construct(){
		$this->db=new Db();
		$this->table='kartu_loker';
	}
	public function read_user($a){
		return $this->db->table_name($this->table)->select("kartu_loker.*,lamaran.*,user.*")->where("user.id_user='".$a."'")->inner_join(["lamaran on kartu_loker.id_lam=lamaran.id_lam","user on lamaran.id_user=user.id_user"])->result();
	}
	public function read_one($a){
		return $this->db->table_name($this->table)->select("*")->where("id_kartu='".$a."'")->result();
	}
	public function cek_lam($a){
		return $this->db->table_name($this->table)->select("*")->where("id_lam='".$a."'")->num_rows();
	}
	public function read_lam($a){
		return $this->db->table_name($this->table)->select("*")->where("id_lam='".$a."'")->num_rows();
	}
	public function insert($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function del_lam($a){
		return $this->db->table_name($this->table)->where("id_lam='".$a."'")->delete();
	}
	public function cek_kartu($a){
		return $this->db->table_name($this->table)->select("pelamar.*,kartu_loker.*,lamaran.*,low_ker.*,company.*,user.*")->where("kartu_loker.id_kartu='".$a."'")->inner_join(["lamaran on lamaran.id_lam=kartu_loker.id_lam","user on lamaran.id_user=user.id_user","pelamar on pelamar.id_user=user.id_user","low_ker on lamaran.id_loker=low_ker.id_loker","company on low_ker.id_company=company.id_company"])->result();	
	}
}
?>