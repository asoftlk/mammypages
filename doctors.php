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
		    <li><a role="button" href="hospital"><i class="icofont-hospital"></i> HOSPITALS</a></l>
            <li><a class="active" role="button" href="doctors"><i class="icofont-doctor"></i> DOCTORS</a></li>
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
            
			<?php $doctor =mysqli_query($conn, "SELECT * FROM doctor  LIMIT 2");
					$count = 2;
					$numrows = mysqli_num_rows($doctor);
					while($row=mysqli_fetch_array($doctor)){
						echo '<div class="row m-0" style="border-bottom: 1px solid #f4f4f4 ;">
						<div class="col-md-3" style="margin:auto">
						<div>
							<a href="mpdetails.php?type=doctor&id='.$row["doctor_id"].'"><img src="directory/doctor/'.$row['logo'].'" class="img-fluid" style="max-height:5rem"></a>
						</div>
						</div>
						<div class="col-md-9 pl-0" style="margin:1rem 0">
						<div class="d-flex">
						<p class="text"><a href="mpdetails.php?type=doctor&id='.$row["doctor_id"].'"  style=" text-decoration: none ;color:black"class="namehref"><p class="text-heading">&nbsp;'.$row["name"].'</p></a>
							<img src="assets/images/Paid.png" width="16" height="20" class="ml-auto" data-toggle="tooltip" title="Paid List" data-placement="left" area-hidden="true">
						</div>
						<div class="d-flex">
						<br>
						<p class="text">&nbsp;'.$row["qualification"].'</P> <br>
					
						<div class="ml-auto">';
						
						$rating= 0;
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
						echo '</div>
						</div>
						<div class="d-flex">
						<p class="text">&nbsp;'.$row["speciality"].'</P>
						</div>
						<div class="d-flex">
						
							<a href="mpdoctor_details.php?type=doctor&id='.$row["doctor_id"].'" type="button" class="btn btn-success p-1 ml-auto" style="font-size:12px; height:28px ">View&nbsp;doctor</a>
						</div>
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
			<?php 
			
			?>
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
        });
		$('li[class="nav-item"] a[href="doctor"]').addClass('active');
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
						url:"ajax/mp_doctor",  
						method:"POST",  
						data:{count:count, type:"doctor"},  
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
		
		 var height=$("#h2").height()+20;
		 $(".left-menu-part, .right-cont-part").css({'position':'sticky','top':height});
		 $(window).on('resize', function(){
		 var height=$("#h2").height()+20;
		 $(".left-menu-part, .right-cont-part").css({'top':height, 'position':'sticky'});
		 });
		 var count = 0;
		 $( document ).ajaxComplete(function() {
			 if(count == 0){
			  $('#btn_more').click();
			  count++;
			 }
		 });
		 
		 </script>    
	</body>
