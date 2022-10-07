<?php
		$servername = "localhost";
        $username = "id17891106_jwrm";
        $password = '$admin_010101$AA';
        $dbname = "id17891106_waste_management";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
	
?>