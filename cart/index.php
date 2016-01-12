<!doctype html>
<html>
<head>
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
<link type="text/css" href="style/style.css" rel="stylesheet">
<title>Cart</title>
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
				require 'config/private2.php';
			?>
            </li>
            <li style="min-width:50px;max-width:50px;"><img src="img/cart.png" height="15px" width="20px"><ul style="margin-left:-112px;"><a href="index.php">
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
		 require 'config/private3.php';
		 ?>
         
         <form method='post'>
         
         <table border="0" id="qty_table" cellpadding="5px" cellspacing="0px">
         <tr>
         <th style="min-width:100px;max-width:100px;border-bottom:2px #000000 solid;">Quantity</th>
        
         <th colspan="2" style="min-width:700px;max-width:700px;border-bottom:2px #000000 solid;">Description</th>
         <th style="min-width:100px;max-width:100px;border-bottom:2px #000000 solid;">Price</th>
         <th style="min-width:100px;max-width:100px;border-bottom:2px #000000 solid;">Weight</th>
         <th style="min-width:15px;max-width:15px;border-bottom:2px #000000 solid;"></th>
         </tr><?php 
		 		require 'config/private4.php';
		 ?>
       
        
         <tr >
         <td><input type='submit' value='update' name='qty_update'</td>
         <td><input style='float:left;' type='submit' value='clear' name='clear'></form></td>
         </tr>
         <tr>
          <td>
         				</td><td></td>
                <td style='text-align:right;'>Your Total</td>
              <td>$ <?php echo"$total_amount"; ?></td>
                <td><?php echo"$total_weight"; ?>g</td>
                <td></td>
                <?php
				mysqli_query($con,"update `order` set `quantity` = ".$total_qty.",`total_weight`=".$total_weight." ,`total_amount`=".$total_amount." where `username`='$username' and `payment_state`=0");
				
				?>
         </tr> 
         <tr><td></td><td> </td><td></td><td colspan="2">
         <?php
         if($total_amount!=0){
			 echo " <form action='../checkout/index2.php'><input type='submit' value='' id='submitstyle' style='min-width:130px;
	min-height:35px;'></form>";
		 }
        
	?>
	</td><td></td></tr>
         <tr><td></td><td colspan="2" style="padding-top:50px;padding-left:50px;padding-right:50px;"><div class="progress">
      <div class="progress-bar"></div><p style="padding: 0px;position:inherit; margin: 0px; font-size: 14px;color:#000000" align="center">Step 1</p>
    </div></td><td></td><td></td><td></td></tr>
         </table>
         
         
         
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
