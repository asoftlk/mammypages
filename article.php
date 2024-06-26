<?php include "connect.php"; 
// **PREVENTING SESSION HIJACKING**
// Prevents javascript XSS attacks aimed to steal the session ID
ini_set('session.cookie_httponly', 1);

// **PREVENTING SESSION FIXATION**
// Session ID cannot be passed through URLs
ini_set('session.use_only_cookies', 1);

// Uses a secure connection (HTTPS) if possible
ini_set('session.cookie_secure', 1);

session_start();

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
?>
 
<html >
  <?php
  
  $metaquery=mysqli_query($conn, "SELECT * FROM posts WHERE posting_id= '$_GET[id]'");
  if(mysqli_num_rows($metaquery)>0){
      $metarow= mysqli_fetch_array($metaquery);
      $description=mb_substr(strip_tags($metarow['description']),0,250);
  $meta= '<head>
  <meta charset="utf-8">
  <title>'.$metarow["article_title"].'</title>
  <meta property="og:url" content="https://www.mammypages.com/article?id='.$metarow["posting_id"].'">
  <meta property="og:type"  content="article" />
    <meta property="og:title" content="'.$metarow["article_title"].'">
      <meta name="og:description" content="'.$description.'">

  <meta property="og:image" content="https://www.mammypages.com/admin/posts/'.$metarow["featured_image"].'">
  <meta name="description" content="'.$description.'">
  <meta name="keywords" content="'.$metarow["keywords"].'">';
  }

  ?>  
  
  <?php echo $meta; ?>
  <meta name="author" content="Mammypages">
  <link rel="icon" type="image/icon type" href="assets/images/favicon.ico" />
  <!--base href="/"-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
  <div class="col" >
      <div class="justify-content-between" style="text-align: center; padding: 2px;  font-size: 14px; display:flex">
        <div class="lang-select"  style="padding:10px 20px">
        <span style="color: #d485b8;"> READ IN :</span>
        <select id="languagem" style="padding: 0.2rem; border: 2px solid #5f45c9; border-radius: 0.2rem;">
          <option value="eng"><span type="button" class="active"> ENGLISH</span></option>
          <option value="sin"><span type="button"> සිංහල</span></option>
          <option value="tam"><span type="button"> தமிழ்</span></option>
      </select>
      
      </div>
      <div style="padding:10px 20px">
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

function fetch_cat(lang){
	//var lang = $('#language option:selected').val();
    //make the ajax call
    $.ajax({
        url: "ajax/language",
        data: {lang : lang},
		type: "POST",
        success: function(data) {
			//debugger;
            var json = $.parseJSON(data);
			for (var i=0;i<json.length;++i)
			{
				if(lang=='tam'){
				$('#articlecat, #articlecatm').append('<div class="text-center"  style="padding:0.3rem 0.8rem;"><form action="category" method="post"><input type="submit" href="#" class="text-ceter catinput" style="font-family: \'Mukta Malar\', sans-serif;text-decoration:none; border:none; background:none; font-size:14px; font-weight:600;  color:#747474;" value="'+json[i]+'" name="category"></form></div>');
				}
				else{
				$('#articlecat, #articlecatm').append('<div class="text-center"  style="padding:0.3rem 0.8rem;"><form action="category" method="post"><input type="submit" href="#" class="text-ceter catinput" style="text-decoration:none; border:none; background:none; font-size:14px; font-weight:600;  color:#747474;" value="'+json[i]+'" name="category"></form></div>');
				}
				$(document).on('mouseover', '.catinput', function(e) {
					$(this).css("color","#68cf68");
					// code from mouseover hover function goes here
				});

				$(document).on('mouseout', '.catinput', function(e) {
					$(this).css("color","#747474");
					 // code from mouseout hover function goes here
				});
			} 
			//console.log(data);
        },
		error: function(data) {
			console.log(data);
		}
    });
}

$("#language, #languagem").on('change', function() {
	var selectedid = "#"+$(this).attr('id');
	$('#articlecatm').slick('unslick'); 
	$('#articlecat, #articlecatm').children().remove();
	var lang = $(selectedid+' option:selected').val();
	localStorage.setItem('lang', lang);
	var newlang = localStorage.getItem('lang');
    fetch_cat(lang);
});

$(window).on('load', function() {
		// get the text
	$('#articlecat').children().remove();
	var newlang = localStorage.getItem('lang');
	if(newlang != null){
		//debugger
		$("#language option[value='"+newlang+"']").attr("selected","selected");
		$("#languagem option[value='"+newlang+"']").attr("selected","selected");
		fetch_cat(newlang);
	}
	else{
		var lang = $('#language option:selected').val();
		fetch_cat(lang);
	}
	var sessionName = "<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}else{echo '';}?>";
	if(sessionName != ""){
		$('#login-btn, #reg-btn, #login-btnm, #reg-btnm').remove();
		$('#menu-list, #menu-listm').append('<li class="nav-item" >\
            <button type="button" class="login-btn" onclick="location.href=\'logout\'" style="border:none; font-weight:bold">Logout</a>\
            </li>');
	}

});


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



<style>
body.swal2-shown > [aria-hidden="true"] {
  filter: blur(5px);
}

body  {
  transition: 0.1s filter linear;
}
#description img{
	max-width:100%;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.8/dist/sweetalert2.all.min.js"></script>
