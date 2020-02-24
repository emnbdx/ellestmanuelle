<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Ellestmanuelle | Créations personnelles</title>
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
	<!-- Owl Carousel 2 -->
	<link rel="stylesheet" href="vendor/owl/css/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/owl/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendor/owl/css/animate.css">
	<!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" type="text/css" href="vendor/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="vendor/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="vendor/revolution/css/navigation.css">
    <!-- fancybox-master Library -->
    <link rel="stylesheet" type="text/css" href="vendor/fancybox-master/css/jquery.fancybox.min.css">
    <!-- Audio Library-->
    <link rel="stylesheet" href="vendor/mejs/mediaelementplayer.css">
    <!-- noUiSlider Library -->
    <link rel="stylesheet" type="text/css" href="vendor/nouislider/css/nouislider.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="standard-grid">

	<?php 
		error_reporting(E_ALL);
		ini_set("display_errors", 1);

		require_once("resources/views/header.php");
		require_once("resources/controllers/CreationController.php"); 
	
		$controller = new CreationController();

		if(isset($_GET['search']))
		{
			$controller->setFilter($_GET['search'], 0, 0);
		}

		if(isset($_GET['theme']) && is_numeric($_GET['theme']))
		{
			$controller->setFilter("", 0, $_GET['theme']);
		}

		if(isset($_GET['technique']) && is_numeric($_GET['technique']))
		{
			$controller->setFilter("", $_GET['technique'], 0);
		}

		//if(isset($_GET['previouspage']))
		//{
		//	$controller->getPreviousPage();
		//}

		if(isset($_GET['page']) && is_numeric($_GET['page']))
		{
			$controller->getPage($_GET['page']);
		}

		//if(isset($_GET['nextpage']))
		//{
		//	$controller->getNextPage();
		//}
	?>

	<div class="page-content">
		<!-- Breadcrumb Section -->
		<section class="breadcrumb-contact-us breadcrumb-section section-box" style="background-image: url(images/contact-us-bc.jpg)">
			<div class="container">
				<div class="breadcrumb-inner">
					<h1>Créations personnelles</h1>
					<ul class="breadcrumbs">
						<li><a class="breadcrumbs-1" href="index.html">Accueil</a></li>
						<li><p class="breadcrumbs-2">Créations personnelles</p></li>
					</ul>
				</div>	
			</div>
		</section>
		<!-- End Breadcrumb Section -->

		<!-- Portfolio Section -->
		<section class="featured-hp-1 items-hp-6 shop-full-page shop-right-siderbar">
			<div class="container">
				<div class="featured-content woocommerce">
					<div class="row">
						<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
							<div class="widget-area">
								<!-- Search -->
								<div class="widget widget_search">
									<form class="search-form" method="get" role="search">
										<input type="search" name="search" class="search-field" placeholder="Rechercher..." value="<?php echo $controller->getSearchString() ?>">
										<button class="search-submit" type="submit">
											<i class="zmdi zmdi-search"></i>
										</button>
									</form>
								</div>
								<!-- Categories -->
								<div class="widget widget_product_categories">
									<h3 class="widget-title">Thématique</h3>
									<?php $controller->buildThemeList() ?>
								</div>
								<!-- Categories -->
								<div class="widget widget_product_categories">
									<h3 class="widget-title">Technique</h3>
									<?php $controller->buildTechniqueList() ?>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
							<div class="content-area">
								<div class="storefront-sorting">
									<p class="woocommerce-result-count">
										<?php $controller->buildProducCountInfo(); ?>
									</p>
								</div>
								<?php $controller->buildProductList() ?>
							</div>
							<?php $controller->buildPager() ?>							
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Portfolio Section -->
	</div>

	<?php require_once("resources/views/footer.php"); ?>

	<a href="#" id="back-to-top"></a>
	<!--  JS  -->
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootrap -->
	<script src="vendor/bootrap/js/bootstrap.min.js"></script>
	<!-- Owl Carousel 2 -->
  	<script src="vendor/owl/js/owl.carousel.min.js"></script>
  	<script src="vendor/owl/js/OwlCarousel2Thumbs.min.js"></script>
  	<!-- Slider Revolution core JavaScript files -->
    <script src="vendor/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="vendor/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <!-- Isotope Library-->
	<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<!-- Masonry Library -->
	<script type="text/javascript" src="js/jquery.masonry.min.js"></script>
	<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
	<!-- fancybox-master Library -->
	<script type="text/javascript" src="vendor/fancybox-master/js/jquery.fancybox.min.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEmXgQ65zpsjsEAfNPP9mBAz-5zjnIZBw"></script>
	<script src="js/theme-map.js"></script>
	<!-- Countdown Library -->
	<script src="vendor/countdown/jquery.countdown.min.js"></script>
	<!-- Audio Library-->
	<script src="vendor/mejs/mediaelement-and-player.min.js"></script>
	<!-- noUiSlider Library -->
	<script type="text/javascript" src="vendor/nouislider/js/nouislider.js"></script>
	<!-- Form -->
    <script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script src="js/config-contact.js"></script>
	<!-- Main Js -->
	<script src="js/custom.js"></script>
</body>
</html>