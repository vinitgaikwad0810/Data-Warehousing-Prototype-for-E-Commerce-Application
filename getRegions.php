 
 <?php

session_start();

?>

 <?php 
 		$customerid = $_SESSION['customerId'];
 		
		$con = new PDO("mysql:host=localhost;port=3306;dbname=project-226-relational","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,

		PDO::ERRMODE_EXCEPTION);
		
		$query1 = "SELECT Region FROM Regions";


$result = $con->query($query1)->fetchAll(PDO::FETCH_ASSOC);

$return = [];
$i = 0;
foreach ($result as $row) {
	$return[$i] = $row['Region'];
    $i++;
   }


header('Content-type: application/json');
echo json_encode($return);
?>