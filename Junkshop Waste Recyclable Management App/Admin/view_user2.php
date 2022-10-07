
<?php
		include("nav.php");
	?>

<!DOCTYPE html>
	<link rel="stylesheet" href="scripts/css/admin.css">
	<style>
	body {font-family: Arial, Helvetica, sans-serif;
		  background:  url("images/HOME_BACK.jpg") no-repeat;
		  position:cover;
         background-size: 100%;
    }
		.btn01{
		    background: #baffc9;
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
		.row {  
		  display: flex;
		  flex-wrap: wrap;
		  flex: 55%; 
		  padding: 20px;
		  background:  url("images/HOME_BACK.jpg") ;
		}

		/* Create two unequal columns that sits next to each other */
		/* Sidebar/left column */
		.side {
		  flex: 33.3%;
		  padding: 20px;
		}

		/* Main column */
		.main {   
		  flex: 33.3%; 
		  padding: 20px;
		}
		/* Main column */
		.main2 {   
		  flex: 33.3%; 
		  padding: 20px;
		}
		
		/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 700px) {
		  .row {   
			flex-direction: column;
		  }
		
		*{padding:0;margin:0;}


	.float{
		position:fixed;
		top:10%;
		height:30px;
		right:40px;
		color:#FFF;
		border-radius:50px;
		}

	button{
		width:10%;
		height:10%;
			}
	.my-float{
			margin-top:2%;
		}
		/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 100%) {
		 body {font-family: Arial, Helvetica, sans-serif;
            }
        		
        .btn01{
			width: 100%;
			background: #baffc9;
			}

		/* Column container */
		.row {  
		  display: flex;
		  flex-wrap: wrap;
		  flex: 55%; 
		  padding: 20px;
		}

		}
	</style>
	
	
		
	</head>   
	<body>
		<div class="row">
			    <div class="side"> 
    			    <center>
        				<?php
        					include('view_main.php');
        				?>
        		    </center>
			    </div>
        		<div class="main"> 
            		<center>
        				<?php
        					include('view_main_ad.php');
        				?>
        		    </center>
			    </div>
		</div>
	</body>
</html>