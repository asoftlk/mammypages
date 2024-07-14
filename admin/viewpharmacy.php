<?php include "header.php"; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
<script>
	function removeReg(data, status) {
	  Swal.fire({
		  text: data,
		  icon: status,
		})
		.then(function(value) {
			window.location.href="viewpharmacy";  
		});
	}
</script>
<?php
	if(isset($_GET['del_id'])) 
	{
	$id = $_GET['del_id'];
	$data1 = mysqli_query($conn,"select * from pharmacy where id = '$id'");
	if(mysqli_num_rows($data1)>0){
		$row = mysqli_fetch_array($data1);
		if(file_exists("../directory/pharmacy/".$row['logo'])){
		unlink("../directory/pharmacy/".$row['logo']);}
		if(file_exists("../directory/pharmacy/".$row['image'])){
		unlink("../directory/pharmacy/".$row['image']);}
		$galleryquery= mysqli_query($conn, "SELECT * FROM mppharmacy_gallery WHERE pharmacy_id = '$row[pharmacy_id]'");
		while($galleryrow = mysqli_fetch_array($galleryquery)){
			if(file_exists("../directory/pharmacy/".$galleryrow['image_name'])){
			unlink("../directory/pharmacy/".$galleryrow['image_name']);
			}
		}
		mysqli_query($conn, "DELETE FROM mppharmacy_gallery WHERE pharmacy_id='$row[pharmacy_id]'");
		mysqli_query($conn, "DELETE FROM pharmacy WHERE id=$id");
		mysqli_query($conn, "DELETE FROM pharmacy_working_times WHERE pharmacy_id='$row[pharmacy_id]'");
		echo '<script>alert("Deleted Successfully");window.location.href="viewpharmacy";</script>';  
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
			$data =mysqli_query($conn, "SELECT * FROM `pharmacy` WHERE `priority` = '$value'");
			echo mysqli_num_rows($data);
			if(mysqli_num_rows($data)>0){
				$idrow = mysqli_fetch_array($data);
				echo '<script>removeReg("This priority is already assigned to '.$idrow["name"].'('.$idrow["pharmacy_id"].')", "error");</script>';
			}
			else{
				$updatedata =mysqli_query($conn, "UPDATE pharmacy SET priority = '$value' WHERE id='$uid'");
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
			$updatedata =mysqli_query($conn, "UPDATE pharmacy SET priority = '$value' WHERE id='$uid'");
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
	
	.l-select-form-control{
		width: 4rem;
		height: 28px;
		height: calc(1.8125rem + 2px);
		padding: .25rem .5rem;
		font-size: .875rem;
		font-weight: 400;
		line-height: 1.5;
		color: #495057;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid #ced4da;
		border-radius: .2rem;
		box-shadow: inset 0 0 0 transparent;
		transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
	}
	.l-select-form-control:focus-visible {
		outline: -webkit-focus-ring-color auto 1px;
	}
</style>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Pharmacy</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Pharmacy</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<a href="pharmacy.php" class="btn btn-mammy float-right">+ Add Pharmacy</a>
				</div>
				<br><br>
				<div class="col-12">
					<div class="card" >
						<div class="card-header" style="display:inline-block">
							<label style="padding-left:30px;">Show &nbsp </label>
							<select onchange="val()" id="select_id"  class="l-select-form-control">
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="50">50</option>
								<option value="100">100</option>
								<option value="250">250</option>
							</select>
							<label> &nbsp Entries</label>
							<input style=" width:30%; height: 31px; float:right" class="form-control form-control-sm" type="text" name="search_box" id="search_box" placeholder="Search..." >
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
									<label>Pharmacy Id:</label><input type="text" class="form-control" id="pharmacy_id">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Pharmacy Name:</label><input type="text" class="form-control" id="name">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Established</label><input type="text" class="form-control" id="established">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Pharmacy Address:</label>
									<input type="text" class="form-control" id="address">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Pharmacy Map location:</label>
									<input type="text" class="form-control" id="map">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Pharmacy city(Required to show for branches):</label>
									<input type="text" class="form-control" id="city">
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
									<label>Certificate:</label>
									<input type="text" class="form-control" id="certificate">
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
									<label>Priority:</label>
									<input type="text" class="form-control" id="priority">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-group">
										<label class="required" for="branchworking">Hours of Operation</label>
										<table class="table table-sm table-bordered">
											<thead>
												<tr>
													<th>Day</th>
													<th>Open time</th>
													<th>End time</th>
												</tr>
											</thead>
											<tbody>
                                            <tr>
												<td>Monday</td>
												<td><input type="time" name="monday_open" class="form-control form-control-sm border-0" id="monday_open" placeholder="Monday Open Time"></td>
												<td><input type="time" name="monday_close" class="form-control form-control-sm border-0" id="monday_close" placeholder="Monday End Time"></td>
											</tr>
											<tr>
												<td>Tuesday</td>
												<td><input type="time" name="tuesday_open" class="form-control form-control-sm border-0" id="tuesday_open" placeholder="Tuesday Open Time"></td>
												<td><input type="time" name="tuesday_close" class="form-control form-control-sm border-0" id="tuesday_close" placeholder="Tuesday End Time"></td>
											</tr>
											<tr>
												<td>Wednesday</td>
												<td><input type="time" name="wednesday_open" class="form-control form-control-sm border-0" id="wednesday_open" placeholder="Wednesday Open Time"></td>
												<td><input type="time" name="wednesday_close" class="form-control form-control-sm border-0" id="wednesday_close" placeholder="Wednesday End Time"></td>
											</tr>
											<tr>
												<td>Thursday</td>
												<td><input type="time" name="thursday_open" class="form-control form-control-sm border-0" id="thursday_open" placeholder="Thursday Open Time"></td>
												<td><input type="time" name="thursday_close" class="form-control form-control-sm border-0" id="thursday_close" placeholder="Thursday End Time"></td>
											</tr>
											<tr>
												<td>Friday</td>
												<td><input type="time" name="friday_open" class="form-control form-control-sm border-0" id="friday_open" placeholder="Friday Open Time"></td>
												<td><input type="time" name="friday_close" class="form-control form-control-sm border-0" id="friday_close" placeholder="Friday End Time"></td>
											</tr>
											<tr>
												<td>Saturday</td>
												<td><input type="time" name="saturday_open" class="form-control form-control-sm border-0" id="saturday_open" placeholder="Saturday Open Time"></td>
												<td><input type="time" name="saturday_close" class="form-control form-control-sm border-0" id="saturday_close" placeholder="Saturday End Time"></td>
											</tr>
											<tr>
												<td>Sunday</td>
												<td><input type="time" name="sunday_open" class="form-control form-control-sm border-0" id="sunday_open" placeholder="Sunday Open Time"></td>
												<td><input type="time" name="sunday_close" class="form-control form-control-sm border-0" id="sunday_close" placeholder="Sunday End Time"></td>
											</tr>
											</tbody>
										</table>
									</div>
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
									<label>Youtube Link :</label>
									<input type="text" class="form-control" id="youtube">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>About:</label>
									<input type="text" class="form-control" id="about">
								</div>
							</div>
						</div>
				    </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
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
            load_data(1, myval);
            $('#select_id').val(myval);
	    }
	    else{
	       load_data(1, 10);
	    }
	
	    function load_data(page, value, query = '') {
            $.ajax({
            url:"ajax/pharmacyfetch",
            method:"POST",
            data:{page:page, value:value, query:query},
            success:function(data) {
                $('#dynamic_content').html(data);
            }
            });
	    }
	
	   $(document).on('click', '.page-link', function(){
            var page = $(this).data('page_number');
            var query = $('#search_box').val();
            load_data(page, ($('#select_id').val()), query);
        });
	
        $('#search_box').keyup(function(){
            var query = $('#search_box').val();
            load_data(1, ($('#select_id').val()), query);
        });
	
    });

    function fetch_id(id, value) {
        $.ajax({
            url:"ajax/pharmacyfetchview",
            method:"POST",
            data:{id:id},
            success:function(data) {
                var data1= JSON.parse(data);
                console.log(data1);
                for(var key in data1){
                    if($("#" + key).length != 0){
                        if(key == 'logo'){
                            if(data1[key]) {
                                $('#'+key).attr('src', '../directory/pharmacy/'+data1[key]);  
                                $('#'+key).attr('disabled', value);
                                $('#'+key).show();
                            } else {
                                $('#'+key).remove();  
                            }
                        }
                        if(key == 'image') {
                            if(data1[key]){
                                $('#'+key).attr('src', '../directory/pharmacy/'+data1[key]);  
                                $('#'+key).attr('disabled', value);
                                $('#'+key).show();
                            } else{
                                $('#'+key).remove();  
                            }
                        } else{
                            data1[key] === '00:00:00' ? '':$('#'+key).val(data1[key]); 
                            $('#'+key).attr('disabled', value);
                        }
                    }
                }
            }
        });
    }
</script>