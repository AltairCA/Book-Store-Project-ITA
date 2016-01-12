<?php
error_reporting(0);
require 'config/down.php';
$id = $_GET["id"];
if($id==null){
	$id = 1;
}

$query= mysqli_query($con,"SELECT* FROM book where id=$id");


$row=mysqli_fetch_array($query);
$bname=$row['name'];
$auth=$row['publisher'];
$path=$row['path'];
$isbn=$row['ISBN'];
$price=$row['price'];
$check=$price;
$preview=$row['preview'];
$prevpath=$row['previewpath'];
$rating=$row['rating'];
$next;
//$sypnosis=$row['sypnosis']; Sypnosis not updated with the database,can be implemented once database is updated.

//Demo Synopsis 
$sypnosis="The year is 2033.The world has been reduced to rubble.<br>Humanity is nearly extinct.  ";



if($rating==5)
$ratingpath="ratings/five.png";

else if($rating==4)
$ratingpath="ratings/four.png";


else if($rating==3)
$ratingpath="ratings/three.png";


else if($rating==2)
$ratingpath="ratings/two.png";


else if($rating==1)
$ratingpath="ratings/one.png";



if($preview=='ok')
{
 $previewbutton="preview.png";
}

else

{
 $previewbutton="blank.png";
}


if($check==0)
{
	$button="download.png";
	$next=$row['freepath'];
}

else
{
$button="button.png";	
$next="addcart.php?id=$id";

}
//$output=$output.("<img width='139px' height='211px' src='$path'>");


//$output=$output.("<img width='139px' height='211px' src='$path'><br><div>$bname By $auth</div><br>");




?>















<!doctype html>
<html>
<head>
<title>Download</title>
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
         
<div id="sidebar" align="left";>
<div class="title">

<a href="product.php">Top 20 Books</a><br>
<a href="new.php">New Releases</a><br>
<a href="free.php">Free Books</a><br>
<a href="user.php">User Uploaded</a><br>
<a href="audio.php">Audio Books</a>

</div>

         </div>
		 
		 <span align="LEFT" id="small">
		 <hr>
		 <form>
		 <h3 style="text-transform:uppercase">Product Details
		   <!--
		   <select name="select">
		     <option value="Most Sold">Most Sold</option>
		     <option value="rating">Rating</option>
			 <option value="new">Recently Added</option>
	       </select>
		   -->
</h3>
			</span>
			
		 <div>
		 
		   <div align="left" id="books">
		     
			<img src="back.png">
			<!--
	//<span style='position:absolute; top:280px; left:260px;'><image width='210px' height='302px' src=cover.png></span>
			-->
			
			<div style="font-family:  'Hoefler Text', Georgia, 'Times New Roman', serif;
	font-weight: normal;
        font-size: 16px;
	letter-spacing: .2em;
	line-height: 1.1em;
	margin:0px;
	text-align: center;
	">
<?php	
	echo" <span style='position:absolute; top:280px; left:260px;'><image width='210px' height='302px' src=$path></span>		
			"
?>		
			
			
			
			<a href="<?php 
			echo $next;
			 ?>"><span style='position:absolute; top:375px; left:1000px;'><image src=<?php 
			echo $button;
			 ?>></span></a>
			<a href="<?php 
			echo $prevpath;
			 ?>"><span style='position:absolute; top:455px; left:995px;'><image src=<?php 
			echo $previewbutton;
			 ?>></span></a>
			<a href=""><span style='position:absolute; top:325px; left:470px;'>
			<?php 
			 print("$bname");
			 ?></a>
			<a href=""><span style='position:absolute; top:355px; left:470px;'>  <?php 
			 print("$auth");
			 ?></a>
			 
			 
			<a href=""><span style='position:absolute; top:375px; left:470px;'><image src=<?php 
			echo $ratingpath;
			 ?>></a>
			<a href=""><span style='position:absolute; top:420px; left:470px;'> <?php 
			 print("$isbn");
			 ?></a>
			<a href=""><span style='position:absolute; top:585px; left:470px;'><?php 
			 print("$sypnosis");
			 ?></a>
			
			
			<span style='position:absolute; top:325px; left:1080px;'>  <?php 
			$dollar="$";
			print("$dollar");
			 print("$price");
			 
			 
			 
			 
			
			 ?>
			 
			
			</div>
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
