<?php include "header.php"; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
<script>
function removeReg(data, status) {
  Swal.fire({
	  text: data,
	  icon: status,
	})
	.then(function(value) {
		window.location.href="viewdoctors";  
	});
}
</script>

<?php

 if(isset($_GET['del_id'])) 
{
	$id = $_GET['del_id'];
	$data1 = mysqli_query($conn,"select * from doctor where id = '$id'");
	if(mysqli_num_rows($data1)>0){
		$row = mysqli_fetch_array($data1);
		if(file_exists("../directory/doctor/".$row['logo'])){
		unlink("../directory/doctor/".$row['logo']);}
		if(file_exists("../directory/doctor/".$row['image'])){
		unlink("../directory/doctor/".$row['image']);}
		$galleryquery= mysqli_query($conn, "SELECT * FROM mpgallery WHERE hospitalid = '$row[doctor_id]'");
		while($galleryrow = mysqli_fetch_array($galleryquery)){
			if(file_exists("../directory/doctor/".$galleryrow['image'])){
			unlink("../directory/doctor/".$galleryrow['image']);
			}
		}
		mysqli_query($conn, "DELETE FROM mpgallery WHERE doctor_id='$row[doctor_id]'");
		mysqli_query($conn, "DELETE FROM doctor WHERE id=$id");
		echo '<script>alert("Deleted Successfully");window.location.href="viewdoctors";</script>';  
		//header( "refresh:0.01;url=magazinelist" );
	}
	else{
		echo '<script>alert("Delete failed")</script>';
	}	
}

if(isset($_GET['id'])) 
{
		$uid = $_GET['id'];
		 $value = $_GET['value'];
		 if($value>0){
			$data =mysqli_query($conn, "SELECT * FROM `doctor` WHERE `priority` = '$value'");
			echo mysqli_num_rows($data);
			if(mysqli_num_rows($data)>0){
				$hospitalidrow = mysqli_fetch_array($data);
				echo '<script>removeReg("This priority is already assigned to '.$hospitalidrow["name"].'('.$hospitalidrow["doctor_id"].')", "error");</script>';
			}
			else{
				$updatedata =mysqli_query($conn, "UPDATE doctor SET priority = '$value' WHERE id='$uid'");
				if($updatedata){
				echo '';
				echo '<script>removeReg("Updated Successfully", "success");</script>';  
				
				//header( "refresh:0.01;url=userlist.php" );
				}
				else{
					echo '<script>removeReg("Updated Failed! Please try again", "error");alert("Update failed")</script>';
				}
			}
		 }
		 else{
			$updatedata =mysqli_query($conn, "UPDATE doctor SET priority = '$value' WHERE id='$uid'");
				if($updatedata){
				echo '';
				echo '<script>removeReg("Updated Successfully", "success");</script>';  
				
				//header( "refresh:0.01;url=userlist.php" );
				}
				else{
					echo '<script>removeReg("Updated Failed! Please try again", "error");</script>';
				} 
		 }
}

?>

