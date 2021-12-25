<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function sendmail($subject, $body, $address)
{
   $mail = new PHPMailer(true);
   $mail->IsSMTP(); // enable SMTP
   $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
   $mail->SMTPAuth = true; // authentication enabled
   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
   $mail->Host = "smtp.hostinger.com";
   $mail->Port = 465; // or 587
   $mail->IsHTML(true);
   $mail->Username = "esummit@ecellnitb.com";
   $mail->Password = "Teamecell2021";
   $mail->SetFrom("esummit@ecellnitb.com");
   $mail->Subject = $subject;
   $mail->Body = $body;
   $mail->AddAddress($address);
   // $mail->Send();

   if (!$mail->Send()) {
      return false;
   } else {
      return true;
   }
}
