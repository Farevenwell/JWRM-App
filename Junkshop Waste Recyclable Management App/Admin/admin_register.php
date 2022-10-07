
<?php
		include("nav.php");
	?>

<!DOCTYPE html>
	<link rel="stylesheet" href="scripts/css/admin.css">
	<style>
	body {font-family: Arial, Helvetica, sans-serif;
          background: url(images/HOME_BACK.jpg);
          background-repeat: cover;
          background-size: auto;
            }
		.btn01{
			background: #baffc9;
			border-radius:5%;
			width:auto;
			}

		/* Increase the font size of the h1 element */
		.header h1 {
		  font-size: 40px;
		}

		  .junk {   
		  border-radius:5%;
		  margin-left:4%;
		  margin-right:-8%;
		  border-style: solid;
		  }
		
		  .junk2 {   
		  border-radius:5%;
		  margin-left:10%;
		  margin-right:-50%;
		  height:70.6%;
		  border-style: solid;
		  }
	.form{
		position:fixed;
		top:10%;
		color:#FFF;
		border-radius:50px;
		}
	.my-float{
			margin-top:2%;
		}
		/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 100%) {
		body {font-family: Arial, Helvetica, sans-serif;
              background: url(images/HOME_BACK.jpg);
              background-repeat: no-repeat;
              background-size: auto;
		    }
        		
        .btn01{
			width: 100%;
			background: #baffc9;
			border-radius:5%;
			}

    		/* Column container */
    	.row {  
    		  display: flex;
    		  border: 5%;
    		  border-radius:5%;
    		  flex-wrap: wrap;
    		  padding: 20px;
    		}

		}
	</style>
	
	<body>
	    <div class="row">
		    <form method='post' action='create_admin.php' enctype='multipart/form-data'></br>
              <div class="junk" id="main2"></br>
    			      <center>
                        <h1><b>Junker Registration Form</b></h1>
                    </center>
    				<label>Junker Information:</label></br>
    					<center><input type="text" placeholder="Enter Firstname" name="fname" required>
    					        <input type="text" placeholder="Enter Lastname"name="lname" required></center></br>
    				<label>Acount Information:</label></br>
    					<center><input type="text" placeholder="Enter Username" name="user" required>
    				            <input type="text" placeholder="Enter Password" name="pass"required></center></br>
    				<label>Shop Information:</label></br>
    				<center>
    				    <select name="shop_id">
        					<?php 
        						require_once('db.php');  
        						$sql = "SELECT * FROM `junkshop`";
        						$result = mysqli_query($conn,$sql);
        						$row = mysqli_fetch_array($result);
        						    while ($row = mysqli_fetch_array(
        								$result,MYSQLI_ASSOC)):; 
        					?>
        						<option value="<?php echo $row["shop_id"];?>">
        							<?php echo $row["shop_name"];?>
        						</option>
        					<?php 
        						endwhile; 
        					?>
    				    </select>
    					<center>
    				    	</br><input type='submit' name='submit' value='Register' class="btn01">
    					</center></br>
            	    </div>
        	</form> </br></br>
    	    <form method='post'action='create_main_admin.php' enctype='multipart/form-data'>
               
				<div class="junk2" id="main1"></br> <center>
                        <h1><b>Main Admin Registration Form</b></h1></br>
                 </center>
				    <label>Acount Information:</label></br></br>
					    <center><input type="text" placeholder="Enter Username" name="user" required></br></br>
				                <input type="text" placeholder="Enter Password" name="pass" required></center></br>
					    <center></br><input type='submit' name='submit' value='Register' class="btn01"></center>
            	</div>
    	    </form> 
    	</div>
    </body>
	
	
	<script>
function myFunction2() {
  var x = document.getElementById("main2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function myFunction1() {
  var x = document.getElementById("main1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
	
	
</html>