<?php
ob_start();
mysqli_set_charset($conn,"utf8mb4"); 
$user_ip=$_SERVER['REMOTE_ADDR'];
$id = isset($_GET['id'])? $_GET['id'] : null;
$check_ip = mysqli_query($conn, "select ipaddress from visitors where  ipaddress='$user_ip'");
$ipcount = mysqli_num_rows($check_ip);
if(isset($_SESSION['userid'])){$userid=$_SESSION['userid']; }else{echo $userid=""; }
if(isset($_SESSION['name'])){
	$checkview = mysqli_query($conn, "select * from visitors where session = '$userid' and articleid = '$id'");
	$rows=mysqli_num_rows($checkview);
	if(!($rows>0)){
	    $checkarticle = mysqli_query($conn, "select * from visitors where  ipaddress='$user_ip' and articleid = '$id'");
		if(!(mysqli_num_rows($checkarticle))>0){
		$insertview = mysqli_query($conn, "Insert into visitors (ipaddress, session, articleid) 
		VALUES ('$user_ip', '$userid', '$id')");
			$updateview = mysqli_query($conn, "update posts set view_count = view_count+1 where posting_id='$id' ");
		}
	}
  }
  elseif(isset($_SESSION['admin_userid'])){
      
  }
else
  {
	$articleid = mysqli_query($conn, "SELECT * FROM visitors where articleid='$id' and ipaddress='$user_ip'");
	$articlecount = mysqli_query($conn, "SELECT * FROM visitors WHERE ipaddress ='$user_ip' ");
	if(!(mysqli_num_rows($articleid)>0) && (mysqli_num_rows($articlecount)<=10)){
    $insertview = mysqli_query($conn, "insert into visitors (ipaddress, articleid) values('$user_ip','$id')");
	$updateview = mysqli_query($conn, "update posts set view_count = view_count+1 where posting_id='$id' ");
	}
  }
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
<style>
.rating{
    position: relative;
    top: -2.5rem;
    right: -1.5rem;
    padding: 0px 6px 1px 6px;
    background-color: #2D87CB;
    color: white;
    font-family: arial;
    font-weight: bold;
    font-size: 0.8rem;
    border-radius: 1rem;
}
.counter{
    position: relative;
    top: -6px;
    right: 12px;
    padding: 0px 6px 1px 6px;
    background-color: #28a745;
    color: white;
    font-family: arial;
    font-weight: bold;
    font-size: 0.7rem;
    height: 1.1rem;
    border-radius: 50%;
}
.spantext, .favourite, .favourite1{
	font-size: small;
    font-weight: 700;
    height: 1rem;
    margin: 0.3rem 0.5rem 0 -0.5rem;
}
.dropdown-menu{
	transform: translate3d(24px, -58px, 0px)!important;
	bottom:0!important;
	top:4px!important;
	padding:unset;
	height:40px;
}
.dropdown-item{
padding: .25rem 0.2em;
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
    border-color: rgba(255,255,255,1) transparent transparent transparent;
    z-index: 9999;
}

.emojis{
	transition: transform .2s;
}
.emojis:hover{
	-webkit-transform : rotate(2deg) scale(1.2); /* Chrome, Opera 15+, Safari 3.1+ */
    -ms-transform     : rotate(2deg) scale(1.2); /* IE 9 */
    transform         : rotate(2deg) scale(1.2); 
}

textarea::-webkit-scrollbar {
  width: 12px;
  background-color: #f1f1f1; }

textarea::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #909090; 
  }
.commentdata .more-text {
  display: none;
}
#description iframe{
    max-width:100%;
    min-height:240px;
}
@media only screen 
and (max-width : 990px){
	#description iframe{
    max-width:100%;
    height:auto;
    }  
}
</style>
<div class="container-fluid" id="swal-hide">
<div class="row">
<div class="col-md-8"  style="padding-right:0.5rem; border-right:1px solid #ddd; background-color:#fff">
<div id="download">
<?php $article =mysqli_query($conn, "SELECT * FROM posts WHERE posting_id= '$_GET[id]'");
if(mysqli_num_rows($article)<1){
	 
	header('Location: index');
}
	  $row=mysqli_fetch_array($article);
	  
	 
echo '<div  class="" style="padding:0.3rem 0; margin-top:0.5rem; margin-right:0.5rem max-height:150px"><a href="https://mammymart.com" target="_blank"><img src="assets/images/MammyMart-Ad.png" class="img-fluid" style="max-height:150px;width:100%"></a>
</div>';
echo '<div calss="printarea" style="float:right"><i class="bi bi-printer-fill" onclick="printDiv()" id="print" style="margin-left:auto; cursor:pointer;  font-style:normal; color:#E69B41; font-weight:bold; padding:0 0.5rem">&nbsp;Print</i> <i class="bi bi-info-circle-fill" style="color:#E69B41; cursor:pointer; font-style:normal; font-weight:bold; padding:0 0.5rem">&nbsp;Report</i></div><div class="printarea"><h3 id="arttitle" style="padding:0.5rem 0">'.$row["article_title"].'</h3></div>';	
echo '<div calss="printarea" ><div class="d-flex" style="border-bottom:1px solid #ddd"><i class="bi bi-clock"></i>&nbsp&nbsp<p style="font-size:smaller">'.time_elapsed_string($row["pub_datetime"], $full=false).'</p><i class="bi bi-tags-fill" style="margin-left:auto; color:#398BDC; font-weight:bold; padding:0 1rem">&nbsp;'.$row["keywords"].'</i></div></div>';
echo '<div calss="printarea" ><div class="d-flex" style="border-bottom:1px solid #ddd;flex-flow: wrap">
				<p style="border-left:12px solid #68cf68; margin:-1px"></p>
				<h6 style="padding-left:0.5rem; margin:1rem 0.5rem;"><strong>'.$row['view_count'].'<br>Views</strong></h6>
               <a href ="https://www.facebook.com/sharer/sharer.php?u=https://www.mammypages.com/article?id='.$row["posting_id"].'" target="_blank"><img src="assets/images/Facebook.png" alt="facebook" class="img-fluid"; style="height:40px; width:40px; margin:1rem 0.25rem; border-radius:50%"></a>
               <a href = "https://twitter.com/intent/tweet?url=https://www.mammypages.com/article?id='.$row["posting_id"].'" target="_blank"><img src="assets/images/Twitter.png" alt="twitter" class="img-fluid" style="height:40px; width:40px; margin:1rem 0.25rem;border-radius:50%"></a>               
			   <a href ="https://www.instagram.com/?url=https://www.mammypages.com/article?id='.$row["posting_id"].'" target="_blank"><img src="assets/images/Insta.png" alt="instagram" class="img-fluid" style="height:40px; width:40px; margin:1rem 0.25rem;border-radius:50%"></a>
               <a href="https://api.whatsapp.com/send?text=https://www.mammypages.com/article?id='.$row["posting_id"].'"><img src="assets/images/Whatsapp.png" alt="whatsapp" class="simg-fluid" style="height:40px; width:40px; margin:1rem 0.25rem;border-radius:50%"></a>
               <a href="https://telegram.me/share/url?url=https://www.mammypages.com/article?id='.$row["posting_id"].'"><img src="assets/images/telegram.png" alt="whatsapp" class="simg-fluid" style="height:40px; width:40px; margin:1rem 0.25rem;border-radius:50%"></a>
		<div style="margin-top: auto;margin-bottom: auto;  margin-left: auto;"><a href="https://www.mammymart.com" target="_blank"><img src="assets/images/H-K-Logo-ad.png" style="height:40px;"></a></div>
		<p style="background-color:#68cf68; color:white; margin:-1px; writing-mode: tb-rl; transform: rotate(-180deg);font-size: 8px;font-weight: 300;padding: 3px;">ADVERTISEMENT</p>
		</div></div>';
