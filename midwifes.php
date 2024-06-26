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
            <li><a role="button" href="hospital"><i class="icofont-hospital"></i> HOSPITALS</a></li>
            <li><a role="button" href="doctors"><i class="icofont-doctor"></i> DOCTORS</a></li>
            <li><a class="active" role="button" href="midwifes"><i class="icofont-nurse"></i> MIDWIFE CLINICS</a></li>
            <li><a role="button" href="medical"><i class="icofont-nurse-alt"></i> MEDICAL CLINICS</a></li>
            <li><a role="button" href="pharmacies"><i class="icofont-medical-sign"></i> PHARMACIES</a></li>
            <li><a role="button" href="beauty"><i class="icofont-girl-alt"></i> BEAUTY SALON</a></li>
         </ul>
         <div class="client-sec"><a class="client-btn">Sponsors</a></div>
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
        })
		$('li[class="nav-item"] a[href="hospitals"]').addClass('active');
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
						data:{count:count, type:"Midwife"},  
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