
<?php

session_start();

?>

<?php 

		$email = filter_input(INPUT_POST, "email");
		$pass = filter_input(INPUT_POST, "pass");
		$con = new PDO("mysql:host=localhost;port=3306;dbname=project-226-relational","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		$query1 = "SELECT customerId FROM Customer where emailid= '" . $email . "' and password = '" . $pass . "'";
		
  try{
		$res=$con->query($query1);
			
		if(($custid = $res->fetchColumn())>0){
			
					$_SESSION['customerId']=$custid;
					echo "Session Id: " . $_SESSION['customerId'];
					header("Location: products.html");
					//header("Location: getProducts.php");
			}else{
				header("Location: login.html");
		}
	}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}
	
	//echo "Session Id: " . $_SESSION['customerId'];
?>