<!doctype html>
<html>
<head>
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">

         <link rel="stylesheet" href="styles/about-us.css" media="screen" type="text/css" />

<link rel="stylesheet" href="styles/framework.css" media="screen" type="text/css" />
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
         

<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <div id="about-us" class="clear">
      <!-- ####################################################################################################### -->
      <section id="about-intro" class="clear">
      <iframe src="http://cache.www.gametracker.com/components/html0/?host=www.altairsl.us:9921&bgColor=373E28&fontColor=D2E1B5&titleBgColor=2E3225&titleColor=FFFFFF&borderColor=3E4433&linkColor=889C63&borderLinkColor=828E6B&showMap=0&currentPlayersHeight=160&showCurrPlayers=1&showTopPlayers=0&showBlogs=0&width=240" frameborder="0" scrolling="no" width="240" height="348"></iframe>
        <h2>About Us</h2>
        <img src="images/demo/logo.png" height="200px" width="300px" alt="">
        <p>In sed neque id libero pretium luctus. Vivamus faucibus. Ut vitae elit. In hac habitasse platea dictumst. Proin et nisl ac orci tempus luctus. Aenean lacinia justo at nisi. Vestibulum sed eros sit amet nisl lobortis commodo. Suspendisse nulla. Vivamus ac lorem. Aliquam pulvinar purus at felis. Quisque convallis nulla id ipsum. Praesent vitae urna. Fusce blandit nunc nec mi. Praesent vestibulum hendrerit ante.</p>
        <p>Vivamus accumsan. Donec molestie pede vel urna. Curabitur eget sem ornare felis gravida vestibulum.Sed pulvinar, tellus in venenatis vehicula, lorem magna dignissim erat, in accumsan ante lorem sit amet lorem.</p>
      </section>
      <!-- ####################################################################################################### -->
     
     
      <section id="team">
        <h2>Our Team</h2>
        
        
        	
        		
        		
        <ul class="clear">
          <li class="one_third first">
            <figure><img src="images/demo/sandunil.jpg" width="200px" height="200px" alt="">
              <figcaption>
                <p class="team_name">R.S Jayasinghe </p>
                <p class="team_title">SLIIT</p>
                
              </figcaption>
            </figure>
          </li>
          
          
          
          <li class="one_third">
            <figure><img src="images/demo/Iranga.jpg" width="200px" height="200px" alt="">
              <figcaption>
                <p class="team_name">M.M.I Perera</p>
                <p class="team_title">SLIIT</p>
              </figcaption>
            </figure>
          </li>
          
          
          <li class="one_third">
            <figure><img src="images/demo/dihara.jpg" width="200px" height="200px" alt="">
              <figcaption>
                <p class="team_name">Dihara Wijetunga</p>
                <p class="team_title">SLIIT</p>
              </figcaption>
            </figure>
          </li>
          
          <li class="one_third first">
            <figure><img src="images/demo/trishan.jpg" width="200px" height="200px" alt="">
              <figcaption>
                <p class="team_name">Dinuka D.T</p>
                <p class="team_title">SLIIT</p>
              </figcaption>
            </figure>
          </li>
          
          <li class="one_third">
            <figure><img src="images/demo/kapila.jpg" width="200px" height="200px"  alt="">
              <figcaption>
                <p class="team_name">W.M.K.B Jayawardane</p>
                <p class="team_title">SLIIT</p>
              </figcaption>
            </figure>
          </li>
          
          <li class="one_third">
            <figure><img src="images/demo/sachintha.jpg" width="200px" height="200px"  alt="">
              <figcaption>
                <p class="team_name">Samarawickrama S.S </p>
                <p class="team_title">SLIIT</p>
              </figcaption>
            </figure>
          </li>
          
          <li class="one_third">
            <figure><img src="images/demo/heshanie.jpg" width="200px" height="200px"  alt="">
              <figcaption>
                <p class="team_name">H.P Ganegoda</p>
                <p class="team_title">SLIIT</p>
              </figcaption>
            </figure>
          </li>
          
		  <span style="position:absolute; left:1000px; top:1500px;">
          <li class="one_third">
            <figure><img src="images/demo/team-member.gif" width="200px" height="200px"  alt="">
              <figcaption>
                <p class="team_name">Madawika P.D.P</p>
                <p class="team_title">SLIIT</p>
              </figcaption>
            </figure>
          </li>
			
          
        </ul>
      </section>
      <!-- ####################################################################################################### -->
    </div>
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
  </div>
         <p>
         <iframe frameborder="0" scrolling="no" width="240" height="348"></iframe>
         </p>
         </div>
         </span>
         </span>
         </span>
         </span>
         </div>
         <footer style="padding-top:10px;font-family:Calibri;">
         
         <table id="template_table">
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
