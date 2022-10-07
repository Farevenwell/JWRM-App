<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
	include('dbconnection.php');
	$shopid = $_GET['id'];
	$sql = "SELECT * FROM buy_items WHERE shop_id='$shopid' ORDER BY item_id desc";
	$result = $conn->query($sql);
			
	if ($result->num_rows > 0) {
	// output data of each row
    $response['data'] = array();
	while($row = $result->fetch_array()) {
          $listitem = array();
		  $listitem["Item ID"] = $row["item_id"];
          $listitem["Item Name"] = $row["item_name"];
		  $listitem["Price"] = number_format($row["item_price"],2);
          $listitem["Unit"] = $row["unit"];

          array_push($response["data"], $listitem);

	}
		 echo json_encode($response);
	} else {
	 	 echo json_encode(array('data'=>''));
	}
	$conn->close();
?>