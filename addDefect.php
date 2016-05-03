
 <?php

session_start();

?>

 <?php 

 		
 		$finalArr = filter_input(INPUT_POST, 'finalArr');
 		
 		$temp = json_decode($finalArr,TRUE);
 		$con = new PDO("mysql:host=173.194.111.48;port=3306;dbname=codeblooded","root","cmpe226");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);

 		try {
	 		$CustomerId = $temp['cId'];
	 		$StoreId = $temp['sId'];
			$ProductId = $temp['pId'];
			$Quantity = $temp['qty'];

			$query = "insert into DefectsFound (`DFTime`,  `DFDate`, `NoOfItems`, `ProductId`, `StoreId`, `CustomerId`) values
			 (curtime(), curDate(), $Quantity,  $ProductId, $StoreId, $CustomerId)";
			echo $query;
			$con->query($query);
		
		}
		catch (PDOException $ex)
		{
			echo 'ERROR: '.$ex->getMessage();
		}

?>