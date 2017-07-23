<?php

$server="localhost";
$hostuser="root";
$hostpassword="";
$db_name="children_party4u";

$connect=mysqli_connect($server,$hostuser,$hostpassword,$db_name) or die("Failed to connect to the database...".mysqli_connect_error());

?>