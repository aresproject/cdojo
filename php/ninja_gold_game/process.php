<?php
session_start();
if($_POST['action'] == 'farm') $pid[] = "<span class='green'> You entered a " . $_POST['action'] . " and earned " .  $_POST['farm']  . " golds " . date('F jS Y g:ia') . "</span> <br>";
elseif($_POST['action'] == 'cave') $pid[] = "<span class='green'> You entered a " . $_POST['action'] . " and earned " .  $_POST['cave']  . " golds " . date('F jS Y g:ia') . "</span> <br>";
elseif($_POST['action'] == 'house') $pid[] = "<span class='green'> You entered a " . $_POST['action'] . " and earned " .  $_POST['house']  . " golds " . date('F jS Y g:ia') . "</span> <br>";
elseif($_POST['action'] == 'casino') {
  $odds = (rand(1, 9) > 6 ? 1 : -1);
  $_SESSION['gold'] = rand(0,5) * $odds;
  if($_SESSION['gold'] < 0 ) {
    $pid[] = "<span class='red'> You entered a " . $_POST['action'] . " and lost " . $_SESSION['gold'] . " golds... ouch... " . date('F jS Y g:i a') . "</span> <br>";
  }
 else {
  $pid[] = "<span  class='green'> You entered a " . $_POST['action'] . " and earned " . $_SESSION['gold']  . " golds " . date('F jS Y g:ia') ."</span> <br>";
 }
}
$_SESSION['Total_gold'] += $_SESSION['gold'];
$_SESSION['results'][] = $pid;
header("Location: index.php");

?>
