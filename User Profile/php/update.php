<?php

mysql_connect("localhost","root","") or die ("could not connect to the server");
mysql_select_db("users") or die ("That database could not be found!");

$uname=$_COOKIE['user_name'];
$pw = $_POST['New_password'];
$sql=mysql_query("update table_name SET password='$pw' where username='$uname'") or die ("The query could not be ");


?>