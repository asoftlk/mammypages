<?php
include "../connect.php";
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
if(isset($_POST['mostread'])){
   $lang = $_POST['lang'];
   $nowDateTime = date("Y-m-d H:i");
$style= ($lang == 'tam')? 'font-family: \'Mukta Malar\', sans-serif;' : 'font-family: \'Public_Sans\', sans-serif;';
$query ="SELECT * FROM posts WHERE language='$lang' AND pub_datetime < '$nowDateTime' ORDER BY view_count DESC LIMIT 16";
mysqli_set_charset($conn, 'utf8mb4');
$article =mysqli_query($conn, $query);
echo mysqli_error($conn);
	$output ="";	
	$i=1;
	while($row=mysqli_fetch_array($article)){
	     $description =strip_tags($row["description"]);
					$output .= '<div class="row" style="border-bottom: 4px solid #f4f4f4 ;">
							<div class="col-sm-2" style="padding:0.8rem 0.8rem; text-align:center">
							<a href="article?id='.$row["posting_id"].'"><img src="admin/posts/'.$row["featured_image"].'" class="img-fluid feaimg" style="border-radius:1rem; width:100px; height:80px; object-fit:cover; margin-left:0.8rem"></a>
						</div>
						<div class="col-sm-10" style="padding:0.8rem 1.5rem; ">
							<div class="row"><div class="col-8" style="display:flex; justify-content: space-between;"><a href="article?id='.$row["posting_id"].'" style="text-decoration:none; color:#504e4e; font-weight:bold;max-height:1.5rem;overflow:hidden;text-overflow:ellipsis; white-space:nowrap;'.$style.'">'.$row["article_title"].'</a></div>
							<div class="col-4 d-flex" style="justify-content:flex-end"><i class="bi bi-clock" style="color:#68cf68"></i>&nbsp&nbsp<p style="font-size:smaller;margin-bottom:0.6rem">'.time_elapsed_string($row["pub_datetime"], $full=false).'</p></div></div>
							<div class="descript" style="color:#b1afaf; height:2.8rem;margin-bottom:0.8rem;"><a href="article?id='.$row["posting_id"].'" style="text-decoration:none"><p style=" height:2.8rem;  color:#888686; overflow: hidden; text-overflow: ellipsis;'.$style.' ">'.mb_substr($description,0,300).'</p></a></div>
							<div class="d-flex" style="flex-wrap: wrap;">
							<input type="hidden" id="articleid" value="'.$row["posting_id"].'">';
						$likes= mysqli_query($conn, "SELECT count(*) as totallikes FROM visitors WHERE articleid='$row[posting_id]' AND liked='1'");
						$likesrow=mysqli_fetch_array($likes);
						if(!isset($_SESSION['name'])){
						$output .=	'<i class="bi bi-heart"  value="'.$row["posting_id"].'" style="color:#68cf68; cursor: pointer;"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
						}
						else{
							$liked =mysqli_query($conn, "SELECT liked FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$row[posting_id]'");
							if(mysqli_num_rows($liked)>0){
								$likedrow=mysqli_fetch_array($liked);
								if($likedrow['liked']==0){
									$output .=	'<i class="bi bi-heart" value="'.$row["posting_id"].'" style="color:#68cf68; cursor: pointer;"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
								}
								else{
									$output .=	'<i class="bi bi-heart-fill" value="'.$row["posting_id"].'"  style="color:#68cf68; cursor: pointer;"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
								}
							}
							else{
								$output .=	'<i class="bi bi-heart" value="'.$row["posting_id"].'" style="color:#68cf68; cursor: pointer;"></i><span id="count" class="align-middle" style="margin:  -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
							}
						}
						$output .=	'<div class="dropup d-flex header-settings open"> 
							<a href="#" class="nav-link" data-toggle="dropdown" style="padding:0 0.5rem; display:flex; text-decoration:none; color:black"><i class="bi bi-share"  style="font-size:15px; color:#68cf68"></i><span class="align-middle" style="margin: -0.1rem 0.15rem 0 0.35rem;font-weight: 600; font-size: 13px; color: #504e4e;">&nbsp;SHARE</span> </a> 
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
						$output .=	'<i class="bi bi-star"  value="'.$row["posting_id"].'" style="color:#68cf68; cursor: pointer;"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 600; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
						}
						else{
							$favourites =mysqli_query($conn, "SELECT favourite FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$row[posting_id]'");
							if(mysqli_num_rows($favourites)>0){
								$favouritesrow=mysqli_fetch_array($favourites);
								if($favouritesrow['favourite']==0){
									$output .=	'<i class="bi bi-star" value="'.$row["posting_id"].'" style="color:#68cf68; cursor: pointer;"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 600; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
								}
								else{
									$output .=	'<i class="bi bi-star-fill" value="'.$row["posting_id"].'"  style="color:#68cf68; cursor: pointer;"></i><span id="count" class="favourite1 align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem;font-weight: 700;font-size:13px;color: #504e4e;">ADDED</span>';
								}
							}
							else{
								$output .=	'<i class="bi bi-star" value="'.$row["posting_id"].'" style="color:#68cf68; cursor: pointer;"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 700; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
							}
						}	
							
						$output .=	'<a href="article?id='.$row["posting_id"].'" style="margin-left:auto;text-decoration:none;  color:#6A64B7; font-weight:bold">Read Article</a>
							
						</div></div></div>';
				if($i%4 == 0){	
				$output .= '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- rectangle -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-6640694817095655"
                     data-ad-slot="4022982551"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>';	
				}
				$i++;
        	}
      echo $output;
}
else{
$lang = $_POST['lang'];
$nowDateTime = date("Y-m-d H:i");
$style= ($lang == 'tam')? 'font-family: \'Mukta Malar\', sans-serif;' : 'font-family: \'Public_Sans\', sans-serif;';
$query ="SELECT * FROM posts WHERE language='$lang' AND pub_datetime < '$nowDateTime' ORDER BY pub_datetime DESC LIMIT 4";
mysqli_set_charset($conn, 'utf8');
$article =mysqli_query($conn, $query);
echo mysqli_error($conn);
	$output ="";	
	
	while($row=mysqli_fetch_array($article)){
	     $description =strip_tags($row["description"]);
					$output .= '<div class="row" style="border-bottom: 4px solid #f4f4f4 ;">
							<div class="col-sm-2" style="padding:0.8rem 0.8rem; text-align:center">
							<a href="article?id='.$row["posting_id"].'"><img src="admin/posts/'.$row["featured_image"].'" class="img-fluid feaimg" style="border-radius:1rem; width:100px; height:80px; object-fit:cover; margin-left:0.8rem"></a>
						</div>
						<div class="col-sm-10" style="padding:0.8rem 1.5rem; ">
							<div class="row"><div class="col-8" style="display:flex; justify-content: space-between;"><a href="article?id='.$row["posting_id"].'" style="text-decoration:none; color:#504e4e; font-weight:bold;max-height:1.5rem;overflow:hidden;text-overflow:ellipsis; white-space:nowrap;'.$style.'">'.$row["article_title"].'</a></div>
							<div class="col-4 d-flex" style="justify-content:flex-end"><i class="bi bi-clock" style="color:#68cf68"></i>&nbsp&nbsp<p style="font-size:smaller;margin-bottom:0.6rem">'.time_elapsed_string($row["pub_datetime"], $full=false).'</p></div></div>
							<div class="descript" style="color:#b1afaf; height:2.8rem;margin-bottom:0.8rem;"><a href="article?id='.$row["posting_id"].'" style="text-decoration:none"><p style=" height:2.8rem;  color:#888686; overflow: hidden; text-overflow: ellipsis;'.$style.' ">'.mb_substr($description,0,300).'</p></a></div>
							<div class="d-flex" style="flex-wrap: wrap;">
							<input type="hidden" id="articleid" value="'.$row["posting_id"].'">';
						$likes= mysqli_query($conn, "SELECT count(*) as totallikes FROM visitors WHERE articleid='$row[posting_id]' AND liked='1'");
						$likesrow=mysqli_fetch_array($likes);
						if(!isset($_SESSION['name'])){
						$output .=	'<i class="bi bi-heart"  value="'.$row["posting_id"].'" style="color:#68cf68; cursor:pointer;"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
						}
						else{
							$liked =mysqli_query($conn, "SELECT liked FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$row[posting_id]'");
							if(mysqli_num_rows($liked)>0){
								$likedrow=mysqli_fetch_array($liked);
								if($likedrow['liked']==0){
									$output .=	'<i class="bi bi-heart" value="'.$row["posting_id"].'" style="color:#68cf68; cursor:pointer;"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
								}
								else{
									$output .=	'<i class="bi bi-heart-fill" value="'.$row["posting_id"].'"  style="color:#68cf68; cursor:pointer;"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
								}
							}
							else{
								$output .=	'<i class="bi bi-heart" value="'.$row["posting_id"].'" style="color:#68cf68; cursor:pointer;"></i><span id="count" class="align-middle" style="margin:  -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
							}
						}
						$output .=	'<div class="dropup d-flex header-settings open"> 
							<a href="#" class="nav-link" data-toggle="dropdown" style="padding:0 0.5rem; display:flex; text-decoration:none; color:black"><i class="bi bi-share"  style="font-size:15px; color:#68cf68"></i><span class="align-middle" style="margin: -0.1rem 0.15rem 0 0.35rem;font-weight: 600; font-size: 13px; color: #504e4e;">&nbsp;SHARE</span> </a> 
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
						$output .=	'<i class="bi bi-star"  value="'.$row["posting_id"].'" style="color:#68cf68;"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 600; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
						}
						else{
							$favourites =mysqli_query($conn, "SELECT favourite FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$row[posting_id]'");
							if(mysqli_num_rows($favourites)>0){
								$favouritesrow=mysqli_fetch_array($favourites);
								if($favouritesrow['favourite']==0){
									$output .=	'<i class="bi bi-star" value="'.$row["posting_id"].'" style="color:#68cf68; cursor:pointer;"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 600; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
								}
								else{
									$output .=	'<i class="bi bi-star-fill" value="'.$row["posting_id"].'"  style="color:#68cf68; cursor:pointer;"></i><span id="count" class="favourite1 align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem;font-weight: 700;font-size:13px;color: #504e4e;">ADDED</span>';
								}
							}
							else{
								$output .=	'<i class="bi bi-star" value="'.$row["posting_id"].'" style="color:#68cf68; cursor:pointer;"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 700; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
							}
						}	
							
						$output .=	'<a href="article?id='.$row["posting_id"].'" style="margin-left:auto;text-decoration:none;  color:#6A64B7; font-weight:bold">Read Article</a>
							
						</div></div></div>';
					}
				$output .= '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- rectangle -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-6640694817095655"
                     data-ad-slot="4022982551"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>';	

