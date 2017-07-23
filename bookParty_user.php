<?php 
if (isset($_POST['partyId'])) {
	include("config.php");
	$output='';

	$query="Select * from tbl_parties where party_id= '".$_POST['partyId']."'";
	$result=mysqli_query($connect,$query);

	$output .= '<div class="row">
					<form name="bookPartyForm" action="bookPartySave.php" method="post" enctype="multipart/form-data">';

	while ($row=mysqli_fetch_array($result)) {
		$output .='
					<div class="row form-group">
						<div class="col-sm-12">
							<input type="hidden" name="pId" id="bp_id" class="form-control" value="'.$row["party_id"].'">
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
								  <option value="">Choose year</option>
								  <option value="2017">2017</option>
								  <option value="2018">2018</option>
								  <option value="2019">2019</option>
								  <option value="2020">2020</option>
								</select>
							</div>

							<div class="col-lg-4">
								<select id="months" name="months" class="form-control" onchange="getDays()" required></select>
							</div>

							<div class="col-lg-4">
								<select id="days" name="days" class="form-control" onchange="checkDate()" required></select>
								<span id="dateExist" style="color: red"></span>
							</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-12">
							<label>Total number of Children</label>
								<input type="number" min="5" max="'.$row["max_children"].'" name="total_children" id="bp_children" class="form-control" required onkeyup="calcuateTotal()" onclick="calcuateTotal()">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-6">
							<label>Total Cost</label>
								<input type="text" name="total_cost" id="total_cost" class="form-control" readonly>
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
							<button type="submit" name="bookbtn" id="btnBook" class="btn btn-success btn-block"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;BOOK</button>
						</div>
					</div>
		';
	}
	$output .= "</form></div>";
	echo $output;
}
 ?>