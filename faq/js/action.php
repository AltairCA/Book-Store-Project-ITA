<?php
include("../config/config_common.php");
error_reporting(0);
$id="";

$id = $_POST["id"];

if($id!=""){
$username_query = mysqli_query($con,"SELECT * FROM  `q_assist`  where `id` = $id");
$row;
$row = mysqli_fetch_array($username_query);
$old = $row[2];
$old = intval($old) + 1;
mysqli_query($con,"UPDATE `q_assist` SET `count` = $old where `id` = $id");
echo "done";

}
					
mysqli_close($con);

?>

