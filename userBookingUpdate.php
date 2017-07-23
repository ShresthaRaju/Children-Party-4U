<?php 
if (isset($_POST['booking_id'])) {
	$output='';
	include("config.php");
	$query="SELECT b.*, p.party_type,p.max_children FROM tbl_booking AS b, tbl_parties AS p WHERE b.party_type = p.party_id and b.booking_id='".$_POST['booking_id']."'";
	$result=mysqli_query($connect,$query);
	$output .= '<div class="row">
					<form name="bookingUpdateForm" action="bookingUpdateSave.php" method="post" enctype="multipart/form-data">';

	while ($row=mysqli_fetch_array($result)) {
		$date=$row['booked_date'];
		$splitted=explode("-",$date);
		$year=$splitted[0];
		$month=$splitted[1];
		$day=$splitted[2];
		$output .='
					<div class="row form-group">
						<div class="col-sm-12">
							<input type="hidden" name="bId" id="bp_id" class="form-control" value="'.$row["booking_id"].'">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-12">
							<label>Type</label>
								<input type="text" name="ptitle" id="bp_title" class="form-control" readonly value="'.$row["party_type"].'">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-12">
							<label>Cost Per Child</label>
								<input type="text" name="cost" id="bp_cost" class="form-control" readonly value="'.$row["cost_per_child"].'">
						</div>
					</div>

					<div class="row form-group">
							<div class="col-sm-12"><label>Choose your date</label></div>
							<div class="col-lg-4">	
								<select id="year" name="year" class="form-control" onchange="getMonths()" required autofocus>
								  <option value="'.$year.'">'.$year.'</option>
								  <option value="">Choose year</option>
								  <option value="2017">2017</option>
								  <option value="2018">2018</option>
								  <option value="2019">2019</option>
								  <option value="2020">2020</option>
								</select>
							</div>

							<div class="col-lg-4">
								<select id="months" name="months" class="form-control" onchange="getDays()" required>
								<option value="'.$month.'">'.$month.'</option>
								</select>
							</div>

							<div class="col-lg-4">
								<select id="days" name="days" class="form-control" onchange="checkDate()" required>
								<option value="'.$day.'">'.$day.'</option>
								</select>
								<span id="dateExist" style="color: red"></span>
							</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-12">
							<label>Total number of Children</label>
								<input type="number" min="5" max="'.$row["max_children"].'" name="total_children" id="bp_children" class="form-control" value="'.$row["total_children"].'" required onkeyup="calcuateTotal()" onclick="calcuateTotal()">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-6">
							<label>Total Cost</label>
								<input type="text" name="total_cost" id="total_cost" class="form-control" value="'.$row["total_cost"].'" readonly>
						</div>

						<div class="col-sm-6">
							<label>Convert Currency</label>
								<select name="currency" class="form-control" onchange="pickPrice()">
									<option value="GBP">POUND</option>
									<option value="USD">AMERICAN DOLLAR</option>
									<option value="EUR">EURO</option>
								</select>
						</div>
						
					</div>

					<div class="row form-group">
						<div class="col-sm-12">												
							<button type="submit" name="updatebtn" id="btnUpdate" class="btn btn-success btn-block"><span class="glyphicon glyphicon-check"></span>&nbsp;UPDATE</button>
						</div>
					</div>
		';
	}
	$output .= "</form></div>";
	echo $output;

	$query1="UPDATE tbl_booking set booked_date=' ' where booking_id='".$_POST['booking_id']."'";
	$result1=$result=mysqli_query($connect,$query1);
}
 ?>