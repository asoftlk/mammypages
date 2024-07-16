<?php
include "connect.php";
?>
<html lang="en"><head>
  <meta charset="utf-8">
  <title>Mammypages</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script/bootstrap.min.js"></script>
  <link href="styles/style.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

  <link href="styles/bootstrap-multiselect.css" rel="stylesheet">
  <script type="text/javascript" src="script/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="build/css/intlTelInput.css">
	  <link rel="stylesheet" href="admin/plugins/select2/css/select2.min.css">

  <!--link rel="stylesheet" href="test/countrymobilecodes/intl-tel-input-master/build/css/demo.css"-->
    
    <link rel="stylesheet" type="text/css" href="src/example-styles.css">
    <link rel="stylesheet" type="text/css" href="src/demo-styles.css">

<style>
body{
    background-color: #f4f4f4 !important;
}
    #form { 
	text-align: center; 
	position: relative; 
	margin-top: 20px
} 

#form fieldset { 
	background: white; 
	border: 0 none; 
	border-radius: 0.5rem; 
	box-sizing: border-box; 
	width: 100%; 
	margin: 0; 
	padding-bottom: 20px; 
	position: relative
} 

.finish { 
	text-align: center
} 

#form fieldset:not(:first-of-type) { 
	display: none
} 

#form .previous-step, .next-step, .next-step1 { 
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

.form, .previous-step { 
	background: #10D59D; 
		border: 1px solid #10D399;

} 

.form, .next-step, .next-step1 { 
	background: #10D59D; 
		border: 1px solid #10D399;

} 
.form, .next { 
	background: #10D59D; 
		border: 1px solid #10D399;

} 

#form .previous-step:hover, 
#form .previous-step:focus { 
	background-color: #2F8D46
} 

#form .next-step:hover, 
#form .next-step:focus,
#form .next-step1:focus { 
	background-color: #2F8D46
} 
#form .next:focus { 
	background-color: #2F8D46
} 

.text { 
	color: #2F8D46; 
	font-weight: normal
} 

#progressbar { 
	margin-bottom: -37px; 
	overflow: hidden; 
	color: lightgrey;
    padding-left:0;
} 

#progressbar .active { 
	color: #2F8D46
} 

#progressbar li { 
	list-style-type: none; 
	font-size: 15px; 
	width: 25%; 
	float: left; 
	position: relative; 
	font-weight: 400
} 

#progressbar #step1:before { 
	content: "1"
} 

#progressbar #step2:before { 
	content: "2"
} 

#progressbar #step3:before { 
	content: "3"
} 

#progressbar #step4:before { 
	content: "4"
} 

#progressbar li:before { 
	width: 50px; 
	height: 50px; 
	line-height: 45px; 
	display: block; 
	font-size: 20px; 
	color: #ffffff; 
	background: lightgray; 
	border-radius: 50%; 
	margin: 0 auto 10px auto; 
	padding: 2px
} 

#progressbar li:after { 
	content: ''; 
	width: 100%; 
	height: 2px; 
	background: lightgray; 
	position: absolute; 
	left: 0; 
	top: 25px; 
	z-index: -1
} 

#progressbar li.active:before, 
#progressbar li.active:after { 
	background: #10D59D
} 

.progress { 
	height: 2px;
    margin: 0 15%;
} 

.progress-bar { 
	background-color: #2F8D46
}

.hr-sect {
    display: flex;
    flex-basis: 100%;
    font-weight:bold;
    align-items: center;
    margin: 8px 10px;
}
.hr-sect:before,
.hr-sect:after {
    content: "";
    flex-grow: 1;
    background: rgba(0, 0, 0, 0.35);
    height: 2px;
    font-size: 0px;
    line-height: 0px;
    margin: 0px 15px;
}
.form-control{
	height:40px;
}
.custom-file-label{
	text-align:left;
}
.img-center{
	max-width: 82%;
    height: auto;
    margin: auto;
}
.has-error .checkbox, .has-error .checkbox-inline, .has-error .control-label, .has-error .help-block, .has-error .radio, .has-error .radio-inline, .has-error.checkbox label, .has-error.checkbox-inline label, .has-error.radio label, .has-error.radio-inline label {
    color: #a94442;
    font-size:smaller;
    float:left;
}
.pac-container:after {
    /* Disclaimer: not needed to show 'powered by Google' if also a Google Map is shown */

    background-image: none !important;
    height: 0px;
}
.multi-select-menuitems{
    text-align:left;
}
.multi-select-button{
    width: 100%;
    padding: 0.5rem;
    height: 40px;
}
.multi-select-button:after{
    float:right;
}
.date_field {position: relative; z-index:100;}
.select2-container {
    display: block;
}
.select2-container--default .select2-selection--multiple {
    border: 1px solid #ced4da;
    min-height: 42px;
}
#partitioned {
		  padding-left: 14px;
		  letter-spacing: 42px;
		  border: none;
		  outline:none;
		  background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
		  background-position: bottom;
		  background-size: 50px 1px;
		  background-repeat: repeat-x;
		  background-position-x: 35px;
		  width: 320px;
		}

		#divInner{
		  left: 0;
		  position: sticky;
		}

		#divOuter{
		  width: 300px; 
		  overflow: hidden;
		  margin:auto;
		}
		.ui-datepicker{
			z-index:5!important;
		}

