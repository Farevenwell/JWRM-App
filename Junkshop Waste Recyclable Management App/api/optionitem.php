<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
	include('dbconnection.php');
	$shopid = $_GET['id'];
	$sql = "SELECT item_id, item_name FROM buy_items WHERE shop_id=$shopid";
	$result = $conn->query($sql);
			
	if ($result->num_rows > 0) {
	// output data of each row
    $response = array();
	while($row = $result->fetch_array()) {
          $listitem = array();
		  $listitem["item_id"] = $row["item_id"];
          $listitem["Itemname"] = $row["item_name"];

          array_push($response, $listitem);

	}
		 echo json_encode($response);
	} else {
		echo json_encode(array('data'=>''));
	}
	$conn->close();
?>