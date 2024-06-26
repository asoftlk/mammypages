<?php
include "../connect.php";
session_start();
if(isset($_POST['submit'])){
date_default_timezone_set('Asia/Kolkata');
 $time = date("d-m-Y")."-".time();
 $id = mysqli_real_escape_string($conn, $_POST['id']);
 $doctor_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
 $name = mysqli_real_escape_string($conn, $_POST['doctorname']);
 $speciality1 = $_POST['doctorspecialist'];
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

	   
 $updatequery = "Update doctor SET name='$name',speciality='$speciality',address='$address', mobile='$mobile',email='$email',website='$website', type='$type', working_hours='$working_hours', facebook='$facebook', instagram='$instagram', linkedin='$linkedin', status='$status',about='$about' ";		
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
			
			$updatequery .= " WHERE id='$id'";
		   $update =mysqli_query($conn, $updatequery);
	if($update){
		echo 'Doctor Updated';
	}
	else{
		echo 'Update Failed, Please try again!';
	}
}

?>