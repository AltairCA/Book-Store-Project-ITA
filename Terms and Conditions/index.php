<!doctype html>
<html>
<head>
<title>Terms and Conditions</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
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
  <p>  <hr> 
<h3>  
   Terms and Conditions-
Welcome to WeBooks Books!
</h2>
<hr>
</p>
<br>

The WeBooks Terms of Services and these additional terms shall be the “Terms of Service.” WeBooks may change the Terms of Service from time to time and post any modified terms at http://www.WeBooks.com/WeBooksbooks/tos.html. You understand and agree that if you use the Service after the date on which these terms have changed, WeBooks will treat your use as acceptance of the updated terms.
<br><p> <br><center>
1. Usage Requirements.<br><br> To use the Service, you will need a compatible device, working Internet access, and compatible software. Your ability to use the Service and the performance of the Service may be affected by these factors. Such system requirements are your responsibility.
<br><br>
2. Digital Content.
<br><br>
The WeBooks Books Digital Content Store. The WeBooks Books Digital Content store and our distribution partners enable you, subject to the restrictions set forth herein, to view, download, display and use on your devices, including but not limited to mobile devices, e-readers, and personal computers (each a “Device”) a variety of digitized electronic content, such as books, journals and other periodicals, and other digital content, as determined by WeBooks ("Digital Content"). WeBooks may change the entities from which you download Digital Content and through which your WeBooks Books Digital Content transactions will be processed from time to time without notice.

Use of Digital Content. Following payment of the applicable fees for an item of Digital Content, for as long as WeBooks and the applicable copyright holder have rights to provide you that Digital Content, WeBooks gives you the non-exclusive right to download, subject to the restrictions set forth herein, copies of the applicable Digital Content to your Devices, and to view, use, and display such Digital Content an unlimited number of times on your Devices or as otherwise authorized by WeBooks as part of the Service for your personal, non-commercial use. If WeBooks or the applicable copyright holder loses the rights to provide you any Digital Content, WeBooks will cease serving such Digital Content to you and you may lose the ability to use such Digital Content. For certain Digital Content, WeBooks may be acting as an agent of the copyright holder (and its agents) in providing such Digital Content to you under the Terms of Service. You acknowledge that such copyright holder (and its agents) shall be the seller(s) of such Digital Content to you under the Terms of Service. Select, copy and paste functions may be available for some Digital Content, and you must use these features within the prescribed limits and only for personal non-commercial purposes.

Restrictions. You may not sell, rent, lease, distribute, broadcast, transfer, or assign your rights to the Digital Content or any portion of it to any third party except as expressly permitted by WeBooks. Provided, however, that nothing in the Terms of Service shall prohibit any uses of Digital Content that would otherwise be permitted under the United States Copyright Act. In addition, you may not remove any watermarks, labels, or other proprietary notices on or in the Digital Content. If you have multiple WeBooks accounts with different user names, you may transfer Digital Content out of an account and into another account, provided you are the owner of each such account and provided WeBooks has enabled a feature of the Service allowing such transfers. You acknowledge and agree that WeBooks may place limits on the number of Devices and/or software applications you may use to access Digital Content and that such limits may be set by WeBooks at any time at WeBooks’s discretion. You acknowledge and agree that WeBooks may record and store the unique device identifier numbers of your Devices in order to enforce such limits.
<br><br>
3. Security; User-Submitted Content.
<br><br>
You understand that the Service and Digital Content provided through the Service utilize technology designed to protect the security of digital information. You may not attempt to, nor assist or encourage others to, circumvent, disable, defeat, reverse-engineer, decompile, or tamper with any of the security features or components related to the Service or Digital Content for any reason. Violations of security features may result in civil or criminal liability. You may not access nor attempt to access a WeBooks account that you are not authorized to access.

The Service offers features that allow you to submit, post, or display comments, information, materials, links, and other similar content (collectively, “User Content”) on areas of the Service accessible by others. You represent and agree that any use by you of such features, including your submission, posting, or display of any User Content and any use you make of User Content submitted by others, shall be your sole responsibility, shall not infringe or violate the rights of any other party or violate any laws, contribute to or encourage infringement or other illegal conduct, or otherwise be obscene, or objectionable, and that you have obtained all necessary rights and licenses with respect to such User Content. You further agree to provide truthful and complete information in connection with your submission, posting, or display of any User Content on the Service. Moreover, you give WeBooks a perpetual, irrevocable, worldwide, royalty-free, and non-exclusive license to reproduce, adapt, modify, translate, publish, publicly perform, publicly display, create derivative works of, and distribute any User Content that you submit, post, or display on or through, the Service, without any compensation or obligation to you.

WeBooks reserves the right not to post, display, or publish any User Content, and to delete, remove or edit any User Content submitted, posted, or displayed by you on areas of the Service, at any time in its sole discretion without notice to you or liability to WeBooks.

WeBooks has the right, but not the obligation, to monitor any User Content submitted, posted, or displayed by you on the Service, to investigate any reported or apparent violation of the Terms of Service, and to take any action that WeBooks in its sole discretion deems appropriate.
<br><br>

4. Payment.
<br><br>
Payment for Digital Content. You agree to pay for all Digital Content you purchase through the Service, and for any additional amounts (including any taxes and late fees, as applicable) as may be accrued by or in connection with your use of the Service. You are responsible for the timely payment of all fees and for providing WeBooks with valid account and other details necessary to process payments. You may return Digital Content you purchased from the WeBooks Books Digital Content store to WeBooks for a refund if the Service does not perform as stated with respect to that purchased Digital Content, provided WeBooks receives your refund request within 7 days of purchase. Following WeBooks’s provision of a refund to you, you will no longer have the right to access the applicable Digital Content. For Digital Content purchased from WeBooks’s distribution partners, the refund policies of such distribution partners shall apply.

Right to Change Prices and Availability of Digital Content. Prices and availability of any Digital Content are subject to change at any time.
<br><br>
5. General.
<br><br>
Usage Information. The WeBooks Books Privacy Policy describes how we treat personal and certain other information generated by your use of the Service.

Service Changes. WeBooks shall have the right to suspend, modify, or discontinue the Service at any time without liability to WeBooks. If WeBooks elects to discontinue the Service, it shall, if permitted by law, provide prior notice to you of the discontinuance in the event that you wish to download purchased Digital Content in your account. Additionally, the copyright holders of Digital Content may update such Digital Content and change digital rights settings for such Digital Content from time to time.

Termination. If you fail to comply with any term of the Terms of Service, WeBooks may automatically terminate your rights hereunder, including revoking your access to the Service or Digital Content, without notice to you and without refunding any fees paid by you. WeBooks's failure to enforce any term of the Terms of Service will not constitute a waiver of any of its rights or any terms of the Terms of Service.

Amendment. WeBooks may amend the terms of the Terms of Service at its sole discretion by posting the amended terms on its website. Your continued use of the Service after seven days following the date such amended terms are posted will constitute your acceptance of and agreement to be bound by the amended terms.
		 
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
