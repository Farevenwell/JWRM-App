 <?php
		include("nav.php");
	?>	
<!DOCTYPE html>
	<link rel="stylesheet" href="scripts/css/admin.css">
	<style>
	body {font-family: Arial, Helvetica, sans-serif;
		  background:  url("images/HOME_BACK.jpg") no-repeat fixed center;
         background-size: 100%;
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
		  background:  url("images/HOME_BACK.jpg") no-repeat fixed center;
		  padding: 20px;
		}

		/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
		@media screen and (max-width: 100%) {
		  .navbar a {
			float: none;
			width:100%;
		  }
		}
	</style>
	<body>
		<div id="map" class="container-fluid" style="position:fixed;">	
			   
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
									}).setContent('<img src=shop_images/'+shop[i].img+' style="width: 100%; height: 100px;">' +'</br><h5><span><i class="bx bxs-home"></i>'+shop[i].shopname+'</h5>');
									
									L.marker([shop[i].latitude, shop[i].longitude], {icon: shopicon}).bindPopup(popup,customOptions).addTo(mymap); 
								
								}
						});
					
					</script>
		</div>
	</body>
</html>