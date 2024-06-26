<?php
include "../connect.php";
// Check if $_SESSION or $_COOKIE already set
if(!isset($_SESSION)){session_start();}
// var_dump($_SESSION);
if( isset($_SESSION['userid']) ){
  //header('Location: ../index');
  echo "Login Success";
  exit;
}else if( isset($_COOKIE['rememberme'] )){
  $uname = mysqli_real_escape_string($conn,$_POST['email']);
  $password = $_POST['password'];
  // Decrypt cookie variable value
  $userid = decryptCookie($_COOKIE['rememberme']);
  $password = decryptCookie($_COOKIE['password']);
 
  $sql_query = "select count(*) as cntUser,email, mobile, first_name, password from users_reg where email='".$userid."' or mobile ='".$userid."'";
  $result = mysqli_query($conn,$sql_query);
  $row = mysqli_fetch_array($result);
  $name = $row['first_name'];
  $count = $row['cntUser'];
  $decrypt = password_verify($password, $row['password']);
  if( $count > 0 ){
	 if($decrypt){
     $_SESSION['userid'] = $userid; 
	 $_SESSION['name'] = $name;
	 echo "Login Success";
     //header('Location: .//home.php');
     exit;
	 }
	 else{
		 echo "Invalid Password, Please try again";
	 }
  }
  else{
	  echo "Email not registered";
	  exit;
  }
}

// Encrypt cookie
function encryptCookie( $value ) {

   $key = hex2bin(bin2hex(openssl_random_pseudo_bytes(4)));

   $cipher = "aes-256-cbc";
   $ivlen = openssl_cipher_iv_length($cipher);
   $iv = openssl_random_pseudo_bytes($ivlen);

   $ciphertext = openssl_encrypt($value, $cipher, $key, 0, $iv);

   return( base64_encode($ciphertext . '::' . $iv. '::' .$key) );
}

// Decrypt cookie
function decryptCookie( $ciphertext ) {

   $cipher = "aes-256-cbc";

   list($encrypted_data, $iv,$key) = explode('::', base64_decode($ciphertext));
   return openssl_decrypt($encrypted_data, $cipher, $key, 0, $iv);

}

// On submit
if(isset($_POST['submit'])){

   $uname = mysqli_real_escape_string($conn,$_POST['email']);
   $password = mysqli_real_escape_string($conn,$_POST['password']);
 
  if ($uname != "" && $password != ""){

     $sql_query = "select count(*) as cntUser,email, mobile, first_name, password from users_reg where email='".$uname."' or mobile='".$uname."'";
     $result = mysqli_query($conn,$sql_query);
     $row = mysqli_fetch_array($result);

     $count = $row['cntUser'];
	// echo $password;
	 $decrypt = password_verify($password, $row['password']);
     if($count > 0){
		if($decrypt){
        $userid = $row['email'];
		$name = $row['first_name'];
        if( isset($_POST['rememberme']) ){

           // Set cookie variables
           $days = 30;
           $value = encryptCookie($userid);
		   $password1=encryptCookie($password);
		   $nameenc= encryptCookie($name);
           setcookie ("rememberme",$value,time()+ ($days * 24 * 60 * 60 * 1000));
           setcookie ("password",$password1,time()+ ($days * 24 * 60 * 60 * 1000));
           setcookie ("name",$nameenc,time()+ ($days * 24 * 60 * 60 * 1000));
        }
 
        $_SESSION['userid'] = $userid; 
		$_SESSION['name'] = $name; 
		echo "Login Success";
        //header('Location: ../index');
        exit;
     }
	 else{
		 echo "Invalid password";
	 }
	 }
	 else{
        echo "Invalid username and password";
     }

  }

}
?>
