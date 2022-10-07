<?php
    header('Access-Control-Allow-Origin: *');
    
	    $shopid = $_REQUEST['shopid'];
	    $addid = $_REQUEST['addid'];
		$itemname = $_REQUEST['itemname'];
		$price = $_REQUEST['price'];
		$unit = $_REQUEST['unit'];
		include("dbconnection.php");
						
	    //PATH TO STORE THE UPLOADED IMAGE
        $array1 = array("none","Puthaw/Iron", "Bronze", "Aluminum" , "Cans" , "Plastics" , "Mineral Bottles" , "Kulafu" , "Tanduay Jr/Sr" , "Tanduay Long Neck", "Tubo/Puthaw", "Karton/Carton", "Copper","Sin/Steel Roof"); 
        $array2 = array("RRR.png","Iron.jpg", "Bronze.jpg", "Aluminum.jpg" , "Can.jpg" , "Plastics.jpg" , "PBottles.png" , "Kulafu.jpg" , "TanduayJr.jpg" , "TanduayLN.png", "Tubo.jpg", "Carton.jpg","Copper.png","Yero.jpg");
        
        $value="";
        $image="";
        
        foreach($array1 as $item)
        {
            if($item == "$itemname"){
                $value = array_search($item, $array1);
            }
        }
        if($value == ""){
            $image = "RRR.png";
            $sql = "INSERT INTO sell_items (item_name, item_price, unit, image, shop_id)
            VALUES ('$itemname', '$price','$unit','$image','$shopid')";
            if ($conn->query($sql) === TRUE) {
                echo "Success";
            }else{
                echo "Failed";
            }
            
        }else{
            $image = $array2[$value];
    
            $sql = "INSERT INTO sell_items (item_name, item_price, unit, image, shop_id)
            VALUES ('$itemname', '$price','$unit','$image','$shopid')";
            if ($conn->query($sql) === TRUE) {
                echo "Success";
            }else{
                echo "Failed";
            }
        }
		$conn->close();
?>
