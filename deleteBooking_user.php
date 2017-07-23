<?php 
	include 'config.php';

	$del_booking = "DELETE from tbl_booking where booking_id='".$_GET['del_id']."'";
	$del_query=mysqli_query($connect,$del_booking);

	header('location:bookedParties_user.php?delete=sucessfull');

?>