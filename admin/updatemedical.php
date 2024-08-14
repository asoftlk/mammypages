    <?php
    include "../connect.php";
    session_start();
    if(isset($_POST['id'])){
    date_default_timezone_set('Asia/Kolkata');
        $time = date("d-m-Y")."-".time();
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $mpId = mysqli_real_escape_string($conn, $_POST['mpId']);
        $name = mysqli_real_escape_string($conn, $_POST['mpname']);
        $speciality = $_POST['specialist'][0];
  
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $map = mysqli_real_escape_string($conn, $_POST['mapLocation']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $mobile = mysqli_real_escape_string($conn, $_POST['contactNumber']);
        $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $website = mysqli_real_escape_string($conn, $_POST['web']);
        
        $isMain = null;
		$mainId = null;
        
		$estYear = filter_input(INPUT_POST, 'estYear');
		$service = filter_input(INPUT_POST, 'service');

		$doctorId = filter_input(INPUT_POST, 'doctorId'); 

    //  $working_hours = mysqli_real_escape_string($conn, $_POST['midwifeworking']);
        $working_hours = null;
        $facebook = mysqli_real_escape_string($conn, $_POST['fb']);
        $instagram = mysqli_real_escape_string($conn, $_POST['insta']);
        $linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
        $youtube = filter_input(INPUT_POST, 'youtube');
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $about = mysqli_real_escape_string($conn, $_POST['about']);
        $videoembed = mysqli_real_escape_string($conn, $_POST['videoembed']);
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
    $galupdate = mysqli_query($conn, "SELECT * FROM mpmedical_gallery WHERE medical_id='$mpId'");
    if(mysqli_num_rows($galupdate)>0){
                While($galrow= mysqli_fetch_array($galupdate)){
                    $id1 = $galrow['id'];
                    foreach($galleryid as $value)
                    {
                        $key = array_search($id1, $galleryid);
                        if($key === false)
                        {
                        if(file_exists("../directory/medical/".$galrow['image_name'])){
                            unlink("../directory/medical/".$galrow['image_name']);
                            $artdelete = mysqli_query($conn, "DELETE FROM mpmedical_gallery  WHERE id = '$id1'");
                        }
                        else{
                            $artdelete = mysqli_query($conn, "DELETE FROM mpmedical_gallery  WHERE id = '$id1'");
                        }
                        }
                        else
                        {
                            $updategallery = "UPDATE mpmedical_gallery SET date=now() ";
                            if($galleryimage!=null  and $galleryimage[$key]!=null){
                                if(file_exists('../directory/medical/'.$galrow["image_name"])){
                                unlink('../directory/medical/'.$galrow["image_name"]);
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
                                        move_uploaded_file($_FILES['galleryimage']['tmp_name'][$key], "../directory/medical/".$target);
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
                        move_uploaded_file($_FILES['galleryimages']['tmp_name'][$x], "../directory/medical/".$target);
                        }
                }
                else{
                    $galleryimage="";
                    $target="";
                }
                $articleinsert= mysqli_query($conn, "INSERT INTO mpmedical_gallery ( medical_id, image_name) VALUES ('$mpId', '$target')");
            }
    }	   
    $updatequery = "Update medical SET name='$name',speciality='$speciality',doctor_id='$doctorId',address='$address', map='$map', city='$city', mobile='$mobile',email='$email',whatsapp='$whatsapp',website='$website',youtube='$youtube',established='$estYear', service='$service', working_hours='$working_hours', facebook='$facebook', instagram='$instagram', linkedin='$linkedin', status='$status',about='$about' ";		
        $featuredimage = $_FILES['featuredimage']['name'];
            
            
                if($featuredimage != ""){
                    $removeimg= mysqli_query($conn, "SELECT image from medical WHERE id= '$id'");
                    $imagename = mysqli_fetch_assoc($removeimg);
                    if($imagename['image'] && file_exists("../directory/medical/".$imagename['image'])){
                        unlink("../directory/medical/".$imagename['image']);
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
                            move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../directory/medical/".$featuretarget);
                            }
                            $updatequery .= ", image= '$featuretarget' "; 
                }
                else{
                    
                }
                $logoimage = $_FILES['logoimage']['name'];
                if($logoimage != ""){
                    $removefile= mysqli_query($conn, "SELECT logo from medical WHERE id= '$id'");
                    $filename = mysqli_fetch_array($removefile);
                    if($filename['logo'] && file_exists("../directory/medical/".$filename['logo'])){
                        unlink("../directory/medical/".$filename['logo']);
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
                            move_uploaded_file($_FILES['logoimage']['tmp_name'], "../directory/medical/".$filetarget);
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
                    $removevideo= mysqli_query($conn, "SELECT video from medical WHERE id= '$id'");
                    $videoname = mysqli_fetch_array($removevideo);
                    if($videoname['video'] && file_exists("../directory/medical/video/".$videoname['video'])){
                        unlink("../directory/medical/video/".$videoname['video']);
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
                            move_uploaded_file($_FILES['galvideo']['tmp_name'], "../directory/medical/video/".$videotarget);
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
                $extends = mysqli_real_escape_string($conn, $_POST[$day . 'extends']) === '1' ? 'Y' : 'N';
                $isOpen24Hours = mysqli_real_escape_string($conn, $_POST[$day . '24']) === '1' ? 'Y' : 'N';

                $updateWorkingTime = "UPDATE medical_working_times SET {$times['open']} = '$open', {$times['close']} = '$close', 
                {$day}extends = '$extends', {$day}24 = '$isOpen24Hours' WHERE medical_id = '$mpId'";

                mysqli_query($conn, $updateWorkingTime);
            }
            echo 'Doctor Clinics & Nursing homes Updated';
        }
        else{
            echo 'Update Failed, Please try again!';
        }
    }

    ?>