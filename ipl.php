<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php session_start(); ?>

<?php include 'include/db.php'; ?>

<?php
// if(isset($_POST['submit']))
// {
$code = rand(10000000, 99999999);
$team_name = mysqli_escape_string($connection, $_POST['team_name']);
$team_college = mysqli_escape_string($connection, $_POST['team_college']);
$name_1 = mysqli_escape_string($connection, $_POST['name_1']);
$email_1 = mysqli_escape_string($connection, $_POST['email_1']);
$number_1 = mysqli_escape_string($connection, $_POST['number_1']);
$sch_no = mysqli_escape_string($connection, $_POST['sch_no']);
$name_2 = mysqli_escape_string($connection, $_POST['name_2']);
$email_2 = mysqli_escape_string($connection, $_POST['email_2']);
$number_2 = mysqli_escape_string($connection, $_POST['number_2']);
$name_3 = mysqli_escape_string($connection, $_POST['name_3']);
$email_3 = mysqli_escape_string($connection, $_POST['email_3']);
$number_3 = mysqli_escape_string($connection, $_POST['number_3']);
$name_4 = mysqli_escape_string($connection, $_POST['name_4']);
$email_4 = mysqli_escape_string($connection, $_POST['email_4']);
$number_4 = mysqli_escape_string($connection, $_POST['number_4']);
$ca_code= mysqli_escape_string($connection, $_POST['ca_code']);

$_SESSION['name_1'] = $name_1;
$_SESSION['email_1'] = $email_1;
$_SESSION['sch_no'] = $sch_no;
$_SESSION['code'] = $code;

if ($sch_no != "") {
    $payment_status = "MANIT NOT VERIFIED";
    $query = "INSERT INTO ipl (code, team_name, team_college, name_1, email_1, number_1, sch_no, name_2, email_2, number_2, name_3, email_3, number_3, name_4, email_4, number_4, payment_status, ca_code)";

    $query .= "VALUES('{$code}', '{$team_name}', '{$team_college}', '{$name_1}', '{$email_1}', '{$number_1}', '{$sch_no}', '{$name_2}', '{$email_2}', '{$number_2}', '{$name_3}', '{$email_3}', '{$number_3}', '{$name_4}', '{$email_4}', '{$number_4}', '{$payment_status}', '{$ca_code}')";

    $update_file = mysqli_query($connection, $query);
    if (!$update_file) {
        die("Failed to update " . mysqli_error($connection));
    } elseif ($update_file) {
        // echo "You are sucessfully registered";
        // header("refresh:1;url=ipl.html");
        header("Location: manit/otp.php");
    }
} else {
    $payment_status = "NON-MANIT NON PAID";
    $query = "INSERT INTO ipl (code, team_name, team_college, name_1, email_1, number_1, sch_no, name_2, email_2, number_2, name_3, email_3, number_3, name_4, email_4, number_4, payment_status)";
    $query .= "VALUES('{$code}', '{$team_name}', '{$team_college}', '{$name_1}', '{$email_1}', '{$number_1}', '{$sch_no}', '{$name_2}', '{$email_2}', '{$number_2}', '{$name_3}', '{$email_3}', '{$number_3}', '{$name_4}', '{$email_4}', '{$number_4}', '{$payment_status}')";
    $update_file = mysqli_query($connection, $query);
    if (!$update_file) {
        echo "Failed";
        die("Failed to update " . mysqli_error($connection));
    } elseif ($update_file) {
        echo "You are sucessfully registered";
        $_SESSION['code'] = $code;
        header("Location: payment/payment.php");
    }
}
?>