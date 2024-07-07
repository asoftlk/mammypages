<?php
include "connect.php";
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM medical m LEFT JOIN medical_working_times mwt ON mwt.medical_id = m.medical_id WHERE id='$id'");
$row= mysqli_fetch_assoc($query);
print json_encode($row);
?>