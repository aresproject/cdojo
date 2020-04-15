<?php
session_start();
function quest($place, $min, $max){
  $_SESSION['gold'] = rand($min, $max);
  return "<span style='color: green;'> You entered a " . $place . " and earned " .  $_SESSION['gold'] . " golds " . date('F jS Y g:i a')  ."</span> <br>";
}
if($_POST['action'] == 'farm') {
  $pid[] = quest($_POST['action'], 10, 20);
}
elseif($_POST['action'] == 'cave') {
  $pid[] = quest($_POST['action'], 5, 10);
}
elseif($_POST['action'] == 'house') {
  $pid[] = quest($_POST['action'], 2, 5);
}
elseif($_POST['action'] == 'casino') {
  $_SESSION['gold'] = rand(0,50);
  $odds  = (rand(0,1) < 1) ? $_SESSION['gold'] *= -1 : $_SESSION['gold'];
  if($odds > 0) {
    $pid[] = "<span style='color: green;'> You entered a " .  $_POST['action'] . " and earned " .  $_SESSION['gold'] . " golds " . date('F jS Y g:i a')  ."</span> <br>";
  }
  else $pid[] = "<span style='color: red;'> You entered a " .  $_POST['action'] . " and lost " .  $_SESSION['gold'] . " golds... Ouch... " . date('F jS Y g:i a')  ."</span> <br>";
}
$_SESSION['Total_gold'] += $_SESSION['gold'];
$_SESSION['results'][] = $pid;
if(isset($_POST['action']) && $_POST['action'] == "reset"){
  session_destroy();
}
header("Location: index.php");
?>
