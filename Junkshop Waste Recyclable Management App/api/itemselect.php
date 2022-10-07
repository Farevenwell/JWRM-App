<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
	include('dbconnection.php');
	$sql = "SELECT DISTINCT item_name, unit FROM buy_items ORDER BY item_name";
	$result = $conn->query($sql);
			
	if ($result->num_rows > 0) {
	// output data of each row
    $response = array();
	while($row = $result->fetch_array()) {
          $listitem = array();
          $listitem["Itemname"] = $row["item_name"];
          $listitem["unit"] = $row["unit"];

          array_push($response, $listitem);

	}
		 echo json_encode($response);
	} else {
		echo json_encode(array('data'=>''));
	}
	$conn->close();
?>