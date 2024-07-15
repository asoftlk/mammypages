<?php
    include "../connect.php";
    session_start();
    if(isset($_POST['submit'])){
    date_default_timezone_set('Asia/Kolkata');
    $certificateTargetsString = null;
    $prevCertificate = $_POST['remainingCertificates'];

        $time = date("d-m-Y")."-".time();
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $mpId = mysqli_real_escape_string($conn, $_POST['mpId']);
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
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $map = mysqli_real_escape_string($conn, $_POST['mapLocation']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $mobile = mysqli_real_escape_string($conn, $_POST['contactNumber']);
        $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $website = mysqli_real_escape_string($conn, $_POST['web']);;
        $saloonregno = mysqli_real_escape_string($conn, $_POST['saloonregno']);
        $saloonestablishment = mysqli_real_escape_string($conn, $_POST['saloonestablishment']);
        $salooncontactperson = mysqli_real_escape_string($conn, $_POST['salooncontactperson']);
        
        //  $working_hours = mysqli_real_escape_string($conn, $_POST['midwifeworking']);
        $working_hours = null;
        $facebook = mysqli_real_escape_string($conn, $_POST['fb']);
        $instagram = mysqli_real_escape_string($conn, $_POST['insta']);
        $linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
        $service = mysqli_real_escape_string($conn, $_POST['service']);
        $about = mysqli_real_escape_string($conn, $_POST['about']);
        $videoembed = mysqli_real_escape_string($conn, $_POST['videoembed']);
        //$priority = mysqli_real_escape_string($conn, $_POST['priority']);	

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
        }
        $updatedCertificate = null;
        if($certificateTargetsString !== null){
            $updatedCertificate = $certificateTargetsString.','.$prevCertificate;
        } else {
            $updatedCertificate = $prevCertificate;
        }
       
        
    $logoimage =$_FILES['logoimage']['name'];
        if(isset($_FILES['galleryimages']['name'])){
            $galleryimages = $_FILES['galleryimages']['name'];
        }
        else{
            $galleryimages= array();
        }
        if(isset($_FILES['galleryimage']['name'])){
            $galleryimage = $_FILES['galleryimage']['name'];
        }
        else{
            $galleryimage = array();
        }
    if(isset($_POST['galleryid'])){
            $galleryid = $_POST['galleryid'];
    }
    else{
            $galleryid = array( '0' => 'a');
    }
    $galupdate = mysqli_query($conn, "SELECT * FROM mpsaloon_gallery WHERE saloon_id='$mpId'");
    if(mysqli_num_rows($galupdate)>0){
                While($galrow= mysqli_fetch_array($galupdate)){
                    $id1 = $galrow['id'];
                    foreach($galleryid as $value)
                    {
                        $key = array_search($id1, $galleryid);
                        if($key === false)
                        {
                        if(file_exists("../directory/saloon/".$galrow['image_name'])){
                            unlink("../directory/saloon/".$galrow['image_name']);
                            $artdelete = mysqli_query($conn, "DELETE FROM mpsaloon_gallery  WHERE id = '$id1'");
                        }
                        else{
                            $artdelete = mysqli_query($conn, "DELETE FROM mpsaloon_gallery  WHERE id = '$id1'");
                        }
                        }
                        else
                        {
                            $updategallery = "UPDATE mpsaloon_gallery SET date=now() ";
                            if($galleryimage!=null  and $galleryimage[$key]!=null){
                                if(file_exists('../directory/saloon/'.$galrow["image_name"])){
                                unlink('../directory/saloon/'.$galrow["image_name"]);
                                }
                            $ext = pathinfo($_FILES["galleryimage"]["name"][$key], PATHINFO_EXTENSION);
                            $target = $mpId.$key.$time.".".$ext;
                                    if (in_array($galleryimage, ['jpg', 'png', 'jpeg'])) {
                                            echo 'You Gallery file extension must be .jpg, .png or .jpeg';
                                            exit();
                                        } 
                                        elseif ($_FILES['galleryimage']['size'][$key] > 10000000) { // file shouldn't be larger than 1Megabyte
                                            echo 'Gallery image too large!';
                                            exit();
                                        }
                                    else{
                                        move_uploaded_file($_FILES['galleryimage']['tmp_name'][$key], "../directory/saloon/".$target);
                                        }
                                        $updategallery .= ", image_name= '$target' "; 
                            }
                            $updategallery .= " WHERE id = '$id1'";
                            $updategalleryrow = mysqli_query($conn, $updategallery);
                        }
                        }
                    }
                }

    if($galcount = count($galleryimages)>=1){
    for ($x = 0; $x < $galcount; $x++) {
                $galleryimages = $_FILES['galleryimages']['name'][$x];	// Get image name
                if($galleryimages != NULL){
                $ext = pathinfo($_FILES["galleryimages"]["name"][$x], PATHINFO_EXTENSION);
                $target = $mpId.$x.$time.".".$ext;
                //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
                    if (in_array($galleryimages, ['jpg', 'png', 'jpeg'])) {
                            echo ' You Gallery image extension must be .jpg, .png or .jpeg';
                        }
                        if ($_FILES['galleryimages']['size'][$x] > 1000000) { // file shouldn't be larger than 1Megabyte
                            echo 'Gallery image too large upload less than 10MB size !';
                        }
                        else{
                        move_uploaded_file($_FILES['galleryimages']['tmp_name'][$x], "../directory/saloon/".$target);
                        }
                }
                else{
                    $galleryimage="";
                    $target="";
                }
                $articleinsert= mysqli_query($conn, "INSERT INTO mpsaloon_gallery ( saloon_id, image_name) VALUES ('$mpId', '$target')");
            }
    }	   
    $updatequery = "Update saloon SET name='$name',speciality='$speciality',registraion_no='$saloonregno', establishment='$saloonestablishment', contact_person='$salooncontactperson',address='$address', map='$map', city='$city', mobile='$mobile',email='$email',whatsapp='$whatsapp',website='$website', facebook='$facebook', instagram='$instagram', linkedin='$linkedin',about='$about',services='$service',certificate='$updatedCertificate' ";		
    
        
         $featuredimage = $_FILES['featuredimage']['name'];
            
                $profileimage = $_FILES['profileimage']['name'];
	            if($profileimage != ""){
					$removeimg= mysqli_query($conn, "SELECT profile_pic from saloon WHERE id= '$id'");
					$imagename = mysqli_fetch_assoc($removeimg);
					if($imagename['profile_pic'] && file_exists("../directory/saloon/".$imagename['profile_pic'])){
						unlink("../directory/saloon/".$imagename['profile_pic']);
					}
	                $ext1 = pathinfo($_FILES["profileimage"]["name"], PATHINFO_EXTENSION);
	                $profileimagetarget = "cpprofile".$time.".".$ext1;
	                //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
	                    if (in_array($profileimage, ['jpg', 'png', 'jpeg'])) {
	                            echo 'You Featured file extension must be .jpg, .png or .jpeg';
								exit();
	                        } 
	                        elseif ($_FILES['profileimage']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
	                            echo '"Featured image too large!"';
								exit();
	                        }
	                    else{
	                        move_uploaded_file($_FILES['profileimage']['tmp_name'], "../directory/saloon/".$profileimagetarget);
	                        }
							$updatequery .= ", profile_pic= '$profileimagetarget' "; 
	            }
	            else{
	                
	            }
				$coverimage = $_FILES['coverimage']['name'];
	            if($coverimage != ""){
					$removeimg= mysqli_query($conn, "SELECT cover_pic from saloon WHERE id= '$id'");
					$imagename = mysqli_fetch_assoc($removeimg);
					if($imagename['cover_pic'] && file_exists("../directory/saloon/".$imagename['cover_pic'])){
						unlink("../directory/saloon/".$imagename['cover_pic']);
					}
	                $ext1 = pathinfo($_FILES["coverimage"]["name"], PATHINFO_EXTENSION);
	                $coverimagetarget = "cpcover".$time.".".$ext1;
	                //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
	                    if (in_array($coverimage, ['jpg', 'png', 'jpeg'])) {
	                            echo 'You Featured file extension must be .jpg, .png or .jpeg';
								exit();
	                        } 
	                        elseif ($_FILES['coverimage']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
	                            echo '"Featured image too large!"';
								exit();
	                        }
	                    else{
	                        move_uploaded_file($_FILES['coverimage']['tmp_name'], "../directory/saloon/".$coverimagetarget);
	                        }
							$updatequery .= ", cover_pic= '$coverimagetarget' "; 
	            }
	            else{
	                
	            }
            
                if($featuredimage != ""){
                    $removeimg= mysqli_query($conn, "SELECT image from saloon WHERE id= '$id'");
                    $imagename = mysqli_fetch_assoc($removeimg);
                    if($imagename['image'] && file_exists("../directory/saloon/".$imagename['image'])){
                        unlink("../directory/saloon/".$imagename['image']);
                    }
                    $ext1 = pathinfo($_FILES["featuredimage"]["name"], PATHINFO_EXTENSION);
                    $featuretarget = "fea".$time.".".$ext1;
                    //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
                        if (in_array($featuredimage, ['jpg', 'png', 'jpeg'])) {
                                echo 'You Featured file extension must be .jpg, .png or .jpeg';
                                exit();
                            } 
                            elseif ($_FILES['featuredimage']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
                                echo '"Featured image too large!"';
                                exit();
                            }
                        else{
                            move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../directory/saloon/".$featuretarget);
                            }
                            $updatequery .= ", image= '$featuretarget' "; 
                }
                else{
                    
                }
                $logoimage = $_FILES['logoimage']['name'];
                if($logoimage != ""){
                    $removefile= mysqli_query($conn, "SELECT logo from saloon WHERE id= '$id'");
                    $filename = mysqli_fetch_array($removefile);
                    if($filename['logo'] && file_exists("../directory/saloon/".$filename['logo'])){
                        unlink("../directory/saloon/".$filename['logo']);
                    }
                    $ext1 = pathinfo($_FILES["logoimage"]["name"], PATHINFO_EXTENSION);
                    $filetarget = "logo".$time.".".$ext1;
                    //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
                        if (in_array($logoimage, ['jpg', 'png', 'jpeg'])) {
                                echo 'You logo file extension must be .jpg, .png or .jpeg';
                                exit();
                            } 
                            elseif ($_FILES['logoimage']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
                                echo '"Logo file too large! maximum size 10MB"';
                                exit();
                            }
                        else{
                            move_uploaded_file($_FILES['logoimage']['tmp_name'], "../directory/saloon/".$filetarget);
                            }
                            $updatequery .= ", logo= '$filetarget' "; 
                }
                else{
                    $logoimage="";
                    $filetarget="";
                }
                if(!empty($videoembed)){
                $videotarget = $videoembed;
                $updatequery .= ", video= '$videotarget' ";
                }
                else{
                $galvideo = $_FILES['galvideo']['name'];
                if($galvideo != ""){
                    $removevideo= mysqli_query($conn, "SELECT video from saloon WHERE id= '$id'");
                    $videoname = mysqli_fetch_array($removevideo);
                    if($videoname['video'] && file_exists("../directory/saloon/video/".$videoname['video'])){
                        unlink("../directory/saloon/video/".$videoname['video']);
                    }
                    $extvid = pathinfo($_FILES["galvideo"]["name"], PATHINFO_EXTENSION);
                    $videotarget = "Vid".$time.".".$extvid;
                    //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
                        if (in_array($galvideo, ['mp4', 'ogg', 'WebM'])) {
                                echo 'You Gallery Video must be mp4/ogg/webm';
                                exit();
                            } 
                            elseif ($_FILES['galvideo']['size'] > 400000000) { // file shouldn't be larger than 1Megabyte
                                echo '"Video file too large! maximum size 400MB"';
                                exit();
                            }
                        else{
                            move_uploaded_file($_FILES['galvideo']['tmp_name'], "../directory/saloon/video/".$videotarget);
                            }
                            $updatequery .= ", video= '$videotarget' "; 
                }
                else{
                    $galvideo="";
                    $videotarget="";
                }
                }
                $updatequery .= " WHERE id='$id'";
                $update =mysqli_query($conn, $updatequery);
        if($update){
            $days = [
                'mon' => ['open' => 'monday_open', 'close' => 'monday_close'],
                'tue' => ['open' => 'tuesday_open', 'close' => 'tuesday_close'],
                'wed' => ['open' => 'wednesday_open', 'close' => 'wednesday_close'],
                'thu' => ['open' => 'thursday_open', 'close' => 'thursday_close'],
                'fri' => ['open' => 'friday_open', 'close' => 'friday_close'],
                'sat' => ['open' => 'saturday_open', 'close' => 'saturday_close'],
                'sun' => ['open' => 'sunday_open', 'close' => 'sunday_close']
            ];

            foreach ($days as $day => $times) {
                $open = mysqli_real_escape_string($conn, $_POST[$day . 'opentime']);
                $close = mysqli_real_escape_string($conn, $_POST[$day . 'endtime']);
                $updateWorkingTime = "UPDATE saloon_working_times 
                                        SET {$times['open']} = '$open', {$times['close']} = '$close'
                                        WHERE saloon_id = '$mpId'";
                mysqli_query($conn, $updateWorkingTime);
            }
            echo 'Saloon Updated';
        }
        else{
            echo 'Update Failed, Please try again!';
        }
    }

    ?>