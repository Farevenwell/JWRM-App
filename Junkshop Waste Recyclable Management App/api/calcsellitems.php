<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
	include('dbconnection.php');
	
	$sql = "SELECT shop_id, item_name, item_price, unit FROM sell_items;";
	$result = $conn->query($sql);
			
	if ($result->num_rows > 0) {
	// output data of each row
    $response = array();
	while($row = $result->fetch_array()) {
          $listitem = array();
          $listitem["shopid"] = $row["shop_id"];
          $listitem["itemname"] = $row["item_name"];
          $listitem["price"] = $row["item_price"];
          $listitem["unit"] = $row["unit"];

          array_push($response, $listitem);

	}
		 echo json_encode($response);
	} else {
		echo json_encode(array('data'=>''));
	}
	$conn->close();
?>
