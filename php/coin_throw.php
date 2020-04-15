<?php
$head = 0;
$tail = 0;
echo "<h2>Starting the program</h2>";
for($i=1; $i <= 5000; $i++) {
  $coin = rand(0,1);
  //echo "$coin <br>";
  $coin == 1 ? $head += 1 : $tail += 1;
  $result = $coin = 1 ? "head" : "tail";
  echo "Attempt #" . $i . ": Throwing a coin... it's a " . $result . "! ... Got " . $head . " head(s) so far and " . $tail . " tail(s) so far. <br>";
}
?>
