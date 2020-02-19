<?php
//Get array values
function print_lists($a) {
  echo "<ul>";
  foreach ($a as $value) {
    echo "<li>$value</li>";
  }
  echo "</ul>";
}

$aray_naku = array('Improvise', 'Adapt', 'Overcome');
print_lists($aray_naku);
?>
