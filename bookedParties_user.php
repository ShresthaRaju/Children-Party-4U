<?php
session_start();
if (!isset($_SESSION['standard'])) {
	header("location:index.php?notloggedin=login first");
}else{
	$user_id=$_SESSION['user_id'];
}
?>

<?php  
include("config.php");
$viewMyBooking="SELECT b.*, p.party_type,u.email FROM tbl_booking AS b, tbl_parties AS p, tbl_users AS u WHERE b.party_type = p.party_id AND b.booked_by=u.user_id AND b.booked_by=$user_id";
$query=mysqli_query($connect,$viewMyBooking);
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
	<link rel="stylesheet" type="text/css" href="customcss/userpanel.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/font-awesome.css">

</head>

<body>

<div class="container-fluid">
	<div class="row">			
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">Parties you have booked</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>S.N.</th>
									<th>Party Type</th>
									<th>Cost Per Child</th>
									<th>Total Children</th>
									<th>Total Cost</th>
									<th>Booked Date</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>

							<?php 
									$data=mysqli_num_rows($query);
										if ($data==0) { ?>
											<td colspan="7" class="text-danger text-center"><?php echo "You have not booked any party yet !!!"; ?></td>
								<?php } else{
											while ($result=mysqli_fetch_array($query)) { 
												$to=$result['email']; 
												$party_type=$result['party_type'];
												$total_cost=$result['total_cost'];
												$booked_date=$result['booked_date'];

												?><!--for sending email-->
											<tbody>
												<tr>
													<td><?php echo $row++; ?></td>
													<td><?php echo $result['party_type']; ?></td>
													<?php 
										    		if(isset($_GET['currency'])){
										    			$price=$result['cost_per_child'];
														$currency_to_convert = $_GET['currency'];
														?>
														<td><?php echo convertCurrency($price, "GBP", $currency_to_convert);?></td>
															<?php }
													else{?>
														<td><?php echo $result['cost_per_child'];?></td>
														<?php } ?>
													
													<td><?php echo $result['total_children']; ?></td>
													<?php 
										    		if(isset($_GET['currency'])){
										    			$price=$result['total_cost'];
														$currency_to_convert = $_GET['currency'];
														?>
														<td><?php echo convertCurrency($price, "GBP", $currency_to_convert);?></td>
															<?php }
													else{?>
														<td><?php echo $result['total_cost'];?></td>
														<?php } ?>
													
													<td><?php echo $result['booked_date']; ?></td>
													<td><button type="button" name="view" id="<?php echo $result['booking_id']; ?>" class="btn btn-info btn-xs view_bookingData"/><span class="glyphicon glyphicon-pencil"></span></button></td>
													<td><button type="button" class="btn btn-danger btn-xs" onclick="deleteBooking(<?php echo $result['booking_id'];?>)"><span class="glyphicon glyphicon-trash"></span></button></td>
												</tr>
								<?php } } ?>				
											</tbody>
						</table>

					</div>

					<!--delete booking script-->
					<script type="text/javascript">
						
						function deleteBooking(del_id){
							if(confirm("Are you sure you want to delete this booking?")){
							window.location.href='deleteBooking_user.php?del_id='+del_id+'';
							return true;
							}
						}
					</script>
				</div>

				<div class="panel-footer">	
					<a href="userPanel.php" class="btn btn-link">Home</a>
				</div>
			</div>
		</div>

			<?php include ("calendar.php"); ?>

	</div>
</div>

<!--booking Update Modal-->

				<div id="bookingUpdateModal" class="modal fade" tabindex="-1" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
								<h3 class="modal-title">Update Your Booking</h3>
							</div>

							<div class="modal-body" id="booking_detail">
								
							</div>	

							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span>&nbsp;Close</button>
							</div>
						</div>
				 	</div>
				</div>

