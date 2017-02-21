 
 <?php

session_start();

?>

 <?php 
 		$customerid = $_SESSION['customerId'];
 		
		$con = new PDO("mysql:host=localhost;port=3306;dbname=project-226-relational","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,

		PDO::ERRMODE_EXCEPTION);
		
		$query1 = "SELECT PaymentMethodId,PaymentMethodDetails FROM PaymentMethods where  CustomerId = '$customerid'";


$result = $con->query($query1)->fetchAll(PDO::FETCH_ASSOC);

$return = [];
foreach ($result as $row) {
	
		$return[] = [ 
        'PaymentMethodId' => $row['PaymentMethodId'],
        'PaymentMethodDetails' => $row['PaymentMethodDetails']
        ];
   }
$return1 = array("PaymentMethodDetails"=>$return);

header('Content-type: application/json');
echo json_encode($return1);
?>