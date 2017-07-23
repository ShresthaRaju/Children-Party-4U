<?php 
	include 'config.php';

	$del_sql = "DELETE from tbl_parties where party_id='".$_GET['del_id']."'";
	$del_query=mysqli_query($connect,$del_sql);

	header('location:admin.php?delete=sucessfull');

?>
