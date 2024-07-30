<?php include "header.php"; ?>
<script src="plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.7/sweetalert2.min.css" integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw==" crossorigin="anonymous" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
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
	.studiosubtype{
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
<?php 
    $days = ['mon' => 'monday', 'tue' => 'tuesday', 'wed' => 'wednesday', 'thu' => 'thursday', 'fri' => 'friday', 'sat' => 'saturday', 'sun' => 'sunday'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Studios</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><a href="viewstudio">Studios</a></li>
						<li class="breadcrumb-item active">Add Studios</li>
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
				<div class="col-12">
					<a href="viewstudio.php" class="btn btn-mammy float-right">View Studios</a>
					<button type="button" class="btn btn-mammy" id="btnspeciality">+ Add Speciality</button>
				</div>
				<br><br>
				<div class="col-12">
					<div class="card card-primary specialityview" style="display:none">
						<div class="card-body">
							<h5>Add New Speciality</h5>
							<form id="addspeciality" method="POST" action="addspeciality">
								<div class="form-group specialityselectview">
									<label class="required">Speciality</label>
									<select class="form-control" name="specialityselect" id="specialityselect">
										<option selected="" disabled="" value="null" class="hidden">--Select Speciality</option>
										<?php $specialityquery = mysqli_query($conn, "SELECT * FROM studio_speciality");
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
								<input type="hidden" name="specialitycancel" id="specialitycancel" class="btn btn-sm btn-secondary" value="Cancel">
							</form>
						</div>
					</div>
				</div>
				<!-- left column -->
				<div class="col-md-12">
					<div class="card card-primary">
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#new" role="tab">New Studio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#addbranch" role="tab">Add Branch</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="new" role="tabpanel">
                                    <div id="Studio">
                                        <form id="quickForm" method="POST" action="poststudio" enctype="multipart/form-data">
                                            <?php
                                                $studioQuery = mysqli_query($conn, "SELECT DISTINCT * FROM studio WHERE is_main = 'Y'");
                                            ?>
                                            <div class="form-group branch">
                                                <label class="required" for="mainId">Studio Name</label>
                                                <select name="mainId" class="form-control" id="mainId" required>
                                                    <option value="">Select Studio</option>
                                                    <?php
                                                    while ($studioRow = mysqli_fetch_array($studioQuery)) {
                                                        $studioArray = explode(" ///", $studioRow['name']);
                                                        $studioidArray = explode(" ///", $studioRow['id']);
                                                        
                                                        for ($i = 0; $i < count($studioArray); $i++) {
                                                            $name = $studioArray[$i];
                                                            $id = $studioidArray[$i];
                                                            echo '<option value="' . $id . '">' . $name . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
												<label class="required" for="studioname">Studio Name</label>
												<input type="text" name="studioname" class="form-control" id="studioname" placeholder="Studio Name">
											</div>
											<div class="form-group">
												<label class="required">Speciality</label>
												<select class="form-control select2" name="studiospecialist[]" id="studiospecialist" multiple data-placeholder='--Select Speciality--'>
												<?php $query=mysqli_query($conn, "SELECT * FROM studio_speciality");
													while($row=mysqli_fetch_array($query)){
													echo   '<option value="'.$row["speciality"].'">'.$row["speciality"].'</option>';
													}?>
												</select>
											</div>
											<div class="form-group row">
												<div class="col-md-6">
													<label class="required" for="studioregno">Studio Registration No</label>
													<input type="text" name="studioregno" class="form-control" id="studioregno" placeholder="Registration No">
												</div>
												<div class="col-md-6">
													<label class="required" for="studioestablishment">Year of Establishment</label>
													<input type="text" name="studioestablishment" class="form-control" id="studioestablishment" placeholder="Establishment">
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6">
													<label class="required" for="profileimage">Profile Image</label>
													<div class="input-group">
														<div class="custom-file">
															<input type="file" name="profileimage" class="custom-file-input" id="profileimage"  accept="image/*">
															<label class="custom-file-label" for="profileimage">Choose file</label>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<label for="coverimage">Cover Image</label>
													<div class="input-group">
														<div class="custom-file">
															<input type="file" name="coverimage" class="custom-file-input" id="coverimage"  accept="image/*">
															<label class="custom-file-label" for="coverimage">Choose file</label>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="required" for="studioaddr">Studio Address</label>
												<input type="text" name="studioaddr" class="form-control" id="studioaddr" placeholder="Address">
											</div>
											<div class="form-group">
												<label for="studiomap" class="required">Studio Map location</label>
												<input type="text" name="studiomap" class="form-control" id="studiomap" placeholder="Copy form Google Map by poining the location">
											</div>
											<div class="form-group">
												<label class="required" for="studiocity">Studio city(required to show for branches)</label>
												<input type="text" name="studiocity" class="form-control" id="studiocity" placeholder="City">
											</div>
											<div class="form-group">
												<label class="required" for="studiocontactperson">Studio Contact Person</label>
												<input type="text" name="studiocontactperson" class="form-control" id="studiocontactperson" placeholder="Address">
											</div>
											<div class="form-group">
												<label class="required" for="studiocont">Contact Number</label>
												<input type="tel" name="studiocont" class="form-control" id="studiocont" placeholder="Contact Number">
											</div>
											<div class="form-group">
												<label for="studiowhatsapp">Whatsapp Number</label>
												<input type="tel" name="studiowhatsapp" class="form-control" id="studiowhatsapp" placeholder="Contact Number">
											</div>
											<div class="form-group">
												<label class="required" for="studioemail">Email</label>
												<input type="email" name="studioemail" class="form-control" id="studioemail" placeholder="Email ID">
											</div>
											<div class="form-group">
												<label for="studioweb">Website</label>
												<input type="url" name="studioweb" class="form-control" id="studioweb" placeholder="Website">
											</div>
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
                                                        <!-- PHP to generate days and time inputs -->
                                                        <?php foreach ($days as $abbr => $day): ?>
                                                            <tr>
                                                                <td><?php echo ucfirst($day); ?></td>
                                                                <td>
                                                                    <input type="time" 
                                                                        name="<?php echo $abbr; ?>opentime" 
                                                                        class="form-control form-control-sm border-0" 
                                                                        id="<?php echo $abbr; ?>opentime" 
                                                                        placeholder="<?php echo ucfirst($day); ?> Open Time" 
                                                                    >
                                                                </td>
                                                                <td>
                                                                    <input type="time" 
                                                                        name="<?php echo $abbr; ?>endtime" 
                                                                        class="form-control form-control-sm border-0" 
                                                                        id="<?php echo $abbr; ?>endtime" 
                                                                        placeholder="<?php echo ucfirst($day); ?> End Time" 
                                                                    >
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-sm btn-info" onclick="clearTimeInputs('<?php echo $abbr; ?>')">Clear</button>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="form-group row">
												<div class="col-md-3">
													<label for="studiofb">Facebook Link</label>
													<input type="url" name="studiofb" class="form-control" id="studiofb" placeholder="Facebook Link">
												</div>
												<div class="col-md-3">
													<label for="studioinsta">Instagram Link</label>
													<input type="url" name="studioinsta" class="form-control" id="studioinsta" placeholder="Instagram Link">
												</div>
												<div class="col-md-3">
													<label for="studioln">TikTok Link</label>
													<input type="url" name="studioln" class="form-control" id="studioln" placeholder="TikTok Link">
												</div>
												<div class="col-md-3">
													<label for="studioyt">Youtube Link</label>
													<input type="url" name="studioyt" class="form-control" id="studioyt" placeholder="Youtube Link">
												</div>
											</div>
											<div class="form-group">
												<label class="required" for="about">About</label>
												<textarea class="form-control" id="about" name="about" class="about" required></textarea>
											</div>
											<div class="form-group">
												<label class="required" for="service">Services</label>
												<input type="text" data-role="tagsinput" class="form-control" id="service" name="service" placeholder="Service">
											</div>
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
											<button class="btn btn-sm btn-primary add-image" style="float:left">Add More</button>
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
                                                <input class="isMain"  name="isMain" type="hidde" hidden/>
                                         
												<button type="submit" name="sub-mid" class="btn btn-sm btn-primary">Submit</button>
											</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include "footer.php"?>
<?php 
	$citieslist= mysqli_query($conn, "SELECT distinct city from studio");
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
	
	$(function () {
	
	  $('#quickForm').validate({
		  ignore: ":hidden, [contenteditable='true']:not([name])",
		  rules: {
	      
	      studioname: {
	        required: true,
	      },
		  'studiospecialist[]': {
	        required: true,
	      },
		 studiocont:{
			  required: true,
			  rangelength: [10, 12],
		  },
		  studiomap:{
			  required:true,
		  },
		  studioaddr: {
	        required: true,
	      },
		  studiocity:{
			  required: true,
		  },	  
		  studioemail: {
			required: true,
	      },
		  studioestablishment: {
			required: true,
	      },
		  studiocontactperson: {
			required: true,
		  },
		  studioworking: {
			required: true,
		  },
		  
		  status: {
			required: true,
		  },
		  about: {
			required: true,
		  },
		  profileimage: {
	            required: true,
	            extension: "jpg|jpeg|png"
		  },
		  coverimage: {
	            extension: "jpg|jpeg|png"
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
		  window.location.href="studio";
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

		$('.add-image-branch').click(function (e) {
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
				$('#branchgalleryimages').append(htmlfield);
			}
		});
		$('#branchgalleryimages').on("click", "#remove-lnk", function (e) {
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
	            url: "poststudio",
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
	            url: "poststudio",
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
	            url: "poststudio",
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
	if($('#studiotype option:selected').val()=="Government Studio"){
		$('#studiosubtype').show();
	}
	$(document).on('change', '#studiotype', function(){
		if($('#studiotype option:selected').val()=="Government Studio"){
			$('.studiosubtype').show();
		}
		else{
			$('.studiosubtype').hide();
		}
	});
	$( function() {
	    var availableTags = <?php echo $cities; ?>;
	    $( "#studiocity" ).autocomplete({
	      source: availableTags
	    });
	  } );
</script>
<script>
    $(document).ready(function () {
        $('a[href="#new"]').tab('show');
        $(".branch").hide();
        $(".isMain").val('Y');
        $('a[data-toggle="tab"]').on('click', function (e) {
            var target = $(e.target).attr("href");
            if (target === "#new") {
                $(".branch").hide();
                $(".new").show();
                $(".isMain").val('Y');
            } else if (target === "#addbranch") {
                $(".branch").show();
                $(".new").hide();
                $(".isMain").val('N');
            }
        });
    });
</script>
</body>
</html>