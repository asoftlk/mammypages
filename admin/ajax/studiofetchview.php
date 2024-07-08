<?php
include "connect.php";
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM studio s LEFT JOIN studio_working_times swt ON swt.studio_id = s.studio_id WHERE id='$id'");
$row= mysqli_fetch_assoc($query);
print json_encode($row);
?>