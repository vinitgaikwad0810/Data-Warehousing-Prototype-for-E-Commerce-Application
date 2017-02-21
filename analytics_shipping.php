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
SELECT SUM(SHIPPING.DollarsRevenue), ShippingOptions.ShippingOption, Region.Region, Calander.Year <br>
	FROM SHIPPING ,Calander , Customer , PaymentMethod , ShippingOptions , Region <br> <br>

	WHERE SHIPPING.CalanderKey = Calander.CalanderKey <br>
	AND SHIPPING.DestinationRegionKey = Region.RegionKey <br>
    AND SHIPPING.SourceRegionKey = Region.RegionKey <br>
    AND SHIPPING.ShippingOptionKey = ShippingOptions.ShippingOptionKey <br>
	AND Calander.Year like '%' <br>
	AND ShippingOptions.ShippingOption like '$ShippingOption' <br> <br>
 
	GROUP BY ShippingOptions.ShippingOption, Region.Region, Calander.Year <br>
EOT;

$query_fire = str_replace("<br>","",$query1);

$data = fopen("shipping.tsv", 'w');

$row = array("DollarsRevenue", "ShippingOption", "Region","Year");
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
SELECT SUM(SHIPPING.DollarsRevenue), ShippingOptions.ShippingOption, Region.Region, Calander.Month <br>
	FROM SHIPPING ,Calander , Customer , PaymentMethod , ShippingOptions , Region <br> <br>

	WHERE SHIPPING.CalanderKey = Calander.CalanderKey <br>
	AND SHIPPING.DestinationRegionKey = Region.RegionKey <br>
    AND SHIPPING.SourceRegionKey = Region.RegionKey <br>
    AND SHIPPING.ShippingOptionKey = ShippingOptions.ShippingOptionKey <br>
	AND Calander.Month like '%' <br>
	AND ShippingOptions.ShippingOption like '$ShippingOption' <br> <br>
 
	GROUP BY ShippingOptions.ShippingOption, Region.Region, Calander.Month <br>
EOT;

$query_fire = str_replace("<br>","",$query1);
$data = fopen("shipping.tsv", 'w');

$row = array("DollarsRevenue", "ShippingOption", "Region","Month");
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
SELECT SUM(SHIPPING.DollarsRevenue), ShippingOptions.ShippingOption, Region.Region, Calander.Quarter <br>
	FROM SHIPPING ,Calander , Customer , PaymentMethod , ShippingOptions , Region <br> <br>

	WHERE SHIPPING.CalanderKey = Calander.CalanderKey <br>
	AND SHIPPING.DestinationRegionKey = Region.RegionKey <br>
    AND SHIPPING.SourceRegionKey = Region.RegionKey <br>
    AND SHIPPING.ShippingOptionKey = ShippingOptions.ShippingOptionKey <br>
	AND Calander.Quarter like '%' <br>
	AND ShippingOptions.ShippingOption like '$ShippingOption' <br> <br>
 
	GROUP BY ShippingOptions.ShippingOption, Region.Region, Calander.Quarter <br>
EOT;

$query_fire = str_replace("<br>","",$query1);

$data = fopen("shipping.tsv", 'w');

$row = array("DollarsRevenue", "ShippingOption", "Region","Quarter");
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

