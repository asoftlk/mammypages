<?php ob_start();
include "header.php"; ?> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.min.css" integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw==" crossorigin="anonymous" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
 <link rel="stylesheet" href="fapro/css/all.css">
<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3c8dbc;
    border-color: #367fa9;
    padding: 1px 10px;
    color: #fff;
}
label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 700;
    color: #5f46c6;
}
  .required:after {
    content:" *";
    color: red;
  }
  .hospitalsubtype{
	  display:none;
  }
</style>
<?php
$id=$_GET['id'];
$result = mysqli_query($conn,"SELECT * from doctor Where id='$id'");
$row= mysqli_fetch_array($result);
?>
 
<script>
$(document).ready(function() {
    $( "#datetime" ).hide(); 
});	
</script>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
		<div class="col-12">
			<a href="viewhospital.php" class="btn btn-mammy">Cancel / Back</a>
		  </div><br><br>
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary" style="border:none">
              <!-- form start -->
              <form id="quickForm" method="POST" action="updatedoctor" enctype="multipart/form-data">
			  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
			  <input type="hidden" name="doctor_id" value="<?php echo $row['doctor_id'];?>">
                <div class="card-body">
					<div class="row">
						<div class="col-md-6 form-group">
						<label class="required" for="doctorname">Name</label>
					  <input type="text" name="doctorname" class="form-control" id="doctorname"
					value="<?php echo $row["name"]; ?>" placeholder="doctor Name">
						</div>
						
						<div class="col-md-6 form-group">
						<label class="required" for="">doctor Specialist In</label>
						<select class="form-control select2" name="doctorspecialist[]" id="doctorspecialist" multiple data-placeholder='--Select Speciality--'>
						<?php 
						$hospitallist=mysqli_query($conn, "SELECT * FROM doctor_speciality");
						$arraylist = array();
						while($hospitalrow=mysqli_fetch_array($hospitallist)){
								array_push($arraylist, $hospitalrow['speciality']);
							}
						$doctorspecialis = explode(" ///",$row["speciality"]);
						$doctorspecialis =array_map('trim', $doctorspecialis);
						for($i=0; $i<count($arraylist); $i++){
							if(in_array($arraylist[$i], $doctorspecialis)){
								echo '<option value="'.$arraylist[$i].'"selected>'.$arraylist[$i].'</option>';
													}
							else{
							echo '<option value="'.$arraylist[$i].'">'.$arraylist[$i].'</option>';
							}
						}
						?>
                        </select>
						</div>					  
					</div>
					
					
					<div class="row">
						<div class="col-md-6 form-group">
						<label class="required" for="doctoraddr">doctor Address</label>
					  <input type="text" name="doctoraddr" class="form-control" id="doctoraddr"  value="<?php echo $row['address']; ?>" placeholder="Address">
						</div>
						
						<div class="col-md-6 form-group">
						<label class="required" for="doctorcont">Contact Number</label>
					  <input type="tel" name="doctorcont" class="form-control" id="doctorcont"  value="<?php echo $row['mobile']; ?>" placeholder="Contact Number">
						</div>	  
					</div>
					
							
					<div class="row">
						
						<div class="col-md-6 form-group">
						<label class="required" for="doctoremail">Email</label>
					  <input type="email" name="doctoremail" class="form-control" id="doctoremail"  value="<?php echo $row['email']; ?>" placeholder="Email ID">
						</div>	
						<div class="col-md-6 form-group">
						<label for="doctorweb">Website</label>
					  <input type="url" name="doctorweb" class="form-control" id="doctorweb"  value="<?php echo $row['website']; ?>" placeholder="Website">
						</div>				  
					</div>
					
					
					<div class="row">
					<div class="col-md-6 form-group">
						<label for="doctor qualification">qualification</label>
					  <input type="text" name="doctorqualification" class="form-control" id="doctorqualification"  value="<?php echo $row['qualification']; ?>" >
						</div>	
						<div class="col-md-6 form-group">
						<label class="required" for="doctortype">doctor type</label>
						  <select class="form-control" name="doctortype" id="doctortype">
								<option selected="" disabled="" value="null" class="hidden">--Select doctor Type</option>
								<option value="Government doctor" <?php if($row['type']=="Government doctor") echo  'selected="selected"';?>>Government doctor</option>
								<option value="Private doctor" <?php if($row['type']=="Private doctor") echo  'selected="selected"';?>>Private doctor</option>
						  </select>
						  </div>					  
					</div>
				
					<div class="row">
						<div class="col-md-6 form-group">
						<label class="required" for="doctorworking">Hours of Operation</label>
					  <input type="text" name="doctorworking" class="form-control" id="doctorworking" value="<?php echo $row['working_hours']; ?>" placeholder="Working Hours">
						</div>
						<div class="col-md-6 form-group">
						<label for="doctortfb">Facebook Link</label>
						  <input type="url" name="doctorfb" class="form-control" id="doctorfb"  value="<?php echo $row['facebook']; ?>" placeholder="Facebook Link">
						</div>					  
					</div>
					
					<div class="row">
						<div class="col-md-6 form-group">
						<label for="doctortinsta">Instagram Link</label>
						  <input type="url" name="doctorinsta" class="form-control" id="doctorinsta" value="<?php echo $row['instagram']; ?>" placeholder="Instagram Link">
						</div>
						<div class="col-md-6 form-group">
						<label for="doctortln">Linkedin Link</label>
						  <input type="url" name="doctorln" class="form-control" id="doctorln"  value="<?php echo $row['linkedin']; ?>" placeholder="Linkedin Link">
						</div>					  
					</div>
					
					<div class="row">
						<div class="col-md-12 form-group">
						<label class="required">Status</label>
                        <select class="form-control" name="status" id="status" >
                          <option selected="" disabled="" value="null" class="hidden">--Select Status</option>
						  <option value="Verified" <?php if($row['status']=="Verified") echo  'selected="selected"';?>>Verified</option>
						  <option value="Not Verified" <?php if($row['status']=="Not Verified") echo  'selected="selected"';?>>Not Verified</option>
						</select>
						</div>
					</div>
					  <div class="row">
						<div class="col-md-12 form-group">
						<label class="required" for="about">About</label>
					  <textarea style="width:97%; height:180px; margin:auto" id="about"  name="about" class="about" required><?php echo $row['about']; ?></textarea>
						</div>					  
					</div>
					<!--div class="row">
					  <div class="col-md-12 form-group">
						<label >Priority</label>
                        <select class="form-control" name="priority" id="priority" value="<?php echo $priority = $row['priority']; ?>">
                          <option selected="" disabled="" value="null" class="hidden">--Select Priority</option>
						  <option value="0" <?php if($priority=="0") echo  'selected="selected"';?>>None</option>
						  <option value="1" <?php if($priority=="1") echo  'selected="selected"';?>>1</option>
						  <option value="2" <?php if($priority=="2") echo  'selected="selected"';?>>2</option>
						  <option value="3" <?php if($priority=="3") echo  'selected="selected"';?>>3</option>
						  <option value="4" <?php if($priority=="4") echo  'selected="selected"';?>>4</option>
						 <option value="5" <?php if($priority=="5") echo  'selected="selected"';?>>5</option>
						 <option value="6" <?php if($priority=="6") echo  'selected="selected"';?>>6</option>
						 <option value="7" <?php if($priority=="7") echo  'selected="selected"';?>>7</option>
						 <option value="8" <?php if($priority=="8") echo  'selected="selected"';?>>8</option>
						 <option value="9" <?php if($priority=="9") echo  'selected="selected"';?>>9</option>
						 <option value="10" <?php if($priority=="10") echo  'selected="selected"';?>>10</option>	
						</select>
					  </div>
					</div-->
	
					<div class="form-group">
						<label class="required" for="logoimage">logo Image</label>
					<br>
					<div class="custom-file">
							<input type="file" class="custom-file-input" accept="image/*" id="customFilelogo" name="logoimage" value="" >
							<label class="custom-file-label" name="logoimage" for="logoimage"><?php echo $row['logo'] ?></label>
						</div>
					</div>
					<div class="text-center">
						<div id="customFilelogopreview">
						<?php if(($row['logo']!="") && file_exists("../directory/doctor/".$row['logo'])){?>
							<p class="img-center" style="color:green;margin-bottom:0">Logo Preview</p>
								<button class="close img-center" onclick="removepreview($('#customFilelogo'))" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button>
								<img src="../directory/doctor/<?php echo $row['logo'] ?>" class="img-fluid img-center" style="position:relative; width:200px; max-height: 180px; border:1px solid gray; margin-bottom:5px"/>
						<?php } ?>
						</div>
                    </div>
					
					<br>
					<div class="form-group">
						<label class="required" for="featuredimage">Featured Image</label>

						<div class="custom-file">
							<input type="file" class="custom-file-input" accept="image/*" id="customFilefeature" name="featuredimage" value="" >
							<label class="custom-file-label" name="featuredimage" for="featuredimage"><?php echo $row['image'] ?></label>
						</div>	
						</div>

					<div class="text-center">
						<div id="customFilefeaturepreview">
						<?php if(($row['image']!="") && file_exists("../directory/doctor/".$row['image'])){?>
							<p class="img-center" style="color:green;margin-bottom:0">Featured Image Preview</p>
								<button class="close img-center" onclick="removepreview($('#customFilefeature'))" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button>
								<img src="../directory/doctor/<?php echo $row['image'] ?>" class="img-fluid img-center" style="position:relative; width:200px; max-height: 180px; border:1px solid gray; margin-bottom:5px"/>
						<?php } ?>
						</div>
                    </div>
					

					
					</div>
					
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button>
                </div>
              </form>
            </div>
            </div>
          
         </div> <!--/.col (right) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

