<!doctype html>
<html>
<head>
<title>Home</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mhrotator.js"></script>
<script type="text/javascript" src="js/initrotator.js"></script>
<link rel="stylesheet" href="js/mhrotator.css" type="text/css" />
<link rel="stylesheet" href="style/style.css" type="text/css"/>
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
         <table border="0" bordercolor="#000000" cellpadding="25px"  cellspacing="15px" id="maintable">
         <tr><td><div id="mhrotator">
<style type="text/css"> #mhrotator img { display:none; } </style>
<img src="images/1.jpg" title="1" />
<img src="images/2.jpg" title="2" />
<img src="images/3.jpg" title="3" />
<img src="images/4.jpg" title="4" />
<img src="images/5.jpg" title="5" />
<img src="images/6.jpg" title="6" />
<img src="images/r.jpg" title="r" />
<img src="images/t.jpg" title="t" />
<img src="images/Webooks5.jpg" title="Webooks5" />

<a class="sliderengine"></a>
</div>
         </td>
         
         <td>
         <!-- inside table -->
         <table id="subtable" border="0" cellspacing="5px">
         <tr><th colspan="4" style="padding-bottom:10px;font-family: 'Adobe Caslon Pro', 'Hoefler Text', Georgia, Garamond, Times, serif;font-size:24px;">Most Sold</th></tr><tr></tr>
         <tr>
         <?php
         	$most_query = mysqli_query($con,"SELECT  `book_id` , SUM(  bo.`qty` ) AS  'quentity',`path`,`name` FROM  `b_o` bo,`book` b where bo.`book_id` = b.`id` GROUP BY  `book_id` ORDER BY `quentity` DESC");
				$row_most;
				$most_pic_path;
				$book_name;
				for($x=0;$row_most = mysqli_fetch_array($most_query) and $x<2;$x++){
					$most_pic_path = $row_most[2];
					$book_name = $row_most[3];
					if($x==0){
					echo "<td><div style='padding-left:30px;text-align:center;'><a href='../Product Page/download.php?id=$row_most[0]'><img id='img_hid' width='120' height='190' src=".$most_pic_path."><br><img width='120' height='190' src=".$most_pic_path."></a><br><strong>".$book_name."</strong></div> </td>";
					}else{
					echo "<td><div style='padding-left:0px;padding-right:0px;text-align:center;'><a href='../Product Page/download.php?id=$row_most[0]'><img id='img_hid' width='120' height='190' src=".$most_pic_path."><br><img width='120' height='190' src=".$most_pic_path."></a><br><strong>".$book_name."</strong></div> </td>";	
					}
				}
				
				
         ?>
         
         </tr></table>
         <!-- inside table finish -->
         </td>
         </tr>
         
         
         
         <tr> <td colspan="2" style="padding-right:20px;">
         <!-- inside table -->
         <table cellspacing="10px" border="0" >
         <tr><th style="padding-bottom:20px;font-family: 'Adobe Caslon Pro', 'Hoefler Text', Georgia, Garamond, Times, serif;font-size:24px;" colspan="5">New Arrivals</th></tr>
         <tr>
         
         <?php
         
         	$most_query = mysqli_query($con,"SELECT  `id`,`name` ,  `path` FROM  `book` ORDER BY (`id`) DESC ");
				$row_most;
				$most_pic_path;
				$book_name;
				for($x=0;$row_most = mysqli_fetch_array($most_query) and $x<5;$x++){
					$most_pic_path = $row_most[2];
					$book_name = $row_most[1];
					if($x==0){
					echo "<td><div style='padding-left:30px;text-align:center;'><a href='../Product Page/download.php?id=$row_most[0]'><img id='img_hid' width='120' height='190' src=".$most_pic_path."><br><img width='120' height='190' src=".$most_pic_path."></a><br><strong>".$book_name."</strong></div> </td>";
					}else if($x==4){
						echo "<td><div style='padding-right:30px;text-align:center;'><a href='../Product Page/download.php?id=$row_most[0]'><img id='img_hid' width='120' height='190' src=".$most_pic_path."><br><img width='120' height='190' src=".$most_pic_path."></a><br><strong>".$book_name."</strong></div> </td>";
					}else{
						echo "<td><div style='text-align:center;'><a href='../Product Page/download.php?id=$row_most[0]'><img id='img_hid' width='120' height='190' src=".$most_pic_path."><br><img width='120' height='190' src=".$most_pic_path."></a><br><strong>".$book_name."</strong></div> </td>";
						
					}
				}
				?>
         
         
         </tr></table>
         <!-- inside table finish -->
         </td>         
         </tr>
         
         
         
         
         
         <tr> <td colspan="2" style="padding-right:20px;">
         <!-- inside table -->
         <table cellspacing="10px" border="0" >
         <tr><th style="padding-bottom:20px;font-family: 'Adobe Caslon Pro', 'Hoefler Text', Georgia, Garamond, Times, serif;font-size:24px;" colspan="5">Most Popular</th></tr>
         <tr>
         <?php
         
         	$most_query = mysqli_query($con,"SELECT `id`,`name`,`path` FROM `book` order by(`rating`) DESC");
				$row_most;
				$most_pic_path;
				$book_name;
				for($x=0;$row_most = mysqli_fetch_array($most_query) and $x<5;$x++){
					$most_pic_path = $row_most[2];
					$book_name = $row_most[1];
					if($x==0){
					echo "<td><div style='padding-left:30px;text-align:center;'><a href='../Product Page/download.php?id=$row_most[0]'><img id='img_hid' width='120' height='190' src=".$most_pic_path."><br><img width='120' height='190' src=".$most_pic_path."></a><br><strong>".$book_name."</strong></div> </td>";
					}else if($x==4){
						echo "<td><div style='padding-right:30px;text-align:center;'><a href='../Product Page/download.php?id=$row_most[0]'><img id='img_hid' width='120' height='190' src=".$most_pic_path."><br><img width='120' height='190' src=".$most_pic_path."></a><br><strong>".$book_name."</strong></div> </td>";
					}else{
						echo "<td><div style='text-align:center;'><a href='../Product Page/download.php?id=$row_most[0]'><img id='img_hid' width='120' height='190' src=".$most_pic_path."><br><img width='120' height='190' src=".$most_pic_path."></a><br><strong>".$book_name."</strong></div> </td>";
						
					}
				}
				?>
        
         
         </tr></table>
         <!-- inside table finish -->
         </td>         
         </tr>
         
         
         
         
         </table>
         
         <!--code above -->
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
