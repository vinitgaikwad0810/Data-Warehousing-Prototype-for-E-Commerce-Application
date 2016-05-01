 <?php 
 	$productType = filter_input(INPUT_POST, "productType");
 		
		$con = new PDO("mysql:host=localhost;port=3306;dbname=project-226-relational","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,

		PDO::ERRMODE_EXCEPTION);
		if($productType == "Phone")
			{
				$productType = 'PH';
			}
			else
			{
				$productType = 'AC';
			}
		$query1 = "SELECT productId, productName, productCost, productURL FROM products where productType = '$productType'";


$result = $con->query($query1)->fetchAll(PDO::FETCH_ASSOC);

$return = [];
foreach ($result as $row) {
    $return[] = [ 
        'productId' => $row['productId'],
        'productName' => $row['productName'],
        'productCost' => $row['productCost'],
        'productURL' => $row['productURL']
    ];
}
$return1 = array("phones"=>$return);

header('Content-type: application/json');
echo json_encode($return1);
?>