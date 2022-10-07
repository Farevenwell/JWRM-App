
<?php
		include("nav.php");
		include("db.php");
			$sql = "SELECT * FROM junkshop";
			$result = $conn->query($sql);
	?>	
<!DOCTYPE html>
	<link rel="stylesheet" href="scripts/css/admin.css">
	<style>
	body {font-family: Arial, Helvetica, sans-serif;
		  background:  url("images/HOME_BACK.jpg");
    }
table {
  border-radius: 25%;
  border: 1% solid #73AD21;
  font-size: 50%;
		width:80%;
}
		
 th, td {
  border: 1px solid black;
}
		/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 700px) {
		  .row {   
			flex-direction: column;
		  }
			.header {
		  padding: 80px;
		  text-align: center;
		  background: #1abc9c;
		  font-size: 50%;
		  color: white;
		}

		/* Increase the font size of the h1 element */
		.header h1 {
		}
		*{padding:0;margin:0;}

	button{
		width:10%;
		height:10%;
			}
.table {
  border-radius: 25px;
  border: 2px solid #73AD21;
}
		}
	</style>
	
	
		
	</head> 
<body>
	<header></br>
		<center><h1><b>Generate Report for Registered Junkshops
		</br>
	</header>
					<center>
						<table class="tblListForm">
							<tr class="listheader">	
								<td><h2><b><center>Junkshop Name </center></b></h2></td>
								<td><h2><b><center>Junkshop Owner </center></b></h2></td>
								<td><h2><b><center>Generate Report</center></b></h2></td>
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
								<td><center><?php echo $row["shop_name"]; ?></center></td>
								<td><center><?php echo $row["shop_owner"]; ?></center></td>
								<td><center><a href="report.php?shop_id=<?php echo $row["shop_id"]; ?>" class="link"><img alt='Edit' title='Generate Report' src='images/gen.png' width='20%' height='40px' /></a></center></td>
							</tr>
										<?php
									$i++;
									}
								?>
						</table>
					</center>
	</body>
</html>
