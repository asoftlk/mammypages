<?php
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "ssl://smtp.gmail.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "example@gmail.com";  // SMTP username
$mail->Password = "*************"; // SMTP password
$mail->Port = "465";
$mail->Mailer = "smtp";
$mail->SMTPSecure = "ssl";
$mail->From = "example@gmail.com";
$mail->FromName = "Mailer";
$mail->AddAddress("contact@vedcore.com", "Josh Adams");
#mail->AddAddress("ellen@example.com");                  // name is optional
#mail->AddReplyTo("info@example.com", "Information");
$mail->WordWrap = 50;                                 // set word wrap to 50 characters
#mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
#mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML
$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body in bold!";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent.";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
echo "Message has been sent";

?>
