<?php
include "connect.php";
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM pharmacy m LEFT JOIN pharmacy_working_times mwt ON mwt.pharmacy_id = m.pharmacy_id WHERE id='$id'");
$row= mysqli_fetch_assoc($query);
print json_encode($row);
?>