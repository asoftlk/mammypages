<?php
	include "../connect.php";
	date_default_timezone_set('Asia/Kolkata');
	$time = date("d-m-Y")."-".time();
	if(isset($_POST['sub-saloon'])){
		$saloon_Id = "saloon-".mt_rand(1000000,9999999);
		$sltime_id = "sltime-".mt_rand(1000000,9999999);
        $name = mysqli_real_escape_string($conn, $_POST['mpname']);
        $speciality1 = $_POST['specialist'];
        $speciality ="";
            for($i=0; $i<count($speciality1);$i++){
                if($i==(count($speciality1)-1)){
                    $speciality .= $speciality1[$i];
                }
                else{
                $speciality .= $speciality1[$i]." ///";
                }
            }
        
            
        $isMain = filter_input(INPUT_POST, 'isMain');
		$mainId = filter_input(INPUT_POST, 'mainId');
		$address = filter_input(INPUT_POST, 'address');
		$mapLocation = filter_input(INPUT_POST, 'mapLocation');
		$city = filter_input(INPUT_POST, 'city');
		$contactNumber = filter_input(INPUT_POST, 'contactNumber');
		$whatsapp = filter_input(INPUT_POST, 'whatsapp');
		$email = filter_input(INPUT_POST, 'email');
		$web = filter_input(INPUT_POST, 'web');
		$type = filter_input(INPUT_POST, 'type');
		$subtype = filter_input(INPUT_POST, 'subtype');
		$working = null;
		$facebook = filter_input(INPUT_POST, 'fb');
		$instagram = filter_input(INPUT_POST, 'insta');
		$linkedin = filter_input(INPUT_POST, 'linkedin');
		$youtube = filter_input(INPUT_POST, 'youtube');
		$saloonregno = filter_input(INPUT_POST, 'saloonregno');
		$saloonestablishment = filter_input(INPUT_POST, 'saloonestablishment');
		$contact_person = filter_input(INPUT_POST, 'contact_person');
		$service = filter_input(INPUT_POST, 'service');
		$qualification = filter_input(INPUT_POST, 'qualification');
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
		$profileimage = $_FILES['profileimage']['name'];
		$coverimage = $_FILES['coverimage']['name'];
        $certificateTargetsString = null;
        
        if (isset($_FILES['certificateimage']) && !empty($_FILES['certificateimage']['name'][0])) {
            $totalFiles = count($_FILES['certificateimage']['name']);
            $certificateTargets = []; 
            for ($i = 0; $i < $totalFiles; $i++) {
                $fileName = $_FILES['certificateimage']['name'][$i];
                $fileTmpName = $_FILES['certificateimage']['tmp_name'][$i];
                $fileSize = $_FILES['certificateimage']['size'][$i];
                $fileType = $_FILES['certificateimage']['type'][$i];
                $uniId = uniqid();
    
                $ext7 = pathinfo($fileName, PATHINFO_EXTENSION);
                $cerificateTarget = "certificate".$uniId.".".$ext7;
                if (in_array($fileName, ['jpg', 'png', 'jpeg'])) {
                        echo 'Image extension must be .jpg, .png or .jpeg';
                        exit();
                    }
                if ($fileSize> 30000000) { // file shouldn't be larger than 1Megabyte
                        echo '"Image too large! Max size 30MB"';
                        exit();
                    }	
                $cerificateUpload = move_uploaded_file($fileTmpName, "../directory/saloon/".$cerificateTarget);
                $certificateTargets[] = $cerificateTarget;
            }
            $certificateTargetsString = implode(',', $certificateTargets);
        } else {
            echo 'No files selected.<br>';
        }


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
				$videoupload = move_uploaded_file($_FILES['galvideo']['tmp_name'], "../directory/saloon/video/".$videotarget);
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
						$target = $saloon_Id.$x.$time.".".$ext;
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
								move_uploaded_file($_FILES['galimages']['tmp_name'][$x], "../directory/saloon/".$target);
								}
						}
						else{
							$galimages="";
							$target="";
						}
						$galinsert= mysqli_query($conn, "INSERT INTO mpsaloon_gallery ( saloon_Id, image_name) VALUES ('$saloon_Id', '$target')");
					}  
					$featureupload = move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../directory/saloon/".$featuretarget);
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
				$logoupload = move_uploaded_file($_FILES['logoimage']['tmp_name'], "../directory/saloon/".$logotarget);
				
				$ext3 = pathinfo($_FILES["profileimage"]["name"], PATHINFO_EXTENSION);
				$profiletarget = "proimg".$time.".".$ext2;
					if (in_array($profileimage, ['jpg', 'png', 'jpeg'])) {
							echo 'Profile image extension must be .jpg, .png or .jpeg';
							exit();
						}
					if ($_FILES['profileimage']['size'] > 30000000) { // file shouldn't be larger than 1Megabyte
							echo '"Profile image too large! Max size 30MB"';
							exit();
						}	
				$profileimageupload = move_uploaded_file($_FILES['profileimage']['tmp_name'], "../directory/saloon/".$profiletarget);

				$ext4 = pathinfo($_FILES["coverimage"]["name"], PATHINFO_EXTENSION);
				$covertarget = "coverimg".$time.".".$ext2;
					if (in_array($coverimage, ['jpg', 'png', 'jpeg'])) {
							echo 'Cover image extension must be .jpg, .png or .jpeg';
							exit();
						}
					if ($_FILES['coverimage']['size'] > 30000000) { // file shouldn't be larger than 1Megabyte
							echo '"Cover image too large! Max size 30MB"';
							exit();
						}	
				$coverimageupload = move_uploaded_file($_FILES['coverimage']['tmp_name'], "../directory/saloon/".$covertarget);
				
			if($featureupload){
				$query = "INSERT INTO saloon (saloon_Id, registraion_no, name, speciality, address, establishment, contact_person, profile_pic, cover_pic, qualification, is_main, main_id, map, city, mobile, email, whatsapp, website, facebook, instagram, linkedin, youtube, logo, about, services, priority, image, video, certificate) 
						VALUES ('$saloon_Id', '$saloonregno', '$name', '$speciality', '$address', '$saloonestablishment', '$contact_person', '$profiletarget', '$covertarget', '$qualification', '$isMain', '$mainId', '$mapLocation', '$city', '$contactNumber', '$email', '$whatsapp', '$web', '$facebook', '$instagram', '$linkedin', '$youtube', '$logotarget', '$about', '$service', '$priority', '$featuretarget', '$videotarget', '$certificateTargetsString')";
				$result = mysqli_query($conn, $query);


				// $workingTimesQuery = "INSERT INTO saloon_working_times (sltime_id, saloon_Id, saloon_type,  monday_open, monday_close, tuesday_open, tuesday_close, wednesday_open, wednesday_close, thursday_open, thursday_close, friday_open, friday_close, saturday_open, saturday_close, sunday_open, sunday_close) 
				// 			VALUES ('$sltime_id','$saloon_Id', '$type', '$mon_open', '$mon_close', '$tue_open', '$tue_close', '$wed_open', '$wed_close', '$thu_open', '$thu_close', '$fri_open', '$fri_close', '$sat_open', '$sat_close', '$sun_open', '$sun_close')";

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

                $columns = implode(', ', array_merge(['sltime_id', 'saloon_id'], $columns));
                $values = implode(', ', array_merge(["'$sltime_id'", "'$saloon_Id'"], $values));

                $workingTimesQuery = "INSERT INTO saloon_working_times ($columns) VALUES ($values)";

				$resultWorkingTimes = mysqli_query($conn, $workingTimesQuery);
				if($result && $resultWorkingTimes){
					$conn->commit();
					echo "Saloon Posted Successfully";
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
		$checkquery = mysqli_query($conn, "SELECT * FROM saloon_speciality WHERE speciality = '$specialityname'");
		if(mysqli_num_rows($checkquery)>0){
			echo "Speciality Already Exists";
		} 
		else{
			$insertspeciality = mysqli_query($conn, "INSERT INTO saloon_speciality (speciality) VALUES ('$specialityname');");
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
			$updatequery = mysqli_query($conn, "UPDATE saloon_speciality SET speciality = '$edited' WHERE id='$specialityselect'");
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
			$deletequery = mysqli_query($conn, "DELETE FROM saloon_speciality WHERE id='$specialityselect'");
			if($deletequery){
				echo "Speciality Deleted";
			}
			else{
				echo "Speciality Delete Failed, Please try again";
			}
	}

?>