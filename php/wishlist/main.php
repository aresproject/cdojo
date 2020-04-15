<?php
session_start();
include("config.php");

//var_dump($_SESSION);
//var_dump($_POST);


?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="container">

      <h2>Welcome!</h2>
      <div class="row">
        <div class="col-md-6">
          <?php
            if(isset($_SESSION['error_register'])) {
              foreach($_SESSION['error_register'] as $collection) {
                foreach($collection as $value) {
                  echo "<p>" . $value . "</p>";
                }
              }
            }
            unset($_SESSION['error_register']);
           ?>
        </div>
      </div>
      <div class="row">
        <!-- REGISTRATION FORM -->
        <div class="col-md-6">
          <form action="process.php" method="post">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="" name="register_name" required>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="" name="register_username" required>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="register_password" placeholder="Password" required>
              </div>
            </div>
            <p>Password should be at least 8 characters</p>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Confirm Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" value="" name="confirm_password" required>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Date Hired</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" value="" name="register_datehired" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <input type="hidden" name="action" value="register">
          </form>
        </div>

        <!-- LOGIN FORM -->
        <div class="col-md-6">
          <form action="process.php" method="post">
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="login_username" required>
                <p><?php echo $_SESSION['error_login']; ?></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="login_password" id="inputPassword" placeholder="Password" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <input type="hidden" name="action" value="login">
          </form>
          <p><?php echo $_SESSION['login_error']; ?></p>
       </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company <?php echo date("Y"); ?></p>
      </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
