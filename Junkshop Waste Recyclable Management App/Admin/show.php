	<?php
		include("db.php");
		include("nav.php");
			$sql = "SELECT * FROM junkshop";
			$result = $conn->query($sql);
	?>	<style>
 body {font-family: Arial, Helvetica, sans-serif;
		  background:  url("images/HOME_BACK.jpg") no-repeat fixed center;
         background-size: 100%;
    }
		.btn01{
			width: 100px;
			}
		/* Style the header */
		.header {
		  padding: 80px;
		  text-align: center;
		  background: #1abc9c;
		  color: white;
		}

		/* Increase the font size of the h1 element */
		.header h1 {
		  font-size: 40px;
		}

		/* Style the top navigation bar */
		.navbar {
		  overflow: hidden;
		  background-color: #333;
		}

		/* Style the navigation bar links */
		.navbar a {
		  float: left;
		  display: block;
		  color: white;
		  text-align: center;
		  padding: 14px 20px;
		  text-decoration: none;
		}

		/* Right-aligned link */
		.navbar a.right {
		  float: right;
		}

		/* Change color on hover */
		.navbar a:hover {
		  background-color: #ddd;
		  color: black;
		}

		/* Column container */
		.row {  
		  display: flex;
		  flex-wrap: wrap;
		}

		/* Create two unequal columns that sits next to each other */
		/* Sidebar/left column */
		.side {
		  flex: 20%;
		  background-color: aqua;
		  padding: 20px;
		}

		/* Main column */
		.main {   
		  flex: 60%; 
		  background:  url("images/HOME_BACK.jpg") no-repeat fixed center;
		  padding: 20px;
		}

		/* Fake image, just for this example */
		.fakeimg {
		  background-color: #aaa;
		  width: 100%;
		  padding: 20px;
		}

		
		/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 700px) {
		  .row {   
			flex-direction: column;
		  }
		}

		/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
		@media screen and (max-width: 400px) 
			{
			  .navbar a 
				  {
					float: none;
					width:100%;
				  }
			}
	</style>
	<body><center><h1><b>Registered Junkshops Located in Ozamiz</b></h1></center>
	<link rel="stylesheet" href="scripts/css/admin.css">
	<link href="images/favicon.jfif" rel="icon">
				 <?php if(isset($message)) { echo $message; } ?>
					
							<table  width="100%" class="tblListForm">
								<tr class="listheader">
										<td><b><h3><center>Shop Id</center></h3></td>
										<td><b><h3><center>Junkshop Name</center></h3></td>
										<td><b><h3><center>Owner</center></h3></td>
										<td><b><h3><center>Contact Number</center></h3></td>
										<td><b><h3><center>Latitude</center></h3></td>
										<td><b><h3><center>Longitude</center></h3></td>
										<td><b><h3><center>Schedule</center></h3></td>
								</tr>
								<?php
									$i=0;
									while($row = mysqli_fetch_array($result)) 
									{
									if($i%2==0)
										$junkers="evenRow";
											else
												$junkers="oddRow";
								?>
										<tr class="<?php if(isset($junkers)) echo $junkers;?>">
											<td><center><?php echo $row["shop_id"]; ?></center></td>
											<td><center><?php echo $row["shop_name"]; ?></center></td>
											<td><center><?php echo $row["shop_owner"]; ?></center></td>
											<td><center><?php echo $row["shop_num"]; ?></center></td>
											<td><center><?php echo $row["latitude"]; ?></center></td>
											<td><center><?php echo $row["longitude"]; ?></center></td>
											<td><center><?php echo $row["day_in"]; ?></center> - <center><?php echo $row["day_out"]; ?></center></td>
											<?php
									$i++;
									}
								?>
							</table>
			</center>
	</body>
</html>
