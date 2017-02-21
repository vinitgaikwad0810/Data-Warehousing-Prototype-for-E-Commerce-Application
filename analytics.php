<?php

$returnJSON = filter_input(INPUT_POST, "returnJSON");

//extract($returnJSON);
	$returnJSON = json_decode($returnJSON,TRUE);

 extract($returnJSON);


 echo $FactTable;
 echo $Time;
 echo $PaymentMethod;
 echo $ShippingOption;
 echo $Store;
 echo $Region;
 echo $Product;


 

?>