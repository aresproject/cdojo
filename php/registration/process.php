<?php
session_start();
//$_SESSION['errors'] = array();
$_SESSION['status'] = "cleared";

if(empty($_POST['email']) OR $_POST['email'] == NULL){
  //$_SESSION['errors'][] = "Email value is Required";
  $_SESSION['status'] = "uncleared";
  $_SESSION['error_email'] = "Email value is Required";
}
elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  //$_SESSION['errors'][] = "Invalid email format";
  $_SESSION['status'] = "uncleared";
  $_SESSION['error_email'] = "Invalid email format";
}
else $_SESSION['error_email'] = NULL;


if(empty($_POST['first_name']) OR $_POST['first_name'] == NULL){
  //$_SESSION['errors'] = "first_name value is Required";
  $_SESSION['status'] = "uncleared";
  $_SESSION['error_fname'] = "first_name value is Required";
}
elseif(preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $_POST['first_name'])) {
  //$_SESSION['errors'] = "first_name must contain letters only";
  $_SESSION['status'] = "uncleared";
  $_SESSION['error_fname'] = "first_name must contain letters only";
}
else $_SESSION['error_fname'] = NULL;


if(empty($_POST['last_name']) OR $_POST['last_name'] == NULL){
  //$_SESSION['errors'] = "last_name value is Required";
  $_SESSION['status'] = "uncleared";
  $_SESSION['error_lname'] = "last_name value is Required";
}
elseif(preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $_POST['last_name'])) {
  //$_SESSION['errors'] = "last_name must contain letters only";
  $_SESSION['status'] = "uncleared";
  $_SESSION['error_lname'] = "last_name must contain letters only";
}
else $_SESSION['error_lname'] = NULL;


if(empty($_POST['password']) OR $_POST['password'] == NULL){
  //$_SESSION['errors'] = "Password/Confirm Password values are required";
  $_SESSION['status'] = "uncleared";
  $_SESSION['error_password'] = "Password is required";
}
elseif(strlen($_POST['password']) <= 6) {
  //$_SESSION['errors'] = "Password must be more than 6 characters";
  $_SESSION['status'] = "uncleared";
  $_SESSION['error_password'] = "Password must be more than 6 characters";
}
else $_SESSION['error_password'] = NULL;


if(strcmp($_POST['password'], $_POST['confirm_password']) <> 0 ) {
  //$_SESSION['errors'] = "Password and Confirm Password Must Match";
  $_SESSION['status'] = "uncleared";
  $_SESSION['error_cpassword'] = "Password and Confirm Password Must Match";
}
else $_SESSION['error_cpassword'] = NULL;

if(!empty($_POST['birth_date'])){
 $dateval = explode('/', $_POST['birth_date']);
 if (!checkdate($dateval[0], $dateval[1], $dateval[2])){
   $_SESSION['status'] = "uncleared";
   $_SESSION['error_bdate'] = "Please enter valid date value";
 }
}
else $_SESSION['error_bdate'] = NULL;

header("Location: index.php");

 ?>
