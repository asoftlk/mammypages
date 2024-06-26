<?php
include "../connect.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
if(isset($_POST['email'])){
	if($_POST['follow']=='follow'){
	$hospital_id = mysqli_real_escape_string($conn, $_POST['hospital_id']);
	$value = mysqli_real_escape_string($conn, $_POST['value']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$query= mysqli_query($conn, "SELECT follow_status FROM mp_comments WHERE userid='$email' AND mp_id='$hospital_id'");
	if(mysqli_num_rows($query)>0){
		$queryupdate= mysqli_query($conn, "UPDATE mp_comments SET follow_status='$value' WHERE userid='$email' AND mp_id='$hospital_id'");
		if($queryupdate){
		$text = ($value=='1')?"Following":"Follow";
		    $followquery= mysqli_query($conn, "SELECT count(*) as totalfollow FROM mp_comments WHERE mp_id='$hospital_id' and follow_status=1");
			$followrow=mysqli_fetch_array($followquery);
			$status= array('status'=> 'success', 'text'=>$text, 'followcount'=>$followrow['totalfollow']);
			echo json_encode($status);
		}
		else{
			echo json_encode(array('status'=> 'fail'));
		}
	}
	else{
		$queryinsert = mysqli_query($conn, "INSERT INTO mp_comments (userid, mp_id, follow_status) 
		VALUES ('$email', '$hospital_id', '$value')");
		if($queryinsert){
		$text = ($value=='1')?"Following":"Follow";
			$followquery= mysqli_query($conn, "SELECT count(*) as totalfollow FROM mp_comments WHERE mp_id='$hospital_id' and follow_status=1");
			$followrow=mysqli_fetch_array($followquery);
			$status= array('status'=> 'success', 'text'=>$text, 'followcount'=>$followrow['totalfollow']);
			echo json_encode($status);
		}
		else{
			echo json_encode(array('status'=> 'fail'));
		}
	}
}
}