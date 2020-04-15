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
        <title>Dashboard</title>
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
              <a class="navbar-brand" href="create.php">Create</a>
              <a class="navbar-brand" href="process.php?logout=1">Logout</a>
            </nav>
          </div>
        </div>
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
          <?php //Display The User's Name
          echo "<h2>Hello " . $_SESSION['logged_name'] . "</h2>";
          ?>
        </div>
        <div class="row">
          <h3>Your Wish List</h3>
          <div class="col-md-12">
            <table class='table'><tr><th>Item</th><th>Created By</th><th>dateadded</th><th>action</th></tr>

          <?php
          if(!$_SESSION['logged_userid']) {
            session_unset();
            session_destroy();
            header("Location: main.php");
          }
          else {
            $sql = "SELECT w.id, i.itemid, i.itemname, u.name, w.dateadded, w.userid, i.addedby FROM wishlist AS w
             LEFT JOIN items AS i ON i.itemid = w.itemid
             LEFT JOIN users AS u on u.userid = i.addedby
             WHERE w.userid =" . $_SESSION['logged_userid'];
            $result = $db->query($sql);


            if ($result->num_rows > 0) {
              // output data of each row
                while($row = $result->fetch_assoc()) {
                    if($_SESSION['logged_userid'] == $row['addedby']){ //if the item is created by the current logged user the option is delete
                      echo "<tr><td><a href='view.php?itemid={$row['itemid']} &userid={$row['userid']}'>{$row['itemname']}</a></td>";
                      echo "<td>{$row['name']}</td>";
                      echo "<td> {$row['dateadded']}</td>";
                      echo "<td><a href='process.php?itemid={$row['itemid']}&userid={$row['userid']}&control=delete'>Delete</a></td></tr>";
                    } else { //otherwise provide option to remove only
                      echo "<tr><td><a href='view.php?itemid={$row["itemid"]}&userid={$row["userid"]}'>{$row["itemname"]}</a></td><td>{$row["name"]}</td><td> {$row["dateadded"]}</td><td><a href='process.php?itemid={$row["itemid"]}&userid={$row["userid"]}&control=remove'>Remove from my wishlist</a></td></tr>";
                    }

                }
            } else {
                echo "<tr><td></td><td></td><td></td></tr>";
            }
          }
          //Bring back the user to login form if he is not logged in

          ?>
          </table>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
            <h5>Other User's Wishlist</h5>
            <div class="col-md-12">
              <table class='table'><tr><th>Item</th><th>addedby</th><th>dateadded</th><th>action</th></tr>
                <?php
                if($_SESSION['logged_userid']) {
                  $sql = "SELECT w.id, i.itemid, u.userid, i.itemname, u.name, w.dateadded FROM wishlist AS w
                   LEFT JOIN items AS i ON i.itemid = w.itemid
                   LEFT JOIN users AS u on u.userid = w.userid
                   WHERE u.userid <> " . $_SESSION['logged_userid'];
                  $result = $db->query($sql);

                  if ($result->num_rows > 0) {
                    // output data of each row
                      while($row = $result->fetch_assoc()) {
                          echo "<tr><td><a href='view.php?itemid=" . $row["itemid"] . "&userid=" . $row["userid"] . "'>" . $row["itemname"] .  "</a></td><td>" . $row["name"] . "</td><td>" . $row["dateadded"] . "</td><td><a href='process.php?itemid=" . $row['itemid'] . "&control=add" .  "'>Add to my wishlist</a></td></tr>";
                      }
                  } else {
                      echo "<tr><td></td><td></td><td></td></tr>";
                  }
                }
                ?>
            </table>
            </div>
        </div>
      </div>


 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>
