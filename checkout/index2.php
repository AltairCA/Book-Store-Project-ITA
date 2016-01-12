<!doctype html>
<html>
<head>
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
<link type="text/css" href="style/style.css" rel="stylesheet">
<title>Checkout</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<script type="application/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="application/javascript" language="javascript" src="js/script.js"></script>

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
         
         <div id="bodymain">
         <!-------------Code below------------------>
        
         <table>
         
         <tr><td><img src="img/info.png" width="40px" height="40px"></td>
         <td><H2 style="font-style:italic;color:#C76054;box-shadow:         0px 5px 0px 0px rgba(44, 50, 50, 0.26);">Shipping Informations</H2></td>
         </tr>
         <?php
		 if($name==" "){
			 session_start();
	$_SESSION["url"] = "../checkout/index2.php";
			header("Location: ../Login/index.php");  
		 }
		 
		 
		 
		 
		 
		 ?>
         </table>
         <form onSubmit="return validate()" method="post" action="payments.php">
         	<table  cellpadding="0px" cellspacing="0px" hspace="0px" vspace="0px" id="checkout">
            <tr>
            <td>Name</td>
            <td><input type="text" name="fname"  onKeyUp="textchange(fname,img_name)" style="min-width:400px;max-width:400px;" required value=<?php echo "'$name'";   ?>></td><td><img id="img_name" style="margin-left:20px;" name="input1" src="img/validate.png" width="16px" height="16px"></td>
            </tr>
            
            <tr>
            <td>Phone</td>
            <td><input type="number" name="phone" onKeyUp="textchange(phone,img_phone)" style="min-width:200px;max-width:200px;" required value=<?php echo $row['phone'];   ?>></td><td><img id="img_phone" style="margin-left:20px;" name="input3" src="img/validate.png" width="16px" height="16px"></td>
            </tr>
            <tr>
            <td>Email</td>
            <td><input type="email" name="email" onKeyUp="emailchange(email,img_email)" style="min-width:300px;max-width:300px;" required value=<?php echo $row['email'];   ?>></td><td><img id="img_email" style="margin-left:20px;" name="input4" src="img/validate.png" width="16px" height="16px"></td>
            </tr>
            
            <tr>
            <td>Company</td>
            <td><input type="text" name="company" style="min-width:400px;max-width:400px;"></td>
            </tr>
            
            <tr>
            <td>Address</td>
            <td><input type="text" name="address" style="min-width:400px;max-width:400px;" onKeyUp="textchange(address,img_address)" required value=<?php
			$address = $row['address']; echo "'$address'";   ?>></td><td><img id="img_address" style="margin-left:20px;" name="input5" src="img/validate.png" width="16px" height="16px"></td>
            </tr>
            
            <tr>
            <td>Line 2/City</td>
            <td><input type="text" name="line2" style="min-width:400px;max-width:400px;" required onKeyUp="textchange(line2,img_line2)" value=<?php echo $row['city'];   ?>></td><td><img id="img_line2" style="margin-left:20px;" name="input6" src="img/validate.png" width="16px" height="16px"></td>
            </tr>
            
            <tr>
            <td>State</td>
            <td><input type="text" name="state" style="min-width:200px;max-width:200px;" required onKeyUp="textchange(state,img_state)" value=<?php echo $row['state'];   ?>></td><td><img id="img_state" style="margin-left:20px;" name="input6" src="img/validate.png" width="16px" height="16px"></td>
            </tr>
            
            <tr>
            <td>ZIP/Postal Code</td>
            <td><input type="number" name="zip_postal" required onKeyUp="textchange(zip_postal,img_zip_postal)" value=<?php echo $row['zip_code'];   ?>></td><td><img style="margin-left:20px;" id="img_zip_postal" name="input7" src="img/validate.png" width="16px" height="16px"></td>
            </tr>
            
            <tr>
            <td>Country</td>
            <td><select name="country" required onChange="listchange(country,img_country)">
            <option value="select">----------- Select -----------</option>
            <?php
				$countrys = array("Sri Lanka","India","Malaysia");
				for($x=0;$x<sizeof($countrys);$x++){
					if($row['country']==$countrys[$x]){
						echo "<option value='".$countrys[$x]."' selected>$countrys[$x]</option>";
						
					}else{
						echo "<option value='".$countrys[$x]."'>$countrys[$x]</option>";
					}
					
				}
			?>
           
            </select>
            </td><td><img style="margin-left:20px;" id="img_country" name="input8" src="img/validate.png" width="16px" height="16px"></td>
            </tr>
            <tr><td></td>
            <td>
            <input type="submit" value="" id="submitstyle" style="min-width:130px;
	min-height:35px;">
            </td>
            </tr>
            <tr>
            </tr>
            <tr>
            <td colspan="2"><div class="progress">
      <div class="progress-bar"></div><p style="padding: 0px;position:inherit; margin: 0px; font-size: 14px;color:#000000" align="center">Step 2</p>
    </div></td>
            </tr>
            </table>
         </form>
        
         </div>
         
         <footer style="padding-top:10px;"><table id="template_table">
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
