<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "mammypages_mummypages";

// $conn = new mysqli("localhost", "root", "1234","mammypages_mummypages");
$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_set_charset($conn,"utf8");
 
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
?>