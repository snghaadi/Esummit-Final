<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php include 'include/db.php'; ?>

<?php
// if(isset($_POST['submit']))
// {
$team_name = mysqli_escape_string($connection, $_POST['team_name']);
$team_college = mysqli_escape_string($connection, $_POST['team_college']);
$name_1 = mysqli_escape_string($connection, $_POST['name_1']);
$email_1 = mysqli_escape_string($connection, $_POST['email_1']);
$number_1 = mysqli_escape_string($connection, $_POST['number_1']);
$name_2 = mysqli_escape_string($connection, $_POST['name_2']);
$email_2 = mysqli_escape_string($connection, $_POST['email_2']);
$number_2 = mysqli_escape_string($connection, $_POST['number_2']);
$name_3 = mysqli_escape_string($connection, $_POST['name_3']);
$email_3 = mysqli_escape_string($connection, $_POST['email_3']);
$number_3 = mysqli_escape_string($connection, $_POST['number_3']);
$name_4 = mysqli_escape_string($connection, $_POST['name_4']);
$email_4 = mysqli_escape_string($connection, $_POST['email_4']);
$number_4 = mysqli_escape_string($connection, $_POST['number_4']);

$query = "INSERT INTO bplan (team_name, team_college, name_1, email_1, number_1, name_2, email_2, number_2, name_3, email_3, number_3, name_4, email_4, number_4)";

$query .= "VALUES('{$team_name}', '{$team_college}', '{$name_1}', '{$email_1}', '{$number_1}', '{$name_2}', '{$email_2}', '{$number_2}', '{$name_3}', '{$email_3}', '{$number_3}', '{$name_4}', '{$email_4}', '{$number_4}')";

$update_file = mysqli_query($connection, $query);
if (!$update_file) {
    die("Failed to update " . mysqli_error($connection));
} elseif ($update_file) {
    echo "You are sucessfully registered";
?>
    <script>
        swal("Good job!", "You are sucessfully registered", "success")
    </script>
<?php
    header("refresh:1;url=bplan.html");
}
// }
?>