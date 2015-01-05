<?php
	require "PHPMailerAutoload.php";
	
	$mail =  new PHPMailer;
	$mail->isSMTP();
	$mail->Host = 'smtp.163.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'lijing48301243@163.com';
	$mail->Password = 'syshjxhl10.4';

	$mail->From = 'lijing48301243@163.com';
	$mail->FromName = 'ssigned问询';
	$mail->addAddress($_REQUEST['to-email'],'lijing-hutc');

	$subject = $_REQUEST['name'];
	$message = $_REQUEST['message'];
	

	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->AltBody = $message;


	if(!$mail->send()){
		echo 'Message could not be sent';
		echo 'Mailer Error: '.$mail->ErrorInfo;
	} else {
		echo 'Message has been sent';
	}
?>
