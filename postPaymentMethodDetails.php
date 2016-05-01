
 <?php

session_start();

?>

 <?php 

 		
		$customerid = $_SESSION['customerId'];
 		$finalArr = filter_input(INPUT_POST, 'finalArr');
 		
 		$temp = json_decode($finalArr,TRUE);
 		

 		$length = count($temp);
		
 		$con = new PDO("mysql:host=localhost;port=3306;dbname=project-226-relational","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);

 		for($i = 0; $i<$length;$i++)
 		{
 		try {
 		$PaymentMethodDetails = $temp[$i]['pd'];
		$PaymentMethodType = $temp[$i]['pt'];


		$query = "insert into PaymentMethods (`PaymentMethodDetails`, `CustomerId`, `PaymentMethodType`) values ('$PaymentMethodDetails', '$customerid', '$PaymentMethodType')";
		echo $query;
		$con->query($query);
		
		}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}
 		
 		}

?>