<?php
require_once("db.php");
$sql = "DELETE FROM junkshop WHERE shop_id='" . $_GET["shop_id"] . "'";
mysqli_query($conn,$sql); 
echo "<script>alert('Junkshop is Successfully Deleted');
    window.location.href = 'junkshop_register.php';
    </script>";
?>