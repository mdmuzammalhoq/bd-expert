<?php ob_start();

	include 'lib/config.php';
	include 'lib/database.php';
	include 'lib/helpers.php';

	$db = new Database();
	$fm = new Format();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<title>BD Expert | Consultancy Firm </title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="keywords" content="Consultancy Responsive web template, Bootstrap Web Templates, 	Flat Web Templates, Android Compatible web template, 
			Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

			<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
			
		
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/JiSlider.css" rel="stylesheet"> 
		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
		<link href="css/owl.carousel.css" rel="stylesheet">		
		<link href="css/font-awesome.css" rel="stylesheet"> 
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/our_style.css" rel="stylesheet"> 

		<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,900" rel="stylesheet">
</head>
	
<body>
<!-- banner -->
<div class="header-area">
		<div class="header-content">		   
			<nav class="navbar navbar-default">
				<div class="logo col-md-2 pull-left">
					<a href="index.php"><img src="images/logo.png" alt="" /></a>
				</div>
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				 <ul class="sign_up_forms">
					<li><a class="active" href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a> </li>
					<li><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up</a> </li>
				</ul>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-2" id="link-effect-2">
						<ul class="nav mainmenu navbar-nav">
							<li class="active"><a href="index.php" class="effect-3">Home</a></li>
							<li><a href="about_us.php" class="effect-3">About Us</a></li>
							<li><a href="#" class="effect-3">Services</a>
								<ul class="submenu">
									<li> <a href="ser_student_visa.php">Student Visa</a></li>
									<li> <a href="ser_immigration.php">Immigration</a></li>
									<li> <a href="ser_visit_visa.php">Visit Visa</a> </li>
									<li> <a href="ser_scholarship.php">Scholarship</a> </li>
									<li> <a href="ser_job_visa.php">Job Visa</a></li>
									<li> <a href="ser_tour_package.php">Tour Pakage</a></li>
									<li> <a href="ser_accomodation.php">Accomodation</a> </li>
									<li> <a href="ser_air_ticketing.php">Air Ticketing</a> </li>
								</ul>
							</li>							
							<li><a href="countries.php" class="effect-3">Countries</a></li>
							<li><a href="#" class="effect-3">Imigration</a>
								<ul class="submenu">
									  <li><a href="imi_canada.php">Canada</a></li>
									  <li><a href="imi_uk.php">UK</a></li>
									  <li><a href="imi_australia.php">Australia</a> </li>
									  <li><a href="imi_new_zeland.php">New Zealand</a> </li>
									  <li><a href="imi_malaysia.php">Malaysia</a></li>
									  <li><a href="imi_denmark.php">Denmark</a> </li>
									  <li><a href="imi_usa.php">USA</a> </li>
								</ul>							
							</li>
							<li><a href="blog.php" class="effect-3">Blog</a></li>
							
							<li><a href="contact.php" class="effect-3">Contact</a></li>
						</ul>
					</nav>
				</div>
			</nav>	
			<div class="clearfix"> </div> 
		</div>
</div>
<?php include 'modal.php'; ?>