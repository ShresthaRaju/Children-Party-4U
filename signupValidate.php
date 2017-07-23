<?php 

include("config.php");

if (isset($_GET['client'])) {
	$clientname=$_GET['client'];
	$sql="select * from tbl_users where username='$clientname'";
	$query=mysqli_query($connect,$sql);
	$rows=mysqli_fetch_array($query);

	if ($rows[0]) {
		echo "Username already exists";
	}
}

 ?>