
    <?php
		include("db.php");
			$sql = "SELECT * FROM junkshop";
			$result = $conn->query($sql);
	?>
		<center>
	<center><h2><b>Registered Junkshops</b></h2></center>
	<link rel="stylesheet" href="scripts/css/admin.css">
				 <?php if(isset($message)) { echo $message; } ?>
					
							<table  class="tblListForm">
								<tr class="listheader">
									<td><p><center>Junkshop Name</center></p></td>
									<td><p><center>Owner</center></p></td>
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
										<?php $i++;
									}
								?>
							</table>
		</center>