</style>
<script>
 $(document).ready(function() {
    $( "#pregnancy" ).hide();
    $("#children").hide();
    $("#otp").hide();
    $("#maritalStatus").hide();
    $("#maritalStatus1").hide();
	

    });


</script>

 <script>
      // This sample uses the Places Autocomplete widget to:
      // 1. Help the user select a place
      // 2. Retrieve the address components associated with that place
      // 3. Populate the form fields with those address components.
      // This sample requires the Places library, Maps JavaScript API.
      // Include the libraries=places parameter when you first load the API.
      // For example: <script
      // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      let autocomplete;
      let address1Field;
      let address2Field;
      let postalField;
	  var cntry="";
      function initAutocomplete() {
        address1Field = document.querySelector("#ship-address");
        //address2Field = document.querySelector("#address2");
        postalField = document.querySelector("#postcode");
        // Create the autocomplete object, restricting the search predictions to
        // addresses in the US and Canada.
        autocomplete = new google.maps.places.Autocomplete(address1Field, {
          //componentRestrictions: { country: ["us", "ca"] },
          fields: ["address_components", "geometry"],
          types: ["address"],
        });
        //address1Field.focus();
        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener("place_changed", fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        const place = autocomplete.getPlace();
		//console.log(place);
        let address1 = "";
        let postcode = "";

        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        // place.address_components are google.maps.GeocoderAddressComponent objects
        // which are documented at http://goo.gle/3l5i5Mr
        for (const component of place.address_components) {
          const componentType = component.types[0];

          switch (componentType) {
            case "street_number": {
              address1 = `${component.long_name} ${address1}`;
              break;
            }

            case "route": {
              address1 += component.short_name;
              break;
            }

            case "postal_code": {
              postcode = `${component.long_name}${postcode}`;
              break;
            }

            case "postal_code_suffix": {
              postcode = `${postcode}-${component.long_name}`;
              break;
            }
            case "locality":
              document.querySelector("#locality").value = component.long_name;
              break;

            case "administrative_area_level_1": {
              document.querySelector("#state").value = component.long_name;
              break;
            }
            case "country":
              document.querySelector("#country").value = component.long_name;
              var cntry = component.short_name;
			  
			  $("#phone").intlTelInput({
					nationalMode:false,
					initialCountry:"auto",
					geoIpLookup:function(callback) {callback(cntry);},
					preferredCountries: ["LK","IN" ],
					utilsScript: "build/js/utils.js",
					
				});
				
			  break;
          }
        }
        address1Field.value = address1;
        //postalField.value = postcode;
        // After filling the form with address components from the Autocomplete
        // prediction, set cursor focus on the second address line to encourage
        // entry of subpremise information such as apartment, unit, or floor number.
        //address2Field.focus();
      }
    </script>


</head>
<body>
<div class="container">
    <div id="dialog" title="Registration Status">
    <p id="response" style="text-align:center"></p>
    </div>
  <div class="row h-100">
    <div class="col-md-6 text-center">
      <img class="regimg" src="assets/images/registration2021.png" width="95%" alt="Image" class="img-fluid">
        <br><br>
        <h3 style="font-size:1.5rem">Welcome</h3>
        <p style="font-weight:lighter; font-size: smaller;">Already have an Account?</p>
        <input type="button" onclick="location.href='login.php'" class="loginButton" value="Login">
    </div>
    <div class="col-md-6 text-center">
    <div style="margin:20px auto">
      <a  href="index"><img class="regimglogo" src="assets/images/logo1.png" alt="logo" width="50%" class="img-fluid"></a>
      <div style="background:white; width:auto; margin:10px auto; padding:15px; border-radius:2%">
                        <br>
					<form id="form" method = "POST" action="ajax/register" enctype="multipart/form-data"> 
						<ul id="progressbar"> 
							<li class="active" id="step1"> 
							</li> 
							<li id="step2"></li> 
							<li id="step3"></li> 
							<li id="step4"></li> 
						</ul> 
						<div class="progress"> 
							<div class="progress-bar"></div> 
						</div> 
                        <br> 
                        <br>
						<fieldset id="profiledetails">

						<div class="hr-sect">Profile Details</div>
                        <p>Start setting up your profile to find your favourite Articles!</p>

                            <div class="form-group row required">
                                <label for="staticEmail" class="col-md-4 col-form-label">First Name<sup style="color:red">*</sup></label>
                                <div class="col-md-8">
                                    <input type="text" name="firstName" placeholder="First Name" required="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  for="MiddleName" class="col-md-4 col-form-label">Middle Name</label>
                                <div  class="col-md-8">
                                    <input  type="text" name="middleName" placeholder="Middle Name" class="form-control" >
                                </div>
                            </div>
                            <div  class="form-group row">
                                <label  for="lastName" class="col-md-4 col-form-label">Last Name</label>
                                <div  class="col-md-8">
                                    <input  type="text" name="lastName" placeholder="Last Name" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group row"><label  for="MiddleName" class="col-md-4 col-form-label"  title="">Date of Birth<sup style="color:red">*</sup></label>
                                <div  class="col-md-8 d-flex">
								<!--input type="text" id="datepicker"-->
                                    <input  type="text" id="datepicker" name="dateOfBirth" placeholder="DD/MM/YYYY" required="" class="form-control">&nbsp<i class="fa fa-info-circle" data-toggle="tooltip" title="Please enter your correct DOB, We use it to calculate your current age and give you the health information." aria-hidden="true" style="margin:auto"></i>
                                </div>
                            </div>
                            <div  class="form-group row"><label  for="addressLine1" class="col-md-4 col-form-label">Address Line 1<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
                                    <input  type="text" name="addressLine1" placeholder="Address Line 1" required="" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group row"><label  for="addressLine2" class="col-md-4 col-form-label">Address Line 2</label>
                                <div  class="col-md-8">
                                    <input  type="text" name="addressLine2" id="ship-address" placeholder="Address Line 2" autocomplete="off" class="form-control">
                                </div>
                            </div>
							<div class="form-group required row"><label for="City" class="col-md-4 col-form-label">City<sup style="color:red">*</sup></label>
								<div class="col-md-8">
									<input type="text" id="locality" name="city" placeholder="City" required="" class="form-control" >
								</div>
							</div>
							<div class="form-group required row"><label for="Province" class="col-md-4 col-form-label">Province<sup style="color:red">*</sup></label>
								<div class="col-md-8">
									<input name="Province" placeholder="Province" id="state" required="" class="form-control ">
										<!--option selected="" disabled="" value="null" class="hidden">--Province</option>
										<option  value="Central"> Central </option>
										<option  value="Eastern"> Eastern </option>
										<option  value="North Central"> North Central </option>
										<option  value="North Western"> Northern </option>
										<option  value="Sabaragamuwa"> Sabaragamuwa </option>
										<option  value="Southern"> Southern </option>
										<option  value="Uva"> Uva </option>
										<option  value="Western"> Western </option>
									</select-->
									</div>
								</div>
                            <div class="form-group row"><label for="Country" class="col-md-4 col-form-label">Country<sup style="color:red">*</sup></label>
								<div class="col-md-8">
									<input type="text" id="country" name="country" placeholder="Country" required="" value="Sri Lanka" class="form-control" >
								</div>
							</div>
							<input type="button" name="next-step"
								class="next-step" value="Next" /> 
						</fieldset> 
						<fieldset> 
							<div class="hr-sect">Profile & Family Details</div>
                        	<p>Setup your Profile & Family Details</p>
							<div class="form-group row"><label for="customFile" class="col-md-4 col-form-label">Choose Profile Picture</label>
							<div class="col-md-8"><div class="custom-file d-flex">
								<input type="file" class="custom-file-input" id="customFile" name="profilePicture" accept=".png,.jpg,.jpeg" onchange="filePreview()">
								<i class="fa fa-info-circle" data-toggle="tooltip" title="This is for your identity verification purpose (To avoid fake users)" aria-hidden="true" style="margin:auto"></i>
								<label class="custom-file-label" style="width:95%" for="customFile">Choose file</label>
							</div></div>
							</div>
							<div class="row justify-content-center">
								
							<div id="profilepreview"></div>
							</div>
							<div class="form-group row"><label for="Occupation" class="col-md-4 col-form-label">Occupation<sup style="color:red">*</sup></label>
								<div class="col-md-8">
									<input type="text" name="Occupation" placeholder="Occupation" required="" class="form-control">
								</div>
							</div>
                            <div class="form-group row"><label for="langselection" class="col-md-4 col-form-label">Select Language<sup style="color:red">*</sup></label>
								<div class="col-md-8">
								<select name="langselection[]" id="langselection" multiple="multiple" placeholder="" required="" class="form-control select2" >
									<option  value="English"> English </option>
									<option  value="sinhala"> සිංහල </option>
									<option  value="tamil"> தமிழ் </option>
								</select>
								</div>
							</div>
							<div class="form-group row"><label for="favArticleCategory" class="col-md-4 col-form-label">Favourite Article category<sup style="color:red">*</sup></label>
								<div class="col-md-8">
								<select name="favArticleCategory[]" id="favArticleCategory" multiple="multiple" placeholder="" required="" class="form-control select2" >
									<option  value="Getting Pregnant"> Getting Pregnant </option>
									<option  value="Pregnancy"> Pregnancy </option>
									<option  value="First Year"> First Year </option>
									<option  value="Toddler"> Toddler </option>
									<option  value="Family"> Family </option>
									<option  value="News"> News </option>
									<option  value="Health"> Health </option>
									<option  value="Beauty"> Beauty </option>
									<option  value="Travel"> Travel </option>
								</select>
									<!--i class="fa fa-info-circle" data-toggle="tooltip" title="Give you the related health information" aria-hidden="true" style="margin:auto"></i-->
								</div>
							</div>
							<div class="form-group row"><label for="marital" class="col-md-5 col-form-label">Marital Status<sup style="color:red">*</sup></label>
								<div class="col-md-7">
									<div class="form-check form-check-inline">
										<input id="maritalyes" type="radio" value="Single" name="marital" class="form-check-input" checked><label for="Yes" class="form-check-label">Single</label>
									</div>
									<div class="form-check form-check-inline">
										<input id="maritalno" type="radio" value="Married" name="marital" class="form-check-input" ><label for="No" class="form-check-label">Married</label>
									</div>
								</div>
							</div>
							<div id="maritalStatus">
							<div class="form-group row"><label for="isPregnant" class="col-md-5 col-form-label">Are you a Pregnant?<sup style="color:red">*</sup></label>
								<div class="col-md-7">
									<div class="form-check form-check-inline">
										<input id="yes" type="radio" value="true" name="isPregnant" class="form-check-input"><label for="Yes" class="form-check-label">Yes</label>
									</div>
									<div class="form-check form-check-inline">
										<input id="no" type="radio" value="false" name="isPregnant" class="form-check-input" checked><label for="No" class="form-check-label">No</label>
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
										<input id="yes1" type="radio" value="true" name="haveChildren" class="form-check-input"><label for="Yes1" class="form-check-label">Yes</label>
									</div>
									<div class="form-check form-check-inline">
										<input id="no1" type="radio" value="false" name="haveChildren" class="form-check-input" checked><label for="No1" class="form-check-label">No</label>
									</div>
								</div>
							</div>
                            <div id="children">
                                <button class="btn btn-primary add-child" style="float:right">ADD</button>
                                <br>
                                <br>
                                <div style="border:1px solid black">
                                <div  class=" form-group row">
                                    <div  class="col-md-6">
                                        <label >Child Name<sup style="color:red">*</sup></label>
                                        <input  type="text" placeholder="Child Name" name="childname[]" required="" class="form-control">
                                    </div>
                                    <div  class="col-md-6">
                                        <label >Date of Birth<sup style="color:red">*</sup></label>
                                        <input  type="text" id="datepickerchild" placeholder="DOB" name="childdob[]" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div  class="col-md-6">
                                        <label  for="profilePicture">Profile Picture</label>
                                        <div  class="custom-file">
                                            <input  type="file" id="customFileChild" name="childimage[]" class="custom-file-input" accept=".png,.jpg,.jpeg">
                                            <label  for="customFile" class="custom-file-label" id="childProfilePicture0">Profile Picture </label>
                                        </div>
                                    </div>
                                    <div  class="col-md-6">
                                        <label >Gender<sup style="color:red">*</sup></label>
                                        <select  placeholder="Gender" required="" name="childgender[]" class="form-control">
                                            <option  selected="" disabled="" value="null" class="hidden"> --Gender </option>
                                            <option  value="MALE" > Male </option>
                                            <option  value="FEMALE"> Female </option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <script> $( "#datepickerchild" ).datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true});</script>
                            </div>
							</div>
							<!--button type="submit" awnextstep="" class="btnRegister"> Next </button>
							<button type="button" awpreviousstep="" class="btnRegister"> Previous </button-->
							<input type="button" name="next-step"
								class="next-step" value="Next" /> 
							<input type="button" name="previous-step"
								class="previous-step"
								value="Back" /> 
						</fieldset> 
						<fieldset > 
						<div id="maritalStatus1">
							<div class="hr-sect">Partner Details</div>
                        	<p>Setup your Partner Details</p>
							<div  class="form-group row">
                                <label  for="partnerName" class="col-md-4 col-form-label">Partner Name<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
                                    <input  type="text" name="partnerName" placeholder="Partner Name" required="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row"><label for="customFilePartner" class="col-md-4 col-form-label">Choose Partner Profile Picture</label>
							<div class="col-md-8"><div class="custom-file">
								<input type="file" class="custom-file-input" id="customFilePartner" name="PartnerProfilePicture" accept=".png,.jpg,.jpeg" onchange="partnerPreview()">
								<label class="custom-file-label" for="customFilePartner">Choose file</label>
							</div></div></div>
                            <div class="row justify-content-center"><div id="partnerpreview"></div></div>
							
                            <div  class="form-group row"><label  for="partnerdob" class="col-md-4 col-form-label">Date of Birth<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
								<!--input type="text" id="datepicker"-->
                                    <input  type="text" id="datepickerhusband" name="partnerdob" placeholder="MM/DD/YYYY" required="" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group row"><label  for="anniversary" class="col-md-4 col-form-label">Anniversary date<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
								<!--input type="text" id="datepicker"-->
                                    <input  type="text" id="anniversary" name="anniversary" placeholder="MM/DD/YYYY" required="" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group row"><label  for="partneroccupation" class="col-md-4 col-form-label">Occupation<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
                                    <input  type="text" name="partneroccupation" placeholder="Partner Occupation" required="" class="form-control">
                                </div>
                            </div>
							</div>
							<input type="button" name="next-step"
								class="next-step" value="Final Step" /> 
							<input type="button" name="previous-step"
								class="previous-step"
								value="Back" /> 
							
						</fieldset> 
						<fieldset> 
							<div class="hr-sect">Login Details</div>
                        	<p>Setup your Login Details</p>
							<div class="form-group row required">
                                <label for="mobile" class="col-md-4 col-form-label">Your Mobile Number<sup style="color:red">*</sup></label>
                                <div class="col-md-8">
                                    <!--label style="padding:10px">+94</label-->
                                    <input type="tel" name="mobilenumber" id="phone" placeholder="Mobile number" required="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  for="email" class="col-md-4 col-form-label">Email Address<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
                                    <input  type="email" id="email" name="email" placeholder="Email Address" required="" class="form-control" >
                                </div>
                            </div>
                            <div  class="form-group row">
                                <label  for="password" class="col-md-4 col-form-label">Password<sup style="color:red">*</sup></label>
                                <div  class="col-md-8">
                                    <input  type="password" name="password" placeholder="Password" required="" class="form-control">
                                </div>
                            </div>
							<input type="submit" name="submit"	id="submit" class="next-step1" value="Create your MP Profile" /> 
							<input type="button" name="previous-step"	class="previous-step" value="Back" /> 
						</fieldset>
					</form>
					<div id="otp">	
						<label id="otptext" style="color:green"></label>
					<div id="divOuter">
					<div id="divInner">
					<label data-error="wrong" data-success="right" for="partitioned">Enter OTP</label>
					<input id="partitioned" type="text" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  onKeyPress="if(this.value.length==6) return false;"/>
					</div>
					<br>
						<a id="resendotp" href="#"	onclick="resendotp()"  style="cursor:pointer; text-decoration:none"> Resend OTP </a><br><br>
						<input type="button" name="otp" id="otpemail" class="next-step1" Value="Verify Email">
						<a id="resendotp" href="login"	class="btn btn-sm btn-secondary" style="cursor:pointer; text-decoration:none"> SKIP </a>

					</div>					
					</div>
      
    </div>
