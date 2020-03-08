<?php
	require_once("controllers/RouterController.php");
	$routerController = new RouterController();
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title><?php $routerController->getTitle() ?></title>
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
	<!-- <link rel="stylesheet" href="vendor/bootrap/css/bootstrap.min.css"/> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <!-- noUiSlider Library -->
    <link rel="stylesheet" type="text/css" href="vendor/nouislider/css/nouislider.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.min.css"/>
</head>
<body>

	<?php $routerController->getContent(); ?>

	<!--  JS  -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!-- Waypoints Library -->
	<script src="js/jquery.waypoints.min.js"></script>
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
	<!-- noUiSlider Library -->
	<script type="text/javascript" src="vendor/nouislider/js/nouislider.js"></script>
	<!-- Form -->
    <script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script src="js/config-contact.js"></script>
	<!-- Main Js -->
	<script src="js/custom.js"></script>
</body>
</html>