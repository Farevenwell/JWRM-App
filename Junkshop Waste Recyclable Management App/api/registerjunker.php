<?php
    header('Access-Control-Allow-Origin: *');
	if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['shopid'])){
		
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$user = $_POST['user'];
		
		$pass = $_POST['pass'];
       
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'solidwastemanagement';
        $secret_iv = 'user secret iv';
        
        //Hashed Keys
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        
        $output = openssl_encrypt($pass, $encrypt_method, $key, 0, $iv);
        $encryptpwd = base64_encode($output);
    
		$shopref = $_POST['shopid'];
		$usertype = "Junker";
	
    	include('dbconnection.php');
		
		$sql = "SELECT * FROM accounts WHERE username='$user'";
		$check = mysqli_query($conn, $sql);
		$checkrows = mysqli_num_rows($check);
		if($checkrows>0){
			echo "Already Exist"; 
			
		}else{
		    $sql = "SELECT * FROM junkshop WHERE shop_reference='$shopref'";
	    	$check = mysqli_query($conn, $sql);
			if($check->num_rows>0){		
        		while($row = $check->fetch_assoc()) {
        			$shopid = $row["shop_id"];
        		
        		}
            	    $sql = "INSERT INTO accounts (username, password, user_type)
        			VALUES ('$user', '$encryptpwd','$usertype')";
        			
        			if ($conn->query($sql) === TRUE) {
        
        				$acc_id = $conn->insert_id;
        				$sql = "INSERT INTO junkers (firstname, lastname, account_id, shop_id)
        				VALUES ('$fname', '$lname','$acc_id','$shopid')";
        				$conn->query($sql);
        				
        				echo "Success"; 
        			} else {
        			  echo "Error: " . $sql . "<br>" . $conn->error; 
        	    	}
        	
	    	}else{
    			echo "Not Found"; 
	    	}
		}	
		
		$conn->close();
	}
?>
