<?php

mysqli_connect("localhost","root","sparksndl","projectita") or die(mysql_error());
//mysql_select_db("projectita") or die(mysql_error());
//$con=mysql_connect("127.0.0.1","root","sparksndl");
//mysql_select_db("projectita", $con);

require 'config/config_common.php';

erro_reporting(1);


$output='';
//collect

if(isset($_POST['search']))
{
$search=$_POST['search'];
//to allow to filter if needed, $search=preg_replace("#[^0-9a-z]#i","",$search);

$query= mysqli_query($con,"SELECT* FROM book where name LIKE '%$search%' OR publisher LIKE '%$search%' ");

$count=mysqli_num_rows($query);
if($count==0)
{ $output='There was no search results';

}
else
{
while($row=mysqli_fetch_array($query)){
$bname=$row['name'];
$auth=$row['publisher'];
$path=$row['path'];

$output='<div>'.$bname.' '.$auth.'</div>';

}
}
}

?>


<!doctype html>
<html>
<head>
<link type="text/css" href="style/templatestyles.css" rel="stylesheet">

<meta charset="utf-8">
</head>
<body>
<div align="center">

	<div  id="maindiiv" align="center">
    	<div id="mainnav" align="center" >
       		
        	
        	<ul><li id="user_name" style="margin-left:0px;"><a href="#">Profile</a>
                <ul id="User_logout"><li><a href="">Login</a></li>
                <li><a href="">Register</a></li>
                </ul>

            </li>
            <li style="min-width:150px;">
            Customer Support
            <ul><li><a href="#">FAQ</a>
            </li>
            <li>
            <a href="#"><wbr>Contact Us<wbr></a>
            </li>
            </ul>
            </li>
            <li style="min-width:60px;margin-left:918px;"><a href="#">
            Menu</a><ul><li><a href="">My account</a></li>
                <li><a href="">Purches history</a></li>
                </ul>
            </li>
            <li id="cart_count" style="min-width:20px;background-color:#FF9900;border-radius:6px;max-height:10px;">
            0
            </li>
            <li style="min-width:50px;max-width:50px;"><img src="img/cart.png" height="15px" width="20px"><ul style="margin-left:-112px;">
            <li>View Cart
            </li>
            </ul>
            </li>
        	</ul>
          	
            
            <br>
            <br>
            
         </div>
         <div id="subdiv">
         <div id="search">
        
		<form method="post">
		
          <table>
          <tr>
          <td>
           <img src="img/logo.png" width="100px" height="80px" style="padding:0px;margin:0px;padding-right:20px;"/>
          </td>
          <td style="padding:0px;">
          <p>
          	Search by Keyword
          </p>
          </td>
          
          <td>
          <select name="search_cat" id="search_cat">
            <option id="search_cat" value="0">All</option>
            <option id="search_cat" value="1">Novel</option>
            <option id="search_cat" value="2">Action</option>
            </select>
          <input type="text" id="search" name="search" placeholder="Name of the book,ISBN,author" style="margin-left:-7px;">
          </td>
          <td style="padding-left:20px;">
          <!--<input type="button" id="search_button" name="search_button" value="">
          -->
		  <input type="submit" value="Go!"/>
		  </td>
          </tr>
          </table>
		  
		  </form>
         </div>
         
         <div id="bodymain">
         <!-------------Code below------------------>
         <span align="LEFT" id="small">
		 <hr>
		 <h3 style="text-transform:uppercase">Search Results</h3>
		 </span> 
			
			
			
			
		<div align="left">
		
			<span>
			
		<img src="cover.png">
		
		<?php
		print("$output");
		//echo"test";
		
		?>
		<pre>&nbsp;Test Book</pre>
		
			 </span>
			
	
		
		</div>
			
		 
		 
		 
		  <!-------------Code Above------------------>
		 
         <footer style="padding-top:100px;"><table id="template_table">
         <tr>
         <td><a href="">
         About us</a>
         </td>
         <td>
         <a href="">Contact Us</a>
         </td>
         <td><a href="">Privacy Policy</a></td>
         <td><a href="">Disclaimer</a></td>
         <td><a href="">Terms & Conditions</a></td>
         </table>
         <center>All Rights Reserved WeBooks! 2014</center><footer>
	 	</div>
    
    </div>
</div>
</body>
</html>
