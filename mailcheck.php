<?php       


            $output='<p>Dear user,</p>';
			$output.='<p>Please Enter the otp.</p>';
			$output.='<p>-------------------------------------------------------------</p>';
			$output.='<p style="font-size:24px;">OTP  - <b>1234</b></p>';	
			$output.='<p>-------------------------------------------------------------</p>';
			$output.='<p>Thanks,</p>';
			$output.='<p>With Regards</p>';
			$output.='<p>Veramasa Online Grocery</p>';
			$mail_body = $output; 
			$subject = "Registartion validation from Grocery Website";
			$email_to = "konduru.nataraju@gmail.com";
			$fromserver = "noreply@mammypages.com"; 
			require("PHPMailer/PHPMailerAutoload.php");
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->Host = "host.venavis.in"; // Enter your host here
			$mail->SMTPAuth = true;
			$mail->Username = "admin@mammypages.com"; // Enter your email here
			$mail->Password = "Mammy@3488"; //Enter your passwrod here
			$mail->Port = 465;
			$mail->IsHTML(true);
			$mail->SMTPDebug = 1;
			$mail->SMTPSecure = 'ssl'; 
			$mail->From = "admin@mammypages.com";
			$mail->FromName = "Mammypages";
			$mail->Sender = $fromserver; // indicates ReturnPath header
			$mail->Subject = $subject;
			$mail->Body = $mail_body;
			$mail->AddAddress($email_to);
	    if(!$mail->Send())
		{
			echo 
			$InvalidMSG =  $mail->ErrorInfo;
			// Converting the message into JSON format.
			$InvalidMSGJSon = json_encode(['error'=> $InvalidMSG]);
			// Echo the message.
			echo $InvalidMSGJSon ;
		}
		else
		{
	//	$SuccessMSG = json_encode(['response'=>  "An OTP has been sent to you to you email. If it is not visible on mail Check Spam Once"]);
		echo '<script>alert("Mail sent")</script>';	
		}
		?>
