<?php
    // ini_set( 'display_errors', 1 );
    // error_reporting( E_ALL );
    // $from = "support@notesnaka.com";
    // $to = "harshutkarshmishra1998@gmail.com";
    // $subject = "Checking PHP mail";
    // $message = "PHP mail works just fine";
    // $headers = "From:" . $from;
    // if(mail($to,$subject,$message, $headers)) {
    // echo "The email message was sent.";
    // } else {
    // echo "The email message was not sent.";
    // }
?>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
      
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    $mail = new PHPMailer(true);
    // $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.hostinger.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "support@notesnaka.com";
    $mail->Password = "Utkarsh@3112";
    $mail->SetFrom("support@notesnaka.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress("harshutkarshmishra1998@gmail.com");
    
     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
?>