<?php
include "../connect.php";
date_default_timezone_set('Asia/Kolkata');
$time = date("d-m-Y")."-".time();
if(isset($_POST['sub-hos'])){
	$hospitalid = "Hospital-".mt_rand(1000000,9999999);
	  $hospitalname = filter_input(INPUT_POST, 'hospitalname');
	 $hospitalspecialist1 = $_POST['hospitalspecialist'];
	 $hospitalspecialist ="";
	 for($i=0; $i<count($hospitalspecialist1);$i++){
		 if($i==(count($hospitalspecialist1)-1)){
			 $hospitalspecialist .= $hospitalspecialist1[$i];
		 }
		 else{
		 $hospitalspecialist .= $hospitalspecialist1[$i]." ///";
		 }
	 }
	 $hospitaladdr = filter_input(INPUT_POST, 'hospitaladdr');
	$hospitalmap = filter_input(INPUT_POST, 'hospitalmap');
	$hospitalcity = filter_input(INPUT_POST, 'hospitalcity');
	$hospitalcont = filter_input(INPUT_POST, 'hospitalcont');
	$hospitalwhatsapp = filter_input(INPUT_POST, 'hospitalwhatsapp');
	$hospitalemail = filter_input(INPUT_POST, 'hospitalemail');
	$hospitalweb = filter_input(INPUT_POST, 'hospitalweb');
	$hospitaltype = filter_input(INPUT_POST, 'hospitaltype');
	$hospitalsubtype = filter_input(INPUT_POST, 'hospitalsubtype');
	$hospitalworking = filter_input(INPUT_POST, 'hospitalworking');
	$hospitalfb = filter_input(INPUT_POST, 'hospitalfb');
	$hospitalinsta = filter_input(INPUT_POST, 'hospitalinsta');
	$hospitalln = filter_input(INPUT_POST, 'hospitalln');
	$status = filter_input(INPUT_POST, 'status');
	$about = mysqli_real_escape_string($conn, $_POST['about']);
	$videoembed = mysqli_real_escape_string($conn, $_POST['videoembed']);
	$priority = 0;
	
	$logoimage = $_FILES['logoimage']['name'];
	$featuredimage = $_FILES['featuredimage']['name'];
		$galimages = $_FILES['galimages']['name'];
		if(!empty($videoembed)){
			$videotarget = $videoembed;
		}
		else{
		$galvideo = $_FILES['galvideo']['name'];
		//print_r(get_defined_vars());
		//exit;
		if($galvideo != NULL){
			$videoext = pathinfo($_FILES["galvideo"]["name"], PATHINFO_EXTENSION);
			$videotarget = "Vid".$time.".".$videoext;
			if (in_array($videotarget, ['mp4', 'ogg', 'WebM'])) {
					echo 'You Gallery Video must be mp4/ogg/webm';
					exit();
				}
			 if ($_FILES['galvideo']['size'] > 300000000) { // file shouldn't be larger than 1Megabyte
					echo '"Gallery Video too large! Max size 300MB"';
					exit();
				}
			$videoupload = move_uploaded_file($_FILES['galvideo']['tmp_name'], "../directory/hospital/video/".$videotarget);
		}
		}
		if($featuredimage != NULL){
		$ext1 = pathinfo($_FILES["featuredimage"]["name"], PATHINFO_EXTENSION);
		$featuretarget = "fea".$time.".".$ext1;
			if (in_array($featuredimage, ['jpg', 'png', 'jpeg'])) {
					echo 'You featured image extension must be .jpg, .png or .jpeg';
					exit();
				}
			 if ($_FILES['featuredimage']['size'] > 30000000) { // file shouldn't be larger than 1Megabyte
					echo '"Featured  image too large! Max size 30MB"';
					exit();
				}
			else{
				for ($x = 0; $x < count(array($galimages)); $x++) {
					$galimages = $_FILES['galimages']['name'][$x];	// Get image name
					if($galimages != NULL){
					$ext = pathinfo($_FILES["galimages"]["name"][$x], PATHINFO_EXTENSION);
					$target = $hospitalid.$x.$time.".".$ext;
					//$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
						if (in_array($galimages, ['jpg', 'png', 'jpeg'])) {
								echo 'Gallery image extension must be .jpg, .png or .jpeg';
								exit();
							}
							if ($_FILES['galimages']['size'][$x] > 10000000) { // file shouldn't be larger than 1Megabyte
								echo 'Gallery image too large upload less than 10MB size !';
								exit();
							}
							else{
							move_uploaded_file($_FILES['galimages']['tmp_name'][$x], "../directory/hospital/".$target);
							}
					}
					else{
						$galimages="";
						$target="";
					}
					$galinsert= mysqli_query($conn, "INSERT INTO mpgallery ( hospitalid, image_name) VALUES ('$hospitalid', '$target')");
				}  
				$featureupload = move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../directory/hospital/".$featuretarget);
			}
			
		$ext2 = pathinfo($_FILES["logoimage"]["name"], PATHINFO_EXTENSION);
		$logotarget = "logo".$time.".".$ext2;
			if (in_array($logoimage, ['jpg', 'png', 'jpeg'])) {
					echo 'Logo image extension must be .jpg, .png or .jpeg';
					exit();
				}
			 if ($_FILES['logoimage']['size'] > 30000000) { // file shouldn't be larger than 1Megabyte
					echo '"Logo image too large! Max size 30MB"';
					exit();
				}	
			$logoupload = move_uploaded_file($_FILES['logoimage']['tmp_name'], "../directory/hospital/".$logotarget);
			
		if($featureupload){
		 $query= "INSERT INTO hospital (hospital_id, name, speciality, address, map, city, mobile, email, whatsapp, website, type, subtype, working_hours,  facebook, instagram, linkedin,logo, status, about,priority, image, video) 
		 	        values ('$hospitalid', '$hospitalname', '$hospitalspecialist', '$hospitaladdr', '$hospitalmap', '$hospitalcity', '$hospitalcont',  '$hospitalemail','$hospitalwhatsapp',  '$hospitalweb', '$hospitaltype', '$hospitalsubtype', '$hospitalworking', '$hospitalfb',  '$hospitalinsta', '$hospitalln', '$logotarget', '$status', '$about','$priority','$featuretarget', '$videotarget')";
			$result = mysqli_query($conn, $query);
			 if($result){
				echo "Posted Successfully";
			 }
			else{
				echo "Failed to Post";
			}
		}	
		}
	
	}
