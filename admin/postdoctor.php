<?php
include "../connect.php";
date_default_timezone_set('Asia/Kolkata');
$time = date("d-m-Y")."-".time();
if(isset($_POST['sub-hos'])){
	$doctorid = "Doctor-".mt_rand(1000000,9999999);
	$dtime_id = "doctime-".mt_rand(1000000,9999999);
    $doctorname = filter_input(INPUT_POST, 'doctorname');
    $doctorspecialist1 = $_POST['doctorspecialist'];
    $doctorspecialist ="";
    for($i=0; $i<count($doctorspecialist1);$i++){
        if($i==(count($doctorspecialist1)-1)){
            $doctorspecialist .= $doctorspecialist1[$i];
        }
		 else{
             $doctorspecialist .= $doctorspecialist1[$i]." ///";
            }
        }
        $doctoraddr = filter_input(INPUT_POST, 'doctoraddr');
     $doctorqualification = filter_input(INPUT_POST, 'qualification');
     $doctorcont = filter_input(INPUT_POST, 'doctorcont');
     $doctoremail = filter_input(INPUT_POST, 'doctoremail');
     $doctorweb = filter_input(INPUT_POST, 'doctorweb');
     $visitHospital = implode(', ', $_POST['doctorshospital']);
	$doctorworking = filter_input(INPUT_POST, 'doctorworking');
	$doctorfb = filter_input(INPUT_POST, 'doctorfb');
	$doctorinsta = filter_input(INPUT_POST, 'doctorinsta');
	$doctorln = filter_input(INPUT_POST, 'doctorln');
	$status = filter_input(INPUT_POST, 'status');
	$about = mysqli_real_escape_string($conn, $_POST['about']);
	
	$mon_open = filter_input(INPUT_POST, 'monopentime');
	$mon_close = filter_input(INPUT_POST, 'monendtime');
	$tue_open = filter_input(INPUT_POST, 'tueopentime');
	$tue_close = filter_input(INPUT_POST, 'tueendtime');
	$wed_open = filter_input(INPUT_POST, 'wedopentime');
	$wed_close = filter_input(INPUT_POST, 'wedendtime');
	$thu_open = filter_input(INPUT_POST, 'thuopentime');
	$thu_close = filter_input(INPUT_POST, 'thuendtime');
	$fri_open = filter_input(INPUT_POST, 'friopentime');
	$fri_close = filter_input(INPUT_POST, 'friendtime');
	$sat_open = filter_input(INPUT_POST, 'satopentime');
	$sat_close = filter_input(INPUT_POST, 'satendtime');
	$sun_open = filter_input(INPUT_POST, 'sunopentime');
	$sun_close = filter_input(INPUT_POST, 'sunendtime');

	$priority = 0;
	
	$logoimage = $_FILES['logoimage']['name'];
	$featuredimage = $_FILES['featuredimage']['name'];
		//$galimages = $_FILES['galimages']['name'];
		if(!empty($videoembed)){
			$videotarget = $videoembed;
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
				/*for ($x = 0; $x < count(array($galimages)); $x++) {
					$galimages = $_FILES['galimages']['name'][$x];	// Get image name
					if($galimages != NULL){
					$ext = pathinfo($_FILES["galimages"]["name"][$x], PATHINFO_EXTENSION);
					$target = $doctorid.$x.$time.".".$ext;
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
							move_uploaded_file($_FILES['galimages']['tmp_name'][$x], "../directory/doctor/".$target);
							}
					}
					else{
						$galimages="";
						$target="";
					}
					$galinsert= mysqli_query($conn, "INSERT INTO mpgallery ( doctorid, image_name) VALUES ('$doctorid', '$target')");
				}*/  
				$featureupload = move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../directory/doctor/".$featuretarget);
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
			$logoupload = move_uploaded_file($_FILES['logoimage']['tmp_name'], "../directory/doctor/".$logotarget);
			
		if($featureupload){
		 $query= "INSERT INTO doctor (doctor_id, name, speciality,qualification, address, mobile, email, website, visit_hospital, working_hours,  facebook, instagram, linkedin,logo, status, about,priority, image) 
		 	        values ('$doctorid', '$doctorname', '$doctorspecialist', '$doctorqualification','$doctoraddr',  '$doctorcont',  '$doctoremail', '$doctorweb', '$visitHospital', '$doctorworking', '$doctorfb',  '$doctorinsta', '$doctorln', '$logotarget', '$status', '$about','$priority','$featuretarget')";
			$result = mysqli_query($conn, $query);

			$workingTimesQuery = "INSERT INTO doctor_working_times (dtime_id, doctor_id,  monday_open, monday_close, tuesday_open, tuesday_close, wednesday_open, wednesday_close, thursday_open, thursday_close, friday_open, friday_close, saturday_open, saturday_close, sunday_open, sunday_close) 
								VALUES ('$dtime_id','$doctorid', '$mon_open', '$mon_close', '$tue_open', '$tue_close', '$wed_open', '$wed_close', '$thu_open', '$thu_close', '$fri_open', '$fri_close', '$sat_open', '$sat_close', '$sun_open', '$sun_close')";
			$resultWorkingTimes = mysqli_query($conn, $workingTimesQuery);
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
	$checkquery = mysqli_query($conn, "SELECT * FROM doctor_speciality WHERE speciality = '$specialityname'");
	if(mysqli_num_rows($checkquery)>0){
		echo "Speciality Already Exists";
	}
	else{
		$insertspeciality = mysqli_query($conn, "INSERT INTO doctor_speciality (speciality) VALUES ('$specialityname');");
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
		$updatequery = mysqli_query($conn, "UPDATE doctor_speciality SET speciality = '$edited' WHERE id='$specialityselect'");
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
		$deletequery = mysqli_query($conn, "DELETE FROM doctor_speciality WHERE id='$specialityselect'");
		if($deletequery){
			echo "Speciality Deleted";
		}
		else{
			echo "Speciality Delete Failed, Please try again";
		}
}

?>