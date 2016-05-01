
 <?php

session_start();

?>
 <?php 

 		$myfile = fopen("echoLog.txt", "w") or die("Unable to open file!");
		$customerid = $_SESSION['customerId'];
 		$finalArr = filter_input(INPUT_POST, 'finalArr');
 		
 		$temp = json_decode($finalArr,TRUE);
 		fwrite($myfile, $customerid);
 		fwrite($myfile, $temp);
 		fclose($myfile);

 		/*$length = count($finalArr);
		fwrite($myfile, $length);

 		for($i = 0; $i<$length;$i++)
 		{
 		try {
		$con = new PDO("mysql:host=localhost;port=3306;dbname=project-226-relational","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		
		$PaymentMethodDetails = $finalArr[$i]['pd'];
		$PaymentMethodType = $finalArr[$i]['pt'];


		$query = "insert into PaymentMethods (`PaymentMethodDetails`, `CustomerId`, `PaymentMethodType`) values ('$PaymentMethodDetails', '$customerid', '$PaymentMethodType')";
		//echo $query;
		//echo "<br>";

		$con->query($query);
		
		}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}
 		fclose($myfile);
 		}*/


	/*		$con = new PDO("mysql:host=localhost;port=3306;dbname=project-226-relational","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE,

		PDO::ERRMODE_EXCEPTION);
		
		$query1 = "SELECT PaymentMethodType FROM PaymentMethodTypes";


$result = $con->query($query1)->fetchAll(PDO::FETCH_ASSOC);

$return = [];
$i = 0;
foreach ($result as $row) {
	$return[$i] = $row['PaymentMethodType'];
    $i++;
   }


header('Content-type: application/json');
echo json_encode($return);*/




/*
curl -H "Content-Type: application/json" -X POST -d {"finalArr":{"0":{"pt":"mastercard","pd":"scf"},"1":{"pt":"netbanking","pd":"css"}}} http://localhost:80/Eshopper/postPaymentMethodDetails.php
*/
?>