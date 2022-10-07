<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
	$id = (int)$_GET['id'];

	include ("dbconnection.php");
	
	$sql = "SELECT item_id, item_name, item_price, unit, item_desc, image FROM buy_items WHERE item_id = $id";
	$result = $conn->query($sql);
	
	if($result->num_rows>0){		
		while($row = $result->fetch_assoc()) {

			$iteminfo = $row["item_id"]. "=" .$row["item_name"]. "=" .number_format($row["item_price"],2). "=" .$row["unit"]. "=" .$row["item_desc"]. "=" .$row["image"];
			
		}
		echo $iteminfo;
	} else {
		echo "0 results";
		echo "Error in ".$conn->error;
	}
	$conn->close();
?>