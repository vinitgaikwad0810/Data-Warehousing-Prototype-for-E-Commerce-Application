<?php

session_start();

?>


<!Doctype html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript">
    	function update(){
    		var e = document.getElementById("plan");
    		if(e.options[e.selectedIndex].value==1){
    			document.getElementById("std").style.display = "block";
    			document.getElementById("cor").style.display = "none";
    		}else{
    			document.getElementById("std").style.display = "none";
    			document.getElementById("cor").style.display = "block";
    		}
    	}
    </script>
</head>

<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> codeblooded@sjsu.edu</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
							<h1>Shop Items</h1>
						</div>
				
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
					</div>
					
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<div style = "margin-left:300px; margin-right:300px">
<form  action = "showorders.php" method = "post">
Select Type of Phone
<select name="phones">
  <?php 

		$con = new PDO("mysql:host=localhost;port=3306;dbname=codeblooded","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		$query1 = "SELECT PhoneDescription,PhoneId,Cost FROM Phones";
	
  try{
		foreach ($con->query($query1) as $row){
	
		echo "<option value=" .$row['PhoneId'] . ">" . $row['PhoneDescription'] . " - USD $" . $row['Cost'] . "</option>";
		}
	}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}
?>
</select>
<br>
<br>
Select Type of Accessory
<select name="acc">
  <?php 
		$con = new PDO("mysql:host=localhost;port=3306;dbname=codeblooded","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		$query1 = "SELECT AccessoriesDesc,AccessoriesId,Cost FROM Accessories";
	
  try{
		foreach ($con->query($query1) as $row){
	
		echo "<option value=" .$row['AccessoriesId'] . ">" . $row['AccessoriesDesc'] . " - USD $" . $row['Cost'] . "</option>";
		}
	}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}
?>
</select>
<br>
<br>
Select Type of Plan
<select name="plan" onchange="update()" id="plan">
  <?php 
		$con = new PDO("mysql:host=localhost;port=3306;dbname=codeblooded","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		$query1 = "SELECT plantypedetailId, plantypedetailDesc FROM Plantypedetail";
	
  try{
		foreach ($con->query($query1) as $row){
	
		echo "<option value=" .$row['plantypedetailId'] . ">" . $row['plantypedetailDesc'] ."</option>";
		}
	}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}
?>
</select>
<br><br>
Plan Details
<select name="std" id="std"> 
  <?php 
		$con = new PDO("mysql:host=localhost;port=3306;dbname=codeblooded","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		$query1 = "SELECT standardplanId, plandesc FROM Standardplan";
	
  try{
		foreach ($con->query($query1) as $row){
	
		echo "<option value=" .$row['standardplanId'] . ">" . $row['plandesc'] ."</option>";
		}
	}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}
?>
</select>
<select name="cor" id="cor" style="display:none;">
  <?php 
		$con = new PDO("mysql:host=localhost;port=3306;dbname=codeblooded","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		$query1 = "SELECT corporateplanId,plandesc FROM corporateplan";
	
  try{
		foreach ($con->query($query1) as $row){
	
		echo "<option value=" .$row['corporateplanId'] . ">" . $row['plandesc'] ."</option>";
		}
	}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}
?>
</select>



<br>
<br>
</div>

<div align="center">
<!--<button style="margin-right:20px" type="button" onclick="location.href='shop.php';">Add to Cart & Continue Shopping</button>
-->
<button type="submit" class="btn btn-default">Place Order</button>

</div>

</form>
</body>
</html>
