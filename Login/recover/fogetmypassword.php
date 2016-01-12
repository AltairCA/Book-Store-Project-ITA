<!doctype html>
<html>
	<head>
		<link type="text/css" href="style/templatestyles.css" rel="stylesheet">
		<link rel="stylesheet" href="forgot_password.css" media="screen" type="text/css" />
		<meta charset="utf-8">
		<script>
			function CheckEmail() {
				var e = document.forms["sendmail"]["email"].value;
				if (e == null || e == "") {
					alert("Fill your Email");
					return false;
				} 
				else {
					//window.open("sendmail.php?sendmail=true"); //, "_self");
					
					return true;
				}
			}
		</script>
	</head>
	<body>
		<div align="center">

			<div  id="maindiiv" align="center">
				<div id="mainnav" align="center" >

					<ul>
						<li id="user_name" style="margin-left:0px;">
							<a href="#">Profile</a>
							<ul id="User_logout">
								<li>
									<a href="">Login</a>
								</li>
								<li>
									<a href="">Register</a>
								</li>
							</ul>
						</li>
						<li style="min-width:150px;">
							Customer Support
							<ul>
								<li>
									<a href="#">FAQ</a>
								</li>
								<li>
									<a href="#">
									<wbr>Contact Us<wbr>
									</a>
								</li>
							</ul>
						</li>
						<li style="min-width:60px;margin-left:918px;">
							<a href="#"> Menu</a>
							<ul>
								<li>
									<a href="">My account</a>
								</li>
								<li>
									<a href="">Purches history</a>
								</li>
							</ul>
						</li>
						<li id="cart_count" style="min-width:20px;background-color:#FF9900;border-radius:6px;max-height:10px;">
							0
						</li>
						<li style="min-width:50px;max-width:50px;"><img src="img/cart.png" height="15px" width="20px">
							<ul style="margin-left:-112px;">
								<li>
									View Cart
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
								<td><img src="img/logo.png" width="100px" height="80px" style="padding:0px;margin:0px;padding-right:20px;"/></td>
								<td style="padding:0px;">
								<p>
									Search By Category
								</p></td>

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
						<!-------------Forgot Password interface------------------>
						<div class="email-card">
							<form name="sendmail" action="sendmail.php" method="post" onsubmit="return CheckEmail()">
								<h1>Can't sign in? Forgot your password?</h1>
								<br>
								<p>
									Enter your email address below and we'll send you password reset instructions.
								</p>
								<input type="email" name="email" placeholder="Enter your Email here....">
								<input type="submit" name="submit" class="email-card-submit" value="Send Me Reset Instructions">
							</form>
						</div>

					</div>

					<footer style="padding-top:10px;font-family:Calibri;">
						<table id="template_table">
							<tr>
								<td><a href=""> About us</a></td>
								<td><a href="">Contact Us</a></td>
								<td><a href="">Privacy Policy</a></td>
								<td><a href="">Disclaimer</a></td>
								<td><a href="">Terms & Conditions</a></td>
						</table>
						All right bla bal 2014<footer>
				</div>

			</div>
		</div>
	</body>
</html>
