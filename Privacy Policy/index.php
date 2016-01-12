<!doctype html>
<html>
<head>
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
<title>Privacy Policy</title>
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
		 <div text-align: left;>
<hr>
  WeBooks - Privacy Policy for WeBooks
<hr><br><br>
|September 20, 2014|
<br><br>
The main WeBooks Privacy Policy describes how we treat personal information when you use WeBooks's products and services, including WeBooks Play. This additional policy for books on WeBooks Play does three things: (1) it highlights key provisions of the main WeBooks Privacy Policy in the context of books on WeBooks Play, and (2) it describes privacy practices specific to books on WeBooks Play.
<br><br>
Key provisions from the WeBooks Privacy Policy
<br><br>
All of the provisions of the WeBooks Privacy Policy apply to books on WeBooks Play. Among other things, this means:
<br><br>
We do not share your personal information with third parties, except in the narrow circumstances described in the Privacy Policy, such as emergencies or in response to valid legal process. For purchased books, we provide publishers with sales information, but do not provide personal information. For purchased books where we acted as the publisher's agent, we provide the publisher with information on the taxes we collect including the state, city and zip code from the purchaser's billing address. WeBooks offers books for sale not only from WeBooks Play, but also through resellers as well (for example, for purchase off a reseller's website or reading device). Also, our application developer partners use WeBooks services to integrate with WeBooks Play and provide you access to books from WeBooks Play on their services. When you purchase a book through a reseller or use services of an application developer, you will need to log in with your WeBooks Account information or create a WeBooks Account if you don't have one. Once you have logged in, if you choose to synchronize your WeBooks Play account with your account with the reseller or application developer, we will share information about your books on WeBooks Play (e.g., all of your library shelves, titles, annotations, last five pages read for each book), except information regarding the seller(s) from whom you purchased your books, with the reseller or application developer. The application developer's or reseller's treatment of that information (and any other information you submit to the reseller or application developer directly) will be governed by the application developer's or reseller's privacy policy, not ours; please make sure to review any applicable privacy policy when you choose to purchase through a reseller or use services of an application developer.
When you use books on WeBooks Play, we receive log information similar to what we receive in Web Search. This may include information such as the query term or page request (which may include book titles or specific pages within a book you are browsing), Internet Protocol address, browser type, browser language, the date and time of your request and one or more cookies that may uniquely identify your browser or your account.
Unless you are logged into your WeBooks Account, your activity on WeBooks Play will not be associated with your WeBooks Account.
You may choose to use optional features within books on WeBooks Play (such as My Library or purchased books) or other optional WeBooks services (such as our Web History service) that require a WeBooks Account and which may receive and store information from books on WeBooks Play in association with your Account. Books features that store information with your Account will show you the information you have stored and allow you to delete it (unless we are required to keep it by law or for legitimate and limited business purposes such as fraud investigations). However, you will not be able to delete the record of your purchase transaction (including the title of the book) from your Checkout account history.
WeBooks uses the information it stores for the purposes discussed in the WeBooks Privacy Policy, including to improve our services (for example, to help customize recommendations for WeBooks products or services you may be interested in), for security, and to report on aggregate user trends.
Usage data from WeBooks Play is subject to the same security standards that are outlined in our main Privacy Policy.
Practices specific to books on WeBooks Play product
<br><br>
The privacy practices that are specific to books on WeBooks Play are:
<br><br>
To fulfill contractual commitments to rightsholders who license us books, we enforce certain security limits (for example, to prevent abusive sharing of purchased books and to enforce page view limits on some book previews), and we also enforce limits on the numbers of browsers or devices that can access an account during a given period of time. In order to enforce limits on numbers of devices, we will store the unique ID numbers of your devices on our servers. You can delete a device ID number when you wish to stop using that device.
You will need to have a WeBooks Account in order to purchase books because account information is necessary to provide access to users who bought the book. We limit the information (such as books titles) we provide to credit card companies, and enable you to delete purchased books from your WeBooks Account. However, you will not be able to delete the record of your purchase transaction (including the title of the book) from your Checkout account history.
In order to enable consistent reading position across devices and provide useful navigation within a book, we store the last five pages (only) in each book a user has viewed with the user's account. We also store pages viewed for security monitoring and/or if the user elects to use the Web History service.
Special legal privacy protections for users may apply in cases where law enforcement or civil litigants ask WeBooks for information about what books an individual user has looked at. Some jurisdictions have special "books laws" saying that this information is not available unless the person asking for it meets a special, high standard such as proving to a court that there is a compelling need for the information, and that this need outweighs the reader's interest in reading anonymously under the United States First Amendment or other applicable laws. Where these "books laws" exist and apply to books on WeBooks Play, we will raise them. We will also continue our strong history of fighting for high standards to protect users, regardless of whether a particular "books law" applies. In addition, we are committed to notifying the affected user if we receive such a request that may lead to disclosure of their information; if we are permitted to do so by law and if we have an effective way to contact the user, we will seek to do so in time for the user to challenge the request.
For additional information about books on WeBooks Play and privacy, please see our FAQ.

</div>
		 
		 <!-------------Code Above------------------>
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