<style>
.modal-dialog {
    min-width:80%;
    min-height: calc(100% - 3.5rem);
}
#prioritystatus{
	width:50px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Doctors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DOCTORS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class="content">
      <div class="container-fluid">
        <div class="row">
		  <div class="col-12">
			<a href="doctor.php" class="btn btn-mammy float-right">+ Add Doctor</a>
		  </div><br><br>
          <div class="col-12">
             <div class="card" >
				<div class="card-header" style="display:inline-block">
					<label style="padding-left:30px;">Show &nbsp </label><select onchange="val()" id="select_id">
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<option value="250">250</option>
				  </select><label> &nbsp Entries</label>
					<input style=" width:30%; float:right" type="text" name="search_box" id="search_box" placeholder="Search..." >
			
				<div class="card-body">
				  
				  <div class="table-responsive" id="dynamic_content">
					
				  </div>
				</div>
			  </div>
			</div>
			</div>
			</div>


      </div>
    </section>
    <!-- /.content -->
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
        <div class="container">
        <div class="row">
            <div class="col-md-4">
            <label>logo Image:</label><br>
            <img src=""  onerror="this.style.display='none';" id="logo" class="img-fluid" style="max-height:110px">
        </div>
			<div class="col-md-4">
            <label>Featured Image:</label>
            <img src=""  onerror="this.style.display='none';" id="image" class="img-fluid" style="max-height:110px">
        </div>
			
			
            <div class="col-md-4">
          <div class="form-group">
            <label>Doctor Id:</label><input type="text" class="form-control" id="doctor_id">
         </div>
         </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Name:</label><input type="text" class="form-control" id="name">
         </div>
         </div>
        <div class="col-md-4">
          <div class="form-group">
            <label> Specialist In</label><input type="text" class="form-control" id="speciality">
         </div>
         </div>
			
			<div class="col-md-4">
          <div class="form-group">
            <label>doctor :</label>
            <input type="text" class="form-control" id="address">
         </div>
        </div>
					
         <div class="col-md-4">
          <div class="form-group">
            <label>Contact Number:</label>
            <input type="text" class="form-control" id="mobile">
         </div>
        </div>
         <div class="col-md-4">
            <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" id="email">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Whatsapp Number</label>
            <input type="text" class="form-control" id="whatsapp">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Website:</label>
            <input type="text" class="form-control" id="website">
            </div>
            </div>
           
            <div class="col-md-4">
             <div class="form-group">
            <label>Facebook Link:</label>
            <input type="text" class="form-control" id="facebook">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Instagram Link:</label>
            <input type="text" class="form-control" id="instagram">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Linkedin Link :</label>
            <input type="text" class="form-control" id="linkedin">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Status:</label>
            <input type="text" class="form-control" id="status">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>About:</label>
            <input type="text" class="form-control" id="about">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Priority:</label>
            <input type="text" class="form-control" id="priority">
            </div>
            </div>
			
            
           
            
            
      </div>
			<!--a href="viewhospital.php?update_id=26"><button type="button" class="btn btn-secondary">Update</button></a-->
    </form>
                
        
      </div>
      <div class="modal-footer">
<!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<?php include "footer.php";?>

<script>
 function myfunction() {
		var element = document.getElementById("sidebar");
		element.classList.toggle("active");
	}
  $(document).ready(function(){
	$('#select_id').change(function(){
    var num=($(this).val());
	localStorage.setItem("num", num);
	load_data(1,num);
	});
    var myval = localStorage.getItem("num");
    if(myval){
       // console.log(myval);
    load_data(1, myval);
    $('#select_id').val(myval);
    }
    else{
        load_data(1, 10);
    }

    function load_data(page, value, query = '')
    {
      $.ajax({
        url:"ajax/doctorfetch",
        method:"POST",
        data:{page:page, value:value, query:query},
        success:function(data)
        {
			//debugger
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, ($('#select_id').val()), query);
	  //debugger
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, ($('#select_id').val()), query);
	 // debugger
    });

  });
function fetch_id(id, value)
		{
		 $.ajax({
        url:"ajax/doctorfetchview",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
		//	debugger
            var data1= JSON.parse(data);
            for(var key in data1){
                if($("#" + key).length != 0){
                    if(key == 'logo')
                        {
                        if(data1[key]){
                          $('#'+key).attr('src', '../directory/doctor/'+data1[key]);  
                            $('#'+key).attr('disabled', value);
							$('#'+key).show();
                        }
                        else{
                              $('#'+key).remove();  
                        }
                        }
					if(key == 'image')
                        {
                        if(data1[key]){
                          $('#'+key).attr('src', '../directory/doctor/'+data1[key]);  
                            $('#'+key).attr('disabled', value);
							$('#'+key).show();
                        }
                        else{
                              $('#'+key).remove();  
                        }
                        }
                    else{
                    $('#'+key).val(data1[key]); 
                    $('#'+key).attr('disabled', value);
                    }
                }
                //console.log(key +  " -> " + data1[key]);
              // $('#').val(data1.first_name); 
            }
            
          //$('.modal-body').html(data);
        }
      });
		}
</script>