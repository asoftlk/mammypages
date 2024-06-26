<?php
		$otp=mt_rand(100000,999999);
		$email= $_GET['email'];
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
		require("class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = "host.venavis.in"; // Enter your host here
		$mail->SMTPAuth = true;
		$mail->Username = "noreply@mammypages.com"; // Enter your email here
		$mail->Password = "Mammy@3488"; //Enter your passwrod here
		$mail->Port = 465;
		$mail->IsHTML(true);
		//$mail->SMTPDebug = 1;
		//$mail->SMTPSecure = 'ssl'; 
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
	
	?>
