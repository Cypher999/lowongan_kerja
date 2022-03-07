<?php
class Model_low_ker{
	private $table;
	public $db;
	function __construct(){
		$this->db=new Db();
		$this->table='low_ker';
	}
	
	function read_all(){
		return $this->db->table_name($this->table)->select("low_ker.id_loker,
			low_ker.kd_bid_ker,
			bid_ker.bid_ker,
			low_ker.nm_job,
			low_ker.prov,
			low_ker.kab,
			low_ker.kec,
			low_ker.des,
			low_ker.alt_map,
			low_ker.sal_min,
			low_ker.sal_max,
			low_ker.tgl_submit,
			low_ker.tempat,
			low_ker.jam_ker,
			low_ker.rinc_kul,
			low_ker.tg_jw,
			company.no_induk,
			company.id_company,
			company.status,
			company.nm_com")->inner_join(["company ON low_ker.id_company=company.id_company","bid_ker ON low_ker.kd_bid_ker=bid_ker.kd_bid_ker"])->result();
	}
	function read_bidang($bid){
		return $this->db->table_name($this->table)->select("low_ker.id_loker,
			low_ker.kd_bid_ker,
			bid_ker.bid_ker,
			low_ker.nm_job,
			low_ker.prov,
			low_ker.kab,
			low_ker.kec,
			low_ker.des,
			low_ker.alt_map,
			low_ker.sal_min,
			low_ker.sal_max,
			low_ker.tgl_submit,
			low_ker.tempat,
			low_ker.jam_ker,
			low_ker.rinc_kul,
			low_ker.tg_jw,
			company.no_induk,
			company.id_company,
			company.status,
			company.nm_com")->inner_join(["company ON low_ker.id_company=company.id_company","bid_ker ON low_ker.kd_bid_ker=bid_ker.kd_bid_ker"])->where("low_ker.kd_bid_ker='".$bid."'")->result();
	}

	function read_gaji($gj){
		return $this->db->table_name($this->table)->select("low_ker.id_loker,
			low_ker.kd_bid_ker,
			bid_ker.bid_ker,
			low_ker.nm_job,
			low_ker.prov,
			low_ker.kab,
			low_ker.kec,
			low_ker.des,
			low_ker.alt_map,
			low_ker.sal_min,
			low_ker.sal_max,
			low_ker.tgl_submit,
			low_ker.tempat,
			low_ker.jam_ker,
			low_ker.rinc_kul,
			low_ker.tg_jw,
			company.no_induk,
			company.id_company,
			company.status,
			company.nm_com")->inner_join(["company ON low_ker.id_company=company.id_company","bid_ker ON low_ker.kd_bid_ker=bid_ker.kd_bid_ker"])->where("low_ker.sal_min<='".$gj."' and low_ker.sal_max>='".$gj."'")->result();
	}

	function read_key($key){
		return $this->db->table_name($this->table)->select("low_ker.id_loker,
			low_ker.kd_bid_ker,
			bid_ker.bid_ker,
			low_ker.nm_job,
			low_ker.prov,
			low_ker.kab,
			low_ker.kec,
			low_ker.des,
			low_ker.alt_map,
			low_ker.sal_min,
			low_ker.sal_max,
			low_ker.tgl_submit,
			low_ker.tempat,
			low_ker.jam_ker,
			low_ker.rinc_kul,
			low_ker.tg_jw,
			company.no_induk,
			company.id_company,
			company.status,
			company.nm_com")->inner_join(["company ON low_ker.id_company=company.id_company","bid_ker ON low_ker.kd_bid_ker=bid_ker.kd_bid_ker"])->where("low_ker.nm_job like '%".$key."%' or low_ker.prov like '%".$key."%' or low_ker.kab like '%".$key."%' or low_ker.kec like '%".$key."%' or low_ker.des like '%".$key."%' or low_ker.sal_min like '%".$key."%' or low_ker.sal_max like '%".$key."%' or low_ker.tempat like '%".$key."%' or low_ker.rinc_kul like '%".$key."%' or low_ker.jam_ker like '%".$key."%' or bid_ker.bid_ker like '%".$key."%' or company.nm_com like '%".$key."%'")->result();
	}

	function read_bidang_gaji($bid,$gj){
		return $this->db->table_name($this->table)->select("low_ker.id_loker,
			low_ker.kd_bid_ker,
			bid_ker.bid_ker,
			low_ker.nm_job,
			low_ker.prov,
			low_ker.kab,
			low_ker.kec,
			low_ker.des,
			low_ker.alt_map,
			low_ker.sal_min,
			low_ker.sal_max,
			low_ker.tgl_submit,
			low_ker.tempat,
			low_ker.jam_ker,
			low_ker.rinc_kul,
			low_ker.tg_jw,
			company.no_induk,
			company.id_company,
			company.status,
			company.nm_com")->inner_join(["company ON low_ker.id_company=company.id_company","bid_ker ON low_ker.kd_bid_ker=bid_ker.kd_bid_ker"])->where("low_ker.kd_bid_ker='".$bid."' and (low_ker.sal_min<='".$gj."' and low_ker.sal_max>='".$gj."')")->result();
	}

	function read_bidang_gaji_key($bid,$gj,$key){
		return $this->db->table_name($this->table)->select("low_ker.id_loker,
			low_ker.kd_bid_ker,
			bid_ker.bid_ker,
			low_ker.nm_job,
			low_ker.prov,
			low_ker.kab,
			low_ker.kec,
			low_ker.des,
			low_ker.alt_map,
			low_ker.sal_min,
			low_ker.sal_max,
			low_ker.tgl_submit,
			low_ker.tempat,
			low_ker.jam_ker,
			low_ker.rinc_kul,
			low_ker.tg_jw,
			company.no_induk,
			company.id_company,
			company.status,
			company.nm_com")->inner_join(["company ON low_ker.id_company=company.id_company","bid_ker ON low_ker.kd_bid_ker=bid_ker.kd_bid_ker"])->where("low_ker.kd_bid_ker='".$bid."' and (low_ker.sal_min<='".$gj."' and low_ker.sal_max>='".$gj."') and (low_ker.nm_job like '%".$key."%' or low_ker.prov like '%".$key."%' or low_ker.kab like '%".$key."%' or low_ker.kec like '%".$key."%' or low_ker.des like '%".$key."%' or low_ker.sal_min like '%".$key."%' or low_ker.sal_max like '%".$key."%' or low_ker.tempat like '%".$key."%' or low_ker.rinc_kul like '%".$key."%' or low_ker.jam_ker like '%".$key."%' or bid_ker.bid_ker like '%".$key."%' or company.nm_com like '%".$key."%')")->result();
	}

	function read_bidang_key($bid,$key){
		return $this->db->table_name($this->table)->select("low_ker.id_loker,
			low_ker.kd_bid_ker,
			bid_ker.bid_ker,
			low_ker.nm_job,
			low_ker.prov,
			low_ker.kab,
			low_ker.kec,
			low_ker.des,
			low_ker.alt_map,
			low_ker.sal_min,
			low_ker.sal_max,
			low_ker.tgl_submit,
			low_ker.tempat,
			low_ker.jam_ker,
			low_ker.rinc_kul,
			low_ker.tg_jw,
			company.no_induk,
			company.id_company,
			company.status,
			company.nm_com")->inner_join(["company ON low_ker.id_company=company.id_company","bid_ker ON low_ker.kd_bid_ker=bid_ker.kd_bid_ker"])->where("low_ker.kd_bid_ker='".$bid."' and (low_ker.nm_job like '%".$key."%' or low_ker.prov like '%".$key."%' or low_ker.kab like '%".$key."%' or low_ker.kec like '%".$key."%' or low_ker.des like '%".$key."%' or low_ker.sal_min like '%".$key."%' or low_ker.sal_max like '%".$key."%' or low_ker.tempat like '%".$key."%' or low_ker.rinc_kul like '%".$key."%' or low_ker.jam_ker like '%".$key."%' or bid_ker.bid_ker like '%".$key."%' or company.nm_com like '%".$key."%')")->result();
	}

	function read_gaji_key($gj,$key){
		return $this->db->table_name($this->table)->select("low_ker.id_loker,
			low_ker.kd_bid_ker,
			bid_ker.bid_ker,
			low_ker.nm_job,
			low_ker.prov,
			low_ker.kab,
			low_ker.kec,
			low_ker.des,
			low_ker.alt_map,
			low_ker.sal_min,
			low_ker.sal_max,
			low_ker.tgl_submit,
			low_ker.tempat,
			low_ker.jam_ker,
			low_ker.rinc_kul,
			low_ker.tg_jw,
			company.no_induk,
			company.id_company,
			company.status,
			company.nm_com")->inner_join(["company ON low_ker.id_company=company.id_company","bid_ker ON low_ker.kd_bid_ker=bid_ker.kd_bid_ker"])->where("(low_ker.nm_job like '%".$key."%' or low_ker.prov like '%".$key."%' or low_ker.kab like '%".$key."%' or low_ker.kec like '%".$key."%' or low_ker.des like '%".$key."%' or low_ker.sal_min like '%".$key."%' or low_ker.sal_max like '%".$key."%' or low_ker.tempat like '%".$key."%' or low_ker.rinc_kul like '%".$key."%' or low_ker.jam_ker like '%".$key."%' or bid_ker.bid_ker like '%".$key."%' or company.nm_com like '%".$key."%') and (low_ker.sal_min<='".$gj."' and low_ker.sal_max>='".$gj."')")->result();
	}

	function read_company($a,$except=""){
		return $this->db->manual_query("SELECT low_ker.*, company.*,bid_ker.* FROM ".$this->table." INNER JOIN company ON low_ker.id_company=company.id_company INNER JOIN bid_ker ON low_ker.kd_bid_ker=bid_ker.kd_bid_ker WHERE company.id_company='".$a."' and not low_ker.id_loker='".$except."'")->result();
		/*return $this->db->table_name($this->table)->select("low_ker.*,	company.*")->inner_join(["company ON low_ker.id_company=company.id_company"])->where("company.id_company='".$a."' and not low_ker.id_loker='".$except."'")->result();*/
	}
	function read_one($a){
		return $this->db->table_name($this->table)->select("low_ker.id_loker,bid_ker.kd_bid_ker,bid_ker.bid_ker,low_ker.nm_job,low_ker.prov,low_ker.kab,low_ker.kec,low_ker.des,low_ker.alt_map,low_ker.sal_min,low_ker.sal_max,low_ker.tgl_submit,low_ker.exp,low_ker.tempat,	low_ker.jam_ker,low_ker.rinc_kul,low_ker.tg_jw,company.no_induk,company.nm_com,company.jam_kerja,company.hari_kerja,company.id_company,company.id_user,bidang.bidang")->inner_join(["company ON low_ker.id_company=company.id_company","bidang ON company.kd_bid=bidang.kd_bid","bid_ker on low_ker.kd_bid_ker=bid_ker.kd_bid_ker"])->where("low_ker.id_loker='".$a."'")->result();
	}
	function create($a){
		return $this->db->table_name($this->table)->set_var($a)->create();
	}
	function update($a){
		return $this->db->table_name($this->table)->set_var($a['form-data'])->where("id_loker='".$a['id_loker']."'")->update();
	}
	function delete($a){
		return $this->db->table_name($this->table)->where("id_loker='".$a."'")->delete();
	}
}
?>