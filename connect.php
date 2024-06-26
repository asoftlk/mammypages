<?php
//$connect = new PDO("mysql:host=localhost; dbname=mummy; charset=utf8", "mummypages", "f{J8$VRJS!5Y");
$conn = new mysqli("localhost", "mammypages_mummypages", "T.EgWfWm)US3","mammypages_mummy");
//$conn = mysqli_connect("localhost", "mammypages_mummypages", "T.EgWfWm)US3", "mammypages_mummy");
// Check connection
mysqli_set_charset($conn,"utf8");
 
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
?>