echo '<div class="printarea text-center"><img src="admin/posts/'.$row["featured_image"].'" class="img-fluid" style="border-radius:1.5rem; padding:1rem; min-width:85%; max-height:300px"></div>';
echo '<div class="printarea" style="padding: 1rem 1rem 0rem 0">
        
        <div id="description" style="hyphens:auto;word-wrap:break-word;">'.$row['description'].'</div>
     </div>';
$user= mysqli_query($conn, "SELECT profile_image, first_name FROM users_reg WHERE email = '$row[posted_by]'");
$count = mysqli_num_rows($user);
if($count>0){
$row1=mysqli_fetch_array($user);
if($row1){
    //<img src="assets/images/MP-comment-icon.png" alt="msg-img" class="img-fluid" style="max-width:4rem; max-height:3rem; border-radius:0.3rem;">
echo '<div class="printarea"><div class="d-flex">
<p class="" style="padding:0 0.5rem; margin-right:2rem; font-size:small; font-style:normal"><span style="font-size:smaller">Published by</span><br>';
if ($row1["first_name"]) {echo '.$row1["first_name"].';}else{echo 'mammypages';}
echo '</p></div></div>';
}
}
else{
echo '<br  style="clear:both"><div class="printarea"><div class="d-flex"><img src="assets/images/MP-Favi.png" alt="msg-img" class="img-fluid" style="max-width:4rem; max-height:3rem; border-radius:0.3rem;"><p class="" style="padding:0 0.5rem; margin-right:2rem; font-size:small; font-style:normal"><span style="font-size:smaller">Published by</span><br>Mammypages</p></div></div>';
}
echo '<br style="clear:both"><div><div class="d-flex" style="background-color:#eae8e663;border-radius:10px; flex-wrap: wrap; padding:1rem 2rem; font-size:1.5rem">';
    $likes= mysqli_query($conn, "SELECT count(*) as totallikes FROM visitors WHERE articleid='$row[posting_id]' AND liked='1'");
						$likesrow=mysqli_fetch_array($likes);
						$output="";
						if(!isset($_SESSION['name'])){
						$output .=	'<i class="bi bi-heart"  value="'.$row["posting_id"].'" style="color:#68cf68"></i><span id="count" class="counter" style="margin: -0.25rem 0.25rem 0 0.25rem;">'.$likesrow["totallikes"].'</span><span class="spantext">LOVE</span>';
						}
						else{
							$liked =mysqli_query($conn, "SELECT liked FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$id'");
							if(mysqli_num_rows($liked)>0){
								$likedrow=mysqli_fetch_array($liked);
								if($likedrow['liked']==0){
									$output .=	'<i class="bi bi-heart" value="'.$row["posting_id"].'" style="color:#68cf68"></i><span id="count" class="counter" style="margin: -0.25rem 0.25rem 0 0.25rem;">'.$likesrow["totallikes"].'</span><span class="spantext">LOVE</span>';
								}
								else{
									$output .=	'<i class="bi bi-heart-fill" value="'.$row["posting_id"].'"  style="color:#68cf68"></i><span id="count" class="counter" style="margin: -0.25rem 0.25rem 0 0.25rem;">'.$likesrow["totallikes"].'</span><span class="spantext">LOVE</span>';
								}
							}
							else{
								$output .=	'<i class="bi bi-heart" value="'.$row["posting_id"].'" style="color:#68cf68"></i><span id="count" class="counter" style="margin: -0.25rem 0.25rem 0 0.25rem;">'.$likesrow["totallikes"].'</span><span class="spantext">LOVE</span>';
							}
						}
						$output .=	'<div class="dropup d-flex header-settings"> 
							<a href="#" class="nav-link" data-toggle="dropdown" style="padding:0 0.5rem; display:flex; text-decoration:none; color:black"><i class="bi bi-share"  style="font-size:x-large; color:#68cf68"></i><span class="spantext" style=" margin-left:0.5rem; color: #383737;">&nbsp;SHARE</span> </a> 
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="" > 
								<div class="d-flex" >
								    <a class="dropdown-item d-flex"  href="#"><img src="assets/images/MP-Favi.png" style="width:32px; height:30px;"></a>
									<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://www.facebook.com/sharer/sharer.php?u=https://www.mammypages.com/article?id='.$row["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/Facebook.png" style="width:32px; height:30px;"></a> 
									<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://twitter.com/intent/tweet?url=https://www.mammypages.com/article?id='.$row["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;"href=""><img src="assets/images/Twitter.png" style="width:32px; height:30px;"></a> 
									<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://www.linkedin.com/shareArticle?mini=true&url=https://www.mammypages.com/article?id%3D'.$row["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/linkedin.png" style="width:32px; height:30px;"></a> 
									<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://telegram.me/share/url?url=https://www.mammypages.com/article?id='.$row["posting_id"].'&text='.$row["article_title"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/telegram.png" style="width:32px; height:30px;"></a> 
									<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://api.whatsapp.com/send?text=https://www.mammypages.com/article?id='.$row["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/Whatsapp.png" style="width:32px; height:30px;"></a> 
								</div>
							</div> 
							</div>';
							
						//$favourite= mysqli_query($conn, "SELECT count(*) as totalfav FROM visitors WHERE articleid='$row[posting_id]' AND favourite='1'");
						//$favouriterow=mysqli_fetch_array($favourite);
						if(!isset($_SESSION['name'])){
						$output .=	'<i class="bi bi-star"  value="'.$row["posting_id"].'" style="color:#68cf68;"></i><span id="count" class="favourite align-middle" style="margin-left:0.5rem;color: #383737;">FAVOURITE</span>';
						}
						else{
							$favourites =mysqli_query($conn, "SELECT favourite FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$row[posting_id]'");
							if(mysqli_num_rows($favourites)>0){
								$favouritesrow=mysqli_fetch_array($favourites);
								if($favouritesrow['favourite']==0){
									$output .=	'<i class="bi bi-star" value="'.$row["posting_id"].'" style="color:#68cf68"></i><span id="count" class="favourite align-middle" style="margin-left:0.5rem;color: #383737;">FAVOURITE</span>';
								}
								else{
									$output .=	'<i class="bi bi-star-fill" value="'.$row["posting_id"].'"  style="color:#68cf68"></i><span id="count" class="favourite1 align-middle" style="margin-left:0.5rem;color: #383737;">ADDED</span>';
								}
							}
							else{
								$output .=	'<i class="bi bi-star" value="'.$row["posting_id"].'" style="color:#68cf68"></i><span id="count" class="favourite align-middle" style="margin-left:0.5rem;color: #383737;">FAVOURITE</span>';
							}
						}
						$galquery= mysqli_query($conn, "SELECT image_name FROM post_images WHERE posting_id= '$id' and image_name!=''");
						if(mysqli_num_rows($galquery)>0){
						$output .=	'<label style="margin-left:auto;cursor:pointer" class="galleryicon"><i class="bi bi-image" style="color:#68cf68" ></i><span class="spantext" style="margin-left:0.5rem;color: #383737;">VIEW GALLERY</span></label>';	
						}
   echo $output.'</div><!--i class="bi bi-heart-fill" style="color:#68cf68; font-size:2rem; color:linear-gradient(90deg, #9174a0 50%, #c987b7 100%)"></i>&nbsp;<p style="margin:-0.25rem 0 2rem 0"></p><i class="icofont-share-alt p-4" style="font-size:2rem"></i--></div>';