</div> 
</div>
  </div>
</div>
<script src="admin/plugins/select2/js/select2.full.min.js"></script>

<script>
$(document).ready(function(){
    var max_input = 10;
    var x = 1;
$('.add-child').click(function (e) {
      e.preventDefault();
      var htmlfield='<div style="border:1px solid black">\
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
                                <input  type="file" id="customFile" name="childimage[]" class="custom-file-input" accept=".png,.jpg,.jpeg">\
                                <label  for="customFile" class="custom-file-label" id="childProfilePicture0">Profile Picture </label>\
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
	
    $(document).ready(function () { 
	var currentGfgStep, nextGfgStep, previousGfgStep; 
	var opacity; 
	var current = 1;
	var steps = $("fieldset").length; 
	setProgressBar(current); 
    $.validator.addMethod("usernameRegex", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
            }, "firstname must contain only letters, numbers");
    $.validator.addMethod("validDate", function(value, element) {
        return this.optional(element) ||/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/.test(value);
    }, "Please enter a valid date in the format DD/MM/YYYY");
   /* $.validator.addMethod("minDate", function (value, element) {
        // new Date(-356780166)..
        var min = new Date(<?php echo date("U",strtotime("-60 year"));?>);
        var inputDate = new Date(value);
        if (inputDate < min)
            return false;
        return true;
    }, "Maximum Age 60 Years");

    $.validator.addMethod("maxDate", function (value, element) {
        var max = new Date(<?php echo date("U",strtotime("-18 year"));?>);
        var inputDate = new Date(value);
        if (inputDate > max)
            return false;
        return true;
    }, "Minimum Age 18 Years");*/
    $.validator.addMethod("dobRange", function (value, element) {
        var min = new Date(<?php echo date("U",strtotime("-60 year"));?>);
        var max = new Date(<?php echo date("U",strtotime("-18 year"));?>);
        var inputDate = new Date(value);
        if (inputDate < min || inputDate > max)
            return false;
        return true;
    }, "Age Limit 18 to 60 Years");
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
    }, "Value must not equal arg.");
   /*dateBR: function( value, element ) {
    return this.optional(element) || /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/.test(value);
    }*/
	$(".next-step").click(function () { 
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
                        country:{
                            required: true,
                        },
                        city: {
                            required: true,
                        },
                        Province: {
                            required: true,
                            valueNotEquals: true,
                        },
                        favArticleCategory:{
                            required: true,
                        },
                        Occupation: {
                            required: true,
                        },
                        isPregnant:{
                            required: true,
                        },
                        haveChildren:{
                            required:true,
                        },
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
                        mobilenumber:{
                            required:true,
                            minlength:6,
                            maxlength:14,
                        },
                        email:{
                            required:true,
                            email:true,
                        },
                        password:{
                            required:true,
                        },
                        pregnancyWeek:{
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
                        }


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
                        country: {
                            required: "Country is required",
                        },
                        city: {
                            required: "city is required",
                        },
                        Province: {
                            required: "Please select Province",
                        },
                        Occupation:{
                            required:"Occupation is requied",
                        },
                        favArticleCategory:{
                            required: "Select atleast one category",
                        },
                        haveChildren:{
                            required:"Select Yes/No",
                        },
                        partnerName:{
                            required : "Partner name required",
                        },
                        partnerdob:{
                            required:"Partner DOB required",
                        },
                        partneroccupation:{
                            required:"Partner Occupation required",
                        },
                        mobilenumber:{
                            required:"Enter 10 digit number",

                        },
                        email:{
                            required:"Enter a valid email",
                        },
                        password:{
                            required:"Enter Password",
                        }
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
							beforeSend: function() { 
							$("#submit").prop('value', 'Creating...');
							$("#submit").prop('disabled', true); // disable button
							},
							success:function(data){
								$("#submit").prop('disabled', false);
								$("#submit").prop('value', 'Create your MP Profile');
								if(data=='success'){
								removeReg('Registered Successfully', 'success');
								}
								else{
									removeReg(data, 'error');
								}
							},
							error: function(data){
								$("#submit").prop('disabled', false);
								$("#submit").prop('value', 'Create your MP Profile');
								//console.log("error");
								console.log(data);
								removeReg(data, 'error');
							}
						});
					}
                });
                if (form.valid() === true){
                    if ($('#account_information').is(":visible")){
                        current_fs = $('#account_information');
                        next_fs = $('#company_information');
                    }else if($('#company_information').is(":visible")){
                        current_fs = $('#company_information');
                        next_fs = $('#personal_information');
                    }
			var maritalstatus = $("input[name='marital']:checked").val();
		if( maritalstatus=='Single' && current=='2'){
			currentGfgStep = $(this).parent(); 
			nextGfgStep = $(this).parent().next();
			$("#progressbar li").eq($("fieldset") 
			.index(nextGfgStep)).addClass("active"); 
			current = 3;
			nextGfgStep = $(this).parent().next().next();
			$("#progressbar li").eq($("fieldset") 
			.index(nextGfgStep)).addClass("active");
			nextGfgStep.show(); 
			currentGfgStep.animate({ opacity: 0 }, { 
			step: function (now) { 
				opacity = 1 - now; 

				currentGfgStep.css({ 
					'display': 'none', 
					'position': 'relative'
				}); 
				nextGfgStep.css({ 'opacity': opacity }); 
			}, 
			duration: 500 
		}); 
		setProgressBar(++current); 
		}
		else{
		currentGfgStep = $(this).parent(); 
		nextGfgStep = $(this).parent().next(); 

		$("#progressbar li").eq($("fieldset") 
			.index(nextGfgStep)).addClass("active"); 

		nextGfgStep.show(); 
		currentGfgStep.animate({ opacity: 0 }, { 
			step: function (now) { 
				opacity = 1 - now; 

				currentGfgStep.css({ 
					'display': 'none', 
					'position': 'relative'
				}); 
				nextGfgStep.css({ 'opacity': opacity }); 
			}, 
			duration: 500 
		}); 
		setProgressBar(++current); 
		}
    }
	}); 
	
	$(".previous-step").click(function () { 
	var maritalstatus = $("input[name='marital']:checked").val();

		if(maritalstatus =='Single' && current=='4'){
			current = 3;
		currentGfgStep = $(this).parent(); 
		previousGfgStep = $(this).parent().prev().prev();

		$("#progressbar li").eq($("fieldset") 
			.index(currentGfgStep)).removeClass("active"); 
		$("#progressbar li").eq($("fieldset") 
			.index(currentGfgStep.prev())).removeClass("active");
		previousGfgStep.show(); 

		currentGfgStep.animate({ opacity: 0 }, { 
			step: function (now) { 
				opacity = 1 - now; 

				currentGfgStep.css({ 
					'display': 'none', 
					'position': 'relative'
				}); 
				previousGfgStep.css({ 'opacity': opacity }); 
			}, 
			duration: 500 
		}); 
		setProgressBar(--current); 
		}
		else{

		currentGfgStep = $(this).parent(); 
		previousGfgStep = $(this).parent().prev(); 

		$("#progressbar li").eq($("fieldset") 
			.index(currentGfgStep)).removeClass("active"); 

		previousGfgStep.show(); 

		currentGfgStep.animate({ opacity: 0 }, { 
			step: function (now) { 
				opacity = 1 - now; 

				currentGfgStep.css({ 
					'display': 'none', 
					'position': 'relative'
				}); 
				previousGfgStep.css({ 'opacity': opacity }); 
			}, 
			duration: 500 
		}); 
		setProgressBar(--current); 
	}
	}); 
	

	function setProgressBar(currentStep) { 
        if(currentStep==1){
            var percent=0;
        }
        else if(currentStep==2){
            var percent=25;
        }
        else{
		var percent = parseFloat(100 / steps) * current-3;
        }
		percent = percent.toFixed(); 
		$(".progress-bar") 
			.css("width", percent + "%") 
	} 

	$(".submit").click(function () { 
		return false; 
	}) 
}); 
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
		dateFormat: 'dd/mm/yy',
        yearRange: "-100:+0",
	   minDate: "-100Y", 
	   maxDate: "+1D",
      changeMonth: true,
      changeYear: true
    });
  } );
  $( function() {
    $( "#datepickerhusband" ).datepicker({
		dateFormat: 'dd/mm/yy',
        yearRange: "-100:+0",
	   minDate: "-100Y", 
	   maxDate: "+1D",
      changeMonth: true,
      changeYear: true
    });
    $( "#anniversary" ).datepicker({
		dateFormat: 'dd/mm/yy',
        yearRange: "-100:+0",
	   minDate: "-100Y", 
	   maxDate: "+1D",
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
  <script>
	// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
	function filePreview() {
		var filetype = event.target.files[0];
		if (filetype) {
			$('.img-center').remove();
			var source=URL.createObjectURL(filetype);
            $('#profilepreview').append('<p class="img-center" style="color:green;margin-bottom:0">Profile Preview</p><button class="close img-center" onclick="removepreview()" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button><img src="'+source+'" class="img-fluid img-center" style="position:relative; width:100%; max-height: 300px; border:1px solid gray; margin-bottom:5px"/>');
    	}
    }
function removepreview(){
     var filename=$('#customFile').val("");
     $('#profilepreview').empty();
}
function partnerPreview() {
		var filetype = event.target.files[0];
		if (filetype) {
			$('.img-center1').remove();
			var source=URL.createObjectURL(filetype);
            $('#partnerpreview').append('<p class="img-center1" style="color:green;margin-bottom:0">Partner Preview</p><button class="close img-center1" onclick="removepartnerpreview()" style=" position: absolute;z-index: 1;"><span style=" font-size:x-large; color:red; font-weight:bolder">&times;</span></button><img src="'+source+'" class="img-fluid img-center1" style="position:relative; width:100%; max-height:300px; border:1px solid gray; margin-bottom:5px"/>');
    	}
}
function removepartnerpreview(){
     var filename=$('#customFilePartner').val("");
     $('#partnerpreview').empty();
}
$('button').click(function(e){
		   e.preventDefault();
		   // Code goes here
		 // your onclick function call here

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
$('#maritalyes').click(function(){
    $( "#maritalStatus, #maritalStatus1" ).prop( "disabled", true );
    $( "#maritalStatus, #maritalStatus1" ).hide();
});
$('#maritalno').click(function(){
	$( "#maritalStatus, #maritalStatus1" ).prop( "disabled", false );
    $( "#maritalStatus, #maritalStatus1" ).show();
});
</script>

<script>

 $('#newID').change(function() {
	alert("Button Style Change event fired"); 
      $('#newID1').toggleClass("show"); //you can list several class names 
    });
$('#newID2').on('click', 'select', function(){
	aler("clicker");
});
$('.multiselect').click(function () {
    alert("hello");
});

</script>

<script>
var button = document.getElementById('remBtn');
function removeReg(data, status) {
if(status=='success'){
	var email = $('#email').val();
	var data1= 'OTP sent to '+email;
	$('#otptext').text(data1);
  swal({
      text: data1,
      icon: status,
      dangerMode: false
    })
    .then(function(value) {
		$('#form').hide();
		$('#otp').show();
		resendotp();

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
function resendotp(){
	var email = $('#email').val();
	$.ajax({
			url: "ajax/mail",
			data: {email : email},
			type: "POST",
			success: function(data) {
				var json = $.parseJSON(data);
					if(json.message=='OTP sent to '+email){
						$(document).on('click', '#otpemail', function(){
							if(json.otp==$('#partitioned').val()){
								$.ajax({
									url: "ajax/mail",
									data: {email : email, status:'1'},
									type: "POST",
									success: function(data) {
										if(data=='success'){
										swal({
										  text: 'Email verified! Mammypages Team will contact you within 48 hours to verify details',
										  icon: 'success',
										  dangerMode: false
										}).then(function(value){
											window.location.href="login";
										});
										}
									}
								});
							}
							else{
								swal({
								  text: 'Invalid OTP',
								  icon: 'error',
								  dangerMode: false
								}).then(function(value){
								});
							}
						});
						
					}
			},
			error: function(data) {
				console.log(data);
			}
		});
}

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2dFCEy6hfeG9PpOpaP0aX5QN8KmkhcE0&callback=initAutocomplete&libraries=places&v=weekly"
      async
    ></script>
	
<script src="build/js/intlTelInput-jquery.js"></script>
  <script>
    /*var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      utilsScript: "build/js/utils.js",
    });*/
	
  </script>
    
    <script type="text/javascript" src="src/jquery.multi-select.js"></script>
    <script type="text/javascript">
    $(function(){
        $('#langselection').select2({
		maximumSelectionLength: 3
		}).on("change", function (e) {  });
        $('#favArticleCategory').select2({}).on("change", function (e) {
    });
        
    });
	$("#langselection").on('change', function() {
		var langselected = $('#langselection').select2().val();
		$('#favArticleCategory').children().remove();
		$.ajax({
			url: "ajax/language",
			data: {langselected : langselected},
			type: "POST",
			success: function(data) {
				var json = $.parseJSON(data);
				//$('#favArticleCategory').append('<option value="all">All</option>');
				for (var i=0;i<json.length;i++)
				{
					$('#favArticleCategory').append('<option value="'+json[i]+'">'+json[i]+'</option>');
				} 
			},
			error: function(data) {
				console.log(data);
			}
		});
	});
	
    </script>
</body></html>