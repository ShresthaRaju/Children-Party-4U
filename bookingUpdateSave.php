<?php

	if (isset($_POST['updatebtn'])) {
		include("config.php");
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
			header("location:bookedParties_user.php?dateexist=already");
		}
		else{

		$update_booking="Update tbl_booking set booked_date='$date',total_children='$tchildren', total_cost='$tcost' where booking_id= '".$_POST['bId']."'";
		$update_query=mysqli_query($connect,$update_booking);

		if ($update_query) {
			header("location:bookedParties_user.php?updated=successful");
		}else{
			header("location:bookedParties_user.php?errorupdate=Unsuccessful");
		}

	}
}
 ?>