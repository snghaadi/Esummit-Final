<?php
include '../include/db.php';
session_start();
$name = $_GET['name'];
$email = $_GET['email'];
$code = $_GET['code'];
?>

<?php require __DIR__ . '/mailconf.php'; ?>

<?php
$sub = "NO REPLY - PAYMENT FAILED";
$msg = "
        Mr/Ms. $name,
        <br>
        Due to some problems....Your transaction has been canceled in the mid-way.
        <br>
        If the amount is not debited from your account, please retry using your credentials, otherwise feel free to
        contact us.
        <br>
        Contact Us At : +91-8957946660
        <br>
        Regards,
        <br>
        E-Cell NIT Bhopal";
$rec = $email;
sendmail($sub, $msg, $rec);
header("Location: payment-failed.html");
?>