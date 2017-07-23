<?php
session_start();
if (!isset($_SESSION['admin'])) {
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
	<link rel="stylesheet" type="text/css" href="customcss/adminpage.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/font-awesome.css">

</head>

<body>
	<div id="wrapper">
		<!--sidebar-->
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<i class="fa fa-user-circle" aria-hidden="true" id="dp"></i>
				<li><a href="#"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
				<li><a href="bookedParties_admin.php"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Booked Parties and Dates</a></li>		
				<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
			</ul>
		</div>

		<!--page content-->

		<div id="page-content-wrapper">
				<nav class="navbar navbar-default navbar-fixed-top" role="Navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<a href="#" class="navbar-brand btn btn-link" id="menu-toggle">ChildrenParty4U&nbsp;&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>				
						</div>

						<div class="collapse navbar-collapse" id="mainNavBar">
							<ul class="nav navbar-nav">
								<li><a>Admin Dashboard</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a style="font-size: 18px; color: #18bc9c;">Welcome, <?php echo $_SESSION['admin']; ?></a></li>
							</ul>
						</div>

					</div>
				</nav><br/><br/>
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#insertPartyModal" title="Click to open the form to add new party"><span class="glyphicon glyphicon-plus"></button>
				<br/><br/>

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
										    	<td><?php echo "&pound;".$result['cost_per_child']; ?></td>
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
								<button type="button" name="view" id="<?php echo $result['party_id']; ?>" class="btn btn-success view_data"/><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</button>
								<button type="button" class="btn btn-danger" onclick="deleteparty(<?php echo $result['party_id'];?>)"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</button>
							</div>

					<!--delete party script-->
					<script type="text/javascript">
						
						function deleteparty(del_id){
							if(confirm("Are you sure you want to delete this party type?")){
							window.location.href='deleteParty_admin.php?del_id='+del_id+'';
							return true;
							}
						}
					</script>
						
						</div>
					</div>

					
				</div>
			<?php 
			} ?>

				<!--ADDParty Modal-->

				<div id="insertPartyModal" class="modal fade" tabindex="-1" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
								<h3 class="modal-title">Add Party</h3>
							</div>

							<div class="modal-body">
								<div class="row">
									<form name="addParty" action="addParty_admin.php" method="post" enctype="multipart/form-data">
										<div class="row form-group">
											<div class="col-sm-12">
												<label>Type</label>
												<input type="text" name="ptitle" id="pt_title" class="form-control" placeholder="Party Type" required="" autofocus=>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-sm-12">
												<label>Description</label>
												<textarea name="description" class="form-control" cols="50" rows="3" placeholder="Description of the party..." required=""></textarea>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-sm-12">
												<label>Cost Per Child</label>
												<input type="number" min="1" step=".01" name="cost" id="cost" class="form-control" placeholder="Cost per Child" required="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-sm-12">
												<label>Length of the Party</label>
												<input type="number" min="60" max="300" name="length" id="length" class="form-control" placeholder="Length of the party in minutes" required="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-sm-12">
												<label>Max no. of Children</label>
												<input type="number" min="5" max="50" name="max" id="max" class="form-control" placeholder="Maximum number of children" required="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-sm-12">
												<label>Services/Products</label>
												<textarea name="services" class="form-control" cols="50" rows="3" placeholder="Products/Services..." required=""></textarea>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-sm-12">
												<label>Party Image</label>
												<input type="file" name="party_img" id="image" class="form-control" required="">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-sm-12">												
											<button type="submit" name="addbtn" id="btnAdd" class="btn btn-info btn-block"><span class="glyphicon glyphicon-saved"></span>&nbsp;ADD</button>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span>&nbsp;Close</button>
							</div>						
						</div>
					</div>
				</div>

				<!--Update Party Modal-->

				<div id="updatePartyModal" class="modal fade" tabindex="-1" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
								<h3 class="modal-title">Update Party</h3>
							</div>

							<div class="modal-body" id="party_detail">
								
							</div>	

							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span>&nbsp;Close</button>
							</div>
						</div>
				 	</div>
				</div>

			</div>
		</div>
	</div>


<!--add party message-->
	<?php 
		if (isset($_GET['added'])) {?>
			<script type="text/javascript">
				alert("Successfully added !!!");
			</script>
	<?php } ?>

	<?php 
		if (isset($_GET['erroradd'])) {?>
			<script type="text/javascript">
				alert("Error adding the record !!!");
			</script>
	<?php } ?>

	<?php 
		if (isset($_GET['invalid'])) {?>
			<script type="text/javascript">
				alert("Invalid file format !!!");
			</script>
	<?php } ?>

	<!--update party message-->
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

	<!--delete party message-->

	<?php 
		if (isset($_GET['delete'])) { ?>
			<script type="text/javascript">
				alert("Successfully deleted !!!");
			</script>		
	<?php } ?>

	 <?php 
		if (isset($_GET['errordelete'])) { ?>
			<script type="text/javascript">
				alert("Error deleting the record !!!");
			</script>		
	<?php } ?>


	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!--Menu toggle-->

	<script type="text/javascript">
		$("#menu-toggle").click(function(e){
			e.preventDefault();
			$("#wrapper").toggleClass("menuDisplayed");
		});
	</script>

	<!--update modal data view-->
	<script type="text/javascript">
		$(document).ready(function(){
			$('.view_data').click(function(){
				var party_id=$(this).attr("id");

				$.ajax({
					url:"updateParty_admin.php",
					method:"post",
					data:{partyId:party_id},
					success:function(data){
						$('#party_detail').html(data);
						$('#updatePartyModal').modal("show");
					}
				});
				
			});
		});
	</script>

</body>
</html>
