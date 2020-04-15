<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'twenty3b_bravo');
   define('DB_PASSWORD', 'J3rus@l3m');
   define('DB_DATABASE', 'twenty3b_wishlist');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }


?>
