<?php
session_start();
include("config.php");

//LOGIN
if($_POST['action'] && $_POST['action'] == 'login') {
  $sql_login = "SELECT userid, name, username, password FROM users WHERE username='{$_POST['login_username']}'
  AND BINARY password = '{$_POST['login_password']}'";
  $result = $db->query($sql_login);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['logged_userid'] = $row['userid'];
    $_SESSION['logged_name'] = $row['name'];
    $_SESSION['logged_username'] = $row['username'];
    //echo $sql_login;
    header("Location: dashboard.php");
  }
  else {
    $_SESSION['login_error'] = "The Username or Password you've entered does not match any account";
    //echo $sql_login;
    header("Location: main.php");
  }
}

//Logout
if(isset($_GET['logout']) && $_GET['logout'] == 1){
  session_unset();
  session_destroy();
  header("Location: main.php");
}

//REGISTER NEW USER
if($_POST['action'] && $_POST['action'] == 'register'){
  if(strlen($_POST['register_name']) < 3) {
    $errorlog[] = "<span class='red'>Name must be at least 3 characters</span>";
  }

  if(strlen($_POST['register_username']) < 3){
    $errorlog[] = "<span class='red'>User name must be at least 3 characters</span";
  }

  if(strlen($_POST['register_password']) < 6 ){
    $errorlog[] = "<span class='red'>password must be at least 6 characters</span";
  }
  if($_POST['confirm_password'] <> $_POST['register_password']){
    $errorlog[] = "<span class='red'>Password and Confirm Password must be the same</span";
  }
  if(strtotime($_POST['register_datehired']) > strtotime(date("Y-m-d"))){
    $errorlog[] = "<span class='red'>Date hired must be equal to OR earlier than today's date</span>";
  }

  //Check user if already registered
  $check_username = "SELECT userid, username FROM users WHERE username LIKE '" . $_POST['register_username'] . "'";
  $result = $db->query($check_username);
  if ($result->num_rows > 0) {
    $errorlog[] = "<span class='red'>Username is already taken</span";
  }

  //Return to login form if there are errors
  if(isset($errorlog)){
    $_SESSION['error_register'][] = $errorlog;
    header("location: main.php");
  }
  else { //IF NO Error begin register user data
    $register = "INSERT INTO users (name, username, password, datehired) VALUES ('" . $_POST['register_name'] . "', '" . $_POST['register_username'] . "', '" . $_POST['register_password'] . "', '" . $_POST['register_datehired'] . "')";

    if ($db->query($register) === TRUE) {
        $_SESSION['logged_userid'] = mysqli_insert_id($db);
        $_SESSION['logged_name'] = $_POST['register_name'];
        header("Location: dashboard.php");
    } else {
      $_SESSION['error_register'][] = $db->error;
      header("location: main.php");
      }
  }

}

//REMOVE FROM Wishlist
if(isset($_GET['control']) && $_GET['control'] == "remove") {
  $remove = "DELETE FROM wishlist WHERE (itemid=" . $_GET['itemid'] . " AND userid=" . $_GET['userid'] .")";
  if ($db->query($remove) === TRUE) {
    header("location: dashboard.php");
  } else {
      $_SESSION['notification'] = "Error deleting record " . $db->error;
      echo $_SESSION['notification'] . "<br>";
      echo $remove;
  }
}

//DELETE ITEM
if(isset($_GET['control']) && $_GET['control'] == "delete") {
  $remove = "DELETE FROM items WHERE (itemid=" . $_GET['itemid'] . " AND addedby=" . $_GET['userid'] .")";
  if ($db->query($remove) === TRUE) {
    $remove_wish = "DELETE FROM wishlist WHERE (itemid=" . $_GET['itemid'] . ")";
    if ($db->query($remove_wish) === TRUE) {
      $_SESSION['notification'] = "Item was removed from the system";
      header("location: dashboard.php");
  } else {
    $_SESSION['notification'] = "Error deleting record " . $db->error;
  }
  } else {
      $_SESSION['notification'] = "Error deleting record " . $db->error;

  }
}

