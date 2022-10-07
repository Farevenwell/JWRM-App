<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
	
	include('dbconnection.php');
	$addid=$_GET['id'];
	
	$sql = "SELECT junkshop.shop_id, junkshop.shop_reference, junkshop.shop_name, junkshop.shop_owner, junkshop.shop_num, junkshop.img_name, junkshop.day_in, junkshop.day_out, junkshop.time_in, junkshop.time_out, address.address_id,
	address.street, address.brgy, address.city, address.province FROM junkshop INNER JOIN address ON junkshop.address_id='$addid' and address.address_id='$addid'";
	
	$result = $conn->query($sql);
	
	if($result->num_rows>0){		
		while($row = $result->fetch_assoc()) {

			$shopinfo = $row["shop_id"]. "=" .$row["shop_name"]. "=" .$row["shop_owner"]. "=" .$row["shop_num"]. "=" .$row["img_name"]. "=" .$row["day_in"]. "=" .$row["day_out"]. "=" .$row["time_in"]. "=" .$row["time_out"]. "=" .$row["street"]. "=" .$row["brgy"]. "=" .$row["city"]. "=" .$row["province"]. "=".$row["address_id"]. "=" .$row["shop_reference"];
			
		}
		echo $shopinfo;
	} else {
		echo "0 results";
	}
	$conn->close();
?>