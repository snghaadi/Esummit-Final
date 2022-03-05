<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php include 'include/db.php'; ?>

<?php
    // if(isset($_POST['submit']))
    // {
        $name = mysqli_escape_string($connection, $_POST['name']);
        $email = mysqli_escape_string($connection, $_POST['email']);
        $number = mysqli_escape_string($connection, $_POST['number']);
        $college = mysqli_escape_string($connection, $_POST['college']);
        $year = mysqli_escape_string($connection, $_POST['year']);
        $course = mysqli_escape_string($connection, $_POST['course']);
        // $exp = mysqli_escape_string($connection, $_POST['exp']);
        // $ques = mysqli_escape_string($connection, $_POST['ques']);
        $ca_code = mysqli_escape_string($connection, $_POST['ca_code']);


        $query = "INSERT INTO sa (name, email, number, college, year, course, ca_code)";

        $query .= "VALUES('{$name}', '{$email}', '{$number}', '{$college}', '{$year}', '{$course}', '{$ca_code}')";

        $update_file = mysqli_query($connection, $query);
        if(!$update_file)
        {
            echo "Failed";
            die("Failed to update ".mysqli_error($connection));
        }
        elseif($update_file)
        {
            echo "You are sucessfully registered";
            ?>
            <script>swal("Good job!", "You are sucessfully registered", "success")
            </script>
            <?php
            header("refresh:1;url=startup.html");
        }
    // }
?>