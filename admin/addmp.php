<?php include "header.php"; ?>
<script src="plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.min.css" integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw==" crossorigin="anonymous" /><script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Directory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Directory</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!--div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div-->
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="postmp" enctype="multipart/form-data">
                <div class="card-body">
					<div class="form-group">
						<label>MP category</label>
                        <select class="form-control" name="mpcategory" id="mpcategory">
                          <option selected="" disabled="" value="null" class="hidden">--Select category</option>
						  <option value="Hospital">Hospitals</option>
                          <option value="Doctor">Doctors</option>
                          <option value="Midwife">Midwife Clinics</option>
                          <option value="Medical">Medical Clinics</option>
                          <option value="Pharamcy">Pharamacies</option>
                          <option value="Beauty">Beauty Salon</option>
                        </select>
					</div>
					<input type="hidden" id="catvalue">
				<div id="Hospital">
					<div class="form-group">
					  <label for="hospitalname">Name</label>
					  <input type="text" name="hospitalname" class="form-control" id="hospitalname" placeholder="Hospital Name">
					</div>
					<div class="form-group">
					  <label for="hospitalspecialist">Hospital Specialist In</label>
					  <input type="text" name="hospitalspecialist" class="form-control" id="hospitalspecialist" placeholder="Specialist In">
					</div>
					<div class="form-group">
					  <label for="hospitaladdr">Hospital Address</label>
					  <input type="text" name="hospitaladdr" class="form-control" id="hospitaladdr" placeholder="Address">
					</div>
					<div class="form-group">
					  <label for="hospitalmap">Hospital Map location</label>
					  <input type="text" name="hospitalmap" class="form-control" id="hospitalmap" placeholder="Copy form Google Map by poining the location">
					</div>
					<div class="form-group">
					  <label for="hospitalcity">Hospital city(required to show for branches)</label>
					  <input type="text" name="hospitalcity" class="form-control" id="hospitcity" placeholder="City">
					</div>
					<div class="form-group">
					  <label for="hospitalcont">Contact Number</label>
					  <input type="tel" name="hospitalcont" class="form-control" id="hospitalcont" placeholder="Contact Number">
					</div>
					<div class="form-group">
					  <label for="hospitalwhatsapp">Whatsapp Number</label>
					  <input type="tel" name="hospitalwhatsapp" class="form-control" id="hospitalwhatsapp" placeholder="Contact Number">
					</div>
					<div class="form-group">
					  <label for="hospitalemail">Email</label>
					  <input type="email" name="hospitalemail" class="form-control" id="hospitalemail" placeholder="Email ID">
					</div>
					<div class="form-group">
					  <label for="hospitalweb">Website</label>
					  <input type="url" name="hospitalweb" class="form-control" id="hospitalweb" placeholder="Website">
					</div>
					<div class="form-group">
					  <label for="hospitaltype">Hospital type</label>
					  <input type="text" name="hospitaltype" class="form-control" id="hospitaltype" placeholder="Hospital type">
					</div>
					<div class="form-group">
					  <label for="hospitalworking">Hours of Operation</label>
					  <input type="text" name="hospitalworking" class="form-control" id="hospitalworking" placeholder="Working Hours">
					</div>
					<div class="form-group">
					  <label for="hospitalrating">Hospital Rating</label>
					  <input type="number" name="hospitalrating" min="1" max="5" class="form-control" id="hospitalrating" placeholder="Hospital Rating(1-5)">
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
						<label>Status</label>
                        <select class="form-control" name="status" id="status">
                          <option selected="" disabled="" value="null" class="hidden">--Select Status</option>
						  <option value="Verified">Verified</option>
						  <option value="Not Verified">Not Verified</option>
						</select>
					</div>
					<div class="row">
					  <label for="about">About</label>
					  <textarea style="width:97%; height:180px; margin:auto" id="about" name="about" class="about" required></textarea>
					</div>
					<div class="form-group">
						<label for="featuredimage">Featured Image</label>
						<div class="input-group">
						  <div class="custom-file">
							<input type="file" name="featuredimage" class="custom-file-input" id="featuredimage" >
							<label class="custom-file-label" for="featuredimage">Choose file</label>
						 </div>
						</div>
					</div>
					<div id="galleryimages">
					<div class="form-group">
                    <label for="galimages">Gallery Images</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="galimages[]" class="custom-file-input" id="galimages">
                        <label class="custom-file-label" for="galimages">Choose file</label>
                      </div>
                    </div>
					</div>
					</div>
					<button class="btn btn-primary add-image" style="float:left">Add More</button>
					<br>
					<br>
					<div class="card-footer">
					  <button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				<div id="Doctor">
					<div class="form-group">
					  <label for="doctorname">Doctor Name</label>
					  <input type="text" name="doctorname" class="form-control" id="doctorname" placeholder="Doctor Name">
					</div>
					<div class="form-group">
					  <label for="qualification">Qualification</label>
					  <input type="text" name="qualification" class="form-control" id="qualification" placeholder="Doctor Qualification">
					</div>
					<div class="form-group">
					  <label for="specialist">Specialist</label>
					  <input type="text" name="specialist" class="form-control" id="specialist" placeholder="Specialist">
					</div>
					<div class="form-group">
					  <label for="visiting">Visiting Hospitals</label>
					  <input type="text" name="visiting" class="form-control" id="Visiting" placeholder="Visiting Hospitals(separate with comma)">
					</div>
					<div class="form-group">
						<label for="profileimg">Profile Image</label>
						<div class="input-group">
						  <div class="custom-file">
							<input type="file" name="profileimg" class="custom-file-input" id="profileimg" >
							<label class="custom-file-label" for="profileimg">Choose file</label>
						 </div>
						</div>
					</div>
					<div class="form-group">
					  <label for="email">Email ID</label>
					  <input type="email" name="email" class="form-control" id="email" placeholder="Email ID">
					</div>
					<div class="form-group">
					  <label for="mobile">Contact Number</label>
					  <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="Mobile Number">
					</div>
					<div class="card-footer">
					  <button type="submit" class="btn btn-primary">Submit</button>
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
 <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function () {

  $('#quickForm').validate({
	  ignore: ":hidden, [contenteditable='true']:not([name])",
	  rules: {
      mpcategory: {
        required: true,
      },
      hospitalname: {
        required: true,
      },
	  hospitalspecialist: {
        required: true,
      },
	  hospitaladdr: {
        required: true,
      },
	  hospitalemail: {
		email:true,
      },
	  hospitaltype: {
		required: true,
	  },
	  hospitalworking: {
		required: true,
	  },
	  hospitalrating: {
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
	  galimages: {
            required: true,
            extension: "jpg|jpeg|png"
      },
	  doctorname: {
		  required: true,
	  },
	  qualification: {
		  required: true,
	  },
	  profileimg: {
		  required: true,
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
                debugger
				if(data=='Posted Successfully'){
                removeReg(data, 'success');
				}
				else{
					removeReg(data, 'error');
				}
            },
            error: function(data){
                //console.log("error");
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
	  if(data=="Posted Successfully"){
	  window.location.href="addmp";
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
                        <input type="file" name="galimages[]" class="custom-file-input" id="galimages">\
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
$("#mpcategory").on('change', function() {
	$("#mpcategory option").each(function()
	{
		var value=$(this).val();
		$('#'+value).attr('hidden', true);
	});
	$('#catvalue').val($( "#mpcategory option:selected" ).val());
	var value= $("#catvalue").val();
		$('#'+value).attr('hidden', false);
	
});

</script>

