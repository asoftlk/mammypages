<?php include "mp.php"; 
	$userid= isset($_SESSION['userid'])?$_SESSION['userid']:"";
	?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.8/dist/sweetalert2.all.min.js"></script>
<style>
	.typename{
	font-size:16px;
	font-weight:700;
	}
	.mptype{
	border-left: 4px solid #68CF68;
	margin-bottom: 0;
	color:#666666;
	}
	.mptype span{
	/* background-color: #000;
	color: #fff; */
	padding: 2px 1px;
	margin-left: 2px;
	text-transform: uppercase;
	font-size:10px;
	font-weight:100;
	}
	.google-auto-placed{
	display:none;
	}
	.fillbg{
	background-color:#fff;
	padding:2px;
	}
	.heading {
	position: relative;
	line-height: 1.2em;
	padding:0 0 0 1rem; 
	color:#464444;
	font-weight:bold;
	}
	.heading:before {
	position: absolute;
	left: 16px;
	top: 1.2em;
	height: 0;
	width: 35px;
	content: '';
	border-top: 4px solid #0AD69E;
	border-radius: 1em;
	}
	.heading1 {
	position: relative;
	line-height: 1.2em;
	padding:0 0 0 1rem; 
	color:#464444;
	font-weight:bold;
	}
	.heading1:before {
	position: absolute;
	left: 0px;
	top: 1.2em;
	height: 0;
	width: 35px;
	content: '';
	border-top: 4px solid #0AD69E;
	border-radius: 1em;
	}
	.rating{
	font-size:12px;
	background-color:#f4f4f4;
	}
	.galimage, .galvideo{
	background-color:#f4f4f4;
	padding:2px 10px;
	float:right;
	margin:0 2px;
	font-size:12px;
	}
	.galimage, .galvideo{
	cursor:pointer;
	}
	.map iframe{
	width:100%;
	height:200px;
	}
	.rate {
	float: left;
	height: 46px;
	padding: 0 10px;
	}
	input[type="radio"]{display:none;}
	.rate:not(:checked) > input {
	position:absolute;
	top:-9999px;
	}
	.rate:not(:checked) > label {
	float:right;
	width:1em;
	overflow:hidden;
	white-space:nowrap;
	cursor:pointer;
	font-size:30px;
	color:#ccc;
	}
	.rate:not(:checked) > label:before {
	content: '★ ';
	}
	.rate > input:checked ~ label {
	color: #ffc700;    
	}
	.rate:not(:checked) > label:hover,
	.rate:not(:checked) > label:hover ~ label {
	color: #deb217;  
	}
	.rate > input:checked + label:hover,
	.rate > input:checked + label:hover ~ label,
	.rate > input:checked ~ label:hover,
	.rate > input:checked ~ label:hover ~ label,
	.rate > label:hover ~ input:checked ~ label {
	color: #c59b08;
	}
	.checked {
	color: orange;
	}
	.abouttype{
	max-height:290px;
	overflow:hidden;
	}
	.expand{
	cursor:pointer;
	color:#0AD69E;
	}
	video{
	width:100%;
	}
	.iframe{
	width:100%;
	}
	.dropdown-menu{
	/* transform: translate3d(24px, -58px, 0px)!important; */
	bottom:0!important;
	top:-5px!important;
	left:10px !important;
	padding:unset;
	height:40px;
	}
	.dropdown-item{
	padding: .25rem 0.2em;
	}	
	.dropdown-menu-arrow.dropdown-menu-right:before, .dropdown-menu-arrow.dropdown-menu-right:after {
	right: 12px;
	/* right: auto; */
	}
	.dropdown-menu-arrow:before {
	content: "";
	position: absolute;
	right: 11px;
	bottom: -10px;
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 10px 10px 0 10px;
	border-color: rgba(217,217,217,1) transparent transparent transparent;
	z-index: 9999;
	}
	.backbutton{
	position: absolute;
	left: 20;
	top: 15;
	background: #00000040;
	padding: 5px;
	border-radius: 50%;
	color: #fff;
	}
	.l-border-radius{
	border-radius: 17px;
	}
	.l-border-radius-top {
	border-top-left-radius: 17px;
	border-top-right-radius: 17px;
	border-bottom-left-radius: 0;
	border-bottom-right-radius: 0;
	}
	.l-border-radius-bottom {
	border-top-left-radius: 0;
	border-top-right-radius: 0;
	border-bottom-left-radius: 17px;
	border-bottom-right-radius: 17px;
	}
	.l-main-logo {
	border-radius: 51%;
	height: 7rem;
	width: 7rem;
	position: absolute;
	top: -32%;
	left: 12%;
	object-fit: contain;
	border: 2px solid #fff;
	background-color: #fff;
	}
	.bi-star-fill, .bi-star-half, .bi-star{
	color: #eb9c05;
	}
	textarea{
	padding: .375rem .75rem;
	font-size: 1rem;
	font-weight: 400;
	line-height: 1.5;
	color: #495057;
	background-color: #fff;
	background-clip: padding-box;
	border: 1px solid #ced4da;
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	border-radius: .25rem;
	transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
	}
	#jssor_1 img{
	width: 100% !important;
	}
	@media only screen and (min-width: 768px) {
		.followbtn{
		position: absolute;
		right: 4%;
		top: -45%;
		}
	}
	.toggle-btn.collapsed .bi-chevron-up::before {
		transform: rotate(180deg);
	}
	.carousel-item img {
		width: 100%;
		max-height: 380px;
		margin: auto;
	}
	.carousel-thumbnails img {
		height: 90px;
	}
	#gallery .modal-body{
		background-color: #222;
	}
	iframe{
		width: 100% !important;
	}
	.zoom:hover {
		-ms-transform: scale(4.5); /* IE 9 */
		-webkit-transform: scale(4.5); /* Safari 3-8 */
		transform: scale(4.5); 
		position: relative;
    z-index: 1000;
	}

