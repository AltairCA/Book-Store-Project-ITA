<!doctype html>
<html>
<head>
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
<title>User Edit</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
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
			if($name==" " or intval($row['level'])<10){
				header("Location:../home/index.php");
			
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
          <td style="padding:0px;">
          <p>
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
         <form method="post">
         
         	<?php
				if((is_null($_GET["u_id"]))){
					header("Location: index.php");
				}
				$u_id = $_GET["u_id"];
				if($_POST["sub1"]=="Update"){
					$Email = $_POST["Email"];
					$Name = $_POST["Name"];
					$Phone = $_POST["Phone"];
					$rating = $_POST["rating"];
					$Address = $_POST["Address"];
					$City = $_POST["City"];
					$ZIP = $_POST["ZIP"];
					$Level = $_POST["Level"];
					$u_name = $_POST["username"];
					if(mysqli_query($con,"update `user` set `email`='$Email',`name`='$Name',`phone`=$Phone,`Rating`=$rating,`address`='$Address',`city`='$City',`zip_code`=$ZIP,`level`=$Level where username='$u_name'")){
						echo "<script>alert('Details of user $u_name updated');</script>";	
						
					}
					
				}else if($_POST["sub2"]=="delete"){
					$u_name = $_POST["username"];
					echo "<script>alert('User $u_name Deleted');</script>";
					if(mysqli_query($con,"delete from `user` where `username`='$u_name'")){
						echo "<script>alert('User $u_name Deleted');</script>";
						
					}
					
				}
				
				
				
				$user_query = mysqli_query($con,"select * from `user` where `username` = '$u_id'");
				if(!($user_arry = mysqli_fetch_array($user_query))){
					header("Location: index.php?action=1");
				}
				
				
			
			?>
            <table>
            <tr><td>
            <table id="maintable">
            	<tr>
                <td>
                Username
                </td>
                
                <td>
                <input type="text" name="username" readonly value=<?php echo "$user_arry[0]"; ?>>
                </td>
                </tr>
                
                <tr>
                <td>
                Email
                </td>
                
                <td>
                <input type="email" name="Email" value=<?php echo "$user_arry[1]"; ?>
                required>
                </td>
                </tr>
                
                <tr>
                <td>
                Name
                </td>
                
                <td>
                <input type="text" name="Name" value=<?php echo "'$user_arry[2]'"; ?> required>
                </td>
                </tr>
                
                
                 <tr>
                <td>
                Phone
                </td>
                
                <td>
                <input type="text" name="Phone" value=<?php echo "$user_arry[4]"; ?> required>
                </td>
                </tr>
                
                
                  <tr>
                <td>
                Rating
                </td>
                
                <td>
                <input type="number" name="rating" value=<?php 
				
				
				echo "$user_arry[5]"; ?> required>
                </td>
                </tr>
                
                
                  <tr>
                <td>
                Address
                </td>
                
                <td>
                <input type="text" name="Address" value=<?php 
				
				
				echo "'$user_arry[6]'"; ?> required>
                </td>
                </tr>
                
                
                  <tr>
                <td>
                City
                </td>
                
                <td>
                <input type="text" name="City" value=<?php 
				
				
				echo "'$user_arry[7]'"; ?> required>
                </td>
                </tr>
                
                
                  <tr>
                <td>
                ZIP Code
                </td>
                
                <td>
                <input type="number" name="ZIP" value=<?php 
				
				
				echo "$user_arry[9]"; ?> required>
                </td>
                </tr>
                
                 <tr>
                <td>
               	Level
                </td>
                
                <td>
                <input type="number" name="Level" value=<?php 
				
				
				echo "$user_arry[12]"; ?> required>
                </td>
                </tr>
                <tr>
                <td>
                <input style="max-width:100px;min-width:60px;font-size:11px;" type="submit" name="sub1" value="Update">
                </td><td>
                <input style="max-width:100px;min-width:60px;font-size:11px;" type="submit" name="sub2" value="delete"></td>
                </tr>
                
                <tr>
                <td>
                <a href="index.php?action=1"><input style="max-width:100px;min-width:60px;font-size:11px;" type="button" value="Go Back"></a>
                </td>
                </tr>
            </table>
            </td>
            <td><img width="200px" height="200px" src=<?php echo"'$user_arry[11]'"; ?></td></tr></table>
         
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
    <?php mysqli_close($con); ?>
    </div>
</div>
</body>
</html>
