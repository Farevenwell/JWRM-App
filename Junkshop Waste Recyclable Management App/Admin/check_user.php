<?php
	require_once('db.php');
  session_start();

  if(isset($_POST['login'])){
    $s = "SELECT * FROM accounts where username = '$_POST[username]' AND password = '$_POST[password]'";
    $query_run = mysqli_query($conn,$s);
    if(mysqli_num_rows($query_run)){
      while($rows = mysqli_fetch_assoc($query_run)){
        $_SESSION['username'] = $_POST['username'];
		if(isset($_SESSION['username']))
		{
			if($rows['user_type'] == 'Admin')
			{
				$_SESSION['user_type'] = $rows['user_type'];
			  	echo "<script>alert('Successfully Login as Admin');
			  	</script>";
			  	echo "<script>
			window.location.href = 'Admin_Home2.php';
			 </script>";
			}elseif($rows['user_type'] == 'Main')
			{
				$_SESSION['user_type'] = $rows['user_type'];
			  	echo "<script>alert('Successfully Login as Main Admin');
			  	</script>";
			  	echo "<script>
			window.location.href = 'Admin_home.php';
			 </script>";
			}
			elseif($rows['user_type'] == 'Junkers')
			{
				$_SESSION['user_type'] = $rows['user_type'];
			  	echo "<script>alert('Username and Password are not found, please try again');
			  	</script>";
			  	echo "<script>
			window.location.href = 'index.html';
			 </script>";
			}
			elseif ($rows['user_type'] == 'Users'){
				$_SESSION['user_type'] = $rows['user_type'];
				echo "<script>alert(' Username and Password are not found, please try again');
				</script>";
				echo "<script>
			window.location.href = 'index.html';
			 </script>";
			}else{
				
				echo "<script>alert(' Username and Password didnt match please try again');
				window.location.href = 'index.html';
				 </script>";
			}
				

		}
       
      }
	  	
  }
  else{
      echo "<script>alert('Please enter username and password correctly');
		window.location.href = 'index.html';
    	 </script>";
  }
 
  }

?>