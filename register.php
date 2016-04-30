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
	
<p>
	<?php
	$name = filter_input(INPUT_POST, "name");
	$email = filter_input(INPUT_POST, "email");
	$password = filter_input(INPUT_POST, "password");
	$street = filter_input(INPUT_POST, "street");
	$city = filter_input(INPUT_POST, "city");
	$state = filter_input(INPUT_POST, "state");
	$country = filter_input(INPUT_POST, "country");
	$zipcode = filter_input(INPUT_POST, "zipcode");
	$hphone =filter_input(INPUT_POST, "hphone");
	$ophone = filter_input(INPUT_POST, "ophone");
	$pphone = filter_input(INPUT_POST, "pphone");
	
	

	echo "<h4><span style=\"margin-left:30px;\">Thank you $name for registering</span> <a href=\"login.html\">Login</a></h4>";

	try {
		$con = new PDO("mysql:host=localhost;port=3306;dbname=project-226-relational","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		
		
		$query = "insert into customer (`customername`, `emailid`, `street`, `city`, `state`, `country`, `zipcode`, `password`) values ('$name', '$email', '$street', '$city', '$state', '$country', '$zipcode', '$password' )";
		//echo $query;
		//echo "<br>";

		$con->query($query);
		$custid = $con->lastInsertId();
		
		if($hphone != null)
		{
		$query4 = "insert into customerphonenumber (`phonenumber`, `customerid`) values ('$hphone', '$custid')";
		$con->query($query4);	
		}
		if($pphone != null)
			{
		$query2 = "insert into customerphonenumber (`phonenumber`, `customerid`) values ('$pphone', '$custid')";
		$con->query($query2);	
		}
		if($ophone != null)
			{
		$query3 = "insert into customerphonenumber (`phonenumber`, `customerid`) values ('$ophone', '$custid')";
		$con->query($query3);	
		}
		}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
	}
	
	?>

</p>
</body>
</html>
