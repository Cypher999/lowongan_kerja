<?php
/*the code below is used for configuration, you can put some necessary change here */
/*kode dibawah ini digunakan untuk konfigurasi, anda melakukan perubahan yang diperlukan*/

$config["base_url"]="http://127.0.0.1/lowongan_kerja/";
$config["default_controller"]="Home";
$config["default_class"]="Home";
$config["error_404"]="Notfound";
$config["load_library"]="Db,Random,phpmailer";
$config["database_config"]=array(
	"host"=>"localhost",
	"user"=>"root",
	"password"=>"12345",
	"db"=>"dbloker"
);

//uncomment section below if you want to enable the phpmailer

$config["email_conf"]=array(
	//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
	"smtp_debug"=>0,
	//your email's username
	"Username"=>"youremail@yahoo.com",
	//your email's password
	"Password"=>"y0urp455w0rd",
	"setfrom_email"=>"youremail@yahoo.com",
	"setfrom_name"=>"Your Name",
	"is_html"=>TRUE
);
/*password database FI9WgaYcYf6S 
username proe1532_root
db_name=proe1532_sp_kom


/*please dont change the code inside the '*' box /// tolong jangan rubah kode didalam kotak '*' */

/* *****************************************************/
 define("DEV_CON", $config["default_controller"]);
 define("DEV_CL", $config["default_class"]);
 define("ERROR_404", $config["error_404"]);
 define("LOAD_LIBRARY", $config["load_library"]);
 define("HOST", $config["database_config"]["host"]);
 define("USER", $config["database_config"]["user"]);
 define("PASSWORD", $config["database_config"]["password"]);
 define("DB", $config["database_config"]["db"]);
 define("BASE_URL", $config["base_url"]);
 //uncomment section below if you use phpmailer 
 define("EMAIL_CONF", $config["email_conf"]);
/* *****************************************************/

/*if you want to add another constant variable, you can do it below /// jika anda ingin menambah variabel konstan, anda bisa tambahkan dibawah ini */

?>