<?php
include "classes/class.phpmailer.php";

class php_mailer{
	private $to;
	private $subject;
	private $content;
	public function set_param($param){
		$this->to=$param["to"];
		$this->subject=$param["subject"];
		$this->content=$param["content"];
		return $this;
	}
	public function do_send(){
		$mail = new PHPMailer; 
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl'; 
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPDebug = EMAIL_CONF["smtp_debug"];
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->Username = EMAIL_CONF["Username"];
		$mail->Password = EMAIL_CONF["Password"];
		$mail->SetFrom(EMAIL_CONF["setfrom_email"], EMAIL_CONF["setfrom_name"]);
		$mail->Subject = $this->subject;
		$mail->AddAddress($this->to, 'John Doe');  //tujuan email
		$mail->MsgHTML($this->content);
		if($mail->Send()) echo "Message has been sent";
		else echo "Failed to sending message";
			
		}
}
?>