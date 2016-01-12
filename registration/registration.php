<!doctype html>
<html>
<head>
<title>Done</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">

<meta charset="utf-8">
</head>
<body>
<div align="center">

	<div  id="maindiiv" align="center">
    	<div id="mainnav" align="center" >
       		
        	
       		<?php
				set_time_limit(3600);
				
				//setcookie('user_name',encryptIt("Sleepy"),time() + (86400 * 7));
			?>
        	
        	<ul style="position:relative;"><li id="user_name" style="margin-left:0px;display:inline-block;"><a href="#">Profile</a>
            <?php
			require 'config/config_common.php';
			
			
			error_reporting(0);
				if($_GET["logout"]==true){
					setcookie('user_name',encryptIt(" "),time() -10000000* (86400 * 7),'/');
					unset($_COOKIE['user_name']);
				}
				
				
			
				$username = decryptIt($_COOKIE['user_name']);
				$name;
				
				$username_query = mysqli_query($con,"SELECT * FROM `user` where `username` = '$username'");
				$row;
				if($row = mysqli_fetch_array($username_query)){
					
					$name = $row['name'];
				}else{
					$name = " ";
				}

				if($name!=" "){
					/*echo	"<script>alert('hello')</script>"; */
					echo "<ul id='User_logout'><li style='max-width:1000px;padding-right:10px;'><div>
					Hello ".($name).
					
					"</div></li><a  href='../home/index.php?logout=true'><li style='max-width:1000px;padding-right:10px;'>Logout</li></a>";
					
				}else{
					echo "<ul id='User_logout'><a href='../Login/index.php'><li>Login</li></a>
                <a href='../registration/index.php'><li>Register</li></a>";
				}
			
			error_reporting(1);
			?>
               
                </ul>
            </li>
            <li style="min-width:150px;display:inline-block;">
            Customer Support
            <ul><a href="../faq/index.php"><li>FAQ
            </li></a>
            <a href="../Feedback/feedback.php">
            <li>
            <wbr>Contact Us<wbr>
            </li></a>
            </ul>
            </li>
            
            <!--
            	new addd
            -->
            <a href="../Product Page/product.php"><li style="color:black;display:inline-block;" >Books</li></a>
            <a href="../User Engagement/index.php"><li style="color:black;min-width:160px;display:inline-block;"><wbr>Upload/Start Writing</wbr></li></a>
            
            
            <a href="../home/index.php" style="margin-left:590px;">
                <li style="color:black;display:inline-block;">Home</li></a>
            <a href="#">
            <li style="min-width:60px;display:inline-block;">
            Menu<ul></a>
            <a href="../User Profile/view_userprofile.php"><li>My account</li></a><a href="../TransactionHistory/transhis.php">
                 <li>purchase history</li></a>
                
                </ul>
            </li>
            <li id="cart_count" style="min-width:20px;background-color:#FF9900;border-radius:6px;max-height:10px;">
            <?php 
				$cart_query = mysqli_query($con,"SELECT * FROM  `order` WHERE  `username` =  '$username' and `payment_state`=0");
				$row222;
				$cart_qty=0;
				if($row222 = mysqli_fetch_array($cart_query) and $name !=" "){
					
					$cart_qty = $row222[4];
				}else{
					$cart_qty=0;
				}
				
				echo "$cart_qty";
			?>
            </li>
            <li style="min-width:50px;max-width:50px;"><img src="img/cart.png" height="15px" width="20px"><ul style="margin-left:-112px;"><a href="../cart/index.php">
            <li>View Cart
            </li></a>
            </ul>
            </li>
        	</ul>
          	
            
            <br>
            <br>
            
         </div>
         <div id="subdiv">
         <div id="search">
        
          <table>
          <tr>
          <td>
           <img src="img/logo.png" width="100px" height="80px" style="padding:0px;margin:0px;padding-right:20px;"/>
          </td>
          <td style="padding:0px;"><p>
          	Search By Keyword
          </p>
          </td>
         <form method="post" action="../Search Page/search.php">
          <td>
          <select style="display:none;" name="search_cat" id="search_cat">
            <option id="search_cat" value="0">All</option>
            <option id="search_cat" value="1">Novel</option>
            <option id="search_cat" value="2">Action</option>
            </select>
            
          <input type="text" style="min-width:750px;max-width:750px;" id="search_text" name="search_text" placeholder="Type here ..." style="margin-left:-7px;">
          </td>
          <td style="padding-left:20px;">
		   
          <input type="submit" id="search_button" name="search_button" value="">
          
          </td>
          </form>
          </tr>
          </table>
         </div>
         
         <div id="bodymain">
         <!-------------Code below------------------>
         
         <?php
		 $name = trim($name);
		 if($name!=""){
				
				header("Location: ../home/index.php");
			}
		require_once('config/recaptchalib.php');
		 $privatekey = "6LeMB_sSAAAAAPOGXavxvFOyAYi5BPOmissemaDp";
  		$resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
		
		 
		 
		
		 
		 if (!$resp->is_valid) {
			 //unlink($temp_file);
			 echo "<script>alert('Captcha Erro');</script>";
			 header("Refresh: 0; URL=index.php");
		 }else{
		  $filename = $_FILES['file']['name'];
		 $temp_file = $_FILES['file']['tmp_name'];
		
		 $username = $_POST["username"];
		 $password = $_POST["fpassword"];
		 $name = $_POST["name"];
		 $phone = $_POST["phone"];
		 $email = $_POST["email"];
		 $address = $_POST["address"];
		 $city = $_POST["line2"];
		 $state = $_POST["state"];
		 $ZipCode = $_POST["ZipCode"];
		 $country = $_POST["country"];
		 if(!empty($filename) and !empty($temp_file) and !empty($username) and !empty($password) and !empty($name) and !empty($phone) and !empty($email) and !empty($address) and !empty($city) and !empty($state) and !empty($ZipCode) and !empty($country)){
			 
		$file_name_count = mysqli_query($con,"SELECT COUNT( * ) FROM  `user`");
		$file_name_count = mysqli_fetch_array($file_name_count);
		$file_name_count = $file_name_count[0];
		$file_name_count = intval($file_name_count) + 1;
		$filename = "../files/u_img/".$file_name_count.".jpg";
		/*
		if(file_exists("$filename")) {
   							 chmod("$filename",0755); //Change the file permissions if allowed
    						unlink("$filename"); //remove the file
					}
		*/
		if(move_uploaded_file($temp_file,$filename)){
			if(mysqli_query($con,"INSERT INTO `user` VALUES ('$username', '$email','$name','$password','$phone',0,'$address','$city','$state',$ZipCode,'$country','$filename',0)")){
				require "mailer/PHPMailerAutoload.php";
				require "config/1.php";
				$mail->Subject = 'Registration';
				//$mail->Body    = "Welcome $name<br><br>Your user name:$username<br>Password:$password<br>";
				$mail->Body    = "<center><h2>Welcome to WeBooks!</h2></center>
<p>You've taken your first step into a whole lot of wisdom and creativity!,$username.
You can download any free book available in our website and you can purchase books from our online store.
And if you think you can write and become an author,yes you can with WeBooks! You can always check our 'Upload/Start Writing' function and become an author! 

</p>

Thank you for registering and becoming a part of us,WeBooks!";
				
				
				
				
				echo "<h1 style='font-size:26px;color:red;'>Your information saved</h1>";
				header('Refresh: 5; URL=../Login/index.php');
				if(!$mail->send()) {
   					echo 'Message could not be sent.';
  					 echo 'Mailer Error: ' . $mail->ErrorInfo;
   					//exit;
					}
 
					//echo 'Message has been sent';
				
			}else{
				echo "<h1 style='font-size:26px;color:red;'>Something went wrong</h1>";
				header('Refresh: 5; URL=../home/index.php');
				
			}
			
			
		}else{
			echo "<h1 style='font-size:26px;color:red;'>Something went wrong</h1>";
			header('Refresh: 5; URL=../home/index.php');
			
			
		}
			 
		 }else{
			 echo "<h1 style='font-size:26px;color:red;'>Something went wrong</h1>";
			header('Refresh: 5; URL=../home/index.php');
			 
		 }
		 }
		 ?>
         </div>
        
         <footer style="padding-top:10px;font-family:Calibri;"><table id="template_table">
          <tr>
         <td><a href="../aboutus/index.php">
         About us</a>
         </td>
         <td>
         <a href="../Feedback/feedback.php">Contact Us</a>
         </td>
         <td><a href="../Privacy Policy/index.php">Privacy Policy</a></td>
         <td><a href="../Disclaimer/index.php">Disclaimer</a></td>
         <td><a href="../Terms and Conditions/index.php">Terms & Conditions</a></td>
         </table>
         Copyright © WeBooks! All rights reserved.<footer>
	 	</div>
    <?php mysqli_close($con); ?>
    </div>
</div>
</body>
</html>
