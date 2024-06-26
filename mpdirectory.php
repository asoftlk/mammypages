 <?php include "header.php"; 

?>
<style>
body{
    background-color: #f4f4f4 !important;
}
.main-content-sec {
    padding: 5px 0;
}
.main-content-sec .left-menu-part {
    background-color: #fff;
    padding: 10px 0;
}
.main-content-sec .left-menu-part h3 {
    text-align: center;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 20px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    color: #666666;
    margin-bottom: 0;
}
.main-content-sec .left-menu-part ul li a {
    text-transform: uppercase;
    color: #666666;
    font-weight: 500;
    display: block;
    border-bottom: 1px solid #ddd;
    padding: 10px 20px;
	text-decoration: none;
}
.main-content-sec .left-menu-part .client-sec {
    padding-top: 20px;
    margin: 0 20px;
}
.main-content-sec .left-menu-part .client-sec .client-btn {
    padding: 10px 20px;
    display: block;
    background-color: #d3598a;
    color: #fff;
    text-transform: uppercase;
    text-align: center;
    font-weight: 700;
    font-size: 18px;
}
.main-content-sec .article-sec .top-menu {
    background-color: #fff;
    margin-bottom: 10px;
}
.main-content-sec .article-sec .top-menu .tab-list li {
    display: inline-block;
}
.main-content-sec .article-sec .top-menu .tab-list li .active-tab {
    background-color: #d2658e;
    color: #fff;
}
.main-content-sec .article-sec .top-menu .tab-list li a {
    padding: 15px 15px;
    display: inline-block;
    color: #878787;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 500;
}
.main-content-sec .article-sec .top-menu .right-btn {
    text-align: right;
}
.main-content-sec .article-sec .top-menu .right-btn a {
    text-transform: uppercase;
    color: #747474;
    padding: 15px 15px;
    display: inline-block;
    font-size: 15px;
    font-weight: 700;
}
.main-content-sec .right-cont-part .contact-part {
         background-color: #fff;
         box-shadow: 0 2px 5px #ddd;
         margin-top: 35px;
         }
         .main-content-sec .right-cont-part .contact-part .personnel-item-inner {
         padding: 25px 30px;
         position: relative;
         }
         .main-content-sec .right-cont-part .contact-part .personnel-item-inner .personnel-author-image img {
         width: 65px;
         height: 65px;
         position: absolute;
         left: 50%;
         top: -35px;
         margin-left: -35px;
         border-width: 3px;
         border-style: solid;
         overflow: hidden;
         border-radius: 35px;
         border-color: #282828;
         }
         .main-content-sec .right-cont-part .contact-part .personnel-item-inner .personnel-info {
         margin-top: 30px;
         text-align: center;
         }
         .main-content-sec .right-cont-part .contact-part .personnel-item-inner .personnel-content {
         text-align: center;
         margin-top: 15px;
         color: #959595;
         }
         .main-content-sec .right-cont-part .contact-part .contact-center {
         padding: 20px 20px 0 20px;
         position: relative;
         }
         .main-content-sec .right-cont-part .contact-part .contact-center i {
         font-size: 50px;
         color: #666666;
         position: absolute;
         left: 20px;
         top: 20px;
         }
         .main-content-sec .right-cont-part .contact-part .contact-center .mobile-num {
         padding-left: 70px;
         }
         .main-content-sec .right-cont-part .contact-part .contact-center .mobile-num a {
         color: #626262;
         font-weight: 700;
         font-size: 18px;
         }
         .main-content-sec .right-cont-part .contact-part .contact-center .mobile-num a span {
         font-size: 14px;
         color: #a5d68f;
         }
         .main-content-sec .right-cont-part .contact-part .contact-center .mobile-num p {
         display: block;
         color: #a0a0a0;
         font-size: 15px;
         }
         .main-content-sec .right-cont-part .contact-part .contact-btns a {
         width: 50%;
         background-color: #f8f8f8;
         color: #8a8a8a;
         font-weight: 600;
         display: inline-block;
         float: none;
         padding: 10px 20px;
         border-right: 2px solid #e5e5e5;
         text-transform: uppercase;
         text-align: center;
         font-size: 13px;
         }
         .main-content-sec .right-cont-part .contact-part .center-text {
         text-align: center;
         padding: 20px 0;
         }
         .main-content-sec .right-cont-part .contact-part .center-text span {
         color: #999999;
         text-transform: uppercase;
         font-weight: 600;
         font-size: 13px;
         }
         .main-content-sec .right-cont-part .social-icons {
         background-color: #fff;
         padding: 20px 10px;
         margin: 10px 0;
         text-align: center;
         }
         .main-content-sec .right-cont-part .social-icons ul li {
         display: inline-block;
		 padding-left:0;
         }
         .main-content-sec .right-cont-part .social-icons ul li img {
         width: 54px;
         padding: 9px;
		 
         }
         .main-content-sec .right-cont-part .social-icons ul li a {
         font-size: 16px;
         margin-right: 8px;
         background: #c45791;
         background: linear-gradient(90deg, #c45791 30%, #6e48bf 100%);
         color: #fff;
         width: 30px;
         height: 30px;
         line-height: 40px;
         text-align: center;
         display: inline-block;
         }
		 
    /* For share button  */
    
          #wrapper {
          text-align:center;
          position:absolute;
          left:0;
          right:0;
          margin: 100px auto;
          width:420px;
        }

        input[type="checkbox"]{display:none;}

        .checkbox:checked + .label{
          color:black;
        }

        .checkbox:checked ~ .social {
          opacity:1;
          transform:scale(1) translateY(-90px);
        }

        .label {
          font-size:16px;
          cursor:pointer;
          margin-top: 2px;
          padding:5px 10px;
          border-radius:10%;
          color:black;
        }

        .social {
          transform-origin:50% 0%;
          transform:scale(0) translateY(-190px);
          opacity:0;
          transition:.5s;
        }
        .social_icons {
          position:relative;
          left:0;
          right:0;
          margin:-5px auto 0;
          color:#fff;
          height:36px;
          width:223px;
          background:#F4F4F4;
          padding:0;
          list-style:none;

        }

        .social_icons li {
          font-size:13px;
          cursor:pointer;
          width:40px;
          margin:2px;
          padding:12px 0;
          text-align:center;
          float:left;
          display:block;
          height:12px;}

        .social_icons li:hover {color:rgba(0,0,0,.5);}

        .social_icons:after {
          content:'';
          display:block;
          position:absolute;
          left:0;
          right:0;
          margin:36px auto;
          margin-left: 2px;
          height:0;
          width:0;
          border-left: 12px solid transparent;
            border-right: 12px solid transparent;
            border-top: 20px solid #F4F4F4;
        }

