<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');
	$id = (int)$_GET['id'];
	include('dbconnection.php');
	
	$sql = "SELECT user.user_id, user.firstname, user.lastname, user.phone, user.email, accounts.username, accounts.password, address.street, address.brgy, address.city, address.province FROM user INNER JOIN accounts ON user.account_id='$id' and accounts.account_id='$id' INNER JOIN address ON user.address_id='$id' and address.address_id='$id';";
	$result = $conn->query($sql);
	
	$encrypt_method = "AES-256-CBC";
    $secret_key = 'solidwastemanagement';
    $secret_iv = 'user secret iv';
        
    //Hashed Keys
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
	if($result->num_rows>0){		
		while($row = $result->fetch_assoc()) {

			$userinfo = $row["user_id"]. "/" .$row["firstname"]. "/" .$row["lastname"]. "/" .$row["phone"]. "/" .$row["email"]. "/" .$row["username"]. "/" .openssl_decrypt(base64_decode($row["password"]), $encrypt_method, $key, 0, $iv). "/" .$row["street"]. "/" .$row["brgy"]. "/" .$row["city"]. "/" .$row["province"];
			
		}
		echo $userinfo;
	} else {
		echo "0 results";
	}
	$conn->close();
?>