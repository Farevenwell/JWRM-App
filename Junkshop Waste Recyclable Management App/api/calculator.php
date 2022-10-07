<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
	$itemname = (string)$_GET['item']; 
	$value = (int)$_GET['val']; 
	include ("dbconnection.php");
    $sql = "SELECT DISTINCT buy_items.shop_id, buy_items.item_price, junkshop.latitude, junkshop.longitude, junkshop.shop_name, junkshop.img_name, junkshop.address_id FROM buy_items INNER JOIN junkshop WHERE buy_items.item_name='$itemname' AND junkshop.shop_id=buy_items.shop_id";
     
    $result = $conn->query($sql);
			
	if ($result->num_rows > 0) {
	// output data of each row
    $response = array();
	while($row = $result->fetch_array()) {
          $valueresult = array();
		  $valueresult["Inventory_id"] = $row["shop_id"];
          $valueresult["earn"] = 2 *  $row["item_price"];
          $valueresult["earn"] = round($valueresult["earn"], 2);
          $valueresult["latitude"] = $row["latitude"];
          $valueresult["longitude"] =  $row["longitude"];
          $valueresult["shop_name"] =  $row["shop_name"];
          $valueresult["img_name"] =  $row["img_name"];
          $valueresult["address_id"] =  $row["address_id"];


          array_push($response, $valueresult);

	}
		 echo json_encode($response);
	} else {
		echo json_encode(array('data'=>''));
	}
	$conn->close();
?>