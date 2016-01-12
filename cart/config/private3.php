<?php
if($name==" "){
	session_start();
	$_SESSION["url"] = "../cart/index.php";
			header("Location: ../Login/index.php");  
		 }
		 
			$clear = $_POST["clear"];
			
			if($clear == "clear"){
				$cart_clear = mysqli_query($con,"SELECT  `id`,`name` ,  `weight` ,  `price` ,  `book`.`qty` ,  `b_o`.`qty` 
FROM  `book` ,  `b_o` 
WHERE  `id` 
IN (

SELECT  `book_id` 
FROM  `b_o` 
WHERE  `order_id` = ( 
SELECT  `order_id` 
FROM  `order` 
WHERE  `username` =  '$username'
AND  `payment_state` =0 )
)
AND  `book`.`id` =  `b_o`.`book_id` 
AND  `b_o`.`order_id` = ( 
SELECT  `order_id` 
FROM  `order` 
WHERE  `username` =  '$username'
AND  `payment_state` =0 ) ");
			for(;($row_cart_clear = mysqli_fetch_array($cart_clear));){
				$book_no = $row_cart_clear[0];
				$previous_qty = mysqli_query($con,"select `qty` from `b_o` WHERE `order_id` = (select `order_id` from `order` where `username`='$username' and `payment_state`=0) and `book_id`=".$book_no);
				$previous_qty = mysqli_fetch_array($previous_qty);
				$previous_qty = $previous_qty[0];
				
				
				$new_qty=intval($previous_qty);
				$stock_qty = mysqli_query($con,"select `qty` from `book` WHERE `id`=".$book_no);
				$stock_qty = mysqli_fetch_array($stock_qty);
				$stock_qty = $stock_qty[0];
				$new_qty=$new_qty + intval($stock_qty);
				mysqli_query($con,"update `book` set `qty`=".$new_qty."  WHERE `id`=".$book_no);
				
				
				
				mysqli_query($con,"delete from `b_o` where `order_id` = ( SELECT  `order_id` 
FROM  `order` 
WHERE  `username` =  '$username'
AND  `payment_state` =0) and `book_id` =".$book_no);
			}
			header('Location: index.php');
		 	
			}
		 	$delete = $_GET["delete"];
		 	if(intval($delete)>0){
				$previous_qty = mysqli_query($con,"select `qty` from `b_o` WHERE `order_id` = (select `order_id` from `order` where `username`='$username' and `payment_state`=0) and `book_id`=".$delete);
				$previous_qty = mysqli_fetch_array($previous_qty);
				$previous_qty = $previous_qty[0];
				
				
				$new_qty=intval($previous_qty);
				$stock_qty = mysqli_query($con,"select `qty` from `book` WHERE `id`=".$delete);
				$stock_qty = mysqli_fetch_array($stock_qty);
				$stock_qty = $stock_qty[0];
				$new_qty=$new_qty + intval($stock_qty);
				mysqli_query($con,"update `book` set `qty`=".$new_qty."  WHERE `id`=".$delete);
				
				
				
				mysqli_query($con,"delete from `b_o` where `order_id` = ( SELECT  `order_id` 
FROM  `order` 
WHERE  `username` =  '$username'
AND  `payment_state` =0) and `book_id` =".$delete);

				header('Location: index.php');
			
			}
		 
		 	$update_check = $_POST["qty_update"];
			$update_check1 = $_GET["qty_update"];
			$qty = $_POST["1_qty"];
			$test = intval("2_qty");
		 	if($update_check=="update" or $update_check1=="update" ){
				/*echo "<script>alert('asd');</script>";
				echo "<script>alert('$test');</script>";*/
				$cart_update_query1 = mysqli_query($con,"SELECT  `id`,`name` ,  `weight` ,  `price` ,  `book`.`qty` ,  `b_o`.`qty` 
FROM  `book` ,  `b_o` 
WHERE  `id` 
IN (

SELECT  `book_id` 
FROM  `b_o` 
WHERE  `order_id` = ( 
SELECT  `order_id` 
FROM  `order` 
WHERE  `username` =  '$username'
AND  `payment_state` =0 )
)
AND  `book`.`id` =  `b_o`.`book_id` 
AND  `b_o`.`order_id` = ( 
SELECT  `order_id` 
FROM  `order` 
WHERE  `username` =  '$username'
AND  `payment_state` =0 ) ");
			for(;($row_cart_update = mysqli_fetch_array($cart_update_query1));){
				$cart_no = $row_cart_update[0];
				$qty = $_POST[$cart_no."_qty"];
				$previous_qty = mysqli_query($con,"select `qty` from `b_o` WHERE `order_id` = (select `order_id` from `order` where `username`='$username' and `payment_state`=0) and `book_id`=".$cart_no);
				$previous_qty = mysqli_fetch_array($previous_qty);
				$previous_qty = $previous_qty[0];
				
				
				$new_qty=intval($previous_qty)-intval($qty);
				$stock_qty = mysqli_query($con,"select `qty` from `book` WHERE `id`=".$cart_no);
				
				$stock_qty = mysqli_fetch_array($stock_qty);
				$stock_qty = $stock_qty[0];
				
				$new_qty=$new_qty + intval($stock_qty);
				mysqli_query($con,"update `book` set `qty`=".$new_qty."  WHERE `id`=".$cart_no);
						
				
				mysqli_query($con,"update `b_o` set `qty` = ".$qty." WHERE `order_id` = (select `order_id` from `order` where `username`='$username' and `payment_state`=0) and `book_id`=".$cart_no);
				
			}
			header('Location: index.php');
			
			}
			
?>