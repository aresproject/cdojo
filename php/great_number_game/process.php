<?php
session_start();

if(isset($_POST['action']) && $_POST['action'] == "reset"){
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
    return $result;
  }
  elseif ($number > $rnd) {
    $result = "$number is too low";
    $_SESSION['color'] = "resultred";
    return $result;
  }
  elseif ($number < $rnd) {
    $result = "$number is too high";
    $_SESSION['color'] = "resultred";
    return $result;
  }
  else {
    $_SESSION['error'] = "Please Input A Valid Number";
  }
}
?>
