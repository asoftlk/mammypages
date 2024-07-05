<?php
include "../connect.php";
date_default_timezone_set('Asia/Kolkata');
$time = date("d-m-Y")."-".time();
if(isset($_POST['sub-hos-branch'])){
    $hospitalbranchid = "hbranch-".mt_rand(1000000,9999999);
    $htime_id = "hostbranchtime-".mt_rand(1000000,9999999);
	$hospitalid= filter_input(INPUT_POST, 'bhospitalname');
    $branchname = filter_input(INPUT_POST, 'branchname');
    
    $hospitalQuery = mysqli_query($conn, "SELECT * FROM hospital WHERE hospital_id = '$hospitalid'");
    $hospitalRow = mysqli_fetch_array($hospitalQuery);
    $hospitalname = $hospitalRow['name'];
    $hospitaltype = $hospitalRow['type'];

	$branchaddr = filter_input(INPUT_POST, 'branchaddr');
	$branchmap = filter_input(INPUT_POST, 'branchmap');
	$branchcity = filter_input(INPUT_POST, 'branchcity');
	$branchcont = filter_input(INPUT_POST, 'branchcont');
	$branchwhatsapp = filter_input(INPUT_POST, 'branchwhatsapp');
	$branchemail = filter_input(INPUT_POST, 'branchemail');
	$branchweb = filter_input(INPUT_POST, 'branchweb');
	$branchtype = filter_input(INPUT_POST, 'branchtype');
	$branchfb = filter_input(INPUT_POST, 'branchfb');
	$branchinsta = filter_input(INPUT_POST, 'branchinsta');
	$branchln = filter_input(INPUT_POST, 'branchln');
	$status = filter_input(INPUT_POST, 'status');
	$about = mysqli_real_escape_string($conn, $_POST['branchabout']);
	$videoembed = mysqli_real_escape_string($conn, $_POST['videoembed']);

	$mon_open = filter_input(INPUT_POST, 'monopentime');
	$mon_close = filter_input(INPUT_POST, 'monendtime');
	$tue_open = filter_input(INPUT_POST, 'tueopentime');
	$tue_close = filter_input(INPUT_POST, 'tueendtime');
	$wed_open = filter_input(INPUT_POST, 'wedopentime');
	$wed_close = filter_input(INPUT_POST, 'wedendtime');
	$thu_open = filter_input(INPUT_POST, 'thuopentime');
	$thu_close = filter_input(INPUT_POST, 'thuendtime');
	$fri_open = filter_input(INPUT_POST, 'friopentime');
	$fri_close = filter_input(INPUT_POST, 'friendtime');
	$sat_open = filter_input(INPUT_POST, 'satopentime');
	$sat_close = filter_input(INPUT_POST, 'satendtime');
	$sun_open = filter_input(INPUT_POST, 'sunopentime');
	$sun_close = filter_input(INPUT_POST, 'sunendtime');

	$priority = 0;
	
	
    $logoimage = $_FILES['logoimage']['name'];
    $featuredimage = $_FILES['featuredimage']['name'];
        $galimages = $_FILES['galimages']['name'];
        if(!empty($videoembed)){
            $videotarget = $videoembed;
        }
        else{
        $galvideo = $_FILES['galvideo']['name'];
        //print_r(get_defined_vars());
        //exit;
        if($galvideo != NULL){
            $videoext = pathinfo($_FILES["galvideo"]["name"], PATHINFO_EXTENSION);
            $videotarget = "Vid".$time.".".$videoext;
            if (in_array($videotarget, ['mp4', 'ogg', 'WebM'])) {
                    echo 'You Gallery Video must be mp4/ogg/webm';
                    exit();
                }
            if ($_FILES['galvideo']['size'] > 300000000) { // file shouldn't be larger than 1Megabyte
                    echo '"Gallery Video too large! Max size 300MB"';
                    exit();
                }
            $videoupload = move_uploaded_file($_FILES['galvideo']['tmp_name'], "../directory/hospital/video/".$videotarget);
        }
        }
        $videotarget = isset($videotarget) ? $videotarget : '';
        if($featuredimage != NULL){
        $ext1 = pathinfo($_FILES["featuredimage"]["name"], PATHINFO_EXTENSION);
        $featuretarget = "fea".$time.".".$ext1;
            if (in_array($featuredimage, ['jpg', 'png', 'jpeg'])) {
                    echo 'You featured image extension must be .jpg, .png or .jpeg';
                    exit();
                }
            if ($_FILES['featuredimage']['size'] > 30000000) { // file shouldn't be larger than 1Megabyte
                    echo '"Featured  image too large! Max size 30MB"';
                    exit();
                }
            else{
                for ($x = 0; $x < count(array($galimages)); $x++) {
                    $galimages = $_FILES['galimages']['name'][$x];	// Get image name
                    if($galimages != NULL){
                    $ext = pathinfo($_FILES["galimages"]["name"][$x], PATHINFO_EXTENSION);
                    $target = $hospitalid.$x.$time.".".$ext;
                    //$image_link = "https://veramasa.com/udyogsadhna/images/".$target;
                        if (in_array($galimages, ['jpg', 'png', 'jpeg'])) {
                                echo 'Gallery image extension must be .jpg, .png or .jpeg';
                                exit();
                            }
                            if ($_FILES['galimages']['size'][$x] > 10000000) { // file shouldn't be larger than 1Megabyte
                                echo 'Gallery image too large upload less than 10MB size !';
                                exit();
                            }
                            else{
                            move_uploaded_file($_FILES['galimages']['tmp_name'][$x], "../directory/hospital/".$target);
                            }
                    }
                    else{
                        $galimages="";
                        $target="";
                    }
                    $galinsert= mysqli_query($conn, "INSERT INTO mpgallery ( hospitalid, image_name) VALUES ('$hospitalid', '$target')");
                }  
                $featureupload = move_uploaded_file($_FILES['featuredimage']['tmp_name'], "../directory/hospital/".$featuretarget);
            }
            
        $ext2 = pathinfo($_FILES["logoimage"]["name"], PATHINFO_EXTENSION);
        $logotarget = "logo".$time.".".$ext2;
            if (in_array($logoimage, ['jpg', 'png', 'jpeg'])) {
                    echo 'Logo image extension must be .jpg, .png or .jpeg';
                    exit();
                }
            if ($_FILES['logoimage']['size'] > 30000000) { // file shouldn't be larger than 1Megabyte
                    echo '"Logo image too large! Max size 30MB"';
                    exit();
                }	
            $logoupload = move_uploaded_file($_FILES['logoimage']['tmp_name'], "../directory/hospital/".$logotarget);
            
        if($featureupload){
            $query= "INSERT INTO hospital_branch (hospitalbranchid, htime_id, hospitalid, branchname, branchaddr, branchmap, branchcity, branchcont, branchwhatsapp, branchemail, branchweb, branchfb, branchinsta, branchln, status, about, videoembed, logoimage, featuredimage, galvideo)
            VALUES ('$hospitalbranchid', '$htime_id', '$hospitalid', '$hospitalname - $branchname', '$branchaddr', '$branchmap', '$branchcity', '$branchcont', '$branchwhatsapp', '$branchemail', '$branchweb', '$branchfb', '$branchinsta', '$branchln', '$status', '$about', '$videoembed', '$logoimage', '$featuretarget', '$videotarget')";
            $result = mysqli_query($conn, $query);

            $workingTimesQuery = "INSERT INTO hospital_working_times (htime_id, hospital_id, hospital_type, hospital_branch, monday_open, monday_close, tuesday_open, tuesday_close, wednesday_open, wednesday_close, thursday_open, thursday_close, friday_open, friday_close, saturday_open, saturday_close, sunday_open, sunday_close) 
                        VALUES ('$htime_id','$hospitalid', '$hospitaltype', '$hospitalbranchid', '$mon_open', '$mon_close', '$tue_open', '$tue_close', '$wed_open', '$wed_close', '$thu_open', '$thu_close', '$fri_open', '$fri_close', '$sat_open', '$sat_close', '$sun_open', '$sun_close')";
            $resultWorkingTimes = mysqli_query($conn, $workingTimesQuery);
            if($result && $resultWorkingTimes){
                $conn->commit();
                echo "Branch Added Successfully";
            }
            else{
                $conn->rollback();
                echo "Failed to Post";
            }
        }	
        }
    
    }

?>