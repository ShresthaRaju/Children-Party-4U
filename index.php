<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width", initial-scale="1">
	<title>Children Party4U | Welcome</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="'http://fonts.googleapis.com/css?family=Junction'">
	<link rel="stylesheet" type="text/css" href="customcss/style.css">
	<link rel="stylesheet" type="text/css" href="customcss/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/font-awesome.css">
	
</head>
<body>

	<!--Header and Navigation-->

	<div class="container-fluid bg-overlay">
		<div class="row text-center">		
        	<q>Your children get only one childhood. Make it memorable.</q><br/>
        	<p><span id="quote">- Regina Brett</span></p>
        	<br><br>
        	<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#loginModal">Book Now</button>
		</div>

		<nav class="navbar navbar-inverse navbar-fixed-top" role="Navigation">
			<div class="container-fluid">

			<!--Logo-->

				<div class="navbar-header">
					<a href="#" class="navbar-brand">ChildrenParty4U</a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>				
				</div>

			<!--Menu Items-->

				<div class="collapse navbar-collapse" id="mainNavBar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#services">Services</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="#signupModal" data-toggle="modal" data-target="#signupModal" title="Click to open the sign up form"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="#loginModal" data-toggle="modal" data-target="#loginModal" title="Click to open the login form"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
 					</ul>
				</div>
			</div>
		</nav>
	</div>

	<!--End Header and Navigation-->

	<!--Services-->

	<div class="services" id="services">
		<div class="container">
			<div class="row">
				<h2>Our Services</h2>
				<p>Enjoy these varieties of party from us.</p>
				<div class="col-lg-4 col-md-4">
					<img src="images/pirate.jpg" class="img-circle" alt="Pirate party image">
					<h4>Pirate Party</h4>
					<p>This will be a pirate themed party and will include relevant decorations.</p>
					<div class="details">
						<h4>Details</h4>
						<label>Cost per child :</label> £15.00<br/>
						<label>Length of Party :</label> 90 mins<br/>
						<label>Max Children :</label> 30<br/>
						<label>Products :</label> Pirate customers & face painting.
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<img src="images/bear.jpg" class="img-circle" alt="Build a Bear party image">
					<h4>Build a Bear Party</h4>
					<p>This party will show the children how to make their own bear which they will keep at the end of the party.
					</p>
					<div class="details">
						<h4>Details</h4>
						<label>Cost per child :</label> £30.00<br/>
						<label>Length of Party :</label> 120 mins<br/>
						<label>Max Children :</label> 10<br/>
						<label>Products :</label>  Each child will keep the bear they have made. Optional costumes can be purchased for an additional charge.
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<img src="images/starw.jpg" class="img-circle" alt="Star Wars Party image">
					<h4>Star Wars</h4>
					<p>This party will have a Star Wars theme.</p>
					<div class="details">
						<h4>Details</h4>
						<label>Cost per child :</label> £15.00<br/>
						<label>Length of Party :</label> 90 mins<br/>
						<label>Max Children :</label> 15<br/>
						<label>Products :</label>  Each child will receive a StarWars gift as their party prize.
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--End Services-->

	<!--Contact form-->

	<div class="contact" id="contact">
		<div class="container">
			<div class="row">
				<h2>Contact</h2>
				<p>Please fill in the following form in order to contact us.</p>
				<div class="col-lg-6 col-md-6">
					<div class="input-group input-group-lg">
                      	<span class="input-group-addon">
                        	<i class="glyphicon glyphicon-user"></i>
                      	</span>
                      	<input type="text" class="form-control" placeholder="Full Name"></input>
                    </div>
                    <div class="input-group input-group-lg">
                      	<span class="input-group-addon">
                        	<i class="glyphicon glyphicon-envelope"></i>
                      	</span>
                      	<input type="text" class="form-control" placeholder="you@email.com"></input>
                    </div>
                    <div class="input-group input-group-lg">
                      	<span class="input-group-addon">
                        	<i class="glyphicon glyphicon-earphone"></i>
                      	</span>
                      	<input type="text" class="form-control" placeholder="Phone Number"></input>
                    </div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="input-group">
						<textarea class="form-control" cols="80" rows="5" placeholder="What would you like to say us..."></textarea>
					</div>
					<button class="btn btn-lg">Submit</button>
				</div>
			</div>
		</div>
	</div>

	<!--End contact form-->

	<!--Signup and Login Form-->

	<div class="container">

		<!--Signup Form-->
		<div id="signupModal" class="modal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Sign Up</h3>
					</div>

					<div class="modal-body">
						<div class="row">
							<form name="signupForm" action="signupSave.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
								<div class="row form-group">
									<div class="col-xs-6 col-sm-6">
										<input type="text" name="firstname" id="first-name" class="form-control" placeholder="First Name" required autofocus>
									</div>
									<div class="col-xs-6 col-sm-6">
										<input type="text" name="lastname" id="last-name" class="form-control" placeholder="Last Name" required>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-sm-4">
										<input type="radio" name="gender" value="Male" checked="checked">&nbsp;Male
									</div>
									<div class="col-sm-4">
										<input type="radio" name="gender" value="Female">&nbsp;Female
									</div>
									<div class="col-sm-4">
										<input type="radio" name="gender" value="Others">&nbsp;Others
									</div>
								</div>

								<div class="row form-group">
									<div class="col-sm-12">
										<div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
						                	<input type="text" name="dob" class="form-control" placeholder="Date of Birth" required readonly>
											<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					                	</div>
									</div>
								</div>								

								<div class="row form-group">
									<div class="col-sm-12">
										<div class="input-group">
                      						<span class="input-group-addon">
                        						<i class="glyphicon glyphicon-envelope"></i>
                      						</span>
											<input type="email" name="email" id="e-mail" class="form-control" placeholder="you@email.com" required>
										</div>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-sm-12">
										<div class="input-group">
                      						<span class="input-group-addon">
                        						<i class="glyphicon glyphicon-user"></i>
                      						</span>
											<input type="text" name="username" id="user-name" class="form-control" placeholder="Choose a Username" required onchange="checkUser();">
										</div>
										<span id="userExist" style="color: red"></span>
									</div>
								</div>

								<!--check Username-->
								<script type="text/javascript">
									function checkUser(){
									var user=document.signupForm.username.value;
									var req= new XMLHttpRequest(); 
									req.onreadystatechange=function(){
										if (req.readyState==4 && req.status==200) {				
											document.getElementById('userExist').innerHTML=req.responseText; 
										}
									}
									req.open("GET","signupValidate.php?client="+user,true); 
									req.send();
								}
								</script>

								<div class="row form-group">
									<div class="col-sm-12">
										<div class="input-group">
                      						<span class="input-group-addon">
                        						<i class="glyphicon glyphicon-lock"></i>
                      						</span>
											<input type="password" name="password" id="pass-word" class="form-control" placeholder="Set a Password" required="">
										</div>	
									</div>
								</div>

								<div class="row form-group">
									<div class="col-sm-12">
										<button type="submit" name="signup" id="signup_Button" class="form-control btn btn-success">Sign Me Up</button>
									</div>	
								</div>
								<label>By clicking <span class="label label-success">Sign Me Up</span> , you agree to our Terms & Conditions and Privacy Policy.</label>
							</form>
						</div>
					</div>

				<div class="modal-footer">
					Already have an account?
					<a href="#loginModal" data-toggle="modal" data-target="#loginModal" data-dismiss="modal" class="btn btn-info">Login</a>
				</div>
			</div>
		</div>
	</div>

	<!--End Signup Form-->
	
	<!--Login Form-->

		<?php
			if(isset($_COOKIE['count_cookie']))
			{
			 if($_COOKIE['count_cookie']>1)
			 { 
			 	header('location:index.php'); ?>
				<script type="text/javascript">
				alert("You have made 3 incorrect attempts already...Please try again after 10 minutes!!!");
				</script>
				<meta http-equiv="refresh" content="600;url=index.php">
				<?php
				die();
			  }
			}
 		?>
		<div id="loginModal" class="modal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Log In</h3>
					</div>

					<div class="modal-body">
						<div class="row">
							<form name="loginForm" action="loginSave.php" method="post" enctype="multipart/form-data">
								<div class="row form-group">
									<div class="col-sm-12">
										<div class="input-group">
                      						<span class="input-group-addon">
                        						<i class="glyphicon glyphicon-user"></i>
                      						</span>
                      						<input type="text" name="loginUsername" id="login_username" class="form-control" placeholder="Username" required="" autofocus="">
                    					</div>	
									</div>
								</div>

								<div class="row form-group">
									<div class="col-sm-12">
										<div class="input-group">
                      						<span class="input-group-addon">
                        						<i class="glyphicon glyphicon-lock"></i>
                      						</span>
                      						<input type="password" name="loginPassword" id="login_password" class="form-control" placeholder="Password" required="">
                    					</div>	
									</div>
								</div>

								<div class="row form-group">
									<div class="col-sm-12">
										<input type="submit" name="btnlogin" id="login_button" class="form-control btn btn-success" value="Log Me In"></input>
									</div>	
								</div>
							</form>
						</div>
					</div>

					<div class="modal-footer">
						New to ChildrenParty4U?
						<a href="#signupModal" data-toggle="modal" data-target="#signupModal" data-dismiss="modal" class="btn btn-info">Create an account</a>
					</div>

				</div>
			</div>
		</div>

	<!--End Login Form-->

	</div>

	<!--End Signup and Login Form-->

	<!--Footer-->

	<footer>
		<div class="footer" id="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<h4>children party for you</h4>
						<h5>more information</h5>
						<ul class="info">
							<li><i class="fa fa-info-circle" aria-hidden="true"></i><a href="#">&nbsp;About Us</a></li>
							<li><i class="fa fa-check-circle" aria-hidden="true"></i><a href="#">&nbsp;Terms & Conditions</a></li>
							<li><i class="fa fa-user-secret" aria-hidden="true"></i><a href="#">&nbsp;Privacy Policy</a></li>
							<li><i class="fa fa-question-circle" aria-hidden="true"></i><a href="#">&nbsp;Frequently Asked Question</a></li>
						</ul>
					</div>
					<div class="col-lg-4 col-md-4">
						<h4>Contact Us</h4>
						<p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;777, Main Street, London</p>
						<p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;+111 222 333 444 5555</p>
						<p><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;info@childrenparty4u.com</p>
						<p><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;www.childrenparty4u.com</p>
					</div>
					<div class="col-lg-4 col-md-4">
						<h4>connect with us!</h4>
						<ul class="social">
							<li><a href="http://www.facebook.com" title="Facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="http://www.twitter.com" title="Twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="http://www.instagram.com" title="Instagram" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="http://www.youtube.com" title="Youtube" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
						</ul>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-envelope"></i>
							</span>
							<input type="email" name="newsEmail" placeholder="your email address" class="form-control"></input>
						</div>
						<button type="button" class="btn btn-info">Subscribe</button>
					</div>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="container">
            	<p>&copy; Children Party 4U <?php echo date('Y')?></p>
        		</div>
			</div>
		</div>	
	</footer>

	<!--End Footer-->

	<!--username check-->

	<?php 
		if (isset($_GET['usernameexist'])) { ?>
			<script type="text/javascript">
				alert("Username exists already. Please choose a new username !!!");
			</script>
	<?php } ?>

	<!--registration success alert-->
	<?php 
		if (isset($_GET['registered'])) { ?>
			<script type="text/javascript">
				alert("Congratulations! You have successfully registered");
			</script>
	<?php } ?>

	<!--login check-->
	<?php 
		if (isset($_GET['nousername'])) { ?>
			<script type="text/javascript">
				alert("Username and Password did not match !!!");
			</script>
	<?php } ?>

	<?php if (isset($_GET['notloggedin'])){ ?>
			<script type="text/javascript">
				alert("Please Login first to continue !!!");
			</script>
	<?php } ?>

	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="customjs/bootstrap-datetimepicker.js" charset="UTF-8"></script>

	<!--bootstrap datepicker-->
	<script type="text/javascript">
		$('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
    });
	</script>

	<script type="text/javascript">
		function validateForm() {
    	var x = document.forms["signupForm"]["dob"].value;
    	if (x == "") {
        alert("Date of birth must be filled out !!!");
        return false;
    }
}
	</script>

</body>
</html>