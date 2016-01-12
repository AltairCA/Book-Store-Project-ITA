<!doctype html>
<html>
<head>
<title>Sign Up</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
<link type="text/css" href="style/style.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="js/script.js"></script>
<meta charset="utf-8">
</head>
<body>
<div align="center">

	<div  id="maindiiv" align="center">
    	<div id="mainnav" align="center" >
       		
        	
       		<?php
				
				
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
         <?php
		 	
		 	$name = trim($name);
		 	if($name!=""){
				
				header("Location: ../home/index.php");
			}
		 ?>
         
         <div id="bodymain">
         <!-------------Code below------------------>
         
         <form action="registration.php" method="post" enctype="multipart/form-data" onSubmit="return validate(username,'usernamealert',fpassword,sepassword,'passalert',country,file,email,'emailalert')">
         <table border="0" id="main_table">
         <tr>
         <th style="font-size:20px;" colspan="2">Registration Form
         </th>
         </tr>
         <tr>
         <td colspan="2" style="text-align:center;" ><img src="img/users.png" width="128" height="128">
         </td>
         </tr>
         
          <tr>
         <td  id="main_table_column2">User Name
         </td>
         <td  id="main_table_column1"><input type="text" name="username" placeholder="Type User Name" required onKeyUp="usernamechange(username,'usernamealert')" onBlur="usernamechange(username,'usernamealert')"><p name="usernamealert"></p>
         </td>
         </tr>
         
         <tr><td>Password</td><td><input type="password" name="fpassword" placeholder="Type your password" onKeyUp="passchange(fpassword,sepassword,'passalert')" required></td></tr>
         <tr><td>Retype Password</td><td><input type="password" name="sepassword" placeholder="ReType your password" required onKeyUp="passchange(fpassword,sepassword,'passalert')"><p name="passalert"></p></td></tr>
         
         <tr>
         <td  id="main_table_column2">Name
         </td>
         <td  id="main_table_column1"><input type="text" name="name" placeholder="Type Name with Initials" required>
         </td>
         </tr>
         
         <tr>
         <td >Phone
         </td>
         <td ><input type="number" style="min-width:200px;max-width:200px;" name="phone" placeholder="Enter your phone no" required>
         </td>
         </tr>
         
         <tr><td>Email</td><td><input type="email" style="min-width:250px;max-width:250px;" name="email" placeholder="Enter the Email" required onKeyUp="emailchange(email,'emailalert')" onBlur="emailchange(email,'emailalert')"><p name="emailalert"></p></td></tr>
         
         
         <tr><td>Address</td><td><input type="text" name="address" placeholder="Enter the Address" required></td></tr>
         <tr><td>Line 2/City</td><td><input type="text" name="line2" placeholder="City" required></td></tr>
         <tr><td>State</td><td><input type="text" name="state" placeholder="Your State" style="min-width:180px;max-width:180px;" required></td></tr>
         <tr><td>ZIP/Postal Code</td><td><input type="number" name="ZipCode" placeholder="Enter Zip/Postal Code" style="min-width:180px;max-width:180px;" required></td></tr>
         <tr><td>Country</td><td>
         <select name="country" style="min-width:180px;max-width:180px;" required onChange="countrychange(country)">
         <option value="select">--------Select--------</option>
         <option value="Sri Lanka">Sri Lanka</option>
         <option value="India">India</option>
         <option value="Malaysia">Malaysia</option>
         </select>
         </td></tr>
         
         <tr><td>Profile Picture</td><td><input type="file" name="file" required accept="image/jpeg" onChange="filechange(file)"></td></tr>
         <tr><td></td><td><?php
		 require_once('config/recaptchalib.php');
			 $publickey = "6LeMB_sSAAAAALiUNP2YGHkoY5_KXwIJrC_d5LTe"; // you got this from the signup page
		  echo recaptcha_get_html($publickey,true); ?></td></tr>
         <tr><td colspan="2" align="center"><p style="padding-left:150px;"><a href="../Terms and Conditions/index.php">Accept Terms and Conditions</a><input style="box-shadow:none;min-width:0px;" type="checkbox" name="reg" required></p></td></tr>
         <tr><td colspan="2"><input style="min-width:100px;margin-left:250px;" type="submit" value="submit"></td></tr>
         </table>
         </form>
         
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
    
    </div>
</div>
</body>
</html>
