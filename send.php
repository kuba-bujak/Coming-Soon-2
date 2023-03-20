<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
	//Server settings
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'username';                     //SMTP username
	$mail->Password   = 'password';                               //SMTP password
	$mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
	$mail->Port       = 465;                                    //TCP port to connect to; use 587

	//Recipients
	$mail->setFrom('stazwww1@ltb.pl', 'Stazysta w firmie LTB');
	$mail->addAddress($_POST['email']);     //Add a recipient

	//Attachments

	//Content
	$mail->isHTML(true);                                  //Set email format to HTML
	$mail->Subject = 'Welcome in our team';
	$mail->Body    = 'Thank you for being with us<br> 
	 We will notify you when work on the site is completed';

	$mail->send();
	echo
	"<script>
		alert('Sent Successfully');
		document.location.href = 'index.html';
	 </script>";
} catch (Exception $e) {
	echo
	"<script>
	 	alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
		 document.location.href = 'index.html';
	 </script>";
}
