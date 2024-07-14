
<?php include "header.php"; 
?>
<script>    
localStorage.setItem('lang', 'eng');
</script>
<style>
body{
    background-color: #f4f4f4 !important;
}
.main-content-sec {
    padding: 5px 0;
}
.main-content-sec .left-menu-part {
    padding: 10px 0;
}
.main-content-sec .left-menu-part .unscroll h3 {
    text-align: center;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 20px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    color: #666666;
    margin-bottom: 0;
}
.main-content-sec .left-menu-part .unscroll ul li a {
    text-transform: uppercase;
    color: #666666;
    font-weight: 500;
    display: block;
    border-bottom: 1px solid #ddd;
    padding: 10px 20px;
	text-decoration: none;
	font-size:14px;
}

.main-content-sec .left-menu-part .unscroll ul li a:hover{
    color: #68cf68;
}
}
.main-content-sec .left-menu-part .unscroll .client-sec {
    padding-top: 20px;
    margin: 0 20px;
}
.main-content-sec .left-menu-part  .unscroll .client-sec .client-btn {
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
.main-content-sec .article-sec .top-menu .tab-list li {
    padding: 15px 15px;
    display: inline-block;
    color: #878787;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 500;
    cursor:pointer;
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
         border-color: #ffffff;
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
         padding: 10px 0px;
         margin: 10px 0;
         text-align: center;
         }
         .main-content-sec .right-cont-part .social-icons ul li {
         display: inline-block;
		 padding-left:0;
         }
         .main-content-sec .right-cont-part .social-icons ul li img {
         width: 42px;
         padding: 5px;
		 
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

.dropdown-menu{
	transform: translate3d(24px, -58px, 0px)!important;
	bottom:0!important;
	top:8px!important;
	padding:unset;
	height:40px;
}
.dropdown-item{
padding: .25rem 0.2rem;
}	
.dropdown-menu-arrow.dropdown-menu-right:before, .dropdown-menu-arrow.dropdown-menu-right:after {
    left: 12px;
    right: auto;
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
    border-color: rgba(0,0,0,.15) transparent transparent transparent;
    z-index: 9999;
}

	/*.dropdown-menu-arrow.dropdown-menu-right:before, .dropdown-menu-arrow.dropdown-menu-right:after {
    left: auto;
    right: 12px;
}
.dropdown-menu-arrow:before {
    content: "";
    position: absolute;
    right: 11px;
    top: -10px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 10px 10px 10px;
    border-color: transparent transparent #dee2e6 transparent;
    z-index: 9999;
}*/
.heading, .heading1{
  position: relative;
  line-height: 1.2em;
  padding:1rem 0 0 1rem; 
  color:#464444;
  font-weight:bold;
}
.heading:before {
    position: absolute;
    left: 8px;
    top: 2.3em;
    height: 0;
    width: 30px;
    content: '';
    border-top: 4px solid #0AD69E;
    border-radius: 1em;
}
.heading1:before {
    position: absolute;
    left: 14px;
    top: 2.8em;
    height: 0;
    width: 25px;
    content: '';
    border-top: 4px solid #0AD69E;
    border-radius: 1em;
}
.heart {
  cursor: pointer;
  height: 50px;
  width: 50px;
  background-image:url( 'https://abs.twimg.com/a/1446542199/img/t1/web_heart_animation.png');
  background-position: left;
  background-repeat:no-repeat;
  background-size:2900%;
}

bi-heart:hover{
	transform: scale(1.5);
}
.help-block {
      color: red;
   }
.close:focus {
    outline: 0;
    border: 0px solid #fff;
    outline: none;
}  
#circularG{
	position:relative;
	width:58px;
	height:58px;
	margin: auto;
}

.circularG{
	position:absolute;
	background-color:rgb(10,214,160);
	width:14px;
	height:14px;
	border-radius:9px;
		-o-border-radius:9px;
		-ms-border-radius:9px;
		-webkit-border-radius:9px;
		-moz-border-radius:9px;
	animation-name:bounce_circularG;
		-o-animation-name:bounce_circularG;
		-ms-animation-name:bounce_circularG;
		-webkit-animation-name:bounce_circularG;
		-moz-animation-name:bounce_circularG;
	animation-duration:1.1s;
		-o-animation-duration:1.1s;
		-ms-animation-duration:1.1s;
		-webkit-animation-duration:1.1s;
		-moz-animation-duration:1.1s;
	animation-iteration-count:infinite;
		-o-animation-iteration-count:infinite;
		-ms-animation-iteration-count:infinite;
		-webkit-animation-iteration-count:infinite;
		-moz-animation-iteration-count:infinite;
	animation-direction:normal;
		-o-animation-direction:normal;
		-ms-animation-direction:normal;
		-webkit-animation-direction:normal;
		-moz-animation-direction:normal;
}

#circularG_1{
	left:0;
	top:23px;
	animation-delay:0.41s;
		-o-animation-delay:0.41s;
		-ms-animation-delay:0.41s;
		-webkit-animation-delay:0.41s;
		-moz-animation-delay:0.41s;
}

