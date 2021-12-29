<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php include 'include/db.php'; ?>
<?php require __DIR__ . '/mailconf.php'; ?>
<?php session_start(); ?>

<?php
$code = rand(10000000, 99999999);
$name = mysqli_escape_string($connection, $_POST['name']);
$email = mysqli_escape_string($connection, $_POST['email']);
$sch_no = mysqli_escape_string($connection, $_POST['sch_no']);
$number = mysqli_escape_string($connection, $_POST['number']);
$college = mysqli_escape_string($connection, $_POST['college']);
$year = mysqli_escape_string($connection, $_POST['year']);
$course = mysqli_escape_string($connection, $_POST['course']);
$otp = rand(1000, 9999);

$_SESSION['name'] = $name;
$_SESSION['email'] = $email;

if ($sch_no != "") {
    $payment_status = "MANIT NOT VERIFIED";
    $sub = "NO REPLY - OTP VERIFICATION";
    $msg = "
        Mr/Ms. $name,
        <br>
        The OTP for the verification of MANIT Student is
        <br><br>
        <h1>$otp</h1>
        <br><br>
        Regards,
        <br>
        E-Cell NIT Bhopal";
    $rec = $sch_no . "@manitacin.onmicrosoft.com";
    if (sendmail($sub, $msg, $rec)) {
        $query = "INSERT INTO crypto (code, name, email, sch_no, number, college, year, course, otp, payment_status)";
        $query .= "VALUES('{$code}', '{$name}', '{$email}','{$sch_no}', '{$number}', '{$college}', '{$year}', '{$course}', '{$otp}', '{$payment_status}')";
        $update_file = mysqli_query($connection, $query);
        if (!$update_file) {
            echo "Failed";
            die("Failed to update " . mysqli_error($connection));
        } elseif ($update_file) {
            // echo "You are successfully registered";
            $_SESSION['sch_no'] = $sch_no;
            $_SESSION['otp'] = $otp;
            $_SESSION['code'] = $code;
            header("Location: manit/otp.php");
        }
    }
} else {
    $payment_status = "NON-MANIT NON PAID";
    $query = "INSERT INTO crypto (code, name, email, sch_no, number, college, year, course, otp, payment_status)";
    $query .= "VALUES('{$code}', '{$name}', '{$email}', '{$sch_no}', '{$number}', '{$college}', '{$year}', '{$course}', '{$otp}', '{$payment_status}')";
    $update_file = mysqli_query($connection, $query);
    if (!$update_file) {
        echo "Failed";
        die("Failed to update " . mysqli_error($connection));
    } elseif ($update_file) {
        echo "You are sucessfully registered";
        $_SESSION['code'] = $code;
        header("Location: payment_crypto/payment.php");
    }
}
?>