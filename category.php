<?php
ob_start();
include "header.php";
header ('Content-Type: text/html; charset=utf-8');
mysqli_set_charset($conn,'utf8');
if(isset($_POST['category'])){
$_SESSION['category']= mysqli_real_escape_string($conn, $_POST['category']);
echo '<script>localStorage.setItem("category", "'.$_POST["category"].'")</script>';
}
$category=$_SESSION['category'];
//header('Location: category.php');
define('DB_CHARSET', 'utf8mb4_unicode_ci');
function RemoveBS($Str) {  
  $StrArr = str_split($Str); $NewStr = '';
  foreach ($StrArr as $Char) {    
    $CharNo = ord($Char);
    if ($CharNo == 163) { $NewStr .= $Char; continue; } // keep £ 
    if ($CharNo == 163) { $NewStr .= $Char; continue; } // keep £ 
    if ($CharNo > 31 && $CharNo < 127) {
      $NewStr .= $Char;    
    }
  }  
  return $NewStr;
}
$find = array("â€˜", "â€™", "â€œ", "â€");
$replace = array("‘", "’", "“", "”");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8_unicode_ci">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
body{
    background-color: #f4f4f4 !important;
}


.card-img-top {
    width: 100%;
    height: 7rem;
}
.dropdown-menu{
	transform: translate3d(24px, -58px, 0px)!important;
	bottom:0!important;
	top:8px!important;
	left:-32px!important;
	padding:unset;
	height:40px;
}
.dropdown-item{
padding: .25rem 0.15rem;
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
.heading {
  position: relative;
  line-height: 1.2em;
  padding:1rem 0 0 1rem; 
  color:#464444;
  font-weight:bold;
}
.heading:before {
    position: absolute;
    left: 16px;
    top: 2.1em;
    height: 0;
    width: 50px;
    content: '';
    border-top: 4px solid #0AD69E;
    border-radius: 1em;
}
body{
	background:#fff;
}
#title-list li {
    padding: 10px;
    background: #fff;
    border-bottom: #bbb9b9 1px solid;
}
#suggesstion-box{
    display:none;
    z-index:4;
    width:94%;
    max-height: 250px;
    overflow-y: scroll;
    border: 2px solid #28a745;
    border-radius: 3px;
}
#suggesstion-box::-webkit-scrollbar {
    width: 10px;
}
 
#suggesstion-box::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}
 
#suggesstion-box::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background: #c1c1c1; 
}
</style>
<div class="container" style="margin-top:1rem;">

<div class="row" style="margin:0 6px">
<h5 class="heading col-sm-8 col-md-8"><?php echo $category ?></h5>
<div class="position-relative col-sm-4 col-md-4">
<form action="" method="POST">
    <input class="form-control ml-auto" type="search" name="searchArticle" id="searchArticle" placeholder="Search Article..." aria-label="Search">
	<!--button class="btn btn-success form-control p-2" type="submit" ><i class="bi bi-search"></i></button-->
