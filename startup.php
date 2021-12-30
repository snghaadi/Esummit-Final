<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php include 'include/db.php'; ?>

<?php
$startup_name = mysqli_escape_string($connection, $_POST['startup_name']);
$official_email = mysqli_escape_string($connection, $_POST['official_email']);
$industry = mysqli_escape_string($connection, $_POST['industry']);
$company_name = mysqli_escape_string($connection, $_POST['company_name']);
$name_poc = mysqli_escape_string($connection, $_POST['name_poc']);
$number_poc = mysqli_escape_string($connection, $_POST['number_poc']);
$name_founder = mysqli_escape_string($connection, $_POST['name_founder']);
$linkedin_founder = mysqli_escape_string($connection, $_POST['linkedin_founder']);
$name_cofounder = mysqli_escape_string($connection, $_POST['name_cofounder']);
$linkedin_cofounder = mysqli_escape_string($connection, $_POST['linkedin_cofounder']);
$website_link = mysqli_escape_string($connection, $_POST['website_link']);
$social_media = mysqli_escape_string($connection, $_POST['social_media']);
$round = mysqli_escape_string($connection, $_POST['round']);
$idea = mysqli_escape_string($connection, $_POST['idea']);
$question = mysqli_escape_string($connection, $_POST['question']);

$query = "INSERT INTO expo (startup_name, official_email, industry, company_name, name_poc, number_poc, name_founder, linkedin_founder, name_cofounder, linkedin_cofounder, website_link, social_media, round, idea, question)";

$query .= "VALUES('{$startup_name}', '{$official_email}', '{$industry}', '{$company_name}', '{$name_poc}', '{$number_poc}', '{$name_founder}', '{$linkedin_founder}', '{$name_cofounder}', '{$linkedin_cofounder}', '{$website_link}', '{$social_media}', '{$round}', '{$idea}', '{$question}')";

$update_file = mysqli_query($connection, $query);
if (!$update_file) {
    die("Failed to update " . mysqli_error($connection));
} elseif ($update_file) {
    echo "You are sucessfully registered";
    header("Location: thankyou.html");
}
?>