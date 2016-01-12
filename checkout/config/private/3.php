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
				$mail->addAddress($email, $name);
				$mail->isHTML(true);
				$mail->Subject = 'Order Complete';
				//$mail->Body    = "Hello $name<br><br>Your Order Complete and Ship soon!<br>";
				$mail->Body    = "<center><h2>Thank you for purchasing at WeBooks!</h2></center>
<p> 

This letter is to confirm that your order from WeBooks has been filled and should arrive within 15 days. 
Thank you for doing business with WeBooks.
<br>
 We look forward to serving you again.

</p>
WeBooks!";
?>