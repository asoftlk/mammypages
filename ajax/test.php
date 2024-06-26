<?php
include "../connect.php";
			$ratingcount = mysqli_query($conn, "SELECT count(*) as totalrating FROM visitors WHERE articleid='POST910423' AND rating!='0'");
			$totalratings=mysqli_fetch_array($ratingcount);
			echo $ratings=$totalratings['totalrating'];
			$overallrating= array();
			for($i=1;$i<=6;$i++){
				$eachcount = mysqli_query($conn, "SELECT count(*) as eachrating FROM visitors WHERE articleid='POST910423' AND rating='$i'");
				$eachratings=mysqli_fetch_array($eachcount);
				$eachratings=$eachratings['eachrating'];
				array_push($overallrating, ($eachratings/$ratings)*100);
			}
			$variable = ( array('status'=> 'success', 'text'=>($overallrating)));
			echo json_encode($variable);

?>