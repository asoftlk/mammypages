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
	.midwifesubtype{
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
					<h1>Midwifes</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Midwifes</li>
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
					<a href="viewmidwife.php" class="btn btn-mammy float-right">View Midwifes</a>
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
										<?php $specialityquery = mysqli_query($conn, "SELECT * FROM midwife_speciality");
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
						<div class="card-body">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#new" role="tab">New midwife</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#addbranch" role="tab">Add branch</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="new" role="tabpanel">
									<input type="hidden" id="catvalue">
									<div id="Midwife">
										<form id="quickForm" method="POST" action="postmidwife" enctype="multipart/form-data">
											<div class="form-group">
												<label class="required" for="midwifename">Name</label>
												<input type="text" name="midwifename" class="form-control" id="midwifename" placeholder="Midwife Name">
											</div>
											<div class="form-group">
												<label class="required">Speciality</label>
												<select class="form-control select2" name="midwifespecialist[]" id="midwifespecialist" multiple data-placeholder='--Select Speciality--'>
												<?php $query=mysqli_query($conn, "SELECT * FROM midwife_speciality");
													while($row=mysqli_fetch_array($query)){
													echo   '<option value="'.$row["speciality"].'">'.$row["speciality"].'</option>';
													}?>
												</select>
											</div>
											<div class="form-group">
												<label class="required" for="midwifeaddr">Midwife Address</label>
												<input type="text" name="midwifeaddr" class="form-control" id="midwifeaddr" placeholder="Address">
											</div>
											<div class="form-group">
												<label for="midwifemap" class="required">Midwife Map location</label>
												<input type="text" name="midwifemap" class="form-control" id="midwifemap" placeholder="Copy form Google Map by poining the location">
											</div>
											<div class="form-group">
												<label class="required" for="midwifecity">Midwife city(required to show for branches)</label>
												<input type="text" name="midwifecity" class="form-control" id="midwifecity" placeholder="City">
											</div>
											<div class="form-group">
												<label class="required" for="midwifecont">Contact Number</label>
												<input type="tel" name="midwifecont" class="form-control" id="midwifecont" placeholder="Contact Number">
											</div>
											<div class="form-group">
												<label for="midwifewhatsapp">Whatsapp Number</label>
												<input type="tel" name="midwifewhatsapp" class="form-control" id="midwifewhatsapp" placeholder="Contact Number">
											</div>
											<div class="form-group">
												<label class="required" for="midwifeemail">Email</label>
												<input type="email" name="midwifeemail" class="form-control" id="midwifeemail" placeholder="Email ID">
											</div>
											<div class="form-group">
												<label for="midwifeweb">Website</label>
												<input type="url" name="midwifeweb" class="form-control" id="midwifeweb" placeholder="Website">
											</div>
											<div class="form-group">
												<label class="required" for="midwifetype">Midwife type</label>
												<select class="form-control" name="midwifetype" id="midwifetype">
													<option selected="" disabled="" value="null" class="hidden">--Select Midwife Type</option>
													<option value="Government Midwife">Government Midwife</option>
													<option value="Private Midwife">Private Midwife</option>
												</select>
											</div>
											<div class="form-group midwifesubtype">
												<label for="midwifesubtype" class="required">Midwife Subtype</label>
												<select class="form-control" name="midwifesubtype" id="midwifesubtype">
													<option selected="" disabled="" value="null" class="hidden">--Select Midwife Subype</option>
													<option value="National Midwife">National Midwife</option>
													<option value="Teaching Midwife">Teaching Midwife</option>
													<option value="Specialized Teaching Midwife">Specialized Teaching Midwife</option>
													<option value="Other Specialized Midwife">Other Specialized Midwife</option>
													<option value="Provincial General Midwife">Provincial General Midwife</option>
													<option value="Base Midwife Type - A">Base Midwife Type - A</option>
													<option value="Base Midwife Type - B">Base Midwife Type - B</option>
													<option value="Divisional Midwife Type - A">Divisional Midwife Type - A</option>
													<option value="Divisional Midwife Type - B">Divisional Midwife Type - B</option>
													<option value="Divisional Midwife Type - C">Divisional Midwife Type - C</option>
													<option value="Primary Medical Care Unit">Primary Medical Care Unit</option>
													<option value="Others">Others</option>
												</select>
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
														<tr>
															<td>Monday</td>
															<td><input type="time" name="monopentime" class="form-control form-control-sm border-0" id="monopentime" placeholder="Monday Open Time"></td>
															<td><input type="time" name="monendtime" class="form-control form-control-sm border-0" id="monendtime" placeholder="Monday End Time"></td>
														</tr>
														<tr>
															<td>Tuesday</td>
															<td><input type="time" name="tueopentime" class="form-control form-control-sm border-0" id="tueopentime" placeholder="Tuesday Open Time"></td>
															<td><input type="time" name="tueendtime" class="form-control form-control-sm border-0" id="tueendtime" placeholder="Tuesday End Time"></td>
														</tr>
														<tr>
															<td>Wednesday</td>
															<td><input type="time" name="wedopentime" class="form-control form-control-sm border-0" id="wedopentime" placeholder="Wednesday Open Time"></td>
															<td><input type="time" name="wedendtime" class="form-control form-control-sm border-0" id="wedendtime" placeholder="Wednesday End Time"></td>
														</tr>
														<tr>
															<td>Thursday</td>
															<td><input type="time" name="thuopentime" class="form-control form-control-sm border-0" id="thuopentime" placeholder="Thursday Open Time"></td>
															<td><input type="time" name="thuendtime" class="form-control form-control-sm border-0" id="thuendtime" placeholder="Thursday End Time"></td>
														</tr>
														<tr>
															<td>Friday</td>
															<td><input type="time" name="friopentime" class="form-control form-control-sm border-0" id="friopentime" placeholder="Friday Open Time"></td>
															<td><input type="time" name="friendtime" class="form-control form-control-sm border-0" id="friendtime" placeholder="Friday End Time"></td>
														</tr>
														<tr>
															<td>Saturday</td>
															<td><input type="time" name="satopentime" class="form-control form-control-sm border-0" id="satopentime" placeholder="Saturday Open Time"></td>
															<td><input type="time" name="satendtime" class="form-control form-control-sm border-0" id="satendtime" placeholder="Saturday End Time"></td>
														</tr>
														<tr>
															<td>Sunday</td>
															<td><input type="time" name="sunopentime" class="form-control form-control-sm border-0" id="sunopentime" placeholder="Sunday Open Time"></td>
															<td><input type="time" name="sunendtime" class="form-control form-control-sm border-0" id="sunendtime" placeholder="Sunday End Time"></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="form-group row">
												<div class="col-md-4">
													<label for="midwifefb">Facebook Link</label>
													<input type="url" name="midwifefb" class="form-control" id="midwifefb" placeholder="Facebook Link">
												</div>
												<div class="col-md-4">
													<label for="midwifeinsta">Instagram Link</label>
													<input type="url" name="midwifeinsta" class="form-control" id="midwifeinsta" placeholder="Instagram Link">
												</div>
												<div class="col-md-4">
													<label for="midwifeln">Linkedin Link</label>
													<input type="url" name="midwifeln" class="form-control" id="midwifeln" placeholder="Linkedin Link">
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
												<button type="submit" name="sub-mid" class="btn btn-sm btn-primary">Submit</button>
											</div>
										</form>
										</div>
									</div>
									<div class="tab-pane" id="addbranch" role="tabpanel">
										<div id="branch">
											<form id="quickForm" method="POST" action="postmidwifebranch" enctype="multipart/form-data">
												<?php
													$midwifeQuery = mysqli_query($conn, "SELECT DISTINCT * FROM midwife");
												?>
												<div class="form-group">
													<label class="required" for="bmidwifename">Midwife Name</label>
													<select name="bmidwifename" class="form-control" id="bmidwifename" required>
														<option value="">Select midwife</option>
														<?php
														while ($midwifeRow = mysqli_fetch_array($midwifeQuery)) {
															$midwifeArray = explode(" ///", $midwifeRow['name']);
															$midwifeidArray = explode(" ///", $midwifeRow['midwife_id']);
															
															for ($i = 0; $i < count($midwifeArray); $i++) {
																$name = $midwifeArray[$i];
																$id = $midwifeidArray[$i];
																echo '<option value="' . $id . '">' . $name . '</option>';
															}
														}
														?>
													</select>

												</div>
												<div class="form-group">
													<label class="required" for="branchname">Branch Name</label>
													<input type="text" name="branchname" class="form-control" id="branchname" placeholder="Branch Name" required>
												</div>
												<div class="form-group">
													<label class="required" for="branchaddr">Branch Address</label>
													<input type="text" name="branchaddr" class="form-control" id="branchaddr" placeholder="Address" required>
												</div>
												<div class="form-group">
													<label for="branchmap" class="required">Branch Map location</label>
													<input type="text" name="branchmap" class="form-control" id="branchmap" placeholder="Copy form Google Map by poining the location" required>
												</div>
												<div class="form-group">
													<label class="required" for="branchcity">Branch city(required to show for branches)</label>
													<input type="text" name="branchcity" class="form-control" id="branchcity" placeholder="City" required>
												</div>
												<div class="form-group">
													<label class="required" for="branchcont">Contact Number</label>
													<input type="tel" name="branchcont" class="form-control" id="branchcont" placeholder="Contact Number" required>
												</div>
												<div class="form-group">
													<label for="branchwhatsapp">Whatsapp Number</label>
													<input type="tel" name="branchwhatsapp" class="form-control" id="branchwhatsapp" placeholder="Whatsapp Number">
												</div>
												<div class="form-group">
													<label class="required" for="branchemail">Email</label>
													<input type="email" name="branchemail" class="form-control" id="branchemail" placeholder="Email ID" required>
												</div>
												<div class="form-group">
													<label for="branchweb">Website</label>
													<input type="url" name="branchweb" class="form-control" id="branchweb" placeholder="Website">
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
															<tr>
																<td>Monday</td>
																<td><input type="time" name="monopentime" class="form-control form-control-sm border-0" id="monopentime" placeholder="Monday Open Time"></td>
																<td><input type="time" name="monendtime" class="form-control form-control-sm border-0" id="monendtime" placeholder="Monday End Time"></td>
															</tr>
															<tr>
																<td>Tuesday</td>
																<td><input type="time" name="tueopentime" class="form-control form-control-sm border-0" id="tueopentime" placeholder="Tuesday Open Time"></td>
																<td><input type="time" name="tueendtime" class="form-control form-control-sm border-0" id="tueendtime" placeholder="Tuesday End Time"></td>
															</tr>
															<tr>
																<td>Wednesday</td>
																<td><input type="time" name="wedopentime" class="form-control form-control-sm border-0" id="wedopentime" placeholder="Wednesday Open Time"></td>
																<td><input type="time" name="wedendtime" class="form-control form-control-sm border-0" id="wedendtime" placeholder="Wednesday End Time"></td>
															</tr>
															<tr>
																<td>Thursday</td>
																<td><input type="time" name="thuopentime" class="form-control form-control-sm border-0" id="thuopentime" placeholder="Thursday Open Time"></td>
																<td><input type="time" name="thuendtime" class="form-control form-control-sm border-0" id="thuendtime" placeholder="Thursday End Time"></td>
															</tr>
															<tr>
																<td>Friday</td>
																<td><input type="time" name="friopentime" class="form-control form-control-sm border-0" id="friopentime" placeholder="Friday Open Time"></td>
																<td><input type="time" name="friendtime" class="form-control form-control-sm border-0" id="friendtime" placeholder="Friday End Time"></td>
															</tr>
															<tr>
																<td>Saturday</td>
																<td><input type="time" name="satopentime" class="form-control form-control-sm border-0" id="satopentime" placeholder="Saturday Open Time"></td>
																<td><input type="time" name="satendtime" class="form-control form-control-sm border-0" id="satendtime" placeholder="Saturday End Time"></td>
															</tr>
															<tr>
																<td>Sunday</td>
																<td><input type="time" name="sunopentime" class="form-control form-control-sm border-0" id="sunopentime" placeholder="Sunday Open Time"></td>
																<td><input type="time" name="sunendtime" class="form-control form-control-sm border-0" id="sunendtime" placeholder="Sunday End Time"></td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="form-group row">
													<div class="col-md-4">
														<label for="branchfb">Facebook Link</label>
														<input type="url" name="branchfb" class="form-control" id="branchfb" placeholder="Facebook Link">
													</div>
													<div class="col-md-4">
														<label for="branchinsta">Instagram Link</label>
														<input type="url" name="branchinsta" class="form-control" id="branchinsta" placeholder="Instagram Link">
													</div>
													<div class="col-md-4">
														<label for="branchln">Linkedin Link</label>
														<input type="url" name="branchln" class="form-control" id="branchln" placeholder="Linkedin Link">
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
												<div class="form-group row ml-2">
													<label class="required" for="branchabout">About</label>
													<textarea style="width:97%; height:180px; margin:auto" id="branchabout" name="branchabout" class="about" required></textarea>
												</div>
												<div class="form-group">
													<label class="required" for="logoimage">logo Image</label>
													<div class="input-group">
														<div class="custom-file">
															<input type="file" name="logoimage" class="custom-file-input" id="logoimage" accept="image/*">
															<label class="custom-file-label" for="logoimage" required>Choose file</label>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="required" for="featuredimage">Featured Image</label>
													<div class="input-group">
														<div class="custom-file">
															<input type="file" name="featuredimage" class="custom-file-input" id="featuredimage"  accept="image/*">
															<label class="custom-file-label" for="featuredimage" required>Choose file</label>
														</div>
													</div>
												</div>
												<div id="branchgalleryimages">
													<div class="form-group">
														<label for="galimages">Gallery Images</label>
														<div class="input-group">
															<div class="custom-file">
																<input type="file" name="galimages[]" class="custom-file-input galimages" accept="image/*">
																<label class="custom-file-label" for="galimages">Choose file</label>
															</div>
														</div>
													</div>
												</div>
												<button class="btn btn-sm btn-primary add-image-branch" style="float:left">Add More</button>
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
												<div class="card-footer">
													<button type="submit" name="sub-mid-branch" class="btn btn-sm btn-primary">Submit</button>
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
		</div>
	</section>
</div>
<?php include "footer.php"?>
<?php 
	$citieslist= mysqli_query($conn, "SELECT distinct city from midwife");
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
	$('#branchabout').summernote({width:"100%", height:"250"});
	
	$(function () {
	
	  $('#quickForm').validate({
		  ignore: ":hidden, [contenteditable='true']:not([name])",
		  rules: {
	      
	      midwifename: {
	        required: true,
	      },
		  'midwifespecialist[]': {
	        required: true,
	      },
		 midwifecont:{
			  required: true,
			  rangelength: [10, 12],
		  },
		  midwifemap:{
			  required:true,
		  },
		  midwifeaddr: {
	        required: true,
	      },
		  midwifecity:{
			  required: true,
		  },	  
		  midwifeemail: {
			required: true,
	      },
		  midwifetype: {
			required: true,
		  },
		  midwifesubtype: {
			required: true,
		  },
		  midwifeworking: {
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
		  window.location.href="midwife";
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
	            url: "postmidwife",
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
	            url: "postmidwife",
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
	            url: "postmidwife",
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
	if($('#midwifetype option:selected').val()=="Government Midwife"){
		$('#midwifesubtype').show();
	}
	$(document).on('change', '#midwifetype', function(){
		if($('#midwifetype option:selected').val()=="Government Midwife"){
			$('.midwifesubtype').show();
		}
		else{
			$('.midwifesubtype').hide();
		}
	});
	$( function() {
	    var availableTags = <?php echo $cities; ?>;
	    $( "#midwifecity" ).autocomplete({
	      source: availableTags
	    });
	  } );
</script>
</body>
</html>