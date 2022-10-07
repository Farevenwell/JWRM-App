<?
require_once('auto_logout.php');
?>
	<link rel="stylesheet" href="scripts/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="scripts/js/popper.min.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- Leaflet CSS CDN-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
	integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
	crossorigin=""/>
	
	<!-- Leaflet Javascript CDN-->
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
	</script>
	<!-- Leaflet GEOLOCATION CSS CDN-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.css" />
	<!-- Leaflet GEOLOCATION JS CDN-->
	<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.js" charset="utf-8">
	</script>



<!DOCTYPE html>
<html>
    <style>
        #navbar {
          overflow: hidden;
          background-color: #333;
          width:110%;
        }
        .topnav {
          overflow: hidden;
          background-color: #333;
          width:100%;
        }
        
        .topnav a {
          float: left;
          display: block;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }
        
        .topnav a:hover {
          background-color: #ddd;
          color: black;
        }
        
        .topnav a.active {
          background-color: #04AA6D;
          color: white;
        }
        
        .topnav .icon {
          display: none;
        }
        
        @media screen and (max-width:900px) {
          .topnav a:not(:first-child) {display: none;}
          .topnav a.icon {
            float: right;
            display: block;
          }
        }
        
        @media screen and (max-width: 900px) {
          .topnav.responsive {position: relative;}
          .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
          }
          .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
          }
        #topnav a {
          float: left;
          display: block;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }
        
        #topnav a:hover {
          background-color: #ddd;
          color: black;
        }
        
        #topnav a.active {
          background-color: #04AA6D;
          color: white;
        }
	body {font-family: Arial, Helvetica, sans-serif;
		  background:  url("images/HOME_BACK.jpg");
    }
	
		#map{
			height: 100%;
			width: 100%;
			position: center;
		}
		
		.custom.leaflet-popup-content-wrapper{
			width: 250%;
			height: 70%;
			
		}


		/* Center the image and position the close button */
		.imgcontainer {
		  text-align: center;
		  margin: 24px 0 12px 0;
		  position: relative;
		}
		
		img.avatar {
		  width: 20%;
		  border-radius: 50%;
		}
		
		.container {
		  padding: 16px;
		  border-radius: 50%;
		}
		
		span.psw {
		  float: right;
		  padding-top: 16px;
		}
		
		/* The Modal (background) */
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 1; /* Sit on top */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		  padding-top: 60px;
		}
		/* Modal Content/Box */
		.modal-content {
		  background-color: #fefefe;
		  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		  border: 1px solid #888;
		  border-radius: 5px;
		  width: 30%; /* Could be more or less, depending on screen size */
		}
		/* Add Zoom Animation */
		.animate {
		  -webkit-animation: animatezoom 0.9s;
		  animation: animatezoom 0.6s
		}
		
		@-webkit-keyframes animatezoom {
		  from {-webkit-transform: scale(0)} 
		  to {-webkit-transform: scale(1)}
		}
		  
		@keyframes animatezoom {
		  from {transform: scale(0)} 
		  to {transform: scale(1)}
		}	
	.btn01{
			width: 100px;
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

		/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
		@media screen and (max-width: 100%) {
		  .navbar a {
			float: none;
		  }
		}
    </style>
    
	<title>Junk Waste Recycling and Management</title>
	<link href="images/favicon.jfif" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <a class="navbar-brand" img src="images/favicon.jfif" alt="Logo" style="width:50px; height:50px;"></b></a><header><h1><b><center>Junk & Waste Recycling Management System</center></h1></header>
    <div class="topnav" id="myTopnav"><center>
        <a class="active" href="Admin_Home2.php">Home</a>
		<a href="generate_report2.php">Generate Report</a> 
		<a href="javascript:Clickheretoprint()">Print</a>
		<a href="logout.php">Log Out</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i> 
        </a>
    </div>
    <script>
        window.onscroll = function() {myFunction()};
        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;
            
        function myFunction() 
            {
              if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
              } else {
                navbar.classList.remove("sticky");
              }
            }
        function myFunction() 
            {
              var x = document.getElementById("myTopnav");
              if (x.className === "topnav") {
                x.className += " responsive";
              } else {
                x.className = "topnav";
              }
            }
    </script>

</body>
</html>
