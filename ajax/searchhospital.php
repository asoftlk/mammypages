<?php
include '../connect.php';

if(isset($_POST["search"])){
	$value = mysqli_real_escape_string($conn, $_POST["value"]);
	$query = mysqli_query($conn, "SELECT hospital_id, name, image, logo FROM hospital WHERE (name LIKE '%".str_replace(" ", "%", $value)."%' OR speciality LIKE '%".str_replace(" ", "%", $value)."%' OR city LIKE '%".str_replace(" ", "%", $value)."%') OR type LIKE '%".str_replace(" ", "%", $value)."%' LIMIT 6");
	$list=array();
	echo '<ul id="title-list"  class="pl-0 mb-0" style="list-style-type:none;">';
	if(mysqli_num_rows($query)>0){
	while($row=mysqli_fetch_assoc($query)){
		echo '<li><a class="title-list" href="mpdetails?type=Hospital&id='.$row["hospital_id"].'" style="text-decoration:none; color:black"><div class="d-flex"><img src="directory/hospital/'.$row["image"].'" style="width:50px; height:40px; object-fit:cover; margin-right:5px; border-radius:5px"><p class="mb-0">'.$row["name"].'</p></div></a></li>';
	}
    }
    else{
        echo '<li>No Hospital Found</li>';
    }
	echo '</ul>';
}
?>