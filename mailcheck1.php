<?php	$output='<p>Dear user,</p>';
			$output.='<p>Please Enter the otp.</p>';
			$output.='<p>-------------------------------------------------------------</p>';
			$output.='<p style="font-size:24px;">OTP  - <b>12345</b></p>';	
			$output.='<p>-------------------------------------------------------------</p>';
			$output.='<p>Thanks,</p>';
			$output.='<p>With Regards</p>';
			$output.='<p>Veramasa Online Grocery</p>';
			$mail_body = $output; 
			$subject = "Registartion validation from Grocery Website";
			$email_to = "konduru.nataraju@gmail.com";
			$fromserver = "noreply@venavis.in"; 
			require("PHPMailer/PHPMailerAutoload.php");
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->Host = "smtp.gmail.com"; // Enter your host here
			$mail->SMTPAuth = true;
			$mail->Username = "art.constructions374@gmail.com"; // Enter your email here
			$mail->Password = "artcon@369"; //Enter your passwrod here
			$mail->Port = 25 ;
			$mail->IsHTML(true);
			//$mail->SMTPSecure = 'tls';   
			$mail->From = "noreply@venavis.in";
			$mail->FromName = "Accounts";
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
		echo '<script>alert("mail sent" )</script>';	
		}
		?>