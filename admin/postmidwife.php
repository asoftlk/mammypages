<?php
	include "../connect.php";
	date_default_timezone_set('Asia/Kolkata');
	$time = date("d-m-Y")."-".time();
	if(isset($_POST['sub-mid'])){
		$midwife_id = "midwife-".mt_rand(1000000,9999999);
		$midtime_id = "midtime-".mt_rand(1000000,9999999);
		$midwifename = filter_input(INPUT_POST, 'midwifename');
		$midwifespecialist1 = $_POST['midwifespecialist'];
		$midwifespecialist ="";
		for($i=0; $i<count($midwifespecialist1);$i++){
			if($i==(count($midwifespecialist1)-1)){
				$midwifespecialist .= $midwifespecialist1[$i];
			}
			else{
			$midwifespecialist .= $midwifespecialist1[$i]." ///";
			}
		}
        $isMain = filter_input(INPUT_POST, 'isMain');
		$mainId = filter_input(INPUT_POST, 'mainId');
		$midwifeaddr = filter_input(INPUT_POST, 'midwifeaddr');
		$midwifemap = filter_input(INPUT_POST, 'midwifemap');
		$midwifecity = filter_input(INPUT_POST, 'midwifecity');
		$midwifecont = filter_input(INPUT_POST, 'midwifecont');
		$midwifewhatsapp = filter_input(INPUT_POST, 'midwifewhatsapp');
		$midwifeemail = filter_input(INPUT_POST, 'midwifeemail');
		$midwifeweb = filter_input(INPUT_POST, 'midwifeweb');
		$midwifetype = filter_input(INPUT_POST, 'midwifetype');
		$midwifesubtype = filter_input(INPUT_POST, 'midwifesubtype');
		$midwifeworking = filter_input(INPUT_POST, 'midwifeworking');
		$midwifefb = filter_input(INPUT_POST, 'midwifefb');
		$midwifeinsta = filter_input(INPUT_POST, 'midwifeinsta');
		$midwifeln = filter_input(INPUT_POST, 'midwifeln');
		$status = filter_input(INPUT_POST, 'status');
		$about = mysqli_real_escape_string($conn, $_POST['about']);
		$videoembed = mysqli_real_escape_string($conn, $_POST['videoembed']);

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
				$videoupload = move_uploaded_file($_FILES['galvideo']['tmp_name'], "../directory/midwife/video/".$videotarget);
			}
			}
			$videotarget = isset($videotarget) ? $videotarget : '';
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
						$target = $midwife_id.$x.$time.".".$ext;
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
								move_uploaded_file($_FILES['galimages']['tmp_name'][$x], "../directory/midwife/".$target);
								}
						}
						else{
							$galimages="";
							$target="";
						}
						$galinsert= mysqli_query($conn, "INSERT INTO mpmidwife_gallery ( midwife_id, image_name) VALUES ('$midwife_id', '$target')");
					}  
					$featureupload = move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../directory/midwife/".$featuretarget);
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
				$logoupload = move_uploaded_file($_FILES['logoimage']['tmp_name'], "../directory/midwife/".$logotarget);
				
			if($featureupload){
				$query= "INSERT INTO midwife (midwife_id, name, speciality, address, is_main,main_id , map, city, mobile, email, whatsapp, website, type, subtype, working_hours,  facebook, instagram, linkedin,logo, status, about,priority, image, video) 
						values ('$midwife_id', '$midwifename', '$midwifespecialist', '$midwifeaddr', '$isMain','$mainId', '$midwifemap', '$midwifecity', '$midwifecont',  '$midwifeemail','$midwifewhatsapp',  '$midwifeweb', '$midwifetype', '$midwifesubtype', '$midwifeworking', '$midwifefb',  '$midwifeinsta', '$midwifeln', '$logotarget', '$status', '$about','$priority','$featuretarget', '$videotarget')";
				$result = mysqli_query($conn, $query);

				$workingTimesQuery = "INSERT INTO midwife_working_times (mwtime_id, midwife_id, midwife_type,  monday_open, monday_close, tuesday_open, tuesday_close, wednesday_open, wednesday_close, thursday_open, thursday_close, friday_open, friday_close, saturday_open, saturday_close, sunday_open, sunday_close) 
							VALUES ('$midtime_id','$midwife_id', '$midwifetype', '$mon_open', '$mon_close', '$tue_open', '$tue_close', '$wed_open', '$wed_close', '$thu_open', '$thu_close', '$fri_open', '$fri_close', '$sat_open', '$sat_close', '$sun_open', '$sun_close')";
				$resultWorkingTimes = mysqli_query($conn, $workingTimesQuery);
				if($result && $resultWorkingTimes){
					$conn->commit();
					echo "Posted Successfully";
				}
				else{
					$conn->rollback();
					echo "Failed to Post";
				}
			}	
			}
		
		}
	if(isset($_POST['specialitysubmit'])){
		$specialityname = trim(mysqli_real_escape_string($conn, $_POST['specialityname']));
		if($specialityname!=null){
		$checkquery = mysqli_query($conn, "SELECT * FROM midwife_speciality WHERE speciality = '$specialityname'");
		if(mysqli_num_rows($checkquery)>0){
			echo "Speciality Already Exists";
		}
		else{
			$insertspeciality = mysqli_query($conn, "INSERT INTO midwife_speciality (speciality) VALUES ('$specialityname');");
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
			$updatequery = mysqli_query($conn, "UPDATE midwife_speciality SET speciality = '$edited' WHERE id='$specialityselect'");
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
			$deletequery = mysqli_query($conn, "DELETE FROM midwife_speciality WHERE id='$specialityselect'");
			if($deletequery){
				echo "Speciality Deleted";
			}
			else{
				echo "Speciality Delete Failed, Please try again";
			}
	}

?>