<?php

$servername = "localhost";
$username = "twenty3b_bravo";
$password = "J3rus@l3m";
$db = "twenty3b_wishlist";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";

$sql = "SELECT * FROM test";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["val1"]. " " . $row["val2"]. " " . $row["val3"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
 ?>
