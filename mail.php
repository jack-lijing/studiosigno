<?php
	require "PHPMailerAutoload.php";
	
	$mail =  new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'smtp.163.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'lijing48301243@163.com';
	$mail->Password = 'syshjxhl10.4';


	$mail->From = "lijing48301243@163.com"; 
	$mail->FromName = '咨询:'.$_POST['name'].$_POST['from'];
	$mail->addAddress($_POST['to'],'02212@hutc.zj.cn');

	$message = $_POST['message'];
	

	$mail->Subject = "来自网站的设计咨询";
	$mail->Body = $message;
	$mail->AltBody = $message;


	if(!$mail->send()){
		echo 'Message could not be sent';
		echo 'Mailer Error: '.$mail->ErrorInfo;
	} else {
		echo '发送成功!';
	}
?>
