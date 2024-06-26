<?php
include "../connect.php";
date_default_timezone_set('Asia/Kolkata');
 $time = date("d-m-Y")."-".time();
 $magazineid = "MAGAZINE".mt_rand(100000,999999);
 $language = $_POST['language'];
 $magazinetitle = $_POST['magazinetitle'];
 $featuredimage = $_FILES['featuredimage']['name'];
 $magazinefile = $_FILES['magazinefile']['name'];
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
			if($magazinefile != NULL){
				$ext2 = pathinfo($_FILES["magazinefile"]["name"], PATHINFO_EXTENSION);
				$magazinetarget = "mag".$time.".".$ext2;
					if (in_array($magazinefile, ['pdf'])) {
							echo 'You Magazine File extension must be .pdf';
						}
					if ($_FILES['magazinefile']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
						echo '"Magazine file too large! Max size 100MB"';
					}
					else{
						$magazineupload = move_uploaded_file($_FILES['magazinefile']['tmp_name'], "../magazines/".$magazinetarget);
					}
				$featureupload = move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../magazineimages/".$featuretarget);
				}
			}
 }
 	// echo "mag: ".$magazineupload."fea: ".$featureupload;

 if($magazineupload && $featureupload){
 $query= "INSERT INTO magazine(magazineid, language, magazinetitle, featured_image, file_name, date)
 VALUES ('$magazineid', '$language', '$magazinetitle', '$featuretarget', '$magazinetarget', now())";
// echo $query;
 $result = mysqli_query($conn, $query);
 if($result){
	echo "Posted Successfully";
 }
else{
	echo "Failed to Post";
}
}
?>