echo '<br  style="clear:both"><div class="row"><h4 class="text-center">SOME INTERESTED PRODUCTS YOU MAY LIKE</h4>';
for ($i=1; $i<5; $i++){
	$item = "product".$i;
$product = mysqli_query($conn, "SELECT * FROM products Where productid = '$row[$item]'");
$productdetails = mysqli_fetch_array($product);
	if($productdetails){
	echo	'<div class="col-lg-3 col-md-4 col-sm-4 col-6" style="margin:0.25rem 0rem">
		<a href="'.$productdetails["producturl"].'" target="_blank" style="text-decoration:none">
		<div class="card p-0" style="width: 10rem; ">
		  <img class="card-img-top" src="products/'.$productdetails["productimage"].'"  alt="Card image cap" style="width: 100%; height: 12rem; object-fit: fill;">
		  <div class="card-body p-0">
			<p class="card-text font-weight-bold" style="overflow:hidden; text-overflow:ellipsis; text-align:center; height:2.6rem; font-size:smaller; color:#000; background-color:#E0E0E0;margin:0; padding:0.25rem">'.$productdetails["Productname"].'</p>
			</div></div></div></a>';

	}}
		echo '</div>
		<div class="d-flex" style="margin-top:1rem">';
		$rated = mysqli_query($conn, "SELECT rating FROM visitors WHERE articleid='$id' AND session= '$userid' AND rating!='0'");
		$ratingcount = mysqli_query($conn, "SELECT count(*) as totalrating FROM visitors WHERE articleid='$id' AND rating!='0'");
			$totalratings=mysqli_fetch_array($ratingcount);
			$ratings=$totalratings['totalrating'];
			$overallrating= array();
			for($i=1;$i<=6;$i++){
				$eachcount = mysqli_query($conn, "SELECT count(*) as eachrating FROM visitors WHERE articleid='$id' AND rating='$i'");
				$eachratings=mysqli_fetch_array($eachcount);
				$eachratings=$eachratings['eachrating'];
				($ratings>0)?array_push($overallrating, ($eachratings/$ratings)*100):array_push($overallrating,0);
			}
		$ratedvalue= mysqli_fetch_array($rated);
		if(mysqli_num_rows($rated)>0){
		if($ratedvalues = $ratedvalue['rating']){
			echo '<p style="font-weight:700" id="rated">Thank You For Voting! </p><span id="ratedcount" style="display:inline-table; height:1rem; background-color: #2D87CB;  color: white; font-family: arial; font-weight: bold; font-size: 0.8rem; border-radius: 1rem;padding: 0.1rem 0.5rem;margin-left:0.3rem">'.$ratings.' Vote</span></div>';
		}
		}
		else{
		echo '<p style="font-weight:700" id="rated">Rate the article </p><span id="ratedcount" style="display:inline-table; height:1rem;background-color: #2D87CB;  color: white; font-family: arial; font-weight: bold; font-size: 0.8rem; border-radius: 1rem;padding: 0.1rem 0.5rem;margin-left:0.3rem">'.$ratings.' Vote</span></div>';
		}
		echo '<div class="d-flex text-center" style="font-size:0.7rem; justify-content:space-around; flex-flow:wrap">
		<div class="p-1 emojis" id="emojid1" value="1" value1="'.$_GET["id"].'">
			<img src="assets/images/happy.svg" class="img-fluid"  style="height:50px; display:block; margin:0 auto -0.8rem auto"><span id="emoji1" class="rating" style="margin: -0.25rem 0.25rem 0 0.25rem;">'.$overallrating[0].'%</span>
			<p id="emojip1">HAPPY</p>
		</div>
		<div class="p-1 emojis" id="emojid2" value="2">
			<img src="assets/images/indifferent.svg" class="img-fluid" style="height:50px; display:block; margin:0 auto -0.8rem auto"><span id="emoji2" class="rating" style="margin: -0.25rem 0.25rem 0 0.25rem;">'.$overallrating[1].'%</span>
			<p id="emojip2">INDIFFERENT</p>
		</div>
		<div class="p-1 emojis" id="emojid3" value="3">
			<img src="assets/images/amused.svg" class="img-fluid"  style="height:50px; display:block; margin:0 auto -0.8rem auto"><span id="emoji3" class="rating" style="margin: -0.25rem 0.25rem 0 0.25rem;">'.$overallrating[2].'%</span>
			<p id="emojip3">AMMUSED</p>
		</div>
		<div class="p-1 emojis" id="emojid4" value="4">
			<img src="assets/images/excited.svg" class="img-fluid" style="height:50px; display:block; margin:0 auto -0.8rem auto"><span id="emoji4" class="rating" style="margin: -0.25rem 0.25rem 0 0.25rem;">'.$overallrating[3].'%</span>
			<p id="emojip4">EXICTED</p>
		</div>
		<div class="p-1 emojis" id="emojid5" value="5">
			<img src="assets/images/angry.svg" class="img-fluid"  style="height:50px; display:block; margin:0 auto -0.8rem auto"><span id="emoji5" class="rating" style="margin: -0.25rem 0.25rem 0 0.25rem;">'.$overallrating[4].'%</span>
			<p id="emojip5">ANGRY</p>
		</div>
		<div class="p-1 emojis" id="emojid6" value="6">
			<img src="assets/images/sad.svg" class="img-fluid" style="height:50px; display:block; margin:0 auto -0.8rem auto"><span id="emoji6" class="rating" style="margin: -0.25rem 0.25rem 0 0.25rem;">'.$overallrating[5].'%</span>
			<p id="emojip6">SAD</p>
		</div>
		</div>';
