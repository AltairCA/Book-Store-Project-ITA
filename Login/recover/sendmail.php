<?php
error_reporting(0);
require_once "Mail.php";
set_time_limit(3600);
$from = '<projectita1234@gmail.com>';
$to = '< >';
$subject = 'Hi!';
$body = "Hi... This is you password is: ";
$to = $_POST["email"];
include 'config/config_common.php';

			if (!empty($to)) {
				$mail_check = mysql_query("SELECT * FROM `user` where `email`='$to'", $con);
				//get password from DB related to the same email
				
				$rows;
				if ($rows = mysql_fetch_array($mail_check)) {
					$headers = array(
						'From' => $from,
						'To' => $to,
						'Subject' => $subject
					);
					
					$body = $body.$rows['password'];
					
					include 'config/1.php';

					$mail = $smtp->send($to, $headers, $body);

					if (PEAR::isError($mail)) {	//error sending mail
						echo "<script>window.open('fogetmypassword.php', '_self');alert('wrong mail');</script>";
					} else {	//success sending mail  //HOME OR LOGIN
						header("Location: ../index.php");
					}
				} else {	// $to is not there in DB 
					echo "<script>window.open('fogetmypassword.php', '_self');alert('wrong mail');</script>";
				}
			} else {		//$to is empty
				echo "<script>window.open('fogetmypassword.php', '_self');alert('wrong mail');</script>";
			}	
			
?>
