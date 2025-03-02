<?php include "header.php"; ?>
<script src="plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.min.css" integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw==" crossorigin="anonymous" /><script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3c8dbc;
    border-color: #367fa9;
    padding: 1px 10px;
    color: #fff;
}
  .required:after {
    content:" *";
    color: red;
  }
  .hospitalsubtype{
	  display:none;
  }
.ui-menu-item .ui-menu-item-wrapper.ui-state-active {
    background: #6693bc !important;
    font-weight: bold !important;
    color: #ffffff !important;
} 
ul.ui-autocomplete {
    list-style: none;
    list-style-type: none;
    margin: 0px;
    padding: 5px;
    background-color:white;
    z-index:5;
    border:1px solid black;
    width:50%;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hospitals</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Hospitals</li>
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
			<a href="viewhospital.php" class="btn btn-mammy float-right">View Hospitals</a>
			<button type="button" class="btn btn-mammy" id="btnspeciality">+ Add Speciality</button>
		  </div><br><br>
		  <div class="col-12">
			<div class="card card-primary specialityview" style="display:none">
				<div class="card-body">
					<h5>Add New Speciality</h5>
					<form id="addspeciality" method="POST" action="addspeciality">
						<div class="form-group specialityselectview">
						<label class="required">Speciality</label>
                        <select class="form-control" name="specialityselect" id="specialityselect">
							<option selected="" disabled="" value="null" class="hidden">--Select Speciality</option>
							<?php $specialityquery = mysqli_query($conn, "SELECT * FROM hospital_speciality");
								While($specialityrow= mysqli_fetch_assoc($specialityquery)){
									echo '<option value="'.$specialityrow["id"].'">'.$specialityrow["speciality"].'</option>';
								}
							?>
						</select>
						</div>
						<div class="form-group specialityselectview">
						  <label class="required" for="specialityname">Edit</label>
						  <input type="text" name="editselected" class="form-control" id="editselected" placeholder="Enter Edited text">
						</div>
						<div class="form-group newspeciality">
						  <label class="required" for="specialityname">Add</label>
						  <input type="text" name="specialityname" class="form-control" id="specialityname" placeholder="Specalist In">
						</div>
						<input type="submit" name="specialitysubmit" id="specialitysubmit" class="btn btn-mammy mr-4" value="Add">
						<input type="submit" name="specialityedit" id="specialityedit" class="btn btn-primary mr-4" value="Edit">
						<input type="hidden" name="specialityupdate" id="specialityupdate" class="btn btn-primary mr-4" value="Update">
						<input type="hidden" name="specialitydelete" id="specialitydelete" class="btn btn-secondary mr-4" value="Delete">
						<input type="hidden" name="specialitycancel" id="specialitycancel" class="btn btn-secondary" value="Cancel">

					</form>
				</div>
			</div>
		  </div>
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!--div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div-->
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="posthospital" enctype="multipart/form-data">
                <div class="card-body">
					<input type="hidden" id="catvalue">
				<div id="Hospital">
					<div class="form-group">
					  <label class="required" for="hospitalname">Name</label>
					  <input type="text" name="hospitalname" class="form-control" id="hospitalname" placeholder="Hospital Name">
					</div>
					<div class="form-group">
					  <label class="required">Speciality</label>
					  <select class="form-control select2" name="hospitalspecialist[]" id="hospitalspecialist" multiple data-placeholder='--Select Speciality--'>
                         
						<?php $query=mysqli_query($conn, "SELECT * FROM hospital_speciality");
						while($row=mysqli_fetch_array($query)){
						echo   '<option value="'.$row["speciality"].'">'.$row["speciality"].'</option>';
						}?>
                        </select>
					</div>
					<div class="form-group">
					  <label class="required" for="hospitaladdr">Hospital Address</label>
					  <input type="text" name="hospitaladdr" class="form-control" id="hospitaladdr" placeholder="Address">
					</div>
					<div class="form-group">
					  <label for="hospitalmap" class="required">Hospital Map location</label>
					  <input type="text" name="hospitalmap" class="form-control" id="hospitalmap" placeholder="Copy form Google Map by poining the location">
					</div>
					<div class="form-group">
					  <label class="required" for="hospitalcity">Hospital city(required to show for branches)</label>
					  <input type="text" name="hospitalcity" class="form-control" id="hospitalcity" placeholder="City">
					</div>
					<div class="form-group">
					  <label class="required" for="hospitalcont">Contact Number</label>
					  <input type="tel" name="hospitalcont" class="form-control" id="hospitalcont" placeholder="Contact Number">
					</div>
					<div class="form-group">
					  <label for="hospitalwhatsapp">Whatsapp Number</label>
					  <input type="tel" name="hospitalwhatsapp" class="form-control" id="hospitalwhatsapp" placeholder="Contact Number">
					</div>
					<div class="form-group">
					  <label class="required" for="hospitalemail">Email</label>
					  <input type="email" name="hospitalemail" class="form-control" id="hospitalemail" placeholder="Email ID">
					</div>
					<div class="form-group">
					  <label for="hospitalweb">Website</label>
					  <input type="url" name="hospitalweb" class="form-control" id="hospitalweb" placeholder="Website">
					</div>
					<div class="form-group">
					  <label class="required" for="hospitaltype">Hospital type</label>
					  <select class="form-control" name="hospitaltype" id="hospitaltype">
							<option selected="" disabled="" value="null" class="hidden">--Select Hospital Type</option>
							<option value="Government Hospital">Government Hospital</option>
							<option value="Private Hospital">Private Hospital</option>
					  </select>
					</div>
					<div class="form-group hospitalsubtype">
					  <label for="hospitalsubtype" class="required">Hospital Subtype</label>
					  <select class="form-control" name="hospitalsubtype" id="hospitalsubtype">
							<option selected="" disabled="" value="null" class="hidden">--Select Hospital Subype</option>
							<option value="National Hospital">National Hospital</option>
							<option value="Teaching Hospital">Teaching Hospital</option>
							<option value="Specialized Teaching Hospital">Specialized Teaching Hospital</option>
							<option value="Other Specialized Hospital">Other Specialized Hospital</option>
							<option value="Provincial General Hospital">Provincial General Hospital</option>
							<option value="Base Hospital Type - A">Base Hospital Type - A</option>
							<option value="Base Hospital Type - B">Base Hospital Type - B</option>
							<option value="Divisional Hospital Type - A">Divisional Hospital Type - A</option>
							<option value="Divisional Hospital Type - B">Divisional Hospital Type - B</option>
							<option value="Divisional Hospital Type - C">Divisional Hospital Type - C</option>
							<option value="Primary Medical Care Unit">Primary Medical Care Unit</option>
							<option value="Others">Others</option>
					  </select>
					</div>
					<div class="form-group">
					  <label class="required" for="hospitalworking">Hours of Operation</label>
					  <input type="text" name="hospitalworking" class="form-control" id="hospitalworking" placeholder="Working Hours">
					</div>
					
					<div class="form-group row">
						<div class="col-md-4">
						  <label for="hospitalfb">Facebook Link</label>
						  <input type="url" name="hospitalfb" class="form-control" id="hospitalfb" placeholder="Facebook Link">
						</div>
						<div class="col-md-4">
						  <label for="hospitalinsta">Instagram Link</label>
						  <input type="url" name="hospitalinsta" class="form-control" id="hospitalinsta" placeholder="Instagram Link">
						</div>
						<div class="col-md-4">
						  <label for="hospitalln">Linkedin Link</label>
						  <input type="url" name="hospitalln" class="form-control" id="hospitalln" placeholder="Linkedin Link">
						</div>
					</div>
					<div class="form-group">
						<label class="required">Status</label>
                        <select class="form-control" name="status" id="status">
                          <option selected="" disabled="" value="null" class="hidden">--Select Status</option>
						  <option value="Verified">Verified</option>
						  <option value="Not Verified">Not Verified</option>
						</select>
					</div>
					<div class="row">
					  <label class="required" for="about">About</label>
					  <textarea style="width:97%; height:180px; margin:auto" id="about" name="about" class="about" required></textarea>
					</div>
					
					<!--div class="form-group">
						<label >Priority</label>
                        <select class="form-control" name="priority" id="priority">
							<option selected="" disabled="" value="null" class="hidden">--Select Priority</option>
							<option value="0" selected>None</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>	
						</select>
					</div-->
					
					<div class="form-group">
						<label class="required" for="logoimage">logo Image</label>
						<div class="input-group">
						  <div class="custom-file">
							<input type="file" name="logoimage" class="custom-file-input" id="logoimage" accept="image/*">
							<label class="custom-file-label" for="logoimage">Choose file</label>
						 </div>
						</div>
					</div>
					<div class="form-group">
						<label class="required" for="featuredimage">Featured Image</label>
						<div class="input-group">
						  <div class="custom-file">
							<input type="file" name="featuredimage" class="custom-file-input" id="featuredimage"  accept="image/*">
							<label class="custom-file-label" for="featuredimage">Choose file</label>
						 </div>
						</div>
					</div>
					<div id="galleryimages">
					<div class="form-group">
                    <label class="required" for="galimages">Gallery Images</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="galimages[]" class="custom-file-input galimages" accept="image/*">
                        <label class="custom-file-label" for="galimages">Choose file</label>
                      </div>
                    </div>
					</div>
					</div>
					<button class="btn btn-primary add-image" style="float:left">Add More</button>
					<br>
					<br>
					<div class="form-group">
					  <label  for="videoembed">Embed Video</label>
					  <input type="text" name="videoembed" class="form-control" placeholder="Embed Video Code">
					</div>
					<p class="text-center  font-weight-bold">Or</p>
					<div class="form-group">
						<label for="galvideo">Gallery Video</label>
						<div class="input-group">
						  <div class="custom-file">
							<input type="file" name="galvideo" class="custom-file-input" id="galvideo" accept="video/*">
							<label class="custom-file-label" for="galvideo">Choose file</label>
						 </div>
						</div>
					</div>
					<br>
					<br>
					<div class="card-footer">
					  <button type="submit" name="sub-hos" class="btn btn-primary">Submit</button>
					</div>
				</div>
			  </form>
			</div>
		  </div>
		</div>
		</div>
		</div>
	</section>
	</div>
	
<?php include "footer.php"?>
<?php 
$citieslist= mysqli_query($conn, "SELECT distinct city from hospital");
$array = array();
while($row=mysqli_fetch_array($citieslist)){
    $array[] = $row['city'];
}
$cities= json_encode($array);
?>
 <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script>
$('.select2').select2();
$('#about').summernote({width:"100%", height:"250"});

$(function () {

  $('#quickForm').validate({
	  ignore: ":hidden, [contenteditable='true']:not([name])",
	  rules: {
      
      hospitalname: {
        required: true,
      },
	  'hospitalspecialist[]': {
        required: true,
      },
	 hospitalcont:{
		  required: true,
		  rangelength: [10, 12],
	  },
	  hospitalmap:{
		  required:true,
	  },
	  hospitaladdr: {
        required: true,
      },
	  hospitalcity:{
		  required: true,
	  },	  
	  hospitalemail: {
		required: true,
      },
	  hospitaltype: {
		required: true,
	  },
	  hospitalsubtype: {
		required: true,
	  },
	  hospitalworking: {
		required: true,
	  },
	  
	  status: {
		required: true,
	  },
	  about: {
		required: true,
	  },
	 	  
	  featuredimage: {
            required: true,
            extension: "jpg|jpeg|png"
	  },
	  "galimages[]": {
            required: true,
            extension: "jpg|jpeg|png"
      },
	  
	  logoimage: {
		  required: true,
		  extension: "jpg|jpeg|png"
	  }
    },
    messages: {
      
	},
	submitHandler: function(form) {
			var form_data = new FormData(form);

		$.ajax({
            type:form.method,
            url: form.action,
            mimeType: "multipart/form-data",
            data:form_data,
			contentType: false,
			cache: false,
			processData: false,
            success:function(data){
				if(data=='Posted Successfully'){
                removeReg(data, 'success');
				}
				else{
					removeReg(data, 'error');
				}
            },
            error: function(data){
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
$('#summernote').summernote({width:"100%", height:"250"});
$(document).on('change', '.custom-file-input', function (event) {
	if(event.target.files[length]){
    $(this).next('.custom-file-label').html(event.target.files[0].name);
	}
});
function removeReg(data, status) {
  Swal.fire({
      text: data,
      icon: status,
    })
    .then(function(value) {
      //console.log('returned value:', value);
if(data=="Posted Successfully" || data=="Speciality Added" || data=="Speciality Updated" || data=='Speciality Deleted'){
	  window.location.href="hospital";
	  }
	  
    });
};
$(document).ready(function(){
	$("#mpcategory option").each(function()
	{
		var value=$(this).val();
		$('#'+value).attr('hidden', true);
	});
    var max_input = 4;
    var x = 1;
$('.add-image').click(function (e) {
      e.preventDefault();
      var htmlfield='<div class="form-group">\
					<div class="input-group">\
                      <div class="custom-file">\
                        <input type="file" name="galimages[]" class="custom-file-input galimages" multiple>\
                        <label class="custom-file-label" for="galimages">Choose file</label>\
                      </div>\
					  </div>\
                    <a href="#" id="remove-lnk" style="float:right; margin-right:2rem; color:red">Remove</a></div>';
    if (x < max_input) { // validate the condition
        x++;
        $('#galleryimages').append(htmlfield);
    }
});
$('#galleryimages').on("click", "#remove-lnk", function (e) {
      e.preventDefault();
      $(this).parent('div').remove();  // remove input field
      x--; // decrement the counter
    });
});
/*$("#mpcategory").on('change', function() {
	$("#mpcategory option").each(function()
	{
		var value=$(this).val();
		$('#'+value).attr('hidden', true);
	});
	$('#catvalue').val($( "#mpcategory option:selected" ).val());
	var value= $("#catvalue").val();
		$('#'+value).attr('hidden', false);
	
});*/
$(document).on('click', "#btnspeciality", function(){
	$(".specialityview").toggle("slow");
	if($(this).text() == 'Cancel'){
		$("#btnspeciality").text("+ Add Speciality");
		$("#specialityupdate, #specialitydelete, #specialitycancel").attr('type','hidden');
		$("#specialitysubmit, #specialityedit, .newspeciality").show();
	}
	else 
		$("#btnspeciality").text("Cancel");
	$(".specialityselectview").hide();
	$(document).on('click', '#specialitysubmit', function(e){
		e.preventDefault();
		$('#specialitysubmit').attr('diabled', true);
		var specialityname = $('#specialityname').val();
		$.ajax({
            type:"POST",
            url: "posthospital",
            data:{specialityname:specialityname, specialitysubmit:"1"},
			beforeSend: function() {
				// setting a timeout
				$('#specialitysubmit').attr('diabled', true);
			},
            success:function(data){
				$('#specialitysubmit').attr('diabled', false);
				if(data=='Speciality Added'){
                removeReg(data, 'success');
				}
				else{
					removeReg(data, 'error');
				}
            },
            error: function(data){
				$('#specialitysubmit').attr('diabled', false);
                //console.log("error");
                console.log(data);
                removeReg(data, 'error');
            }
        });
	});
	$(document).on('click', '#specialityedit', function(e){
		e.preventDefault();
		$(".specialityselectview").show();
		$("#specialityupdate, #specialitydelete, #specialitycancel").attr('type','submit');
		$(".newspeciality, #specialitysubmit, #specialityedit").hide();
	});
	$(document).on('click', '#specialitycancel', function(e){
		e.preventDefault();
		$(".newspeciality, #specialitysubmit, #specialityedit").show();
		$(".specialityselectview").hide();
		$("#specialityupdate, #specialitydelete, #specialitycancel").attr('type','hidden');
	});
	$(document).on('click', '#specialityupdate', function(e){
		e.preventDefault();
		var specialityselect = $('#specialityselect option:selected').val();
		var edited = $('#editselected').val();
		if(specialityselect!="null"){
		$.ajax({
            type:"POST",
            url: "posthospital",
            data:{specialityselect:specialityselect, edited:edited, specialityupdate:"1"},
            success:function(data){
				if(data=='Speciality Updated'){
                removeReg(data, 'success');
				}
				else{
					removeReg(data, 'error');
				}
            },
            error: function(data){
                removeReg(data, 'error');
            }
        });
		}
		else{
			removeReg("Please select the speciality to be Updated", 'error');
		}
	});
	$(document).on('click', '#specialitydelete', function(e){
		e.preventDefault();
		var specialityselect = $('#specialityselect option:selected').val();
		var edited = $('#editselected').val();
		if(specialityselect!="null"){
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You want to Delete "+edited,
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		if (result.isConfirmed) {
		$.ajax({
            type:"POST",
            url: "posthospital",
            data:{specialityselect:specialityselect, specialitydelete:"1"},
            success:function(data){
				if(data=='Speciality Deleted'){
                removeReg(data, 'success');
				}
				else{
					removeReg(data, 'error');
				}
            },
            error: function(data){
                removeReg(data, 'error');
            }
        });
		}
		});
		}
		else{
			removeReg("Please select the speciality to be Updated", 'error');
		}
		
	});
})
if($('#hospitaltype option:selected').val()=="Government Hospital"){
	$('#hospitalsubtype').show();
}
$(document).on('change', '#hospitaltype', function(){
	if($('#hospitaltype option:selected').val()=="Government Hospital"){
		$('.hospitalsubtype').show();
	}
	else{
		$('.hospitalsubtype').hide();
	}
});
$( function() {
    var availableTags = <?php echo $cities; ?>;
    $( "#hospitalcity" ).autocomplete({
      source: availableTags
    });
  } );
</script>

</body>
</html>