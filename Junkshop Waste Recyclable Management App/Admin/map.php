
<!DOCTYPE html>
	<title>Junk Waste Recycling and Management</title>
	<link rel="stylesheet" href="admin.css">
	<link href="images/favicon.jfif" rel="icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="scripts/css/bootstrap.min.css">
	<link rel="stylesheet" href="scripts/css/style.css">
	<script src="scripts/js/jquery.min.js"></script>
	<script src="scripts/js/popper.min.js"></script>
	<script src="scripts/js/bootstrap.min.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<!-- Leaflet CSS CDN-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
	integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
	crossorigin=""/>
	
	<!-- Leaflet Javascript CDN-->
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
	
	<!-- Leaflet GEOLOCATION CSS CDN-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.css" />
	<!-- Leaflet GEOLOCATION JS CDN-->
	<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
</head>
	<style>body {font-family: Arial, Helvetica, sans-serif;
		  background:  url("images/HOME_BACK.jpg") no-repeat fixed center;
         background-size: 100%;
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
		  radius: 5px;
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
		  	
		.header {
		  padding: 80px;
		  text-align: center;
		  background: #1abc9c;
		  color: white;
		}

		.header h1 {
		  font-size: 40px;
		}

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
		@media screen and (max-width: 400px) {
		  .navbar a {
			float: none;
			width:100%;
		  }
		}
	</style>
	</head>
	<body>
        <center>
            <header>
                <h1>Junk Waste Recycling and Management System</h1>
            </header>
        </center>
  <div class="navbar">
          <a href="index.html" class="active">Home</a>
        </div>
				<div id="map" class="container-fluid" style="position:fixed;">	
			<h1><center><b>Ozamis City Junkshops Locations</center></h1></br>
			   
					<script>
						<!-- MAP INITIALIZATION-->
						var mymap = L.map('map').setView([8.1477,123.841],16);
						
						<!-- MAP Layer-->
						var myapi = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
							attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
						})
						myapi.addTo(mymap);
					
						//POPUP MARKER FOR JUNKSHOPS

						var customOptions =
						{
							'maxWidth': '250',
							'className' : 'custom'
						}
						
						//SHOP MARKER ICON
						var shopicon = L.icon({
							iconUrl: 'images/shopicon.png',
							iconSize: [40, 40],
							iconAnchor: [23, 40]
						});
						
		$.get("https://jwrm01.000webhostapp.com/api/junkshops.php?",function(data){
								
								var shop = JSON.parse(data);
								for (let i = 0; i < shop.length; i++) {				
								
									var popup = L.popup({
										closeOnClick: true
									}).setContent('<img src=shop_images/'+shop[i].img+' style="width: 100%; height: 100px;">' +'</br><h5><span><i class="bx bxs-home"></i> '+shop[i].shopname+'</h5>');
									
									L.marker([shop[i].latitude, shop[i].longitude], {icon: shopicon}).bindPopup(popup,customOptions).addTo(mymap); 
								
								}
						});
					
					</script>
			</div>
		</div>
		<div id="id01" class="modal">
           <form class="modal-content animate" action="check_user.php" method="post">
                <div class="container">
                    <div class="imgcontainer">
                       <img src="images/login.png" alt="Avatar" class="avatar">
                    </div>
                        <h1><center><b>Login Form</b></center></h1>  
                            <div class="form-group">
                                <label for="username" class="">Username</label>
                                    <center>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                                    </center>
                            </div>
                            
                            <div class="form-group mb-4">
                                <label for="password" class="">Password</label>
                                    <center>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                                    </center>
                            </div>
                                    <center>
                                        <input name="login" id="login" class="btn btn-primary" type="submit" value="Login">
                                    </center>
                
                            <div class="container" style="background-color:#f1f1f1">
                              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                            </div>
             
                </div>
            </form>
        </div>
	</body>
</html>
