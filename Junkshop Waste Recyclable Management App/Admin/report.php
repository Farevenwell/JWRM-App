	<?php
		require_once('db.php');
		include('nav.php');
			$query = "SELECT count(inventory_id) as Item, item_id shop_id FROM `inventory` WHERE shop_id='" . $_GET["shop_id"] . "' GROUP by item_id " and "SELECT * FROM junkshop WHERE shop_id='" . $_GET["shop_id"] . "'";
			$result = mysqli_query($conn , $query);
			$resultCount=$result->num_rows;
			$color = ['#B2D7DA','#9cbb73','#9ee2d9','#9f9ee2','#e29eba','#B2D7DA','#FFFF00','#B3D7DA','#FFF000'];
			$shop_id = array();
    		$result = mysqli_query($conn,$query);
    		$row = mysqli_fetch_array($result);
			$inventory_id = array();
				foreach ($result as $inventory) 
					{
						$shop_id[] = $inventory['shop_id'];
						$inventory_id[] = $inventory['Item'];
					}
					
			$sql = "SELECT item_name,item_id FROM buy_items";
    		$result = mysqli_query($conn,$sql);
			$item_id = array();
				foreach ($result as $inventory) 
					{
						$item_id[] = $inventory['item_id'];
						$item_name[] = $inventory['item_name'];
					}
	?>
	
