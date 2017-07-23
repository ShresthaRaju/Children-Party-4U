<?php 
if (isset($_GET['price']) && isset($_GET['to_currency'])) {
	include("currencyConverter.php");
	$price=$_GET['price'];
	$to_curr=$_GET['to_currency'];

	echo convertCurrency($price, "GBP", $to_curr);
}
else{
	echo "0";
}
 ?>
