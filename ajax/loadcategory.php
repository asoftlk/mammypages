<?php
include '../connect.php';

if(!empty($_POST['id'])){
//Include DB configuration file

//Get last ID
$lastID = mysqli_real_escape_string($conn,$_POST['id']);
$category = mysqli_real_escape_string($conn, $_POST['category']);

//Limit on data display
$showLimit = 8;
$find = array("â€˜", "â€™", "â€œ", "â€");
$replace = array("‘", "’", "“", "”");
//Get all rows except already displayed
$queryAll = $conn->query("SELECT COUNT(*) as totalrows FROM posts WHERE category LIKE '"."%".$category."%"."' AND pub_datetime < NOW() ORDER BY pub_datetime DESC");
$rowAll = $queryAll->fetch_assoc();
$allNumRows = $rowAll['totalrows'];

//Get rows by limit except already displayed
$query = $conn->query("SELECT * FROM posts WHERE pub_datetime < NOW() AND id < $lastID AND category LIKE '"."%".$category."%"."' ORDER BY id DESC LIMIT ".$showLimit);

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){ 
        $postID = $row['id'];
	$lang = $row['language'];
	$style= ($lang == 'tam')? 'font-family: \'Mukta Malar\', sans-serif;' : 'font-family: \'Montserrat\', sans-serif;';
	$pubdate=strtotime($row['pub_datetime']);
	$date = date('d M Y', $pubdate);
	$description1=mb_substr(strip_tags($row["description"]),0,300);
	$description= str_replace($find, $replace, $description1);
	echo '<div class="col-lg-3 col-md-4 col-sm-6" id="'.$row["id"].'" style="margin-bottom:1rem"><a href="article?id='.$row["posting_id"].'" id="'.$row["posting_id"].'" style="text-decoration:none;color:black"><div class="shadow card p-0" style="min-width:14rem; max-width: 16rem; height:16rem; margin:0.5rem 1rem">
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
	$output .='
	</div>
	</div>
  </div>
</div>
</div>';
echo $output;
} ?>
<?php if($allNumRows > $showLimit){ ?>
    <div class="load-more text-center" lastID="<?php echo $postID; ?>" style="display: none;">
        <div class="spinner-border text-success" role="status">
          <span class="sr-only">Loading...</span>
        </div>
    </div>
<?php }else{ ?>
    <div class="load-more" lastID="0">
    </div>
<?php }
}else{ ?>
    <div class="load-more" lastID="0">
        
    </div>
<?php
    }
}
if(isset($_POST["search"])){
    $value = mysqli_real_escape_string($conn, $_POST["value"]);
    $lang = mysqli_real_escape_string($conn, $_POST["lang"]);
	$query = mysqli_query($conn, "SELECT article_title, category, posting_id, featured_image FROM posts WHERE language= '$lang' AND pub_datetime < NOW() AND (article_title LIKE '%".str_replace(" ", "%", $value)."%' OR keywords LIKE '%".str_replace(" ", "%", $value)."%') LIMIT 6");
	$list=array();
	echo '<ul id="title-list"  class="pl-0 mb-0" style="list-style-type:none;">';
	if(mysqli_num_rows($query)>0){
	while($row=mysqli_fetch_assoc($query)){
		//$list[] = $row['article_title'];
		//echo '<li><a class="title-list" href="article?id='.$row["posting_id"].'" style="text-decoration:none; color:black">'.$row["article_title"].'</a></li>';
		echo '<li><a class="title-list" href="article?id='.$row["posting_id"].'" style="text-decoration:none; color:black"><div class="d-flex"><img src="admin/posts/'.$row["featured_image"].'" style="width:50px; height:40px; object-fit:cover; margin-right:5px; border-radius:5px"><p class="mb-0">'.$row["article_title"].'</p></div></a></li>';
	}
    }
    else{
        echo '<li>No Articles Found</li>';
    }
	echo '</ul>';
	//print json_encode($list);
}
?>