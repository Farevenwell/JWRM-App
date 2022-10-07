<?php
	require_once('nav.php');
	require_once('db.php');
	if(count($_POST)>0) 
		{
			$sql = "UPDATE junkshop set shop_name='" . $_POST["shop_name"] . "', shop_owner='" . $_POST["shop_owner"] . "', shop_num='" . $_POST["shop_num"] . "', latitude='" . $_POST["latitude"] . "', longitude='" . $_POST["longitude"] . "', day_in='" . $_POST["day_in"] . "', day_out='" . $_POST["day_out"] . "', time_in='" . $_POST["time_in"] . "', time_out='". $_POST["time_out"]."' WHERE shop_id='" . $_POST["shop_id"] . "'";
			mysqli_query($conn,$sql);
			$message = "The Information is Modified Successfully";
		}
		$sql = "SELECT * FROM junkshop WHERE shop_id='" . $_GET["shop_id"] . "'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
	<link rel="stylesheet" href="scripts/css/edit_admin.css">
	<body>
		<form method="post" position="center">
			<center><h1>Updating Junkshop Information<a href="view_user2.php" class="link"><img alt='View Here' title='View Here' src='images/edit.png' width='30px' height='30px'/></a></center>
				<div class="message" id="message"><?php if(isset($message)) { echo $message; }?></div>
					<div class="wrapper">
					<h2>   <input type="hidden" name="shop_id" value="<?php echo $row['shop_id']; ?>">
					<div class="wrapper2">
    						<label><b><h1>Junkshop Info:</h1></b></label>
    						        <input type="text" name="shop_name" placeholder="Enter junkshop name" value="<?php echo $row['shop_name']; ?>"required>
    								<input type="text" name="shop_owner" placeholder="Enter shop owner" value="<?php echo $row['shop_owner']; ?>"required>
    								<center><input type="text" name="shop_num" placeholder="Enter contact number" value="<?php echo $row['shop_num']; ?>"required></center>
							<label><b><h1>Junkshop Location:</h1></b></label>
									<input type="text" name="latitude" placeholder="Enter latitude" value="<?php echo $row['latitude']; ?>"required>
								    <input type="text" name="longitude" placeholder="Enter longitude" value="<?php echo $row['longitude']; ?>"required></br>
							<label><b><h1>Day Schedule:</h1></b></label>
								<input type="text" name="day_in" placeholder="Enter day start" value="<?php echo $row['day_in']; ?>"required>
								    <input type="text" name="day_out" placeholder="Enter day out" value="<?php echo $row['day_out']; ?>"required></br>
							<label><b><h1>Time Schedule:</h1></b></label>
									 <input type="time" name="time_in" placeholder="Enter time opened" value="<?php echo $row['time_in']; ?>"required>
								    <input type="time" name="time_out" placeholder="Enter time closed" value="<?php echo $row['time_out']; ?>"required>
					</br>
						<center><input type="submit" name="submit" value="Update" class="btnSubmit"></center>
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
			margin-left: 15%;
			width:73%;
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
