<?php

session_start();

//$_SESSION['errors'] = array();
$iserrors[] = 321;
$iserrors[] = 654;
$iserrors[] = "tset";
$iserrors[] = $_POST['email'];


if(! isset($_POST['email']) OR $_POST['email'] == NULL) {
  //$_SESSION['errors'][] = "Email value is Required";
  $iserrors[] = "Email value is Required";
}

//$_SESSION['errors'] = array("test", "123", "xbc");
$_SESSION['errors'] = $iserrors;
header("Location: index.php");



?>
