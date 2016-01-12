<?php
include("../config/config_common.php");
error_reporting(0);
$name="";
$email="";
$name = $_POST["name"];
$email = $_POST["email"];
if($name!=""){
$username_query = mysqli_query($con,"SELECT * FROM `user` where `username` = '$name'");
$row;
if($row = mysqli_fetch_array($username_query)){
					
					echo "found";
				}else{
					echo "not";	
				}

}else if($email!=""){
	
	$username_query = mysqli_query($con,"SELECT * FROM `user` where `email` = '$email'");
	$row;
	if($row = mysqli_fetch_array($username_query)){
					
					echo "found";
				}else{
					echo "not";	
				}

}

mysqli_close($con);

?>

