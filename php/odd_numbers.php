<?php
// To Do: Odd numbers
//Create a program that prints all the odd numbers from 1 to 1000. Use the standard for loop for this exercise and don't create any arrays.

$number = 1;

for($number=1;$number<=1000;$number++){
  $val = $number % 2;
  //if($val <> 0) echo "$number, ";
  if(($number % 2) <> 0) echo "$number, ";
}

?>
