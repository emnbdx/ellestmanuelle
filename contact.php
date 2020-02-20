<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>ellestmanuelle.fr | Contact</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Mobile Specific Metas
  	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Favicon
  	================================================== -->	
  	<link rel="shortcut icon" href="favicon.png" />
  	<!-- Font
  ================================================== -->
  	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
  	<link rel="stylesheet" type="text/css" href="fonts/linearicons/style.css">
	<link rel="stylesheet" type="text/css" href="css/poppins-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/Playlist/playlist-script-font.css">
	<!-- CSS   
  ================================================== -->
	<!-- Bootrap -->
	<link rel="stylesheet" href="vendor/bootrap/css/bootstrap.min.css"/>
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="contact">

	<?php require_once("resources/views/header.php"); ?>

	<div class="page-content">
		<!-- Breadcrumb Section -->
		<section class="breadcrumb-contact-us breadcrumb-section section-box" style="background-image: url(images/contact-us-bc.jpg)">
			<div class="container">
				<div class="breadcrumb-inner">
					<h1>Contact</h1>
					<ul class="breadcrumbs">
						<li><a class="breadcrumbs-1" href="index.html">Accueil</a></li>
						<li><p class="breadcrumbs-2">Contact</p></li>
					</ul>
				</div>	
			</div>
		</section>
		<!-- End Breadcrumb Section -->

		<!-- Contact Section -->
		<section class="contact-section section-box">
			<div class="container">
				<div class="contact-content">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="quote-form">
								<form class="form-contact js-contact-form" method="POST" action="resources/controllers/ContactController.php">
									<div class="form-input">
										<input type="text" name="name" placeholder="Nom" required>
									</div>
									<div class="form-input">
										<input type="email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" name="email" placeholder="Email">
									</div>
									<div class="form-textarea">
										<textarea name="message" required placeholder="Message"></textarea>
									</div>
									<div class="form-bottom">
										<input type="submit" class="end-quote-1" name="quote" value="Envoyer">
										<span><i class="zmdi zmdi-arrow-right"></i></span>
									</div>
								</form>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="contact-details">
								<h2 class="special-heading">Contact Details</h2>
								<div class="contact-info">
									<div class="contact-inner">
										<h3>NewYork</h3>
										<p><i class="zmdi zmdi-map"></i> No 40 Baria Sreet 133/2 NewYork 13589</p>
										<p class="center"><i class="zmdi zmdi-email"></i> kathryn-92@example.com</p>
										<p><a href="tel:8494904283"><i class="zmdi zmdi-phone"></i> (849) 490 4283</a></p>
									</div>
									<div class="contact-inner">
										<h3>Barcelona</h3>
										<p><i class="zmdi zmdi-map"></i> 184 Main Collins Street West Barselona 23765</p>
										<p class="center"><i class="zmdi zmdi-email"></i> steven82@example.com</p>
										<p><a href="tel:5273766381"><i class="zmdi zmdi-phone"></i> (527) 376 6381</a></p>
									</div>
								</div>
								<div class="socials">
									<a href="#"><i class="zmdi zmdi-facebook"></i></a>
									<a href="#"><i class="zmdi zmdi-twitter"></i></a>
									<a href="#"><i class="zmdi zmdi-tumblr"></i></a>
									<a href="#"><i class="zmdi zmdi-instagram"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Contact Section -->

		<!-- Map Section  -->
		<section class="map-section">
			<div class="google-map-section">
				<div class="map-wrapper js-google-map" data-makericon="images/icons/map-icon.png" data-makers='[["Novas", "Now that you visited our website,<br> how about checking out our office too?", 40.786813, -73.834441]]'>
		            <div class="map__holder js-map-holder" id="map"></div>
		        </div>
			</div>
		</section>
		<!-- End Map Section -->
	</div>

	<?php require_once("resources/views/footer.php"); ?>

	<a href="#" id="back-to-top"></a>
	<!--  JS  -->
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootrap -->
	<script src="vendor/bootrap/js/bootstrap.min.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEmXgQ65zpsjsEAfNPP9mBAz-5zjnIZBw"></script>
	<script src="js/theme-map.js"></script>
	<!-- Form -->
    <script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script src="js/config-contact.js"></script>
	<!-- Main Js -->
	<script src="js/custom.js"></script>
</body>
</html>