?>
</div>
<div>
<?php $commentquery = mysqli_query($conn, "SELECT articleid from comments WHERE articleid ='$row[posting_id]'");
$countrow = mysqli_num_rows($commentquery);
?>
<p style="padding:0 2rem; margin:0;font-size:small; font-weight:bold">Comments&nbsp;<span id="commentcount">(<?php echo $countrow;?>)</span></p>
<hr style="margin:0 2rem;">
<div id="commentspost" style="margin:0.5rem 2rem;">
<div class="row" style="text-align:end; flex-flow: wrap">
<div class="col-2 p-0">
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
<div class="col-10">
<form method="POST" action="ajax/comments" id="commentform">
<input type="hidden" name="articleid" value="<?php echo $id;?>">
<input type="hidden" name="email" value="<?php echo $userid;?>">
<textarea name="commentdata" style="width:100%; height:4rem; resize:none; border:1px solid #C7C7C7;padding:5px"></textarea>
<input type="submit" id="submitcomment" name="submitcomment" value="POST COMMENT" style="color:white;background-color:#68cf68; font-size:.8rem;float:right; border:none; padding:0.3rem; border-radius:0.5rem; margin:0.5rem">
</form>
</div>
</div>
</div>
<div id="commentslist" style="margin:0.5rem 3rem;">
<?php 
$fetch =mysqli_query($conn, "SELECT users_reg.email, users_reg.profile_image, users_reg.first_name, users_reg.last_name, comments.comment, comments.datetime, comments.articleid, comments.id FROM users_reg INNER JOIN comments ON users_reg.email=comments.userid WHERE comments.articleid='$id' ORDER BY comments.datetime DESC LIMIT 5");
$i=0;
$count =5;
$numrows=mysqli_num_rows($fetch);
while($commentsrow= mysqli_fetch_array($fetch)){
	echo '
		<div class="row" style="background: #ebebeb;  margin-left: 2.5rem;padding: 10px; border-radius: 10px; margin-bottom:5px">
			<div class="col-sm-1 p-0">
				<img src="images/'.$commentsrow["profile_image"].'" onerror="this.src=\'assets/images/child-img-1.jpg\'" style="border-radius: 50%; width: 3rem; height: 3rem; border:1px solid #C7C7C7">
			</div>
			<div class="col-sm-11">
			<div class="d-flex" style="justify-content: space-between; margin-bottom:0.1rem; flex-flow: wrap"><p style="text-align:left; font-size:.8rem; font-weight:bold; margin-bottom:0.1rem">'.$commentsrow['first_name'].' '.$commentsrow['last_name'].' | '.time_elapsed_string($commentsrow["datetime"], $full=false).'</p>';
		if($userid==$commentsrow["email"]){
			echo '<div class="d-flex" style="font-size:0.8rem; margin-bottom:0.1rem"><input type="button" id="edit'.$i.'" class="edit" style="border:none; background:transparent;" value="Edit">
			<p style="margin-bottom:0.1rem">&nbsp;|&nbsp;</p><input type="button" id="delete'.$i.'" class="delete" style="border:none; background:transparent; float:right;" value="Delete"></div>';
		}
	echo '</div><form method="POST" action="ajax/comments" id="commentform'.$i.'">
				<input type="hidden" name="articleid" value="'.$commentsrow["articleid"].'">
				<input type="hidden" name="email" value="'.$commentsrow["email"].'">
				<input type="hidden" name="id" id="id'.$i.'" value="'.$commentsrow["id"].'">
				<input type="hidden" name="editdelete" id="editdelete'.$i.'" value="">
				<p name="commentdata" id="commentdata'.$i.'" class="commentdata" style="width:100%; text-align:justify; font-size:0.9rem; border:none;" disabled="true">'.$commentsrow["comment"].'</p>
				<input type="hidden" id="submitcomment'.$i.'" name="submitcomment" value="" style="color:white;background-color:#68cf68; font-size:.8rem;float:right; border:none; padding:0.3rem; border-radius:0.5rem; margin:0.5rem">
			</form>
			</div>
			</div>';
	$i++;
}
if($numrows >=5){
	echo '<div id="load_data" style="margin:0"></div>
			<div id="remove_row" class="p-1" style="background-color:f4f4f4;border-radius: 5px; margin-left: 2.5rem;">  
			<button type="button" name="btn_more" data-vid="'.$count.'" id="btn_more" style="background:transparent; border:none">View more Comments</button>  
			<button type="hidden" name="btn_more" data-vid="'.$i.'" id="ivalue" style="background:transparent; border:none"></button>  
		</div>';
	}
