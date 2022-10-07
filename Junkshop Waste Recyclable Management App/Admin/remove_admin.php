<?php
require_once("db.php");

$sql = "DELETE FROM junkers WHERE account_id='" . $_GET["account_id"] . "'";
if ($conn->query($sql) === TRUE) {

$sql = "DELETE FROM accounts WHERE account_id='" . $_GET["account_id"] . "'";
mysqli_query($conn,$sql); 
echo "<script>alert('Admin Information is Successfully Deleted');
    window.location.href = 'view_user2.php';
    </script>";
}
?>