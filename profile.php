 <?php include "db.php"; 
 $email=$_SESSION['userid'];
 $profilequery=mysqli_query($conn, "SELECT * FROM users_reg WHERE email= '$email'");
 if(mysqli_num_rows($profilequery)>0){
	 $profiledetails= mysqli_fetch_array($profilequery);
 }
 ?> 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="admin/plugins/select2/css/select2.min.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="admin/plugins/select2/js/select2.full.min.js"></script>

 <style>
 .profiledetails{
	 text-decoration:none;
	 color: #111; 
	 padding-bottom:0.8rem; 
	 font-weight:600;
	 font-size:14px;
 }
 .profile a.active{
	 color:#68cf68!important;
 }
 .profiledetails:hover{
	 text-decoration:none;
	 color:#68cf68;
 }
 .form-control:disabled, .form-control[readonly] {
    //background-color: white!important;
    //opacity: 1;
}

.next-step1 { 
	background: #10D59D; 
	border: 1px solid #10D399;
	float: right;
	text-transform:uppercase;
    margin-top: 1%;
    margin-right: 1%;
    border: none;
    border-radius: 0.5rem;
    padding: 1%;
    color: #fff;
    font-weight: 600;
    min-width: 100px;
    cursor: pointer;
} 
.next-step1:hover { 
	background-color: #2F8D46
} 
.date_field {position: relative; z-index:100;}
.select2-container {
    display: block;
}
.select2-container--default .select2-selection--multiple {
    border: 1px solid #ced4da;
    min-height: 42px;
}
.ui-datepicker{
	z-index:5!important;
}
 </style>
 <script>
  $(document).ready(function() {
    $( "#pregnancy" ).hide();
    $("#children").hide();
  });
 </script>
 
 <div class="col-md-9" style="padding:0">    
    <div style="display:flex; justify-content:space-between; background-color:white; color: #68cf68; border-bottom:2px solid #f4f4f4; padding:10px"><h6><b>Profile</b></h6>
	<!--button type="button" id="edit" class="login-btn" style="float:right; border:none; font-weight:600; margin:0"> Edit </button-->
	</div>
    <div class="row">
		<div class="col-md-4" style="border-right:1px solid #dddddd;">
			<div class="row profile" style="margin-left:2rem; margin-top:2rem"> 
			<a href="#" class="profiledetails active">PERSONAL DETAILS</a>
			<a href="#" class="profiledetails">FAMILY DETAILS</a>
			<a href="#" class="profiledetails">PARTNER DETAILS</a>
			<a href="#" class="profiledetails">LOGIN DETAILS</a>
			</div>
		</div>
		<div class="col-md-8">
		<div class="row" style="padding:1rem">
			<div id="personalDetails">
			<form id="form" method = "POST" action="ajax/profileupdate" enctype="multipart/form-data"> 
			<input type="hidden" name="userid" value="<?php echo $profiledetails['userid'];?>">
				<p style="padding-left:0.3rem; color:#68cf68;padding-top:1rem;font-weight:600; font-size:15px;">PERSONAL DETAILS</p>
						<div class="form-group row required">
                                <label for="staticEmail" class="col-md-4 col-form-label">First Name<sup style="color:red">*</sup></label>
                                <div class="col-md-8">
                                    <input type="text" name="firstName" id="firstName" placeholder="First Name" required="" value="<?php echo $profiledetails['first_name'];?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  for="MiddleName" class="col-md-4 col-form-label">Middle Name</label>
                                <div  class="col-md-8">
                                    <input  type="text" name="middleName" value="<?php echo $profiledetails['middle_name'];?>" class="form-control" >
                                </div>
                            </div>
                            <div  class="form-group row">
                                <label  for="lastName" class="col-md-4 col-form-label">Last Name</label>
                                <div  class="col-md-8">
                                    <input  type="text" name="lastName" value="<?php echo $profiledetails['last_name'];?>" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group row"><label  for="MiddleName" class="col-md-4 col-form-label"  title="">Date of Birth<sup style="color:red">*</sup></label>
                                <div  class="col-md-8 d-flex">
								<!--input type="text" id="datepicker"-->
                                    <input  type="text" id="datepicker" name="dateOfBirth" placeholder="DD/MM/YYYY" required="" value="<?php  $dateOfBirth=date_create_from_format("Y-m-d",$profiledetails['dob']);   echo $dateOfBirth = date_format($dateOfBirth,"d/m/Y");?>" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group row"><label  for="addressLine1" class="col-md-4 col-form-label">Address Line 1<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
                                    <input  type="text" name="addressLine1" placeholder="Address Line 1" required="" value="<?php echo $profiledetails['address1'];?>" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group row"><label  for="Address_Line2" class="col-md-4 col-form-label">Address Line 2<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
                                    <input  type="text" name="Address_Line2" id="ship-address" placeholder="Address Line 2" required="" autocomplete="off" value="<?php echo $profiledetails['address2'];?>" class="form-control">
                                </div>
                            </div>
							<div class="form-group required row"><label for="City" class="col-md-4 col-form-label">City<sup style="color:red">*</sup></label>
								<div class="col-md-8">
									<input type="text" id="locality" name="city" placeholder="City" required="" value="<?php echo $profiledetails['city'];?>" class="form-control" >
								</div>
							</div>
							<div class="form-group required row"><label for="Province" class="col-md-4 col-form-label">Province<sup style="color:red">*</sup></label>
								<div class="col-md-8">
									<input name="Province" placeholder="Province" id="state" required="" value="<?php echo $profiledetails['province'];?>" class="form-control ">
									</div>
								</div>
                            <div class="form-group row"><label for="Country" class="col-md-4 col-form-label">Country<sup style="color:red">*</sup></label>
								<div class="col-md-8">
									<input type="text" id="country" name="country" placeholder="Country" required=""  value="<?php echo $profiledetails['country'];?>" class="form-control" >
								</div>
							</div>
							<input type="submit" name="submit"	id="submitpersonal" class="next-step1" value="UPDATE PERSONAL DETAILS" />
			</form>	
			</div>
			<div id="familyDetails">
				<form id="form1" method = "POST" action="ajax/profileupdate" enctype="multipart/form-data"> 
				<input type="hidden" name="userid" value="<?php echo $profiledetails['userid'];?>">
				<p style="padding-left:0.3rem; color:#68cf68;padding-top:1rem;font-weight:600; font-size:15px;">FAMILY DETAILS</p>
				<div class="form-group row"><label for="customFile" class="col-md-4 col-form-label">Choose Profile Picture</label>
				<div class="col-md-8"><div class="custom-file d-flex">
					<input type="file" class="custom-file-input" id="customFile" name="profilePicture" accept=".png,.jpg,.jpeg">
					<i class="fa fa-info-circle" data-toggle="tooltip" title="This is for your identity verification purpose (To avoid fake users)" aria-hidden="true" style="margin:auto"></i>
					<label class="custom-file-label" style="width:95%" for="customFile">Choose file</label>
				</div></div>
				</div>
				<div class="row text-center">	
				<div id="customFilepreview">
				<?php if($profiledetails['profile_image']!="" && file_exists("images/".$profiledetails['profile_image'])){?>
					<p class="img-center" style="color:green;margin-bottom:0;">Profile Preview</p>
						<button class="close img-center" onclick="removepreview($('#customFile'))" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button>
						<img src="images/<?php echo $profiledetails['profile_image'] ?>" class="img-fluid img-center" style="position:relative; width:200px; max-height: 180px; border:1px solid gray; margin-bottom:5px"/>
				<?php } ?>
				</div>
				</div>
				<div class="form-group row"><label for="Occupation" class="col-md-4 col-form-label">Occupation<sup style="color:red">*</sup></label>
					<div class="col-md-8">
						<input type="text" name="Occupation" placeholder="Occupation" value="<?php echo $profiledetails['occupation'];?>" required="" class="form-control">
					</div>
				</div>
				<div class="form-group row"><label for="langselection" class="col-md-4 col-form-label">Select Language<sup style="color:red">*</sup></label>
					<div class="col-md-8">
					<select name="langselection[]" id="langselection" multiple="multiple" placeholder="" required="" class="form-control select2" >
						<?php $planguage =' '.$profiledetails['planguage']; if(strpos($planguage, "English")){echo '<option  value="English" selected > English </option>';}else{echo '<option  value="English" > English </option>';} ?> 
						<?php if(strpos($planguage, "sinhala")){echo '<option  value="sinhala" selected > සිංහල </option>';}else{echo '<option  value="sinhala" > සිංහල </option>';} ?> 
						<?php if(strpos($planguage, "tamil")){echo '<option  value="tamil" selected > தமிழ் </option>';}else{echo '<option  value="tamil" > தமிழ் </option>';} ?> 
					</select>
					</div>
				</div>
				<div class="form-group row"><label for="favArticleCategory" class="col-md-4 col-form-label">Favourite Article category<sup style="color:red">*</sup></label>
					<div class="col-md-8">
					<select name="favArticleCategory[]" id="favArticleCategory" multiple="multiple" placeholder="" required="" class="form-control select2" >
						<?php
						$myArray = explode(' , ', $profiledetails['fav_article']);
						for($i=0;$i<(count($myArray)-1);$i++){
							echo '<option value="'.$myArray[$i].'" selected>'.$myArray[$i].'</option>';
						}
						?>
					</select>
						<!--i class="fa fa-info-circle" data-toggle="tooltip" title="Give you the related health information" aria-hidden="true" style="margin:auto"></i-->
					</div>
				</div>
				<div class="form-group row"><label for="isPregnant" class="col-md-5 col-form-label">Are you a Pregnant?<sup style="color:red">*</sup></label>
					<div class="col-md-7">
						<div class="form-check form-check-inline">
							<input id="yes" type="radio" value="true" name="isPregnant" <?php if($profiledetails['pregnant']=='true'){echo 'checked';}?> class="form-check-input"><label for="Yes" class="form-check-label">Yes</label>
						</div>
						<div class="form-check form-check-inline">
							<input id="no" type="radio" value="false" name="isPregnant" <?php if($profiledetails['pregnant']=='false'){echo 'checked';}?> class="form-check-input" ><label for="No" class="form-check-label">No</label>
						</div>
					</div>
				</div>
				<div id="pregnancy">
				<div class="form-group row"><label for="pregnancyWeek" class="col-md-5 col-form-label">Pregnancy Weeks<sup style="color:red">*</sup></label>
					<div class="col-md-7">
						<select name="pregnancyWeek" id="pregnancyWeek" placeholder="" required="" class="form-control" ></select>
					</div>	
				</div>
				</div>
				<div class="form-group row"><label for="haveChildren" class="col-md-5 col-form-label">Have Child/ Children?<sup style="color:red">*</sup></label>
					<div class="col-md-7">
						<div class="form-check form-check-inline">
							<input id="yes1" type="radio" value="true" name="haveChildren" <?php if($profiledetails['children']=='true'){echo 'checked';}?> class="form-check-input"><label for="Yes1" class="form-check-label">Yes</label>
						</div>
						<div class="form-check form-check-inline">
							<input id="no1" type="radio" value="false" name="haveChildren" <?php if($profiledetails['children']=='false'){echo 'checked';}?> class="form-check-input"><label for="No1" class="form-check-label">No</label>
						</div>
					</div>
				</div>
				<div id="children">
					<button class="btn btn-primary add-child" style="float:right">ADD</button>
					<br>
					<br>
					<?php 
					if($profiledetails['children']=='true'){
						$childquery = mysqli_query($conn, "SELECT * FROM children WHERE userid='$profiledetails[userid]'");
						$i =1;
						while($childrow= mysqli_fetch_array($childquery)){
						$childdob=date_create_from_format("Y-m-d",$childrow['child_dob']);   
						$childdob = date_format($childdob,"d/m/Y");
						echo '<div style="border:1px solid #dddddd; padding:5px">
							<div  class=" form-group row">
								<div  class="col-md-6">
									<label >Child Name</label>
									<input type="hidden" name="childid[]" value= "'.$childrow["id"].'">
									<input  type="text" placeholder="Child Name" name="childnameold[]" value="'.$childrow["child_name"].'" required="" class="form-control">
								</div>
								<div  class="col-md-6">
									<label >Date of Birth</label>
									<input  type="text" id="datepickerold'.$i.'" placeholder="DOB" name="childdobold[]" value ="'.$childdob.'" required="" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<div  class="col-md-6">
									<label >Gender</label>
									<select  placeholder="Gender" required="" name="childgenderold[]" class="form-control">';
							if($childrow['gender']=="MALE"){
									echo 	'<option  disabled="" value="null" class="hidden"> --Gender </option>
										<option  value="MALE"  selected> Male </option>
										<option  value="FEMALE"> Female </option>';
							}
							else{
								echo 	'<option  disabled="" value="null" class="hidden"> --Gender </option>
										<option  value="MALE"> Male </option>
										<option  value="FEMALE" selected> Female </option>';
							}
							echo	'</select>
								</div>
								<div  class="col-md-6">
									<label  for="profilePicture">Profile Picture</label>
									<div  class="custom-file">
										<input  type="file" id="customFileold'.$i.'" name="childimageold[]" class="custom-file-input customFileold" accept=".png,.jpg,.jpeg">
										<label  for="customFile" class="custom-file-label">Profile Picture </label>
									</div>
								</div>
							<div class="row text-center">	
							<div id="customFileold'.$i.'preview">';
							 if($childrow['child_profile_image']!="" && file_exists("images/".$childrow['child_profile_image'])){
							echo 	'<p class="img-center" style="color:green;margin-bottom:0; text-align:center">Profile Preview</p>
									<button class="close img-center" onclick="removepreview($(\'#customFileold'.$i.'\'))" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button>
									<img src="images/'.$childrow["child_profile_image"].'" class="img-fluid img-center" style="position:relative; width:200px; max-height: 180px; border:1px solid gray; margin-bottom:5px"/>';
							 }
							echo '</div>
							</div>
							</div>
							<a href="#" id="remove-lnk">Remove</a>
							</div><br>';
							echo '<script>$( "#datepickerold"+('.$i.') ).datepicker({dateFormat: "dd/mm/yy", changeMonth: true,changeYear: true })</script>';
							$i++;
						}
					}						
					?>
					
					
					
					<script> $( "#datepickerold" ).datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true});</script>
				</div>
				<input type="submit" name="submitfamily"	id="submitfamily" class="next-step1" value="UPDATE FAMILY DETAILS" />
				</form>
			</div>
			<div id="partnerDetails">
				<p style="padding-left:0.3rem; color:#68cf68;padding-top:1rem;font-weight:600; font-size:15px;">PARTNER DETAILS</p>
				<form id="form2" method = "POST" action="ajax/profileupdate" enctype="multipart/form-data"> 
				<input type="hidden" name="userid" value="<?php echo $profiledetails['userid'];?>">

				<div  class="form-group row">
                                <label  for="partnerName" class="col-md-4 col-form-label">Partner Name<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
                                    <input  type="text" name="partnerName" placeholder="Partner Name" value="<?php echo $profiledetails['partner_name'] ?>"  required="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label for="customFilePartner" class="col-md-4 col-form-label">Choose Partner Profile Picture</label>
							<div class="col-md-8"><div class="custom-file">
								<input type="file" class="custom-file-input" id="customFilePartner" name="PartnerProfilePicture" accept=".png,.jpg,.jpeg">
								<label class="custom-file-label" for="customFilePartner">Choose file</label>
							</div></div></div>
                            <div class="row text-center">
							<div id="customFilePartnerpreview">
							<?php if(($profiledetails['partner_profile_image']!="") && file_exists("images/".$profiledetails['partner_profile_image'])){?>
								<p class="img-center" style="color:green;margin-bottom:0">Profile Preview</p>
									<button class="close img-center" onclick="removepreview($('#customFilePartner'))" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button>
									<img src="images/<?php echo $profiledetails['partner_profile_image'] ?>"  class="img-fluid img-center" style="position:relative; width:200px; max-height: 180px; border:1px solid gray; margin-bottom:5px"/>
							<?php } ?>
							</div>
							</div>
                            <div  class="form-group row"><label  for="partnerdob" class="col-md-4 col-form-label">Date of Birth<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
								<!--input type="text" id="datepicker"-->
                                    <input  type="text" id="datepickerhusband" name="partnerdob" placeholder="MM/DD/YYYY" required="" value="<?php  $dateOfBirth=date_create_from_format("Y-m-d",$profiledetails['partner_dob']);   echo $dateOfBirth = date_format($dateOfBirth,"d/m/Y");?>" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group row"><label  for="anniversary" class="col-md-4 col-form-label">Anniversary date<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
								<!--input type="text" id="datepicker"-->
                                    <input  type="text" id="anniversary" name="anniversary" placeholder="MM/DD/YYYY" required="" value="<?php  $dateOfBirth=date_create_from_format("Y-m-d",$profiledetails['anniversary_date']);   echo $dateOfBirth = date_format($dateOfBirth,"d/m/Y");?>" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group row"><label  for="partneroccupation" class="col-md-4 col-form-label">Occupation<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
                                    <input  type="text" name="partneroccupation" placeholder="Partner Occupation" required="" value="<?php echo $profiledetails['partner_occupation'] ?>" class="form-control">
                                </div>
                            </div>
							<input type="submit" name="submitpartner"	id="submitpartner" class="next-step1" value="UPDATE PARTNER DETAILS" />
				</form>
			</div>
			<div id="loginDetails">
				<p style="padding-left:0.3rem; color:#68cf68;padding-top:1rem;font-weight:600; font-size:15px;">LOGIN DETAILS</p>
				<form id="form3" method = "POST" action="ajax/profileupdate" enctype="multipart/form-data"> 
				<input type="hidden" name="userid" value="<?php echo $profiledetails['userid'];?>">
				<div class="form-group row required">
					<label for="mobile" class="col-md-4 col-form-label">Your Mobile Number<sup style="color:red">*</sup></label>
					<div class="col-md-8">
						<!--label style="padding:10px">+94</label-->
						<input type="tel" name="mobilenumber" id="phone" placeholder="Mobile number" value="<?php echo $profiledetails['mobile']; ?>" required="" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label  for="email" class="col-md-4 col-form-label">Email Address<sup style="color:red">*</sup></label>
					<div  class="col-md-8">
						<input  type="email" id="email" name="email" placeholder="Email Address" value="<?php echo $profiledetails['email']; ?>" disabled required="" class="form-control" >
					</div>
				</div>
				<div  class="form-group row">
					<label  for="password" class="col-md-4 col-form-label">Old Password</label>
					<div  class="col-md-8">
						<input  type="password" name="oldpassword" id="oldpassword" placeholder="Old Password" class="form-control">
					</div>
				</div>
				<div  class="form-group row">
					<label  for="password" class="col-md-4 col-form-label">New Password</label>
					<div  class="col-md-8">
						<input  type="password" name="newpassword" id="newpassword" placeholder=" New Password"  class="form-control">
					</div>
				</div>
				<div  class="form-group row">
					<label  for="password" class="col-md-4 col-form-label">Confirm Password</label>
					<div  class="col-md-8">
						<input  type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" class="form-control">
					</div>
				</div>
				<input type="submit" name="submitlogin"	id="submitlogin" class="next-step1" value="UPDATE LOGIN DETAILS" />
				</form>
			</div>
			
		</div>
		</div>
	</div>    
        
  </div>
    
  </div>
  