if(isset($_POST['specialitysubmit'])){
	$specialityname = trim(mysqli_real_escape_string($conn, $_POST['specialityname']));
	if($specialityname!=null){
	$checkquery = mysqli_query($conn, "SELECT * FROM hospital_speciality WHERE speciality = '$specialityname'");
	if(mysqli_num_rows($checkquery)>0){
		echo "Speciality Already Exists";
	}
	else{
		$insertspeciality = mysqli_query($conn, "INSERT INTO hospital_speciality (speciality) VALUES ('$specialityname');");
		if($insertspeciality){
			echo "Speciality Added";
		}
		else{
			echo "Speciality Adding Failed, Please try again";
		}
	}
	}
	else{
		echo "Specialist In cannot be empty";
	}
	
}
if(isset($_POST['specialityupdate'])){
	$specialityselect = mysqli_real_escape_string($conn, $_POST['specialityselect']);
	$edited = trim(mysqli_real_escape_string($conn, $_POST['edited']));
	if($edited!=null){
		$updatequery = mysqli_query($conn, "UPDATE hospital_speciality SET speciality = '$edited' WHERE id='$specialityselect'");
		if($updatequery){
			echo "Speciality Updated";
		}
		else{
			echo "Speciality Update Failed, Please try again";
		}
	}
	else{
		echo "Edited text cannot be empty";
	}
}
if(isset($_POST['specialitydelete'])){
	$specialityselect = mysqli_real_escape_string($conn, $_POST['specialityselect']);
		$deletequery = mysqli_query($conn, "DELETE FROM hospital_speciality WHERE id='$specialityselect'");
		if($deletequery){
			echo "Speciality Deleted";
		}
		else{
			echo "Speciality Delete Failed, Please try again";
		}
}

?>