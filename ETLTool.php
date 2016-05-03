
 <?php

session_start();

?>

 <?php 

 		$con = new PDO("mysql:host=173.194.111.48;port=3306;dbname=codeblooded","root","cmpe226");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);

 		try {

			$query = "CALL `codeblooded`.`sp_etl_defects_fact`(); CALL `codeblooded`.`sp_etl_order_fact`();
				CALL `codeblooded`.`sp_etl_inventory_fact`();";
			
			$con->query($query);
			
		}
		catch (PDOException $ex)
		{
			echo 'ERROR: '.$ex->getMessage();
		}

?>