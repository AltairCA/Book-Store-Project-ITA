<?php
$mail = new PHPMailer;
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'altairserver@gmail.com';
				$mail->Password ='evintrzjdxzebbyy';
				$mail->SMTPSecure = 'tls';
				$mail->Timeout = 3600;
				$mail->Port = 587;
				$mail->setFrom('amit@gmail.com', 'Admin');
				$email = "alexvista1234@gmail.com";
					$mail->addAddress($email, $name);
				$mail->isHTML(true);
				$mail->Subject = 'User asked Question';
				//$mail->Body    = "Hello $name<br><br>Your Order Complete and Ship soon!<br>";
				

				
				//$mail->Body    = "Hello $name<br><br>Your Order Complete and Ship soon!<br>";
				$mail->Body    = "<center><h2>user Question</h2></center>
<p> 

User has asked $question
<br>
 We look forward to serving you again.

</p>
WeBooks!";


 
	
	
	
	
	
?>
