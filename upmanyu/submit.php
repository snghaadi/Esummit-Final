<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>E-Summit 2022 | E-Cell NITB</title>

    <link rel="shortcut icon" href="assets/logo/logo.png">

    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/improve.css">
    <link rel="stylesheet" href="assets/css/test1.css">
    <link rel="stylesheet" href="assets/css/upmanyu.css">
    <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
    <script defer>
        function createRipple(event) {
            const button = event.currentTarget;
            const circle = document.createElement("span");
            const diameter = Math.max(button.clientWidth, button.clientHeight);
            const radius = diameter / 2;
            circle.style.width = circle.style.height = `${diameter}px`;
            circle.style.left = `${event.clientX - button.offsetLeft - radius}px`;
            circle.style.top = `${event.clientY - button.offsetTop - radius}px`;
            circle.classList.add("ripple");
            const ripple = button.getElementsByClassName("ripple")[0];
            if (ripple) {
                ripple.remove();
            }
            button.appendChild(circle);
        }

        const buttons = document.getElementsByTagName("button");
        for (const button of buttons) {
            button.addEventListener("click", createRipple);
        }
    </script>

</head>
<style>
    .button-reg {
        display: flex;
        justify-content: center;

    }

    .cont {
        /* min-height: 100vh; */
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 100px 0;
        background-color: #f7f7f7;
    }

    .font-head {
        font-size: 20px;
    }

    @media(max-width:450px) {
        .button-reg {
            display: flex;
            justify-content: center;
            margin: -34px;
            margin-bottom: 23px;


        }

        .padding-top-120 {
            padding-top: 35px;
        }


    }
</style>

<body>

    <div class="preloader">
        <div class="loader"></div>
    </div>


    <section style="padding-top: 23px;">
        <h2>Thank you for your Registation</h2>
    </section>
    <section class="aboutsection">
        <div class="innerabout">
            <div class="leftabout">
                <h2>Edvoy</h2>
                <p>

                    Edvoy is a one-stop platform for your entire study abroad journey. Working in collaboration with IEC
                    Abroad since 2007, Edvoy has defined the global education experience in the digital world. Edvoy
                    visions to streamline the world of education through technology by empowering students to make wiser
                    and easier decisions as they pursue their educational goals. Known for their seamless process and
                    global network, they connect students and education providers. Check out Edvoy at their official
                    website.</p>
            </div>
            <div class="rightabout">
                <img src="assets/image/illustration.png" alt="">
            </div>
        </div>
    </section>

    <div class="scrollup"><i class="fas fa-level-up"></i></div>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/counterup.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/easing.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/techwork.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>

<?php include '../include/db.php'; ?>

<?php
$name = mysqli_escape_string($connection, $_POST['name']);
$email = mysqli_escape_string($connection, $_POST['email']);
$number = mysqli_escape_string($connection, $_POST['number']);
$college = mysqli_escape_string($connection, $_POST['college']);
$year = mysqli_escape_string($connection, $_POST['year']);
$course = mysqli_escape_string($connection, $_POST['course']);
$ca_code = mysqli_escape_string($connection, $_POST['ca_code']);

$query = "INSERT INTO upmanyu (name, email, number, college, year, course, ca_code)";

$query .= "VALUES('{$name}', '{$email}', '{$number}', '{$college}', '{$year}', '{$course}', '{$ca_code}')";

$update_file = mysqli_query($connection, $query);
if (!$update_file) 
{
    echo "Failed";
    die("Failed to update " . mysqli_error($connection));
} 
elseif ($update_file) 
{
?>
<script>
    setTimeout(function(){
            window.location.href = 'index.html';
         }, 5000);
</script>
<?php
    // echo "You are sucessfully registered";
}
?>
