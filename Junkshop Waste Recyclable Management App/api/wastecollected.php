<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
	include('dbconnection.php');
	$shopid = $_GET['id'];
	$sql = "SELECT inventory.inventory_id,inventory.quantity, buy_items.item_name, buy_items.unit, buy_items.image FROM inventory, buy_items WHERE inventory.item_id=buy_items.item_id AND inventory.shop_id='$shopid' AND buy_items.shop_id='$shopid'";
	$result = $conn->query($sql);
			
	if ($result->num_rows > 0) {
	// output data of each row
    $response = array();
	while($row = $result->fetch_array()) {
          $listitem = array();
		  $listitem["Inventory_id"] = $row["inventory_id"];
          $listitem["Itemname"] = $row["item_name"];
		  $listitem["Quantity"] = $row["quantity"];
          $listitem["Unit"] = $row["unit"];
		  $listitem["Image"] = $row["image"];

          array_push($response, $listitem);

	}
		 echo json_encode($response);
	} else {
		echo json_encode(array('data'=>''));
	}
	$conn->close();
?>