<?php
    header('Access-Control-Allow-Origin: *');
	
    if(isset($_POST['shopname']) && isset($_POST['owner']) && isset($_POST['phone']) && isset($_POST['dayin']) 
	&& isset($_POST['dayout']) && isset($_POST['timein']) && isset($_POST['timeout']) && isset($_POST['prov']) && isset($_POST['city']) && isset($_POST['brgy']) && isset($_POST['str'])){
        
		$id = $_POST['id'];
        $shopname = $_POST['shopname'];
       	$owner = $_POST['owner'];
		$phone = $_POST['phone'];
		
		$dayin = $_POST['dayin'];
		$dayout = $_POST['dayout'];
        $timein = $_POST['timein'];
        $timeout = $_POST['timeout'];
		
		$addid = $_POST['addid'];
		$str = $_POST['str'];
		$brgy = $_POST['brgy'];
        $city = $_POST['city'];
        $prov = $_POST['prov'];
		
		include('dbconnection.php');
    		
    		
		$sql = "UPDATE address SET street='$str', brgy='$brgy', city='$city' ,province='$prov' WHERE address_id='$addid'";
		
    	if ($conn->query($sql) === TRUE) {
				$sql = "UPDATE junkshop SET shop_name='$shopname',shop_owner='$owner',shop_num='$phone', day_in='$dayin', day_out='$dayout', time_in='$timein', time_out='$timeout' WHERE shop_id='$id'";
				$result = $conn->query($sql);
			echo "Success";
		} else {
    	  echo "Update Failed";
    	}
    		
    	$conn->close();
    }

?>