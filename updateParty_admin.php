<?php 
if (isset($_POST['partyId'])) {
	$output='';
	include("config.php");
	$query="Select * from tbl_parties where party_id= '".$_POST['partyId']."'";
	$result=mysqli_query($connect,$query);
	$output .= '<div class="row">
					<form name="updatePartyForm" action="updatePartySave.php" method="post" enctype="multipart/form-data">';

	while ($row=mysqli_fetch_array($result)) {
		$output .='
					<div class="row form-group">
						<div class="col-sm-12">
							<input type="hidden" name="pId" id="up_id" class="form-control" required="" value="'.$row["party_id"].'">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-12">
							<label>Type</label>
								<input type="text" name="ptitle" id="up_title" class="form-control" required="" autofocus value="'.$row["party_type"].'">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-12">
							<label>Description</label>
								<textarea name="description" id="up_description" class="form-control" cols="50" rows="3" required="">'.$row["description"].'</textarea>
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-12">
							<label>Cost Per Child</label>
								<input type="number" min="1" step=".01" name="cost" id="up_cost" class="form-control" required="" value="'.$row["cost_per_child"].'">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-12">
							<label>Length of the Party</label>
								<input type="number" min="60" max="300" name="length" id="up_length" class="form-control" required="" value="'.$row["length"].'">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-12">
							<label>Max no. of Children</label>
								<input type="number" min="5" max="50" name="max" id="up_children" class="form-control" required="" value="'.$row["max_children"].'">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-12">
							<label>Services/Products</label>
								<textarea name="services" id="up_services" class="form-control" cols="50" rows="3" required="">'.$row["services"].'</textarea>
						</div>
					</div>

					<div class="row form-group">
						<div class="col-sm-12">												
							<button type="submit" name="editbtn" id="btnEdit" class="btn btn-info btn-block"><span class="glyphicon glyphicon-check"></span>&nbsp;UPDATE</button>
						</div>
					</div>
		';
	}
	$output .= "</form></div>";
	echo $output;
}
 ?>