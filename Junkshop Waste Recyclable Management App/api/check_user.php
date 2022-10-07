<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

	include('dbconnection.php');
    
	$usr = $conn->real_escape_string($_POST['usr']);
    $pwd = $conn->real_escape_string($_POST['pwd']);
    
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'solidwastemanagement';
    $secret_iv = 'user secret iv';
    
    //Hashed Keys
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
    $output = openssl_encrypt($pwd, $encrypt_method, $key, 0, $iv);
    $encryptpwd = base64_encode($output);
    
    $sql = "SELECT * FROM accounts WHERE BINARY username = '$usr' AND BINARY password = '$encryptpwd'";
    $result = $conn->query($sql);
    
	$response = array();
    
    if ($result->num_rows > 0) {
	  // output data of each row
	  if($row = $result->fetch_assoc()) {
		if($row["user_type"] == "Admin"){
			array_push($response, "Access Denied");
			echo json_encode($response);
		}else if($row["user_type"] == "Junker"){
			$acc_id = $row["account_id"];
			
			array_push($response, $row);
			$getshopid = "SELECT shop_id from junkers WHERE account_id=$acc_id";
			
			$result = $conn->query($getshopid);
			if ($result->num_rows > 0){
				
				if($row=$result->fetch_assoc()){
					$shopid = $row["shop_id"];
					array_push($response, $row);
					$getshopaddid = "SELECT address_id from junkshop where shop_id=$shopid";
					
					$result = $conn->query($getshopaddid);
					if ($result->num_rows > 0){
	
						if($row=$result->fetch_assoc()){
							$shopaddid = $row["address_id"];
							array_push($response, $row);
							
						}
					}
				}
			}
			
			echo json_encode($response);
			
		}else{
			array_push($response, $row);
			echo json_encode($response);
		}
	  }
	} else {
	  array_push($response, "Access Denied");
	  echo json_encode($response);
	}
	$conn->close();
	
	
?>