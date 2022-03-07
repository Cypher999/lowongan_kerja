<?php
class Ver extends Controller{
	private $Model_user;
	public function __construct(){
		$this->Model_user=$this->model("Model_user");
	}
	public function index(){
		$kd_ver=$_GET["ver_key"];
		$ver=$this->Model_user->verify_user($kd_ver);
		echo "Selamat, akun anda sudah ter verifikasi, <a href='".BASE_URL."'> Kembali ke home</a>";
	}
}