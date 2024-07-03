<?php 


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
// print_r($_SESSION);
include "connect.php"; 
// phpinfo();

// **PREVENTING SESSION HIJACKING**
// Prevents javascript XSS attacks aimed to steal the session ID
// ini_set('session.cookie_httponly', 1);

// **PREVENTING SESSION FIXATION**
// Session ID cannot be passed through URLs
// ini_set('session.use_only_cookies', 1);

// Uses a secure connection (HTTPS) if possible
// ini_set('session.cookie_secure', 1); 

// echo $_SESSION['userid']."hello";

// echo '<pre>';
// var_dump($_SESSION['name']);
// echo '</pre>';
date_default_timezone_set('Asia/Kolkata');
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string).' ago' : 'just now';
}
function countFormat($num) {

  if($num>1000) {
        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('K', 'M', 'B', 'T');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];
        return $x_display;
  }
  return $num;
}
?>
<html ><head>
  <meta charset="utf-8">
  <title>mammypages.com -Pregnancy and Parenting</title>
  <meta property="og:site_name" content="mammypages.com -Pregnancy and Parenting">
  <meta property="og:url" content="https://www.mammypages.com/">
  <meta property="og:image" content="https://www.mammypages.com/assets/images/MP-Icon.png">
  <meta name="description" content="Getting Pregnant | Pregnancy | First Year | Toddler | Family | Health | Beauty | Travel | News | Mammypages">
  <meta name="keywords" content="Mammypages, Parent, Children, Pregnancy, Toddler">
  <meta name="author" content="Mammypages Veramasa">
  <link rel="icon" type="image/icon type" href="assets/images/favicon.ico" />
  <!--base href="/"-->
  <base href="/mammypages/">

  <meta name="viewport" content="width=device-width, minimum-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="admin/plugins/jquery/jquery.min.js><\/script>')</script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@300;500;700&display=swap" rel="stylesheet">

  <script src="script/bootstrap.min.js"></script>
  <link href="styles/style.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/icofont.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
  <!--link rel="stylesheet" href="mummy/styles/mummystyle.css"-->
  <!--script src="/script/weather.js" defer></script-->
  <script data-ad-client="ca-pub-6640694817095655" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.8/dist/sweetalert2.all.min.js"></script>

<style>
  .active {
    color: #d25988 !important;
  }
  .nav-item:hover{
    color: #d25988 !important;
  }
  .navbar .nav-item .nav-link{
		color:black;
	 }
	 .navbar .nav-item .nav-link:hover{
		color:#d25988;
	 }
	 .navbar .active .nav-link{
		color:#d25988;
	 }
	 .navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
		color: #d25988;
	}
	 .navbar-nav li{
		 margin:0 0.5rem;
	}
	#h2-mobile .navbar-nav li{
		margin:0;
	}
.login-btn {
	background-color: #d25988;
	color: #fff;
	padding: 8px 20px;
	border-radius: 5px;
	margin: 0.6rem 0;
}
.reg-btn {
	background-color: #5f45c9;
	color: #fff;
	padding: 8px 20px;
	border-radius: 5px;
	margin: 0.6rem 0;
}

.login-btn:hover{
	color:#fff;
}
.reg-btn:hover{
	color:#fff;
}
.navbar-collapse.in {
    display: block !important;
}
.navbar-toggler:focus,
.navbar-toggler:active,
.navbar-toggler-icon:focus {
    outline: none;
    box-shadow: none;
}
.close:focus {
    outline: 0;
    border: 0px solid #fff;
    outline: none;
} 
.help-block {
      color: red;
	  float:left;
}
body {
    max-width:100%;
    overflow-x: hidden !important;
}
button:focus {
    border: none;
    outline: none;
} 
@media only screen 
and (max-width :991px){
	.desktopview{
		display:none !important;
	}
	.main-footer{
		margin-bottom:50px;
	}
	.center-menu{
		width:100%;
	}
	.login-btn, .reg-btn{
	    padding:5px;
	}
    
}
@media only screen 
and (max-width :991px){
	.left-menu, .right-menu{
		display:none !important;
	}
    
}
@media only screen 
and (min-width : 992px){
	.mobileview{
		display:none !important;
	}    
}
.slick-prev:before, .slick-next:before{
    color:#5f45c9;
}
#articlecatm{
	width:85%;
}
.slick-initialized .slick-slide {
    display: block;
}
#h2-mobile::-webkit-scrollbar {
  height: 0px;              /* height of horizontal scrollbar ← You're missing this */
  width: 100%;               /* width of vertical scrollbar */
  border: 1px solid #d5d5d5;
}


