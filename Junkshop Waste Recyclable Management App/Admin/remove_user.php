<?php
require_once("db.php");
$sql = "DELETE FROM accounts WHERE account_id='" . $_GET["account_id"] . "'";
mysqli_query($conn,$sql); 
echo "<script>alert('Users Information is Successfully Deleted');
    window.location.href = 'view_user.php';
    </script>";
?>