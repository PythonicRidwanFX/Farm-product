<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions

$mail = new PHPMailer(true);

//Server settings
$mail->isSMTP();                              //Send using SMTP
$mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
$mail->SMTPAuth   = true;             //Enable SMTP authentication
$mail->Username   = 'faridullahiabdulazeez@gmail.com';   //SMTP write your email
$mail->Password   = 'ehztufbfzpdnccsv';      //SMTP password
$mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
$mail->Port       = 465;

//Recipients
$mail->setFrom($email); // Sender Email and name
$mail->addAddress($email);     //Add a recipient email  
$mail->addReplyTo($email); // reply to sender email

//Content
$mail->isHTML(true);               //Set email format to HTML
$mail->Subject = "Two Factor Authentication with OTP";   // email subject headings
$mail->Body    = $mess; //email message

// Success sent message alert
$mail->send();