<?php

	if (isset($_POST['editbtn'])) {
		include("config.php");
		$title=$_POST['ptitle'];
		$desc=$_POST['description'];
		$cpc=$_POST['cost'];
		$len=$_POST['length'];
		$maxch=$_POST['max'];
		$serv=$_POST['services'];

		$update_sql="Update tbl_parties set party_type='$title', description='$desc', cost_per_child='$cpc', length='$len', max_children='$maxch', services='$serv' where party_id= '".$_POST['pId']."'";
		$update_query=mysqli_query($connect,$update_sql);

		if ($update_query) {
			header("location:admin.php?updated=successful");
		}else{
			header("location:admin.php?errorupdate=Unsuccessful");
		}

	}

 ?>