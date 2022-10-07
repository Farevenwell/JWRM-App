<?php
    header('Access-Control-Allow-Origin: *');
	$itemid=$_POST['itemid2'];
	
	include ("dbconnection.php");
	
	$sql = "DELETE FROM sell_items WHERE item_id='$itemid'";

	if ($conn->query($sql) === TRUE) {
        echo "SUCCESS";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
	$conn->close();
?>