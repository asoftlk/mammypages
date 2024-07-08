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
		top: -40%;
		}
	}
</style>
<script type="text/javascript" src="assets/js/jssor.slider.min.js"></script>
<script type="text/javascript">
	$(document).ready(function ($) {
	
	    var jssor_1_SlideshowTransitions = [
	      {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
	      {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
	    ];
	
	    var jssor_1_options = {
	      $AutoPlay: 1,
	      $SlideshowOptions: {
	        $Class: $JssorSlideshowRunner$,
	        $Transitions: jssor_1_SlideshowTransitions,
	        $TransitionsOrder: 1
	      },
	      $ArrowNavigatorOptions: {
	        $Class: $JssorArrowNavigator$
	      },
	      $ThumbnailNavigatorOptions: {
	        $Class: $JssorThumbnailNavigator$,
	        $SpacingX: 5,
	        $SpacingY: 5
	      }
	    };
	
	    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
	
	    /*#region responsive code begin*/
	
	    var MAX_WIDTH = 980;
	
	    function ScaleSlider() {
	        var containerElement = jssor_1_slider.$Elmt.parentNode;
	        var containerWidth = containerElement.clientWidth;
	
	        if (containerWidth) {
	
	            var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
	
	            jssor_1_slider.$ScaleWidth(expectedWidth);
	        }
	        else {
	            window.setTimeout(ScaleSlider, 30);
	        }
	    }
	
	    ScaleSlider();
	
	    $(window).bind("load", ScaleSlider);
	    $(window).bind("resize", ScaleSlider);
	    $(window).bind("orientationchange", ScaleSlider);
	    /*#endregion responsive code end*/
	});
</script>
<style>
	/* jssor slider loading skin spin css */
	.jssorl-009-spin img {
	animation-name: jssorl-009-spin;
	animation-duration: 1.6s;
	animation-iteration-count: infinite;
	animation-timing-function: linear;
	}
	@keyframes jssorl-009-spin {
	from {
	transform: rotate(0deg);
	}
	to {
	transform: rotate(360deg);
	}
	}
	.jssora106 {display:block;position:absolute;cursor:pointer;}
	.jssora106 .c {fill:#fff;opacity:.3;}
	.jssora106 .a {fill:none;stroke:#000;stroke-width:350;stroke-miterlimit:10;}
	.jssora106:hover .c {opacity:.5;}
	.jssora106:hover .a {opacity:.8;}
	.jssora106.jssora106dn .c {opacity:.2;}
	.jssora106.jssora106dn .a {opacity:1;}
	.jssora106.jssora106ds {opacity:.3;pointer-events:none;}
	.jssort101 .p {position: absolute;top:0;left:0;box-sizing:border-box;background:#000;}
	.jssort101 .p .cv {position:relative;top:0;left:0;width:100%;height:100%;border:2px solid #000;box-sizing:border-box;z-index:1;}
	.jssort101 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;visibility:hidden;}
	.jssort101 .p:hover .cv, .jssort101 .p.pdn .cv {border:none;border-color:transparent;}
	.jssort101 .p:hover{padding:2px;}
	.jssort101 .p:hover .cv {background-color:rgba(0,0,0,6);opacity:.35;}
	.jssort101 .p:hover.pdn{padding:0;}
	.jssort101 .p:hover.pdn .cv {border:2px solid #fff;background:none;opacity:.35;}
	.jssort101 .pav .cv {border-color:#fff;opacity:.35;}
	.jssort101 .pav .a, .jssort101 .p:hover .a {visibility:visible;}
	.jssort101 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.6;}
	.jssort101 .pav .t, .jssort101 .p:hover .t{opacity:1;}
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

						if (!empty($type) && !empty($name)) {
							$tablegallery_name = "mp" . $type . "_gallery";
							$id_column = $type . '_id';
                            $query = "SELECT * FROM `$type` AS h INNER JOIN `" . $type . "_working_times` AS hwt ON hwt.`" . $type . "_id` = h.`" . $type . "_id` WHERE h.`" . $type . "_id` = '$id'";

							$typequery = mysqli_query($conn, $query);
						}		
            				
						$row= mysqli_fetch_array($typequery);
						$typeid = $row["$id_column"];

						$type_name = $row['name'];
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
						if (isset($row['main_id']) && !empty($row['main_id'])) {
							$mainid = $row['main_id'];
			
							$name_query = "SELECT * FROM `$type` WHERE `id` = '$mainid'";
							$namequery = mysqli_query($conn, $name_query);
							
							if ($namequery) {
								$row1 = mysqli_fetch_array($namequery);
							}			
						}
						if(($type == $type) && (mysqli_num_rows($typequery)>0)){
							$url=urlencode('https://www.mammypages.com/mpstudio_details?type=studio&id='.$row["$id_column"]);
							$urltelegram=urlencode('https://www.mammypages.com/mpstudio_details?type=studio&id='.$row["$id_column"].'&text='.$row["name"]);
						echo '<div class="row fillbg l-border-radius-top">
								<div class="text-center p-0">
								<img src="directory/'. $type .'/'.$row["image"].'" class="img-fluid mb-2" style="width:100%; max-height:250px; border-radius: 15px;">
								<a href="'. $type .'"><i class="bi bi-caret-left backbutton" data-toggle="tooltip" title="Back" data-placement="left" area-hidden="true"></i></a>
								</div>
							 </div>
								<div class="row fillbg l-border-radius-bottom l-title-card">
								    <div class="col-4 col-md-3"><img src="directory/'. $type .'/'.$row["logo"].'" class="img-fluid l-main-logo"></div>
								    <div class="col-5 col-md-6">';
								         if (!empty($row1['name']) && $row1['name'] != 0) {
											echo '<p class="typename mb-0">' . $row1['name'] . ' - ' . $row['name'] . '</p>';
										} else {
											echo '<p class="typename mb-0">' . $row['name'] . '</p>';
										}
										
										 if(!empty($speciality)){
											echo '<p class="mb-0">'.$speciality.'</p>';
										} else {
											echo '<p class="mb-0" style="height:24px;"></p>';
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
										
								    echo '<div class="col-3 col-md-3 position-relative">
								        <p class="mptype position-absolute" style="right:10px"><span>'.$row['type'].'</span></p><br>
								        <div class="d-flex float-right">';
										echo !empty($row['facebook']) ?  '<a href="'.$row["facebook"].'" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-facebook p-1"></i></a>&nbsp;':"";
										echo !empty($row['instagram']) ?  '<a href="'.$row["instagram"].'" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-instagram p-1"></i></a>&nbsp;':"";
										echo !empty($row['linkedin']) ?  '<a href="'.$row["linkedin"].'" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-linkedin p-1"></i></a>&nbsp;':"";
										echo '<div class="dropup d-flex header-settings"> 
										<a href="#" class="nav-link p-1" data-toggle="dropdown" style="display:flex; text-decoration:none; color:black"><i class="bi bi-share"  style=""></i></a> 
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="" > 
											<div class="d-flex" >
												<a class="dropdown-item d-flex"  href=""><img src="assets/images/MP-Favi.png" style="width:32px; height:30px;"></a>
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
												echo '<button class="btn btn-success followbtn" value="'.$row["$id_column"].'" style="font-size: 13px; padding: 0 5px;">Follow</button>';
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
									<div class="abouttype" id="abouttype">'.$row["about"].'</div>
									<p class="expand text-right" style="display:none">Read More</p>';
									/*$images = mysqli_query($conn, "SELECT * FROM $tablegallery_name WHERE $id_column = '$row[$typeid]'");
									$count= mysqli_num_rows($images);
									if($count>0){
										echo '<br><h5 style="font-weight:bold">Gallery</h5>
											<div class="col">';
									while($row1= mysqli_fetch_array($images)){
										echo '<img src="directory/'. $type .'/'.$row1["image_name"].'" class="img-fluid">';
									}
						 			echo '</div>';
									}*/
							echo	'</div>
								';
							
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
							<div class="p-0" style="width:12%">
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
							<div class="" style="width:88%">
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
							<div class="p-0" style="width:12%">
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
							<div class="" style="width:88%">
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
						<div class="fillbg px-2 l-border-radius">
							<?php	if(strpos($row["map"], 'iframe')){
								echo '<div class="map">'.$row["map"].'</div><br>';
								}
								else{
								echo '<iframe width="100%" height="200" src="https://maps.google.com/maps?q='.$row["map"].'&output=embed"></iframe><br>';
								}

                                function displayTypeTimings($typequery) {
                                    $daysOfWeek = [
                                        'monday' => 'Monday',
                                        'tuesday' => 'Tuesday',
                                        'wednesday' => 'Wednesday',
                                        'thursday' => 'Thursday',
                                        'friday' => 'Friday',
                                        'saturday' => 'Saturday',
                                        'sunday' => 'Sunday'
                                    ];
                                
                                    $output = '<div class="type-timings">';
                                    foreach ($daysOfWeek as $dayKey => $dayName) {
                                        $openTimeKey = $dayKey . '_open';
                                        $closeTimeKey = $dayKey . '_close';
                                
                                        if ($typequery[$openTimeKey] === "00:00:00" && $typequery[$closeTimeKey] === "00:00:00") {
                                            $output .= '<p>' . $dayName . ': Closed</p>';
                                        } else {
                                            $output .= '<p>' . $dayName . ': ' . $typequery[$openTimeKey] . ' - ' . $typequery[$closeTimeKey] . '</p>';
                                        }
                                    }
                                    $output .= '</div>';
                                
                                    return $output;
                                }
                                echo displayTypeTimings($row);

                                
								echo	($row["address"]!==null)?'<p class="mt-4"><i class="bi bi-geo-alt-fill"></i>&nbsp;'.$row["address"].'</p>':null;
								echo 	($row["mobile"]!==null)?'<p><i class="bi bi-telephone-fill"></i>&nbsp;<a href="tel:'.$row["mobile"].'" target="_blank" class="text-decoration-none text-dark">'.$row["mobile"].'</a></p>':null;
								echo	($row["email"]!==null)?'<p><i class="bi bi-envelope-fill"></i>&nbsp;<a href="mailto:'.$row["email"].'" target="_blank" class="text-decoration-none text-dark">'.$row["email"].'</a></p>':null;
								echo	($row["website"]!==null)?'<p><i class="bi bi-globe"></i>&nbsp;<a href="'.$row["website"].'" target="_blank" class="text-decoration-none text-dark">'.$row["website"].'</a></p>':null;
								echo 	'<label class="border-bottom pb-2 w-100">Branches</label>
								';

								echo	($row["address"]!==null)?'<p class="mt-4"><i class="bi bi-geo-alt-fill"></i>&nbsp;'.$row["address"].'</p>':null;
								echo 	($row["mobile"]!==null)?'<p><i class="bi bi-telephone-fill"></i>&nbsp;<a href="tel:'.$row["mobile"].'" target="_blank" class="text-decoration-none text-dark">'.$row["mobile"].'</a></p>':null;
								echo	($row["email"]!==null)?'<p><i class="bi bi-envelope-fill"></i>&nbsp;<a href="mailto:'.$row["email"].'" target="_blank" class="text-decoration-none text-dark">'.$row["email"].'</a></p>':null;
								echo	($row["website"]!==null)?'<p><i class="bi bi-globe"></i>&nbsp;<a href="'.$row["website"].'" target="_blank" class="text-decoration-none text-dark">'.$row["website"].'</a></p>':null;
								echo 	'<label class="border-bottom pb-2 w-100">Branches</label>
								<div>
								';
								
								
								?>
                                <?php
                                $query1 = mysqli_query($conn, "SELECT * FROM $type WHERE main_id = (SELECT id FROM $type WHERE $id_column = '$typeid')");
                                while ($branches1 = mysqli_fetch_array($query1)) {
                                    echo '<form action="mpconnect/'.$type.'/'.urlencode(str_replace(' ', '_', $branches1["name"])).'" method="post" style="display:inline;">
                                            <input type="hidden" name="'.$id_column.'" value="'.$branches1["$id_column"].'">
                                            <button type="submit" class="btn btn-link text-muted text-left text-decoration-none w-100 p-1" style="font-size:14px; height:28px">View '.$branches1["name"].' <i class="bi bi-box-arrow-up-right"></i></button>
                                        </form>';
                                }

                                $query2 = mysqli_query($conn, "SELECT * FROM $type WHERE main_id IN (SELECT main_id FROM $type WHERE $id_column = '$typeid') AND $id_column != '$typeid' 
                                                                UNION 
                                                                SELECT * FROM $type WHERE id = (SELECT main_id FROM $type WHERE $id_column = '$typeid')");
                                while ($branches2 = mysqli_fetch_array($query2)) {
                                    echo '<form action="mpconnect/'.$type.'/'.urlencode(str_replace(' ', '_', $branches2["name"])).'" method="post" style="display:inline;">
                                            <input type="hidden" name="'.$id_column.'" value="'.$branches2["$id_column"].'">
                                            <button type="submit" class="btn btn-link text-muted text-left text-decoration-none w-100 p-1" style="font-size:14px; height:28px">View '.$branches2["name"].' <i class="bi bi-box-arrow-up-right"></i></button>
                                        </form>';
                                }
								echo '</div>'
                                ?>
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
			<div class="modal-header" style="padding:0.2rem 1rem">
				<h5 class="modal-title" id="galleryModalLabel"><?php echo $row['name'] . " Gallery"; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mb-1 p-0">
				<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
					<!-- Loading Screen -->
					<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
						<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="admin/posts/spin.svg" />
					</div>
					<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden; text-align:center">
						<?php
							$galquery = mysqli_query($conn, "SELECT * FROM $tablegallery_name WHERE $id_column= '$typeid'");
							if (mysqli_num_rows($galquery) > 0) {
								while ($galrow = mysqli_fetch_array($galquery)) {
									echo '
										<div>
											<img data-u="image" src="directory/'.$galrow.'/' . $galrow["image_name"] . '">
											<img data-u="thumb" src="directory/'.$galrow.'/' . $galrow["image_name"] . '" height="90">
										</div>
									';
								}
							} else {
								echo '<div>No images found for this doctor.</div>';
							}
							?>     
					</div>
					<!-- Thumbnail Navigator -->
					<div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
						<div data-u="slides">
							<div data-u="prototype" class="p" style="width:190px;height:84px;">
								<div data-u="thumbnailtemplate" class="t"></div>
								<svg viewBox="0 0 16000 16000" class="cv">
									<circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
									<line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
									<line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
								</svg>
							</div>
						</div>
					</div>
					<!-- Arrow Navigator -->
					<div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
						<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
							<circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
							<polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
							<line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
						</svg>
					</div>
					<div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
						<svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
							<circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
							<polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
							<line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
						</svg>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
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