</div>
<script>
$( 'a[href*="profile"]').css("color", '#68cf68');
$(document).on('click', '.profiledetails', function(){
	if($(this).text()=='PERSONAL DETAILS'){
		$('.profiledetails').attr('class', 'profiledetails');
		$(this).attr('class', 'profiledetails active');
		$('#personalDetails, #familyDetails, #partnerDetails, #loginDetails').hide();
		$('#personalDetails').show();
		$('html, body').animate({
        scrollTop: $("#personalDetails").offset().top-120
		}, 1000);
	}
	if($(this).text()=='FAMILY DETAILS'){
		$('.profiledetails').attr('class', 'profiledetails');
		$(this).attr('class', 'profiledetails active');
		$('#personalDetails, #familyDetails, #partnerDetails, #loginDetails').hide();
		$('#familyDetails').show();
		$('html, body').animate({
        scrollTop: $("#familyDetails").offset().top-120
		}, 1000);
	}
	if($(this).text()=='PARTNER DETAILS'){
		$('.profiledetails').attr('class', 'profiledetails');
		$(this).attr('class', 'profiledetails active');
		$('#personalDetails, #familyDetails, #partnerDetails, #loginDetails').hide();
		$('#partnerDetails').show();
		$('html, body').animate({
        scrollTop: $("#partnerDetails").offset().top-120
		}, 1000);		
	}
	if($(this).text()=='LOGIN DETAILS'){
		$('.profiledetails').attr('class', 'profiledetails');
		$(this).attr('class', 'profiledetails active');
		$('#personalDetails, #familyDetails, #partnerDetails, #loginDetails').hide();
		$('#loginDetails').show();
		$('html, body').animate({
        scrollTop: $("#loginDetails").offset().top-120
		}, 1000);
	}
});
$(document).ready(function(){
	$('#familyDetails, #partnerDetails, #loginDetails').hide();
	//$('input').attr('disabled',true);
});
/* $(document).on('click', '#edit', function(){
	$('input').attr('disabled',false);
	$('#edit').attr('type', 'submit');
	$('#edit').text('Update');
}); */
$(document).ready(function () { 
$.validator.addMethod("validDate", function(value, element) {
        return this.optional(element) ||/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/.test(value);
    }, "Please enter a valid date in the format DD/MM/YYYY");
$("#submitpersonal").click(function(){
var form = $("#form");
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			firstName: {
				required: true,
				minlength: 3,
			},
			dateOfBirth : {
				required: true,
				validDate: true,
			},
			addressLine1 : {
				required: true,
			},
			Address_Line2:{
				required: true,
			},
			country:{
				required: true,
			},
			city: {
				required: true,
			},
			Province: {
				required: true,
			},
		},
		messages: {
			firstName: {
				required: "First Name is required",
			},
			dateOfBirth : {
				required: "Date of Birth is required",
			},
			addressLine1 : {
				required: "Address line1 is required",
			},
			Address_Line2: {
				required: "Address line2 is required",
			},
			country: {
				required: "Country is required",
			},
			city: {
				required: "city is required",
			},
			Province: {
				required: "Please select Province",
			},
		},
		submitHandler: function(form) {
		   var form_data = new FormData(form);
			$.ajax({
				type:form.method,
				url: form.action,
				mimeType: "multipart/form-data",
				data:form_data,
				cache:false,
				contentType: false,
				processData: false,
				success:function(data){
					if(data=='Profile Details Updated'){
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
		}
	});
});
});

$(document).ready(function () { 
$.validator.addMethod("validDate", function(value, element) {
        return this.optional(element) ||/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/.test(value);
    }, "Please enter a valid date in the format DD/MM/YYYY");
$("#submitfamily").click(function(){
var form = $("#form1");
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			Occupation:{
				required : true,
			},
			'langselection[]':{
				required:true,
			},
			'favArticleCategory[]':{
				required: true,
			},
			isPregnant:{
				required: true,
			},
			pregnancyWeek:{
				required: true,
			},
			haveChildren:{
				required:true,
			},
			'childnameold[]':{
				required: true,
			},
			'childdobold[]': {
				required:true,
			},
			'childgenderold[]': {
				required:true,
			},
			'childname[]':{
				required: true,
			},
			'childdob[]': {
				required:true,
			},
			'childgender[]': {
				required:true,
			},

		},
		messages: {           
			Occupation:{
				required:"Occupation is requied",
			},
			'langselection[]':{
				required:"Select atleast one language",
			},
			'favArticleCategory[]':{
				required: "Select atleast one category",
			},
			isPregnant:{
				required: "Select Yes/No",
			},
			pregnancyWeek:{
				required: "Select Pregnancy Week",
			},
			haveChildren:{
				required:"Select Yes/No",
			},
			
		},
		submitHandler: function(form) {
		   var form_data = new FormData(form);
			$.ajax({
				type:form.method,
				url: form.action,
				mimeType: "multipart/form-data",
				data:form_data,
				cache:false,
				contentType: false,
				processData: false,
				success:function(data){
					if(data=='Family Details Updated'){
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
		}
	});
});
});

$(document).ready(function () { 
$.validator.addMethod("validDate", function(value, element) {
        return this.optional(element) ||/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/.test(value);
    }, "Please enter a valid date in the format DD/MM/YYYY");
$("#submitpartner").click(function(){
var form = $("#form2");
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			partnerName:{
				required : true,
			},
			partnerdob:{
				required:true,
				validDate: true,
			},
			partneroccupation:{
				required:true,
			},
		},
		messages: {           
			partnerName:{
				required : "Partner name required",
			},
			partnerdob:{
				required:"Partner DOB required",
			},
			partneroccupation:{
				required:"Partner Occupation required",
			},
		},
		submitHandler: function(form) {
		   var form_data = new FormData(form);
			$.ajax({
				type:form.method,
				url: form.action,
				mimeType: "multipart/form-data",
				data:form_data,
				cache:false,
				contentType: false,
				processData: false,
				success:function(data){
					if(data=='Partner Details Updated'){
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
		}
	});
});
});


$("#submitlogin").click(function(){
/*$.validator.addMethod("validold", function(value, element) {
	if((($('#newpassword').val().length > 0) || ($('#confirmpassword').val().length > 0))){
	return true;
	}
		return false;
}, "Please enter Old Password");
$.validator.addMethod("validnew", function(value, element) {
	if(($('#confirmpassword').val().length > 0)){
	return true;
	}
		return false;
}, "Please enter New Password");
function oldpasswordRequired() {
    return (($('#newpassword').val().length > 0) || ($('#confirmpassword').val().length > 0));
}
function newpasswordRequired() {
    return $('#confirmpassword').val().length > 0;
}*/
var form = $("#form3");

	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			mobilenumber:{
				required : true,
			},
		},
		messages: {
			mobilenumber: {
				required: "Mobile number is required",
			},
		},
		submitHandler: function(form) {
		   var form_data = new FormData(form);
			$.ajax({
				type:form.method,
				url: form.action,
				mimeType: "multipart/form-data",
				data:form_data,
				cache:false,
				contentType: false,
				processData: false,
				success:function(data){
					if(data=='Login Details Updated'){
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
		}
	});
});


function removeReg(data, status) {
if(status=='success'){
  swal({
      text: data,
      icon: status,
      dangerMode: false
    })
    .then(function(value) {
		window.location.reload();
    });
}
else{
	swal({
      text: data,
      icon: status,
      dangerMode: false
    })
    .then(function(value) {
		
	});
}
}
</script>
<script>
  $( function() {
    $( "#datepicker, #datepickerhusband, #anniversary" ).datepicker({
		dateFormat: 'dd/mm/yy',
        yearRange: "-100:+0",
	   minDate: "-100Y", 
	   maxDate: "+1D",
      changeMonth: true,
      changeYear: true
    });
});
	$(document).on("change", ".custom-file-input", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
	$(document).on('change', "#customFile, #customFilePartner, .customFileold, .customFilechild", function(){
		var fileName1 = $(this).attr('id');
		var filetype = event.target.files[0];
		if (filetype) {
			$('#'+fileName1+'preview').children().remove();
			var source=URL.createObjectURL(filetype);
            $('#'+fileName1+'preview').append('<p class="img-center" style="color:green;margin-bottom:0">Profile Preview</p><button class="close img-center" onclick="removepreview('+fileName1+')" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button><img src="'+source+'" class="img-fluid img-center" style="position:relative; width:200px; max-height: 180px; border:1px solid gray; margin-bottom:5px"/>');
    	}
    
	});
function removepreview(fileName1){
	var fileName2 = $(fileName1).attr('id');	
     var filename=$('#'+fileName2).val("");
	 $(fileName1).siblings(".custom-file-label").text("choose file");
     $('#'+fileName2+'preview').empty();
}
</script>
<script type="text/javascript">
    $(function(){
        $('#langselection').select2({
		maximumSelectionLength: 3
		}).on("change", function (e) {  });
        $('#favArticleCategory').select2({}).on("change", function (e) {
    });
        
    });
	function languagechange(inputval){
		var langselected = $('#langselection').select2().val();
		if(inputval=='yes'){
		$('#favArticleCategory').children().remove();
		}
		$.ajax({
			url: "ajax/language",
			data: {langselected : langselected},
			type: "POST",
			success: function(data) {
				var json = $.parseJSON(data);
				//$('#favArticleCategory').append('<option value="all">All</option>');
				for (var i=0;i<json.length;i++)
				{
				    if(!($("#favArticleCategory option[value='"+json[i]+"']").length > 0)){
					$('#favArticleCategory').append('<option value="'+json[i]+'">'+json[i]+'</option>');
				    }
				} 
			},
			error: function(data) {
				console.log(data);
			}
		});
	}
	$("#langselection").on('change', function() {
		languagechange('yes');
	});
	$(document).ready(function(){
		languagechange('no');	
	});
</script>
<script>
$(document).ready(function(){
if ($("#yes").is(':checked')){
	$( "#pregnancyWeek" ).prop( "disabled", false );
    $( "#pregnancy" ).show();
	var selectedweek = parseInt('<?php echo str_replace("week - ", "", $profiledetails["pregnant_week"]) ?>');
    var registereddate = '<?php $date_time =date($profiledetails["datetime"]); echo date("Y-m-d",strtotime($date_time));?>';
	var seldate = registereddate.split('-');
	const oneWeek = 7 * 24 * 60 * 60 * 1000; // days*hours*minutes*seconds*milliseconds
	var seldate = new Date(seldate[0], seldate[1]-1, seldate[2]);
	var curdate = new Date();
	var diffDays = Math.round(Math.abs((seldate - curdate) / oneWeek));
	var totalWeeks= diffDays+selectedweek;
	if(totalWeeks>42){
		$("#no").prop("checked", true);
		$( "#pregnancy" ).hide();
	}
	else{	
	var select = '';
    for (i=1;i<=42;i++){
        var week = "week - "+ i;
		if(totalWeeks==i){
			select += '<option val=' + week + ' selected>' + week + '</option>';
		}
		else{
        select += '<option val=' + week + '>' + week + '</option>';
		}
    }
    $('#pregnancyWeek').html(select); 
	}
}
});
$("#yes").click(function(){
    $( "#pregnancyWeek" ).prop( "disabled", false );
    $( "#pregnancy" ).show();
    var select = '';
    for (i=1;i<=42;i++){
        var week = "week - "+ i;
        select += '<option val=' + week + '>' + week + '</option>';
    }
    $('#pregnancyWeek').html(select);                       
});
$('#no').click(function(){
    $( "#pregnancyWeek" ).prop( "disabled", true );
    $( "#pregnancy" ).hide();
});
$("#yes1").click(function(){
    //$("#haveChildren")
    $( "#children" ).prop( "disabled", false );
    $( "#children" ).show(); 
})
$('#no1').click(function(){
    $( "#children" ).prop( "disabled", true );
    $( "#children" ).hide(); 
});
</script>
<script>
$(document).ready(function(){
if ($("#yes1").is(':checked')){
	$( "#children" ).prop( "disabled", false );
    $( "#children" ).show();
}
if ($("#no1").is(':checked')){
	$( "#children" ).prop( "disabled", true );
    $( "#children" ).hide();
}

    var max_input = 10;
    var x = 1;
$('.add-child').click(function (e) {
      e.preventDefault();
      var htmlfield='<div style="border:1px solid #dddddd; padding:5px">\
                    <div  class=" form-group row">\
                        <div  class="col-md-6">\
                            <label >Child Name</label>\
                            <input  type="text" placeholder="Child Name" name="childname[]" required="" class="form-control">\
                        </div>\
                        <div  class="col-md-6">\
                            <label >Date of Birth</label>\
                            <input  type="text" id="datepicker'+x+'" placeholder="DOB" name="childdob[]" required="" class="form-control">\
                        </div>\
                    </div>\
                    <div class="form-group row">\
                        <div  class="col-md-6">\
                            <label >Gender</label>\
                            <select  placeholder="Gender" required="" name="childgender[]" class="form-control">\
                                <option  selected="" disabled="" value="null" class="hidden"> --Gender </option>\
                                <option  value="MALE" > Male </option>\
                                <option  value="FEMALE"> Female </option>\
                            </select>\
                        </div>\
                        <div  class="col-md-6">\
                            <label  for="profilePicture">Profile Picture</label>\
                            <div  class="custom-file">\
                                <input  type="file" id="customFilechild'+x+'" name="childimage[]" class="custom-file-input customFilechild" accept=".png,.jpg,.jpeg">\
                                <label  for="customFile" class="custom-file-label" id="childProfilePicture0">Profile Picture </label>\
                            </div>\
                        </div>\
						<div class="row text-center">\
						<div id="customFilechild'+x+'preview">\
						</div>\
					</div>\
                    </div>\
                    <a href="#" id="remove-lnk">Remove</a>\
                    </div>';
					
					
    if (x < max_input) { // validate the condition
        x++;
        $('#children').append(htmlfield);
        $( "#datepicker"+(x-1) ).datepicker({dateFormat: 'dd/mm/yy', changeMonth: true,changeYear: true });
    }
});
$('#children').on("click", "#remove-lnk", function (e) {
      e.preventDefault();
      $(this).parent('div').remove();  // remove input field
      x--; // decrement the counter
    });
});
$('button').click(function(e){
		   e.preventDefault();
		});
</script>
<?php include "footer.php";?>