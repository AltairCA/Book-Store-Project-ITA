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
        
          <table>
          <tr>
          <td>
           <img src="img/logo.png" width="100px" height="80px" style="padding:0px;margin:0px;padding-right:20px;"/>
          </td>
          <td style="padding:0px;">
          <p>
          	Search By Category
          </p>
          </td>
          
          <td>
          <select name="search_cat" id="search_cat">
            <option id="search_cat" value="0">All</option>
            <option id="search_cat" value="1">Novel</option>
            <option id="search_cat" value="2">Action</option>
            </select>
          <input type="text" id="search_text" name="search_text" placeholder="Type the name here ..." style="margin-left:-7px;">
          </td>
          <td style="padding-left:20px;">
          <input type="button" id="search_button" name="search_button" value="">
          </td>
          </tr>
          </table>
         </div>
         
         <div id="bodymain">
         <!-------------Code below------------------>
         
<div id="sidebar" align="left";>
<div class="title">

<a href="/">Top 20 Books</a><br>
<a href="/">New Releases</a><br>
<a href="/">Free Books</a><br>
<a href="/">User Uploaded</a><br>
<a href="/">Audio Books</a>

</div>

         </div>
		 
		 <span align="LEFT" id="small">
		 <hr>
		 <form>
		 <h3 style="text-transform:uppercase">Top 50 eBooks
		   
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
			 require 'config/config_common.php';
			 $cart_query = mysql_query("SELECT * FROM `book` order by(id) DESC",$con);
				$row;
				$cart_qty;
				for($x=0;$x<5;$x++){
					$row = mysql_fetch_array($cart_query);
					
					$b_name = $row[1];
					$b_publisher = $row[2];
					$b_price = $row[6];
					echo "<div><img src='test.png'></div>
	<span style='position:absolute; top:304px; left:400px;'>".$b_name."</span>
			 <span style='position:absolute; top:345px; left:400px;'>".$b_publisher."</span>
			 <span style='position:absolute; top:367px; left:400px;'>Download Options:Epub,PDF</span>
			 <span style='position:absolute; top:324px; left:788px; width: 128px; height: 65px; color: #093; font-size: xx-large; font-family: 'Times New Roman';'><strong>".$b_price."</strong></span>";
					
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
