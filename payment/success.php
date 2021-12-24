<?php
include '../include/db.php';
session_start();
$name = $_GET['name'];
$email = $_GET['email'];
?>

<?php require __DIR__ . '../mailconf.php'; ?>

<?php
$sql = "UPDATE stock SET payment_status='PAID' WHERE name LIKE $name AND email LIKE $email";
if ($connection->query($sql) === TRUE) {
    $sub = "NO REPLY - PAYMENT SUCCESSFUL";
    $msg = "
        Mr/Ms. $name,
        <br>
        You have been successfully registered.
        <br>
        Regards,
        <br>
        E-Cell NIT Bhopal";
    $rec = $email;
    sendmail($sub, $msg, $rec);
    header("Location: payment-success.html");
} else {
    $sub = "NO REPLY - PAYMENT SUCESSFUL BUT REGISTRATION FAILED";
    $msg = "
        Mr/Ms. $name,
        <br>
        If you have recieved this mail, that means we have received your amount but you have not been registered due to some server error.
        <br>
        Regards,
        <br>
        E-Cell NIT Bhopal";
    $rec = $email;
    sendmail($sub, $msg, $rec);
    echo "Error updating record: " . $connection->error;
    header("Location: payment-failed.html");
}
?>