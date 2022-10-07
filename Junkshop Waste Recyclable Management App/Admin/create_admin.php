<?php
require_once('db.php');	
header('Access-Control-Allow-Origin: *');
	if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['user']) && isset($_POST['pass'])&& isset ($_POST['shop_id']) ){
	
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
    
		$shop_id = $_POST['shop_id'];
		$usertype = "Junker";
	
		$sql = "SELECT * FROM accounts WHERE username='$user'";
		$check = mysqli_query($conn, $sql);
		$checkrows = mysqli_num_rows($check);
		if($checkrows>0){
			echo '<script>alert("Username is already taken, please try a new one."); location.replace("admin_register.php");</script>';
		}else{
			
			$sql = "INSERT INTO accounts (username, password, user_type)
			VALUES ('$user', '$encryptpwd','$usertype')";
			
			if ($conn->query($sql) === TRUE) {

				$acc_id = $conn->insert_id;
				$sql = "INSERT INTO junkers (firstname, lastname, account_id, shop_id)
				VALUES ('$fname', '$lname','$acc_id','$shop_id')";
				$result = $conn->query($sql);
			
				 echo "<script>";
        echo "alert('New Admin Information Added Successfully');";
        echo "window.location.replace('view_user2.php');";
      echo "</script>";
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error; 
			}
		}	
		$conn->close();
	}
?>