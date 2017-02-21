<?php

$returnJSON = filter_input(INPUT_POST, "returnJSON");

//extract($returnJSON);
	$returnJSON = json_decode($returnJSON,TRUE);


$con = new PDO("mysql:host=localhost;port=3306;dbname=project-226-starSchema","root","");
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 extract($returnJSON);

/*
 echo $FactTable;
 echo $Time;
 echo $PaymentMethod;
 echo $ShippingOption;
 echo $Store;
 echo $Region;
 echo $Product;*/

if ($Time === 'Year') {
	
		$query1 = <<<EOT
	SELECT SUM(INVENTORY.TotalQuantity), Stores.StoreRegion,Products.ProductName, Calander.Year <br>
	FROM INVENTORY ,Calander , Customer , PaymentMethod , ShippingOptions , Products, Stores <br> <br>
    
	WHERE INVENTORY.CalanderKey = Calander.CalanderKey <br>
	AND INVENTORY.ProductKey = Products.ProductKey <br>
	AND INVENTORY.StoreKey = Stores.StoreKey <br> <br>

	AND Calander.Year like '%' <br>
	AND PaymentMethod.PaymentMethodType like '$PaymentMethod' <br>
	AND ShippingOptions.ShippingOption like '$ShippingOption' <br>
	AND Products.ProductName like '$Product' <br> <br>
    
	GROUP BY   Stores.StoreRegion,Products.ProductName, Calander.Year <br>
EOT;

$query_fire = str_replace("<br>","",$query1);

$data = fopen("inventory.tsv", 'w');

$row = array("TotalQuantity", "StoreRegion", "ProductName","Year");
fputcsv($data,$row,chr(9));

$result = $con->query($query_fire)->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
	
	 fputcsv($data, $row,chr(9));
	

}

fclose($data);

$response['query'] = $query1;
header('Content-type: application/json');
echo json_encode($response);

}elseif ($Time === 'Month') {


	$query1 = <<<EOT
		SELECT SUM(INVENTORY.TotalQuantity), Stores.StoreRegion,Products.ProductName, Calander.Month <br>
	FROM INVENTORY ,Calander , Customer , PaymentMethod , ShippingOptions , Products, Stores <br> <br>
    
	WHERE INVENTORY.CalanderKey = Calander.CalanderKey <br>
	AND INVENTORY.ProductKey = Products.ProductKey <br>
	AND INVENTORY.StoreKey = Stores.StoreKey <br> <br>

	AND Calander.Month like '%' <br>
	AND PaymentMethod.PaymentMethodType like '$PaymentMethod' <br>
	AND ShippingOptions.ShippingOption like '$ShippingOption' <br>
	AND Products.ProductName like '$Product' <br> <br>
    
	GROUP BY   Stores.StoreRegion,Products.ProductName, Calander.Month <br>
EOT;

$query_fire = str_replace("<br>","",$query1);

$data = fopen("inventory.tsv", 'w');

$row = array("TotalQuantity", "StoreRegion", "ProductName","Month");
fputcsv($data,$row,chr(9));

$result = $con->query($query_fire)->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
	
	 fputcsv($data, $row,chr(9));
	

}

fclose($data);

$response['query'] = $query1;
header('Content-type: application/json');
echo json_encode($response);

}elseif ($Time === 'Quarter'){

	$query1 = <<<EOT
	SELECT SUM(INVENTORY.TotalQuantity), Stores.StoreRegion,Products.ProductName, Calander.Quarter <br>
	FROM INVENTORY ,Calander , Customer , PaymentMethod , ShippingOptions , Products, Stores <br> <br>
    
	WHERE INVENTORY.CalanderKey = Calander.CalanderKey <br>
	AND INVENTORY.ProductKey = Products.ProductKey <br>
	AND INVENTORY.StoreKey = Stores.StoreKey <br> <br>

	AND Calander.Quarter like '%' <br>
	AND PaymentMethod.PaymentMethodType like '$PaymentMethod' <br>
	AND ShippingOptions.ShippingOption like '$ShippingOption' <br>
	AND Products.ProductName like '$Product' <br> <br>
    
	GROUP BY   Stores.StoreRegion,Products.ProductName, Calander.Quarter <br>
EOT;

$query_fire = str_replace("<br>","",$query1);

$data = fopen("inventory.tsv", 'w');

$row = array("TotalQuantity", "StoreRegion", "ProductName","Quarter");
fputcsv($data,$row,chr(9));

$result = $con->query($query_fire)->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
	
	 fputcsv($data, $row,chr(9));
	

}

fclose($data);

$response['query'] = $query1;
header('Content-type: application/json');
echo json_encode($response);

	
}


 ?>

