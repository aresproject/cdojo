<?php
session_start();

if(!isset($_SESSION['guess'])){
  $_SESSION['guess'] = rand(1,100);
}

?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    textarea {display: block;}
    div {display: block;}

    label {width: 300px !important;}
    .results {width: 200px; height: 200px; margin: auto;}
    .resultgreen {background-color: green;}
    .resultred {background-color: red;}
    .resultgreen, .resultred {
      width: 11vw;
      height: auto;
      margin: auto;
      text-align: center;
      padding: 25px;
}
    }
    h1, h2, p {text-align: center; font-size: 22px; font-weight: 600;}
    form {margin: auto;}
    .container {text-align: center; margin: auto;}
    .container form input {
      display: block;
    }

    /*form {
      display: grid;
      margin: auto;
      text-align: center;
    }*/
    input[type="text"] {
      margin-bottom: 20px;
    }
    input[type="submit"] {
      font-size: 22px;
      font-weight: 600 !important;
      background-color: orange;
      border: unset;
      border-radius: 20px;
      margin-top: 25px;
      width: 150px;
      display: block;
      margin: auto;

    }

     input[type="text"] {
       width: 150px;
      height: 30px;
      margin: auto;
      border: 2px solid black;
      margin-top: 25px;
     }
  </style>
</head>


<body>

  <div class="container">
    <h1>Welcome to the Great Number Game!</h1>
    <p>I am thinking of a number between 1 and 100 <br> Take A Guess! </p>
  </div>

  <?php
  if(isset($_SESSION['results'])) {
    echo "<div class='" . $_SESSION['color']  . "'>";
    
    echo "<h2 style='color: #fff;'>" . $_SESSION['results'] . "</h2>";
    if(isset($_SESSION['replay']) && $_SESSION['replay'] == 1 ){
      echo "<form class='' action='index.php' method='post'>";
        echo "<input type='hidden' name='action' value='replay'>";
        echo "<input type='submit' name='submit' value='Play again!'>";
      echo "</form>";
    }
    echo "</div>";
  }
  ?>

  <div class="container">
    <form class="" action="index.php" method="post">
      <input type="text" name="number" value="">
      <input type="submit" name="submit" value="submit">
    </form>
  </div>


  <p>
    <?php
    //echo var_dump($_SESSION);
     ?>
  </p>

  <?php

  if(isset($_POST['action']) && $_POST['action'] == "replay"){
    session_destroy();
    header("Location: index.php");
  }

  if(isset($_POST['number'])) {
    $_SESSION['results'] = guess($_POST['number'], $_SESSION['guess']);
    header("Location: index.php");
  }

  function guess($number, $rnd) {
    if ($number == $rnd) {
      $result = "$number was the number!";
      $_SESSION['color'] = "resultgreen";
      $_SESSION['replay'] = 1;
      return $result;
    }
    elseif ($number > $rnd) {
      $result = "$number is too high";
      $_SESSION['color'] = "resultred";
      return $result;
    }
    elseif ($number < $rnd) {
      $result = "$number is too low";
      $_SESSION['color'] = "resultred";
      return $result;
    }
    else {
      $_SESSION['error'] = "Please Input A Valid Number";
    }
  }

   ?>
</body>

</html>
