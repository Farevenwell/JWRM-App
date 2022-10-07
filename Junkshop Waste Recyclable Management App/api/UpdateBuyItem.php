<?php
    header('Access-Control-Allow-Origin: *');
    if(isset($_POST['itemname']) && isset($_POST['price']) && isset($_POST['unit'])){
        
		$itemid = $_POST['itemid'];
        $itemname = $_POST['itemname'];
		$price = $_POST['price'];
		$desc = $_POST['txtarea'];
		$unit = $_POST['unit'];
		
		include ("dbconnection.php");
		
    	$sql = "UPDATE buy_items SET item_name='$itemname', item_price='$price', unit='$unit' , item_desc='$desc' WHERE item_id='$itemid'";
    		
    	if ($conn->query($sql) === TRUE) {
            echo "SUCCESS";
    	} else {
    	  echo "Error Updating Item record: " . $conn->error;
    	}
    		
    	$conn->close();
    }
?>