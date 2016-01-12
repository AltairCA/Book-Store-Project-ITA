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


	if(isset($_POST["password"]) && isset($_POST["phone"]) 
	&& isseet($_POST["address"]) && isset($_POST["city"]) && isset($_POST["country"])

	
	{
	
	//$profilepic = $_POST("profilepicture");
	//$password 	= $_POST["password"];
	$phone    	= $_POST["phone"];
	$address  	= $_POST["address"];
	//$city     	= $_POST["city"];
	//$country  	= $_POST["country"];
	}
	else
	{
	
	$error = "one or more fields are not filled";
	echo $error;
	}
	
/* 	//insert
	if(isset($_POST["insert"]))
	{
	
	$insertString = " VALUES('$profilepic','$password','$phone','$address','$city','$country')";   
	   
		if(!mysql_query($insertString))
		{
			die('Error: '.mysql_error());
		}
		else
		{
		echo '<br/>';
		echo 'record added sucessefully!';
		}
		
	}
	
	//update */
	
//	else if(iseet($_POST["update"]))
	//{
	
	$updateString = "update user SET 
							  phone          = '$phone'    and
							  address        = '$address'  and
								country ='$country'
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