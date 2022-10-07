<?php
	require_once('db.php');
	include('nav.php');
		$query = "SELECT count(inventory_id) as Item, shop_id FROM `inventory` GROUP by shop_id";
		$result = mysqli_query($conn , $query);
		$resultCount=$result->num_rows;
		$color = ['#B2D7DA','#9cbb73','#9ee2d9','#9f9ee2','#e29eba','#B2D7DA','#FFFF00','#B3D7DA','#FFF000'];
		$shop_id = array();
		$item_id = array();
			foreach ($result as $inventory) 
				{
					$shop_id[] = $inventory['shop_id'];
					$item_id[] = $inventory['Item'];
				}
			$sql = "SELECT shop_name,shop_id FROM junkshop";
    		$result = mysqli_query($conn,$sql);
			$shop_name = array();
				foreach ($result as $inventory) 
					{
						$shop_name[] = $inventory['shop_name'];
					}
	?>
<html>
	<header>
    	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    	<link rel="stylesheet" type="text/css" href="scripts/css/tcal.css" />
    	<script type="text/javascript" src="scripts/js/tcal.js"></script>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
	</header>
	<script type="text/javascript">
            function Clickheretoprint()
                { 
                  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
                      disp_setting+="scrollbars=yes,width=1000, height=400, left=100, top=25"; 
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
							["shop_name","Item"],
							<?php for($i=0;$i<$resultCount;$i++)
								{ ?>
								  [<?php 
								echo "'".$shop_name[$i]."', ".$item_id[$i] ?>],<?php 
								} 
							?>
						]);

					var options = 
						{
						  title: "Items general percentage collected by junkshops ",
						  width: '90%',
						  colors: 
							[
								<?php
									for($i=0;$i<$resultCount;$i++) 
									    {echo "'".$color[$i]."',";} 
								?>
							]
						};
				  var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
				  chart.draw(data, options);
				}
		   
		google.charts.load('current', {packages: ['corechart', 'bar']});
		google.charts.setOnLoadCallback(drawBarBasic);
		function drawBarBasic() 
			{
				var data = new google.visualization.arrayToDataTable([
					 ['Junkshop Name', 'Items', { role: 'style' }, { role: 'annotation' }],
					<?php
					for($i=0;$i<$resultCount;$i++){
					  ?>[<?php echo "'".$shop_name[$i]."', ".$item_id[$i].", '".$color[$i]."' , "."'".$shop_name[$i]."'" ?>],
					<?php } 
					?>
					]);

				var options = 
					{	title: "General number of items collected by Junkshop",
						chartArea: {width: '70%', height: '70%'},
						hAxis: 
							{
							  title: 'Total Items',
							  minValue: 0
							},
						vAxis: 
							{
							  title: 'Junkshop List'
							},
							  legend: { position: "none" }
					};
					
				var chart = new google.visualization.BarChart(document.getElementById('bar-chart'));
				  chart.draw(data, options);
			}
		
		google.charts.load("current", {packages:['corechart']});
		google.charts.setOnLoadCallback(drawColumnChart);
		function drawColumnChart() 
			{
				var data = google.visualization.arrayToDataTable([
					['Junkshop', 'Number of Items Collected', { role: 'style' }, { role: 'annotation' }],
					<?php
					for($i=0;$i<$resultCount;$i++){
					  ?>[<?php echo "'".$shop_name[$i]."', ".$item_id[$i].", '".$color[$i]."' , "."'".$shop_name[$i]."'" ?>],
					<?php } 
					?>
					]);

				var options = 
					{
						title: "Column Chart for Numbers of Items Collected per Junkshop",
						chartArea: {width: '90%'},
						legend: { position: "none" },
					};
				  
				var chart = new google.visualization.ColumnChart(document.getElementById("column-chart"));
				  chart.draw(data, options);
			}
	</script>
	  
		<style>
			body 
			    {
    			     font-family: Arial, Helvetica, sans-serif;
    			     background:  url("images/HOME_BACK.jpg") no-repeat;
			    }
			#chart_container
				{
					position: relative;
					height:100%;
					font:25%;
				}
			
			.chart-div
			    {
			        border: 100%;
				}
		</style>
	  <body>
	<center>	
	    <div class="content" id="content">
            <div id="chart_container"> <h2>General reports with the total waste collected by junkshops</h2>
            <div id="pie-chart" class="chart-div"></div></br>
            <div id="bar-chart" class="chart-div"></div></br>
            <div id="column-chart" class="chart-div"></div>
        </div> </center>    
  </body>
</html>
