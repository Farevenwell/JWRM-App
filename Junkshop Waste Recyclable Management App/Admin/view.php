     <?php
		include("db.php");
			$sql = "SELECT * FROM junkshop";
			$result = $conn->query($sql);
	?>
	<center><h2><b>Registered Junkshop<a onclick="myFunction1()"><img alt='Minimize' title='Minimize' src='images/mini.png' width='30px' height='30px' /></a></b></h2></center>
				<div id="side">
					<table width="100%" class="tblListForm">
								<tr class="listheader">	
										<td><h3><center>Junkshop Name </center></h3></td>
										<td><h3><center>Owner</center> </center></h3></td>
										<td><h3><center>Contact # </center></h3></td>
										<td><h3><center>Edit</center></h3></td>
										<td><h3><center>Delete</center></h3></td>	
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
											<td><center><?php echo $row["shop_num"]; ?></center></td>
											<td><center><a href="update.php?shop_id=<?php echo $row["shop_id"]; ?>" class="link"><img alt='Edit' title='Edit' src='images/edit.png' width='30px' height='30px' /></a></td>
											<td><center><a href="remove.php?shop_id=<?php echo $row["shop_id"]; ?>"  class="link"><img alt='Delete' title='Delete' src='images/delete.png' width='30px' height='30px'/></a></td>
										</tr>
										<?php
									$i++;
									}
								?>
							</table>
							</div>
			</center>
	<script>
function myFunction1() {
  var x = document.getElementById("side");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</body>
</html>