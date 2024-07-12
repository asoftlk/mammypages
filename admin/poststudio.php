<?php
	include "../connect.php";
	date_default_timezone_set('Asia/Kolkata');
	$time = date("d-m-Y")."-".time();
	if(isset($_POST['sub-mid'])){
		$studio_id = "studio-".mt_rand(1000000,9999999);
		$sttime_id = "sttime-".mt_rand(1000000,9999999);
		$studioname = filter_input(INPUT_POST, 'studioname');
		$studiospecialist1 = $_POST['studiospecialist'];
		$studiospecialist ="";
		for($i=0; $i<count($studiospecialist1);$i++){
			if($i==(count($studiospecialist1)-1)){
				$studiospecialist .= $studiospecialist1[$i];
			}
			else{
			$studiospecialist .= $studiospecialist1[$i]." ///";
			}
		}
        $isMain = filter_input(INPUT_POST, 'isMain');
		$mainId = filter_input(INPUT_POST, 'mainId');
		$studioaddr = filter_input(INPUT_POST, 'studioaddr');
		$studiomap = filter_input(INPUT_POST, 'studiomap');
		$studiocity = filter_input(INPUT_POST, 'studiocity');
		$studiocont = filter_input(INPUT_POST, 'studiocont');
		$studiowhatsapp = filter_input(INPUT_POST, 'studiowhatsapp');
		$studioemail = filter_input(INPUT_POST, 'studioemail');
		$studioweb = filter_input(INPUT_POST, 'studioweb');
		$studiotype = filter_input(INPUT_POST, 'studiotype');
		$studiosubtype = filter_input(INPUT_POST, 'studiosubtype');
		$studioworking = filter_input(INPUT_POST, 'studioworking');
		$studiofb = filter_input(INPUT_POST, 'studiofb');
		$studioinsta = filter_input(INPUT_POST, 'studioinsta');
		$studioln = filter_input(INPUT_POST, 'studioln');
		$studioyt = filter_input(INPUT_POST, 'studioyt');
		$studioregno = filter_input(INPUT_POST, 'studioregno');
		$studioestablishment = filter_input(INPUT_POST, 'studioestablishment');
		$studiocontactperson = filter_input(INPUT_POST, 'studiocontactperson');
		$service = filter_input(INPUT_POST, 'service');
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
				$videoupload = move_uploaded_file($_FILES['galvideo']['tmp_name'], "../directory/studio/video/".$videotarget);
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
						$target = $studio_id.$x.$time.".".$ext;
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
								move_uploaded_file($_FILES['galimages']['tmp_name'][$x], "../directory/studio/".$target);
								}
						}
						else{
							$galimages="";
							$target="";
						}
						$galinsert= mysqli_query($conn, "INSERT INTO mpstudio_gallery ( studio_id, image_name) VALUES ('$studio_id', '$target')");
					}  
					$featureupload = move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../directory/studio/".$featuretarget);
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
				$logoupload = move_uploaded_file($_FILES['logoimage']['tmp_name'], "../directory/studio/".$logotarget);
				
			if($featureupload){
				$query = "INSERT INTO studio (studio_id, registraion_no, name, speciality, address, establishment, contact_person, is_main, main_id, map, city, mobile, email, whatsapp, website, facebook, instagram, linkedin, youtube, logo, image, video, about, services, priority) 
				VALUES ('$studio_id', '$studioregno', '$studioname', '$studiospecialist', '$studioaddr', '$studioestablishment', '$studiocontactperson', '$isMain', '$mainId', '$studiomap', '$studiocity', '$studiocont', '$studioemail', '$studiowhatsapp', '$studioweb', '$studiofb', '$studioinsta', '$studioln', '$studioyt', '$logotarget', '$featuretarget', '$videotarget', '$about', '$service', '$priority')";
				
				$result = mysqli_query($conn, $query);
				

				$workingTimesQuery = "INSERT INTO studio_working_times (sttime_id, studio_id, studio_type,  monday_open, monday_close, tuesday_open, tuesday_close, wednesday_open, wednesday_close, thursday_open, thursday_close, friday_open, friday_close, saturday_open, saturday_close, sunday_open, sunday_close) 
							VALUES ('$sttime_id','$studio_id', '$studiotype', '$mon_open', '$mon_close', '$tue_open', '$tue_close', '$wed_open', '$wed_close', '$thu_open', '$thu_close', '$fri_open', '$fri_close', '$sat_open', '$sat_close', '$sun_open', '$sun_close')";
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
		$checkquery = mysqli_query($conn, "SELECT * FROM studio_speciality WHERE speciality = '$specialityname'");
		if(mysqli_num_rows($checkquery)>0){
			echo "Speciality Already Exists";
		}
		else{
			$insertspeciality = mysqli_query($conn, "INSERT INTO studio_speciality (speciality) VALUES ('$specialityname');");
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
			$updatequery = mysqli_query($conn, "UPDATE studio_speciality SET speciality = '$edited' WHERE id='$specialityselect'");
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
			$deletequery = mysqli_query($conn, "DELETE FROM studio_speciality WHERE id='$specialityselect'");
			if($deletequery){
				echo "Speciality Deleted";
			}
			else{
				echo "Speciality Delete Failed, Please try again";
			}
	}

?>