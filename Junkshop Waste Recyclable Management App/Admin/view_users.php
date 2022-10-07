			   
    <?php
		include("db.php");
			$sql = "SELECT * FROM accounts where user_type ='User'";
			$result = $conn->query($sql);
	?>
	<center><h2><b>Registered Users<a onclick="myFunction3()"><img alt='Minimize' title='Minimize' src='images/mini.png' width='30px' height='30px' /></a></b></h2></center>
				<div id="side">
					<table  width="100%" class="tblListForm">
								<tr class="listheader">
										<td><b><h3><center>User ID</center></h3></td>
										<td><b><h3><center>Username</center></h3></td>
										<td><b><h3><center>Edit</center></h3></td>
										<td><b><h3><center>Delete</center></h3></td>
										
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
											<td><center><?php echo $row["account_id"]; ?></center></td>
											<td><center><?php echo $row["username"]; ?></center></td>
											<td><center><a href="update_user.php?account_id=<?php echo $row["account_id"]; ?>" class="link"><img alt='Edit' title='Edit' src='images/edit.png' width='30px' height='30px' /></a></center></td>
											<td><center><a href="remove_user.php?account_id=<?php echo $row["account_id"]; ?>"  class="link"><img alt='Delete' title='Delete' src='images/delete.png' width='30px' height='30px'/></a></center></td>
											<?php
									$i++;
									}
								?>
							</table>
							</div>
			</center>
	<script>
function myFunction3() {
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