<script>
//$( 'a[href*="dashboard"]').css("color", '#cf5787');
</script>

<?php include "footer.php";?>
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>

<script>
$('.select2').select2();
$('#about').summernote({width:"100%", height:"250"});
function removeReg(data, status) {
  Swal.fire({
      text: data,
      icon: status,
    })
    .then(function(value) {
      //console.log('returned value:', value);
if(data=="Doctor Updated"){
	  window.location.href="viewdoctors";
	  }
	  
    });
};


$(function () {
 $.validator.addMethod("htmlEditorEmpty", function(value, element) {
        return this.optional(element) || value.summernote('isEmpty');
    }, "Please enter details");
   $.validator.addMethod("valueNotEqualsAbout", function () {
	   debugger
            $("#articledescription").val($('.summernote').code());
            if ($("#articledescription").val() != "" && $("#articledescription").val().replace(/(<([^>]+)>)/ig, "") != "") {
                $('#articledescription').val('');
                return true;
            } else {
                return false;
            }
        }, 'This field is required.');
  $('#quickForm').validate({
	  ignore: ":hidden, [contenteditable='true']:not([name])",
	  rules: {
      
      doctorname: {
        required: true,
      },
	  'doctorspecialis[]': {
        required: true,
      },
	 doctorcont:{
		  required: true,
		  rangelength: [10, 12],
	  },
	  hospitalmap:{
		  required:true,
	  },
	  doctorspaddr: {
        required: true,
      },
	  hospitalcity:{
		  required: true,
	  },	  
	  doctoremail: {
		required: true,
      },
	  doctortype: {
		required: true,
	  },
	  hospitalsubtype: {
		required: true,
	  },
	  doctortworking: {
		required: true,
	  },
	  
	  status: {
		required: true,
	  },
	  about: {
		required: true,
	  },
	  "galimages[]": {
            required: true,
            extension: "jpg|jpeg|png"
      },
	  "galimage[]": {
            required: true,
            extension: "jpg|jpeg|png"
      },
    },
    messages: {
      
	},
	submitHandler: function(form) {
			var form_data = new FormData(form);
			$('.galleryimages').each(function() {
			$(this).rules("add", 
				{
					required: true,
					messages: {
						required: "Image is required",
					}
				});
			});
		$.ajax({
            type:form.method,
            url: form.action,
            mimeType: "multipart/form-data",
            data:form_data,
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function() { 
			  $("#submit").prop('value', 'Updating...');
			  $("#submit").prop('disabled', true); // disable button
			},
            success:function(data){
               // debugger
				//console.log(data);
				$("#submit").prop('disabled', false);
				$("#submit").prop('value', 'Update');
				if(data=='Doctor Updated'){
                removeReg(data, 'success');
				//window.location.reload();
				}
				else{
					removeReg(data, 'error');
				}
            },
            error: function(data){
                //console.log("error");
				$("#submit").prop('disabled', false);
				$("#submit").prop('value', 'Update');
                console.log(data);
                removeReg(data, 'error');
            }
        });
	},
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

  <script>

    $('#reservationdatetime').datetimepicker({ format : 'DD/MM/YYYY HH:mm', minDate:new Date(), icons: { time: 'fa fa-clock' }, });
	
    $('#summernote').summernote({width:"100%", height:"250"});
	
	$(document).on('change', '#pubtype', function () {
            if($('#pubtype option:selected').text()=='Scheduled'){
				$( "#datetime" ).prop("disabled", false );
				$( "#datetime" ).show();
			}
			else{
				$( "#datetime" ).prop("disabled", true );
				$( "#datetime" ).hide();
			}
    });

		$(document).on("change", ".custom-file-input", function() {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
			});
			$(document).on('change', "#customFilefeature, #customFilelogo, .customFilegallery", function(){
				var fileName1 = $(this).attr('id');
				var filetype = event.target.files[0];
				if (filetype) {
					$('#'+fileName1+'preview').children().remove();
					var source=URL.createObjectURL(filetype);
					$('#'+fileName1+'preview').append('<p class="img-center" style="color:green;margin-bottom:0">Image Preview</p><button class="close img-center" onclick="removepreview('+fileName1+')" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button><img src="'+source+'" class="img-fluid img-center" style="position:relative; width:200px; max-height: 180px; border:1px solid gray; margin-bottom:5px"/>');
				}
			
			});
		function removepreview(fileName1){
			var fileName2 = $(fileName1).attr('id');	
			 var filename=$('#'+fileName2).val("");
			 $(fileName1).siblings(".custom-file-label").text("choose file");
			 $('#'+fileName2+'preview').empty();
		}

</script>

<script>
$(document).ready(function(){
    var max_input = 10;
    var x = 1;


if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
if($('#doctortype option:selected').val()=="Government doctor"){
	$('.hospitalsubtype').show();
}
$(document).on('change', '#doctortype', function(){
	if($('#doctortype option:selected').val()=="Government doctor"){
		$('.hospitalsubtype').show();
	}
	else{
		$('.hospitalsubtype').hide();
	}
});
});
</script>