/*
        li[class*="twitter"] {background:#6CDFEA;padding:16px 0;}
        li[class*="gplus"] {background:#E34429;padding:16px 0;}
        li[class*="instagram"] {background:#0E68CE;padding:16px 0;}
        li[class*="youtube"] {background:#CC181E;padding:16px 0;}
        li[class*="facebook"] {background:#66b3ff;padding:16px 0;}
*/

        .credits a {
          color: #fff;
          text-decoration: none;
        }
		.text{
			font-weight:700;
			font-size:13px;
			margin-bottom:3px;
		}
    
    /* End of Share*/
</style>

<!--For Share-->
    <script>
  window.console = window.console || function(t) {};
  </script>
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
<!--End Share-->


<div class="content">
<section class="main-content-sec">
   <div class="container-fluid p-0">
<div class="row m-0 desktopviewArticle">
   <div class="col-md-3">
      <div class="left-menu-part">
         <h3>MP Directory</h3>
         <ul style="list-style-type:none; padding-left:0">
            <li><a class="active" role="button" href="hospital"><i class="icofont-hospital"></i> HOSPITALS</a></li>
            <li><a role="button" href="doctors"><i class="icofont-doctor"></i> DOCTORS</a></li>
            <li><a role="button" href="clinics"><i class="icofont-nurse"></i> MIDWIFE CLINICS</a></li>
            <li><a role="button" href="midwifes"><i class="icofont-nurse-alt"></i> MEDICAL CLINICS</a></li>
            <li><a role="button" href="pharmacies"><i class="icofont-medical-sign"></i> PHARMACIES</a></li>
            <li><a role="button" href="beauty"><i class="icofont-girl-alt"></i> BEAUTY SALON</a></li>
         </ul>
         <div class="client-sec"><a class="client-btn">Sponsors</a></div>
      </div>
   </div>
   <div class="col-md-6">
      <div class="article-sec">
         <div class="top-menu">
            
			<?php $hospital =mysqli_query($conn, "SELECT * FROM hospitals where type ='Hospital'");
					
					while($row=mysqli_fetch_array($hospital)){
					echo '<div class="row m-0" style="border-bottom: 1px solid #f4f4f4 ;">
							<div class="col-md-3" style="margin:auto">
							<div ><img src="directory/hospitals/'.$row['hospital_image'].'" class="img-fluid" style="max-height:6rem"></div></div><div class="col-md-8" style="margin:1rem 0">
							<div style="float:right">';
							$rating= $row['rating'];
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
							echo '</div><p class="text">'.$row["hospital_name"].'</p>
                            <p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["hospital_address"].'</P>
                            <p class="text"><img src="assets/images/phone-call.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["mobile"].'</p>
                            <p class="text"><img src="assets/images/email1.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["email"].'</p>
                            <p class="text"><img src="assets/images/hospital.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["hospital_type"].'</p>
                            <p class="text"><img src="assets/images/working-time.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["duration"].'</p>
                            <div style="float:right"><a href="#" type="button" class="btn btn-success" style="font-weight:bold">View Details</a></div><p class="text"><img src="assets/images/shield.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["status"].'</p>
                            
                         </div>   
						</div>';
					}
					?>
						
			
         </div>
      </div>
   </div>
           <div class="col-md-3">
			<?php 
			
			?>
           </div>
        </div>
        </div>
        </section>
        </div>
        <?php include "footer.php";?>
        <script>
        $(".descript"). children(). removeAttr('style');
        $(".descript").css('color', 'gray');
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
        $('#share').tooltip({
          selector: "a[rel=tooltip]"
        })
	
        </script>
		<script>
		$('#cathome').remove();
		</script>
        </body>