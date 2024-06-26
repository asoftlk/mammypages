 <?php include "mp.php"; 

?>

<div class="content">
<section class="main-content-sec">
   <div class="container-fluid p-0">
<div class="row m-0 desktopviewArticle">
   <div class="col-md-3">
      <div class="left-menu-part">
         <h3>MP Directory</h3>
         <ul style="list-style-type:none; padding-left:0">
            <li><a class="active" role="button" href="hospitals"><i class="icofont-hospital"></i> HOSPITALS</a></li>
            <li><a role="button" href="doctors"><i class="icofont-doctor"></i> DOCTORS</a></li>
            <li><a role="button" href="midwifes"><i class="icofont-nurse"></i> MIDWIFE CLINICS</a></li>
            <li><a role="button" href="medical"><i class="icofont-nurse-alt"></i> MEDICAL CLINICS</a></li>
            <li><a role="button" href="pharmacies"><i class="icofont-medical-sign"></i> PHARMACIES</a></li>
            <li><a role="button" href="beauty"><i class="icofont-girl-alt"></i> BEAUTY SALON</a></li>
         </ul>
         <div class="client-sec"><a class="client-btn">Sponsors</a></div>
      </div>
   </div>
   <div class="col-md-6">
      <div class="article-sec">
         <div class="top-menu">
            
			<?php $hospital =mysqli_query($conn, "SELECT * FROM hospitals WHERE type ='Hospital' LIMIT 2");
					$count = 2;
					$numrows = mysqli_num_rows($hospital);
					while($row=mysqli_fetch_array($hospital)){
					echo '<div class="row m-0" style="border-bottom: 1px solid #f4f4f4 ;">
							<div class="col-md-3" style="margin:auto">
							<div><img src="directory/hospitals/'.$row['hospital_image'].'" class="img-fluid" style="max-height:6rem"></div></div><div class="col-md-8" style="margin:1rem 0">
							<div style="float:right">';
							$rating= $row['rating'];
							for($i=0; $i<5; $i++){
								if($rating>=1){
								echo '<i class="bi bi-star-fill"></i>&nbsp;';
								}
								elseif($rating>0 and $rating<1){
								echo '<i class="bi bi-star-half"></i>&nbsp;';
								}
								else{
								echo '<i class="bi bi-star"></i>&nbsp;';
								}
								$rating=$rating-1;									
							}
							echo '</div><p class="text">'.$row["hospital_name"].'</p>
                            <p class="text"><img src="assets/images/placeholder.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["hospital_address"].'</P>
                            <p class="text"><img src="assets/images/phone-call.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["mobile"].'</p>
                            <p class="text"><img src="assets/images/email1.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["email"].'</p>
                            <p class="text"><img src="assets/images/hospital.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["hospital_type"].'</p>
                            <p class="text"><img src="assets/images/working-time.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["duration"].'</p>
                            <div style="float:right"><a href="mpdetails.php?type=Hospital&id='.$row["hospitalid"].'" type="button" class="btn btn-success" style="font-weight:bold">View Details</a></div><p class="text"><img src="assets/images/shield.png" class="img-fluid" style="border-radius:10px; width:16px">&nbsp;'.$row["status"].'</p>
                         </div>   
						</div>';
					}
					if($numrows >0){
						echo '<div id="load_data"></div>
							<div id="remove_row" class="p-4" style="background-color:f4f4f4">  
							<button type="button" name="btn_more" data-vid="'.$count.'" id="btn_more" class="btn btn-success form-control">Load More</button>  
						</div>';
					}
					else{
						echo '<h1 style="text-align:center; color:red"> NO Data Available ... </h1>';
					}
					?>						
			
         </div>
      </div>
   </div>
           <div class="col-md-3">
			<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Square -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6640694817095655"
     data-ad-slot="5367742441"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
           </div>
        </div>
        </div>
        </section>
        </div>
        <?php include "footer.php";?>
        <script>
        $(".descript"). children(). removeAttr('style');
        $(".descript").css('color', 'gray');
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
        $('#share').tooltip({
          selector: "a[rel=tooltip]"
        })
		$('li[class="nav-item"] a[href="mpdirectory"]').addClass('active');
        </script>
		<script>
		$('#cathome').remove();
		</script>
		<script>  
		 $(document).ready(function(){  
			  $(document).on('click', '#btn_more', function(){  
				   var count = $(this).data("vid");  
				   $('#btn_more').html("Loading...");  
				   $.ajax({  
						url:"ajax/mpdatafetch",  
						method:"POST",  
						data:{count:count, type:"Hospital"},  
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
		 </script>
        </body>