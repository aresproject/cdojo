<?php
session_start();
include("config.php");
//Verify If A user is logged in... redirect to login page otherwise
if(!isset($_SESSION['logged_userid'])){
  header("Location: main.php");
}
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
      <div class="container">
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4">
            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-primary">
              <a class="navbar-brand" href="dashboard.php">Home</a>
              <a class="navbar-brand" href="process.php?logout=1">Logout</a>
            </nav>
          </div>
        </div>
      </div>

      <div class="container">
        <?php
          //Display Notifications Messages to user
          if(isset($_SESSION['notification'])){
            echo "<div class='row'>";
            echo "<div class='col-md-12'>";
            echo "<div class='alert alert-secondary' role='alert'>";
            echo "<p>" . $_SESSION['notification'] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            unset($_SESSION['notification']);
          }
        ?>
        <div class="row">
          <div class="col-md-12">
            <h2>Create a New Wish List Item</h2>
          </div>

            <div class="col-md-12">
            <form action="process.php" method="post">
              <div class="form-group row">
                <label for="itemname" class="col-sm-2 col-form-label">Item/Product</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="itemname" required>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Add</button>
              <input type="hidden" name="action" value="create">
            </form>
            </div>

        </div>
        </div>


 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>
