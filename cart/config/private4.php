<?php
session_start();
$cart_list_query = mysqli_query($con,"SELECT  `id`,`name` ,  `weight` ,  `price` ,  `book`.`qty` ,  `b_o`.`qty` 
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
				$row_cart_list;
				$total_qty=0;
				$total_weight=0;
				$total_amount=0;
				$paypalitems="";
				for($y=0;$row_cart_list = mysqli_fetch_array($cart_list_query);$y=$y+1){
				echo	"	 <tr><td style='border-bottom:#666666 1px solid;'><select name='$row_cart_list[0]_qty'>";
				for($x=1;$x<=intval($row_cart_list[4])+intval($row_cart_list[5]);$x++){
					if($x==intval($row_cart_list[5])){
					echo "<option value=$x selected>$x</option>";
					}else{
						echo "<option value=$x>$x</option>";
					}
					
				}
         
        
         		echo 	" </select></td>
                
                <td colspan='2' style='border-bottom:#666666 1px solid;'><a style='text-decoration:none;color:black;' href='../Product Page/download.php?id=$row_cart_list[0]'>".$row_cart_list[1]."</a></td>
                <td style='border-bottom:#666666 1px solid;'>$ ".intval($row_cart_list[5])*intval($row_cart_list[3])."</td>
                <td style='border-bottom:#666666 1px solid;'>".$row_cart_list[2]*intval($row_cart_list[5])."g</td>
                <td style='border-bottom:#666666 1px solid;'><a href='index.php?delete=$row_cart_list[0]'><img src='img/18815282_delete.gif'></a></td>
         </tr>
         ";
		 			$total_qty = $total_qty + intval($row_cart_list[5]);
					$total_weight=$total_weight+intval($row_cart_list[2])*intval($row_cart_list[5]);
					$total_amount=$total_amount+intval(intval($row_cart_list[5])*intval($row_cart_list[3]));
					
					
					$paypalitems = $paypalitems."&L_PAYMENTREQUEST_0_NAME".$y."=".$row_cart_list[1]."&L_PAYMENTREQUEST_0_AMT".$y."=".intval($row_cart_list[3])."&L_PAYMENTREQUEST_0_QTY".$y."=".$row_cart_list[5];
					
				}
					
				$_SESSION["paypalitems"] = $paypalitems;
		 
		 
?>