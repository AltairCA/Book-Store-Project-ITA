<?php
require_once('config/recaptchalib.php');
$privatekey = "6LeMB_sSAAAAAPOGXavxvFOyAYi5BPOmissemaDp";
  		$resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
								
								if (!$resp->is_valid) {
			
			 echo "<script>alert('Captcha Erro');</script>";
			 header("Refresh: 0; URL=feedback.php");
			 
		 }else{



error_reporting(0);
set_time_limit(3600);
$con=mysqli_connect("127.0.0.1","root","","projectita") or die("Error " . mysqli_error($link)); 

$question = mysqli_real_escape_string($con, $_POST['question']);
$email = mysqli_real_escape_string($con, $_POST['email']);





$sql="INSERT INTO q_assist (question) VALUES ('$question')";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";


mysqli_close($con);
require "mailer/PHPMailerAutoload.php";
				require 'private/3.php';
				if(!$mail->send()) {
   					echo 'Message could not be sent.';
  					 echo 'Mailer Error: ' . $mail->ErrorInfo;
   					//exit;
					}
					
					require 'private/4.php';
				if(!$mail->send()) {
   					echo 'Message could not be sent.';
  					 echo 'Mailer Error: ' . $mail->ErrorInfo;
   					//exit;
					}
					
					

header("Location: ../home/index.php"); 
		 }
?>
