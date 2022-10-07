
<?php
require_once('db.php');
    $shop_reference = mt_rand(1111111,9999999);
	$shop_name = $_POST['shop_name'];
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
        
    $shop_owner = $_POST['shop_owner'];
	$shop_num = $_POST['shop_num'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$street = $_POST['street'];
	$brgy = $_POST['brgy'];
	$day_in = "Monday";
	$day_out =  "Saturday";
	$time_in = "07:00";
	$time_out = "12:00";
	$city = $_POST['city'];
	$province = $_POST['province'];
	$user_type = "Admin";
	
		$sql = "SELECT * FROM accounts WHERE username='$user'";
		$check = mysqli_query($conn, $sql);
		$checkrows = mysqli_num_rows($check);
		if($checkrows>0){
		    echo' <alert("Username is already taken, please try a new one.");
				echo '<script> location.replace("junkshop_register.php");</script>';
		}else{
		$sql = "INSERT INTO accounts (username, password, user_type)
			VALUES ('$user', '$encryptpwd','$user_type')";
			
			if ($conn->query($sql) === TRUE) {
		    
if(isset($_POST['submit'])){

	$img_name = $_FILES['image']['name'];
	// Select file type
	$imageFileType = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
	
	// valid file extensions
	$extensions_arr = array("jpg","jpeg","png","gif");
 
	// Check extension
	if( in_array($imageFileType,$extensions_arr) ){
 
	// Upload files and store in database
	if(move_uploaded_file($_FILES["image"]["tmp_name"],'shop_images/'.$img_name)){
		// Image db insert sql	
		
		$sql = "INSERT INTO address ( street, brgy, city, province) VALUES ('$street', '$brgy', '$city','$province')";
  	
				  if ($conn->query($sql) === TRUE) {
	
		$address_id = $conn->insert_id;	
		$sql = "INSERT into junkshop(shop_reference, shop_name,  shop_owner, shop_num, latitude, longitude, img_name, day_in, day_out,time_in, time_out, address_id) values('$shop_reference','$shop_name', '$shop_owner', '$shop_num',' $latitude', '$longitude', '$img_name','$day_in','$day_out','$time_in','$time_out', '$address_id')";
    $result = $conn->query($sql);

		echo "<script>";
        echo "alert('New Junkshop Information Added Successfully')";
        echo "window.location.replace('view_user2.php')";
      echo "</script>";
			} else {
		  echo 'Error: '.mysqli_error($conn);
		}
	}}else{
		echo 'Error in uploading file - '.$_FILES['image']['name'].'<br/>';
	}}}}
?>