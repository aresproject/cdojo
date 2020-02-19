<?php
session_start();
$string = "123";
$string1 = "abc";
$string2 = "$string $string1";
$log[] = $string;
$log[] = $string1;
$log[] = $string2;


//$_SESSION['test'][] = $log;
//$_SESSION['test'] = array();
$_SESSION['test'] = $log;



/*foreach($log as $loggers){
  echo $loggers . "<br>";
  $_SESSION['test'][] = $loggers;
}*/

echo "First Loop: <br>";
foreach($_SESSION['test'] as $value){
  foreach($value as $item) {
    echo $item . "<br>";
  }
}

echo "<br><br> Second Loop: <br>";
foreach($_SESSION['test'] as $value){
    echo $value . "<br>";
}
echo "<br><br>";


echo '<pre>' , var_dump($log) , '</pre>';




?>