</form>
<div id="suggesstion-box" class="position-absolute" style="" ></div>
</div>
</div>
<ul id="searchResult"></ul>
<div class="row" id="postList">
<?php 
$article=mysqli_query($conn, "SELECT * FROM posts WHERE category LIKE '"."%".$category."%"."' AND pub_datetime < NOW() ORDER BY id DESC LIMIT 12");
while($row=mysqli_fetch_array($article)){
	$postID = $row['id'];
	$lang = $row['language'];
	$style= ($lang == 'tam')? 'font-family: \'Mukta Malar\', sans-serif;' : 'font-family: \'Public_Sans\', sans-serif;';
	$pubdate=strtotime($row['pub_datetime']);
	$date = date('d M Y', $pubdate);
	$description1=mb_substr(strip_tags($row["description"]),0,300);
	$description= str_replace($find, $replace, $description1);
	echo '<div class="col-lg-3 col-md-4 col-sm-6"  style="margin-bottom:1rem"><a href="article?id='.$row["posting_id"].'" id="'.$row["posting_id"].'" style="text-decoration:none;color:black"><div class="shadow card p-0" style="min-width:14rem; max-width: 16rem; height:16rem; margin:0.5rem 1rem">
  <img class="card-img-top" src="admin/posts/'.$row["featured_image"].'" class="img-fluid" alt="Card image cap"></a>
  <div class="card-body p-0">';
	$output="";
	if(!isset($_SESSION['name'])){
		
	$output .=	'<i class="bi bi-star p-1"  value="'.$row["posting_id"].'" style="color:#68cf68; float:right; font-size:1rem; cursor:pointer"></i>';
	}
	else{
		$favourites =mysqli_query($conn, "SELECT favourite FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$row[posting_id]'");
		if(mysqli_num_rows($favourites)>0){
			$favouritesrow=mysqli_fetch_array($favourites);
			if($favouritesrow['favourite']==0){
				$output .=	'<i class="bi bi-star p-1" value="'.$row["posting_id"].'" style="color:#68cf68; float:right; font-size:1rem; cursor:pointer"></i>';
			}
			else{
				$output .=	'<i class="bi bi-star-fill p-1" value="'.$row["posting_id"].'"  style="color:#68cf68; float:right; font-size:1rem; cursor:pointer"></i>';
			}
		}
		else{
			$output .=	'<i class="bi bi-star p-1" value="'.$row["posting_id"].'" style="color:#68cf68; float:right; font-size:1rem; cursor:pointer"></i>';
		}
	}	
  
    $output .='<a href="article?id='.$row["posting_id"].'" style="text-decoration:none;color:#888686"><h6 class="card-title font-weight-bold p-2" style="max-height:1.6rem;overflow:hidden;text-overflow:ellipsis; white-space:nowrap;color:#504e4e;font-size:16px;font-weight:500!important;'.$style.'">'.$row["article_title"].'</h6></a>
	<div>
	<p class="card-text p-2" style="font-weight:300;font-family: Open Sans, sans-serif; font-size:13px; text-align:justify; line-height: 18px; height: 3.8rem; overflow: hidden; color:#888686; text-overflow: ellipsis;'.$style.'"><a href="article?id='.$row["posting_id"].'" style="text-decoration:none;color:#888686">'.$description.'</a></p><div class="d-flex" style="background-color:#F4F4F4; padding:.5rem">';
	$likes= mysqli_query($conn, "SELECT count(*) as totallikes FROM visitors WHERE articleid='$row[posting_id]' AND liked='1'");
	$likesrow=mysqli_fetch_array($likes);
	if(!isset($_SESSION['name'])){
		$output .=	'<i class="bi bi-heart"  value="'.$row["posting_id"].'" style="color:#68cf68; cursor:pointer"></i><span id="count" class="align-middle" style="margin: -0.2rem 0.25rem 0 0.25rem; font-weight:500; font-size:1rem">'.$likesrow["totallikes"].'</span>';
	}
	else{
		$liked =mysqli_query($conn, "SELECT liked FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$row[posting_id]'");
		if(mysqli_num_rows($liked)>0){
			$likedrow=mysqli_fetch_array($liked);
			if($likedrow['liked']==0){
				$output .=	'<i class="bi bi-heart" value="'.$row["posting_id"].'" style="color:#68cf68; cursor:pointer"></i><span id="count" class="align-middle" style="margin: -0.2rem 0.25rem 0 0.25rem;; font-weight:500; font-size:1rem">'.$likesrow["totallikes"].'</span>';
			}
			else{
				$output .=	'<i class="bi bi-heart-fill" value="'.$row["posting_id"].'"  style="color:#68cf68; cursor:pointer"></i><span id="count" class="align-middle" style="margin: -0.2rem 0.25rem 0 0.25rem;; font-weight:500; font-size:1rem">'.$likesrow["totallikes"].'</span>';
			}
		}
		else{
			$output .=	'<i class="bi bi-heart" value="'.$row["posting_id"].'" style="color:#68cf68; cursor:pointer"></i><span id="count" class="align-middle" style="margin: -0.15rem 0.2rem 0 0.25rem;; font-weight:500; font-size:1rem">'.$likesrow["totallikes"].'</span>';
		}
	}
	$output .=	'<div class="dropup d-flex header-settings"> 
					<a href="#" class="nav-link" data-toggle="dropdown" style="padding:0 0.5rem; display:flex; text-decoration:none; color:black"><i class="bi bi-share-fill"  style=" color:#68cf68;"></i></a> 
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
				</div>
				<div style="margin-left:auto;display:flex">
				<p class="align-middle" style="margin: 0.01rem 0.01rem 0 0.25rem;; font-weight:300; font-size:0.8rem">'.$row["view_count"].' Views</p>
				<p class="align-middle" style="margin: 0.01rem 0.01rem 0 0.4rem;; font-weight:300; font-size:0.8rem">'.trim($date).'</p></div>';
	echo $output.'
	</div>
	</div>
  </div>
</div>
</div>';
}?>
<div class="load-more text-center" lastID="<?php echo $postID; ?>" style="display:none">
        <!--img src="loading.gif"/-->
        <div class="spinner-border text-success" role="status">
          <span class="sr-only">Loading...</span>
        </div>
