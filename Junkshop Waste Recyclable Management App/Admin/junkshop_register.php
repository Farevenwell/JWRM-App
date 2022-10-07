
<?php
		include("nav.php");
?>

<!DOCTYPE html>
	<link rel="stylesheet" href="scripts/css/admin.css">
	<link rel="stylesheet" href="scripts/css/style.css">
	<style>
	body {font-family: Arial, Helvetica, sans-serif;
          background: url(images/HOME_BACK.jpg);
          background-repeat: cover;
          background-size: auto;
            }

		/* Increase the font size of the h1 element */
		.header h1 {
		  font-size: 40px;
		}

		/* Create two unequal columns that sits next to each other */
		/* Sidebar/left column */
		.side {
		  margin-top:1%;
		  border-style: solid;
		  padding: .4%;
		  margin-right:.7%;
		  border-radius:5%;
		}

		/* Main column */
		.main {   
		  flex: 50%; 
		  padding: 20px;
		}
		
		  .button {   
		  border-radius:5%;
		  margin-top:1%;
		  
		  }
		  .row {   
		  display: flex;
		  border-radius:5%;
		  margin-left:1%;
		  }
		/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 100%) {
		body {font-family: Arial, Helvetica, sans-serif;
              background: url(images/HOME_BACK.jpg);
              background-repeat: no-repeat;
              background-size: auto;
		    }
        		
    		/* Column container */
    	.row {  
    		  display: flex;
    		  border-radius:5%;
    		  flex-wrap: wrap;
    		  flex: 55%; 
    		  padding: 15px;
    		}
		}
	</style>
	
	    <body>
		    <div class="row">
		        <div class="side"> 
			   	<form method='post' action='create_junkshop.php' enctype='multipart/form-data'>
        			    <center><h1>Shop Registration Form</h1></center>
					    <label>Junkshop Info:</label>
								<input type="text" placeholder="Enter Junkshop Name" name="shop_name" required></br>
								<input type="text" placeholder="Enter Junkshop Owner"name="shop_owner"required>
						    	<input type="text" placeholder="Enter Contact Number" name="shop_num"required></center></br>
						<label>Account Info:</label></br>
							    <input type="text" placeholder="Enter Junkshop Username"name="user"required>
								<input type="text" placeholder="Enter Junkshop Password"name="pass"required>
								</br>
					    <label>Shop Banner:<input type="file" name="image" id="file" required></label>
							</br>
						<label>Location Info:</label></br>
								<input type="text" placeholder="Enter Latitude" name="latitude"required>
								<input type="text" placeholder="Enter Longitude" name="longitude"required>
								</br>
						<label>Address Info:</label></br>
								<input type="text" placeholder="Enter Street" name="street"required>
								<input type="text" placeholder="Enter Brgy" name="brgy"required>
								</br>
								        <input type="text" placeholder="Enter City" name="city"required>
								        <input type="text" placeholder="Enter Province" name="province"required>
    	            <center>
    	             <input type='submit' name='submit' value='Register' class="button">
    	        </form>	
        	</div> <div class="main"> 
            		<center>
        				<?php
        					include('view.php');
        				?>
        		    </center>
			    </div>
	    </body>
</html>
