<?php 
include "db.php"; 
$email = $_SESSION['userid'];
$queryfav = mysqli_query($conn, "SELECT fav_article FROM users_reg WHERE email = '$email'");
$fetchfav = mysqli_fetch_array($queryfav);
$myArray = explode(' , ', $fetchfav['fav_article']);
$articlequery ="SELECT * FROM posts WHERE ";// posted_by = '$email' ORDER BY pub_datetime DESC";
for($i=0;$i<(count($myArray)-1);$i++){
	if($i==(count($myArray)-2)){
	$articlequery .= "category LIKE '%$myArray[$i]%' ";
	}
	else{
	$articlequery .= "category LIKE '%$myArray[$i]%' OR ";
	}
}
$articlequery .= " AND pub_datetime < NOW() ORDER BY pub_datetime DESC" ;
$posts = mysqli_query($conn, $articlequery);
?> 
<style>
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
</style>
    <div class="col-md-6" style="border-right:1px solid #dddddd; padding:0">
	<div class="container-fluid">
	<?php
	if(mysqli_num_rows($posts)>0){
		while($postsrow=mysqli_fetch_array($posts)){
		$output="";
	$output .= '<div class="row justify-content-center" style="color:#6f6c6c">
		<div class="col-md-2 col-sm-2 col-2">';
	if($postsrow['posted_by']==""){
		$image= 'assets/images/MP-Favi.png';
		$name = 'Mammypages<img src="assets/images/badge-check.svg" data-toggle="tooltip" title="Verified" style="height:0.9rem; margin-top:-0.2rem">';
	}
	else{
	$queryuser =  mysqli_query($conn, "SELECT * FROM users_reg WHERE email = '$postsrow[posted_by]'");
	$userrow =  mysqli_fetch_array($queryuser);
	$image= 'images/'.$userrow['profile_image'];
	if($userrow['status']==1){
	    $name = $userrow['first_name'].' '.$userrow['last_name']. '<img src="assets/images/badge-check.svg" data-toggle="tooltip" title="Verified" style="height:0.9rem; margin-top:-0.2rem">';
	}
	else{
	    $name = $userrow['first_name'].' '.$userrow['last_name'];
	}
	$lang = $postsrow['language'];
	}
	$output .=	'<img class="img-fluid" src="'.$image.'" onerror="this.src=\'assets/images/child-img-1.jpg\'" style="border-radius:50%; width:3.5rem; height:3.5rem; margin:1rem 0 1rem 1rem">
		</div>
		<div class="col-md-10 col-sm-10 col-10 m-0 pl-1">
		<div style="display:flex; justify-content:space-between; padding-top:1.3rem; font-weight:bold; font-size:0.9rem;"> 
		<p style="margin-left:0.1rem;margin-bottom:0rem">
			'.$name.'</p>';
			$postrowcat = explode(' ,', $postsrow["category"]);
			$postrowcat = $postrowcat[0];
			if($postsrow['language'] =='tam'){
				$output .= '<div class="float-right"><form action="category" method="post"><input type="submit" href="#" class="" style="font-family: \'Mukta Malar\', sans-serif;text-decoration:none; border:none; background:none; font-size:14px; font-weight:600;  color:#747474;" value="'.$postrowcat.'" name="category"></form></div>';
				}
				else{
				$output .= '<form action="category" method="post"><input type="submit" href="#" class="" style="text-decoration:none; border:none; background:none; font-size:14px; font-weight:600;  color:#747474;" value="'.$postrowcat.'" name="category"></form>';
				}
			$output .= '</div><p style="margin-left:0.1rem; padding-top:0.1rem; font-size:0.9rem; margin-bottom:0.1rem">'.time_elapsed_string($postsrow["pub_datetime"], $full=false) .'<br>
		</p>
		</div>
		</div>';
	if($postsrow['language']=='tam'){	
	$output .= '<div class="row justify-content-center">
			<a href="article?id='.$postsrow["posting_id"].'" style="text-decoration:none"><p style=" max-height:4.8rem; text-align:justify; font-size:13px; margin:0 1rem; color:#888686; overflow: hidden; font-family: \'Mukta Malar\', sans-serif; text-overflow: ellipsis; ">'.mb_substr(strip_tags($postsrow["description"]),0,600).'</p></a>
		</div>';
	}
	else{
	$output .=	'<div class="row justify-content-center">
			<a href="article?id='.$postsrow["posting_id"].'" style="text-decoration:none"><p style=" max-height:4.8rem; text-align:justify; font-size:13px; margin:0 1rem; color:#888686; overflow: hidden; font-family: \'Mukta Malar\', sans-serif; text-overflow: ellipsis; ">'.mb_substr(strip_tags($postsrow["description"]),0,600).'</p></a>
		</div>';
	}
	$output .=	'<div class="row text-center">
			<a href="article?id='.$postsrow["posting_id"].'" style="text-decoration:none"><img src="admin/posts/'.$postsrow["featured_image"].'" class="img-fluid" style="border-radius:1.5rem; padding:1rem; min-width:85%; max-height:300px"></a>
		</div>
		<div class="d-flex" style="flex-wrap: wrap;padding:0.3rem 1rem">';
		$likes= mysqli_query($conn, "SELECT count(*) as totallikes FROM visitors WHERE articleid='$postsrow[posting_id]' AND liked='1'");
		$likesrow=mysqli_fetch_array($likes);
		if(!isset($_SESSION['name'])){
		$output .=	'<i class="bi bi-heart"  value="'.$postsrow["posting_id"].'" style="color:#68cf68"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
		}
		else{
			$liked =mysqli_query($conn, "SELECT liked FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$postsrow[posting_id]'");
			if(mysqli_num_rows($liked)>0){
				$likedrow=mysqli_fetch_array($liked);
				if($likedrow['liked']==0){
					$output .=	'<i class="bi bi-heart" value="'.$postsrow["posting_id"].'" style="color:#68cf68"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
				}
				else{
					$output .=	'<i class="bi bi-heart-fill" value="'.$postsrow["posting_id"].'"  style="color:#68cf68"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
				}
			}
			else{
				$output .=	'<i class="bi bi-heart" value="'.$postsrow["posting_id"].'" style="color:#68cf68"></i><span id="count" class="align-middle" style="margin:  -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
			}
		}
		$output .=	'<div class="dropup d-flex header-settings"> 
			<a href="#" class="nav-link" data-toggle="dropdown" style="padding:0 0.5rem; display:flex; text-decoration:none; color:black"><i class="bi bi-share"  style="font-size:15px; color:#68cf68"></i><span class="align-middle" style="margin: -0.1rem 0.15rem 0 0.35rem;font-weight: 600; font-size: 13px; color: #504e4e;">&nbsp;SHARE</span> </a> 
			<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="" > 
				<div class="d-flex" >
					<a class="dropdown-item d-flex"  href="#"><img src="assets/images/MP-Favi.png" style="width:32px; height:30px;"></a>
					<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://www.facebook.com/sharer/sharer.php?u=https://www.mammypages.com/article?id='.$postsrow["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/Facebook.png" style="width:32px; height:30px;"></a> 
					<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://twitter.com/intent/tweet?url=https://www.mammypages.com/article?id='.$postsrow["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;"href=""><img src="assets/images/Twitter.png" style="width:32px; height:30px;"></a> 
					<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://www.linkedin.com/shareArticle?mini=true&url=https://www.mammypages.com/article?id%3D'.$postsrow["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/linkedin.png" style="width:32px; height:30px;"></a> 
					<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://telegram.me/share/url?url=https://www.mammypages.com/article?id='.$postsrow["posting_id"].'&text='.$postsrow["article_title"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/telegram.png" style="width:32px; height:30px;"></a> 
					<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://api.whatsapp.com/send?text=https://www.mammypages.com/article?id='.$postsrow["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/Whatsapp.png" style="width:32px; height:30px;"></a> 
				</div>
			</div> 
			</div>';
			
		//$favourite= mysqli_query($conn, "SELECT count(*) as totalfav FROM visitors WHERE articleid='$row[posting_id]' AND favourite='1'");
		//$favouriterow=mysqli_fetch_array($favourite);
		if(!isset($_SESSION['name'])){
		$output .=	'<i class="bi bi-star"  value="'.$postsrow["posting_id"].'" style="color:#68cf68;"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 600; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
		}
		else{
			$favourites =mysqli_query($conn, "SELECT favourite FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$postsrow[posting_id]'");
			if(mysqli_num_rows($favourites)>0){
				$favouritesrow=mysqli_fetch_array($favourites);
				if($favouritesrow['favourite']==0){
					$output .=	'<i class="bi bi-star" value="'.$postsrow["posting_id"].'" style="color:#68cf68"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 600; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
				}
				else{
					$output .=	'<i class="bi bi-star-fill" value="'.$postsrow["posting_id"].'"  style="color:#68cf68"></i><span id="count" class="favourite1 align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem;font-weight: 700;font-size:13px;color: #504e4e;">ADDED</span>';
				}
			}
			else{
				$output .=	'<i class="bi bi-star" value="'.$postsrow["posting_id"].'" style="color:#68cf68"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 700; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
			}
		}	
		$comments= mysqli_query($conn, "SELECT COUNT(*) as commentnos FROM comments WHERE articleid='$postsrow[posting_id]'");
		$commentsrow=mysqli_fetch_array($comments);
		$output .=	'<p style="margin-left:auto; color:#504e4e; font-size:13px; font-weight:500">'.$commentsrow["commentnos"].' Comments</p>';
		$output .=	'<p style="padding-left:1rem; color:#504e4e; font-size:13px; font-weight:500">'.$postsrow["view_count"].' views</p>';
		echo $output.'</div>';	
		echo '<div style="border-bottom:2px solid #dddddd; margin:0 -1rem"></div>';
	}
	}
	else{
		echo "<h4 style='margin:1rem'>No Posts available</h4>";
	}
	?>	
	</div>
    </div>
    <?php include "dbfooter.php";?>
  </div>
  
</div>
<script>
$( 'a[href*="dashboard"]').css("color", '#68cf68');

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
</script>

<?php include "footer.php";?>