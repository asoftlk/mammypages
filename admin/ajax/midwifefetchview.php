<?php
include "connect.php";
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM midwife WHERE id='$id'");
$row= mysqli_fetch_assoc($query);
print json_encode($row);
?>