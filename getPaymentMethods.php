 <?php 
 		
		$con = new PDO("mysql:host=localhost;port=3306;dbname=project-226-relational","root","");
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
echo json_encode($return);
?>