//ADD From Wishlist
if(isset($_GET['control']) && $_GET['control'] == "add") {
  //Check First If The Item is already on the list
  $sql = "SELECT id, itemid, userid FROM wishlist WHERE itemid=" . $_GET['itemid'] . " AND userid =" . $_SESSION['logged_userid'];
  $result = $db->query($sql);
  if ($result->num_rows > 0) {
    $_SESSION['notification'] = "Item is already in your wish list";
    header("location: dashboard.php");
  } else { //If not then add the item to wishlist
    $add = "INSERT INTO wishlist (itemid, userid, dateadded) VALUES (" . $_GET['itemid'] . ", " . $_SESSION['logged_userid'] . ", CURDATE())";
    $db->query($add);
    header("location: dashboard.php");
  }
}

//CREATE ITEM
if($_POST['action'] && $_POST['action'] == 'create'){
   if (strlen($_POST['itemname']) < 3){ //Validate Item Name
     $_SESSION['notification'] = "<span class='red'>Item name should be more than 3 characters</span>";
     header("location: create.php");
   } else {
     //Is Item Already in wishlist- if yes then prompt user
     $check_wishlist = "SELECT w.id, w.itemid, i.itemname, w.userid FROM wishlist as w
      LEFT JOIN items AS i ON i.itemid = w.itemid
      WHERE LOWER(i.itemname) LIKE LOWER('" . $_POST['itemname'] . "') AND userid=" . $_SESSION['logged_userid'];
     $result = $db->query($check_wishlist);
     if ($result->num_rows > 0) {
       $_SESSION['notification'] = "<span class='red'>Failed to add... Item is already in your wish list</span>";
       header("location: create.php");
     } else { //Is the item already registered in items list
       $check_items = "SELECT itemid, itemname FROM items WHERE LOWER(itemname) LIKE LOWER('" . $_POST['itemname'] . "')";
       $result = $db->query($check_items);
       if ($result->num_rows > 0) { //If yes then only add the item to user's wish list
         $row = $result->fetch_assoc();
         $add = "INSERT INTO wishlist (itemid, userid, dateadded) VALUES (" . $row[itemid] . ", " . $_SESSION['logged_userid'] . ", CURDATE())";
         $db->query($add);
         $_SESSION['notification'] = "<span class='blue'>Item added to wish list</span> ";
         header("location: dashboard.php");
       } else { //Otherwise register the item to items list first before adding the item to user's wish list
         $create_item = "INSERT INTO items (itemname, addedby, dateadded) VALUES ('" . $_POST['itemname'] . "', " . $_SESSION['logged_userid'] . ", CURDATE())";
         if($db->query($create_item) === TRUE){ //Use the last Insert ID as the item ID for wishlist
           $addwish = "INSERT INTO wishlist (itemid, userid, dateadded) VALUES (" . $db->insert_id . ", " . $_SESSION['logged_userid'] . ", CURDATE())";
           if($db->query($addwish) === TRUE) {
           $_SESSION['notification'] = "<span class='blue'>Item registered and added to wishlist</span>";
           header("location: dashboard.php");
         } else {
           echo "FAIL" . $db->error;
           $_SESSION['notification'] = "FAIL" . $db->error;
           header("location: create.php");
         }
       } else {
         echo
         $_SESSION['notification'] = "FAIL" . $db->error;
         header("location: create.php");
       }
      }
    }
   }
}

//CHECK if item already exist if it does add the item to user's wishlist table





//Troubleshooting Scripts
/*var_dump($sql_login);
echo "<br>";
var_dump($row);
echo "<br>";
var_dump($_SESSION['logged_user']);
echo "<br>";
var_dump($result->num_rows);
echo "<br>";
var_dump($result);
*/
?>
