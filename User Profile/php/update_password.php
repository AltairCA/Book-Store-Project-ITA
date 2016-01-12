<?php
	
	//create connection
	$con=mysqli_connect("localhost","root"," ","projectita");

	//check connection
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
	echo "Database connection is ok"; 
	}	


	//executes the SQLquery


	if(isset($_POST["New_password"]))

	
	{
	$pw    	= $_POST["New_password"];
	}
	else
	{
	
	$error = "one or more fields are not filled";
	echo $error;
	}
	
	$updateString = "update user SET 
							  password = '$pw' 
						where   user_name=    ";
						
	     if(!mysql_query($updateString))
		{
			die('Error: '.mysql_error());
		}
		else
		{
		echo '<br/>';
		echo 'record upadte sucessefully!';
		}
//	}


	
	
	//close connection
	mysqli_close($con);

	 
	
	
?>