<?php
include "../connect.php";
mysqli_set_charset($conn,"utf8mb4"); 
session_start();
if(isset($_SESSION['userid'])){$userid=$_SESSION['userid']; }else{echo $userid=""; }
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
if(isset($_POST['type'])){
	$id=$_POST['articleid'];
	$query = "SELECT users_reg.email, users_reg.profile_image, users_reg.first_name, users_reg.last_name, comments.comment, comments.datetime, comments.articleid, comments.id FROM users_reg INNER JOIN comments ON users_reg.email=comments.userid WHERE comments.articleid='$id' ORDER BY comments.datetime DESC LIMIT 5 OFFSET ".$_POST["count"];
	$fetch =mysqli_query($conn, $query);
	if(mysqli_num_rows($fetch) > 0)  
	{ 
	$i=$_POST['i'];
	 while($commentsrow = mysqli_fetch_array($fetch))  
     {  
          $count = $_POST['count']+5;  
		  //$i = $_POST['i']+2;
		  echo '
				<div class="row" style="background: #ebebeb;  margin-left:2.5rem;padding: 10px; border-radius: 10px; margin-bottom:5px">
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
						<input type="hidden" id="submitcomment'.$i.'" name="submitcomment" value="" style="color:white;background-color:#CF5787; font-size:.8rem;float:right; border:none; padding:0.3rem; border-radius:0.5rem; margin:0.5rem">
					</form>
					</div>
					</div>';
			$i++;
		}
		echo '<div id="load_data" style="margin:0"></div>
				<div id="remove_row" class="p-1" style="background-color:f4f4f4;border-radius: 5px; margin-left: 2.5rem;">  
				<button type="button" name="btn_more" data-vid="'.$count.'" id="btn_more" style="background:transparent; border:none">View more Comments</button>  
				<button type="hidden" name="btn_more" data-vid="'.$i.'" id="ivalue" style="background:transparent; border:none"></button> 
		</div>';
		
	 
	}
}
echo '<script>
$(document).ready(function() {
  function readMore() {
    var maxLength = 300;
    $(".commentdata").each(function() {
      var myStr = $(this).text();
      if ($.trim(myStr).length > maxLength) {
        var newStr = myStr.substring(0, maxLength);
        var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
        $(this).empty().html(newStr);
        $(this).append(\'<a href="javascript:void(0);" class="read-more" style="text-decoration:none; color:#5f46c6; float:right; margin-bottom:0.5rem">Read more</a>\');
        $(this).append(\'<span class="more-text">\' + removedStr + \' <a href="javascript:void(0);" class="read-less" style="text-decoration:none; margin-bottom:0.5rem; float:right; color:#5f46c6">Read less</a>\' + \'</span>\');
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
</script>';
?>