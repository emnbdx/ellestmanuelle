<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Ellestmanuelle | Accueil</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Mobile Specific Metas
  	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Favicon
  	================================================== -->	
  	<!-- <link rel="shortcut icon" href="favicon.png" /> -->
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
<body class="homepages-1">

	<?php require_once("resources/views/header.php"); ?>
	
	<div class="page-content">
		<!-- Categories Section -->
		<section class="categories-hp-1 section-box">
			<div class="container">
				<div class="categories-content">
					<div class="row">
						<!-- Categories 1 -->
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="categories-detail lighting">
								<a href="ateliers.php" class="images"><img src="images/img-prestations.jpg" alt="Lighting"></a>
								<div class="product">
									<a href="prestations-interventions">
										<span class="name">
											<span class="line">- </span>
											Prestations, interventions 
										</span>
									</a>
								</div>
							</div>
						</div>
						<!-- Categories 2 -->
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="categories-detail furniture">
								<a href="creations-personnelles.php" class="images"><img src="images/img-creations.jpg" alt="Furniture"></a>
								<div class="product">
									<a href="creations-personnelles">
										<span class="name">
											<span class="line">- </span>
											Créations personnelles
										</span>
									</a>
								</div>
							</div>
						</div>
						<!-- Categories 3 -->
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="categories-detail decoration">
								<a href="qui-suis-je.php" class="images"><img src="images/img-qui-suis-je.jpeg" alt="Decoration"></a>
								<div class="product">
									<a href="qui-suis-je">
										<span class="name">
											<span class="line">- </span>
											Qui suis-je ? 
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Categories Section -->

		<!-- Insta Follow Section -->
		<section class="insta-hp-1 section-box">
			<div class="container">
				<div class="insta-content">
					<h2>Suivez-moi sur Instagram</h2>
					<span><a href="https://www.instagram.com/ellestmanuelle" target="_blank">@ellestmanuelle</a></span>
					<div class="row">
						<div class="col-12">
							<div id="pixlee_container"></div>
							<script type="text/javascript">
								window.PixleeAsyncInit = function() {
									Pixlee.init({apiKey:'oSVxoXKYwcLanan5FV_I'});
									Pixlee.addSimpleWidget({widgetId:'25125'});};
							</script>
							<script src="//instafeed.assets.pxlecdn.com/assets/pixlee_widget_1_0_0.js"></script>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Insta Follow Section -->
	</div>

	<?php require_once("resources/views/footer.php"); ?>

	<a href="#" id="back-to-top"></a>
	<!--  JS  -->
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="vendor/bootrap/js/bootstrap.min.js"></script>
	<!-- Main Js -->
	<script src="js/custom.js"></script>
</body>
</html>