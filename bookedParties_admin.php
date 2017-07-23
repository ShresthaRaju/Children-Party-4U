<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header("location:index.php?notloggedin=login first");
}
?>

<?php  
include("config.php");
$viewAllbooking="SELECT b.*, p.party_type, u.username FROM tbl_booking AS b, tbl_parties AS p, tbl_users AS u WHERE b.party_type = p.party_id AND b.booked_by=u.user_id";
$query=mysqli_query($connect,$viewAllbooking);
$row=1;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width", initial-scale="1">
	<title>Children Party4U | Admin</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="'http://fonts.googleapis.com/css?family=Junction'">
	<link rel="stylesheet" type="text/css" href="customcss/adminpage.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/font-awesome.css">

</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">Booked Parties</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>S.N.</th>
										<th>Party Type</th>
										<th>Cost Per Child</th>
										<th>Total Children</th>
										<th>Total Cost</th>
										<th>Booked Date</th>
										<th>Booked By</th>											
									</tr>
								</thead>

								<?php 
									$data=mysqli_num_rows($query);
										if ($data==0) { ?>
											<td colspan="7" class="text-danger text-center"><?php echo "No party has been booked yet !!!"; ?></td>
								<?php } else{
											while ($result=mysqli_fetch_array($query)) { ?>
											<tbody>
												<tr>
													<td><?php echo $row++; ?></td>
													<td><?php echo $result['party_type']; ?></td>
													<td><?php echo $result['cost_per_child']; ?></td>
													<td><?php echo $result['total_children']; ?></td>
													<td><?php echo $result['total_cost']; ?></td>
													<td><?php echo $result['booked_date']; ?></td>
													<td><?php echo $result['username']; ?></td>
												</tr>
								<?php } } ?>				
										</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<?php include("calendar.php"); ?>
		</div>	
	</div>

</body>
</html>