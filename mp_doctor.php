<?php 
include "../connect.php"; 
$output = '';  
$count = ''; 
$type = $_POST['type']; 
//sleep(1);  
//$sql = "SELECT * FROM hospitals WHERE id > '.$_POST[last_video_id].' LIMIT 2"; 
$sql = "SELECT * FROM doctor WHERE priority = 0 LIMIT 10 OFFSET ".$_POST['count']; 
$result = mysqli_query($conn, $sql);  
if(mysqli_num_rows($result) > 0)  
{
     while($row = mysqli_fetch_array($result))  
     {  
		$specialityarray = explode(" ///", $row['speciality']);
		$speciality = $row["speciality"];
		for($i=0; $i< count($specialityarray); $i++){
			if($i == count($specialityarray)-1){
				
				$speciality .= $specialityarray[$i];
			}
			else{
				$speciality .= $specialityarray[$i].", ";
			}
		}
          $count = $_POST['count']+10;  
          $output .= '  
               <div class="row m-0 sort-item">
							<div class="col-md-3" style="margin:auto">
							<div>
								<a href="mpdetails.php?type=doctor&id='.$row["doctor_id"].'"><img src="directory/doctor/'.$row['logo'].'" class="img-fluid sort-item-img" style="max-height:5rem"></a>
							</div>
							</div>
							<div class="col-md-9 pl-0" style="margin:1rem 0">
							    <div style="float:right">';
							    $rating= 0;
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
							$output .= '</div><a href="mpdetails.php?type=doctor&id='.$row["doctor_id"].'" style=" text-decoration: none ;color:black" class="namehref"><p class="text-heading text-capitalize">&nbsp;'.$row["name"].'</p></a>
							<div class="d-flex">
							
						<p class="text">&nbsp;'.$row["qualification"].'</P>
						</div>
							<div class="d-flex">
							
						<p class="text">&nbsp;'.$row["speciality"].'</P>
						</div>
							
						<div class="d-flex">
						
						<a href="mpdoctor_details.php?type=doctor&id='.$row["doctor_id"].'" type="button" class="btn btn-success p-1 ml-auto" style="font-size:12px; height:28px">View&nbsp;doctor</a>
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