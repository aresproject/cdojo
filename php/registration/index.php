<?php
  session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#fafafa">

  <style>
   .row p {color: red;}
   form .row label {font-size: 22px;}
   form .row input {border:1px solid black padding:10px; font-size: 18px;}
   input[type="submit"] {padding:15px; font-size: 18px; background-color: orange; color: #fff;}
   .row {margin: 20px 0 20px 0;}
   p {margin: auto;}
  </style>
</head>

<body>

<form class="" action="process.php" method="post" enctype="multipart/form-data">

  <div class="row">
    <label for="email">email *</label>
    <input type="email" name="email" value="">
    <p><?php echo $_SESSION['error_email']; ?></p>
  </div>

  <div class="row">
    <label for="first_name">first_name *</label>
    <input type="text" name="first_name" value="">
    <p><?php echo $_SESSION['error_fname']; ?></p>
  </div>

  <div class="row">
    <label for="last_name">last_name *</label>
    <input type="text" name="last_name" value="">
    <p><?php echo $_SESSION['error_lname']; ?></p>
  </div>

  <div class="row">
    <label for="password">password *</label>
    <input type="password" name="password" value="">
    <p><?php echo $_SESSION['error_password']; ?></p>
  </div>

  <div class="row">
    <label for="confirm_password">confirm_password *</label>
    <input type="password" name="confirm_password" value="">
    <p><?php echo $_SESSION['error_cpassword']; ?></p>
  </div>

  <div class="row">
    <label for="birth_date">Birth Date</label>
    <input type="text" name="birth_date" value="" placeholder="mm/dd/yyyy">
    <p><?php echo $_SESSION['error_bdate']; ?></p>
  </div>

  <div class="row">
    <label for="picture">Profile Picture (optional)</label>
    <input type="file" name="pic" value="">
  </div>

  <div class="row">
      <input type="submit" name="submit" value="Submit Form">
  </div>

</form>

<?php
  if($_SESSION['status'] == "cleared") {
    echo "<h2>Thanks for submitting your information.</h2>";
  }
?>



</body>

</html>