</style>

</head>
<body>
<div class="container-fluid desktopview" id="h1" style="background:white; margin:auto; border-bottom:1px solid #ddd">
<div class="row" style="display:flex">
  <div class="col-md-6">
    <div class="float-left d-flex" style="padding:16px 20px; border-right:1px solid #ddd">
      <div class="top-left-menu" style="padding-right:10px; font-weiht:bold;" >
        <span id="time" class="contry-name" style="font-size:small; font-weight:bold;"></span>
      </div>
      <!--div class="d-flex" style="background:#F4F4F2; border-radius:0.8rem; padding:5px 10px">
        <img src="https://openweathermap.org/img/wn/04n.png" alt="" class="" height:"10px" />
        <p class="city">Denver</p>
        <p class="temp">51°C</p>
      </div-->
    </div>
  </div>
  <div class="col-md-6" >
      <div class="float-right" style="text-align: center; padding: 2px;  font-size: 14px; display:flex">
        <div class="lang-select"  style="padding:10px 20px">
        <span style="color: #d485b8;"> READ IN :</span>
        <select id="language" style="padding: 0.2rem; border: 2px solid #5f45c9; border-radius: 0.2rem;">
          <option value="eng"><span type="button" class="active"> ENGLISH</span></option>
          <option value="sin"><span type="button"> සිංහල</span></option>
          <option value="tam"><span type="button"> தமிழ்</span></option>
      </select>
      
      </div>
      <div style="padding:16px 20px">
        <h3 style="font-size:small; margin-bottom:0">Hi, <?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} else{ echo "Guest";}?></h3>
      </div>
    </div>
  </div>
</div>
</div>
<nav class="navbar bg-white navbar-expand-lg navbar-light desktopview" id="h2" style="padding: 5px 0;  border-bottom: 1px solid #ddd; position: -webkit-sticky; position: sticky;  top: 0px;  width: 100%;  z-index: 5;">
<a class="navbar-brand" href="index">
    <img src="assets/images/logo1.png" alt="Mammypages" class="img-fluid" style="margin-left:1rem; max-height:70px; min-width:120px;">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!--div class="container-fluid" style="float:right; padding-left:10%"-->
        <ul class="navbar-nav ml-auto text-center" id="menu-list" style="margin-right:10px">
            <li class="nav-item active">
                <a href="index" class="nav-link d-flex flex-column">
                    <i class="icofont-home" style="font-size:25px"></i>
                    <span class="d-sm-inline" style="font-size:smaller">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="magazine" class="nav-link d-flex flex-column">
                    <i class="icofont-ui-note" style="font-size:25px"></i>
                    <span class="d-sm-inline" style="font-size:smaller">Digital&nbsp;Magazine</span>
                </a>
            </li>
            <!--li class="nav-item">
                <a href="#" class="nav-link d-flex flex-column">
                    <i class="icofont-gift-box" style="font-size:25px"></i>
                    <span class="d-sm-inline" style="font-size:smaller">Birthday&nbsp;Box</span>
                </a>
            </li-->
            <li class="nav-item">
                <a href="https://www.youtube.com/channel/UCaZMIIfHKr1JCbB-WrQ6vtw" target="_blank" class="nav-link d-flex flex-column">
                    <i class="icofont-computer" style="font-size:25px"></i>
                    <span class="d-sm-inline" style="font-size:smaller;">MP&nbsp;TV</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="hospital" class="nav-link d-flex flex-column">
                    <i class="icofont-share" style="font-size:25px"></i>
                    <span class="d-sm-inline" style="font-size:smaller;">MP&nbsp;Directory</span>
                </a>
            </li>
            <li class="nav-item" id="community">
                <a href="dashboard" class="nav-link d-flex flex-column">
                    <i class="icofont-brand-slideshare" style="font-size:25px"></i>
                    <span class="d-sm-inline"  style="font-size:smaller">Community</span>
                </a>
            </li>
            <li class="nav-item">
              <button type="button" class="login-btn" id="login-btn" onclick="location.href='login'" style="border:none;font-weight:bold">Login</button>
            </li>
            <li class="nav-item" >
            <button type="button" class="reg-btn" id="reg-btn" onclick="location.href='signup'" style="border:none; font-weight:bold">Register</button>
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar d-flex desktopview" id="cathome" style="background:white;  margin:auto; padding: 5px 0;  border-bottom: 1px solid #ddd; position: -webkit-sticky; position: sticky;  width: 100%;  z-index: 5;">
<!--a href="mummy"><i class="icofont-home" style="font-size:25px"></i></a-->
<div class="justify-content-center container-fluid  mx-auto" id="articlecat"></div>
<!--a href="mummy/'.$row["category"].'.php" class="text-ceter" style="text-decoration:none; font-size:14px; font-weight:600;  color:#747474;">'.$row["category"].'</a-->
</nav>
<nav class="navbar bg-white navbar-expand navbar-light mobileview" id="h2m" style="background-color: #fff;  padding: 5px 0;  border-bottom: 1px solid #ddd;   width: 100%;  z-index: 5;">
<a class="navbar-brand" href="index">
    <img src="assets/images/logo1.png" alt="Mammypages" class="img-fluid" style="margin-left:1rem; max-height:70px; min-width:120px;">
