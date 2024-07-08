<?php
include "connect.php";
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM saloon s LEFT JOIN saloon_working_times swt ON swt.saloon_id = s.saloon_id WHERE id='$id'");
$row= mysqli_fetch_assoc($query);
print json_encode($row);
?>