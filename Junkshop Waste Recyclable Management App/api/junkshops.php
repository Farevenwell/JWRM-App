<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
    include('dbconnection.php');
	
	$sql = "SELECT shop_id, shop_name,latitude, longitude, img_name, address_id FROM junkshop";
	$result = $conn->query($sql);
	 $response = array();
	if($result->num_rows>0){		
		while($row = $result->fetch_assoc()) {
			$numofshops	= array();
			$numofshops["shopid"] = $row["shop_id"];
			$numofshops["shopname"] = $row["shop_name"];
			$numofshops["latitude"] = $row["latitude"];
			$numofshops["longitude"] = $row["longitude"];
			$numofshops["img"] = $row["img_name"];
			$numofshops["address"] = $row["address_id"];
			array_push($response, $numofshops);
		}
		echo json_encode($response);
	} else {
		echo "0 results";
	}
	$conn->close();
?>