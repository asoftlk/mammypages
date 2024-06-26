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
	$hospitalid=$_POST['reviewid'];
	$query ="SELECT users_reg.email, users_reg.profile_image, users_reg.first_name, users_reg.last_name, mp_comments.comment, mp_comments.datetime, mp_comments.mp_id, mp_comments.id, mp_comments.rating FROM users_reg INNER JOIN mp_comments ON users_reg.email=mp_comments.userid WHERE mp_comments.mp_id='$hospitalid'  AND mp_comments.comment != '' ORDER BY mp_comments.datetime DESC LIMIT 5 OFFSET ".$_POST["count"];
	$fetch =mysqli_query($conn, $query);
	if(mysqli_num_rows($fetch) > 0)  
	{ 
	$i=$_POST['i'];
		$numrows=mysqli_num_rows($fetch);
		$count =$numrows;
		while($reviewrow= mysqli_fetch_array($fetch)){
			$count = $_POST['count']+5; 
			echo '
				<div class="row" style="padding: 10px; border-radius: 10px; margin-bottom:5px; margin-left:3px">
					<div class="col-sm-1 p-0">
						<img src="images/'.$reviewrow["profile_image"].'" onerror="this.src=\'assets/images/MP-comment-icon.png\'" style="border-radius: 50%; width: 3rem; height: 3rem; border:1px solid #C7C7C7">
					</div>
					<div class="col-sm-11">
					<div class="d-flex" style="justify-content: space-between; margin-bottom:0.1rem; flex-flow: wrap"><p style="text-align:left; font-size:.8rem; font-weight:bold; margin-bottom:0.1rem">'.$reviewrow['first_name'].' '.$reviewrow['last_name'].' | '.time_elapsed_string($reviewrow["datetime"], $full=false).' | ';
					$rating= $reviewrow['rating'];
						for($j=0; $j<5; $j++){
							if($rating>=1){
							echo '<i class="bi bi-star-fill pl-1"></i>';
							}
							elseif($rating>0 and $rating<1){
							echo '<i class="bi bi-star-half pl-1"></i>';
							}
							else{
							echo '<i class="bi bi-star pl-1"></i>';
							}
							$rating=$rating-1;									
						}
					echo '</p>';
				if($userid==$reviewrow["email"]){
					echo '<div class="d-flex" style="font-size:0.8rem; margin-bottom:0.1rem"><input type="button" id="edit'.$i.'" class="edit" style="border:none; background:transparent;" value="Edit">
					<p style="margin-bottom:0.1rem">&nbsp;|&nbsp;</p><input type="button" id="delete'.$i.'" class="delete" style="border:none; background:transparent; float:right;" value="Delete"></div>';
				}
			echo '</div><form method="POST" action="ajax/mp_review" id="reviewform'.$i.'">
						<input type="hidden" name="mp_id" value="'.$reviewrow["mp_id"].'">
						<input type="hidden" name="email" value="'.$reviewrow["email"].'">
						<input type="hidden" name="id" id="id'.$i.'" value="'.$reviewrow["id"].'">
						<input type="hidden" name="editdelete" id="editdelete'.$i.'" value="">
						<p name="reviewdata" id="reviewdata'.$i.'" class="reviewdata" style="width:100%; text-align:justify; font-size:0.9rem; border:none;" disabled="true">'.$reviewrow["comment"].'</p>
						<div class="rate" id="rate'.$i.'" style="display:none">
							<input type="radio" id="'.$i.'star5" name="rate" value="5" />
							<label for="'.$i.'star5" title="5">5 stars</label>
							<input type="radio" id="star4'.$i.'" name="rate" value="4" />
							<label for="'.$i.'star4" title="4">4 stars</label>
							<input type="radio" id="'.$i.'star3" name="rate" value="3" />
							<label for="'.$i.'star3" title="3">3 stars</label>
							<input type="radio" id="'.$i.'star2" name="rate" value="2" />
							<label for="'.$i.'star2" title="2">2 stars</label>
							<input type="radio" id="'.$i.'star1" name="rate" value="1" />
							<label for="'.$i.'star1" title="1">1 star</label>	
						</div>
						<p id="rating_error" style="color:red; text-align:left; margin-bottom:0px"></p>
						<input type="hidden" id="submitreview'.$i.'" name="submitreview" value="" style="color:white;background-color:#68cf68; font-size:.8rem;float:right; border:none; padding:0.3rem; border-radius:0.5rem; margin:0.5rem">
					</form>
					</div>
					</div>';
			$i++;
		}
			echo '<div id="load_data" style="margin:0"></div>
					<div id="remove_row" class="p-1 text-right">  
					<button type="button" name="btn_more" data-vid="'.$count.'" id="btn_more" style="background:transparent; border:none;">View more Reviews</button>  
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