</a>
        <ul class="navbar-nav ml-auto text-center" id="menu-listm" style="margin-right:10px">
			<li class="nav-item mr-1">
              <button type="button" class="login-btn login-btnm" id="login-btnm" onclick="location.href='login'" style="border:none;font-weight:bold">Login</button>
            </li>
            <li class="nav-item m-0" >
            <button type="button" class="reg-btn reg-btnm"  id="reg-btnm" onclick="location.href='signup'" style="border:none; font-weight:bold">Register</button>
            </li>
        </ul>
</nav>
<nav class="navbar bg-white navbar-expand navbar-light mobileview" id="h2-mobile" style="background-color: #fff;  padding: 5px 0;  border-bottom: 1px solid #ddd; position: fixed;  bottom: 0px;  width: 100%;  z-index: 500; overflow-x:scroll">
        <ul class="navbar-nav mx-auto justify-content-between text-center" style="flex:auto" id="menu-list-mobile" >
            <li class="nav-item active">
                <a href="index" class="nav-link d-flex flex-column">
                    <i class="icofont-home" style="font-size:22px"></i>
                    <span class="d-sm-inline" style="font-size:10px">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="magazine" class="nav-link d-flex flex-column">
                    <i class="icofont-ui-note" style="font-size:22px"></i>
                    <span class="d-sm-inline" style="font-size:10px">Digital&nbsp;Magazine</span>
                </a>
            </li>
            <!--li class="nav-item">
                <a href="#" class="nav-link d-flex flex-column">
                    <i class="icofont-gift-box" style="font-size:22px"></i>
                    <span class="d-sm-inline" style="font-size:10px">Birthday&nbsp;Box</span>
                </a>
            </li-->
			 <li class="nav-item">
                <a href="https://www.youtube.com/channel/UCaZMIIfHKr1JCbB-WrQ6vtw" target="_blank" class="nav-link d-flex flex-column">
                    <i class="icofont-computer" style="font-size:22px"></i>
                    <span class="d-sm-inline" style="font-size:10px;">MP&nbsp;TV</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="hospital" class="nav-link d-flex flex-column">
                    <i class="icofont-share" style="font-size:22px"></i>
                    <span class="d-sm-inline" style="font-size:10px;">MP&nbsp;Directory</span>
                </a>
            </li>
            <li class="nav-item" id="community">
                <a href="dashboard" class="nav-link d-flex flex-column">
                    <i class="icofont-brand-slideshare" style="font-size:22px"></i>
                    <span class="d-sm-inline"  style="font-size:10px">Community</span>
                </a>
            </li>
            
        </ul>
</nav>
<div class="container-fluid mobileview" id="h1m" style="background:white; margin:auto; border-bottom:1px solid #ddd">
<div class="row" style="display:flex">
  <div class="col p-0" >
      <div class="justify-content-between" style="text-align: center; padding: 2px;  font-size: 14px; display:flex">
        <div class="lang-select"  style="padding:10px 10px">
        <span style="color: #d485b8;"> READ IN :</span>
        <select id="languagem" style="padding: 0.2rem; border: 2px solid #5f45c9; border-radius: 0.2rem;">
          <option value="eng"><span type="button" class="active"> ENGLISH</span></option>
          <option value="sin"><span type="button"> සිංහල</span></option>
          <option value="tam"><span type="button"> தமிழ்</span></option>
      </select>
      
      </div>
      <div style="padding:10px 10px">
        <h3 style="font-size:small">Hi, <?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} else{ echo "Guest";}?></h3>
      </div>
    </div>
  </div>
</div>
</div>
<nav class="navbar d-flex mobileview" id="cathomem" style="background:white;  margin:auto; padding: 5px 0;  border-bottom: 1px solid #ddd; position: -webkit-sticky; position: sticky;  top:0px!important;width: 100%;  z-index: 1009;">
<div class="justify-content-center container-fluid  mx-auto" id="articlecatm"></div>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 <div class="modal-body mb-1"style="padding:0 1rem">

