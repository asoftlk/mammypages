<?php
include "connect.php";
if(isset($_POST['deleteid'])){
    $id = $_POST['id'];
    $selPostquery = mysqli_query($conn, "SELECT * FROM posts WHERE id='$id'");
    $selPostrow= mysqli_fetch_array($selquery);
	 //print_r($selPostrow);die;
	 $postingId = $selPostrow['posting_id'];
	$gallery = mysqli_query($conn, "SELECT image_name FROM post_images WHERE posting_id='$postingId'");
	
	
	while($galleryrow=mysqli_fetch_array($gallery)){
		if(mysqli_num_rows($gallery)>0){
			if(file_exists('../posts/'.$galleryrow["image_name"])){
				if(!unlink('../posts/'.$galleryrow["image_name"])){
					echo 'delete failed admin/posts/'.$galleryrow["image_name"];
					exit();
				}
			}
		}
	}
	$selquery = mysqli_query($conn, "SELECT * FROM posts WHERE id='$id'");
	$selrow= mysqli_fetch_array($selquery);
	if(file_exists('../posts/'.$selrow["featured_image"])){
	unlink('../posts/'.$selrow["featured_image"]);
	}
	$delgall=mysqli_query($conn, "DELETE FROM post_images WHERE id='$id'");
	$delpost= mysqli_query($conn, "DELETE FROM posts WHERE id='$id'");
	if($delpost){
		echo "Deleted";
	}
	else{
		echo "delete failed";
	}	
}
else{
	echo "Delete Failed, please try again!";
}