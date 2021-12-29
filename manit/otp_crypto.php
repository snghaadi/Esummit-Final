<!DOCTYPE html>
<html lang="en">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
session_start();
include '../include/db.php';
$code = $_SESSION['code'];
$sch_no = $_SESSION['sch_no'];
$otp = $_SESSION['otp'];
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Summit 2022 | E-Cell NITB</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
      <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
        <img class="object-cover object-center rounded" alt="hero" src="img/otp.svg">
      </div>
      <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Didn't get the OTP ??</h1>
        <p class="mb-8 leading-relaxed">Please upload a google drive link of your MANIT ID Card or Provisional Admit Card....We'll manually verify and send you an email</p>
        <p class="mb-8 leading-relaxed">Kindly make sure that the link is publicly shared :)</p>
        <div class="flex w-full md:justify-start justify-center items-end">
          <form method="post" action="">
            <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4">
              <label for="hero-field" class="leading-7 text-sm font-bold text-gray-600">Admit Card Link</label>
              <input type="text" id="hero-field" placeholder="e.g. https://drive.google.com/file/d/16SZhkLXHv9A8ubVDMAo8Wl_HojSBPsRR/view?usp=sharing" name="link" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <br>
            <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" name="submit_2">Submit for Manual Verification</button>
          </form>
        </div>
      </div>
      <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Please enter OTP</h1>
        <p class="mb-8 leading-relaxed">We have sent you OTP on <?php echo $sch_no ?>@manit.ac.in if you are facing problem with OTP please try again...</p>
        <div class="flex w-full md:justify-start justify-center items-end">
          <form method="post" action="">
            <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4">
              <label for="hero-field" class="leading-7 text-sm font-bold text-gray-600">One Time Password</label>
              <input type="text" id="hero-field" placeholder="e.g. 9753" name="otp" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <br>
            <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" name="submit">Verify</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $user_otp = $_POST['otp'];
  if ($user_otp == $otp) {
    $sql = "UPDATE crypto SET payment_status='MANIT VERIFIED' WHERE code LIKE $code";

    if ($connection->query($sql) === TRUE) {
      // echo "Record updated successfully";
?>
      <script>
        swal("Good job!", "You are sucessfully registered", "success")
      </script>
    <?php
      header("refresh:1;url=../crypto.html");
    } else {
      echo "Error updating record: " . $connection->error;
    }
  } else {
    ?>
    <script>
      swal("Something went wrong !", "OTP do not match<br>Please try again", "error");
    </script>
<?php
  }
}
?>

<?php
if (isset($_POST['submit_2'])) {
  $link = mysqli_escape_string($connection, $_POST['link']);
  // echo $link;
  $sql = "UPDATE crypto SET payment_status = '{$link}' WHERE code LIKE $code";
  if ($connection->query($sql) === TRUE) {
    // echo "Record updated successfully";
?>
    <script>
      swal("Good job!", "Wait for manual verification", "success");
    </script>
  <?php
    header("refresh:1;url=../crypto.html");
  } else {
    echo "Error updating record: " . $connection->error;
  ?>
    <script>
      swal("Something went wrong !", "Please try again", "error");
    </script>
<?php
  }
}
?>