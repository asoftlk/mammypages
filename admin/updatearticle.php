<?php
include "../connect.php";
session_start();
if(isset($_POST['id'])){

date_default_timezone_set('Asia/Kolkata');
 $time = date("d-m-Y")."-".time();
 $postingid = mysqli_real_escape_string($conn, $_POST['id']);
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
 if(isset($_FILES['articleimages']['name'])){
	 $articleimages = $_FILES['articleimages']['name'];
 }
 else{
	 $articleimages= array();
 }
 //$articleimage = $_FILES['articleimage']['name'];
 $articlefile =$_FILES['articlefile']['name'];
	 if(isset($_FILES['articleimage']['name'])){
		$articleimage = $_FILES['articleimage']['name'];
	}
	else{
		$articleimage = array();
	}
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
 if(isset($_POST['articleid'])){
	 $articleid = $_POST['articleid'];
 }
 else{
	 $articleid = array( '0' => 'a');
 }
$artupdate = mysqli_query($conn, "SELECT * FROM post_images WHERE posting_id='$postingid'");
if(mysqli_num_rows($artupdate)>0){
			While($artrow= mysqli_fetch_array($artupdate)){
				$id = $artrow['id'];
				foreach($articleid as $value)
				{
					$key = array_search($id, $articleid);
					if($key === false)
					{
					if(file_exists("posts/".$artrow['image_name'])){
						unlink("posts/".$artrow['image_name']);
						$artdelete = mysqli_query($conn, "DELETE FROM post_images  WHERE id = '$id'");
					}
					}
					else
					{
						$updatearticle = "UPDATE post_images SET datetime=now() ";
						if($articleimage!=null  and $articleimage[$key]!=null){
							if(file_exists('posts/'.$artrow["image_name"])){
							unlink('posts/'.$artrow["image_name"]);
							}
						$ext = pathinfo($_FILES["articleimage"]["name"][$key], PATHINFO_EXTENSION);
						$target = $postingid.$key.$time.".".$ext;
								if (in_array($articleimage, ['jpg', 'png', 'jpeg'])) {
										echo 'You Article file extension must be .jpg, .png or .jpeg';
										exit();
									} 
									elseif ($_FILES['articleimage']['size'][$key] > 10000000) { // file shouldn't be larger than 1Megabyte
										echo 'Article image too large!';
										exit();
									}
								else{
									move_uploaded_file($_FILES['articleimage']['tmp_name'][$key], "posts/".$target);
									}
									$updatearticle .= ", image_name= '$target' "; 
						}
						$updatearticle .= " WHERE id = '$id'";
						$updatearticlerow = mysqli_query($conn, $updatearticle);
					}
					}
				}
			}
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
                    move_uploaded_file($_FILES['articleimages']['tmp_name'][$x], "posts/".$target);
                    }
            }
            else{
                $articleimage="";
                $target="";
            }
            $articleinsert= mysqli_query($conn, "INSERT INTO post_images ( posting_id, image_name) VALUES ('$postingid', '$target')");
        }
	if($articlefile != NULL){
		$artext = pathinfo($_FILES["articlefile"]["name"], PATHINFO_EXTENSION);
        $articletarget = "art".$time.".".$artext;
		move_uploaded_file($_FILES['articlefile']['tmp_name'], "posts/".$articletarget);
	}
	else{
		$articletarget=null;

$updatequery = "UPDATE posts SET language='$language', category='$category', article_title='$articleTitle', arttype='$arttype', pubtype='$pubtype', tags='$tags', keywords='$keywords', description='$articledescription', product1='$product0', product2='$product1', product3='$product2', product4='$product3', datetime =now() ";	
 $featuredimage = $_FILES['featuredimage']['name'];
            if($featuredimage != ""){
				$removeimg= mysqli_query($conn, "SELECT featured_image from posts WHERE posting_id= '$postingid'");
				$imagename = mysqli_fetch_array($removeimg);
				if($imagename['featured_image'] && file_exists("posts/".$imagename['featured_image'])){
					unlink("posts/".$imagename['featured_image']);
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
                        move_uploaded_file($_FILES['featuredimage']['tmp_name'], "posts/".$featuretarget);
                        }
						$updatequery .= ", featured_image= '$featuretarget' "; 
            }
            else{
                $profilePicture="";
                $profiletarget="";
            }
			$articlefile = $_FILES['articlefile']['name'];
            if($articlefile != ""){
				$removefile= mysqli_query($conn, "SELECT articlefile from posts WHERE posting_id= '$postingid'");
				$filename = mysqli_fetch_array($removefile);
				if($filename['articlefile'] && file_exists("posts/".$filename['articlefile'])){
					unlink("posts/".$filename['articlefile']);
				}
                $ext1 = pathinfo($_FILES["articlefile"]["name"], PATHINFO_EXTENSION);
                $filetarget = "file".$time.".".$ext1;
                //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
                    if (in_array($articlefile, ['pdf'])) {
                            echo 'You article file extension must be .pdf';
							exit();
                        } 
                        elseif ($_FILES['articlefile']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
                            echo '"Article file too large!"';
							exit();
                        }
                    else{
                        move_uploaded_file($_FILES['articlefile']['tmp_name'], "posts/".$filetarget);
                        }
						$updatequery .= ", articlefile= '$filetarget' "; 
            }
            else{
                $articlefile="";
                $filetarget="";
            }
            if($pubtype=='Scheduled'){
				$updatequery .= ", pub_datetime='$pub_datetime' ";
			}
			$updatequery .= " WHERE posting_id='$postingid'";
			$update =mysqli_query($conn, $updatequery);
	if($update){
		echo 'Post Updated';
	}
	else{
		echo 'Update Failed, Please try again!';
	}
 }

?>