<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<!--user booking data view-->
	<script type="text/javascript">
		$(document).ready(function(){
			$('.view_bookingData').click(function(){
				var booking_id=$(this).attr("id");

				$.ajax({
					url:"userBookingUpdate.php",
					method:"post",
					data:{booking_id:booking_id},
					success:function(data){
						$('#booking_detail').html(data);
						$('#bookingUpdateModal').modal("show");
					}
				});
				
			});
		});
	</script>

	<!--display list of months-->
	<script type="text/javascript">
		var months = ["January", "February", "March","April", "May", "June","July", "August", "September","October", "November", "December"];
		function getMonths() {
		    var date = new Date();
		    var currentyear = date.getFullYear();
			var currentmonth=date.getMonth(); //starts from 0 i.e 0=January
			var useryear=document.getElementById("year").value;
			var monthoptions="<option value=''>Choose month</option>";
			
			if(currentyear==useryear){
				for(var i=(currentmonth);i<12;i++){
				monthoptions += "<option value='"+(i+1)+"'>"+months[i]+"</option>"
		 		}
			}
			else{
				for(var i=1;i<=12;i++){
				monthoptions += "<option value='"+i+"'>"+months[i-1]+"</option>"
				}
	  		}
			
			document.getElementById('months').innerHTML=monthoptions;

		};
	</script>

	<!--display list of days for the selected month-->

	<script type="text/javascript">
	//gives the number of days in the month-->
		function daysInMonth(month,year) {
    		return new Date(year, month, 0).getDate();
		};

		function getDays() {
			var date = new Date();
			var currentyear = date.getFullYear();
			var currentmonth=date.getMonth()+1; //starts from 0 i.e 0=January
			var currentdate=date.getDate();
			var uyear=document.getElementById("year").value;
			var umonth=document.getElementById("months").value;
			var daysoptions="<option value=''>Choose day</option>";
			if (currentyear==uyear && currentmonth==umonth) {
				for(var d=currentdate;d<=daysInMonth(umonth,uyear);d++){
				daysoptions += "<option value='"+d+"'>"+d+"</option>"	
				}

			}
			else{
				for(var d=1;d<=daysInMonth(umonth,uyear);d++){
				daysoptions += "<option value='"+d+"'>"+d+"</option>"	
				}
			}	 
			
			document.getElementById('days').innerHTML=daysoptions;
	};
	</script>

	<!--check if date to be booked already exists [ajax]-->
	<script type="text/javascript">
		function checkDate(){
			var year=document.bookingUpdateForm.year.value;
			var month=document.bookingUpdateForm.months.value;
			var day=document.bookingUpdateForm.days.value;
			var date=year+"-"+month+"-"+day;
			//alert(date);
			var req= new XMLHttpRequest(); 
			req.onreadystatechange=function(){
				if (req.readyState==4 && req.status==200) {				
					document.getElementById('dateExist').innerHTML=req.responseText; 
				}
			}
			req.open("GET","bookPartyValidate.php?booking_date="+date,true); 
			req.send();
		};
	</script>


	<!--calculate total cost of the party-->
	<script type="text/javascript">
		function calcuateTotal() {
			var cpc=document.getElementById("bp_cost").value;
    		var total_children = document.getElementById("bp_children").value;
    		var total_cost=cpc*total_children;
    		document.getElementById("total_cost").value=total_cost;

    		return total_cost;
		}
	</script>

	<!--convert currency-->
	<script type="text/javascript">

		function pickPrice(){
			var price=calcuateTotal();
			var to_currency=document.bookingUpdateForm.currency.value;
			var req= new XMLHttpRequest(); 
			req.onreadystatechange=function(){
				if (req.readyState==4 && req.status==200) {				
					document.getElementById('total_cost').value=req.responseText; 
				}
			}
		req.open("GET","grabPrice.php?price="+price+"&to_currency="+to_currency,true); 
		req.send();
		}
	</script>

	<!--update booking message-->
	 <?php 
		if (isset($_GET['updated'])) {?>
			<script type="text/javascript">
				alert("Successfully updated !!!");
			</script>
	<?php } ?>

	<?php 
		if (isset($_GET['errorupdate'])) {?>
			<script type="text/javascript">
				alert("Failed to update !!!");
			</script>
	<?php } ?>

	<!--date exists already-->
	 <?php 
		if (isset($_GET['dateexist'])) { ?>
			<script type="text/javascript">
				alert("Date not available. Please select a new date !!!");
			</script>
	<?php	}
	 ?>

	 <!--sending email-->
	<?php 

		if (isset($_GET['booking'])) { ?>

		<script type="text/javascript">
			alert("You have successfully booked the party !!!");
		</script>
			<?php
				$subject = "Children Party4U party booking Confirmation";
				$message = "Party Type : ".$party_type;
				$message .= "Total Cost : ".$total_cost;
				$message .= "Date Booked : ".$booked_date;
				$header = "From :childrenparty4u@gmail.com \r\n";
				$header .= "Cc :afgh@somedomain.com \r\n"; 
				$header .= "MIME-Version : 1.0\r\n"; 
				$header .= "Content-type : text/html\r\n"; 
				$retval = mail ($to,$subject,$message,$header);

				if ($retval) {
					echo "Email sent successfully ....";
				}else{
					echo "Failed to sent the message ...";
				}
			
				 }	?>

	 
	 <!--delete booking message-->

	<?php 
		if (isset($_GET['delete'])) { ?>
			<script type="text/javascript">
				alert("Successfully deleted !!!");
			</script>		
	<?php } ?>

	 <?php 
		if (isset($_GET['errordelete'])) { ?>
			<script type="text/javascript">
				alert("Error deleting the booking !!!");
			</script>		
	<?php } ?>



</body>
</html>