</div>

</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState(null, null, window.location.href );
    }
</script>
<script>
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

$(document).on('click', ".bi-star", function(){
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
$(document).on('click', ".bi-star-fill", function(){
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
		window.location.reload();
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
	if(lang=='tam'){$('.heading').css({'font-family': '\'Mukta Malar\', sans-serif;'})}
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
		localStorage.setItem('lang',lang);
		if(lang=='tam'){$('.heading').css({'font-family': '\'Mukta Malar\', sans-serif;'})}
		fetch_art(lang);
	}
});
$(document).ajaxComplete(function(){
    $("input[value='<?php echo $category ?>']").removeClass("catinput");
	$("input[value='<?php echo $category ?>']").css({'color':'#68cf68'});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $(window).scroll(function scrollHandler(){
        var lastID = $('.load-more').attr('lastID');
        if(((window.innerHeight + window.scrollY) >= document.body.offsetHeight) && (lastID != 0)){
        $(window).off("scroll", scrollHandler);
        return    $.ajax({
                url: "ajax/loadcategory",
				data: {id : lastID, category : '<?php echo $category ?>'},
				type: "POST",
                beforeSend:function(){
                    $('.load-more').show();
                },
                success:function(html){
                    $('.load-more').remove();
                    $('#postList').append(html);
                    $(window).scroll(scrollHandler);
                }
            });
        }
    });

    
    $('#searchArticle').keyup(function(){
      var query = $('#searchArticle').val();
	  if(query.length >= 1){
        load_data(($('#searchArticle').val()));
	  }
	  if(query.length == 0){
	      $("#suggesstion-box").hide();
	  }
	  function load_data(value)
		{
		  $.ajax({
			url:"ajax/loadcategory",
			method:"POST",
			data:{search:"search", value:value, lang:localStorage.getItem('lang')},
			success:function(data)
			{
			
			/*  var json =  JSON.parse(data);	
			  var len = json.length;
                    $("#searchArticle").empty();
                    for( var i = 0; i<len; i++){
                        var article_title = json[i]['article_title'];

                        $("#searchArticle").append("<li value='"+article_title+"'>"+article_title+"</li>");

                    }

                    // binding click event to li
                    $("#searchResult li").bind("click",function(){
                        setText(this);
                    });
			  $('#dynamic_content').html(data);
			  $( "#searchArticle" ).autocomplete({
				  source: data
				});*/
				$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			}
		  });
		}

   });
});
$('#searchArticle').on('search', function () {
	$('#suggesstion-box').hide()
});
$('#searchArticle').on('focus', function () {
	
});
$("#searchArticle").focusout(function(){
	/*
	window.setTimeout(function() {  }, 1000);*/
//$('#suggesstion-box').hide()

});
$("#suggesstion-box li").mousedown(function(){
	jQuery('.title-list').click(function () {
		window.location.href = $(this).attr('href');
	});
    //$("#suggesstion-box").hide();
});

$("#searchArticle").focus(function(){
	if($('#searchArticle').val().length == 0){
	$('#suggesstion-box').hide()
	}
});

$(document).on('click', '.bi-info-circle-fill', function(){
$('#reportModal').modal('show');
});

</script>
<?php include "footer.php";?>
