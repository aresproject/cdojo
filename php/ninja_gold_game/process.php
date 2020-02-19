<?php
session_start();

if(isset($_POST['action']) && $_POST['action'] == "reset"){
  session_destroy();
  header("Location: index.php");
}

if(isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'farm':
      $_SESSION['place'] = $_POST['action'];
      $_SESSION['gold'] = rand(10,20);
      $_SESSION['time'] = date("F jS Y g:i a");

      $pid[] = "<span style='color: green;'> You entered a " .  $_SESSION['place'] . " and earned " .  $_SESSION['gold'] . " golds " . $_SESSION['time']  ."</span> <br>";

      break;
    case 'cave':
      $_SESSION['place'] = $_POST['action'];
      $_SESSION['gold'] = rand(5,10);
      $_SESSION['time'] = date("F jS Y g:i a");

      $pid[] = "<span style='color: green;'> You entered a " .  $_SESSION['place'] . " and earned " .  $_SESSION['gold'] . " golds " . $_SESSION['time']  ."</span> <br>";

      break;
    case 'house':
      $_SESSION['place'] = $_POST['action'];
      $_SESSION['gold'] = rand(2,5);
      $_SESSION['time'] = date("F jS Y g:i a");

      $pid[] = "<span style='color: green;'> You entered a " .  $_SESSION['place'] . " and earned " .  $_SESSION['gold'] . " golds " . $_SESSION['time']  ."</span> <br>";

      break;
    case 'casino':
      $_SESSION['place'] = $_POST['action'];
      $odds  = rand(1,2);
      $_SESSION['time'] = date("F jS Y g:i a");
      if($odds == 1) {
        $_SESSION['gold'] = rand(0,50);
        $pid[] = "<span style='color: green;'> You entered a " .  $_SESSION['place'] . " and earned " .  $_SESSION['gold'] . " golds " . $_SESSION['time']  ."</span> <br>";
      }
      elseif ($odds == 2) {
        $_SESSION['gold'] = rand(0,50) * -1;
        $pid[] = "<span style='color: red;'> You entered a " .  $_SESSION['place'] . " and lost " .  $_SESSION['gold'] . " golds... Ouch... " . $_SESSION['time']  ."</span> <br>";
      }

      break;
  }
}

$_SESSION['Total_gold'] += $_SESSION['gold'];
$_SESSION['results'][] = $pid;
header("Location: index.php");

?>
