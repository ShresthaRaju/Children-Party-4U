<?php 

if (isset($_GET['booking_date'])) {
	include("config.php");
	$booking_date=$_GET['booking_date'];

	$sql="select * from tbl_booking where booked_date='$booking_date'";
	$query=mysqli_query($connect,$sql);
	$rows=mysqli_fetch_array($query);

	if ($rows[0]) {
		echo "Date not available";
	}
}

 ?>