if($lang=='eng'){
	$category= mysqli_query($conn, "SELECT * FROM article_category");
}
if($lang=='sin'){
	$category= mysqli_query($conn, "SELECT * FROM article_category_sinhala");
}
if($lang=='tam'){
	$category= mysqli_query($conn, "SELECT * FROM article_category_tamil");
}
$idarray = array();
	while($categoryrow= mysqli_fetch_array($category)){
	$categorylist= $categoryrow['category'];
$query1 ="SELECT * FROM posts WHERE language='$lang' AND category LIKE '"."%".$categorylist."%"."' AND pub_datetime < NOW() ORDER BY pub_datetime DESC ";
mysqli_set_charset($conn, 'utf8');
$article1 =mysqli_query($conn, $query1);

echo mysqli_error($conn);
if(mysqli_num_rows($article1)>0){
	$output .='<div class="d-flex" style="border-bottom: 4px solid #f4f4f4 ;border-top: 2px solid #f4f4f4 ; justify-content:space-between"><p class="heading" style="padding:0.5rem; font-size:14px; font-weight:600;  color:#747474;margin-bottom:0;'.$style.'">'.$categorylist.'</p>
	<form action="category" method="post"><button type="submit" class="text-ceter catinput heading" style="text-decoration:none; border:none; background:none; font-size:14px; font-weight:600; padding:0.5rem; color:#747474;" value="'.$categorylist.'" name="category">View All</button></form></div>
	</div>';
}
$i=0;
while($row1=mysqli_fetch_array($article1)){
    
    if(!in_array($row1['id'],$idarray) && ($i<4)){
	 $description =strip_tags($row1["description"]);
				$output .= '<div class="row" style="border-bottom: 4px solid #f4f4f4 ;">
						<div class="col-sm-2" style="padding:0.8rem 0.8rem; text-align:center">
						<a href="article?id='.$row1["posting_id"].'"><img src="admin/posts/'.$row1["featured_image"].'" class="img-fluid feaimg" style="border-radius:1rem; width:100px; height:80px; object-fit:cover; margin-left:0.8rem"></a>
					</div>
					<div class="col-sm-10" style="padding:0.8rem 1.5rem; ">
						<div class="row"><div class="col-8" style="display:flex; justify-content: space-between;"><a href="article?id='.$row1["posting_id"].'" style="text-decoration:none; color:#504e4e; font-weight:bold;max-height:1.5rem;overflow:hidden;text-overflow:ellipsis; white-space:nowrap;'.$style.'">'.$row1["article_title"].'</a></div>
						<div class="col-4 d-flex" style="justify-content:flex-end"><i class="bi bi-clock" style="color:#68cf68"></i>&nbsp&nbsp<p style="font-size:smaller;margin-bottom:0.6rem">'.time_elapsed_string($row1["pub_datetime"], $full=false).'</p></div></div>
						<div class="descript" style="color:#b1afaf; height:2.8rem;margin-bottom:0.8rem;"><a href="article?id='.$row1["posting_id"].'" style="text-decoration:none"><p style=" height:2.8rem;  color:#888686; overflow: hidden; text-overflow: ellipsis;'.$style.'">'.mb_substr($description,0,300).'</p></a></div>
						<div class="d-flex" style="flex-wrap: wrap;">
						<input type="hidden" id="articleid" value="'.$row1["posting_id"].'">';
					$likes= mysqli_query($conn, "SELECT count(*) as totallikes FROM visitors WHERE articleid='$row1[posting_id]' AND liked='1'");
					$likesrow=mysqli_fetch_array($likes);
					if(!isset($_SESSION['name'])){
					$output .=	'<i class="bi bi-heart"  value="'.$row1["posting_id"].'" style="color:#68cf68; cursor:pointer;"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
					}
					else{
						$liked =mysqli_query($conn, "SELECT liked FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$row1[posting_id]'");
						if(mysqli_num_rows($liked)>0){
							$likedrow=mysqli_fetch_array($liked);
							if($likedrow['liked']==0){
								$output .=	'<i class="bi bi-heart" value="'.$row1["posting_id"].'" style="color:#68cf68; cursor:pointer;"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
							}
							else{
								$output .=	'<i class="bi bi-heart-fill" value="'.$row1["posting_id"].'"  style="color:#68cf68; cursor:pointer;"></i><span id="count" class="align-middle" style="margin: -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
							}
						}
						else{
							$output .=	'<i class="bi bi-heart" value="'.$row1["posting_id"].'" style="color:#68cf68; cursor:pointer;"></i><span id="count" class="align-middle" style="margin:  -0.1rem 0.25rem 0 0.25rem; color:#504e4e; font-size:13px; font-weight:600">'.$likesrow["totallikes"].'</span>';
						}
					}
					$output .=	'<div class="dropup d-flex header-settings"> 
						<a href="#" class="nav-link" data-toggle="dropdown" style="padding:0 0.5rem; display:flex; text-decoration:none; color:black"><i class="bi bi-share"  style="font-size:15px; color:#68cf68"></i><span class="align-middle" style="margin: -0.1rem 0.15rem 0 0.35rem;font-weight: 600; font-size: 13px; color: #504e4e;">&nbsp;SHARE</span> </a> 
						<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="" > 
							<div class="d-flex" >
								<a class="dropdown-item d-flex"  href=""><img src="assets/images/MP-Favi.png" style="width:32px; height:30px;"></a>
								<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://www.facebook.com/sharer/sharer.php?u=https://www.mammypages.com/article?id='.$row1["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/Facebook.png" style="width:32px; height:30px;"></a> 
								<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://twitter.com/intent/tweet?url=https://www.mammypages.com/article?id='.$row1["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;"href=""><img src="assets/images/Twitter.png" style="width:32px; height:30px;"></a> 
								<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://www.linkedin.com/shareArticle?mini=true&url=https://www.mammypages.com/article?id%3D'.$row1["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/linkedin.png" style="width:32px; height:30px;"></a> 
								<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://telegram.me/share/url?url=https://www.mammypages.com/article?id='.$row1["posting_id"].'&text='.$row1["article_title"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/telegram.png" style="width:32px; height:30px;"></a> 
								<a class="dropdown-item d-flex" onClick="MyWindow=window.open(\'https://api.whatsapp.com/send?text=https://www.mammypages.com/article?id='.$row1["posting_id"].'\',\'MyWindow\',\'width=600,height=400\'); return false;" href=""><img src="assets/images/Whatsapp.png" style="width:32px; height:30px;"></a> 
							</div>
						</div> 
						</div>';
						
					//$favourite= mysqli_query($conn, "SELECT count(*) as totalfav FROM visitors WHERE articleid='$row[posting_id]' AND favourite='1'");
					//$favouriterow=mysqli_fetch_array($favourite);
					if(!isset($_SESSION['name'])){
					$output .=	'<i class="bi bi-star"  value="'.$row1["posting_id"].'" style="color:#68cf68;"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 600; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
					}
					else{
						$favourites =mysqli_query($conn, "SELECT favourite FROM visitors WHERE session ='$_SESSION[userid]' AND articleid='$row1[posting_id]'");
						if(mysqli_num_rows($favourites)>0){
							$favouritesrow=mysqli_fetch_array($favourites);
							if($favouritesrow['favourite']==0){
								$output .=	'<i class="bi bi-star" value="'.$row1["posting_id"].'" style="color:#68cf68; cursor:pointer;"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 600; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
							}
							else{
								$output .=	'<i class="bi bi-star-fill" value="'.$row1["posting_id"].'"  style="color:#68cf68; cursor:pointer;"></i><span id="count" class="favourite1 align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem;font-weight: 700;font-size:13px;color: #504e4e;">ADDED</span>';
							}
						}
						else{
							$output .=	'<i class="bi bi-star" value="'.$row1["posting_id"].'" style="color:#68cf68; cursor:pointer;"></i><span id="count" class="favourite align-middle" style="margin: -0.04rem 0.25rem 0 0.25rem; font-weight: 700; font-size: 13px; color: #504e4e;">FAVOURITE</span>';
						}
					}	
						
					$output .=	'<a href="article?id='.$row1["posting_id"].'" style="margin-left:auto;text-decoration:none;  color:#6A64B7; font-weight:bold">Read Article</a>
						
					</div></div></div>';
					array_push($idarray, $row1['id']);
					$i++;
				}
					
	            }
				if(mysqli_num_rows($article1)>0){
				$output .= '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- rectangle -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-6640694817095655"
                     data-ad-slot="4022982551"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>';
				}

	}
	echo $output;
}
?>