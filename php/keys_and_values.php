<?php

$users['first_name'] = "Jon";
$users['last_name'] = "Snow";
$users['test1'] = "abcde";
$users['test2'] = true;
$users['test3'] = 12;

echo "There are " . count($users) . " keys in this array <br>";
foreach($users as $value) {
  echo key($users) . "<br>";
  next($users);
}
reset($users);

foreach($users as $value) {
  echo "The value in the key '" . key($users) . "' is '" . current($users) . "'.<br>";
  next($users);
}

?>
