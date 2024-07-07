<?php
include "connect.php";
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * from hospital h LEFT JOIN hospital_working_times hwt ON hwt.hospital_id = h.hospital_id Where h.id='$id'");
$row= mysqli_fetch_assoc($query);
print json_encode($row);
?>