<!doctype html>
<html>
<head>
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
<link href="style/style.css" rel="stylesheet" type="text/css">
<title>Admin Page</title>
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
         <table><tr><td id="left_pane" valign="top">
         		
                
                	<table>
                    	<tr><td><a href="index.php?action=1">User Edit</a></td>
                        </tr>
                        <tr><td><a href="index.php?action=2">Books Info Edit</a></td>
                        </tr>
                        <tr><td><a href="index.php?action=3">Shipping Info</a></td>
                        </tr>
                        <tr><td><a href="insert.php">Book Add</a></td>
                        </tr>
                    </table>
                    
                </td><td id ="right_pane" valign="top">
               
                	
                	<table id="details" cellspacing="0px" cellpadding="0px" style="min-width:1100px;">
                    	<?php
							if(!(is_null($_GET["action"]))){
								$action = $_GET["action"];
								if(intval($action)==1){
									echo "<tr><form method='get' action='index.php'><td style='border:0px;'><input type='number' name='action' value=1 style='display:none;'>
									<select name='choice' style='min-width:100px;max-width:100px;'>
									<option value='By_Name'>By Name</option>
									<option value='By_EMAIL'>By Email</option>
									<option value='Level'>By Level(Greater than)</option>
									</select></td>
									<td style='border:0px;'  colspan=3><input name='searcher' style='min-width:700px;' type='text'></td><td style='border:0px;' ><input style='max-width:80px;min-width:80px;padding:0px;font-size:11px;' type='submit' value='Search'></td></form></tr>";
									echo "<tr><th>User name</th><th>Email</th><th>Country</th><th>Priviledge Level</th><th>Edit</th></tr>";
									if(trim($_GET["searcher"])==""){
										$user_query = mysqli_query($con,"select * from `user`");
									}else{
										$se = $_GET["searcher"];
										if($_GET["choice"]=="By_Name"){
												$user_query = mysqli_query($con,"select * from `user` where `username` like '%$se%'");
										}else if($_GET["choice"]=="By_EMAIL"){
											
												$user_query = mysqli_query($con,"select * from `user` where `email` ='$se'");
										}else if($_GET["choice"]=="Level"){
											$user_query = mysqli_query($con,"select * from `user` where `level`>=$se");
										}
											
									}
									
									$user_arry;
									while($user_arry = mysqli_fetch_array($user_query)){
											echo "<tr><td>$user_arry[0]</td>";
											echo "<td>$user_arry[1]</td>";
											
											echo "<td>$user_arry[10]</td>";
											
											echo "<td>$user_arry[12]</td>";
											echo "<td id='button_edit'><a href='user_edit.php?u_id=$user_arry[0]'><input type='button' style='max-width:80px;min-width:80px;padding:0px;font-size:11px;' value='Edit'></a></td></tr>";
									}
									
									
								}else if(intval($action==2)){
									echo "<tr><form method='get' action='index.php'><td style='border:0px;'><input type='number' name='action' value=2 style='display:none;'>
									<select name='choice' style='min-width:100px;max-width:100px;'>
									<option value='By_Name'>By Name</option>
									<option value='By_ID'>By ID</option>
									<option value='By_ISBN'>By ISBN</option>
									</select></td>
									<td style='border:0px;'  colspan=3><input name='searcher' style='min-width:700px;' type='text'></td><td style='border:0px;' ><input style='max-width:80px;min-width:80px;padding:0px;font-size:11px;' type='submit' value='Search'></td></form></tr>";
									echo "<tr><th>ID</th><th>Name</th><th>ISBN</th><th>Price</th><th>Edit</th></tr>";
									
									if(trim($_GET["searcher"])==""){
										$book_query = mysqli_query($con,"select * from `book`");
									}else{
										$se = $_GET["searcher"];
										if($_GET["choice"]=="By_Name"){
												$book_query = mysqli_query($con,"select * from `book` where `name` like '%$se%'");
										}else if($_GET["choice"]=="By_ID"){
											
												$book_query = mysqli_query($con,"select * from `book` where `id`=$se");
										}else if($_GET["choice"]=="By_ISBN"){
											$book_query = mysqli_query($con,"select * from `book` where `ISBN` like '%$se%'");
										}
											
									}
									
									$book_arry;
									while($book_arry = mysqli_fetch_array($book_query)){
											echo "<tr><td>$book_arry[0]</td>";
											echo "<td>$book_arry[1]</td>";
											
											echo "<td>$book_arry[3]</td>";
											
											echo "<td>$book_arry[6]</td>";
											echo "<td id='button_edit'><a href='book_edit.php?b_id=$book_arry[0]'><input type='button' style='max-width:80px;min-width:80px;padding:0px;font-size:11px;' value='Edit'></a></td></tr>";
									}
									
									
								}else if(intval($action==3)){
									echo "<tr><th style='width:260px;'>ID</th><th style='width:260px;'>Max Weight</th><th style='width:260px;'>Price</th><th>Edit</th></tr>";
									$ship_query = mysqli_query($con,"select * from `package`");
									$ship_arry;
									while($ship_arry = mysqli_fetch_array($ship_query)){
											echo "<tr><td>$ship_arry[0]</td>";
											echo "<td>$ship_arry[1]</td>";
											
											echo "<td>$ship_arry[2]</td>";
											
											
											echo "<td id='button_edit'><a href='ship_edit.php?s_id=$ship_arry[0]'><input type='button' style='max-width:80px;min-width:80px;padding:0px;font-size:11px;' value='Edit'></a></td></tr>";
									}
								}
								
							}else{
								
									echo "<tr><th>User name</th><th>Email</th><th>Country</th><th>Priviledge Level</th><th>Edit</th></tr>";
									$user_query = mysqli_query($con,"select * from `user`");
									$user_arry;
									while($user_arry = mysqli_fetch_array($user_query)){
											echo "<tr><td>$user_arry[0]</td>";
											echo "<td>$user_arry[1]</td>";
											
											echo "<td>$user_arry[10]</td>";
											
											echo "<td>$user_arry[12]</td>";
											echo "<td id='button_edit'><a href='user_edit.php?u_id=$user_arry[0]'><input type='button' style='max-width:80px;min-width:80px;padding:0px;font-size:11px;' value='Edit'></a></td></tr>";
									}	
							
							}
						?>
                    </table>
                   
               </td></tr></table>
         
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
