<!DOCTYPE html>
<html lang="en">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
session_start();
include '../include/db.php';
$code = $_SESSION['code'];
$sch_no = $_SESSION['sch_no'];
// $otp = $_SESSION['otp'];
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/logo/logo.png">
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
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">MANIT Verification</h1>
        <strong><h3>To be filled only on behalf of team leader if all the members of your team are MANITian</h3></strong>
        <p class="mb-8 leading-relaxed">Please upload a google drive link of your MANIT ID Card or Provisional ID Card or JOSSA/DASA Allotment Letter or anything that proves you are a MANITian.If you have any confusion contact us at</p>
        <p>+91 8957946660</p>
        <p class="mb-8 leading-relaxed">Kindly make sure that the link is publicly shared :)</p>
        <div class="flex w-full md:justify-start justify-center items-end">
          <form method="post" action="">
            <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4">
              <label for="hero-field" class="leading-7 text-sm font-bold text-gray-600">Google Drive Link</label>
              <input type="text" id="hero-field" placeholder="e.g. https://drive.google.com/file/d/16SZhkLXHv9A8ubVDMAo8Wl_HojSBPsRR/view?usp=sharing" name="link" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <br>
            <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" name="submit_2">Submit</button>
          </form>
        </div>
      </div>
       <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Caution</h1>
        <strong><p class="mb-8 leading-relaxed">If any member of your team is non-MANITian, please click the button below</p></strong>
        <p class="mb-8 leading-relaxed">Otherwise your team registration will be deemed invalid</p>
        <div class="flex w-full md:justify-start justify-center items-end">
          <form method="post" action="">
            <!--<div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4">-->
            <!--  <label for="hero-field" class="leading-7 text-sm font-bold text-gray-600">One Time Password</label>-->
            <!--  <input type="text" id="hero-field" placeholder="e.g. 9753" name="otp" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">-->
            <!--</div>-->
            <br>
            <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" name="submit">Proceed to payment</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
?>
    <script>
        window.location.href = '../payment/payment.php';
    </script>
<?php
}
?>

<?php
if (isset($_POST['submit_2'])) {
  $link = mysqli_escape_string($connection, $_POST['link']);
  // echo $link;
  $sql = "UPDATE ipl SET payment_status = '{$link}' WHERE code LIKE $code";
  if ($connection->query($sql) === TRUE) {
    // echo "Record updated successfully";
?>
    <script>
      swal("Good job!", "You are now successfully registered", "success");
      setTimeout(function() {
        window.location.href = '../ipl.html';
      }, 1000);
    </script>
  <?php
    // header("refresh:1;url=../ipl.html");
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