#circularG_2{
	left:6px;
	top:6px;
	animation-delay:0.55s;
		-o-animation-delay:0.55s;
		-ms-animation-delay:0.55s;
		-webkit-animation-delay:0.55s;
		-moz-animation-delay:0.55s;
}

#circularG_3{
	top:0;
	left:23px;
	animation-delay:0.69s;
		-o-animation-delay:0.69s;
		-ms-animation-delay:0.69s;
		-webkit-animation-delay:0.69s;
		-moz-animation-delay:0.69s;
}

#circularG_4{
	right:6px;
	top:6px;
	animation-delay:0.83s;
		-o-animation-delay:0.83s;
		-ms-animation-delay:0.83s;
		-webkit-animation-delay:0.83s;
		-moz-animation-delay:0.83s;
}

#circularG_5{
	right:0;
	top:23px;
	animation-delay:0.97s;
		-o-animation-delay:0.97s;
		-ms-animation-delay:0.97s;
		-webkit-animation-delay:0.97s;
		-moz-animation-delay:0.97s;
}

#circularG_6{
	right:6px;
	bottom:6px;
	animation-delay:1.1s;
		-o-animation-delay:1.1s;
		-ms-animation-delay:1.1s;
		-webkit-animation-delay:1.1s;
		-moz-animation-delay:1.1s;
}

#circularG_7{
	left:23px;
	bottom:0;
	animation-delay:1.24s;
		-o-animation-delay:1.24s;
		-ms-animation-delay:1.24s;
		-webkit-animation-delay:1.24s;
		-moz-animation-delay:1.24s;
}

#circularG_8{
	left:6px;
	bottom:6px;
	animation-delay:1.38s;
		-o-animation-delay:1.38s;
		-ms-animation-delay:1.38s;
		-webkit-animation-delay:1.38s;
		-moz-animation-delay:1.38s;
}



@keyframes bounce_circularG{
	0%{
		transform:scale(1);
	}

	100%{
		transform:scale(.3);
	}
}

@-o-keyframes bounce_circularG{
	0%{
		-o-transform:scale(1);
	}

	100%{
		-o-transform:scale(.3);
	}
}

@-ms-keyframes bounce_circularG{
	0%{
		-ms-transform:scale(1);
	}

	100%{
		-ms-transform:scale(.3);
	}
}

@-webkit-keyframes bounce_circularG{
	0%{
		-webkit-transform:scale(1);
	}

	100%{
		-webkit-transform:scale(.3);
	}
}

@-moz-keyframes bounce_circularG{
	0%{
		-moz-transform:scale(1);
	}

	100%{
		-moz-transform:scale(.3);
	}
}

</style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<div class="content">
<section class="main-content-sec">
   <div class="container-fluid p-0">
