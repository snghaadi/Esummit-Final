<!DOCTYPE html>
<html lang="en">

<?php
include '../include/db.php';
session_start();
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-Summit 2022 | E-Cell NITB</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/payment.css" />
</head>

<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "C5UgFd";
$SALT = "VtJ2cMfmZJ0hmVWtIVJmCDEJl5nLcXZ7";
$txnid = bin2hex(random_bytes(20));
$name = $_SESSION['name_1'];
$email = $_SESSION['email_1'];
$code = $_SESSION['code'];
$amount = 100;
$productInfo = "Payment for IPL Auctions";
$surl = "https://esummit.ecellnitb.com/payment/success.php?name=$name&email=$email&code=$code"; //success URL
$furl = "https://esummit.ecellnitb.com/payment/failure.php?name=$name&email=$email&code=$code"; //failure URL


// Merchant Salt as provided by Payu

$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
$hashString = $MERCHANT_KEY . "|" . $txnid . "|" . $amount . "|" . $productInfo . "|" . $name . "|" . $email . "|||||||||||" . $SALT;
$hash = strtolower(hash('sha512', $hashString));
?>

<center>
  <h1>PAYMENT DETAILS</h1>
  <form action="https://secure.payu.in/_payment" name="payuform" method=POST>
    <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash; ?>" />
    <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
    <table>
      <tr>
        <td>Full Name: </td>
        <td><input colspan="5" name="firstname" id="firstname" value="<?php echo $name; ?>" /></td>
      </tr>
      <tr>
        <td>Email: </td>
        <td><input colspan="5" name="email" id="email" value="<?php echo $email; ?>" /></td>
      </tr>
      <tr>
        <td>Amount: </td>
        <td><input colspan="5" name="amount" value="<?php echo $amount; ?>" /></td>
      </tr>
      <tr>
        <td>Product Info: </td>
        <td colspan="5"><textarea name="productinfo"><?php echo $productInfo; ?></textarea></td>
      </tr>
      <tr>
        <td colspan="5"><input type="hidden" name="surl" size="64" value="<?php echo $surl; ?> " /></td>
      </tr>
      <tr>
        <td colspan="5"><input type="hidden" name="furl" size="64" value="<?php echo $furl; ?> " /></td>
      </tr>
      <tr>
        <td colspan="5"><input type="hidden" name="service_provider" value="" /></td>
      </tr>
      <tr class="sub">
        <td colspan="5"><input type="submit" value="Submit" /></td>
      </tr>
    </table>
  </form>
</center>

</html>