<?php
    header('Access-Control-Allow-Origin: *');
    header('Conten-Type: application/json');

	include ("dbconnection.php");
    $values = $_REQUEST['sellvalue'];
    $item = $_REQUEST['sellitem'];
    $totalearn;

    
    for ($x = 0; $x < count($item); $x++) {
        
            $result =$conn->query("SELECT sell_items.*, junkshop.* FROM sell_items INNER JOIN junkshop WHERE item_price=( SELECT MIN(sell_items.item_price) FROM sell_items WHERE sell_items.item_name='$item[$x]') AND sell_items.shop_id = junkshop.shop_id AND sell_items.item_name='$item[$x]';") ;      
            if (!$result) die($conn->error);
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
             
                    (float) $itemtotal = $row['item_price'];
                    (float) $total = $itemtotal *  (float) $values[$x];
                    $shopid = $row['shop_id'];
                    $shopname = $row['shop_name'];
                    (float) $totalearn = $totalearn + $total;
                    
                    $convert ="";
                    
                    if($row['unit'] == 'per kilo'){
                        $convert = "kilo";
                    }else{
                        $convert = "each";
                    }
                    
                    
                    echo "<h6><b>".$item[$x]."</b> <span><a onclick='coord2(".$row['latitude'].",".$row['longitude'].")' style='float:right; font-size: 13px; text-decoration: underline;'><i class='bx bx-map'></i>View map</a></span></h6>";
                    echo "<p style='margin: 0; font-size: 12px;'><b>" .$shopname. "</b> - &#8369;" .number_format($itemtotal,2). " (".$row['unit'].")</p>";
                    echo "<p style='font-size: 12px;'><span>Qty: ".$values[$x]."</span><b style='float: right;'>Expenses: &#8369;".number_format($total,2). "</b></p>";
                    break;
            } 
        
    }   
    echo "<p style='text-align: right;text-decoration: overline;'><b>Estimated Total Expense: &#8369;".number_format($totalearn,2)."</b></p>"; 
    
       
	$conn->close();
    

?>