?>
</div>
</div>
<div style="padding: 1rem 2rem 1rem 0; display:flex">
	<div class="row">
	<?php $noticelang = $row['language'];
	if($noticelang =='eng'){
	echo '<div class="col-2">
	<img src="assets/images/MP-NOTICE.png" class="img-fluid" style="max-height:120px;float:right">
	</div>
	<div class="col-10"><h5 style="color:red; font-weight:bold;text-decoration: underline;text-underline-position: under;text-decoration-color: #dddd; text-decoration-thickness: 3px;">Important!</h5>
	<p style="text-align:justify;color:#888686">mammypages.com is not a Doctor or a specialist and this site gives only general information\'s, therefore if you feel any sort of discomfort or illness please consult your Doctor immediately for assistance</p>
	</div>';
	}
	if($noticelang =='sin'){
	echo '<div class="col-2">
	<img src="assets/images/MP-NOTICE.png" class="img-fluid" style="max-height:120px;float:right">
	</div>
	<div class="col-10"><h5 style="color:red; font-weight:bold;text-decoration: underline;text-underline-position: under;text-decoration-color: #dddd; text-decoration-thickness: 3px;">අයිතිය අත්හැරීමේ ප්‍රකාශය</h5>
	<p style="text-align:justify;color:#888686">මමීපේජස් යනු වෛද්‍යවරයෙක් හෝ චිකිත්සකයෙක් නොවේ. මෙම වෙබ් අඩවියේ ඇති තොරතුරු සමාන්‍යය දැනගැනිම පිණිස මිස.එය විශේෂඥ වෛද්‍ය උපදෙස් නොවන බව කරුණාවෙන් සලකන්න මෙම වෙබ් අඩවියේ ඇති තොරතුරු රෝග විනිශ්චය කිරීම සදහා යෝදා නොගන්න ඔබට යම් රෝගයක් වැළදී ඇති බව දැනේ නම්, වහාම වෛද්‍යවරයෙකු හමුවන්න.. ස්තුතියි</p>
	</div>';
	}
	if($noticelang =='tam'){
	echo '<div class="col-2">
	<img src="assets/images/MP-NOTICE.png" class="img-fluid" style="max-height:150px;float:right">
	</div>
	<div class="col-10"><h5 style="color:red; font-weight:bold;text-decoration: underline;text-underline-position: under;text-decoration-color: #dddd; text-decoration-thickness: 3px;font-family: \'Mukta Malar\', sans-serif;">மருத்துவ நிபந்தனைகள்:</h5>
	<p style="text-align:justify;color:#888686;font-family: \'Mukta Malar\', sans-serif;">mammypages.com ஒரு மருத்துவ நிபுணரோ, ஒரு மருத்துவரோ அல்லது ஒரு MD யோ அல்ல. இந்த இணையத் தளத்தில் வழங்கப்படும் தகவல்கள் ஒரு பொதுவான மருத்துவ ஆலோசனைகளேயன்றி அதனை ஒரு நிபுணத்துவம் வாய்ந்த மருத்துவ ஆலோசனைகளுக்கான ஒரு மாற்றீடாகக் கருதக் கூடாது. இவ்விணையத் தளத்தில் கூறப்பட்டுள்ள விடயங்களை ஒரு மருத்துவ அல்லது ஆரோக்கிய நிலைமைகளுக்கான ஒரு சிகிச்சையாகவோ அல்லது நோய்களைக் கண்டறியுமொரு வழிமுறையாகவோ கருதக் கூடாது. உங்களுக்கு ஒரு நோய் ஏற்பட்டுள்ளது அல்லது ஏற்பட்டு இருக்கலாம் என நீங்கள் சந்தேகித்தால் உடனடியாக நீங்கள் உங்கள் மருத்துவரை நாடுதல் வேண்டும் </p>
	</div>';
	}
	?>
	</div>
</div>
</div>



<div class="col-md-4">
<div id="right-cont-part">
<h6 style="font-size: 16px; text-align: center;padding: 10px;background-color: #dddd;color: #A393BD;font-weight: 700; margin-top: 10px;">RELATED ARTICLES</h6>
<?php
$category_expand=explode(" ,", $row[category]);
 $relatedcat = "SELECT article_title, description, featured_image, posting_id FROM posts WHERE posting_id != '$_GET[id]' AND pub_datetime < NOW() AND ";
for($i=0; $i<count($category_expand); $i++)
{
    if($i==(count($category_expand)-1)){
       $relatedcat .= " category = '$category_expand[$i]' ";
    }
    else{
       $relatedcat .= " category = '$category_expand[$i]' OR  ";  
    }
}
$relatedcat .= " LIMIT 3";
$releatedquery= mysqli_query($conn, $relatedcat);
$lang = $row['language'];
$style= ($lang == 'tam')? 'font-family: \'Mukta Malar\', sans-serif;' : 'font-family: \'Montserrat\', sans-serif;';
while($releatedrow = mysqli_fetch_array($releatedquery)){
	$output1="";
	$description =strip_tags($releatedrow["description"]);
			if($releatedrow['posting_id']==$row['category']){
			}
			else{
				$output1 .= '<div class="row" style="border-bottom: 4px solid #f4f4f4 ;">
						<div class="col-3" style="padding:0.6rem 0.4rem; text-align:center">
						<a href="article?id='.$releatedrow["posting_id"].'"><img src="admin/posts/'.$releatedrow["featured_image"].'" class="img-fluid feaimg" style="border-radius:0.2rem; width:65px; height:65px; object-fit:cover; margin-left:0.8rem"></a>
					</div>
					<div class="col-9" style="padding:0.4rem 0.4rem; ">
						<div class="row"><div class="col-md-8" style="display:flex; justify-content: space-between;"><a href="article?id='.$releatedrow["posting_id"].'" style="text-decoration:none; color:#504e4e; font-weight:bold;max-height:1.5rem;overflow:hidden;text-overflow:ellipsis; white-space:nowrap;'.$style.'">'.$releatedrow["article_title"].'</a></div>
						<div class="col-md-4 d-flex" style="justify-content:flex-end"></div></div>
						<div class="descript" style="color:#b1afaf; height:2.8rem;margin-bottom:0.8rem;"><a href="article?id='.$releatedrow["posting_id"].'" style="text-decoration:none"><p style=" height:2.8rem;  color:#888686; overflow: hidden; text-overflow: ellipsis;'.$style.'">'.mb_substr($description,0,300).'</p></a></div>
					</div>
					</div>';
					echo $output1;
			}
}
?>
<div class="row">
<form action="category" method="post">
<button type="submit" class="text-ceter btn btn-lg btn-block" style="border: none; margin-top:10px;font-size: 16px; background-color: #68cf68; font-weight: 600; color: white;" value="<?php echo $category_expand[0];?>" name="category">GO TO CATEGORIES</button>
</form>
</div>
<br>
<a href="https://www.irisgarden.lk" target="_blank"><img src="assets/images/mammypages.com-rg-ad.jpeg" class="img-fluid"></a>
</div>
</div>
</div>
</div>


