<!doctype html>
<html>
<head>
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
<title>Insert</title>
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
         <form method="post" action="insert.php" enctype="multipart/form-data">
         <?php
		 
				
				if($_POST["sub1"]=="Insert"){
					$name = $_POST["name"];
					$publisher = $_POST["publisher"];
					$ISBN = $_POST["ISBN"];
					$weight = $_POST["weight"];
					$price = $_POST["price"];
					$qty = $_POST["qty"];
					$Author = $_POST["Author"];
					$rating = $_POST["rating"];
					
					$temp_file = $_FILES['path']['tmp_name'];
					$id = $_POST["id"];
					$filename = "../files/b_img/".$id.".jpg";
					
					$stock_id = $_POST["stock_id"];
					/*
					if(file_exists("$filename")) {
   							 chmod("$filename",0755); //Change the file permissions if allowed
    						unlink("$filename"); //remove the file
					}
					*/
					if(move_uploaded_file($temp_file,$filename)){
						if(mysqli_query($con,"insert into `book` VALUES($id,'$name','$publisher','$ISBN',$weight,'none',$price,$rating,'$stock_id',$qty,10,'$filename','$Author','book','no','null','null','The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.')")){
						echo "<script>alert('Details of Book $name Inserted');</script>";	
						
						}else{
							echo "<script>alert('Data insert fail');</script>";	
						}
					}else{
						
						echo "<script>alert('$filename');</script>";	
					}
					
					
					
				}
					
				
				
				
				
				
		 
		 ?>
         <table>
            <tr><td>
            <table>
            	<tr>
                <td>
                ID
                </td>
                
                <td>
                <input type="text" name="id" readonly value=<?php $ar = mysqli_query($con,"select count(*) from `book`"); 
				$ar = mysqli_fetch_array($ar);
				$ar = intval($ar[0]) + 1;
				echo "'$ar'";
				?>
                >
                </td>
                </tr>
                
                <tr>
                <td>
                Name
                </td>
                
                <td>
                <input type="text" name="name" 
                required>
                </td>
                </tr>
                
                <tr>
                <td>
                Rating
                </td>
                
                <td>
                <input type="text" name="rating" required>
                </td>
                </tr>
                
                
                 <tr>
                <td>
                Publisher
                </td>
                
                <td>
                <input type="text" name="publisher" required>
                </td>
                </tr>
                
                
                  <tr>
                <td>
                ISBN
                </td>
                
                <td>
                <input type="text" name="ISBN"  required>
                </td>
                </tr>
                
                
                  <tr>
                <td>
            	weight
                </td>
                
                <td>
                <input type="number" name="weight"  required>
                </td>
                </tr>
                
                
                  <tr>
                <td>
                Price
                </td>
                
                <td>
                <input type="number" name="price" required>
                </td>
                </tr>
                
                
                  <tr>
                <td>
               	Quantity
                </td>
                
                <td>
                <input type="number" name="qty"  required>
                </td>
                </tr>
                
                 <tr>
                <td>
               	Author
                </td>
                
                <td>
                <input type="text" name="Author"  required>
                </td>
                </tr>
                
                <tr>
                <td>
               	Cover
                </td>
                
                <td>
                <input type="file" name="path" id="path" accept="image/jpeg" required>
                </td>
                </tr>
               
                <tr>
                <td>
               	Stock ID
                </td>
                
                <td>
                <select required name="stock_id">
                <option value="1">Stock 1</option>
                <option value="2">Stock 2</option>
                </select>
                </td>
                </tr>
                
                
                <tr>
                <td>
                <input type="submit" style="max-width:100px;min-width:60px;font-size:11px;" name="sub1" value="Insert">
                </td><td>
               
                </tr>
                
                <tr>
                <td>
                <a href="index.php?action=2"><input type="button" style="max-width:100px;min-width:60px;font-size:11px;" value="Go Back"></a>
                </td>
                </tr>
            </table>
            </td>
            <td></td></tr></table>
         
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
