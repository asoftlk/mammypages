<?php
include "connect.php";
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM midwife m LEFT JOIN midwife_working_times mwt ON mwt.midwife_id = m.midwife_id WHERE id='$id'");
$row= mysqli_fetch_assoc($query);
print json_encode($row);
?>