<div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="padding:0 1rem">
        <h5 class="modal-title" id="galleryModalLabel">Article Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 <div class="modal-body mb-1 p-0">
<?php
/*$galquery = mysqli_query($conn, "SELECT * FROM post_images WHERE posting_id= '$id'");
while($galrow=mysqli_fetch_array($galquery)){
	echo '<img src="admin/posts/'.$galrow["image_name"].'">';
}*/
?>
<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="admin/posts/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
				<?php
					$galquery = mysqli_query($conn, "SELECT * FROM post_images WHERE posting_id= '$id'");
					while($galrow=mysqli_fetch_array($galquery)){
						echo ' 
								<div>
								<img data-u="image" class="img-fluid" src="admin/posts/'.$galrow["image_name"].'">
								<img data-u="thumb" class="img-fluid" src="admin/posts/'.$galrow["image_name"].'"  width="190" height="90">
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

<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true" class="float-right p-3 fs-5" style="font-size:2rem">&times;</span>
    </button>
<div class="modal-body mb-1"style="padding:1rem 1rem">
    
<h5><?php echo $row["article_title"];?></h5>
<br>
<form id="reportform" action="ajax/reportarticle" method="POST">
<div class="row px-3 mb-1">
        <input type="hidden" name="reportid" value="<?php echo $_GET['id']; ?>">
        <input type="text" id="reportname" name="reportname" required="" autofocus="" placeholder="Enter Name" value="<?php echo $_SESSION[name];?>" class="form-control">
        <span class="text-danger"></span>
</div>
<div class="row px-3 mb-1">
    <input type="email" id="reportemail" name="reportemail" placeholder="Enter Email" value="<?php echo $_SESSION["userid"];?>" required class="form-control">
</div>
<div class="row px-3 mb-1">
    <textarea name="reporttext" class="form-control" id="reporttext" placeholder="Description" style="height:200px"></textarea>
</div>
<div class="row mt-3 px-3">
    <button type="submit" name="reportsubmit" id="reportsubmit" class="btn btn-success w-auto ml-auto">SEND REPORT</button>
</div>

<br>
</form>
	</div>
  </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.8/dist/sweetalert2.all.min.js"></script>

<script>
function printDiv() 
{
	var len =document.getElementsByClassName('printarea').length;
	var printContents = "";
	for(i=0;i<len; i++){
    printContents += document.getElementsByClassName('printarea')[i].innerHTML;
	}
	 var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;

}
function downloadpdf(){
    	var sessionuser = "<?php if(isset($_SESSION['name'])){echo $_SESSION['userid'];}else{echo '';}?>";
if(sessionuser != ""){
	var article = document.getElementById('download');

  html2pdf(article, {
  margin:       20,
  filename:     'mummypages_article.pdf',
  image:        { type: 'jpeg', quality: 0.98 },
  html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true },
  jsPDF:        { unit: 'pt', format: 'a4', orientation: 'portrait' }
});
}
else{
	  $('#exampleModal').modal('show');
  }
    
}

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
$(document).on('click', '.galleryicon', function(){
	$('#gallery').modal('show');
});

