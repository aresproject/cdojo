<?php
session_start();
if($_POST['action'] == 'farm') $pid[] = "<span class='green'> You entered a " . $_POST['action'] . " and earned " .  $_POST['farm']  . " golds " . date('F jS Y g:ia') . "</span> <br>";
elseif($_POST['action'] == 'cave') $pid[] = "<span class='green'> You entered a " . $_POST['action'] . " and earned " .  $_POST['cave']  . " golds " . date('F jS Y g:ia') . "</span> <br>";
elseif($_POST['action'] == 'house') $pid[] = "<span class='green'> You entered a " . $_POST['action'] . " and earned " .  $_POST['house']  . " golds " . date('F jS Y g:ia') . "</span> <br>";
if($_POST['action'] == 'casino' && $_POST['odds'] == 0) {
  $_SESSION['gold'] = $_POST['casino']  *= -1;
  $pid[] = "<span class='red'> You entered a " . $_POST['action'] . " and lost " . $_SESSION['gold'] . " golds... ouch... " . date('F jS Y g:i a') . "</span> <br>"; }
elseif($_POST['action'] == 'casino' && $_POST['odds'] == 1) $pid[] = "<span  class='green'> You entered a " . $_POST['action'] . " and earned " . $_POST['casino']  . " golds " . date('F jS Y g:ia') ."</span> <br>";
$_SESSION['Total_gold'] += $_SESSION['gold'];
$_SESSION['results'][] = $pid;
header("Location: index.php");
?>
