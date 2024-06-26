<?php
include "connect.php";
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM users_reg WHERE id='$id'");
$row= mysqli_fetch_array($query);
print json_encode($row);
?>