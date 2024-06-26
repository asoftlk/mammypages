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
</style>
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
<form id="msform" action="ajax/loginverify" method="POST">
<div class="row px-3">
        <input type="text" id="inputEmail" name="email" required="" autofocus="" placeholder="Enter Email address or Mobile number" class="form-control">
        <span class="text-danger"></span>
</div>
<br>
<div class="row px-3">
    <input type="password" id="inputPassword" name="password" placeholder="Enter Password" required class="form-control">
</div>
<div class="row" style="display:flex; margin:0.1rem 0 0.5rem 0">
    <div class="custom-control custom-checkbox custom-control-inline" style="text-align:left;">
        <input id="chk1" type="checkbox" name="rememberme" value="1" class="custom-control-input text-sm-start">
        <label  for="chk1" class="custom-control-label custom-control-inline">Remember me</label>
    <a class="custom-control-inline ml-auto mb-0" href="forgotpassword" style="cursor: pointer; float:right;text-align:right; text-decoration:none">Forgot Password?</a>    
	</div>
</div>
<div class="row mb-3 px-3">
    <button type="submit" name="submit" id="submit" class="btn btn-success text-center">Login</button>
</div>
<div class="mb-4 px-3 text-center">
    <h6 style="font-weight:bold">New User? <a class="text-success" href="signup.php" style="text-decoration:none">Create Account</a></h6>
</div>
<br>
</form>
</div>     
</div>
</div>
</div>
<script>
$(document).ready(function () { 
$.validator.addMethod("myusername", function(value,element) {
    return this.optional(element) ||
           /^[0-9]{10}$/.test(value) ||  
           /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(value);
}, "Username format incorrect.");
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
							myusername: true,
                        },
						password: {
							required:true,
						}
					},
                    messages: {
                        email: {
                            required: "Email/Mobile is required",
							myusername: "Enter valid Email/Mobile number",
                        },
						password: {
							required:"Please Enter Password",
						}
					},
					submitHandler: function(form) {
						$.ajax({
							type:form.method,
							url: form.action,
							mimeType: "multipart/form-data",
							data:$(form).serialize(),
							
							success:function(data){
								console.log(data);
								if(data=='Login Success'){
									removeReg(data, 'success');
									setTimeout(function(){ window.location.href='index.php';}, 1000);
									
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

 function removeReg(data, status) {
  if(status!="success"){
	Swal.fire({
      text: data,
      icon: status,
      dangerMode: false,
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
	  timer: 3000,
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