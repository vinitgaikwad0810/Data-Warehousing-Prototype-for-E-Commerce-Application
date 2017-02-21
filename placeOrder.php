
 <?php

session_start();

?>

 <?php 

 		//{"region":"SC","shippingType":"Australia Post","cost":590,"paymentMethodDetailsId":"10"}
 		//$region, $shippingType, $paymentMethodDetailsId;

 		$con = new PDO("mysql:host=localhost;port=3306;dbname=project-226-relational","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);


		$customerid = $_SESSION['customerId'];
 		$arr = filter_input(INPUT_POST, 'arr');
 		$productsInCart = filter_input(INPUT_POST, 'productsInCart');
 		
 		$decode_arr = json_decode($arr,TRUE);
 		$decode_productsInCart = json_decode($productsInCart,TRUE);

 		echo ($productsInCart);
 		echo ($arr);

 		$length_productsInCart = count($decode_productsInCart);

 		extract($decode_arr);
 		echo($region);


 		//insert in shipping
 		try {
 		
		$query = "insert into Shipping (`ShippingDate`, `DaysToDeliver`, `ShipmentOwner`, `ShipmentCost`, `ShippingOptionsType`, `SourceRegion`, `DestinationRegion`) values (CURDATE(), '7', 'Phonizon', '10', '$shippingType', 'CA', '$region')";
		echo $query;
		$con->query($query);
		$ShippingId = $con->lastInsertId();

		echo($ShippingId);		
		
		}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}

	//insert in orders
	try {
 		
		$query = "insert into Orders (`CustomerId`, `ShippingId`, `PaymentMethodId`) values ('$customerid','$ShippingId', '$paymentMethodDetailsId')";
		echo $query;
		$con->query($query);
		$OrderId = $con->lastInsertId();

		echo($OrderId);		
		
		}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}
 		
 		




 		//insert products
 	for($i = 0; $i<$length_productsInCart;$i++)
 		{
 		try {
 		$productId = $decode_productsInCart[$i]['productId'];
		$productCost = $decode_productsInCart[$i]['productCost'];

		

		$query = "insert into OrderItem (`OTime`, `ODate`, `Quantity`, `Cost`, `ProductId`, `OrderId`) values (CURTIME(), CURDATE(), 1, '$productCost', '$productId', '$OrderId')";
		echo $query;
		$con->query($query);
		
		}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}
 		
 		}

?>