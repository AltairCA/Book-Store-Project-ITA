<!doctype html>
<html>
<head><title>User Uploads</title>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
<link type="text/css" href="style/style.css" rel="stylesheet">
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
                <a href=''><li>Register</li></a>";
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
         
<div id="sidebar" align="left";>
<div class="title">

<a href="product.php">Top 10 Books</a><br>
<a href="new.php">New Releases</a><br>
<a href="free.php">Free Books</a><br>
<a href="user.php">User Uploaded</a><br>
<a href="audio.php">Audio Books</a>

</div>

         </div>
		 
		 <span align="LEFT" id="small">
		 <hr>
		 <form>
		 <h3 style="text-transform:uppercase">Top 10 Books
		   
		   <select name="select">
		     <option value="Most Sold">Most Sold</option>
		     <option value="rating">Rating</option>
			 <option value="new">Recently Added</option>
	       </select>
</h3>
			</span>
			
		 <div>
		 
		   <div align="left" id="books">
		     <?php 
			 error_reporting(0);
			 
			 $query = mysqli_query($con,"SELECT * FROM `book` where type='user'");
				$dollar='$';
				$row;
				$cart_qty;
				for($x=0;$x<10;$x++){
					$row = mysqli_fetch_array($query);
					$id = $row[0];
					$b_name = $row[1];
					$b_publisher = $row[2];
					$b_price = $row[6];
					$b_path=$row[11];
					echo "<div><img src='test.png'></div>
					<span style='position:absolute; top:".(292+($x*245))."px; left:250px;'><a href='download.php?id=$id'><image width='139px' height='211px' src=$b_path></a></span>
	<span style='position:absolute; top:".(304+($x*244))."px; left:400px;'>".$b_name."</span>
			 <span style='position:absolute; top:".(345+($x*246))."px; left:400px;'>".$b_publisher."</span>
			 <span style='position:absolute; top:".(367+($x*245))."px; left:400px;'>Download Options:Epub,PDF</span>
			 <span style='position:absolute; top:".(329+($x*245))."px;; left:788px; width: 128px; height: 65px; color: #093; font-size: xx-large; font-family: 'Times New Roman';'><strong>".$dollar."".$b_price."</strong></span>";
					
				}
				
			 
			 ?>
			 <!--
			 <div>
			 <img  src="test.png"></div>
			 <span style="position:absolute; top:304px; left:400px;">The Ocean at the End of the Sea</span>
			 <span style="position:absolute; top:345px; left:400px;">By Jail Jhonson</span>
			 <span style="position:absolute; top:367px; left:400px;">Download Options:Epub,PDF</span>
			 <span style="position:absolute; top:324px; left:788px; width: 128px; height: 65px; color: #093; font-size: xx-large; font-family: 'Times New Roman';"><strong> $12.34</strong></span>
			 
			
			 
			 
			 <div>
			 <img src="test.png"></div>
			 <span style="position:absolute; top:545px; left:400px;">The Ocean at the End of the Sea</span>
			 <span style="position:absolute; top:591px; left:400px;">By Jail Jhonson</span>
			 <span style="position:absolute; top:612px; left:400px;">Download Options:Epub,PDF</span>
			 <span style="position:absolute; top:569px; left:788px; width: 128px; height: 65px; color: #093; font-size: xx-large; font-family: 'Times New Roman';"><strong> $12.34</strong></span>
			 
			 
			 
			 
			 
			  
			 <div>
			 <img src="test.png">
			<span style="position:absolute; top:786px; left:400px;">The Ocean at the End of the Sea</span>
			 <span style="position:absolute; top:837px; left:400px;">By Jail Jhonson</span>
			 <span style="position:absolute; top:857px; left:400px;">Download Options:Epub,PDF</span>
			 <span style="position:absolute; top:814px; left:788px; width: 128px; height: 65px; color: #093; font-size: xx-large; font-family: 'Times New Roman';"><strong> $12.34</strong></span>	
		
		</div>
			 
			 <div>
			 <img src="test.png">
			 <span style="position:absolute; top:1030px; left:400px;">The Ocean at the End of the Sea</span>
			 <span style="position:absolute; top:1086px; left:400px;">By Jail Jhonson</span>
			 <span style="position:absolute; top:1106px; left:400px;">Download Options:Epub,PDF</span>
			 <span style="position:absolute; top:1059px; left:788px; width: 128px; height: 65px; color: #093; font-size: xx-large; font-family: 'Times New Roman';"><strong> $12.34</strong></span>
			 
			 </div>
			 
			  
			 <div>
			 <img src="test.png"></div>
			 <span style="position:absolute; top:1279px; left:400px;">The Ocean at the End of the Sea</span>
			 <span style="position:absolute; top:1339px; left:400px;">By Jail Jhonson</span>
			 <span style="position:absolute; top:1357px; left:400px;">Download Options:Epub,PDF</span>
			 <span style="position:absolute; top:1306px; left:788px; width: 128px; height: 65px; color: #093; font-size: xx-large; font-family: 'Times New Roman';"><strong> $12.34</strong></span>  
			-->
			</div>
		 
		 
		 
		 
		  <!-------------Code Above------------------>
		 
         <footer style="padding-top:100px;"><table id="template_table">
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
         <center>All Rights Reserved WeBooks! 2014</center><footer>
	 	</div>
    
    </div>
</div>
</body>
</html>
