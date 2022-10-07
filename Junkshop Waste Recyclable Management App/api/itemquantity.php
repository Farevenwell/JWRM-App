<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');

	include ("dbconnection.php");
	$quantity = $_POST['quan'];
	$newitem = $_POST['itemname'];
	$shopid = $_POST['shop_id'];
	$sql = "SELECT item_id, item_name FROM buy_items WHERE item_name='$newitem' AND shop_id='$shopid'";
	$result = $conn->query($sql);
	if($result->num_rows>0){		
		while($row = $result->fetch_assoc()) {
		        $itemid = $row["item_id"];
			    $itemname = $row["item_name"];
			    $sql = "SELECT item_id, quantity FROM inventory WHERE item_id='$itemid' ";
			    $result =  $conn->query($sql);
			    if($result->num_rows>0){
			        while($row = $result->fetch_assoc()) {
			            $itemid = $row["item_id"];
			            $quan = $row["quantity"];
			            $quan = $quan + $quantity;
                       $sql = "UPDATE inventory SET quantity='$quan' WHERE item_id='$itemid'";
                       $conn->query($sql);
                       echo "SUCCESS"; 
			        }
			    }else{
			            $sql = "INSERT INTO inventory (item_id, quantity, shop_id)VALUES('$itemid', '$quantity','$shopid')";
			            $conn->query($sql);
			            echo "SUCCESS"; 
			    }
		}
	} else {
		echo "Failed";
	}
	$conn->close();
?>