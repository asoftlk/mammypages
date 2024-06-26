<?php
include "../connect.php";
if(isset($_POST['deleteid'])){
	$id = $_POST['id'];
	$gallery = mysqli_query($conn, "SELECT image_name FROM post_images WHERE posting_id='$id'");
	while($galleryrow=mysqli_fetch_array($gallery)){
		if(mysqli_num_rows($gallery)>0){
			if(file_exists('../admin/posts/'.$galleryrow["image_name"])){
				if(!unlink('../admin/posts/'.$galleryrow["image_name"])){
					echo 'delete failed admin/posts/'.$galleryrow["image_name"];
					exit();
				}
			}
		}
	}
	$selquery = mysqli_query($conn, "SELECT featured_image FROM posts WHERE posting_id='$id'");
	$selrow= mysqli_fetch_array($selquery);
	if(file_exists('../admin/posts/'.$selrow["featured_image"])){
	unlink('../admin/posts/'.$selrow["featured_image"]);
	}
	$delgall=mysqli_query($conn, "DELETE FROM post_images WHERE posting_id='$id'");
	$delpost= mysqli_query($conn, "DELETE FROM posts WHERE posting_id='$id'");
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