<?php include "header.php"; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
<script>function removeReg(data, status) {
				  Swal.fire({
					  text: data,
					  icon: status,
					})
					.then(function(value) {
						window.location.href="users";
					  	  
					});
				}
				</script>
<?php

 if(isset($_GET['del_id'])) 
{
	$id = $_GET['del_id'];
	$data1 = mysqli_query($conn,"select * from users_reg where id = '$id'");
	if(mysqli_num_rows($data1)>0){
		$row = mysqli_fetch_array($data1);
		if(file_exists("../images/".$row['profile_image'])){
		unlink("../images/".$row['profile_image']);
		}
		$datachild = mysqli_query($conn, "select * from children WHERE userid = '$row[userid]'");
		while($rowchild = mysqli_fetch_assoc($datachild)){
		    if(file_exists("../images/".$rowchild['child_profile_image'])){
		    unlink("../images/".$rowchild['child_profile_image']);
		    }
		}
		mysqli_query($conn, "DELETE FROM children WHERE userid = '$row[userid]'");
		mysqli_query($conn, "DELETE FROM users_reg WHERE id=$id");
		echo '<script>alert("Deleted Successfully");window.location.href="users";</script>';  
		//header( "refresh:0.01;url=magazinelist" );
	}
	else{
		echo '<script>alert("Delete failed")</script>';
	}	
}

if(isset($_GET['id'])) 
{
		$id = $_GET['id'];
		 $value = $_GET['value'];
    $data =mysqli_query($conn, "UPDATE users_reg SET status = '$value' WHERE id='$id'");
		if($data){
		echo '';
		echo '<script>removeReg("Updated Successfully", "success");</script>';  
		
		//header( "refresh:0.01;url=userlist.php" );
		}
		else{
			echo '<script>removeReg("Updated Failed! Please try again", "success");alert("Update failed")</script>';
		}
}

?>

<style>
.modal-dialog {
    min-width:80%;
    min-height: calc(100% - 3.5rem);
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class="content">
      <div class="container-fluid">
        <div class="row">
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
        <form>
        <div class="container">
        <div class="row">
            <div class="col-md-4">
            <label>Profile Image:</label>
            <img src=""  onerror="this.style.display='none';" id="profile_image" class="img-fluid">
        </div>
            <div class="col-md-4">
          <div class="form-group">
            <label>First Name:</label><input type="text" class="form-control" id="first_name">
         </div>
         </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Middle Name:</label><input type="text" class="form-control" id="middle_name">
         </div>
         </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Last Name:</label><input type="text" class="form-control" id="last_name">
         </div>
         </div>
         <div class="col-md-4">
          <div class="form-group">
            <label>DOB:</label>
            <input type="text" class="form-control" id="dob">
         </div>
        </div>
         <div class="col-md-4">
            <div class="form-group">
            <label>Address 1:</label>
            <input type="text" class="form-control" id="address1">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Address 2:</label>
            <input type="text" class="form-control" id="address2">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Country:</label>
            <input type="text" class="form-control" id="country">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>City:</label>
            <input type="text" class="form-control" id="city">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Province:</label>
            <input type="text" class="form-control" id="province">
            </div>
            </div>
            <div class="col-md-4">
             <div class="form-group">
            <label>Occupation:</label>
            <input type="text" class="form-control" id="occupation">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Language:</label>
            <input type="text" class="form-control" id="planguage">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Favourite Article :</label>
            <input type="text" class="form-control" id="fav_article">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Pregnant:</label>
            <input type="text" class="form-control" id="pregnant">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Pregnant Week:</label>
            <input type="text" class="form-control" id="pregnant_week">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Children:</label>
            <input type="text" class="form-control" id="children">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Partner Name:</label>
            <input type="text" class="form-control" id="partner_name">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Anniversary Date:</label>
            <input type="text" class="form-control" id="anniversary_date">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Partner DOB:</label>
            <input type="text" class="form-control" id="partner_dob">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Partner Occupation:</label>
            <input type="text" class="form-control" id="partner_occupation">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Mobile:</label>
            <input type="text" class="form-control" id="mobile">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Email:</label>
            <input type="text" class="form-control" id="email">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Mobile Verified:</label>
            <input type="text" class="form-control" id="mobile_verified">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Email Verified:</label>
            <input type="text" class="form-control" id="email_verified">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label>Status:</label>
            <input type="text" class="form-control" id="status">
            </div>
            </div>
            
      </div>
    </form>
                
        
      </div>
      <div class="modal-footer">
<!--<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>-->
          <button type="button" class="btn btn-sm btn-secondary">Update</button>
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
        url:"ajax/userfetch",
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
        url:"ajax/userfetchview",
        method:"POST",
        data:{id:id},
        success:function(data)
        {
		//	debugger
            var data1= JSON.parse(data);
            for(var key in data1){
                if($("#" + key).length != 0){
                    if(key == 'profile_image')
                        {
                        if(data1[key]){
                          $('#'+key).attr('src', 'mummy/../../images/'+data1[key]);  
                            $('#'+key).attr('disabled', value);
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