<div class="row m-0 desktopviewArticle">
   <div class="col-md-3 left-menu">
      <div class="left-menu-part">
        <div class="unscroll" style="background-color:#fff;padding:10px 0">  
         <h3>MP Directory</h3>
         <ul style="list-style-type:none; padding-left:0">
            <li><a role="button" href="hospital"><i class="icofont-hospital"></i> HOSPITALS</a></li>
            <li><a role="button" href="doctors"><i class="icofont-doctor"></i> DOCTORS</a></li>
            <li><a role="button" href="medical"><i class="icofont-nurse-alt"></i> DOCTOR CLINICS & NURSING HOMES</a></li>
            <li><a role="button" href="pharmacies"><i class="icofont-medical-sign"></i> PHARMACIES</a></li>
            <li><a role="button" href="beauty"><i class="icofont-girl-alt"></i> BEAUTY SALON</a></li>
         </ul>
         <div class="client-sec" style="padding-top: 1px; margin: 0 20px;"><a class="client-btn">Sponsors</a></div>
         </div>
         <div class="msg-part" style="margin-top:10px;text-align:center">
             <img src="assets/images/mammypages.com-Mindcare-left-ad.jpg" alt="msg-img" class="img-fluid">
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
       
   </div>
   <div class="col-md-6 center-menu" style="padding:0">
      <div class="article-sec">
         <div class="top-menu">
            <div class="row m-0" style="border-bottom: 3px solid #f4f4f4 ; padding:1px">
               <div class="col-md-7">
                  <ul class="tab-list"  style="list-style-type:none; padding-left:0; margin:0">
                     <li class="articleread heading1">Home</li>
                     <li class="articleread">Most Read</li>
                  </ul>
               </div>
               <!--div class="col-md-5">
                  <div class="right-btn">
                     <a href="#" style="text-decoration:none">Become an Author</a>
                  </div>
               </div-->
            </div>
            <div id="circularG">
            	<div id="circularG_1" class="circularG"></div>
            	<div id="circularG_2" class="circularG"></div>
            	<div id="circularG_3" class="circularG"></div>
            	<div id="circularG_4" class="circularG"></div>
            	<div id="circularG_5" class="circularG"></div>
            	<div id="circularG_6" class="circularG"></div>
            	<div id="circularG_7" class="circularG"></div>
            	<div id="circularG_8" class="circularG"></div>
            </div>
            <div id="article"></div>
			
			
         </div>
      </div>
   </div>
   <div class="col-md-3 right-menu" >
      <div class="right-cont-part">
         <div class="contact-part">
            <div class="personnel-item">
               <div class="personnel-item-inner gdlr-skin-box">
                  <div class="personnel-author-image gdlr-skin-border"><img src="assets/images/doctor.jpg"></div>
                  <div class="personnel-info">
                     <div class="personnel-position gdlr-skin-info"> Dr. Wasana Samarawickrama </div>
                  </div>
                  <div class="personnel-content gdlr-skin-content">
                     <p> BAMS (University of Colombo), M.Ac.F.(SL), Msc in Ayurvedic Hospital Management (reading)</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="social-icons">
            <ul style="padding-left:0">
               <a href ="https://www.facebook.com/mammypages" target="_blank"><li role="button"><img src="assets/images/Facebook.png" alt="facebook"></li></a>
               <a href ="https://www.instagram.com/mammypages.official" target="_blank"><li role="button"><img src="assets/images/Insta.png" alt="instagram" class="social-media-ico"></li></a>
               <a href = "https://twitter.com/mammypages" target="_blank"><li role="button"><img src="assets/images/Twitter.png" alt="twitter" class="social-media-ico"></li></a>
               <a href="#"><li role="button"><img src="assets/images/Whatsapp.png" alt="whatsapp" class="social-media-ico"></li></a>
               <a href="https://www.youtube.com/channel/UCaZMIIfHKr1JCbB-WrQ6vtw" target="_blank"><li role="button"><img src="assets/images/Youtube.png" alt="youtube" class="social-media-ico"></li></a>
            </ul>
         </div>
         <div class="msg-part" style="text-align:center">
		 <img src="assets/images/MP-ad.jpg" alt="msg-img" class="img-fluid">
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
   </div>
</div>
</div>
</section>


<?php include "footer.php";?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(".descript"). children(). removeAttr('style');
$(".descript").css('color', 'gray');
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
$('#share').tooltip({
  selector: "a[rel=tooltip]"
})
var status="";
async function update_like(email, articleid, value){
	//var lang = $('#language option:selected').val();
    //make the ajax call
	
   let result = await $.ajax({
        url: "ajax/likeupdate",
        data: {email : email, articleid:articleid, value:value},
		type: "POST",
        success: function(data) {
			//debugger;
			var json=JSON.parse(data);
            if(json.status=='success'){
				status=data;
			}
			else{
				status =data;
			}
			
			//console.log(data);
        },
		error: function(data) {
			console.log(data);
		}
		
    });return status;
}

