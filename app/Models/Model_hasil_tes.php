<?php
class Model_hasil_tes{
	private $table;
	private $db;
	public function __construct(){
		$this->db=new Db();
		$this->table='hasil_tes';
	}
	public function insert($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	public function cek_sudah_tes($a){
		return $this->db->table_name($this->table)->select("hasil_tes.id_jwb,
			hasil_tes.id_user,
			hasil_tes.id_soal,
			hasil_tes.jawaban,
			soal.id_soal,
			soal.pil_a,
			soal.pil_b,
			soal.pil_c,
			soal.pil_d,
			soal.pil_ben,
			soal.soal")->where("hasil_tes.id_user='".$a["id_user"]."' AND soal.id_loker='".$a['id_loker']."'")->inner_join(['soal ON hasil_tes.id_soal=soal.id_soal'])->num_rows();
	}
	public function read_jwb_tes($a){
		return $this->db->table_name($this->table)->select("hasil_tes.id_jwb,
			hasil_tes.id_user,
			hasil_tes.id_soal,
			hasil_tes.jawaban,
			soal.id_soal,
			soal.pil_a,
			soal.pil_b,
			soal.pil_c,
			soal.pil_d,
			soal.pil_ben,
			soal.soal")->where("hasil_tes.id_user='".$a["id_user"]."' AND soal.id_loker='".$a['id_loker']."'")->inner_join(['soal ON hasil_tes.id_soal=soal.id_soal'])->result();
	}
	public function del_soal($a){
		return $this->db->table_name($this->table)->where("id_soal='".$a."'")->delete();
	}
	public function delete_user($a){
		return $this->db->table_name($this->table)->where("id_user='".$a."'")->delete();	
	}
}
?>