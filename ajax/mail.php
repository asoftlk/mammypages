<?php      
include "../connect.php"; 
if(isset($_POST['status'])){
	$status= mysqli_real_escape_string($conn, $_POST['status']);
	$email= mysqli_real_escape_string($conn, $_POST['email']);
	$update =mysqli_query($conn, "UPDATE users_reg SET email_verified ='$status' WHERE email = '$email'");
	if($update){
	echo "success";
	}
	else{
		echo "update failed";
	}
}
elseif(isset($_POST['reset'])){
	$otp=mt_rand(100000,999999);
	$email= mysqli_real_escape_string($conn, $_POST['email']);
	$emailsearch = mysqli_query($conn, "SELECT email FROM users_reg WHERE email = '$email'");
	if(mysqli_num_rows($emailsearch)>0){
		$otp=mt_rand(100000,999999);
		$email= mysqli_real_escape_string($conn, $_POST['email']);
		$output='<p>Dear user,</p>';
		$output.='<p>Please Enter the otp.</p>';
		$output.='<p>-------------------------------------------------------------</p>';
		$output.='<p style="font-size:24px;">OTP  - <b>'.$otp.'</b></p>';	
		$output.='<p>-------------------------------------------------------------</p>';
		$output.='<p>Thanks,</p>';
		$output.='<p>With Regards</p>';
		$output.='<p>Mammypages</p>';
		$mail_body = $output; 
		$subject = "OTP for Password Reset";
		$email_to = $email;
		$fromserver = "noreply@mammypages.com"; 
		require("../PHPMailer/PHPMailerAutoload.php");
	    $mail = new PHPMailer();
		$mail->IsSMTP();
	    $mail->Host = "mail.mammypages.com"; // Enter your host here
		$mail->SMTPAuth = true;
		$mail->Username = "noreply@mammypages.com"; // Enter your email here
		$mail->Password = ",s?Kez6#HpZ?"; //Enter your passwrod here
		$mail->Port = 465;
		$mail->IsHTML(true);
// 		$mail->SMTPDebug = 1;
		$mail->SMTPSecure = 'ssl'; 
		$mail->From = "noreply@mammypages.com";
		$mail->FromName = "Mammypages";
		$mail->Sender = $fromserver; // indicates ReturnPath header
		$mail->Subject = $subject;
		$mail->Body = $mail_body;
		$mail->AddAddress($email_to);
		
// 		require("class.phpmailer.php");

//         $mail = new PHPMailer();
		
// 		$mail->IsSMTP();                                      // set mailer to use SMTP
//         $mail->Host = "mail.mammypages.com";  // specify main and backup server
//         $mail->SMTPAuth = true;     // turn on SMTP authentication
//         $mail->Username = "noreply@mammypages.com";  // SMTP username
//         $mail->Password = ",s?Kez6#HpZ?"; // SMTP password
//         $mail->Mailer = "Mailer";
//         // $mail->SMTPDebug = 4;
//         $mail->Port = "465";
//         $mail->From = "noreply@mammypages.com";
//         $mail->FromName = "Mammypages";
//         $mail->AddAddress($email_to);
//         #$mail->AddAddress("ellen@example.com");                  // name is optional
//         #$mail->AddReplyTo("info@example.com", "Information");
//         $mail->WordWrap = 50;                                 // set word wrap to 50 characters
//         #$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//         #$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
//         $mail->IsHTML(true);                                  // set email format to HTML
//         $mail->Subject = $subject;
//         $mail->Body    = $mail_body;
//         $mail->AddAddress($email_to);
       // $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
	if(!$mail->Send())
	{
		 
		$InvalidMSG =  $mail->ErrorInfo;
		// Converting the message into JSON format.
		$InvalidMSGJSon = json_encode(['error'=> $InvalidMSG]);
		// Echo the message.
		echo $InvalidMSGJSon ;
	}
	else
	{
	//	$SuccessMSG = json_encode(['response'=>  "An OTP has been sent to you to you email. If it is not visible on mail Check Spam Once"]);
	$message= 'OTP sent to '.$email;
	echo json_encode(array('message'=> $message, 'otp'=>$otp));

	}
	}
	else{
		echo json_encode(array('message'=> "Email Not registered", 'otp'=>$otp));
	}
}
elseif(isset($_POST['passwordreset'])){
	$email= mysqli_real_escape_string($conn, $_POST['email']);
	$password= mysqli_real_escape_string($conn, $_POST['password']);
	$password1= mysqli_real_escape_string($conn, $_POST['password1']);
	if($password === $password1){
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$update =mysqli_query($conn, "UPDATE users_reg SET password ='$password' WHERE email = '$email'");
		if($update){
		echo "success";
		}
		else{
			echo "update failed";
		}
	}
	else{
		echo "password didnot match";
	}
	
}
else{
	$otp=mt_rand(100000,999999);
	$email= mysqli_real_escape_string($conn, $_POST['email']);
	$output='<p>Dear user,</p>';
	$output.='<p>Please Enter the otp.</p>';
	$output.='<p>-------------------------------------------------------------</p>';
	$output.='<p style="font-size:24px;">OTP  - <b>'.$otp.'</b></p>';	
	$output.='<p>-------------------------------------------------------------</p>';
	$output.='<p>Thanks,</p>';
	$output.='<p>With Regards</p>';
	$output.='<p>Mammypages</p>';
	$mail_body = $output; 
	$subject = "OTP for Email verification";
	$email_to = $email;
	$fromserver = "noreply@mammypages.com"; 
	require("../PHPMailer/PHPMailerAutoload.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->Host = "mail.mammypages.com"; // Enter your host here
	$mail->SMTPAuth = true;
	$mail->Username = "noreply@mammypages.com"; // Enter your email here
	$mail->Password = ",s?Kez6#HpZ?"; //Enter your passwrod here
	$mail->Port = 465;
	$mail->IsHTML(true);
	//$mail->SMTPDebug = 1;
	$mail->SMTPSecure = 'ssl'; 
	$mail->From = "noreply@mammypages.com";
	$mail->FromName = "Mammypages";
	$mail->Sender = $fromserver; // indicates ReturnPath header
	$mail->Subject = $subject;
	$mail->Body = $mail_body;
	$mail->AddAddress($email_to);
if(!$mail->Send())
{
	 
	$InvalidMSG =  $mail->ErrorInfo;
	// Converting the message into JSON format.
	$InvalidMSGJSon = json_encode(['error'=> $InvalidMSG]);
	// Echo the message.
	echo $InvalidMSGJSon ;
}
else
{
//	$SuccessMSG = json_encode(['response'=>  "An OTP has been sent to you to you email. If it is not visible on mail Check Spam Once"]);
$message= 'OTP sent to '.$email;
echo json_encode(array('message'=> $message, 'otp'=>$otp));

}
}
?>
