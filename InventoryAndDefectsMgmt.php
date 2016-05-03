<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

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
							<a href=""><img src="images/home/logo.png" alt="" /></a>
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
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Add Defect</h2>
						<form method="post">
							
							Select Store
							<select name="storesDef">
								  <?php
								  try{
								  		$con = new PDO("mysql:host=173.194.111.48;port=3306;dbname=codeblooded","root","cmpe226");
										$con->setAttribute(PDO::ATTR_ERRMODE,
										PDO::ERRMODE_EXCEPTION);
										$query1 = "SELECT StoreId,Region FROM Stores s, Regions r where s.StoreRegion=r.RegionId";

										foreach ($con->query($query1) as $row){
									
										echo "<option value=" . $row['StoreId'] . ">" . $row['Region'] . "</option>";
										}
									}
									catch (PDOException $ex)
									{
										echo 'ERROR: '.$ex->getMessage();
									}
								?>
							</select>
							Select Product
							<select name="productsDef">
								  <?php
								  echo "Test";
								  try{
								  		$con = new PDO("mysql:host=173.194.111.48;port=3306;dbname=codeblooded","root","cmpe226");
										$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$query1 = "SELECT ProductId,ProductName FROM Products";
										foreach ($con->query($query1) as $row){
									
											echo "<option value=" . $row['ProductId'] . ">" . $row['ProductName'] . "</option>";
										}
									}
									catch (PDOException $ex)
									{
										echo 'ERROR: '.$ex->getMessage();
									}
								?>
							</select>
							Select Customer
							<select name="customerDef">
								  <?php
										$con = new PDO("mysql:host=173.194.111.48;port=3306;dbname=codeblooded","root","cmpe226");
										$con->setAttribute(PDO::ATTR_ERRMODE,
										PDO::ERRMODE_EXCEPTION);
										$query1 = "SELECT CustomerId,CustomerName FROM Customer";
									
								  try{
										foreach ($con->query($query1) as $row){
									
											echo "<option value=" . $row['CustomerId'] . ">" . $row['CustomerName'] . "</option>";
										}
									}
									catch (PDOException $ex)
									{
										echo 'ERROR: '.$ex->getMessage();
									}
								?>
							</select>
							No of Items
							<input type="text" name="quantityDef" placeholder="No of Items" />
							<button type="button" onclick="saveDefect()" class="btn type="button"btn-default">Add</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Add Inventory</h2>
						<form method="post">
							
							Select Store
							<select name="storesInv">
								  <?php
								  try{
								  		$con = new PDO("mysql:host=173.194.111.48;port=3306;dbname=codeblooded","root","cmpe226");
										$con->setAttribute(PDO::ATTR_ERRMODE,
										PDO::ERRMODE_EXCEPTION);
										$query1 = "SELECT StoreId,Region FROM Stores s, Regions r where s.StoreRegion=r.RegionId";

										foreach ($con->query($query1) as $row){
									
										echo "<option value=" . $row['StoreId'] . ">" . $row['Region'] . "</option>";
										}
									}
									catch (PDOException $ex)
									{
										echo 'ERROR: '.$ex->getMessage();
									}
								?>
							</select>
							Select Product
							<select name="productsInv">
								  <?php
								  echo "Test";
								  try{
								  		$con = new PDO("mysql:host=173.194.111.48;port=3306;dbname=codeblooded","root","cmpe226");
										$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$query1 = "SELECT ProductId,ProductName FROM Products";
										foreach ($con->query($query1) as $row){
									
											echo "<option value=" . $row['ProductId'] . ">" . $row['ProductName'] . "</option>";
										}
									}
									catch (PDOException $ex)
									{
										echo 'ERROR: '.$ex->getMessage();
									}
								?>
							</select>
							No of Items
							<input type="text" name="quantityInv" placeholder="No of Items" />
							<button type="button" onclick="saveInventory()" class="btn type="button"btn-default">Add</button>

						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</br>
		</br>
		</br>
			<div class="row">
				<button type="button" onclick="runETL()" class="btn type=" style="width:100%;" button"btn-default">Run ETL Tool</button>
			</div>
		</div>
	</section><!--/form-->
	
	<script>
	runETL = function() {
		var gobal_arr=null;
      	var arr = {};
      	gobal_arr = JSON.stringify(arr);
		console.log(gobal_arr);
		$.ajax({
		      url: 'ETLTool.php',
		      type: 'post',
		      datatype: 'JSON',
		      data: {'finalArr': gobal_arr},
		      success: function(status) {
		         alert(status); 
		    },
		      error: function(xhr, desc, err) {
		         alert("Error"); 
		      }
		    }); 
	}

    saveInventory = function() {
	var gobal_arr=null;
      var arr = {};
      var storesInv = document.getElementsByName('storesInv')[0];
      arr['sId'] = storesInv.options[storesInv.selectedIndex].value;
      var productsInv = document.getElementsByName('productsInv')[0];
      arr['pId'] = productsInv.options[productsInv.selectedIndex].value;
      var quantity= document.getElementsByName('quantityInv')[0];
      arr['qty'] =quantity.value;
		gobal_arr = JSON.stringify(arr);
		console.log(gobal_arr);
		
		 var tmp = "hi";
		 $.ajax({
		      url: 'addInventory.php',
		      type: 'post',
		      datatype: 'JSON',
		      data: {'finalArr': gobal_arr},
		      success: function(status) {
		         alert("Inventory added successfully"); 
		    },
		      error: function(xhr, desc, err) {
		        alert("Error"); 
		      }
		    }); 
    }

    saveDefect = function() {
	var gobal_arr=null;
      var arr = {};
      var customerDef = document.getElementsByName('customerDef')[0];
      arr['cId'] = customerDef.options[customerDef.selectedIndex].value;
      var storesDef = document.getElementsByName('storesDef')[0];
      arr['sId'] = storesDef.options[storesDef.selectedIndex].value;
      var productsDef = document.getElementsByName('productsDef')[0];
      arr['pId'] = productsDef.options[productsDef.selectedIndex].value;
      var quantity= document.getElementsByName('quantityDef')[0];
      arr['qty'] =quantity.value;
		gobal_arr = JSON.stringify(arr);
		console.log(gobal_arr);
		
		 var tmp = "hi";
		 $.ajax({
		      url: 'addDefect.php',
		      type: 'post',
		      datatype: 'JSON',
		      data: {'finalArr': gobal_arr},
		      success: function(status) {
		         alert("Defect added successfully"); 
		    },
		      error: function(xhr, desc, err) {
		        alert("Error"); 
		      }
		    }); 
    }
	</script>

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


</body>
</html>