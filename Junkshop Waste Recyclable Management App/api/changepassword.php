<?php
    header('Access-Control-Allow-Origin: *');
    if(isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['conpass'])){
        
        $accid = $_POST['accid'];
        $checkpass = $_POST['checkpass'];
		$oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
		$conpass = $_POST['conpass'];
		
		include ("dbconnection.php");
		$encrypt_method = "AES-256-CBC";
        $secret_key = 'solidwastemanagement';
        $secret_iv = 'user secret iv';
            
        //Hashed Keys
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
		
    	$checkpass = openssl_decrypt(base64_decode($checkpass), $encrypt_method, $key, 0, $iv);
		
		if($oldpass == $checkpass){
		    if($newpass == $conpass){
		        
		        $output = openssl_encrypt($conpass, $encrypt_method, $key, 0, $iv);
                $encryptpwd = base64_encode($output);
            
		        $sql = "UPDATE accounts SET password='$encryptpwd' WHERE account_id='$accid'";
		        if ($conn->query($sql) === TRUE) {
                    echo "Success";
            	} else {
            	  echo "Error Updating Item record: " . $conn->error;
            	}
		    }else{
		        echo "Unmatched";
		    }
		}else{
		    echo "Failed";
		}
    		
    	$conn->close();
    }
?>