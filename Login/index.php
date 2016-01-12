<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Sign in</title>

  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <script type="application/javascript" language="javascript" src="js/script.js"></script>

</head>

<body>
	
	<div align="center" class="logo">
		<img src="logo.png" width="100px" height="100px" />
	</div>

  <div class="login-card">
    <h1>Sign in</h1><br>
  <form onSubmit="return validate()" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
    <input type="text" name="user" placeholder="Username">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="Sign in">
  </form>

  <div class="login-help">
  		• <a href="../registration/index.php">Register</a>
     • <a href="recover/fogetmypassword.php">Forgot Password</a>
  </div>
  <?php
  	include 'config/config_common.php';
	error_reporting(0);
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
						header("Location: ../home/index.php");
				}
  	
  	if(!empty($_POST)){
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		
		$login_check = mysqli_query($con,"SELECT * FROM `user` where `username` = '$user' and `password`='$pass'");
		
		$rows;
		if($rows = mysqli_fetch_array($login_check)){
					setcookie('user_name',encryptIt("$user"),time() + (86400 * 7),'/');
					session_start();
					$ids =intval($_SESSION["tmp_id"]);
					$url = $_SESSION["url"];
					
					if(!($ids=="")){
						
						$_SESSION["tmp_id"]="";
						
						header("Location: ../Product Page/addcart.php?id=$ids"); 
					}else{
						if(is_null($_SESSION["url"])){
						header("Location: ../home/index.php");
						
						}else{
								$_SESSION["url"]=NULL;
								header("Location: $url");
						}
					}
					
					
					
			
		}else{
			echo "<div align='center' class='erro'>Login failed
 			 </div>";
		}
		
		
		 
	}
 
  ?>
</div>
<?php mysqli_close($con); ?>
<div>
<footer style="padding-top:100px;"><table id="template_table">
         
         <center>All Rights Reserved WeBooks! 2014</center></footer>
	 	</div>


  

</body>

</html>