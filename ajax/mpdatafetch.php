<?php 
include "../connect.php"; 
$output = '';  
$count = ''; 
$type = $_POST['type']; ; 
$id_column = $type . '_id';
$workingTimeTable = $type.'_working_times';

$sql = "SELECT * FROM $type INNER JOIN $workingTimeTable wt ON wt.$id_column= $type.$id_column WHERE priority = 0 LIMIT 10 OFFSET ".$_POST['count']; 
$result = mysqli_query($conn, $sql);  
if(mysqli_num_rows($result) > 0)  
{  
    date_default_timezone_set('Asia/Colombo');
     while($row = mysqli_fetch_array($result))  
     { 
		$specialityarray = explode(" ///", $row['speciality']);
		$speciality = "";
		for($i=0; $i< count($specialityarray); $i++){
			if($i == count($specialityarray)-1){
				
				$speciality .= $specialityarray[$i];
			}
			else{
				$speciality .= $specialityarray[$i].", ";
			}
		}
          $count = $_POST['count']+10;  

            $currentDay = strtolower(date('l')); 
            $currentTime = date('H:i:s'); 
            $openTime = $row[$currentDay . '_open'];
            $closeTime = $row[$currentDay . '_close'];
            $isOpen = ($currentTime >= $openTime && $currentTime <= $closeTime) ? '<span class="text-success mt-2">Open</span>' : '<span class="text-danger mt-2">Closed</span>';

          $output .= '  
               <div class="row m-0" style="border-bottom: 1px solid #f4f4f4 ;">
							<div class="col-md-3" style="margin:auto">
							<div>
								<a href="mpconnect/'.$type.'/'.urlencode(str_replace(' ', '_', $row["name"])).'"><img src="directory/'.$type.'/'.$row['logo'].'" class="img-fluid" style="max-height:5rem"></a>
							</div>
							</div>
							<div class="col-md-9 pl-0" style="margin:1rem 0">
							    <div style="float:right">';
							    	$ratingquery= mysqli_query($conn, "SELECT SUM(rating) AS total, COUNT(rating) as count from mp_comments WHERE mp_id= '$row[$id_column]'");
        							$ratingrow = mysqli_fetch_assoc($ratingquery);
        							if($ratingrow['count'] != 0){
        								$rating= $ratingrow['total']/$ratingrow['count'];
        							}
        							else{
        								$rating=0;
        							}
    							for($i=0; $i<5; $i++){
    								if($rating>=1){
    								$output .= '<i class="bi bi-star-fill"></i>&nbsp;';
    								}
    								elseif($rating>0 and $rating<1){
    								$output .= '<i class="bi bi-star-half"></i>&nbsp;';
    								}
    								else{
    								$output .= '<i class="bi bi-star"></i>&nbsp;';
    								}
    								$rating=$rating-1;									
    							}
							$output .= '</div><a href="mpconnect/'.$type.'/'.urlencode(str_replace(' ', '_', $row["name"])).'" class="namehref"><p class="text-heading">&nbsp;'.$row["name"].'</p></a>
							<p class="text">&nbsp;'.$speciality.'</P>
							<div class="d-flex justify-content-between">
                            <p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["address"].' <br> <strong>' . $isOpen . '</strong></P>                           
                                           <form action="mpconnect/'.$type.'/' . urlencode(str_replace(' ', '_', $row["name"])) . '" method="post" style="display:inline;">
                                <input type="hidden" name="' . $type . '_id" value="' . $row[$type . '_id'] . '">
                                <button type="submit" class="btn btn-success p-1" style="font-size:12px; height:28px">View&nbsp;'.$type.'</button>
                                </form>
                                
                            </div>
                         </div>   
						</div>';  
     }  
     $output .= '  
               <div id="remove_row" class="p-4" style="background-color:f4f4f4">  
                    <button type="button" name="btn_more" data-vid="'. $count .'" id="btn_more" class="btn btn-success form-control">Load More</button> 
               </div>  
     ';  
     echo $output;  
}  
?>