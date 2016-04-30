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
    <title>Orders | E-Shopper</title>
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

<?php
	$phoneId = filter_input(INPUT_POST, "phones");
	$accId = filter_input(INPUT_POST, "acc");
	$planId = filter_input(INPUT_POST, "plan");
	$corId = filter_input(INPUT_POST, "cor");
	$stdId = filter_input(INPUT_POST, "std");
	$customerid = $_SESSION['customerId'];
	

	try {
		$con = new PDO("mysql:host=localhost;port=3306;dbname=codeblooded","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		
		$query1 = "SELECT max(CAST(OrderId as int)) FROM orders";
		$data = $con->query($query1);
        $orderid =  $data->fetchColumn();
		if($orderid!=null){
			$orderid = (int)$orderid;
			$orderid = $orderid + 1;
		}else
			$orderid=1;
	
		//echo "THe customer id to be inserted is $custid";
		
		$query1 = "insert into orders (`orderid`,`customerid`) values ('$orderid', '$customerid')";
		$con->query($query1);

		//phones
		 $q1 = "SELECT itemtypeid FROM itemtype where ITemTypeDetailId=1 and Itemid=$phoneId";
		 $data = $con->query($q1);
         $itemtypeid_ph =  $data->fetchColumn();
     //    echo " <br>-------Phone $itemtypeid_ph";

         //accessories
		 $q1 = "SELECT itemtypeid FROM itemtype where ITemTypeDetailId=2 and Itemid=$accId";
		 $data = $con->query($q1);
         $itemtypeid_acc =  $data->fetchColumn();
      //  echo " -------Acc $itemtypeid_acc";

        //Plan
        $query1 ="";
        if($planId==1)//Standard
        	$query1 = "SELECT plansid FROM plans where plantypedetailid= $planId and plansitemId= $stdId";
        else //Corporate
        	$query1 = "SELECT plansid FROM plans where plantypedetailid= $planId and plansitemId= $corId";

		$data = $con->query($query1);
        $planid_itemid =  $data->fetchColumn();

		 $q1 = "SELECT itemtypeid FROM itemtype where ITemTypeDetailId=3 and Itemid=$planid_itemid" ;
		 $data = $con->query($q1);
         $itemtypeid_plan =  $data->fetchColumn();
     //   echo " <br>Plan------- $itemtypeid_plan";
		
        $query1 = "SELECT max(CAST(orderitemid as int)) FROM orderitem";
        //SELECT max(CAST(OrderId as int)) FROM orders
		$data = $con->query($query1);
		$orderitemid = $data->fetchColumn(); 
		//echo "<br> Order Item id prev is  ".$orderitemid;
		if($orderitemid!=null){

			++$orderitemid;
		}else
			$orderitemid=1;

		
		//Phone
		$query1 = "insert into orderitem (`orderitemid`,`orderid`,`itemtypeid`) values ('$orderitemid','$orderid', '$itemtypeid_ph')";
	//	echo "<br> phone query -- $query1";
		$con->query($query1);
		
		$orderitemid++;
		//Acc
		$query1 = "insert into orderitem (`orderitemid`,`orderid`,`itemtypeid`) values ('$orderitemid','$orderid', '$itemtypeid_acc')";
		$con->query($query1);
		$orderitemid++;
		//Plan
		$query1 = "insert into orderitem (`orderitemid`,`orderid`,`itemtypeid`) values ('$orderitemid','$orderid', '$itemtypeid_plan')";
		$con->query($query1);

		

	}
	catch (PDOException $ex)
	{
		echo 'ERROR: '.$ex->getMessage();
		echo 'ERROR: '.$ex->getLine();
	}
	?>
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
							<h1>Your Orders</h1>
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
<!--<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Points</th>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td> 
    <td>94</td>
  </tr>
</table>-->

<?php
	try{
		echo "<table style='width:100%'><thead><tr>";
		echo "<th>DESCRIPTION     </th><th>MODEL NUMBER</th><th>COST</th>";
		echo "</tr></thead><tbody>";
		
		//Phones
		$query1 ="select PhoneDescription, PhoneModel, Cost from orders o inner join orderitem oi on o.OrderId = oi.OrderId inner join itemtype it on oi.ItemTypeId = it.ItemTypeId inner join itemtypedetail itd on itd.ItemTypeDetailId = it.ItemTypeDetailId inner join phones p on it.ItemId = p.PhoneId where itd.ItemTypeDetailDesc='Phones' and o.orderId=$orderid";
		
		
		foreach ($con->query($query1) as $row){
	
		echo "<tr><td>".$row["PhoneDescription"]."</td><td>".$row["PhoneModel"]."</td><td>".$row["Cost"]."</td></tr>";
		}
													

		

		

		//Accessories

		$query1 ="select AccessoriesDesc, AccessoriesId, Cost from orders o inner join orderitem oi on o.OrderId = oi.OrderId inner join itemtype it on oi.ItemTypeId = it.ItemTypeId inner join itemtypedetail itd on itd.ItemTypeDetailId = it.ItemTypeDetailId inner join accessories a on it.ItemId = a.AccessoriesId where itd.ItemTypeDetailDesc='Accessories' and o.orderId=$orderid";
		
		
		foreach ($con->query($query1) as $row){
	
		echo "<tr><td>".$row["AccessoriesDesc"]."</td><td>".$row["AccessoriesId"]."</td><td>".$row["Cost"]."</td></tr>";
		}
													

	
													

		

		 if($planId==1)//Standard
        	$query1 = "select plantypedetaildesc ,ptd.plantypeDetailId, Cost from orders o inner join orderitem oi on o.OrderId = oi.OrderId inner join itemtype it on oi.ItemTypeId = it.ItemTypeId inner join itemtypedetail itd on itd.ItemTypeDetailId = it.ItemTypeDetailId inner join plans pl on it.ItemId = pl.PlansId inner join plantypedetail ptd on pl.PlanTypeDetailId = ptd.PlanTypeDetailId inner join standardplan sp on pl.PlansItemId = sp.StandardPlanId where itd.ItemTypeDetailDesc='Plan' and ptd.PlanTypeDetailDesc = 'StandardPlan' and o.orderId=$orderid";
        else //Corporate
        	$query1 = "select plantypedetaildesc ,ptd.plantypeDetailId, Cost from orders o inner join orderitem oi on o.OrderId = oi.OrderId inner join itemtype it on oi.ItemTypeId = it.ItemTypeId inner join itemtypedetail itd on itd.ItemTypeDetailId = it.ItemTypeDetailId inner join plans pl on it.ItemId = pl.PlansId inner join plantypedetail ptd on pl.PlanTypeDetailId = ptd.PlanTypeDetailId inner join standardplan sp on pl.PlansItemId = sp.StandardPlanId where itd.ItemTypeDetailDesc='Plan' and ptd.PlanTypeDetailDesc = 'CorporatePlan' and o.orderId=$orderid";

        	foreach ($con->query($query1) as $row){
	
				echo "<tr><td>".$row["plantypedetaildesc"]."</td><td>".$row["plantypeDetailId"]."</td><td>".$row["Cost"]."</td></tr>";
				}








        	echo "</tbody></table>";

		}catch (PDOException $ex){
		echo 'ERROR: '.$ex->getMessage();
		echo 'ERROR: '.$ex->getLine();
	}



?>

</div>
<br> <br><br><br><br><br> <br><br><br><br>

<div align="center">
<button type="button" onclick="location.href='login.html';">Logout</button>
</div>
<p>
	

</p>




</body>
</html>