<!DOCTYPE html>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" type="text/css" href="scripts/css/style.css" />
	<link rel="stylesheet" type="text/css" href="scripts/css/tcal.css" />
	<script type="text/javascript" src="scripts/js/tcal.js"></script>
		<style> 
			body {font-family: Arial, Helvetica, sans-serif;
			  background:  url("images/HOME_BACK.jpg") no-repeat;
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
			/* Increase the font size of the h1 element */
			.label {
			  font-size: 50px;
			  left: 40px;
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

			/* Main column */
			.main {   
			  background:  url("images/HOME_BACK.jpg") no-repeat fixed center;
			  padding: 20px;
			}
			.main3 
				{   
				  flex: 60%; 
				}

			/* Fake image, just for this example */
			.fakeimg 
				{
				  background-color: #aaa;
				  width: 100%;
				  padding: 20px;
				}

			/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
			@media screen and (max-width: 700px) 
				{
					body {font-family: Arial, Helvetica, sans-serif;
			  background:  url("images/HOME_BACK.jpg") no-repeat fixed;
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
			  font-size: 20px;
			}
			/* Increase the font size of the h1 element */
			.label {
			  font-size: 30px;
			  left: 40px;
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

			/* Main column */
			.main {   
			  background:  url("images/HOME_BACK.jpg") no-repeat fixed center;
			  padding: 20px;
			}
			.main3 
				{   
				  flex: 60%; 
				}

			/* Fake image, just for this example */
			.fakeimg 
				{
				  background-color: #aaa;
				  width: 100%;
				  padding: 20px;
				}
				.row 
					{   
					flex-direction: column;
					}
				}
			.tblSaveForm 
				{
				background-color:#DEE094;
				margin:2px;
				}
				
					
			.tablerow 
				{
				background-color: #A7D6F1;
				color:white;
				}
			.evenRow 
				{
				background-color: #E2EDF9;
				font-size:20px;
				color:#101010;
				}
			.evenRow:hover 
				{
				background-color: #ffef46;
				}
			.oddRow 
				{
				background-color: #B3E8FF;
				font-size:20px;
				color:#101010;
				}
			.oddRow:hover 
				{
				background-color: #ffef46;
				}
			.listheader 
				{
				background-color: #fedc4d;
				font-size:12px;
				font-weight:bold;
				}

		</style>
	</head>
	<body>
		<div class="content" id="content">
		
		<?php
			include('db.php');
			$sql = "SELECT * FROM junkshop WHERE shop_id='" . $_GET["shop_id"] . "'";
			$result = $conn->query($sql);
		?>	
		<?php
			$i=0;
				while($row = mysqli_fetch_array($result)) 
				{
					if($i%2==0)
						$junkers="evenRow";
						else
							$junkers="oddRow";
		?>							
					<div class="main3">
						<table border="1" cellspacing="0" width="100%" class="tblSaveForm">
							<tr class="tableheader">
								<h1><center>Generating Report</center></h1>
								<b><h2>Shop Reference#:<?php echo $row["shop_reference"];?></h2></b>
									<td colspan="3">
										<b><h2>Junkshop Name:</b></h2><center><h3><?php echo $row["shop_name"];?></h3></center></td>
									<td><b><h2>Owned By:</b></h2><center><h3><?php echo $row["shop_owner"];?></h3></center></td>
									<td><b><h2>Contact Number:</b></h2><center><h3><?php echo $row["shop_num"];?></h3></center></td>		
										<?php $i++;}?>	
							</tr>
						</table>
					</div>
					<header><h2>Total Waste Collected by Junkshops</h2></header>
					<div class="main">
						<center> 
								<div id="column-chart" class="chart-div"></div>
								<?php
									$sql = "SELECT inventory.inventory_id, inventory.item_id, inventory.quantity, inventory.date_modified, inventory.shop_id, buy_items.item_name FROM inventory, buy_items WHERE inventory.item_id=buy_items.item_id AND inventory.shop_id='" . $_GET["shop_id"] . "' AND buy_items.shop_id='" . $_GET["shop_id"] . "'";	
												$result = $conn->query($sql);	
								?>	
								<center>
									<h2><b>List of Items Collected</b></h2>
										<table  width="80%" class="tblListForm">
											<tr class="listheader">
												<td><h3><center>Item Name</center></h3></td>
												<td><h3><center>Quantity</center></h3></td>
												<td><h3><center>Date</center></h3></td>
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
															
															<td><center><?php echo $row["item_name"];?></center></td>
															<td><center><?php echo $row["quantity"]; ?></center></td>
															<td><center><?php echo $row["date_modified"]; ?></center></td>
														</tr>
															<?php
													$i++;
													}
												?>
											</table>
								</center></br>
								
							</center>
						</div>
				</div>
	</body>
			
</html>
	<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=10000, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style=" font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawPieChart);
		  
			function drawPieChart() 
				{
					var data = new google.visualization.arrayToDataTable
						([
							["item_name","Item"],
							<?php for($i=0;$i<$resultCount;$i++)
								{ ?>
								  [<?php 
								echo "'".$item_name[$i]."', ".$inventory_id[$i] ?>],<?php 
								} 
							?>
						]);

					var options = 
						{
						  title: "Items collected by junkshops ",
						  height: '200%',
						  colors: 
							[
								<?php
									for($i=0;$i<$resultCount;$i++) 
										{
										  echo "'".$color[$i]."',";
									} 
								?>
							]
						};
					var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
					chart.draw(data, options);
				}

		google.charts.load("current", {packages:['corechart']});
		google.charts.setOnLoadCallback(drawColumnChart);
		function drawColumnChart() 
			{
				var data = google.visualization.arrayToDataTable([
					['Junkshop', 'Number of Items', { role: 'style' }, { role: 'annotation' }],
					<?php
					for($i=0;$i<$resultCount;$i++){
					  ?>[<?php echo "'".$item_name[$i]."', ".$inventory_id[$i].", '".$color[$i]."' , "."'".$inventory_id[$i]."'" ?>],
					<?php } 
					?>
					]);

				var options = 
					{
						title: "Number of items collected per Junkshop",
						chartArea: {width: ''},
						legend: { position: "none" },
					};
				  
				var chart = new google.visualization.ColumnChart(document.getElementById("column-chart"));
				  chart.draw(data, options);
			}
			google.charts.load('current', {packages: ['corechart', 'bar']});
		google.charts.setOnLoadCallback(drawBarBasic);
		function drawBarBasic() 
			{
				var data = new google.visualization.arrayToDataTable([
					 ['inventory_id', 'Items', { role: 'style' }, { role: 'annotation' }],
					<?php
					for($i=0;$i<$resultCount;$i++){
					  ?>[<?php echo "'".$item_name[$i]."', ".$inventory_id[$i].", '".$color[$i]."' , "."'".$inventory_id[$i]."'" ?>],
					<?php } 
					?>
					]);

				var options = 
					{
						title: "Number of Items in Junkshop",
						chartArea: {width: '60%'},
						hAxis: 
							{
							  title: 'Total Items',
							  minValue: 0
							},
						vAxis: 
							{
							  title: 'Items Collected'
							},
							  legend: { position: "none" }
					};

				var chart = new google.visualization.BarChart(document.getElementById('bar-chart'));
				  chart.draw(data, options);
			}
		
	</script>
	<?php
		require_once('db.php');
		$query = "SELECT count(inventory_id) as Item,shop_id FROM `inventory`WHERE shop_id='" . $_GET["shop_id"] . "'";
			$result = mysqli_query($conn , $query);
			$resultCount=$result->num_rows;
			$shop_id = array();
    		$row = mysqli_fetch_array($result);
			$inventory_id = array();
				foreach ($result as $inventory) 
					{
						$shop_id[] = $inventory['shop_id'];
						$inventory_id[] = $inventory['Item'];
					}
		$sql = "SELECT shop_name FROM junkshop WHERE shop_id='" . $_GET["shop_id"] . "'";
		$result = mysqli_query($conn,$sql);
		
		?>
		<link rel="stylesheet" href="scripts/css/style.css">
		<body>
		<form method='post'  action="send_report.php" enctype='multipart/form-data'>
				<div class="wrapper">
        			    <center><h1>Send Report</h1></center>
					    <label><b><h1>Junkshop ID:</h1></b></label>
    						        <input type="text" name="shop_id" value="<?php echo $row['shop_id']; ?>"required>
							<label><b><h1>Collected a total waste of:</h1></b></label>
								    <center><input type="text" name="num_items" value="<?php echo $row['Item']; ?>"required></br>
					</br>
    	            <center>
    	             <input type='submit' name='submit' value='Submit' class="button">
    	        <div>
				</form>	
				</body><style>
			  #blink {
            font-size: 20px;
            font-weight: bold;
            color: #2d38be;
            transition: 0.1s;
        }
body {
				 
			color: black;
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
