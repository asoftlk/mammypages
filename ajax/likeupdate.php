<?php
include "../connect.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
if(isset($_POST['favourite'])){
	if($_POST['favourite']=='favourite'){
	$articleid = mysqli_real_escape_string($conn, $_POST['articleid']);
	$value = mysqli_real_escape_string($conn, $_POST['value']);
	$query= mysqli_query($conn, "SELECT favourite FROM visitors WHERE session='$email' AND articleid='$articleid'");
	if(mysqli_num_rows($query)>0){
		$queryupdate= mysqli_query($conn, "UPDATE visitors SET favourite='$value' WHERE session='$email' AND articleid='$articleid'");
		if($queryupdate){
		$text = ($value=='1')?"ADDED":"FAVOURITE";
			$status= array('status'=> 'success', 'text'=>$text);
			echo json_encode($status);
		}
		else{
			echo json_encode(array('status'=> 'fail'));
		}
	}
	else{
		$queryinsert = mysqli_query($conn, "INSERT INTO visitors (session, articleid, favourite) 
		VALUES ('$email', '$articleid', '$value')");
		if($queryinsert){
		$text = ($value=='1')?"ADDED":"FAVOURITE";
			$status= array('status'=> 'success', 'text'=>$text);
			echo json_encode($status);
		}
		else{
			echo json_encode(array('status'=> 'fail'));
		}
	}
}
}
elseif(isset($_POST['rating'])){
	if($_POST['rating']=='rating'){
	$articleid = mysqli_real_escape_string($conn, $_POST['articleid']);
	$value = mysqli_real_escape_string($conn, $_POST['value']);
	$query= mysqli_query($conn, "SELECT favourite FROM visitors WHERE session='$email' AND articleid='$articleid'");
	if(mysqli_num_rows($query)>0){
		$queryupdate= mysqli_query($conn, "UPDATE visitors SET rating='$value' WHERE session='$email' AND articleid='$articleid'");
		if($queryupdate){
			$ratingcount = mysqli_query($conn, "SELECT count(*) as totalrating FROM visitors WHERE articleid='$articleid' AND rating!='0'");
			$totalratings=mysqli_fetch_array($ratingcount);
			$ratings=$totalratings['totalrating'];
			$overallrating= array();
			for($i=1;$i<=6;$i++){
				$eachcount = mysqli_query($conn, "SELECT count(*) as eachrating FROM visitors WHERE articleid='$articleid' AND rating='$i'");
				$eachratings=mysqli_fetch_array($eachcount);
				$eachratings=$eachratings['eachrating'];
				($ratings>0)?array_push($overallrating, ($eachratings/$ratings)*100):array_push($overallrating,0);
			}
			
			$status= array('status'=> 'success', 'text'=>$overallrating, 'ratings'=>$ratings);
			echo json_encode($status);
		}
		else{
			echo json_encode(array('status'=> 'fail'));
		}
	}
	else{
		$queryinsert = mysqli_query($conn, "INSERT INTO visitors (session, articleid, rating) 
		VALUES ('$email', '$articleid', '$value')");
		if($queryinsert){
		$ratingcount = mysqli_query($conn, "SELECT count(*) as totalrating FROM visitors WHERE articleid='$articleid' AND rating!='0'");
			$totalratings=mysqli_fetch_array($ratingcount);
			$ratings=$totalratings['totalrating'];
			$overallrating= array();
			for($i=1;$i<=6;$i++){
				$eachcount = mysqli_query($conn, "SELECT count(*) as eachrating FROM visitors WHERE articleid='$articleid' AND rating='$i'");
				$eachratings=mysqli_fetch_array($eachcount);
				$eachratings=$eachratings['eachrating'];
				($ratings>0)?array_push($overallrating, ($eachratings/$ratings)*100):array_push($overallrating,0);
			}
			$status= array('status'=> 'success', 'text'=>$overallrating, 'ratings'=>$ratings);
			echo json_encode($status);
		}
		else{
			echo json_encode(array('status'=> 'fail'));
		}
	}
}
}
else{
if(isset($email)){
	$articleid = mysqli_real_escape_string($conn, $_POST['articleid']);
	$value = mysqli_real_escape_string($conn, $_POST['value']);
	$query= mysqli_query($conn, "SELECT liked FROM visitors WHERE session='$email' AND articleid='$articleid'");
	if(mysqli_num_rows($query)>0){
		$queryupdate= mysqli_query($conn, "UPDATE visitors SET liked='$value' WHERE session='$email' AND articleid='$articleid'");
		if($queryupdate){
			$likes= mysqli_query($conn, "SELECT count(*) as totallikes FROM visitors WHERE articleid='$articleid' AND liked='1'");
			$likesrow=mysqli_fetch_array($likes);
			$status= array('status'=> 'success', 'likes'=>$likesrow["totallikes"]);
			echo json_encode($status);
		}
		else{
			echo json_encode(array('status'=> 'success'));
		}
	}
	else{
		$queryinsert = mysqli_query($conn, "INSERT INTO visitors (session, articleid, liked) 
		VALUES ('$email', '$articleid', '$value')");
		if($queryinsert){
			$likes= mysqli_query($conn, "SELECT count(*) as totallikes FROM visitors WHERE articleid='$articleid' AND liked='1'");
			$likesrow=mysqli_fetch_array($likes);
			$status= array('status'=> 'success', 'likes'=>$likesrow["totallikes"]);
			echo json_encode($status);
		}
		else{
			echo json_encode(array('status'=> 'success'));
		}
	}
	
}
else{
	echo "fail";
}
}
?>