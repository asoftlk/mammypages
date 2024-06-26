<?php
include "../connect.php";
date_default_timezone_set('Asia/Kolkata');
 $time = date("d-m-Y")."-".time();
 
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $userid = mysqli_real_escape_string($conn, $firstName.mt_rand(100000,999999));
    $profileid = mysqli_real_escape_string($conn, MP.mt_rand(1000000,9999999));
    $var=1;
    while($var){
    $checkid = mysqli_query($conn, "SELECT profileid FROM users_reg WHERE profileid = '$profileid'");
    if(mysqli_num_rows($checkid)>0){
        $profileid = mysqli_real_escape_string($conn, MP.mt_rand(1000000,9999999));
    }
    else{
        $var=0;
    }
    }
    $middleName =mysqli_real_escape_string($conn, $_POST['middleName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $dateOfBirth =$_POST['dateOfBirth'];
    $dateOfBirth=date_create_from_format("d/m/Y",$dateOfBirth);
    $dateOfBirth = date_format($dateOfBirth,"Y-m-d");
    $addressLine1 =mysqli_real_escape_string($conn, $_POST['addressLine1']);
    $Address_Line2 = mysqli_real_escape_string($conn, $_POST['Address_Line2']);
    $city =mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $Province =mysqli_real_escape_string($conn,  $_POST['Province']);
    //$profilePicture = $_POST['profilePicture'];
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
    $marital = $_POST['marital'];
    $isPregnant = $_POST['isPregnant'];
    if($isPregnant == 'true'){
        $pregnancyWeek =$_POST['pregnancyWeek'];
    }
    else{
        $pregnancyWeek = '';
    }
	$partnerName = $_POST['partnerName'];
	if(!empty($_POST['partnerdob'])){
    $partnerdob = $_POST['partnerdob'];
    $partnerdob=date_create_from_format("d/m/Y",$partnerdob);
    $partnerdob = date_format($partnerdob,"Y-m-d");
	}
	else{
		$partnerdob="";
	}
	if(!empty($_POST['anniversary'])){
    $anniversary = $_POST['anniversary'];
    $anniversary=date_create_from_format("d/m/Y",$anniversary);
    $anniversary = date_format($anniversary,"Y-m-d");
	}
	else{
		$anniversary ="";
	}
    $partneroccupation =mysqli_real_escape_string($conn, $_POST['partneroccupation']);
    $mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
	$query= mysqli_query($conn, "SELECT * FROM users_reg WHERE email = '$email' AND  mobile ='$mobilenumber'");
	$query1= mysqli_query($conn, "SELECT * FROM users_reg WHERE email = '$email'");
	$query2= mysqli_query($conn, "SELECT * FROM users_reg WHERE mobile = '$mobilenumber'");
	if(mysqli_num_rows($query)>0){
		echo "Already registered with same mobilenumber and email id";
		exit();
	}
	elseif(mysqli_num_rows($query1)>0){
		echo "Email already registered";
		exit();
	}
	elseif(mysqli_num_rows($query2)>0){
		echo "Mobile number already registered";
		exit();
	}	
	$haveChildren =$_POST['haveChildren'];
    if($haveChildren == 'true'){
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
                        echo 'You child file extension must be .jpg, .png or .jpeg';
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
       // if($childinsert and $haveChildren == 'false')
    
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	//$password1 = mysqli_real_escape_string($conn,$_POST['password']);
            $profilePicture = $_FILES['profilePicture']['name'];
            if($profilePicture != NULL){
                $ext1 = pathinfo($_FILES["profilePicture"]["name"], PATHINFO_EXTENSION);
                $profiletarget = "Profile".$userid.$time.".".$ext1;
                //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
                    if (in_array($profilePicture, ['jpg', 'png', 'jpeg'])) {
                            echo 'You profile file extension must be .jpg, .png or .jpeg';
                            exit();
                        } 
                        elseif ($_FILES['profilePicture']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
                            echo '"profile image too large!"';
                            exit();
                        }
                    else{
                        move_uploaded_file($_FILES['profilePicture']['tmp_name'], "../images/".$profiletarget);
                        }
            }
            else{
                $profilePicture="";
                $profiletarget="";
            }
            $PartnerProfilePicture = $_FILES['PartnerProfilePicture']['name'];
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
                        }
                    else{
                        move_uploaded_file($_FILES['PartnerProfilePicture']['tmp_name'], "../images/".$partnerprofiletarget);
                        }
            }
            else{
                $PartnerProfilePicture = "";
                $partnerprofiletarget = "";
            }
            
            $query = "INSERT INTO users_reg (userid, profileid, first_name, middle_name, last_name, dob, address1, address2, country, city, province, profile_image, occupation, planguage, fav_article, marital_status, pregnant, pregnant_week, children, partner_name, partner_profile_image, anniversary_date, partner_dob, partner_occupation, mobile, email, password, mobile_verified, email_verified, status, datetime) VALUES ('$userid', '$profileid', '$firstName', '$middleName', '$lastName', '$dateOfBirth', '$addressLine1', '$Address_Line2', '$country', '$city', '$Province', '$profiletarget', '$Occupation', '$langselection', '$favArticleCategory', '$marital', '$isPregnant', '$pregnancyWeek', '$haveChildren', '$partnerName', '$partnerprofiletarget', '$anniversary', '$partnerdob', '$partneroccupation', '$mobilenumber', '$email', '$password',  0, 0, 0, now())";
           $result = mysqli_query($conn, $query);
           
            if($result){
                echo "success";
            }
            else{
                echo "Registration failed please try after sometime";
            }
?>