<?php
include "../connect.php";
session_start();
if(isset($_POST['submit'])){
date_default_timezone_set('Asia/Kolkata');
 $time = date("d-m-Y")."-".time();
 $id = mysqli_real_escape_string($conn, $_POST['id']);
 $doctor_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
 $name = mysqli_real_escape_string($conn, $_POST['doctorname']);
 $speciality1 = $_POST['hospitalspecialist'];
 $speciality ="";
	 for($i=0; $i<count($speciality1);$i++){
		 if($i==(count($speciality1)-1)){
			 $speciality .= $speciality1[$i];
		 }
		 else{
		 $speciality .= $speciality1[$i]." ///";
		 }
	 }
 $address = mysqli_real_escape_string($conn, $_POST['doctoraddr']);
 
 $city = mysqli_real_escape_string($conn, $_POST['doctorcity']);
 $mobile = mysqli_real_escape_string($conn, $_POST['doctorcont']);
 $email = mysqli_real_escape_string($conn, $_POST['doctoremail']);

$website = mysqli_real_escape_string($conn, $_POST['doctorweb']);
 $type = mysqli_real_escape_string($conn, $_POST['doctortype']);
 $working_hours = mysqli_real_escape_string($conn, $_POST['doctorworking']);
 $facebook = mysqli_real_escape_string($conn, $_POST['doctorfb']);
 $instagram = mysqli_real_escape_string($conn, $_POST['doctorinsta']);
 $linkedin = mysqli_real_escape_string($conn, $_POST['doctorln']);
 $status = mysqli_real_escape_string($conn, $_POST['status']);
 $about = mysqli_real_escape_string($conn, $_POST['about']);

 //$priority = mysqli_real_escape_string($conn, $_POST['priority']);	
  		

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
$galupdate = mysqli_query($conn, "SELECT * FROM mpgallery WHERE doctor_id='$doctor_id'");
if(mysqli_num_rows($galupdate)>0){
			While($galrow= mysqli_fetch_array($galupdate)){
				$id1 = $galrow['id'];
				foreach($galleryid as $value)
				{
					$key = array_search($id1, $galleryid);
					if($key === false)
					{
					if(file_exists("../directory/doctor/".$galrow['image_name'])){
						unlink("../directory/doctor/".$galrow['image_name']);
						$artdelete = mysqli_query($conn, "DELETE FROM mpgallery  WHERE id = '$id1'");
					}
					else{
						$artdelete = mysqli_query($conn, "DELETE FROM mpgallery  WHERE id = '$id1'");
					}
					}
					else
					{
						$updategallery = "UPDATE mpgallery SET date=now() ";
						if($galleryimage!=null  and $galleryimage[$key]!=null){
							if(file_exists('../directory/doctor/'.$galrow["image_name"])){
							unlink('../directory/doctor/'.$galrow["image_name"]);
							}
						$ext = pathinfo($_FILES["galleryimage"]["name"][$key], PATHINFO_EXTENSION);
						$target = $doctor_id.$key.$time.".".$ext;
								if (in_array($galleryimage, ['jpg', 'png', 'jpeg'])) {
										echo 'You Gallery file extension must be .jpg, .png or .jpeg';
										exit();
									} 
									elseif ($_FILES['galleryimage']['size'][$key] > 10000000) { // file shouldn't be larger than 1Megabyte
										echo 'Gallery image too large!';
										exit();
									}
								else{
									move_uploaded_file($_FILES['galleryimage']['tmp_name'][$key], "../directory/doctor/".$target);
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
           $target = $doctor_id.$x.$time.".".$ext;
           //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
               if (in_array($galleryimages, ['jpg', 'png', 'jpeg'])) {
                       echo ' You Gallery image extension must be .jpg, .png or .jpeg';
					}
                   if ($_FILES['galleryimages']['size'][$x] > 1000000) { // file shouldn't be larger than 1Megabyte
                       echo 'Gallery image too large upload less than 10MB size !';
                   }
					else{
                   move_uploaded_file($_FILES['galleryimages']['tmp_name'][$x], "../directory/doctor/".$target);
                   }
           }
           else{
               $galleryimage="";
               $target="";
           }
           $articleinsert= mysqli_query($conn, "INSERT INTO mpgallery ( doctor_id, image_name) VALUES ('$doctor_id', '$target')");
       }
}	   
echo $updatequery = "Update doctor SET name='$name',speciality='$speciality',address='$address', city='$city', mobile='$mobile',email='$email',website='$website',type='$type', working_hours='$working_hours', facebook='$facebook', instagram='$instagram', linkedin='$linkedin', status='$status',about='$about' ";		
	$featuredimage = $_FILES['featuredimage']['name'];
		
		
            if($featuredimage != ""){
				$removeimg= mysqli_query($conn, "SELECT image from doctor WHERE id= '$id'");
				$imagename = mysqli_fetch_assoc($removeimg);
				if($imagename['image'] && file_exists("../directory/doctor/".$imagename['image'])){
					unlink("../directory/doctor/".$imagename['image']);
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
                        move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../directory/doctor/".$featuretarget);
                        }
						$updatequery .= ", image= '$featuretarget' "; 
            }
            else{
                
            }
			$logoimage = $_FILES['logoimage']['name'];
            if($logoimage != ""){
				$removefile= mysqli_query($conn, "SELECT logo from doctor WHERE id= '$id'");
				$filename = mysqli_fetch_array($removefile);
				if($filename['logo'] && file_exists("../directory/doctor/".$filename['logo'])){
					unlink("../directory/doctor/".$filename['logo']);
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
                        move_uploaded_file($_FILES['logoimage']['tmp_name'], "../directory/doctor/".$filetarget);
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
				$removevideo= mysqli_query($conn, "SELECT video from doctor WHERE id= '$id'");
				$videoname = mysqli_fetch_array($removevideo);
				if($videoname['video'] && file_exists("../directory/doctor/video/".$videoname['video'])){
					unlink("../directory/doctor/video/".$videoname['video']);
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
                        move_uploaded_file($_FILES['galvideo']['tmp_name'], "../directory/doctor/video/".$videotarget);
                        }
						$updatequery .= ", video= '$videotarget' "; 
            }
            else{
                $galvideo="";
                $videotarget="";
            }
			}
			$updatequery .= " WHERE id='$id'";
			echo $update =mysqli_query($conn, $updatequery);
	if($update){
		echo 'doctor Updated';
	}
	else{
		echo 'Update Failed, Please try again!';
	}
}

?>