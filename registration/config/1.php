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
?>