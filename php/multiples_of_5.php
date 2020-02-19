<?php

for($count=1;$number<1000000;$count++){
  $number = 5 * $count;
  if(is_int($number)){
    echo "$number, ";
  }
  else {
    break;
  }
}
 ?>
