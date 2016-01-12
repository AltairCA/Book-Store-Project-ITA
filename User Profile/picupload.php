<!doctype html>
<html>
<head>
<title>Upload</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">

<meta charset="utf-8">
<script>
function success() {
    var ask = window.alert("Profile picture changed successfully!");
    if (ask) {
     
        document.location.href = "edit_profile.php";

    }
	else{
		document.location.href = "edit_profile.php";
		}
}
function wrongext() {
    var ask = window.alert("Unsupported file extension. please upload a valid file extension such as JPEG, PNG");
    if (ask) {
     
        document.location.href = "edit_profile.php";

    }
	else{
		document.location.href = "edit_profile.php";
		}
}
</script>
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
         <?php
		  $result = mysqli_query($con,"SELECT * FROM  `user` WHERE  `username` = '$username'");
		  $row = mysqli_fetch_array($result);
		  $imgpath = $row['filepath'];
		  $filename = $_FILES['file']['name'];
		  $temp_file = $_FILES['file']['tmp_name'];
		  $allowedExts = array("gif", "jpeg", "jpg", "png");
		  $temp = explode(".", $filename);
		  $extension = end($temp);
		  if(in_array($extension, $allowedExts))
		  {
		  if(file_exists($imgpath))
		  {
			   unlink($imgpath);
		  }
		  move_uploaded_file($temp_file, $imgpath);
		  echo '<script type="text/javascript">', 'success();', '</script>';
		  }
		  else
		  {
			echo '<script type="text/javascript">', 'wrongext();', '</script>';  
		  }
		?>
         
         </div>
         
         <footer style="padding-top:10px;font-family:Calibri;"><table id="template_table">
         <tr>
         <td><a href="">
         About us</a>
         </td>
         <td>
         <a href="">Contact Us</a>
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
