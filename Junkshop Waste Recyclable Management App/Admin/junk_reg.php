	<?php
		include("db.php");
			$sql = "SELECT * FROM junkshop";
			$result = $conn->query($sql);
	?>	<body>
	<style>
 body {font-family: Arial, Helvetica, sans-serif;
		  background:  url("images/HOME_BACK.jpg") no-repeat fixed cover;
    }
		.btn01{
			width: 10%;
			background: #B2B2FF;
			color: black;
			border:2px;
			border-radius:2px;
			}

		.row {  
		  display: flex;
		  background:  url("images/HOME_BACK.jpg") no-repeat fixed center;
		  flex-wrap: wrap;
		}
		.label{
			font-size:15px;
			
		}

		/* Main column */
		.wrapper {  
		  background:  url("images/HOME_BACK.jpg") no-repeat fixed center;
		  margin-top:5%;
		  margin-left:15%;
		  width:98%;
		}

		@media screen and (max-width: 800px) 
			{
				body 
						{
							font-family: Arial, Helvetica, sans-serif;
							background:  url("images/HOME_BACK.jpg") no-repeat fixed cover;
							font-size:2%;
						}
				.navbar a 
						{
							float: none;
						}
				.wrapper 
					{  
					  background:  url("images/HOME_BACK.jpg") no-repeat fixed center;
					}
				.h1
					{
					  font-size:21%;
					}
						
				.btn01{
					width: 25%;
					background: #B2B2FF;
					color: black;
					border:2px;
					border-radius:2px;
					}
			}
	</style>
	<link rel="stylesheet" href="scripts/css/admin.css">
	<link href="images/favicon.jfif" rel="icon">
				<form method='post' action='create_junkshop.php' enctype='multipart/form-data'>
					<div class="wrapper"><center><b>Shop Registration Form</center>
							 <label><b>Junkshop Information</b></label></br>
								<input type="text" placeholder="Enter Junkshop Name" name="shop_name" required>
								<input type="text" placeholder="Enter Junkshop Owner"name="shop_owner"required>
								<input type="text" placeholder="Enter Contact Number" name="shop_num"required></br></br>
							 <label><b>Junkshop Image/Banner: 
								<input type="file" name="image" id="file" multiple></b></label></br>
							 <label><b>Location Information:</b></label>
									<input type="text" placeholder="Enter Latitude" name="latitude"required>
									<input type="text" placeholder="Enter Longitude" name="longitude"required></br>
							<label><b>Address:</b></label>
									<input type="text" placeholder="Enter Street" name="street"required>
									<input type="text" placeholder="Enter Brgy" name="brgy"required></br></br>
							<center><input type='submit' name='submit' value='Register' class="btn01"></center></br>
    	
					</div> 
    	</form> 
			</center>
	</body>
</html>