<div style="background:white; width:100%; max-width:400px; margin:auto;padding:0 15px; text-align:center">
<a  href="index"><img class="mplogo" src="assets/images/logo1.png" alt="logo" width="60%" class="img-fluid"></a></div>
<form id="msform" action="ajax/loginverify" method="POST">
<div class="row px-3">
        <input type="text" id="inputEmail" name="email" required="" autofocus="" placeholder="Enter Email address or Mobile number" class="form-control">
        <span class="text-danger"></span>
</div>
<br>
<div class="row px-3">
    <input type="password" id="inputPassword" name="password" placeholder="Enter Password" required class="form-control">
</div>
<div class="row" style="display:flex; margin:0.1rem 0 0.5rem 1rem">
    <div class="custom-control custom-checkbox custom-control-inline" style="text-align:left;">
        <input id="chk1" type="checkbox" name="rememberme" value="1" class="custom-control-input text-sm-start">
        <label  for="chk1" class="custom-control-label custom-control-inline">Remember me</label>
    <a class="custom-control-inline ml-auto mb-0" href="forgotpassword" style="cursor: pointer; float:right;text-align:right; text-decoration:none">Forgot Password?</a>    
	</div>
</div>
<div class="row mb-3 px-3">
    <button type="submit" name="submit" id="submit" class="btn btn-success text-center">Login</button>
</div>
<div class="mb-4 px-3 text-center">
    <h6 style="font-weight:bold">New User? <a class="text-success" href="signup.php" style="text-decoration:none">Create Account</a></h6>
</div>
<br>
</form>
	</div>
  </div>
</div>
</div>
<script type="text/javascript" src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
<script>
setInterval(function (){ 
  var d = new Date();
  var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var tz = d.toString().split("GMT")[1];
//console.log(tz);
var hours = d.getHours();
  var minutes = d.getMinutes();
  var ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var seconds = d.getSeconds();
  seconds = seconds < 10 ? '0'+seconds : seconds;
var date = d.getDate()+'-'+months[(d.getMonth())]+'-'+d.getFullYear()+'\xa0'+hours+':'+minutes+':'+seconds+' '+ampm;
//console.log(date);
document.getElementById('time').innerHTML = date;

}, 1000);



//$(window).on('load', function() {
	var sessionName = "<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}else{echo '';}?>";
	if(sessionName != ""){
		$('#login-btn, #reg-btn, #login-btnm, #reg-btnm').remove();
		$('#menu-list, #menu-listm').append('<li class="nav-item" >\
            <button type="button" class="login-btn" onclick="location.href=\'logout\'" style="border:none; font-weight:bold">Logout</a>\
            </li>');
	}
// });


</script>
<script>
$(document).ready(function() {
	//debugger
var url = window.location;
const allLinks = document.querySelectorAll('.nav-item a');
	 $('.nav-item').removeClass('active');
    const currentLink = [...allLinks].filter(e => {
    return e.href == url;
    });
	if (typeof currentLink[0] !== 'undefined') {
        if (currentLink[0].closest(".nav-link") !== null) {
            currentLink[0].classList.add("active");
            currentLink[1].classList.add("active");
            //currentLink[0].closest(".has-treeview").classList.add("active");
            //currentLink[0].closest(".has-treeview").classList.add("menu-open");
        }
    }
});
$(document).on('click', '#community', function(e){
		var sessionuser = "<?php if(isset($_SESSION['name'])){echo $_SESSION['userid'];}else{echo '';}?>";
		if(sessionuser == ""){
			e.preventDefault();
			$('#exampleModal').modal('show');
		}
});


var height=$("#h2").height()+11;
$("#cathome").css('top',height);
$(window).on('resize', function(){
	var height=$("#h2").height()+11;
	$("#cathome").css('top',height);

    });
    
	
$( document ).ajaxComplete(function() {	

$('#articlecatm').not('.slick-initialized').slick({
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 3,
		arrows: true,
		responsive: [
		{
		  breakpoint: 800,
		  settings: {
			slidesToShow: 4,
			slidesToScroll: 3,
			infinite: true,
		  }
		},
		{
		  breakpoint: 530,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
		  }
		},
		  {
		  breakpoint: 450,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2,
		  }
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	  ]
	});
});
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-W46G09S2YZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-W46G09S2YZ');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-91007158-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-91007158-1');
</script>