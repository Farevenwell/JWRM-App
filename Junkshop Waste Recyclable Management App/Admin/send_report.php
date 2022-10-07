<?php
    	include('db.php');
$shop_id= $_POST['shop_id'];
$num_items= $_POST['num_items'];
			$sql = "INSERT INTO reports (shop_id, num_items)
			VALUES ('$shop_id','$num_items')";
			
			if ($conn->query($sql) === TRUE) {

				echo "<script>
			 </script>";
			 echo "Successfully Reported"; 
			}else {
			  echo "Error: " . $sql . "<br>" . $conn->error; 
			}	
		$conn->close();
?>
		