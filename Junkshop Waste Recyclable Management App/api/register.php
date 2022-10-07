<?php
    header('Access-Control-Allow-Origin: *');
	if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['email'])){
		
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
    
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$usertype = "User";
	
    	include('dbconnection.php');
		
		$sql = "SELECT * FROM accounts WHERE username='$user'";
		$check = mysqli_query($conn, $sql);
		$checkrows = mysqli_num_rows($check);
		if($checkrows>0){
			echo "Already Exist"; 
			
		}else{
			
			$sql = "INSERT INTO accounts (username, password, user_type)
			VALUES ('$user', '$encryptpwd','$usertype')";
			
			if ($conn->query($sql) === TRUE) {

				$acc_id = $conn->insert_id;
				$add_id = $conn->insert_id;
				$sql = "INSERT INTO user (firstname, lastname, phone, email, account_id, address_id)
				VALUES ('$fname', '$lname','$phone','$email','$acc_id','$add_id')";
				$result = $conn->query($sql);
				
				//Insert Address ID from Address Table
				$mysql = "INSERT INTO address (address_id, street, brgy, city, province) VALUES ('$add_id', '...','...','...','...')";
				$result = $conn->query($mysql);
				
				echo "Success"; 
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error; 
			}
		}	
		
		$conn->close();
	}
?>
