<?php
include "../connect.php";
mysqli_set_charset($conn,"utf8mb4"); 
if(isset($_POST['submitcomment'])){
	if(isset($_POST['id'])){
		if($_POST['editdelete']=='edit'){
			$articleid = mysqli_real_escape_string($conn, $_POST['articleid']);
			$userid =mysqli_real_escape_string($conn, $_POST['email']);
			$comment = mysqli_real_escape_string($conn, $_POST['commentdata']);
			$id= mysqli_real_escape_string($conn, $_POST['id']);
			if($userid != null){
			if(strlen($comment)>=2){
				$insert= mysqli_query($conn, "UPDATE comments SET  articleid='$articleid', userid='$userid', comment='$comment' WHERE id='$id'");
				if($insert){
					echo "Updated Successfully";
				}
				else{
					echo "Update failed, Please try again";
				}
				
			}
			else{
				echo "Comment should be atleast 2 characters";
			}
			}	
		}
	}
	else{
	$articleid = mysqli_real_escape_string($conn, $_POST['articleid']);
	$userid =mysqli_real_escape_string($conn, $_POST['email']);
	$comment = mysqli_real_escape_string($conn, $_POST['commentdata']);
	if($userid != null){
	if(strlen($comment)>=2){
		$insert= mysqli_query($conn, "INSERT INTO comments (articleid, userid, comment) VALUES('$articleid', '$userid', '$comment')");
		if($insert){
			echo "Posted Successfully";
		}
		else{
			echo "Post failed, Please try again";
		}
		
	}
	else{
		echo "Comment should be atleast to 2 characters";
	}
	}
	else{
		echo "Please login to Comment to this post";
	}
	}
}
if(isset($_POST['deleteid'])){
	{
		$id= mysqli_real_escape_string($conn, $_POST['id']);
		$insert= mysqli_query($conn, "DELETE FROM comments WHERE id ='$id'");
			if($insert){
				echo "Deleted Successfully";
			}
			else{
				echo "Delete failed, Please try again";
			}
	}
}

?>
