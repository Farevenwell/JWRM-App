<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
	include('dbconnection.php');;
	$sql = "SELECT * FROM sell_items ORDER BY item_id desc";
	$result = $conn->query($sql);
			
	if ($result->num_rows > 0) {
	// output data of each row
    $response = array();
	while($row = $result->fetch_array()) {
          $listitem = array();
		  $listitem["ItemID"] = $row["item_id"];
          $listitem["ItemName"] = $row["item_name"];
		  $listitem["Price"] = $row["item_price"];
          $listitem["Unit"] = $row["unit"];
		  $listitem["image"] = $row["image"];

          array_push($response, $listitem);

	}
		 echo json_encode($response);
	} else {
		echo json_encode(array('data'=>''));
	}
	$conn->close();
?>