<?php include "mp.php"; 
?>
<style>
    .hosname{
        font-size:16px;
        font-weight:700;
    }
    .hospitaltype{
        border-left: 4px solid #68CF68;
        margin-bottom: 0;
		color:#666666;
    }
    .hospitaltype span{
        //background-color: #000;
        //color: #fff;
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
        width: 50px;
        content: '';
        border-top: 4px solid #0AD69E;
        border-radius: 1em;
    }
    .rating, .galimage, .galvideo{
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
        *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
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

/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
    .checked {
  color: orange;
}
    </style>
<div class="content">
<section class="main-content-sec">
   <div class="container-fluid p-0">
<div class="row m-0 desktopviewArticle">
   <div class="col-md-3">
      <div class="left-menu-part">
         <h3>MP Directory</h3>
         <ul style="list-style-type:none; padding-left:0">
            <li><a role="button" href="hospitals"><i class="icofont-hospital"></i> HOSPITALS</a></li>
            <li><a role="button" href="doctors"><i class="icofont-doctor"></i> DOCTORS</a></li>
            <li><a role="button" href="midwifes"><i class="icofont-nurse"></i> MIDWIFE CLINICS</a></li>
            <li><a role="button" href="medical"><i class="icofont-nurse-alt"></i> MEDICAL CLINICS</a></li>
            <li><a role="button" href="pharmacies"><i class="icofont-medical-sign"></i> PHARMACIES</a></li>
            <li><a role="button" href="beauty"><i class="icofont-girl-alt"></i> BEAUTY SALON</a></li>
         </ul>
         <div class="client-sec"><a class="client-btn">Sponsors</a></div>
      </div>
   </div>
   <div class="col-md-6">
			<?php $type = $_GET['type'];
			$doctorid = $_GET['id'];
					$doctor =mysqli_query($conn, "SELECT * FROM doctor WHERE doctor_id= '$doctorid'");
					$row= mysqli_fetch_array($doctor);
					$specialityarray = explode(" ///", $row['speciality']);
					$speciality = "";
                   
					for($i=0; $i< count($specialityarray); $i++){
						if($i == count($specialityarray)-1){
							
							
                            $speciality .= $specialityarray[$i];
						}
						else{
							$speciality .= $specialityarray[$i].", ";
						}
					}
					if(($type == 'doctor') && (mysqli_num_rows($doctor)>0)){
					echo '<div class="row fillbg">
							<div class="text-center">
							<img src="directory/doctor/'.$row["image"].'" class="img-fluid mb-2" style="width:100%; max-height:250px">
							</div>
						 </div>
							<div class="row fillbg">
							    <div class="col-md-3"><img src="directory/doctor/'.$row["logo"].'" class="img-fluid" style="max-height:60px"></div>
							    <div class="col-md-4 p-0">
							        <p class="hosname mb-0">'.$row['name'].'</p>
							        <p class="">'.$speciality.'</p>
							    </div>
							    <div class="col-md-2 pl-0 text-center">
							        <button class="btn btn-success" style="font-size: 13px; padding: 0 5px;">Follow</button>
							        <p class="mt-1" style="font-size:13px; font-weight:bold">100K Followers</p>
							    </div>
							    <div class="col-md-3 position-relative">
							        <p class="hospitaltype position-absolute" style="right:10px"><span>'.$row['type'].'</span></p><br>
							        <div class="text-right">';
									echo !empty($row['facebook']) ?  '<a href="'.$row["facebook"].'" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-facebook p-1"></i></a>&nbsp;':"";
									echo !empty($row['instagram']) ?  '<a href="'.$row["instagram"].'" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-instagram p-1"></i></a>&nbsp;':"";
									echo !empty($row['linkedin']) ?  '<a href="'.$row["linkedin"].'" target="_blank" class="text-decoration-none text-dark"><i class="bi bi-linkedin p-1"></i></a>&nbsp;':"";
    								echo '<i class="bi bi-share p-1"></i>&nbsp;
							    </div>
							</div>
							</div>';
								echo '<div class="row fillbg">
								        <h5 class="heading" style="font-weight:bold; font-size:16px">ABOUT doctor';
								        
								        
								        $rating =0;
								        if(isset($rating)){ 
            							$rating= 0;
            							echo '<span class="rating">';
            							for($i=0; $i<5; $i++){
            								if($rating>=1){
            								echo '<i class="bi bi-star-fill"></i>&nbsp;';
            								}
            								elseif($rating>0 and $rating<1){
            								echo '<i class="bi bi-star-half"></i>&nbsp;';
            								}
            								else{
            								echo '<i class="bi bi-star"></i>&nbsp;';
            								}
            								$rating=$rating-1;									
            							}
            							echo '</span>';
            						    }
            						    echo '</h5>';
								        
								    echo '
								<p>'.$row["about"].'</p>';
								    
								/*$images = mysqli_query($conn, "SELECT * FROM mpgallery WHERE doctorid = '$row[doctorid]'");
								$count= mysqli_num_rows($images);
								if($count>0){
									echo '<br><h5 style="font-weight:bold">Gallery</h5>
										<div class="col">';
								while($row1= mysqli_fetch_array($images)){
									echo '<img src="directory/hospitals/'.$row1["image_name"].'" class="img-fluid">';
								}
					 			echo '</div>';
								}*/
                                ?>
                                <?php
						echo	'</div>';
                        $userid = isset($_SESSION['userid'])?$_SESSION['userid']:"";
                        ?>
                        <br>
                        <div class="row fillbg">
    <p>Your Review</p>
				
<form method="POST" action="ajax/mp_comments" id="commentform">
<input type="hidden" name="mp_id" value="<?php echo $doctorid;?>">
<input type="hidden" name="email" value="<?php echo $userid;?>">
<textarea name="commentdata" style="width:100%; height:4rem; resize:none; border:1px solid #C7C7C7;padding:5px"></textarea>
<div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
    
</div>
<input type="submit" id="submitcomment" name="submitcomment" value="POST REVIEW" style="color:white;background-color:#68cf68; font-size:.8rem;float:right; border:none; padding:0.3rem; border-radius:0.5rem; margin:0.5rem">

</form>

                            </div>

                        <br>
                        <div class="row fillbg">
                            <p>
                                Patient Review
                            </p>
                            <div class="row">
                                <?php
                           $sql = "SELECT * FROM mp_comments WHERE mp_id='$doctorid' ";
                           $result1 = mysqli_query($conn, $sql);
                           if (mysqli_num_rows($result1) > 0) {
                           while($row1 = mysqli_fetch_assoc($result1)) {  
?>                     <div class="col-sm-2 text-center">
                                  <img src="av.png" class="img-circle" height="65" width="65">
                                  
                    </div>
        <div class="col-sm-10">
          <p> <small>user </small></h6>
          <?php 
          $r=$row1["rating"];
          for ($x = 1; $x <=$r; $x++) {
              echo '<span class="fa fa-star checked"></span>';
          }
          ?>
        <br>
          <?php echo $row1['comment']; ?>
          
          
        </div>

        </p>
        <?php
  }}
        ?>
                            </div>

                            </div>
<br>
                        <?php
						echo'</div>';
						
					}
			?>

           <!--div class="col-md-3">
               <div class="fillbg px-2">
       		<?php/*	if(strpos($row["map"], 'iframe')){
       		        echo '<div class="map">'.$row["map"].'</div><br>';
       		        }
       		        else{
       		        echo '<iframe width="100%" height="200" src="https://maps.google.com/maps?q='.$row["map"].'&output=embed"></iframe><br>';
       		        }
					echo	($row["address"]!==null)?'<p><i class="bi bi-geo-alt-fill"></i>&nbsp;'.$row["address"].'</p>':null;
					echo 	($row["mobile"]!==null)?'<p><i class="bi bi-telephone-fill"></i>&nbsp;<a href="tel:'.$row["mobile"].'" target="_blank" class="text-decoration-none text-dark">'.$row["mobile"].'</a></p>':null;
					echo	($row["email"]!==null)?'<p><i class="bi bi-envelope-fill"></i>&nbsp;<a href="mailto:'.$row["email"].'" target="_blank" class="text-decoration-none text-dark">'.$row["email"].'</a></p>':null;
					echo	($row["website"]!==null)?'<p><i class="bi bi-globe"></i>&nbsp;<a href="'.$row["website"].'" target="_blank" class="text-decoration-none text-dark">'.$row["website"].'</a></p>':null;
					echo 	'<a href="#" class="btn btn-success mb-4">Branches</a>
					';
			 
			
			*/ ?></div-->
           </div>
        </div>
        </div>
        </section>
        </div>


<div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="padding:0 1rem">
        <h5 class="modal-title" id="galleryModalLabel">doctor Gallery</h5>
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
					$galquery = mysqli_query($conn, "SELECT * FROM mpgallery WHERE doctorid= '$doctorid'");
					while($galrow=mysqli_fetch_array($galquery)){
						echo ' 
								<div>
								<img data-u="image" src="directory/doctor/'.$galrow["image_name"].'">
								<img data-u="thumb" src="directory/doctor/'.$galrow["image_name"].'"   height="90">
								</div>
							';
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
<script>
    $(document).on('click', '.galimage', function(){
	$('#gallery').modal('show');
	$("[data-u=image]").css({'height': '380px','top': '0px','left': '0px','display': 'block','position': 'absolute','max-width': '10000px','z-index': '1', 'width':'auto'});
	
});
</script>
        <?php include "footer.php";?>
        