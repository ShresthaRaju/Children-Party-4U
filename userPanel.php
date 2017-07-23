<?php
session_start();
if (!isset($_SESSION['standard'])) {
	header("location:index.php?notloggedin=login first");
}
?>

<?php  
include("config.php");
$sql="Select * from tbl_parties";
$query=mysqli_query($connect,$sql);
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

	<div id="wrapper">
		<!--sidebar-->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<i class="fa fa-user-circle" aria-hidden="true" id="dp"></i>
				<li><a href="bookedParties_user.php"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Your Parties and Dates</a></li>		
				<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
			</ul>
		</div>

		<!--page content-->

		<div id="page-content-wrapper">
				<nav class="navbar navbar-default navbar-fixed-top" role="Navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<a href="#" class="navbar-brand btn btn-link" id="menu-toggle">ChildrenParty4U&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>				
						</div>

						<div class="collapse navbar-collapse" id="mainNavBar">
							<ul class="nav navbar-nav">
								<li><a href="#">User Dashboard</a></li>
							</ul>

							<ul class="nav navbar-nav navbar-right">
								<li><a style="font-size: 18px; color: #18bc9c;">Welcome, <?php echo $_SESSION['standard']; ?></a></li>
							</ul>
						</div>

					</div>
				</nav>
				<br/><br/>

				<div class="row">
					<div class="col-md-4">
						<div class="panel panel-danger">
							<div class="panel-heading">
								Currency Converter <?php include("currencyConverter.php") ?>
							</div>
							<div class="panel-body">
								<form method="" action="">
									<div class="input-group">
										<select name="currency" class="form-control">
											<option value="GBP">POUND</option>
											<option value="USD">AMERICAN DOLLAR</option>
											<option value="EUR">EURO</option>
										</select>
										<span class="input-group-btn">
					                    <button type="submit" class="btn btn-primary" type="button">Convert</button></span>
					                 </div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<?php 
				while ( $result=mysqli_fetch_array($query)) {	
				 ?>
				<div class="row">
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php echo $result['party_type']; ?>
							</div>

							<div class="panel-body">
								<img src="partyPhotos/<?php echo $result['image_name']; ?>" class="img-responsive img-thumbnail" alt="<?php echo $result['party_type']." Party Image"; ?>">
								<h3>Party Details</h3>
								<div class="table-responsive">            
									<table class="table table-striped">
									 	
									      	<tr>
										        <td class="heading">Type</td>
										        <td><b><?php echo $result['party_type']; ?></b></td>
										    </tr>

										    <tr>
										    	<td class="heading">Description</td>
										    	<td><?php echo $result['description']; ?></td>
										    </tr>

										    <tr>
										    	<td class="heading">Cost Per Child</td>
										    	<?php 
										    		if(isset($_GET['currency'])){
										    			$price=$result['cost_per_child'];
														$currency_to_convert = $_GET['currency'];
														?>
														<td><?php echo $currency_to_convert." ".convertCurrency($price, "GBP", $currency_to_convert);?></td>
															<?php }
													else{?>
														<td id="costpc"><?php echo "&pound;".$result['cost_per_child'];?></td>
														<?php } ?>
										    </tr>

										    <tr>
										    	<td class="heading">Length of the Party</td>
										    	<td><?php echo $result['length']." minutes"; ?></td>
										    </tr>

										    <tr>
										    	<td class="heading">Maximum Children</td>
										    	<td><?php echo $result['max_children']; ?></td>
										    </tr>

										    <tr>
										    	<td class="heading">Services</td>
										    	<td><?php echo $result['services']; ?></td>
										    </tr>
									</table>
								</div>
							</div>

							<div class="panel-footer">
								<button type="button" name="view" id="<?php echo $result['party_id']; ?>" class="btn btn-info book_view"/><span class="glyphicon glyphicon-send"></span>&nbsp;BOOK NOW</button>
							</div>
						
						</div>
					</div>
					
				</div>
			<?php 
			} ?>

			
				<!--Book Now Modal-->

				<div id="booknowModal" class="modal fade" tabindex="-1" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
								<h3 class="modal-title">BOOK THE PARTY NOW</h3>
							</div>

							<div class="modal-body" id="book_details">
								
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span>&nbsp;Close</button>
							</div>
						</div>
					</div>
				</div>

		</div>

		
	</div>

<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
	
	<!--Menu toggle-->

	<script type="text/javascript">
		$("#menu-toggle").click(function(e){
			e.preventDefault();
			$("#wrapper").toggleClass("menuDisplayed");
		});
	</script>

	<!--book modal data view-->
	<script type="text/javascript">
		$(document).ready(function(){
			$('.book_view').click(function(){				
				var party_id=$(this).attr("id");

				$.ajax({
					url:"bookParty_user.php",
					method:"post",
					data:{partyId:party_id},
					success:function(data){
						$('#book_details').html(data);
						$('#booknowModal').modal("show");
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
			var year=document.bookPartyForm.year.value;
			var month=document.bookPartyForm.months.value;
			var day=document.bookPartyForm.days.value;
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
			var to_currency=document.bookPartyForm.currency.value;
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

	 <!--date exists already-->
	 <?php 
		if (isset($_GET['dateexist'])) { ?>
			<script type="text/javascript">
				alert("Date not available. Please select a new date !!!");
			</script>
	<?php	}
	 ?>

	 
</body>
</html>
