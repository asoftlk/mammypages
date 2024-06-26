<?php
include "../connect.php";
date_default_timezone_set('Asia/Kolkata');
 $time = date("d-m-Y")."-".time();
if(isset($_POST['id'])){
	$id= mysqli_real_escape_string($conn, $_POST['id']);
	 $productcategory = mysqli_real_escape_string($conn, $_POST['productcategory']);
	 $Productname = mysqli_real_escape_string($conn, $_POST['Productname']);
	 $producturl = mysqli_real_escape_string($conn, $_POST['producturl']);
	 $productimage = $_FILES['productimage']['name'];
	 $updatequery = "UPDATE products SET productcategory= '$productcategory', Productname='$Productname', producturl='$producturl' ";
	 if($productimage != NULL){
		$deletequery = mysqli_query($conn, "SELECT productimage FROM products WHERE id = '$id'");
		$deleterow=mysqli_fetch_assoc($deletequery);
		if(file_exists("../products/".$deleterow['productimage'])){
		unlink("../products/".$deleterow['productimage']);
		}
	$ext1 = pathinfo($_FILES["productimage"]["name"], PATHINFO_EXTENSION);
	$featuretarget = "prd".$time.".".$ext1;
		if (in_array($productimage, ['jpg', 'png', 'jpeg'])) {
				echo 'You product image extension must be .jpg, .png or .jpeg';
				exit();
			}
		 if ($_FILES['productimage']['size'] > 30000000) { // file shouldn't be larger than 1Megabyte
				echo '"Product image image too large! Max size 30MB"';
				exit();
			}
		else{
				$featureupload = move_uploaded_file($_FILES['productimage']['tmp_name'], "../products/".$featuretarget);
				$updatequery .= ", productimage = '$featuretarget' ";
            }
    }
	$updatequery .= " WHERE id= '$id'";
	$updateproduct = mysqli_query($conn, $updatequery);
	if($updateproduct){
	echo "Updated Successfully";
 }
else{
	echo "Update Failed, Please try Again";
}
}
else{
 $productid = "PRODUCT".mt_rand(100000,999999);
 $productcategory = mysqli_real_escape_string($conn, $_POST['productcategory']);
 $productname = mysqli_real_escape_string($conn, $_POST['productname']);
 $producturl = mysqli_real_escape_string($conn, $_POST['producturl']);
 $productimage = $_FILES['productimage']['name'];
 if($productimage != NULL){
	$ext1 = pathinfo($_FILES["productimage"]["name"], PATHINFO_EXTENSION);
	$featuretarget = "prd".$time.".".$ext1;
		if (in_array($productimage, ['jpg', 'png', 'jpeg'])) {
				echo 'You product image extension must be .jpg, .png or .jpeg';
				exit();
			}
		 if ($_FILES['productimage']['size'] > 30000000) { // file shouldn't be larger than 1Megabyte
				echo '"Product image image too large! Max size 30MB"';
				exit();
			}
		else{
				$featureupload = move_uploaded_file($_FILES['productimage']['tmp_name'], "../products/".$featuretarget);
            }
    }
   // print_r(get_defined_vars());
 
 	// echo "mag: ".$magazineupload."fea: ".$featureupload;

 if($featureupload){
 $query= "INSERT INTO products(productid, productcategory, Productname, producturl, productimage, datetime)
 VALUES ('$productid', '$productcategory', '$productname', '$producturl', '$featuretarget', now())";
// echo $query;
 $result = mysqli_query($conn, $query);
 if($result){
	echo "Posted Successfully";
 }
else{
	echo "Failed to Post";
}
}
}
?>