async function update_favourite(email, articleid, value, favourite){
	//var lang = $('#language option:selected').val();
    //make the ajax call
	
   let result = await $.ajax({
        url: "ajax/likeupdate",
        data: {email : email, articleid:articleid, value:value, favourite:favourite},
		type: "POST",
        success: function(data) {
			//debugger;
			var json=JSON.parse(data);
            if(json.status=='success'){
				status=data;
			}
			else{
				status =data;
			}
			
			//console.log(data);
        },
		error: function(data) {
			console.log(data);
		}
		
    });return status;
}

$(document).on('click', '.bi-heart', function(){
	var sessionuser = "<?php if(isset($_SESSION['name'])){echo $_SESSION['userid'];}else{echo '';}?>";
if(sessionuser != ""){
	var classname = $(this).attr('class');
	var value = (classname.includes("bi-heart-fill"))?0:1;
	
	var articleid=$(this).attr('value');
	var element = $(this);
	//update_like(sessionuser, articleid, 1).then(console.log); 
	async function main() {
	  var status = await update_like(sessionuser, articleid, value)
		status = JSON.parse(status);
		if(status.status=='success'){
		var a = new Audio('audio/mixkit-hard-click-1118.wav');
		a.play();
		 $(element).animate({zoom: '102%', opacity:.5}, "medium", function(){
			 //$(this).toggleClass('bi-heart-fill bi-heart');
		 });
		 $(element).animate({zoom: '102%', opacity:1}, "medium");
	  $(element).toggleClass('bi-heart-fill bi-heart');
	  //var dat= $(element).next().find('span').text();
	  var dat= $(element).next().text(status.likes);
		}
		else{
			console.log(status);
		}
	}
	main();
	
  }
  else{
	  $('#exampleModal').modal('show');
  }
});
$(document).on('click', '.bi-heart-fill', function(){
	var sessionuser = "<?php if(isset($_SESSION['name'])){echo $_SESSION['userid'];}else{echo '';}?>";
if(sessionuser != ""){
	var classname = $(this).attr('class');
	var value = (classname.includes("bi-heart-fill"))?0:1;
	var articleid=$(this).attr('value');
	var status = "";
	var element = $(this);
	async function main() {
	  var status = await update_like(sessionuser, articleid, value)
		status = JSON.parse(status);
		if(status.status=='success'){
		var a = new Audio('audio/mixkit-hard-click-1118.wav');
		a.play();
		 $(element).animate({zoom: '102%', opacity:.5}, "slow", function(){
			 //$(this).toggleClass('bi-heart-fill bi-heart');
		 });
		 $(element).animate({zoom: '102%', opacity:1}, "slow");
	  $(element).toggleClass('bi-heart-fill bi-heart');
	  var dat= $(element).next().text(status.likes);
		}
		else{
			console.log(status);
		}
	}
	main();
	
  }
  else{
	  $('#exampleModal').modal('show');

  }
	
});

$(document).on('click', ".bi-star, .favourite", function(){
	var sessionuser = "<?php if(isset($_SESSION['name'])){echo $_SESSION['userid'];}else{echo '';}?>";
if(sessionuser != ""){
var exists = ($(this).attr('class').includes("favourite"))?1:0;
	var classname = exists ? $(this).prev().attr('class'):  $(this).attr('class');
	var value = (classname.includes("bi-star-fill"))?0:1;
	
	var articleid= exists ? $(this).prev().attr('value'): $(this).attr('value');
	var status = "";
	 var element = exists ?$(this).prev():$(this);
	 $('.bi-star .favourite').off('click');
	//update_like(sessionuser, articleid, 1).then(console.log); 
	async function main() {
	  var status = await update_favourite(sessionuser, articleid, value, 'favourite')
		status = JSON.parse(status);
		if(status.status=='success'){
		var a = new Audio('audio/mixkit-hard-click-1118.wav');
		a.play();
		 $(element).animate({zoom: '102%', opacity:.5}, "medium", function(){
			 //$(this).toggleClass('bi-heart-fill bi-heart');
		 });
		 $(element).animate({zoom: '102%', opacity:1}, "medium");
	  $(element).toggleClass('bi-star-fill bi-star');
	  //var dat= $(element).next().find('span').text();
	  $(element).next().text(status.text);
		}
		else{
			console.log(status);
		}
	}
	main();
	
  }
  else{
	  $('#exampleModal').modal('show');
  }
});
$(document).on('click', ".bi-star-fill, .favourite1", function(){
	var sessionuser = "<?php if(isset($_SESSION['name'])){echo $_SESSION['userid'];}else{echo '';}?>";
if(sessionuser != ""){
    var exists = ($(this).attr('class').includes("favourite1"))?1:0;
	var classname = exists ? $(this).prev().attr('class'):  $(this).attr('class');
	var value = (classname.includes("bi-star-fill"))?0:1;
	
	var articleid= exists ? $(this).prev().attr('value'): $(this).attr('value');
	var status = "";
	 var element = exists ?$(this).prev():$(this);
	async function main() {
	  var status = await update_favourite(sessionuser, articleid, value, 'favourite')
		status = JSON.parse(status);
		if(status.status=='success'){
		var a = new Audio('audio/mixkit-hard-click-1118.wav');
		a.play();
		 $(element).animate({zoom: '102%', opacity:.5}, "slow", function(){
			 //$(this).toggleClass('bi-heart-fill bi-heart');
		 });
		 $(element).animate({zoom: '102%', opacity:1}, "slow");
	  $(element).toggleClass('bi-star-fill bi-star');
	  $(element).next().text(status.text);
		}
		else{
			console.log(status);
		}
	}
	main();
	
  }
  else{
	  $('#exampleModal').modal('show');

  }
	
});