</style>
<div class="content">
	<section class="main-content-sec">
		<div class="container-fluid p-0">
			<div class="row m-0 desktopviewArticle">
				<div class="col-md-3">
					<div class="left-menu-part" style="background:transparent;">
						<div class="unscroll" style="background-color:#fff; margin:10px 0; padding:10px 0">
							<?php include "sidebar.php"; ?>
							<div class="client-sec mb"><a class="client-btn">Sponsors</a></div>
						</div>
						<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- home -->
						<ins class="adsbygoogle"
							style="display:block"
							data-ad-client="ca-pub-6640694817095655"
							data-ad-slot="5367742441"
							data-ad-format="auto"
							data-full-width-responsive="true"></ins>
						<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				</div>
				<div class="col-md-6">
					<?php 
						$type = isset($_GET['type']) ? mysqli_real_escape_string($conn, $_GET['type']) : '';
                        $id = isset($_POST[$type . '_id']) ? $_POST[$type . '_id'] : '';
                        $name = isset($_GET['name']) ? mysqli_real_escape_string($conn, str_replace('_', ' ', $_GET['name'])) : '';
                        $passName = isset($_GET['name']) ? $_GET['name']:"";
						if (!empty($type) && !empty($name)) {
							$tablegallery_name = "mp" . $type . "_gallery";
							$id_column = $type . '_id';
                            $query = "SELECT * FROM `$type` AS h INNER JOIN `" . $type . "_working_times` AS hwt ON hwt.`" . $type . "_id` = h.`" . $type . "_id` WHERE h.name = '$name'";
                            
							$typequery = mysqli_query($conn, $query);
						}		
            				
						$row= mysqli_fetch_array($typequery);
						$typeid = $row[$id_column];
						$type_name = $row['name'];
						if (isset($row['speciality'])) {
							$specialityarray = explode(" ///", $row['speciality']);
							$speciality = "";
							$videourl = $row['video'];
							for($i=0; $i< count($specialityarray); $i++){
								if($i == count($specialityarray)-1){
									
									$speciality .= $specialityarray[$i];
								}
								else{
									$speciality .= $specialityarray[$i].", ";
								}
							};
						}

						if (isset($row['main_id']) && !empty($row['main_id'])) {
							$mainid = $row['main_id'];
			
							$name_query = "SELECT * FROM `$type` WHERE `id` = '$mainid'";
							$namequery = mysqli_query($conn, $name_query);
							
							if ($namequery) {
								$row1 = mysqli_fetch_array($namequery);
							}			
						}
						$targetUrl = '';
						if ($type == 'doctor') {
							$targetUrl = 'doctors';
						} elseif ($type == 'saloon') {
							$targetUrl = 'beauty';
						} elseif ($type == 'pharmacy') {
							$targetUrl = 'pharmacies';
						} else {
							$targetUrl = $type;
						}
						if(($type == $type) && (mysqli_num_rows($typequery)>0)){
							$url=urlencode('https://www.mammypages.com/'.$type.'/'.$passName);
							$urltelegram=urlencode('https://www.mammypages.com/'.$type.'/'.$passName);
						echo '<div class="row fillbg l-border-radius-top">
								<div class="text-center p-0">
									<img src="directory/'. $type .'/'.$row["image"].'" class="img-fluid mb-2" style="width:100%; max-height:250px; border-radius: 15px;">
									<a href="'. $targetUrl .'"><i class="bi bi-caret-left backbutton" data-toggle="tooltip" title="Back" data-placement="left" area-hidden="true"></i></a>
								</div>
							 </div>
								<div class="row fillbg l-border-radius-bottom l-title-card">
								    <div class="col-4 col-md-3"><img src="directory/'. $type .'/'.$row["logo"].'" class="img-fluid l-main-logo"></div>
								    <div class="col-5 col-md-6">';
								         if (!empty($row1['name']) && $row1['name'] != 0) {
											echo '<p class="typename mb-0 text-capitalize">' . $row1['name'] . ' - ' . $row['name'] . '</p>';
										} else {
											echo '<p class="typename mb-0 text-capitalize">' . $row['name'] . '</p>';
										}
										
										 if(!empty($speciality)){
											echo '<p class="mb-0">'.$speciality.'</p>';
										}
										$ratingquery= mysqli_query($conn, "SELECT SUM(rating) AS total, COUNT(rating) as count from mp_comments WHERE mp_id= '$typeid'");
										$ratingrow = mysqli_fetch_assoc($ratingquery);
										if($ratingrow['count'] != 0){
											$rating= $ratingrow['total']/$ratingrow['count'];
										}
										else{
											$rating=0;
										}
										if(isset($rating)){ 
											echo '<span class="rating">';
											$i=0;
											for($i=0; $i<5; $i++){
											if($rating >=1){
											echo '<i class="bi bi-star-fill"></i>&nbsp;';
											}
											elseif($rating > 0 and $rating < 1){
											echo '<i class="bi bi-star-half"></i>&nbsp;';
											}
											else{
											echo '<i class="bi bi-star"></i>&nbsp;';
											}
											$rating=$rating-1;									
											}
											echo '</span>';
										}
										$followquery= mysqli_query($conn, "SELECT count(*) as totalfollow FROM mp_comments WHERE mp_id='$row[$id_column]' and follow_status=1");
										$followrow=mysqli_fetch_array($followquery);
										$totalfollowers = countFormat($followrow["totalfollow"]);
										if($followrow["totalfollow"]>0){
											echo '<p class="mt-1" style="font-size:13px; font-weight:bold">'.$totalfollowers.' Followers</p>';
										}
										else{
											echo '<p class="mt-1" style="font-size:13px; font-weight:bold; height: 19.5px;"></p>';
										}
									echo '</div>';
										
								    echo '<div class="col-md-3 position-relative">';
								        if (isset($row['type']) && !empty($row['type'])){

											echo '<p class="mptype position-absolute" style="right:10px"><span>'.$row['type'].'</span></p><br>';
										}
								        
										echo  '<div class="d-flex  float-sm-right">';
										echo !empty($row['facebook']) ?  '<a href="'.$row["facebook"].'" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-facebook p-1"></i></a>&nbsp;':"";
										echo !empty($row['facebook']) ?  '<a href="#" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-tiktok p-1"></i></a>&nbsp;':"";
										echo !empty($row['instagram']) ?  '<a href="'.$row["instagram"].'" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-instagram p-1"></i></a>&nbsp;':"";
										echo !empty($row['linkedin']) ?  '<a href="'.$row["linkedin"].'" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-linkedin p-1"></i></a>&nbsp;':"";
										echo !empty($row['youtube']) ?  '<a href="'.$row["youtube"].'" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-youtube p-1"></i></a>&nbsp;':"";
										echo '<div class="dropup d-flex header-settings"> 
										<a href="#" class="nav-link p-1" data-toggle="dropdown" style="display:flex; text-decoration:none; color:black"><i class="bi bi-share"  style=""></i></a> 
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="" > 
											<div class="d-flex" >
												<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://www.facebook.com/sharer/sharer.php?u='.$url.'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/Facebook.png" style="width:32px; height:30px;"></a> 
												<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://twitter.com/intent/tweet?url='.$url.'\',\'MyWindow\',\'width=600,height=400\'); return false;"href=""><img src="assets/images/Twitter.png" style="width:32px; height:30px;"></a> 
												<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://www.linkedin.com/shareArticle?mini=true&url='.$url.'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/linkedin.png" style="width:32px; height:30px;"></a> 
												<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://telegram.me/share/url?url='.$urltelegram.'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/telegram.png" style="width:32px; height:30px;"></a> 
												<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://api.whatsapp.com/send?text='.$url.'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/Whatsapp.png" style="width:32px; height:30px;"></a> 
											</div>
										</div>
										</div>';
											$followstatus = mysqli_query($conn, "SELECT * FROM mp_comments WHERE userid='$userid' AND mp_id='{$row[$id_column]}' AND follow_status=1");
											$followstatusrow = mysqli_fetch_array($followstatus);

											if ($followstatusrow && isset($followstatusrow['follow_status'])) {
												if ($followstatusrow['follow_status'] == 0) {
													echo '<button class="btn btn-success followbtn" value="'.$row["$id_column"].'" style="font-size: 13px; padding: 0 5px;">Follow</button>';
												} else {
													echo '<button class="btn btn-secondary followbtn" value="'.$row["$id_column"].'" style="font-size: 13px; padding: 0 5px;">Following</button>';
												}
											} else {
												echo '<button class="btn btn-success followbtn ml-2" value="'.$row["$id_column"].'" style="font-size: 13px; padding: 0 5px;">Follow</button>';
											}
									echo '</div>
								</div>
								</div>';
									echo '<div class="row fillbg mt-1 l-border-radius py-2">
									        <h5 class="heading mt-1" style="font-weight:bold; font-size:12px; text-transform:uppercase;">ABOUT '.$row['name'].'';
									        
									        $galquery= mysqli_query($conn, "SELECT image_name FROM $tablegallery_name WHERE $id_column= '$typeid' and image_name!=''");
											if(mysqli_num_rows($galquery)>0){
											echo	'<span class="galimage">GALLERY</span>';	
											}
									        if(!empty($row['video'])){
									        echo '<span class="galvideo">VIDEO</span>';
											}
						       						    echo '</h5>';
									        
									    echo '
									<div class="abouttype" id="abouttype"><p style="font-size: 14px;">'.$row["about"].'</p></div>
									<p class="expand text-right" style="display:none">Read More</p>';
									/*$images = mysqli_query($conn, "SELECT * FROM $tablegallery_name WHERE $id_column = '$row[$typeid]'");
									$count= mysqli_num_rows($images);
									if($count>0){
										echo '<br><h5 style="font-weight:bold">Gallery</h5>
											<div class="col">';
									while($row1= mysqli_fetch_array($images)){
										echo '<img src="directory/'. $type .'/'.$row1["image_name"].'" class="img-fluid">';
									}
									}*/
									echo '</div>';
									if (isset($row['services']) && !empty($row['services'])){
										$services = $row['services'];
										$servicesArray = explode(',', $services);
										$servicesHtml = '<ul>';
										foreach ($servicesArray as $service) {
											$servicesHtml .= '<li>' . trim($service) . '</li>';
										}
										$servicesHtml .= '</ul>';
										
										echo	'
												<div class="row fillbg mt-1 l-border-radius py-2 l-service">
													<p class="heading text-left mt-1 text-uppercase font-weight-bold" style="margin:0.5rem 0 1rem; font-size:12px">Services</p>
													' . $servicesHtml . '
												</div>
										';
									}
									if (isset($row['contact_person']) && !empty($row['contact_person'])){
										echo '<div class="row fillbg mt-1 l-border-radius py-2 l-contact">';
										$establishment = $row['establishment'];
										$contact_person = $row['contact_person'];
										$profile_pic = $row['profile_pic'];
										$cover_pic = $row['cover_pic'];
										$registraion_no = $row['registraion_no'];
										if (isset($row['qualification'])){
											$typequalification = $row['qualification'];
										}
										else {
											$typequalification = '';
										}
										echo '<div class="row">
											<div class="col-sm-2">
												<img class="profile-img" src="directory/'. $type .'/'.$profile_pic.'">
											</div>
											<div class="col-sm-5 d-flex align-items-center">
												<div>
													<p class="font-weight-bold small mb-0">'.$contact_person.'</p>
													<p class="small mb-0">'.$typequalification.'</p>
												</div>
											</div>
											<div class="col-sm-5 d-flex align-items-center justify-content-sm-end">
												<div>
													<p class="small mb-0"><span class="font-weight-bold">Since :</span> '.$establishment.'</p>
													<p class="small mb-0"><span class="font-weight-bold">Register No :</span> '.$registraion_no.' </p>
												</div>
											</div>
										</div>';
										if (isset($row['certificate']) && !empty($row['certificate'])){
											$certificate = $row['certificate'];
											$certificateArray = explode(',', $certificate);
											$certificateHtml = '<ul class="list-unstyled">';
											foreach ($certificateArray as $certificate) {
												$certificateHtml .= '<li><img class="certificate-img zoom" src="directory/'. $type .'/'. trim($certificate) .'"></li>';
											}
											$certificateHtml .= '</ul>';
											
											echo	'
													<div class="row my-3">
														' . $certificateHtml . '
													</div>
											';
										}
										echo '</div>';
									}
								}
						?>
						
					<?php 
						$reviewquery = mysqli_query($conn, "SELECT comment from mp_comments WHERE mp_id ='$row[$id_column]' AND userid='$userid'");
						$reviewrow = mysqli_fetch_assoc($reviewquery);
						if(mysqli_num_rows($reviewquery)>0){
						    if(strlen($reviewrow["comment"])<=0){
						
						?>
					<div id="commentspost" style="margin:0.5rem 0rem;">
						<div class="row p-2 fillbg l-border-radius" style="text-align:end; flex-flow: wrap">
							<p  class="heading text-left mt-1" style="margin:0.5rem 0 1rem;font-weight:bold; font-size:12px">REVIEW&nbsp;<span id="commentcount"><?php //echo $countrow;?></span></p>
							<div class="p-0 l-review-img">
								<?php
									if(!isset($_SESSION['name'])){
										echo '<img src="assets/images/MP-comment-icon.png" class="img-fluid" style="border-radius: 50%;  width:4rem; height: 4rem; border:1px solid #C7C7C7">';
									}
									else{
										$profileimg = mysqli_query($conn, "SELECT profile_image from users_reg WHERE email='$userid'");
										$profilename= mysqli_fetch_array($profileimg);
										echo '<img src="images/'.$profilename["profile_image"].'" onerror="this.src=\'assets/images/MP-comment-icon.png\'" class="img-fluid" style="border-radius: 50%; width: 4rem; height: 4rem; border:1px solid #C7C7C7">';
									}
									?>
							</div>
							<div class="l-review-form">
								<form method="POST" action="ajax/mp_review" id="reviewform">
									<input type="hidden" name="typeid" value="<?php echo $typeid;?>">
									<input type="hidden" name="email" value="<?php echo $userid;?>">
									<textarea name="reviewdata" style="width:100%; height:4rem; resize:none; border:1px solid #C7C7C7"></textarea>
									<br style="clear:both">
									<div class="rate">
										<input type="radio" id="star5" name="rate" value="5" />
										<label for="star5" title="5">5 stars</label>
										<input type="radio" id="star4" name="rate" value="4" />
										<label for="star4" title="4">4 stars</label>
										<input type="radio" id="star3" name="rate" value="3" />
										<label for="star3" title="3">3 stars</label>
										<input type="radio" id="star2" name="rate" value="2" />
										<label for="star2" title="2">2 stars</label>
										<input type="radio" id="star1" name="rate" value="1" />
										<label for="star1" title="1">1 star</label>	
									</div>
									<br style="clear:both">
									<p id="rating_error" style="color:red; text-align:left; margin-bottom:0px"></p>
									<input type="submit" id="submitreview" name="submitreview" value="POST REVIEW" style="color:white;background-color:#68cf68; font-size:.8rem;float:right; border:none; padding:0.3rem; border-radius:0.5rem; margin:0.5rem">
								</form>
							</div>
						</div>
					</div>
					<?php } } 
						else{
						?>
					<div id="commentspost" style="margin:0.5rem 0rem;">
						<div class="row p-2 fillbg l-border-radius" style="text-align:end; flex-flow: wrap">
							<p  class="heading text-left mt-1" style="margin:0.5rem 0 1rem;font-weight:bold; font-size:12px">REVIEW&nbsp;<span id="commentcount"><?php //echo $countrow;?></span></p>
							<div class="p-0 l-review-img">
								<?php
									if(!isset($_SESSION['name'])){
										echo '<img src="assets/images/MP-comment-icon.png" class="img-fluid" style="border-radius: 50%;  width:4rem; height: 4rem; border:1px solid #C7C7C7">';
									}
									else{
										$profileimg = mysqli_query($conn, "SELECT profile_image from users_reg WHERE email='$userid'");
										$profilename= mysqli_fetch_array($profileimg);
										echo '<img src="images/'.$profilename["profile_image"].'" onerror="this.src=\'assets/images/MP-comment-icon.png\'" class="img-fluid" style="border-radius: 50%; width: 4rem; height: 4rem; border:1px solid #C7C7C7">';
									}
									?>
							</div>
							<div class="l-review-form">
								<form method="POST" action="ajax/mp_review" id="reviewform">
									<input type="hidden" name="typeid" value="<?php echo $typeid;?>">
									<input type="hidden" name="email" value="<?php echo $userid;?>">
									<textarea name="reviewdata" style="width:100%; height:4rem; resize:none; border:1px solid #C7C7C7"></textarea>
									<br style="clear:both">
									<div class="rate">
										<input type="radio" id="star5" name="rate" value="5" />
										<label for="star5" title="5">5 stars</label>
										<input type="radio" id="star4" name="rate" value="4" />
										<label for="star4" title="4">4 stars</label>
										<input type="radio" id="star3" name="rate" value="3" />
										<label for="star3" title="3">3 stars</label>
										<input type="radio" id="star2" name="rate" value="2" />
										<label for="star2" title="2">2 stars</label>
										<input type="radio" id="star1" name="rate" value="1" />
										<label for="star1" title="1">1 star</label>	
									</div>
									<br style="clear:both">
									<p id="rating_error" style="color:red; text-align:left; margin-bottom:0px"></p>
									<input type="submit" id="submitreview" name="submitreview" value="POST REVIEW" style="color:white;background-color:#68cf68; font-size:.8rem;float:right; border:none; padding:0.3rem; border-radius:0.5rem; margin:0.5rem">
								</form>
							</div>
						</div>
					</div>
					<?php } ?>
					<div id="reviewlist" style="margin:0rem;">
						<?php 
							$fetch =mysqli_query($conn, "SELECT users_reg.email, users_reg.profile_image, users_reg.first_name, users_reg.last_name, mp_comments.comment, mp_comments.datetime, mp_comments.mp_id, mp_comments.id, mp_comments.rating FROM users_reg INNER JOIN mp_comments ON users_reg.email=mp_comments.userid WHERE mp_comments.mp_id='$typeid' AND mp_comments.comment != '' ORDER BY mp_comments.datetime DESC LIMIT 5");
							$i=0;
							$numrows=mysqli_num_rows($fetch);
							$count =$numrows;
							if($count>0){
								echo '<div class="row fillbg "><p class="heading mt-1" style="font-weight:bold; font-size:12px">'.$row['name'].' REVIEW</p></div>';
							
							while($reviewrow= mysqli_fetch_array($fetch)){
								echo '
									<div class="row fillbg mt-2 l-border-radius" style="padding: 10px; border-radius: 10px;">
										<div class="col-sm-1 p-0">
											<img src="images/'.$reviewrow["profile_image"].'" onerror="this.src=\'assets/images/MP-comment-icon.png\'" style="border-radius: 50%; width: 3rem; height: 3rem; border:1px solid #C7C7C7">
										</div>
										<div class="col-sm-11">
										<div class="d-flex" style="justify-content: space-between; margin-bottom:0.1rem; flex-flow: wrap"><p style="text-align:left; font-size:.8rem; font-weight:bold; margin-bottom:0.1rem">'.$reviewrow['first_name'].' '.$reviewrow['last_name'].' | '.time_elapsed_string($reviewrow["datetime"], $full=false).' | ';
										$rating= $reviewrow['rating'];
											for($j=0; $j<5; $j++){
												if($rating>=1){
												echo '<i class="bi bi-star-fill pl-1"></i>';
												}
												elseif($rating>0 and $rating<1){
												echo '<i class="bi bi-star-half pl-1"></i>';
												}
												else{
												echo '<i class="bi bi-star pl-1"></i>';
												}
												$rating=$rating-1;									
											}
										echo '</p>';
									if($userid==$reviewrow["email"]){
										echo '<div class="d-flex" style="font-size:0.8rem; margin-bottom:0.1rem"><input type="button" id="edit'.$i.'" class="edit" style="border:none; background:transparent;" value="Edit">
										<p style="margin-bottom:0.1rem">&nbsp;|&nbsp;</p><input type="button" id="delete'.$i.'" class="delete" style="border:none; background:transparent; float:right;" value="Delete"></div>';
									}
								echo '</div><form method="POST" action="ajax/mp_review" id="reviewform'.$i.'">
											<input type="hidden" name="mp_id" value="'.$reviewrow["mp_id"].'">
											<input type="hidden" name="email" value="'.$reviewrow["email"].'">
											<input type="hidden" name="id" id="id'.$i.'" value="'.$reviewrow["id"].'">
											<input type="hidden" name="editdelete" id="editdelete'.$i.'" value="">
											<p name="reviewdata" id="reviewdata'.$i.'" class="reviewdata" style="width:100%; text-align:justify; font-size:0.9rem; border:none;" disabled="true">'.$reviewrow["comment"].'</p>
											<div class="rate" id="rate'.$i.'" style="display:none">
												<input type="radio" id="'.$i.'star5" name="rate" value="5" />
												<label for="'.$i.'star5" title="5">5 stars</label>
												<input type="radio" id="star4'.$i.'" name="rate" value="4" />
												<label for="'.$i.'star4" title="4">4 stars</label>
												<input type="radio" id="'.$i.'star3" name="rate" value="3" />
												<label for="'.$i.'star3" title="3">3 stars</label>
												<input type="radio" id="'.$i.'star2" name="rate" value="2" />
												<label for="'.$i.'star2" title="2">2 stars</label>
												<input type="radio" id="'.$i.'star1" name="rate" value="1" />
												<label for="'.$i.'star1" title="1">1 star</label>	
											</div>
											<p id="rating_error" style="color:red; text-align:left; margin-bottom:0px"></p>
											<input type="hidden" id="submitreview'.$i.'" name="submitreview" value="" style="color:white;background-color:#68cf68; font-size:.8rem;float:right; border:none; padding:0.3rem; border-radius:0.5rem; margin:0.5rem">
										</form>
										</div>
										</div>';
								$i++;
							}
							
							if($numrows >=5){
								echo '<div id="load_data" style="margin:0"></div>
										<div id="remove_row" class="p-1 text-right">  
										<button type="button" name="btn_more" data-vid="'.$count.'" id="btn_more" style="background:transparent; border:none;">View more Reviews</button>  
										<button type="hidden" name="btn_more" data-vid="'.$i.'" id="ivalue" style="background:transparent; border:none"></button>  
									</div>';
								}
							
							//echo '</div>';
							}
							?>
						</div>
					</div>
				<div class="col-md-3">
					<div class="right-cont-part">
							<div class="card l-border-radius">
								<?php	if(strpos($row["map"], 'iframe')){
											echo '<div class="map card-img-top">'.$row["map"].'</div><br>';
										}
										else{
											echo '<div class="card-img-top"><iframe width="100%" height="200" src="https://maps.google.com/maps?q='.$row["map"].'&output=embed"></iframe></div>';
										}
										?>
								<div class="card-body">
									<?php 
										echo	(strlen($row["address"]) > 0)?'<p class="small"><i class="bi bi-geo-alt-fill mr-1"></i>&nbsp;'.$row["address"].'</p>':null;
										echo 	(strlen($row["mobile"]) > 0)?'<p class="small"><i class="bi bi-telephone-fill mr-1"></i>&nbsp;<a href="tel:/' . str_replace(' ', '', $row["mobile"]) . '" target="_blank" class="text-decoration-none text-dark">'. str_replace(' ', '', $row["mobile"]) . '</a></p>':null;
										echo 	(strlen($row["whatsapp"]) > 0)?'<p class="small"><i class="bi bi-whatsapp mr-1"></i>&nbsp;<a href="https://wa.me//' . str_replace(' ', '', $row["whatsapp"]) . '" target="_blank" class="text-decoration-none text-dark">'. str_replace(' ', '', $row["whatsapp"]) . '</a></p>':null;
										echo	(strlen($row["email"]) > 0)?'<p class="small"><i class="bi bi-envelope-fill mr-1"></i>&nbsp;<a href="mailto:'.$row["email"].'" target="_blank" class="text-decoration-none text-dark">'.$row["email"].'</a></p>':null;
										echo	(strlen($row["website"]) > 0)?'<p class="small"><i class="bi bi-globe mr-1"></i>&nbsp;<a href="'.$row["website"].'" target="_blank" class="text-decoration-none text-dark">'.$row["website"].'</a></p>':null;
										;
						
										?>
								</div>
							</div>
						<?php if (isset($row['is_main']) && (strlen($row["is_main"]) > 0)) {
							echo '<div class="card mt-1 l-border-radius">
								<div class="card-body">
									<label class="border-bottom pb-2 w-100 small text-uppercase font-weight-bold">Branches</label>';
									
                                    $query1=mysqli_query($conn, "SELECT * FROM $type WHERE main_id = (SELECT id FROM $type WHERE $id_column = '$typeid')");
                                    
										while($branches1=mysqli_fetch_array($query1)){
										echo '<form action="mpconnect/'.$type.'/'. urlencode(str_replace(' ', '_', $branches1["name"])) .'" method="post" style="display:inline;">
										<input type="hidden" name="'.$id_column.'" value="'.$branches1["$id_column"].'">
										<button type="submit" class="btn btn-link text-muted text-left text-decoration-none w-100 p-1" style="font-size:14px; height:28px">'.$branches1["name"].' <i class="bi bi-box-arrow-up-right ml-2"></i></button>
										</form>';
									}
									$query2=mysqli_query($conn, "SELECT * FROM $type WHERE main_id =(SELECT main_id FROM $type WHERE $id_column = '$typeid' AND main_id = !0) AND $id_column != '$typeid' UNION
										SELECT * FROM $type WHERE id =(SELECT main_id FROM $type WHERE $id_column = '$typeid')");
										while($branches2=mysqli_fetch_array($query2)){
										echo '<form action="mpconnect/'.$type.'/'. urlencode(str_replace(' ', '_', $branches2["name"])) .'" method="post" style="display:inline;">
										<input type="hidden" name="'.$id_column.'" value="'.$branches2["$id_column"].'">
										<button type="submit" class="btn btn-link text-muted text-left text-decoration-none w-100 p-1" style="font-size:14px; height:28px">'.$branches2["name"].'<i class="bi bi-box-arrow-up-right ml-2"></i></button>
										</form>';
									}
								echo '</div>
							</div>';
							}?>
							<div class="card mt-1 l-border-radius">
								<div class="card-body">
									<?php
										function displayHospitalTimings($typequery) {
											$daysOfWeek = [
												'monday' => 'Monday',
												'tuesday' => 'Tuesday',
												'wednesday' => 'Wednesday',
												'thursday' => 'Thursday',
												'friday' => 'Friday',
												'saturday' => 'Saturday',
												'sunday' => 'Sunday'
											];

											date_default_timezone_set('Asia/Colombo');
											$currentDay = strtolower(date('l')); 
											$currentTime = date('H:i:s');
                                            if(isset($typequery[$currentDay. '_open'])){
                                                $curDayOpen =$typequery[$currentDay. '_open'];
                                                $curDayClose =$typequery[$currentDay. '_close'];
                                                $isOpen = ($currentTime >= $curDayOpen && $currentTime <= $curDayClose) ? 
                                                '<span class="text-success">Now open</span>' : 
                                                '<span class="text-danger">Now closed</span>';
    
                                                $output = '<p class="small font-weight-bold">HOURS OF OPERATION</p>';
                                            
                                                $output .= '<div class="hospital-timings ml-4">';
                                                foreach ($daysOfWeek as $dayKey => $dayName) {
                                                    $openTimeKey = $dayKey . '_open';
                                                    $closeTimeKey = $dayKey . '_close';
    
                                                    $fmtOpenTime = date('H:i', strtotime($typequery[$openTimeKey]));
                                                    $fmtCloseTime = date('H:i', strtotime($typequery[$closeTimeKey]));
                                                    $isToday = (strtolower($dayName) == strtolower($currentDay)) ? 'text-success':'';
                                                    if ($typequery[$openTimeKey] === "00:00:00" && $typequery[$closeTimeKey] === "00:00:00") {
                                                        if(isset($typequery['doctor_id'])){
                                                            $output .= '<p class="mb-1 small font-weight-bold "><span class="text-uppercase">' . $dayName . ':</span> Not Available</p>';
                                                        }else {
                                                            $output .= '<p class="mb-1 small font-weight-bold "><span class="text-uppercase">' . $dayName . ':</span> Closed</p>';
                                                        }
                                                    } else {
                                                        $output .= '<p class="mb-1 small text-uppercase font-weight-bold '.$isToday.'">' . $dayName . ': ' . $fmtOpenTime . ' - ' . $fmtCloseTime. '</p>';
                                                    }
                                                }
                                                $output .= '</div>';                             
                                                return $output;
                                            } else {
                                                return null;
                                            }
										}
									
										echo displayHospitalTimings($row);?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include "footer.php";?>
<div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="text-center py-1 bg-dark">
				<p class="h5 text-white mb-0 text-capitalize"><?php echo $row['name'] . " Gallery"; ?></p>
			</div>
			<div class="modal-body p-0">
				<div id="galcarousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php
						$galquery = mysqli_query($conn, "SELECT * FROM $tablegallery_name WHERE $id_column= '$typeid'");
						$activeClass = 'active';
						$counter = 0;
						$imageCount = 0;
						while ($galrow = mysqli_fetch_array($galquery)) {
							echo '<li data-target="#galcarousel" data-slide-to="'.$counter.'" class="'.$activeClass.'"></li>';
							$activeClass = '';
							$counter++;
							$imageCount++;
						}
						?>
					</ol>
					<div class="carousel-inner">
						<?php
						$galquery = mysqli_query($conn, "SELECT * FROM $tablegallery_name WHERE $id_column= '$typeid'");
						$activeClass = 'active';
						while ($galrow = mysqli_fetch_array($galquery)) {
							echo '
								<div class="carousel-item '.$activeClass.'">
									<img class="d-block" src="directory/'. $type .'/'.$galrow["image_name"].'" alt="Image">
								</div>
							';
							$activeClass = '';
						}
						?>
					</div>
					<?php if ($imageCount > 1): ?>
					<a class="carousel-control-prev" href="#galcarousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#galcarousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="text-center py-1 bg-dark">
				<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-sm btn-light" data-mdb-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="text-center py-1 bg-dark">
				<p class="h5 text-white mb-0"><?php echo $row['name'] . " Video"; ?></p>
			</div>
			<div class="ratio ratio-16x9">
				<div class="modal-body p-0">
					<?php
						if (strpos($videourl, 'iframe') !== false) {
							echo $videourl;
						} 
						else{
							echo '<video controls>
									  <source src="directory/'. $type .'/video/'.$videourl.'" type="video/mp4">
									  Your browser does not support the video tag.
								   </video>';
						}
						?>
				</div>
			</div>

			<div class="text-center py-1 bg-dark">
				<button  type="button" data-dismiss="modal" aria-label="Close" class="btn btn-sm btn-light" data-mdb-dismiss="modal">
				Close
				</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).on('click', '.galimage', function(){
		$('#gallery').modal('show');
		$("[data-u=image]").css({'height': '380px','top': '0px','left': '0px','display': 'block','position': 'absolute','max-width': '10000px','z-index': '1', 'width':'auto'});	
	});
	$(document).on('click', '.galvideo', function(){
		$('#video').modal('show');
		//var width = $("#video").outerWidth();
		//var height = $("#video").outerHeight();
		//$('iframe, video').removeAttr('width height');
		$('iframe, video').css({'max-width':'100%', 'height':'auto', 'min-height':'300px'});
		
	});
	 function removeReg(data, status) {
	  Swal.fire({
	      text: data,
	      icon: status,
	    })
	    .then(function(value) {
			if(status == 'success'){
			window.location.reload();
			}
			if(data == 'Please login to Review the <?php echo $row['name']; ?>'){
				$('#exampleModal').modal('show');
			}
	      //console.log('returned value:', value);
	    });
	}
	$(document).ready(function () { 
		var typeName = "<?php echo $type_name; ?>";
		$("#submitreview").click(function () { 
				var form = $("#reviewform");
						form.validate({
							errorElement: 'span',
							errorClass: 'help-block',
							highlight: function(element, errorClass, validClass) {
								$(element).closest('.form-group').addClass("has-error");
							},
							unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.form-group').removeClass("has-error");
							},
							ignore: "",
							rules: {
								reviewdata: {
									required: true,
								},
								rate: {
									required: true,
								},
								
							},
							messages: {
								reviewdata: {
									required: "Review text cannot be empty",
								},
								rate:{
									required: "Give Rating to the " + typeName,
								},
								
							},
							errorPlacement: function (error, element) {
								if (element.attr("name") == "rate") {
									var errortext=$("#reviewform").validate().submitted.rate;
									$("#rating_error").text(errortext);
								} else {
									error.insertAfter($(element));
								}
							},
							submitHandler: function(form) {
								$.ajax({
									type:form.method,
									url: form.action,
									mimeType: "multipart/form-data",
									data:$(form).serialize(),
									
									success:function(data){
										//debugger
										console.log(data);
										if(data=='Posted Successfully'){
										removeReg(data, 'success');
										}
										else{
											removeReg(data, 'error');
										}
									},
									error: function(data){
										//console.log("error");
										console.log(data);
										removeReg(data, 'error');
									}
								});
							}
								});
						});
			$(document).on('click', '.delete', function () { 
				var attrid=$(this).attr('id');
				var attrid1 = attrid.charAt(attrid.length - 1);
				var id= $("#id"+attrid1).attr('value');
			Swal.fire({
			title: 'Are you sure?',
			text: "You want to Delete review",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type:'post',
					url: 'ajax/mp_review',
					mimeType: "multipart/form-data",
					data:{id : id, deleteid:"delete"},
					
					success:function(data){
						//debugger
						console.log(data);
						if(data=='Deleted Successfully'){
						Swal.fire(
						'Deleted!',
						'Your Review has been deleted.',
						'success'
						).then((result) => {
					/* Read more about isConfirmed, isDenied below */
					if (result.isConfirmed) {
						window.location.reload();
					}
					else{
						window.location.reload();
					}
						});
						
						}
						else{
							removeReg(data, 'error');
						}
					},
					error: function(data){
						//console.log("error");
						console.log(data);
						removeReg(data, 'error');
					}
				});
			}
			});
		
		});
		$(document).on('click', '.edit', function () { 	var id=$(this).attr('id');
		var id1 = id.charAt(id.length - 1);
		var textdata= $('#reviewdata'+id1).text();
		$('#reviewdata'+id1).replaceWith('<textarea  name="reviewdata" id="reviewdata'+id1+'" style="width:100%; text-align:left; font-size:0.9rem; height:4rem; resize:none; border:none; overflow:hidden;text-overflow: ellipsis;">'+textdata+'</textarea>');
		$('#reviewdata'+id1).attr("style","width:100%; height:8rem; border:1px solid #C7C7C7");
		$('#submitreview'+id1).attr("type","submit");
		$('#submitreview'+id1).attr("value","Update");
		$('#editdelete'+id1).attr("value","edit");
		$('#rate'+id1).css({'display':'block'});
		$("#submitreview"+id1).click(function () { 
			var form = $("#reviewform"+id1);
	                form.validate({
	                    errorElement: 'span',
	                    errorClass: 'help-block',
	                    highlight: function(element, errorClass, validClass) {
	                        $(element).closest('.form-group').addClass("has-error");
	                    },
	                    unhighlight: function(element, errorClass, validClass) {
	                        $(element).closest('.form-group').removeClass("has-error");
	                    },
	                    rules: {
	                        reviewdata: {
	                            required: true,
	                        },
							rate: {
								required: true,
							},
							
						},
	                    messages: {
	                        reviewdata: {
	                            required: "Review text cannot be empty",
	                        },
							rate:{
								required: "Give Rating to the " + typeName,
							},
							
						},
						errorPlacement: function (error, element) {
	                        if (element.attr("name") == "rate") {
								var errortext=$("#reviewform").validate().submitted.rate;
	                             $("#rating_error").text(errortext);
	                        } else {
	                            error.insertAfter($(element));
	                        }
	                    },
						submitHandler: function(form) {
							$.ajax({
								type:form.method,
								url: form.action,
								mimeType: "multipart/form-data",
								data:$(form).serialize(),
								
								success:function(data){
									//debugger
									console.log(data);
									if(data=='Updated Successfully'){
									removeReg(data, 'success');
									}
									else{
										removeReg(data, 'error');
									}
								},
								error: function(data){
									//console.log("error");
									console.log(data);
									removeReg(data, 'error');
								}
							});
						}
					});
		});
	});
	
	$(document).on('click', '#btn_more', function(){  
		   var count = $(this).data("vid");  
		   var i = $(this).next().data("vid");  
		   $('#btn_more').html("Loading...");  
		   $.ajax({  
				url:"ajax/reviewlist",  
				method:"POST",  
				data:{count:count, type:"morereviews", i:i, reviewid:"<?php echo $typeid; ?>"},  
				dataType:"text",  
				success:function(data)  
				{  
					
					 if(data != '')  
					 {  
						  $('#remove_row').remove(); 
						  $('#load_data').append(data);  
					 }  
					 else  
					 {  
						  $('#btn_more').attr("class", "btn btn-secondary form-control");
						  $('#btn_more').attr("disabled", "true");
						  $('#btn_more').html("No More Data");  
					 }  
				}  
		   });  
	  }); 
	});
	  function readMore() {
	    var maxLength = 200;
	    $(".reviewdata").each(function() {
	      var myStr = $(this).text();
	      if ($.trim(myStr).length > maxLength) {
	        var newStr = myStr.substring(0, maxLength);
	        var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
	        $(this).empty().html(newStr);
	        $(this).append('<a href="javascript:void(0);" class="read-more" style="text-decoration:none; color:#5f46c6; float:right; margin-bottom:0.5rem">Read more</a>');
	        $(this).append('<span class="more-text" style="display:none">' + removedStr + ' <a href="javascript:void(0);" class="read-less" style="text-decoration:none; margin-bottom:0.5rem; float:right; color:#5f46c6;">Read less</a>' + '</span>');
	      }
	    });
	  }
	  readMore();
	  $(document).on("click", ".read-more", function() {
	    $(this).siblings(".more-text").contents().unwrap();
	    $(this).remove();
	  });
	
	  $(document).on("click", ".read-less", function() {
		$(this).remove();
	    readMore();
	  });
	  $(document).on('click', '.expand', function(){
		if($('#abouttype').hasClass('abouttype')){
			$('#abouttype').removeClass('abouttype');
			$('#abouttype').css({'height':'auto', 'overflow':'none'});
			$('.expand').text('Read Less');
		}
		else{
			$('#abouttype').addClass('abouttype');
			$('.expand').text('Read More');
		}
	  });
	  if ($('#abouttype')[0].scrollHeight >  $('#abouttype').innerHeight()) {
	    $('.expand').css({'display':'block'});
	}
	
	$(document).ready(function () { 
	$.validator.addMethod("myusername", function(value,element) {
	    return this.optional(element) ||
	           /^[0-9]{10}$/.test(value) ||  
	           /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(value);
	}, "Username format incorrect.");
	$("#submit").click(function () { 
			var form = $("#msform");
	                form.validate({
	                    errorElement: 'span',
	                    errorClass: 'help-block',
	                    highlight: function(element, errorClass, validClass) {
	                        $(element).closest('.form-group').addClass("has-error");
	                    },
	                    unhighlight: function(element, errorClass, validClass) {
	                        $(element).closest('.form-group').removeClass("has-error");
	                    },
	                    rules: {
	                        email: {
	                            required: true,
								myusername: true,
	                        },
							password: {
								required:true,
							}
						},
	                    messages: {
	                        email: {
	                            required: "Email/Mobile is required",
								myusername: "Enter valid Email/Mobile number",
	                        },
							password: {
								required:"Please Enter Password",
							}
						},
						submitHandler: function(form) {
							$.ajax({
								type:form.method,
								url: form.action,
								mimeType: "multipart/form-data",
								data:$(form).serialize(),
								
								success:function(data){
									//debugger
									console.log(data);
									if(data=='Login Success'){
									removeReg1(data, 'success');
									}
									else{
										removeReg1(data, 'error');
									}
								},
								error: function(data){
									//console.log("error");
									console.log(data);
									removeReg1(data, 'error');
								}
							});
						}
							});
					});
	});
	
	 function removeReg1(data, status) {
	  Swal.fire({
	      text: data,
	      icon: status,
	    })
	    .then(function(value) {
			if(status == 'success'){
			window.location.reload();
			}
	      //console.log('returned value:', value);
	    });
	}
	var height=$("#h2").height()+20;
			 $(".left-menu-part, .right-cont-part").css({'position':'sticky','top':height});
			 $(window).on('resize', function(){
			 var height=$("#h2").height()+20;
			 $(".left-menu-part, .right-cont-part").css({'top':height, 'position':'sticky'});
			 });
