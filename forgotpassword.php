<?php
session_start();
if(isset($_SESSION['name']) ){
  header('Location: index');
  exit;
}
?>
<html lang="en"><head>
  <meta charset="utf-8">
  <title>Mammypages</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="styles/style.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.8/dist/sweetalert2.all.min.js"></script>
  <style>
  body{
    background-color: #f4f4f4 !important;
 }
  .help-block {
      color: red;
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
</style>
<script>
$(document).ready(function() {
    $( "#otp" ).hide();
	$("#password").hide();
});
</script>
</head>
<body>
<div class="container">
<div class="row h-100">
<div class="col-md-6 text-center">
<img class="regimg" src="assets/images/login 2.png" width="55%" alt="Image" class="img-fluid">
</div>
<div class="col-md-6 text-center">
<div style="background:white; width:100%; max-width:400px; margin:auto; margin-top:3rem; padding:15px; border-radius:2%">
<a  href="index"><img class="mplogo" src="assets/images/logo1.png" alt="logo" width="60%" class="img-fluid"></a>
<h6 class="mt-2 text-uppercase" style="font-size:0.8rem; padding:0 15%">WELCOME TO MP COMMUNITY</h6>
<br>
<form id="msform" action="ajax/mail" method="POST">
<div id="resetemail">
<div class="row px-3">
        <input type="text" id="inputEmail" name="email" required="" autofocus="" placeholder="Enter Registered Email address" class="form-control">
        <input type="hidden"  name="reset" value="reset">
		<span class="text-danger"></span>
</div>
<br style="clear:both">
<div class="mb-3 px-3" style="float:right">
    <a href="login" type="button"  class="btn btn-secondary text-center">Cancel</a>
    <button type="submit" name="submit" id="submit" class="btn btn-success text-center">Search</button>
</div>
</div>
<div id="otp">	
	<label id="otptext" style="background: #0dcaf0;color: white;padding: 0.2rem; border-radius: 1rem;"></label>
	<div id="divOuter">
	<div id="divInner">
	<label data-error="wrong" data-success="right" for="partitioned">Enter OTP</label>
	<input id="partitioned" type="text" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  onKeyPress="if(this.value.length==6) return false;"/>
	</div>
	<br>
	<a id="resendotp" href="#"	onclick="resendotp()"  style="cursor:pointer; text-decoration:none"> Resend OTP </a><br><br>
	<input type="button" name="otp" id="otpemail" class="btn btn-success" Value="Verify OTP">

	</div>					
</div>
</form>
<br style="clear:both">
<form id="msform1" action="ajax/mail" method="POST">
<div id="password">
	<div class="row px-3">
		<input type="password" id="inputPassword" name="password" required="" autofocus="" placeholder="Enter Password" class="form-control">
		<input type="hidden" name="passwordreset" value="passwordreset">
		<input type="hidden" id="inputEmail1" name="email" >
		<span class="text-danger"></span>
	</div>
	<div class="row px-3">
		<input type="password" id="inputPassword1" name="password1" required="" autofocus="" placeholder="Confirm Password" class="form-control">
		<span class="text-danger"></span>
	</div>
	<div class="mb-3 px-3" style="float:right">
    <button type="submit" name="submit1" id="submit1" class="btn btn-success text-center">Update</button>
	</div>
</div>
</form>
<br style="clear:both">
<div class="row mb-4 px-3 text-center">
    <h6 style="font-weight:bold">New User? <a class="text-success" href="signup.php" style="text-decoration:none">Create Account</a></h6>
</div>
<br>

</div>     
</div>
</div>
</div>
<script>
function resendotp(){
	$("#submit").click();
}
$(document).ready(function () { 
$("#submit").click(function () { 
		var form = $("#msform");
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
                        email: {
                            required: true,
                        },
					},
                    messages: {
                        email: {
                            required: "Email is required",
                        },
					},
					submitHandler: function(form) {
						$.ajax({
							type:form.method,
							url: form.action,
							mimeType: "multipart/form-data",
							data:$(form).serialize(),
							
							success:function(data){
								var json = $.parseJSON(data);
								if(json.message=='OTP sent to '+$('#inputEmail').val()){
									removeReg(json.message, 'success');
									$('#resetemail').hide();
									$('#otp').show();
									$('#otptext').text(json.message);
									$(document).on('click', '#otpemail', function(){
										if(json.otp==$('#partitioned').val()){
											$('#otp').hide();
											$('#password').show();
										}
										else{
											removeReg('Invalid OTP', 'error');
										}
									});									
								}
								else{
									removeReg(json.message, 'error');
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

$("#submit1").click(function () { 
		var form = $("#msform1");
			$('#inputEmail1').val($('#inputEmail').val());
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
                        password: {
                            required: true,
                        },
						password1: {
                            required: true,
							equalTo: "#inputPassword"
                        },
					},
                    messages: {
                        password: {
                            required: "Password is required",
                        },
						password1: {
                            required: "Confirm Password is required",
							equalTo: "Password didnot match",
                        },
					},
					submitHandler: function(form) {
						$.ajax({
							type:form.method,
							url: form.action,
							mimeType: "multipart/form-data",
							data:$(form).serialize(),
							success:function(data){
								if(data=='success'){
									removeReg('Password Updated Successfully', 'success');
									setTimeout(function(){ window.location.href='login.php';}, 1000);

								}
								else{
									removeReg(data, 'error');
								}
							}
						});
					}
				});
});

 function removeReg(data, status) {
  if(status!="success"){
	Swal.fire({
      text: data,
      icon: status,
    })
    .then(function(value) {
		if(status == 'success'){
		window.location.href='index.php';
		}
      //console.log('returned value:', value);
    });
  }
  else{
	const Toast = Swal.mixin({
	  toast: true,
	  position: 'top-end',
	  showConfirmButton: false,
	  timer: 5000,
	  timerProgressBar: true,
	  didOpen: (toast) => {
		toast.addEventListener('mouseenter', Swal.stopTimer)
		toast.addEventListener('mouseleave', Swal.resumeTimer)
	  }
	})

	Toast.fire({
	  icon: status,
	  title: data
	})
  }
}
</script>
</script>
</body></html>