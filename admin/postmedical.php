<?php
	include "../connect.php";
	date_default_timezone_set('Asia/Kolkata');
	$time = date("d-m-Y")."-".time();
	if(isset($_POST['medical'])){
		$medical_Id = "medical-".mt_rand(1000000,9999999);
		$midtime_id = "medtime-".mt_rand(1000000,9999999);

		$name = filter_input(INPUT_POST, 'name');
	

        $name = mysqli_real_escape_string($conn, $_POST['mpname']);
        $speciality = $_POST['specialist'];
                    
        $isMain = null;
		$mainId = null;
		$address = filter_input(INPUT_POST, 'address');
		$mapLocation = filter_input(INPUT_POST, 'mapLocation');
		$city = filter_input(INPUT_POST, 'city');
		$contactNumber = filter_input(INPUT_POST, 'contactNumber');
		$whatsapp = filter_input(INPUT_POST, 'whatsapp');
		$email = filter_input(INPUT_POST, 'email');
		$web = filter_input(INPUT_POST, 'web'); 
		$doctorId = filter_input(INPUT_POST, 'doctorId'); 

		$estYear = filter_input(INPUT_POST, 'estYear');
		$service = filter_input(INPUT_POST, 'service');

		$working = null;
		$facebook = filter_input(INPUT_POST, 'fb');
		$instagram = filter_input(INPUT_POST, 'insta');
		$linkedin = filter_input(INPUT_POST, 'linkedin');
		$youtube = filter_input(INPUT_POST, 'youtube');
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
				$videoupload = move_uploaded_file($_FILES['galvideo']['tmp_name'], "../directory/medical/video/".$videotarget);
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
						$target = $medical_Id.$x.$time.".".$ext;
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
								move_uploaded_file($_FILES['galimages']['tmp_name'][$x], "../directory/medical/".$target);
								}
						}
						else{
							$galimages="";
							$target="";
						}
						$galinsert= mysqli_query($conn, "INSERT INTO mpmedical_gallery ( medical_Id, image_name) VALUES ('$medical_Id', '$target')");
					}  
					$featureupload = move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../directory/medical/".$featuretarget);
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
				$logoupload = move_uploaded_file($_FILES['logoimage']['tmp_name'], "../directory/medical/".$logotarget);
				
			if($featureupload){
				$query= "INSERT INTO medical (medical_Id, name,doctor_id, speciality, address, is_main,main_id , map, city, mobile, email, whatsapp, website, service, established, working_hours,  facebook, instagram, linkedin,youtube,logo, status, about,priority, image, video) 
						values ('$medical_Id', '$name','$doctorId', '$speciality', '$address', '$isMain','$mainId', '$mapLocation', '$city', '$contactNumber',  '$email','$whatsapp',  '$web', '$service', '$estYear', '$working', '$facebook',  '$instagram', '$linkedin', '$youtube','$logotarget', '$status', '$about','$priority','$featuretarget', '$videotarget')";
				$result = mysqli_query($conn, $query);
                
                $daysOfWeek = [
                    'mon' => ['open' => 'monday_open', 'close' => 'monday_close'],
                    'tue' => ['open' => 'tuesday_open', 'close' => 'tuesday_close'],
                    'wed' => ['open' => 'wednesday_open', 'close' => 'wednesday_close'],
                    'thu' => ['open' => 'thursday_open', 'close' => 'thursday_close'],
                    'fri' => ['open' => 'friday_open', 'close' => 'friday_close'],
                    'sat' => ['open' => 'saturday_open', 'close' => 'saturday_close'],
                    'sun' => ['open' => 'sunday_open', 'close' => 'sunday_close']
                ];

                $columns = [];
                $values = [];

                foreach ($daysOfWeek as $day => $times) {
                    $openKey = $times['open'];
                    $closeKey = $times['close'];
                    $extendsKey = substr($day, 0, 3) . 'extends';
                    $isOpen24Key = substr($day, 0, 3) . '24';

                    $openValue = filter_input(INPUT_POST, $day . 'opentime');
                    $closeValue = filter_input(INPUT_POST, $day . 'endtime');
                    $extendsValue = filter_input(INPUT_POST, $day . 'extends')=== '1' ? 'Y' : 'N';
                    $isOpen24Value = filter_input(INPUT_POST, $day . '24')=== '1' ? 'Y' : 'N';

                    $columns[] = $openKey;
                    $columns[] = $closeKey;
                    $columns[] = $extendsKey;
                    $columns[] = $isOpen24Key;

                    $values[] = "'$openValue'";
                    $values[] = "'$closeValue'";
                    $values[] = "'$extendsValue'";
                    $values[] = "'$isOpen24Value'";
                }

                $columns = implode(', ', array_merge(['metime_id', 'medical_id'], $columns));
                $values = implode(', ', array_merge(["'$midtime_id'", "'$medical_Id'"], $values));

                $workingTimesQuery = "INSERT INTO medical_working_times ($columns) VALUES ($values)";
                $resultWorkingTimes = mysqli_query($conn, $workingTimesQuery);
				if($result && $resultWorkingTimes){
					$conn->commit();
					echo "Doctor Clinics & Nursing homes Posted Successfully";
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
		$checkquery = mysqli_query($conn, "SELECT * FROM medical_speciality WHERE speciality = '$specialityname'");
		if(mysqli_num_rows($checkquery)>0){
			echo "Speciality Already Exists";
		}
		else{
			$insertspeciality = mysqli_query($conn, "INSERT INTO medical_speciality (speciality) VALUES ('$specialityname');");
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
			$updatequery = mysqli_query($conn, "UPDATE medical_speciality SET speciality = '$edited' WHERE id='$specialityselect'");
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
			$deletequery = mysqli_query($conn, "DELETE FROM medical_speciality WHERE id='$specialityselect'");
			if($deletequery){
				echo "Speciality Deleted";
			}
			else{
				echo "Speciality Delete Failed, Please try again";
			}
	}

?>