async function update_rating(email, articleid, value, rating){
	//var lang = $('#language option:selected').val();
    //make the ajax call
	
   let result = await $.ajax({
        url: "ajax/likeupdate",
        data: {email : email, articleid:articleid, value:value, rating:rating},
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

$(document).on('click', ".emojis", function(){
	var sessionuser = "<?php if(isset($_SESSION['name'])){echo $_SESSION['userid'];}else{echo '';}?>";
	if(sessionuser != ""){
		var value = $(this).attr('value');
		var element = $(this).attr('id');
		var element1 = element.charAt(element.length - 1);
		async function main() {
	  var status = await update_rating(sessionuser, '<?= $id ?>', value, 'rating')
		status = JSON.parse(status);
		if(status.status=='success'){
		for(var i =1; i<=6; i++){
			
		 $(element).animate({zoom: '102%', opacity:.5}, "slow", function(){
			 //$(this).toggleClass('bi-heart-fill bi-heart');
		 });
		 $(element).animate({zoom: '102%', opacity:1}, "slow");
		 $('#emoji'+i).text(status.text[i-1]+"%");
		 $('#emojip'+i).removeAttr('style');
		}
		$('#rated').text('Thank You For Voting! ');
		$('#ratedcount').text(status.ratings+' Vote');
		$('#emojip'+element1).css({'background-color': '#2D87CB', 'color': 'white', 'font-family': 'arial', 'font-weight': 'bold', 'border-radius':' 1rem','padding': '0.1rem 0.4rem'});
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
$(document).ready(function(){
	var rating= '<?= isset($ratedvalues)?$ratedvalues:0; ?>';
	$('#emojip'+rating).css({'background-color': '#2D87CB', 'color': 'white', 'font-family': 'arial', 'font-weight': 'bold', 'border-radius':' 1rem','padding': '0.1rem 0.4rem'});
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
  Swal.fire({
      text: data,
      icon: status,
      dangerMode: false,
    })
    .then(function(value) {
		if(status == 'success'){
		window.location.reload();
		}
		if(data == 'Please login to Comment to this post'){
			$('#exampleModal').modal('show');
		}
      //console.log('returned value:', value);
    });
}

function fetch_art(lang){
	//var lang = $('#language option:selected').val();
    //make the ajax call
    $('#article').empty();
    $.ajax({
        url: "ajax/articlefetch",
        data: {lang : lang},
		type: "POST",
        success: function(data) {
			//debugger;
         
				$('#article').append(data);
				//console.log(json[i]);
			
			//console.log(data);
        },
		error: function(data) {
		//	console.log(data);
		}
    });
}

$("#language").on('change', function() {
	$('#articlecat').children().remove();
	var lang = $('#language option:selected').val();
	localStorage.setItem('lang', lang);
	var newlang = localStorage.getItem('lang');
    fetch_art(lang);
});
$(window).on('load', function() {
    var newlang = localStorage.getItem('lang');
	if(newlang != null){
		//debugger
		$("#language option[value='"+newlang+"']").attr("selected","selected");
		fetch_art(newlang);
	}
	else{
		var lang = $('#language option:selected').val();
		fetch_art(lang);
	}
});
</script>
<script>
$(document).ready(function () { 
$("#submitcomment").click(function () { 
		var form = $("#commentform");
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
                        commentdata: {
                            required: true,
                        },
						
					},
                    messages: {
                        commentdata: {
                            required: "Comment cannot be empty",
                        },
						
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
});
$(document).on('click', '.edit', function () { 	var id=$(this).attr('id');
	var id1 = id.charAt(id.length - 1);
	var textdata= $('#commentdata'+id1).text();
	$('#commentdata'+id1).replaceWith('<textarea name="commentdata" id="commentdata'+id1+'" style="width:100%; text-align:left; font-size:0.9rem; height:4rem; resize:none; border:none; overflow:hidden;text-overflow: ellipsis;">'+textdata+'</textarea>');
	$('#commentdata'+id1).attr("style","width:100%; height:8rem; border:1px solid #C7C7C7");
	$('#submitcomment'+id1).attr("type","submit");
	$('#submitcomment'+id1).attr("value","Update");
	$('#editdelete'+id1).attr("value","edit");
	$("#submitcomment"+id1).click(function () { 
		var form = $("#commentform"+id1);
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
                        commentdata: {
                            required: true,
                        },
						
					},
                    messages: {
                        commentdata: {
                            commentdata: "Comment cannot be empty",
                        },
						
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

$(document).on('click', '.delete', function () { 
		var attrid=$(this).attr('id');
		var attrid1 = attrid.charAt(attrid.length - 1);
		var id= $("#id"+attrid1).attr('value');
	Swal.fire({
	  title: 'Are you sure?',
	  text: "You want to Delete comment",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	  if (result.isConfirmed) {
		$.ajax({
			type:'post',
			url: 'ajax/comments',
			mimeType: "multipart/form-data",
			data:{id : id, deleteid:"delete"},
			
			success:function(data){
				//debugger
				console.log(data);
				if(data=='Deleted Successfully'){
				Swal.fire(
				  'Deleted!',
				  'Your Comment has been deleted.',
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
</script>
<script>
$(document).ready(function() {
	var artlang = '<?php echo $row["language"]; ?>';
	if(artlang == 'tam'){
		$('#description [style*="font-family"]').css({'font-family':"'Mukta Malar', sans-serif", 'text-align':'justify'});
		$('#description  *').css({'font-family':"'Mukta Malar', sans-serif", 'text-align':'justify'});
		$("#arttitle").css('font-family', "'Mukta Malar', sans-serif");
		
	}
	else{
		$('#description [style*="font-family"]').css({'font-family':"'Montserrat', sans-serif", 'text-align':'justify'});
		$('#description  *').css({'font-family':"'Montserrat', sans-serif", 'text-align':'justify'});
		$("#arttitle").css('font-family', "'Montserrat', sans-serif");
	}
  function readMore() {
    var maxLength = 200;
    $(".commentdata").each(function() {
      var myStr = $(this).text();
      if ($.trim(myStr).length > maxLength) {
        var newStr = myStr.substring(0, maxLength);
        var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
        $(this).empty().html(newStr);
        $(this).append('<a href="javascript:void(0);" class="read-more" style="text-decoration:none; color:#5f46c6; float:right; margin-bottom:0.5rem">Read more</a>');
        $(this).append('<span class="more-text">' + removedStr + ' <a href="javascript:void(0);" class="read-less" style="text-decoration:none; margin-bottom:0.5rem; float:right; color:#5f46c6">Read less</a>' + '</span>');
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
});
$(document).ready(function(){  
  $(document).on('click', '#btn_more', function(){  
	   var count = $(this).data("vid");  
	   var i = $(this).next().data("vid");  
	   $('#btn_more').html("Loading...");  
	   $.ajax({  
			url:"ajax/commentslist",  
			method:"POST",  
			data:{count:count, type:"morecomments", i:i, articleid:"<?php echo $id; ?>"},  
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

 $('#description:empty').children().remove();
 

</script>
<script>
function modalopen(){

}

$("#exampleModal").on("hidden.bs.modal", function () {
    window.location.href="index";
});
var numview = '<?php echo $ipcount; ?>';
var sessionuser = "<?php if(isset($_SESSION['name'])){echo $_SESSION['userid'];}else{echo '';}?>";
var sessionexists = "<?php if(isset($_SESSION['admin_userid'])){echo $_SESSION['admin_userid'];}else{echo '';}?>";
    if((numview >=100) && (sessionuser =='') && (sessionexists=='')){
        $('#swal-hide').remove();
Swal.fire({
      text: "Please login to View more articles",
      icon: "error",

    })
    .then(function(value) {
           $('#exampleModal').modal('show');
    });
    }
var height=$("#h2").height()+$("#cathome").height()+60;
$("#right-cont-part").css({'position':'sticky','top':height});
/*$(document).prop('title', '<?php echo $row["article_title"]?>');
$('meta[property="og:site_name"]').attr('content', '<?php echo $row["article_title"]?>');
$('meta[property="og:url"]').attr('content', 'https://www.mammypages.com/article?id='+'<?php echo $row["posting_id"]?>');
$('meta[property="og:image"]').attr('content', 'https://www.mammypages.com/admin/posts/'+'<?php echo $row["featured_image"]?>');
$('meta[name="keywords"]').attr('content', '<?php echo $row["featured_image"]?>');*/


$(document).on('click', '.bi-info-circle-fill', function(){
 var sessionuser = "<?php if(isset($_SESSION['name'])){echo $_SESSION['userid'];}else{echo '';}?>";
 if(sessionuser==""){
     $('#exampleModal').modal('show');
 }
 else{
     $('#reportModal').modal('show');
 }
})
</script>