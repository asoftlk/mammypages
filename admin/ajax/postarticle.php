<?php
include "connect.php";
session_start();
date_default_timezone_set('Asia/Kolkata');
 $time = date("d-m-Y")."-".time();
 $postingid = "POST".mt_rand(100000,999999);
 $language = mysqli_real_escape_string($conn, $_POST['language']);
 $category1 = $_POST['category'];
 $category ="";
 for($i=0; $i<count($category1);$i++){
	 if($i==(count($category1)-1)){
		 $category .= $category1[$i];
	 }
	 else{
	 $category .= $category1[$i]." ,";
	 }
 }
 $articleTitle = mysqli_real_escape_string($conn, $_POST['articleTitle']);
 $arttype = mysqli_real_escape_string($conn, $_POST['arttype']);
 $pubtype = mysqli_real_escape_string($conn, $_POST['pubtype']);
 if($pubtype=='Scheduled'){
	$pub_datetime = mysqli_real_escape_string($conn, $_POST['datetime']);
	$pub_datetime = date_create_from_format("d/m/Y H:i", $pub_datetime);
    $pub_datetime = date_format($pub_datetime,"Y-m-d H:i");
 }
 else{
	 $pub_datetime = date('Y-m-d H:i');
 }
 $tags = mysqli_real_escape_string($conn, $_POST['tags']);
 $keywords = mysqli_real_escape_string($conn, $_POST['keywords']);
 $articledescription = mysqli_real_escape_string($conn, $_POST['articledescription']);
 $articleimages = $_FILES['articleimages']['name'];
 $articlefile =$_FILES['articlefile']['name'];
 if(isset($_POST['products'])){
 $product = $_POST['products'];
 $product0 = isset($product[0])? $product[0] : null;
 $product1 = isset($product[1])? $product[1] : null;
 $product2 = isset($product[2])? $product[2] : null;
 $product3 = isset($product[3])? $product[3] : null;
 }
 else{
 $product0 = null;
 $product1 = null;
 $product2 = null;
 $product3 = null;
 }

 //print_r(get_defined_vars());
 for ($x = 0; $x < count($articleimages); $x++) {
            $articleimage = $_FILES['articleimages']['name'][$x];	// Get image name
            if($articleimage != NULL){
            $ext = pathinfo($_FILES["articleimages"]["name"][$x], PATHINFO_EXTENSION);
            $target = $postingid.$x.$time.".".$ext;
            //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
                if (in_array($articleimage, ['jpg', 'png', 'jpeg'])) {
                        echo ' You article image extension must be .jpg, .png or .jpeg';
					}
                    if ($_FILES['articleimages']['size'][$x] > 1000000) { // file shouldn't be larger than 1Megabyte
                        echo 'article image too large upload less than 10MB size !';
                    }
					else{
                    move_uploaded_file($_FILES['articleimages']['tmp_name'][$x], "../posts/".$target);
                    }
            }
            else{
                $articleimage="";
                $target="";
            }
            $articleinsert= mysqli_query($conn, "INSERT INTO post_images ( posting_id, image_name) VALUES ('$postingid', '$target')");
        }
 if($articleinsert){
	if($articlefile != NULL){
		$artext = pathinfo($_FILES["articlefile"]["name"], PATHINFO_EXTENSION);
        $articletarget = "art".$time.".".$artext;
		move_uploaded_file($_FILES['articlefile']['tmp_name'], "..posts/".$articletarget);
	}
	else{
		$articletarget=null;
	}
 $featuredimage = $_FILES['featuredimage']['name'];
 //echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>';
			if($featuredimage != NULL){
                $ext1 = pathinfo($_FILES["featuredimage"]["name"], PATHINFO_EXTENSION);
                $featuretarget = "fea".$time.".".$ext1;
                //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
                    if (in_array($featuredimage, ['jpg', 'png', 'jpeg'])) {
                            echo 'You featured image extension must be .jpg, .png or .jpeg';
						}
                     if ($_FILES['featuredimage']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
                            echo '"profile image too large!"';
                        }
                    else{
                        move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../posts/".$featuretarget);
                        }
            }
			$query= "INSERT INTO posts(`posting_id`, `language`, `category`, `article_title`, `arttype`, `pubtype`, `pub_datetime`, `tags`, `keywords`, `description`, `featured_image`, `articlefile`, `product1`, `product2`, `product3`, `product4`, `datetime`)
			VALUES ('$postingid', '$language', '$category', '$articleTitle', '$arttype', '$pubtype','$pub_datetime', '$tags', '$keywords', '$articledescription', '$featuretarget', '$articletarget', '$product0', '$product1', '$product2', '$product3', now())";
			$result = mysqli_query($conn, $query);
			if($result){
				echo "Posted Successfully";
			}
			else{
				echo "Failed to Post";
			}
			
 }
?>