</script>
<script>
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

 function removeReg(data, status) {
  swal({
      text: data,
      icon: status,
      dangerMode: false,
    })
    .then(function(value) {
		if(status == 'success'){
		window.location.href='index.php';
		}
      //console.log('returned value:', value);
    });
}

function fetch_art(lang, mostread){
	//var lang = $('#language option:selected').val();
    //make the ajax call
    if(mostread != undefined){
       var jsondata = {lang : lang, mostread : mostread};
    }
    else{
        var jsondata = {lang : lang,}
    }
    $('#article').empty();
    $.ajax({
        url: "ajax/articlefetch",
        data: jsondata,
		type: "POST",
		beforeSend: function() {
              $("#circularG").show();
         },
        success: function(data) {
			//debugger;
         
				$('#article').append(data);
				$("#circularG").hide();
				//console.log(json[i]);
			
			//console.log(data);
        },
		error: function(data) {
		//	console.log(data);
		}
    });
}

$("#language, #languagem").on('change', function() {
	var selectedid = "#"+$(this).attr('id');
	$('#articlecat').children().remove();
	var lang = $(selectedid+' option:selected').val();
	localStorage.setItem('lang', lang);
	if(lang=='eng'){
	    window.location.href="english";
	}
	if(lang=='sin'){
	    window.location.href="sinhala";
	}
	if(lang=='tam'){
	    window.location.href="tamil";
	}
    if($(".heading1").text()=="Home"){
	fetch_art(lang);
    }
    else{
	fetch_art(lang, "mostread");
    }
});

$(window).on('load', function() {
    var newlang = localStorage.getItem('lang');
	$("#language option[value='"+newlang+"']").attr("selected","selected");
	fetch_art(newlang);
});
$(document).on('click', '.articleread', function(){
    if($(this).text()=="Home"){
        $(this).addClass("heading1");
        $(this).next().removeClass("heading1");
        var lang = $('#language option:selected').val();
		fetch_art(lang);
    }
    else{
        $(this).addClass("heading1");
        $(this).prev().removeClass("heading1");
        var lang = $('#language option:selected').val();
		fetch_art(lang, 'mostread');
    }
})

var height=$("#h2").height()+$("#cathome").height()+60;
$(".left-menu-part, .right-cont-part").css({'position':'sticky','top':height});
var width=$(window).width();
$(document).ajaxComplete(function(){
if(width<576){
	$(".feaimg").css({"height":"120px", "width":"auto", "object-fit":"fill", "max-width":"85%"});
	//$('html').css({'overflow-x':'hidden'})
}
else{
		$(".feaimg").css({"height":"80px", "width":"100px", "object-fit":"cover"});
	}
});
$(window).on('resize', function(){
	var height=$("#h2").height()+$("#cathome").height()+60;
	$(".left-menu-part, .right-cont-part").css({'top':height, 'position':'sticky'});
	var width=$(window).width();
	if(width<576){
	$(".feaimg").css({"height":"120px", "width":"auto", "object-fit":"fill", "max-width":"85%"});
	//$('html').css({'overflow-x':'hidden'})
	}
	else{
		$(".feaimg").css({"height":"80px", "width":"100px", "object-fit":"cover"});
	}
    });
</script>
</body>