</script>
<script>
	var follow="";
	async function update_follow(email, $id_column, value){
	   let result = await $.ajax({
	        url: "ajax/followupdate",
	        data: {email : email, type_id:$id_column, follow:'follow', value:value},
			type: "POST",
	        success: function(data) {
				//debugger;
				var json=JSON.parse(data);
	            if(json.text=='success'){
					follow=data;
				}
				else{
					follow =data;
				}
				
				//console.log(data);
	        },
			error: function(data) {
				console.log(data);
			}
			
	    });return follow;
	}
	$(document).on('click', '.followbtn', function(){
		var sessionuser = "<?php if(isset($_SESSION['name'])){echo $_SESSION['userid'];}else{echo '';}?>";
	if(sessionuser != ""){
		var classname = $(this).attr('class');
		var value = (classname.includes("btn-success"))?1:0;
		var type_id=$(this).attr('value');
		var element = $(this);
		//update_like(sessionuser, articleid, 1).then(console.log); 
		async function main() {
		  var status = await update_follow(sessionuser, type_id, value)
			status = JSON.parse(status);
			if(status.status=='success'){
			var a = new Audio('audio/mixkit-hard-click-1118.wav');
			a.play();
			 $(element).animate({zoom: '102%', opacity:.5}, "medium", function(){
				 //$(this).toggleClass('bi-heart-fill bi-heart');
			 });
			 $(element).animate({zoom: '102%', opacity:1}, "medium");
		  $(element).toggleClass('btn-success btn-secondary');
		  //var dat= $(element).next().find('span').text();
		  var dat= $(element).text(status.text);
		  if(status.followcount>0){
		    $(element).next().text(status.followcount+" Followers");
		  }
		  else{
		      $(element).next().text("");
		  }
			}
			else{
				console.log(status);
			}
		}
		main().then(response => {
	    console.log(response);
	}).catch(e => {
	    console.log(e);
	});
		
	  }
	  else{
		  $('#exampleModal').modal('show');
	  }
	});
</script>