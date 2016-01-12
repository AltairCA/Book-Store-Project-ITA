<!doctype html>
<html>
<head>
<title>Payment</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
<link type="text/css" href="style/style2.css" rel="stylesheet">
<script type="application/javascript" language="javascript" src="js/script2.js"></script>

<meta charset="utf-8">
</head>
<body>

<div align="center">

	<div  id="maindiiv" align="center">
    	<div id="mainnav" align="center" >
       		
        	
       		<?php
				
				session_start();
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
		
		 if($name==" "){
			 session_start();
	$_SESSION["url"] = "../checkout/index2.php";
			header("Location: ../Login/index.php");  
		 }
		 if($_POST["fname"]==""){
			 header("Location: index2.php");
		 }
		 $order_query = mysqli_query($con,"SELECT * FROM  `order` WHERE  `username` =  '$username' and payment_state=0");
				$wheight;
				$price;
				//$erro = mysql_error($con);
				if($row = mysqli_fetch_array($order_query)){
					$wheight = $row[2];
					$price = $row['total_amount'];
					if(intval($price)==0){
						header("Location: ../home/index.php");  
					}
					
				}else{
					header("Location: ../Login/index.php");  	
				}
				//echo mysql_errno($con) . ": " . mysql_error($con) . "\n";
				//paypal purpose
				$_SESSION["name"]=$_POST["fname"];
				$_SESSION["phone"]=$_POST["phone"];
				$_SESSION["email"]=$_POST["email"];
				$_SESSION["address"]=$_POST["address"];
				$_SESSION["line2"]=$_POST["line2"];
				$_SESSION["state"]=$_POST["state"];
				$_SESSION["zip_postal"]=$_POST["zip_postal"];
				
				
				$_SESSION['country'];
				
				$s_name = $_POST["fname"];
				$s_phone = $_POST["phone"];
				$s_email = $_POST["email"];
				$s_company = $_POST["company"];
				$s_address = $_POST["address"];
				$s_line2 = $_POST["line2"];
				$s_state = $_POST["state"];
				$s_zip_postal = $_POST["zip_postal"];
				$s_country = $_POST["country"];
				$s_newadd;
				$_SESSION["paypalitems2"] = "&ADDROVERRIDE=0".
                "&PAYMENTREQUEST_0_SHIPTONAME="."$s_name".
                "&PAYMENTREQUEST_0_SHIPTOSTREET="."$s_address".
                "&PAYMENTREQUEST_0_SHIPTOCITY="."$s_line2".
                "&PAYMENTREQUEST_0_SHIPTOSTATE="."$s_state".
                "&PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE=LK".
                "&PAYMENTREQUEST_0_SHIPTOZIP="."$s_zip_postal".
                "&PAYMENTREQUEST_0_SHIPTOPHONENUM=".$s_phone."&PAYMENTREQUEST_0_ITEMAMT=".$price;
				$_SESSION["itempricess"]=$price;
				//echo mysql_errno($con) . ": " . mysql_error($con) . "\n";
				if($s_company!=""){
				$s_newadd = $s_name."<br>".$s_company."<br>".$s_address."<br>".$s_line2."<br>".$s_zip_postal."<br>".$s_state."<br>".$s_country."<br>"."Tel :".$s_phone;
				}else{
					$s_newadd = $s_name."<br>".$s_address."<br>".$s_line2."<br>".$s_zip_postal."<br>".$s_state."<br>".$s_country."<br>"."Tel :".$s_phone;
				}
				mysqli_query($con,"UPDATE `order` SET `address` = '$s_newadd' WHERE `username` =  '$username' and payment_state=0;");
        ?>
        <table><tr><td>
        
        <h2 id = "price" style="margin-right:400px;box-shadow:0px 5px 0px 0px rgba(44, 50, 50, 0.26);font-style:italic;max-width:180px;">Your Total $<?php echo "$price"; ?></h2>
        
         <form style="margin-top:50px;" onSubmit="return validate()" action="config/expresscheckout.php" method="post">
         <input type="number" value="" name="net_price" style="display:none;">
         	<table  cellpadding="0px" cellspacing="0px" hspace="0px" vspace="0px" id="payment">
             <tr>
            <td>Shipping Package</td>
            <td><select name="package" required onChange="listchange(package,img_package,<?php echo "$price"; ?>)">
            <option value="select"><?php echo "---------------- Select ----------------" ?></option>
            
            <?php
				//$wheight =  201;
				
				$previoous = mysqli_query($con,"SELECT `max_weight` FROM `package` where `package_id`='1'");
				if($row = mysqli_fetch_array($previoous)){
					$previoous = $row['max_weight'];
				}
				
				$pk = mysqli_query($con,"SELECT * FROM `package`");
				
				while($row = mysqli_fetch_array($pk)){
					if($wheight<$row['max_weight']){
						
						$temp = '<option value='.($row['price']).'>Package '.($row['package_id']).' ('.($row['max_weight']-$previoous).'g - '.($row['max_weight']).'g) - '.($row['price']).'$</option>' ;
						echo $temp;
					}
					
					
				}
				
				/*$skip = floor($wheight/100);
				for(;$skip<10;$skip++){
					$temp = '<option value=pk'.($skip+1).'>Pckage '.($skip+1).' ('.($skip*100).'g - '.(($skip+1)*100).'g) - '.(($skip+1)*2).'$</option>' ;
					
				}*/
			?>
            </select>
            </td><td><img style="margin-left:20px;" id="img_package"  src="img/loader.gif" width="16px" height="16px"></td>
            </tr>
            
            <tr>
            <td>Payment Method</td>
            <td><select name="method" required onChange="listchange(method,img_method,<?php echo "$price"; ?>)">
            <option value="select">----------- Select -----------</option>
            <option value="PayPal">PayPal</option>
            
            </select>
            </td><td><img style="margin-left:20px;" id="img_method"  src="img/loader.gif" width="16px" height="16px"></td>
            </tr>
            
            <tr>
            <td colspan="3"><input type="checkbox" style="box-shadow:none;" name="agreement">I agree to WeBooks <a href="../Terms and Conditions/index.php">Terms and Condtions</a> </td>
            
            </tr>
            <tr><td></td>
            <td>
            <input type="submit" value="" id="submitstyle" style="min-width:130px;
	min-height:35px;">
            </td>
            </tr>
            <tr>
            </tr>
           
            </table>
         </form>
         </td><td style="border-left:1px dashed #333333;padding-left:60px;">
        <p style="text-align:left;margin-bottom:120px;-webkit-box-shadow: 0px 0px 30px 0px rgba(44, 46, 44, 0.82);-moz-box-shadow:0px 0px 30px 0px rgba(44, 46, 44, 0.82);box-shadow:0px 0px 30px 0px rgba(44, 46, 44, 0.82);padding:20px;">Shipping Address:<br><br><?php echo "$s_newadd"; ?> </p> 
         </div>
         </td></tr>
         <tr>
         <td colspan="2" style="padding-left:230px;padding-right:230px;padding-top:50px;"><div class="progress">
      <div class="progress-bar"></div><p style="padding: 0px;position:inherit; margin: 0px; font-size: 14px;color:#000000" align="center">Step 3</p>
    </div></td></tr></table></div>
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
