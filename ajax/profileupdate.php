<?php include '../connect.php';
date_default_timezone_set('Asia/Kolkata');
$time = date("d-m-Y")."-".time();
if(isset($_POST['submit'])){
	$userid = mysqli_real_escape_string($conn, $_POST['userid']);
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$middleName = mysqli_real_escape_string($conn, $_POST['middleName']);
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
	$dateOfBirth = mysqli_real_escape_string($conn, $_POST['dateOfBirth']);
	$dateOfBirth=date_create_from_format("d/m/Y",$dateOfBirth);
    $dateOfBirth = date_format($dateOfBirth,"Y-m-d");
	$addressLine1 = mysqli_real_escape_string($conn, $_POST['addressLine1']);
	$Address_Line2 = mysqli_real_escape_string($conn, $_POST['Address_Line2']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$Province = mysqli_real_escape_string($conn, $_POST['Province']);
	$country = mysqli_real_escape_string($conn, $_POST['country']);
	$update = mysqli_query($conn, "UPDATE users_reg SET first_name='$firstName', middle_name='$middleName', last_name='$lastName', dob='$dateOfBirth', address1='$addressLine1', address2='$Address_Line2', country='$country', city='$city', province='$Province' WHERE userid = '$userid'");
	if($update){
		echo 'Profile Details Updated';
	}
	else{
		echo 'Update Failed, Please try again!';
	}
}
if(isset($_POST['submitfamily'])){
	$userid = mysqli_real_escape_string($conn, $_POST['userid']);
	$Occupation = mysqli_real_escape_string($conn, $_POST['Occupation']);
	$langselectionold = $_POST['langselection'];
	$langselection = "";
    foreach($langselectionold as $value ){
        $langselection .= $value." , ";
    }
	$favArticleCategory = "";
    $favArticleCategoryold =$_POST['favArticleCategory'];
    foreach($favArticleCategoryold as $value ){
        $favArticleCategory .= $value." , ";
    }
    $isPregnant = $_POST['isPregnant'];
    if($isPregnant == 'true'){
        $pregnancyWeek =mysqli_real_escape_string($conn, $_POST['pregnancyWeek']);
    }
    else{
        $pregnancyWeek = '';
    }
	$haveChildren =$_POST['haveChildren'];
    if($haveChildren == 'true'){
		if(isset($_POST['childid'])){
		$childid =$_POST['childid'];
		$childnameold =$_POST['childnameold'];
        $childdobold = $_POST['childdobold'];
        $childgenderold = $_POST['childgenderold'];
		
        if(isset($_FILES['childimageold']['name'])){
			$childimageold = $_FILES['childimageold']['name'];
		}
		else{
			$childimageold = array();
		}
		$childupdate= mysqli_query($conn, "SELECT * FROM children WHERE userid = '$userid'");
		if(mysqli_num_rows($childupdate)>0){
			While($childrow= mysqli_fetch_array($childupdate)){
				$id = $childrow['id'];
				foreach($childid as $value)
				{
					$key = array_search($id, $childid);
					if($key === FALSE)
					{
					if(file_exists("../images/".$childrow['child_profile_image'])){
						unlink("../images/".$childrow['child_profile_image']);
						$childdelete = mysqli_query($conn, "DELETE FROM children  WHERE id = '$id'");
					}
					}
					else
					{
						$childBirth=date_create_from_format("d/m/Y",$childdobold[$key]);
						$childBirth = date_format($childBirth,"Y-m-d");
						$childupdatequery = "UPDATE children SET child_name = '$childnameold[$key]', child_dob = '$childBirth', gender = '$childgenderold[$key]' ";
						if($childimageold!=null  and $childimageold[$key]!=null){
							if(file_exists('../images/'.$childrow["child_profile_image"])){
							unlink('../images/'.$childrow["child_profile_image"]);
							}
							$ext = pathinfo($_FILES["childimageold"]["name"][$key], PATHINFO_EXTENSION);
							$target = $userid.$key.$time.".".$ext;
								if (in_array($childimageold, ['jpg', 'png', 'jpeg'])) {
										echo ' <script> window.alert("You child file extension must be .jpg, .png or .jpeg")</script>';
									} 
									elseif ($_FILES['childimageold']['size'][$key] > 10000000) { // file shouldn't be larger than 1Megabyte
										echo 'child image too large!';
									}
								else{
									move_uploaded_file($_FILES['childimageold']['tmp_name'][$key], "../images/".$target);
									}
									$childupdatequery .= ", child_profile_image= '$target' "; 
						}
						else{
							//$childupdatequery .= ", child_profile_image= '' "; 
						}
						$childupdatequery .= " WHERE id = '$id'";
						$childupdaterow = mysqli_query($conn, $childupdatequery);
					}
				}
			}
		}
		}
		else{
			$query =  mysqli_query($conn, "DELETE FROM children WHERE userid = '$userid'");
			$query = mysqli_query($conn, "UPDATE users_reg SET children='false' WHERE userid = '$userid'");
		}
		if(isset($_POST['childname'])){
			$childname =$_POST['childname'];
			$childdob = $_POST['childdob'];
			$childgender = $_POST['childgender'];
			//$childimage = $_POST['childimage'];
			
			for ($x = 0; $x < count($childname); $x++) {
				$childBirth=date_create_from_format("d/m/Y",$childdob[$x]);
				$childBirth = date_format($childBirth,"Y-m-d");
				$childimage = $_FILES['childimage']['name'][$x];	// Get image name
				if($childimage != NULL){
				$ext = pathinfo($_FILES["childimage"]["name"][$x], PATHINFO_EXTENSION);
				$target = $userid.$x.$time.".".$ext;
				//$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
					if (in_array($childimage, ['jpg', 'png', 'jpeg'])) {
							echo "You child file extension must be .jpg, .png or .jpeg";
							exit();
						} 
						elseif ($_FILES['childimage']['size'][$x] > 10000000) { // file shouldn't be larger than 1Megabyte
							echo 'child image too large!';
							exit();
						}
					else{
						move_uploaded_file($_FILES['childimage']['tmp_name'][$x], "../images/".$target);
						}
				}
				else{
					$childimage="";
					$target="";
				}
				$childinsert= mysqli_query($conn, "INSERT INTO children (userid, child_name, child_dob, gender, child_profile_image) VALUES ('$userid', '$childname[$x]', '$childBirth', '$childgender[$x]', '$target')");
			}
		}
	}
    if($haveChildren == 'false'){
		$childupdate= mysqli_query($conn, "SELECT * FROM children WHERE userid = '$userid'");
		if(mysqli_num_rows($childupdate)>0){
			While($childrow= mysqli_fetch_array($childupdate)){
				if(file_exists("../images/".$childrow['child_profile_image'])){
				unlink("../images/".$childrow['child_profile_image']);
				}
			}
			$childdelete = mysqli_query($conn, "DELETE FROM children  WHERE userid = '$userid'");
		}
		else{
			$childdelete = mysqli_query($conn, "DELETE FROM children  WHERE userid = '$userid'");
		}
	}
	$checkchildquery= mysqli_query($conn, "SELECT * FROM children WHERE userid='$userid'");
	if(mysqli_num_rows($checkchildquery)==0){
		$haveChildren='false';
	}
	$updatequery = "UPDATE users_reg SET occupation='$Occupation', planguage='$langselection', fav_article='$favArticleCategory', pregnant='$isPregnant', pregnant_week='$pregnancyWeek', children='$haveChildren' ";
	$profilePicture = $_FILES['profilePicture']['name'];
            if($profilePicture != ""){
				$removeimg= mysqli_query($conn, "SELECT profile_image from users_reg WHERE userid= '$userid'");
				$imagename = mysqli_fetch_array($removeimg);
				if($imagename['profile_image'] && file_exists("../images/".$imagename['profile_image'])){
					unlink("../images/".$imagename['profile_image']);
				}
                $ext1 = pathinfo($_FILES["profilePicture"]["name"], PATHINFO_EXTENSION);
                $profiletarget = "Profile".$userid.$time.".".$ext1;
                //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
                    if (in_array($profilePicture, ['jpg', 'png', 'jpeg'])) {
                            echo 'You profile file extension must be .jpg, .png or .jpeg';
                            exit();
                        } 
                        elseif ($_FILES['profilePicture']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
                            echo '"profile image too large!"';
                            eixt();
                        }
                    else{
                        move_uploaded_file($_FILES['profilePicture']['tmp_name'], "../images/".$profiletarget);
                        }
						$updatequery .= ", profile_image= '$profiletarget' "; 
            }
            else{
                $profilePicture="";
                $profiletarget="";
		    //	$updatequery .= ", profile_image= '' ";
            }
			$updatequery .= " WHERE userid='$userid'";
			$update =mysqli_query($conn, $updatequery);
	if($update){
		echo 'Family Details Updated';
	}
	else{
		echo 'Update Failed, Please try again!';
	}

}
if(isset($_POST['submitpartner'])){
	$userid = mysqli_real_escape_string($conn, $_POST['userid']);
	$partnerName = mysqli_real_escape_string($conn, $_POST['partnerName']);
	$partnerdob = mysqli_real_escape_string($conn, $_POST['partnerdob']);
	$partnerdob=date_create_from_format("d/m/Y",$partnerdob);
    $partnerdob = date_format($partnerdob,"Y-m-d");
	$anniversary = mysqli_real_escape_string($conn, $_POST['anniversary']);
	$anniversary=date_create_from_format("d/m/Y",$anniversary);
    $anniversary = date_format($anniversary,"Y-m-d");
	$partneroccupation = mysqli_real_escape_string($conn, $_POST['partneroccupation']);
	$PartnerProfilePicture = $_FILES['PartnerProfilePicture']['name'];
	$updatepartner = "UPDATE users_reg SET partner_name= '$partnerName', partner_dob= '$partnerdob', anniversary_date='$anniversary', partner_occupation='$partneroccupation' ";
	if($PartnerProfilePicture != NULL){
		$ext2 = pathinfo($_FILES["PartnerProfilePicture"]["name"], PATHINFO_EXTENSION);
		$partnerprofiletarget = "PartnerProfile".$userid.$time.".".$ext2;
		//$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
			if (in_array($PartnerProfilePicture, ['jpg', 'png', 'jpeg'])) {
					echo 'You partner profile file extension must be .jpg, .png or .jpeg';
					exit();
				} 
				elseif ($_FILES['PartnerProfilePicture']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
					echo 'partner image too large!';
					exit();
				}
			else{
				move_uploaded_file($_FILES['PartnerProfilePicture']['tmp_name'], "../images/".$partnerprofiletarget);
				}
		$updatepartner .= ", partner_profile_image= '$partnerprofiletarget' "; 

	}
	else{
		$updatepartner .= ", partner_profile_image= '' "; 
	}
	$updatepartner .= "WHERE userid = '$userid'";
	$removeimg= mysqli_query($conn, "SELECT partner_profile_image from users_reg WHERE userid= '$userid'");
	$imagename = mysqli_fetch_array($removeimg);
	if($imagename['partner_profile_image']){
		unlink("../images/".$imagename['partner_profile_image']);
	}
	$updatepartnerq = mysqli_query($conn, $updatepartner);
	
	if($updatepartnerq){
		echo 'Partner Details Updated';
	}
	else{
		echo 'Update Failed, Please try again!';
	}
	
}

if(isset($_POST['submitlogin'])){
	$userid = mysqli_real_escape_string($conn, $_POST['userid']);
	$mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
	$oldpassword = mysqli_real_escape_string($conn, $_POST['oldpassword']);
	$newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
	$confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
	if($confirmpassword!= ""){
		if($oldpassword == null){
			echo "Please Enter Old password";
		}
		elseif($newpassword == null){
			echo "Please Enter New password";
		}
		else{
			if($newpassword === $confirmpassword){
				$newpassword = password_hash($newpassword, PASSWORD_BCRYPT);
			$passwordcheck = mysqli_query($conn, "SELECT password FROM users_reg WHERE userid= '$userid'");
			$password=mysqli_fetch_array($passwordcheck);
			$decrypt = password_verify($oldpassword, $password['password']);
				if($decrypt){
					$updatelogin=  mysqli_query($conn, "UPDATE users_reg SET mobile= '$mobilenumber', password = '$newpassword' WHERE userid= '$userid'");
					if($updatelogin){
						echo 'Login Details Updated';
					}
					else{
						echo 'Update Failed, Please try again!';
					}
				}
				else{
					echo 'Old Password Is Incorrect';
				}			 
			}
			else{
				echo "New password and Confirm Password doesn't Match";
			}
		}
	}
	else{
		$updatelogin=  mysqli_query($conn, "UPDATE users_reg SET mobile= '$mobilenumber' WHERE userid= '$userid'");
			if($updatelogin){
				echo 'Login Details Updated';
			}
			else{
				echo 'Update Failed, Please try again!';
			}
	}
	

}
?>