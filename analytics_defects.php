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
SELECT SUM(DEFECTS.NoOfItems),  Products.ProductName,Products.ProductVendor, Calander.Year <br>
FROM DEFECTS ,Calander , Customer , PaymentMethod , ShippingOptions , Products, Stores <br> <br>

WHERE DEFECTS.CalanderKey = Calander.CalanderKey <br>
AND DEFECTS.ProductKey = Products.ProductKey <br>
AND DEFECTS.StoreKey = Stores.StoreKey <br>
AND Calander.Year like '%' <br>
AND Products.ProductName like '$Product' <br> <br>

GROUP BY Products.ProductName,Products.ProductVendor, Calander.Year <br>
EOT;

$query_fire = str_replace("<br>","",$query1);

$data = fopen("defects.tsv", 'w');

$row = array("NoOfItems", "ProductVendor", "ProductName","Year");
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
	SELECT SUM(DEFECTS.NoOfItems),  Products.ProductName,Products.ProductVendor, Calander.Month <br>
FROM DEFECTS ,Calander , Customer , PaymentMethod , ShippingOptions , Products, Stores <br> <br>

WHERE DEFECTS.CalanderKey = Calander.CalanderKey <br>
AND DEFECTS.ProductKey = Products.ProductKey <br>
AND DEFECTS.StoreKey = Stores.StoreKey <br>
AND Calander.Month like '%' <br>
AND Products.ProductName like '$Product' <br> <br>

GROUP BY Products.ProductName,Products.ProductVendor, Calander.Month <br>
EOT;

$query_fire = str_replace("<br>","",$query1);

$data = fopen("defects.tsv", 'w');

$row = array("NoOfItems", "ProductVendor", "ProductName","Month");
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
SELECT SUM(DEFECTS.NoOfItems),  Products.ProductName,Products.ProductVendor, Calander.Quarter <br>
FROM DEFECTS ,Calander , Customer , PaymentMethod , ShippingOptions , Products, Stores <br> <br>

WHERE DEFECTS.CalanderKey = Calander.CalanderKey <br>
AND DEFECTS.ProductKey = Products.ProductKey <br>
AND DEFECTS.StoreKey = Stores.StoreKey <br>
AND Calander.Quarter like '%' <br>
AND Products.ProductName like '$Product' <br> <br>

GROUP BY Products.ProductName,Products.ProductVendor, Calander.Quarter <br>
EOT;

$query_fire = str_replace("<br>","",$query1);


$data = fopen("defects.tsv", 'w');

$row = array("NoOfItems", "ProductVendor", "ProductName","Quarter");
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

