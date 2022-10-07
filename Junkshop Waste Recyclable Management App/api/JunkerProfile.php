<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
	$accid = (int)$_GET['id'];
	include('dbconnection.php');
	
	$sql = "SELECT junkers.firstname, junkers.lastname, accounts.username, accounts.password FROM junkers, accounts WHERE accounts.account_id='$accid' AND junkers.account_id='$accid'";
	$result = $conn->query($sql);
	
	$encrypt_method = "AES-256-CBC";
    $secret_key = 'solidwastemanagement';
    $secret_iv = 'user secret iv';
        
    //Hashed Keys
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
	if($result->num_rows>0){		
		while($row = $result->fetch_assoc()) {

			$userinfo = $row["firstname"]. "=" .$row["lastname"]. "=" .$row["username"]. "=" .openssl_decrypt(base64_decode($row["password"]), $encrypt_method, $key, 0, $iv);
			
		}
		echo $userinfo;
	} else {
		echo "0 results";
	}
	$conn->close();
?>