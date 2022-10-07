<?php
    header('Access-Control-Allow-Origin: *');
	
    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['phone']) 
	&& isset($_POST['pass']) && isset($_POST['str']) && isset($_POST['brgy']) && isset($_POST['city']) && isset($_POST['prov'])){
        
		$id = $_POST['id'];
        $fname = $_POST['fname'];
       	$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		
		$pass = $_POST['pass'];
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'solidwastemanagement';
        $secret_iv = 'user secret iv';
        
        //Hashed Keys
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        
        $output = openssl_encrypt($pass, $encrypt_method, $key, 0, $iv);
        $encryptpwd = base64_encode($output);
        
		$str = $_POST['str'];
		$brgy = $_POST['brgy'];
		$city = $_POST['city'];
		$prov = $_POST['prov'];
	
		include('dbconnection.php');
    		
    		
    	$sql = "UPDATE accounts SET Password='$encryptpwd' WHERE account_id='$id'";
		$conn->query($sql);
		$sql = "UPDATE address SET street='$str', brgy='$brgy', city='$city' ,province='$prov' WHERE address_id='$id'";
		
    	if ($conn->query($sql) === TRUE) {
				$sql = "UPDATE user SET firstname='$fname',lastname='$lname',phone='$phone', email='$email' WHERE account_id='$id'";
				$result = $conn->query($sql);
			echo "Success";
		} else {
    	  echo "Update Failed";
    	}
    		
    	$conn->close();
    }

?>