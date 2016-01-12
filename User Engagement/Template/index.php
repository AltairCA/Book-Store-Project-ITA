<!doctype html>
<html>
<head>
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">

<meta charset="utf-8">
</head>
<body>
<div align="center">

	<div  id="maindiiv" align="center">
    	<div id="mainnav" align="center" >
       		
        	
       		<?php
				
				
				//setcookie('user_name',encryptIt("Sleepy"),time() + (86400 * 7));
			?>
        	
        	<ul><li id="user_name" style="margin-left:0px;"><a href="#">Profile</a>
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
            <li style="min-width:150px;">
            Customer Support
            <ul><a href="#"><li>FAQ
            </li></a>
            <a href="#">
            <li>
            <wbr>Contact Us<wbr>
            </li></a>
            </ul>
            </li>
            
            <!--
            	new addd
            -->
            <a href="../Product Page/product.php"><li style="color:black;" >Books</li></a>
            
            
            
            <a href="#">
            <li style="min-width:60px;margin-left:840px;">
            Menu<ul></a><a href="../home/index.php">
                <li>Home</li></a>
            <a href=""><li>My account</li></a><a href="../TransactionHistory/transhis.php">
                <li>Purches history</li></a>
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
          	Search By Category
          </p>
          </td>
         <form method="post" action="../Search Page/search.php">
          <td>
          <select name="search_cat" id="search_cat">
            <option id="search_cat" value="0">All</option>
            <option id="search_cat" value="1">Novel</option>
            <option id="search_cat" value="2">Action</option>
            </select>
            
          <input type="text" id="search_text" name="search_text" placeholder="Type the name here ..." style="margin-left:-7px;">
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
         
		 <div>
		 
		 <img src="back2.png">
		 <img src="back3.png">
		</div>

		<span style="position:absolute; left:10%; top:45%;">
		<form action="uploaded.php" method="post" enctype="multipart/form-data">
		 <input type="file" name="file">
		 
		 Name:<input type="text" name="name">
		 <input type="submit" value="upload">
		 
		 
		 </form>
		 
		 </span>
		 
		 <!----->
		 
		 
		 <?php

if(isset($_FILES['file']))
{
		$file=$_FILES['file'];
		//Check the file
		$name=$_POST['name'];
		
		
		$file_name=$file['name'];
		$file_tmp=$file['tmp_name'];
		$file_size=$file['size'];
		$file_error=$file['error'];
		$message='File Successfully Uploaded!';
		//to identify the extension_loaded
		
		$file_ext=explode('.',$file_name);
		//print_r($file_ext);
		$file_ext=strtolower(end($file_ext));
		
		$allowed=array('txt','epub','pdf');
		
		if(in_array($file_ext,$allowed))
		{
			if($file_error===0)
			{ if($file_size<=100000000)
				{$file_name_new=uniqid('',true).'.'.$file_ext;
				 $file_destination='uploads/'.$file_name_new;
				 
					if(move_uploaded_file($file_tmp,$file_destination)){
					//echo $file_destination;
					echo $message;
					echo '<br>';
					echo '<a href="webooks"> Click here to get redirected to WeBooks!</a>';
					}

					}
					}
					}
					
					else
					echo "Please choose an Epub,pdf or an text file";
					echo "<br>";
					echo $name;
					echo '<a href="user.html"> Click here to get redirected to previous site</a>';
					}
				
?>
		 
		 
<!----->		 
		 
		 
		 
		 
         
        
         
         <footer style="padding-top:10px;font-family:Calibri;"><table id="template_table">
         <tr>
         <td><a href="">
         About us</a>
         </td>
         <td>
         <a href="">Contact Us</a>
         </td>
         <td><a href="">Privacy Policy</a></td>
         <td><a href="">Disclaimer</a></td>
         <td><a href="">Terms & Conditions</a></td>
         </table>
         All right bla bal 2014<footer>
	 	</div>
    <?php mysqli_close($con); ?>
    </div>
</div>
</body>
</html>
