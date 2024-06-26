<?php
include "../connect.php";

mysqli_set_charset($conn,"utf8mb4"); 
if(isset($_POST['submitreview'])){
	if(isset($_POST['id'])){
		if($_POST['editdelete']=='edit'){
			$mp_id = mysqli_real_escape_string($conn, $_POST['mp_id']);
			$userid =mysqli_real_escape_string($conn, $_POST['email']);
			$comment = mysqli_real_escape_string($conn, $_POST['reviewdata']);
            $rating= isset($_POST['rate'])?$_POST['rate']:"";
            $id= mysqli_real_escape_string($conn, $_POST['id']);
			if($userid != null){
			if(strlen($comment)>=2){
				if($rating==""){
					$insert= mysqli_query($conn, "UPDATE mp_comments SET  mp_id='$mp_id', userid='$userid', comment='$comment' WHERE id='$id'");
				}
				else{
				$insert= mysqli_query($conn, "UPDATE mp_comments SET  mp_id='$mp_id', userid='$userid', comment='$comment',rating='$rating' WHERE id='$id'");
				}
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
	$mp_id = mysqli_real_escape_string($conn, $_POST['hospitalid']);
	$userid =mysqli_real_escape_string($conn, $_POST['email']);
	$comment = mysqli_real_escape_string($conn, $_POST['reviewdata']);
   $rating= mysqli_real_escape_string($conn, $_POST['rate']);
            
	if($userid != null){
	if(strlen($comment)>=2){
		$insert= mysqli_query($conn, "INSERT INTO mp_comments (mp_id, userid, comment,rating) VALUES('$mp_id', '$userid', '$comment','$rating')");
	//INSERT INTO `mp_comments`(`id`, `mp_id`, `comment`, `rating`, `follow_status`, `datetime`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
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
		echo "Please login to review hospital";
	}
	}
}
if(isset($_POST['deleteid'])){
	{
		$id= mysqli_real_escape_string($conn, $_POST['id']);
		$insert= mysqli_query($conn, "DELETE FROM mp_comments WHERE id ='$id'");
			if($insert){
				echo "Deleted Successfully";
			}
			else{
				echo "Delete failed, Please try again";
			}
	}
}

?>
