<?php include "header.php"; ?>
<script src="plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.min.css" integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw==" crossorigin="anonymous" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.all.min.js" integrity="sha512-S8dy60Ic3uMzmNBB0ocD0TaIBdciM2JLjG2ZRaOhjNwYYO6I1aeRg/mY+T/x4WSx9oh42HvqHB0c7aK3d17Qog==" crossorigin="anonymous"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Add Magazine</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Add Magazine</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
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
						<form id="quickForm" method="POST" action="postmagazine" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label>Magazine Language</label>
									<select class="form-control" name="language" id="language">
										<option selected="" disabled="" value="null" class="hidden">--Select Language</option>
										<option value="English">English</option>
										<option value="සිංහල">සිංහල</option>
										<option value="தமிழ்">தமிழ்</option>
									</select>
								</div>
								<div class="form-group">
									<label for="magazinetitle">Magazine Title</label>
									<input type="text" name="magazinetitle" class="form-control" id="magazinetitle" placeholder="Magazine Title">
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
								<div class="form-group">
									<label for="magazinefile">Magazine PDF Upload</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="magazinefile" class="custom-file-input" id="magazinefile" >
											<label class="custom-file-label" for="magazinefile">Choose file</label>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Submit</button>
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
	      language: {
	        required: true,
	      },
	      magazinetitle: {
	        required: true,
	      },
		  featuredimage: {
	            required: true,
	            extension: "jpg|jpeg|png"
		  },
		  magazinefile: {
	            required: true,
	            extension: "pdf"
	      },
	    },
	    messages: {
	      language: {
	        required: "Please select Article Language",
	      },
	      magazinetitle: {
	        required: "Please Enter Magazine Title",
	      },
		  featuredimage: {
	            required: "Please Choose featured image",
	            extension: "The image extension should be jpg/jpeg/png"
		  },
		  magazinefile: {
	            required: "Please Choose Magazine file",
	            extension: "The file extension should be pdf"
		  },
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
	$('.custom-file input').change(function (e) {
	        var files = [];
	        for (var i = 0; i < $(this)[0].files.length; i++) {
	            files.push($(this)[0].files[i].name);
	        }
	        $(this).next('.custom-file-label').html(files.join(', '));
	    });
	function removeReg(data, status) {
	  Swal.fire({
	      text: data,
	      icon: status,
	    })
	    .then(function(value) {
	      console.log('returned value:', value);
		  window.location.href="magazinelist";
		  
	    });
	}
</script>