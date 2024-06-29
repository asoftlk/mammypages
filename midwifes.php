 <?php include "mp.php"; 

?>


<div class="content">
<section class="main-content-sec">
   <div class="container-fluid p-0">
<div class="row m-0 desktopviewArticle">
   <div class="col-md-3">
	<div class="left-menu-part">
		<?php include "sidebar.php"; ?>
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