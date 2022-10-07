<?php
	require_once('nav.php');
	require_once('db.php');
	if(count($_POST)>0) 
		{$username = $_POST['username'];
		$password = $_POST['password'];
			$sql = "UPDATE accounts SET password='$password', username ='$username' WHERE account_id='" . $_POST["account_id"] . "'";
			mysqli_query($conn,$sql);
			$message = "Account is Modified Successfully";
		}
		$sql = "SELECT * FROM accounts WHERE account_id='" . $_GET["account_id"] . "'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
	<link rel="stylesheet" href="scripts/css/style.css">
	<body>
		<form method="post" ></br></br>
			<center><h1>Updating </br>Junker Login Credentials<a href="view_user2.php" class="link"><img alt='View Here' title='View Here' src='images/edit.png' width='30px' height='30px'/></a></center>		
		<div class="message" id="message"><?php if(isset($message)) { echo $message; }?></div>
					<div class="wrapper">
					<h1>
					<input type="hidden" name="account_id" class="txtField" value="<?php echo $row['account_id']; ?>">
					<div class="wrapper2">
						<label><b><h1>Username:</h1></label></br>
							<center><input type="text" name="username" placeholder="Enter junker's username" class="txtField" value="<?php echo $row['username']; ?>"></center></br>
						<label><b><h1>Password:</h1></label></br>
							<center><input type="password" name="password" placeholder="Enter junker's password" class="txtField" value="<?php echo $row['password']; ?>"></center>
					</br>
						<center><input type="submit" name="submit" value="Update" class="btnSubmit"></center></td>
					</div>
				</div>
			</form>
		</body>
<style>
			  #blink {
            font-size: 20px;
            font-weight: bold;
            color: #2d38be;
            transition: 0.1s;
        }
body {
				 background-size: 100%;background:  url("images/HOME_BACK.jpg") no-repeat fixed center;
				 width:100%;
			 
			}
		.message
			{
			color: #FF0000;
			font-size:25px;
			text-align: center;
			}
		/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 700px) {
		  .row {   
			flex-direction: column;
		  }
		}
			  #blink {
            font-size: 20px;
            font-weight: bold;
            color: #2d38be;
            transition: 0.5s;
        }
		label
			{font-family: Arial, Helvetica, sans-serif;
			font-size:25px;
			margin-left: 1%;
			
			}
		.message
			{
			color: #FF0000;
			font-size:25px;
			text-align: center;
			}
		.wrapper
			{ 
			background: rgba(0,0,0,.2);
			border: 3px solid;
			width: 35%;
			margin-left: 33%;
			border-radius: 5px;
			}

	</style>
	 <script type="text/javascript">
        var blink = document.getElementById('message');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 500);
    </script>
</html>
