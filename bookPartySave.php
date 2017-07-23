<?php
session_start();
if (isset($_SESSION['standard']) && isset($_POST['bookbtn']) ) {
	$user_id=$_SESSION['user_id'];

		include("config.php");
		$party_type=$_POST['pId'];
		$cpc=$_POST['cost'];
		$year=$_POST['year'];
		$month=$_POST['months'];
		$day=$_POST['days'];
		$tchildren=$_POST['total_children'];
		$tcost=$_POST['total_cost'];

		$date=$year."-".$month."-".$day;

		$sql="select * from tbl_booking where booked_date='$date'";
		$query=mysqli_query($connect,$sql);
		$rows=mysqli_fetch_array($query);
		if ($rows[0]) {
			header("location:userPanel.php?dateexist=already");
		}
		else{
			$insert_sql="Insert into tbl_booking values ('','$party_type','$cpc','$date','$tchildren','$tcost','$user_id')";
			$insert_query=mysqli_query($connect,$insert_sql);

			if ($insert_query) {
			header("location:bookedParties_user.php?booking=successfull");
			}
		}
}
else{
	header("location:index.php?notloggedin=login first");
}

 ?>