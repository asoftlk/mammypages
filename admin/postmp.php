<?php
include "../connect.php";
date_default_timezone_set('Asia/Kolkata');
$time = date("d-m-Y")."-".time();
if(isset($_POST['mpcategory'])){
	$name = $_POST['hospitalname'];
	if($_POST['mpcategory']=='Hospital'){
		$mpcategory = $_POST['mpcategory'];
		$hospitalid = "Hospital-".mt_rand(1000000,9999999);
		$hospitalspecialist = $_POST['hospitalspecialist'];
		$hospitaladdr = $_POST['hospitaladdr'];
		$hospitalmap = $_POST['hospitalmap'];
		$hospitalcity = $_POST['hospitalcity'];
		$hospitalcont = $_POST['hospitalcont'];
		$hospitalwhatsapp = $_POST['hospitalwhatsapp'];
		$hospitalemail = $_POST['hospitalemail'];
		$hospitalweb = $_POST['hospitalweb'];
		$hospitaltype = $_POST['hospitaltype'];
		$hospitalworking = $_POST['hospitalworking'];
		$hospitalrating = $_POST['hospitalrating'];
		$hospitalfb = $_POST['hospitalfb'];
		$hospitalinsta = $_POST['hospitalinsta'];
		$hospitalln = $_POST['hospitalln'];
		$status = $_POST['status'];
		$about = $_POST['about'];
		$featuredimage = $_FILES['featuredimage']['name'];
		$galimages = $_FILES['galimages']['name'];
		//print_r(get_defined_vars());
		//exit;
		if($featuredimage != NULL){
		$ext1 = pathinfo($_FILES["featuredimage"]["name"], PATHINFO_EXTENSION);
		$featuretarget = "fea".$time.".".$ext1;
			if (in_array($featuredimage, ['jpg', 'png', 'jpeg'])) {
					echo 'You featured image extension must be .jpg, .png or .jpeg';
				}
			 if ($_FILES['featuredimage']['size'] > 30000000) { // file shouldn't be larger than 1Megabyte
					echo '"Featured image image too large! Max size 30MB"';
				}
			else{
				for ($x = 0; $x < count(array($galimages)); $x++) {
					$galimages = $_FILES['galimages']['name'][$x];	// Get image name
					if($galimages != NULL){
					$ext = pathinfo($_FILES["galimages"]["name"][$x], PATHINFO_EXTENSION);
					$target = $hospitalid.$x.$time.".".$ext;
					//$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
						if (in_array($galimages, ['jpg', 'png', 'jpeg'])) {
								echo ' You article image extension must be .jpg, .png or .jpeg';
							}
							if ($_FILES['galimages']['size'][$x] > 1000000) { // file shouldn't be larger than 1Megabyte
								echo 'article image too large upload less than 10MB size !';
							}
							else{
							move_uploaded_file($_FILES['galimages']['tmp_name'][$x], "../directory/hospitals/".$target);
							}
					}
					else{
						$galimages="";
						$target="";
					}
					$galinsert= mysqli_query($conn, "INSERT INTO mpgallery ( hospitalid, image_name) VALUES ('$hospitalid', '$target')");
				}
				$featureupload = move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../directory/hospitals/".$featuretarget);
			}
		if($featureupload){
			$query= "INSERT INTO hospitals (type, hospitalid, hospital_name, specialist, hospital_address, hospital_map, hospital_city, about, mobile, whatsapp, email, url, facebook, instagram, linkedin, rating, hospital_image, hospital_type, duration, status) 
					VALUES('$mpcategory', '$hospitalid', '$name', '$hospitalspecialist', '$hospitaladdr', '$hospitalmap', '$hospitalcity', '$about', '$hospitalcont', '$hospitalwhatsapp', '$hospitalemail', '$hospitalweb', '$hospitalfb', '$hospitalinsta', '$hospitalln', '$hospitalrating', '$featuretarget', '$hospitaltype', '$hospitalworking', '$status')";
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
	if($_POST['mpcategory']=='Doctor'){
		$mpcategory = $_POST['mpcategory'];
		$doctorid = "Doctor-".mt_rand(1000000,9999999);
		$doctorname = $_POST['doctorname'];
		$qualification = $_POST['qualification'];
		$specialist = $_POST['specialist'];
		$visiting = $_POST['visiting'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$profileimg = $_FILES['profileimg']['name'];
		$galimages = $_FILES['galimages']['name'];
		//print_r(get_defined_vars());
		//exit;
		if($profileimg != NULL){
		$ext1 = pathinfo($_FILES["profileimg"]["name"], PATHINFO_EXTENSION);
		$profiletarget = "profile".$time.".".$ext1;
			if (in_array($profileimg, ['jpg', 'png', 'jpeg'])) {
					echo 'You Profile image extension must be .jpg, .png or .jpeg';
				}
			 if ($_FILES['profileimg']['size'] > 30000000) { // file shouldn't be larger than 1Megabyte
					echo '"Profile image image too large! Max size 30MB"';
				}
			else{
				$profileupload = move_uploaded_file($_FILES['profileimg']['tmp_name'], "../directory/hospitals/".$profiletarget);
			}
			if($profileupload){
			$query= "INSERT INTO hospitals (type, hospitalid, hospital_name, specialist, mobile, email, about, hospital_image) 
					VALUES('$mpcategory', '$doctorid', '$doctorname', '$specialist', '$mobile', '$email', '$visiting', '$profiletarget')";
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
}
?>