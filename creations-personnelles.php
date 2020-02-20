<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>ellestmanuelle.fr | Créations personnelles</title>
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
		require_once("resources/views/header.php");
		require_once("resources/controllers/CreationController.php"); 
	
		$controller = new CreationController();
	
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
										<input type="search" name="search" class="search-field" placeholder="Rechercher...">
										<button class="search-submit" type="submit">
											<i class="zmdi zmdi-search"></i>
										</button>
									</form>
								</div>
								<!-- Categories -->
								<div class="widget widget_product_categories">
									<h3 class="widget-title">Thématique</h3>
									<ul class="product-categories">
										<?php $controller->buildThemeList() ?>
									</ul>
								</div>
								<!-- Categories -->
								<div class="widget widget_product_categories">
									<h3 class="widget-title">Technique</h3>
									<h5>artistique</h5>
									<ul class="product-categories">
										<li class="cat-item cat-parent">
											<a href="#"><span>illustrations livres pour enfants : lien vers pages illustrations livre enfants</span></a>
											<a href="#"><span>(2)</span></a>
										</li>
										<li class="cat-item cat-parent">
											<a href="#"><span>dessins au jour le jour : instagram</span></a>
											<a href="#"><span>(18)</span></a>
										</li>
										<li class="cat-item cat-parent">
											<a href="#"><span>linogravure</span></a>
											<a href="#"><span>(9)</span></a>
										</li>
										<li class="cat-item cat-parent">
											<a href="#"><span>sculpture </span></a>
											<a href="#"><span>(22)</span></a>
										</li>
										<li class="cat-item cat-parent">
											<a href="#"><span>pliage papier : origami, pop up</span></a>
											<a href="#"><span>(14)</span></a>
										</li>
										<li class="cat-item cat-parent">
											<a href="#"><span>graphisme : commandes historial</span></a>
											<a href="#"><span>(14)</span></a>
										</li>
									</ul>
									<h5>artisanale</h5>										
									<ul>
										<li class="cat-item cat-parent">
											<a href="#"><span>couture canevas</span></a>
											<a href="#"><span>(14)</span></a>
										</li>										
										<li class="cat-item cat-parent">
											<a href="#"><span>broderie</span></a>
											<a href="#"><span>(14)</span></a>
										</li>										
										<li class="cat-item cat-parent">
											<a href="#"><span>tricot</span></a>
											<a href="#"><span>(14)</span></a>
										</li>										
										<li class="cat-item cat-parent">
											<a href="#"><span>poterie</span></a>
											<a href="#"><span>(14)</span></a>
										</li>										
										<li class="cat-item cat-parent">
											<a href="#"><span>décoration objets : peinture porcelaine</span></a>
											<a href="#"><span>(14)</span></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
							<div class="content-area">
								<div class="storefront-sorting">
									<p class="woocommerce-result-count">Affichage des résultats 1 à 12 sur 35</p>
								</div>
								<div class="row">
									<!-- Product 1 -->
									<div class="col">
										<div class="product type-product">
											<div class="woocommerce-LoopProduct-link">
												<div class="product-image">
													<a href="#" class="wp-post-image">
														<img class="image-cover" src="images/hp-1-featured-1.jpg" alt="product">
														<img class="image-secondary" src="images/hp-1-featured-11.jpg" alt="product">
													</a>
													<a href="#" class="onsale">SALE</a>
													<div class="yith-wcwl-add-button show">
				 										<a href="#" class="add_to_wishlist">
				 											<i class="zmdi zmdi-favorite-outline"></i>
				 										</a>
				 									</div>
				 									<div class="button add_to_cart_button">
				 										<a href="#">
				 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
				 										</a>
				 									</div>
													<h5 class="woocommerce-loop-product__title"><a href="#">Ta-bl Side Table</a></h5>
													<span class="price">
														<del>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>
																35
															</span>
														</del>
														<ins>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>
																22
															</span>
														</ins>
													</span>
												</div>
											</div>
										</div>
									</div>
									<!-- Product 2 -->
									<div class="col">
										<div class="product type-product">
											<div class="woocommerce-LoopProduct-link">
												<div class="product-image">
													<a href="#" class="wp-post-image">
														<img src="images/hp-1-featured-2.jpg" alt="product">
													</a>
													<div class="yith-wcwl-add-button show">
				 										<a href="#" class="add_to_wishlist">
				 											<i class="zmdi zmdi-favorite-outline"></i>
				 										</a>
				 									</div>
				 									<div class="button add_to_cart_button">
				 										<a href="#">
				 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
				 										</a>
				 									</div>
													<h5 class="woocommerce-loop-product__title"><a href="#">Pendant Lamp</a></h5>
													<span class="price">
														<ins>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>
																45
															</span>
														</ins>
													</span>
												</div>
											</div>
										</div>
									</div>
									<!-- Product 3 -->
									<div class="col">
										<div class="product type-product">
											<div class="woocommerce-LoopProduct-link">
												<div class="product-image">
													<a href="#" class="wp-post-image">
														<img class="image-cover" src="images/hp-1-featured-3.jpg" alt="product">
														<img class="image-secondary" src="images/hp-1-featured-33.jpg" alt="product">
													</a>
													<a href="#" class="onnew">NEW</a>
													<div class="yith-wcwl-add-button show">
				 										<a href="#" class="add_to_wishlist">
				 											<i class="zmdi zmdi-favorite-outline"></i>
				 										</a>
				 									</div>
				 									<div class="button add_to_cart_button">
				 										<a href="#">
				 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
				 										</a>
				 									</div>
													<h5 class="woocommerce-loop-product__title"><a href="#">Magnolia Dream</a></h5>
													<span class="price">
														<ins>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>
																18
															</span>
														</ins>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<!-- Product 5 -->
									<div class="col">
										<div class="product type-product">
											<div class="woocommerce-LoopProduct-link">
												<div class="product-image">
													<a href="#" class="wp-post-image">
														<img src="images/hp-1-featured-6.jpg" alt="product">
													</a>
													<div class="yith-wcwl-add-button show">
				 										<a href="#" class="add_to_wishlist">
				 											<i class="zmdi zmdi-favorite-outline"></i>
				 										</a>
				 									</div>
				 									<div class="button add_to_cart_button">
				 										<a href="#">
				 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
				 										</a>
				 									</div>
													<h5 class="woocommerce-loop-product__title"><a href="#">Laundry Bag</a></h5>
													<span class="price">
														<ins>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>
																37
															</span>
														</ins>
													</span>
												</div>
											</div>
										</div>
									</div>
									<!-- Product 6 -->
									<div class="col">
										<div class="product type-product">
											<div class="woocommerce-LoopProduct-link">
												<div class="product-image">
													<a href="#" class="wp-post-image">
														<img class="image-cover" src="images/hp-1-featured-7.jpg" alt="product">
														<img class="image-secondary" src="images/hp-1-featured-77.jpg" alt="product">
													</a>
													<a href="#" class="onnew">NEW</a>
													<div class="yith-wcwl-add-button show">
				 										<a href="#" class="add_to_wishlist">
				 											<i class="zmdi zmdi-favorite-outline"></i>
				 										</a>
				 									</div>
				 									<div class="button add_to_cart_button">
				 										<a href="#">
				 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
				 										</a>
				 									</div>
													<h5 class="woocommerce-loop-product__title"><a href="#">Hocko Blanket</a></h5>
													<span class="price">
														<ins>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>
																42
															</span>
														</ins>
													</span>
												</div>
											</div>
										</div>
									</div>
									<!-- Product 7 -->
									<div class="col">
										<div class="product type-product">
											<div class="woocommerce-LoopProduct-link">
												<div class="product-image">
													<a href="#" class="wp-post-image">
														<img class="image-cover" src="images/hp-1-featured-8.jpg" alt="product">
														<img class="image-secondary" src="images/hp-1-featured-88.jpg" alt="product">
													</a>
													<div class="yith-wcwl-add-button show">
				 										<a href="#" class="add_to_wishlist">
				 											<i class="zmdi zmdi-favorite-outline"></i>
				 										</a>
				 									</div>
				 									<div class="button add_to_cart_button">
				 										<a href="#">
				 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
				 										</a>
				 									</div>
													<h5 class="woocommerce-loop-product__title"><a href="#">Tweed Armchair</a></h5>
													<span class="price">
														<ins>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>
																31
															</span>
														</ins>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<!-- Product 9 -->
									<div class="col">
										<div class="product type-product">
											<div class="woocommerce-LoopProduct-link">
												<div class="product-image">
													<a href="#" class="wp-post-image">
														<img src="images/hp-1-featured-13.jpg" alt="product">
													</a>
													<div class="yith-wcwl-add-button show">
				 										<a href="#" class="add_to_wishlist">
				 											<i class="zmdi zmdi-favorite-outline"></i>
				 										</a>
				 									</div>
				 									<div class="button add_to_cart_button">
				 										<a href="#">
				 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
				 										</a>
				 									</div>
													<h5 class="woocommerce-loop-product__title"><a href="#">Forrest Vase B</a></h5>
													<span class="price">
														<ins>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>
																45
															</span>
														</ins>
													</span>
												</div>
											</div>
										</div>
									</div>
									<!-- Product 10 -->
									<div class="col">
										<div class="product type-product">
											<div class="woocommerce-LoopProduct-link">
												<div class="product-image">
													<a href="#" class="wp-post-image">
														<img class="image-cover" src="images/hp-1-featured-14.jpg" alt="product">
													</a>
													<a href="#" class="onsale">SALE</a>
													<div class="yith-wcwl-add-button show">
				 										<a href="#" class="add_to_wishlist">
				 											<i class="zmdi zmdi-favorite-outline"></i>
				 										</a>
				 									</div>
				 									<div class="button add_to_cart_button">
				 										<a href="#">
				 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
				 										</a>
				 									</div>
													<h5 class="woocommerce-loop-product__title"><a href="#">Hocko Blanket</a></h5>
													<span class="price">
														<del>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>
																30
															</span>
														</del>
														<ins>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>
																28
															</span>
														</ins>
													</span>
												</div>
											</div>
										</div>
									</div>
									<!-- Product 11 -->
									<div class="col">
										<div class="product type-product">
											<div class="woocommerce-LoopProduct-link">
												<div class="product-image">
													<a href="#" class="wp-post-image">
														<img class="image-cover" src="images/hp-1-featured-5.jpg" alt="product">
														<img class="image-secondary" src="images/hp-1-featured-55.jpg" alt="product">
													</a>
													<div class="yith-wcwl-add-button show">
				 										<a href="#" class="add_to_wishlist">
				 											<i class="zmdi zmdi-favorite-outline"></i>
				 										</a>
				 									</div>
				 									<div class="button add_to_cart_button">
				 										<a href="#">
				 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
				 										</a>
				 									</div>
													<h5 class="woocommerce-loop-product__title"><a href="#">Planting Light</a></h5>
													<span class="price">
														<ins>
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>
																41
															</span>
														</ins>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="navigation pagination">
								<div class="page-numbers">
									<a href="#" class="page-numbers current">
										<span>1</span>
									</a>
									<a href="#" class="page-numbers">
										<span>2</span>
									</a>
									<a href="#" class="page-numbers">
										<span>3</span>
									</a>
									<a href="#" class="page-numbers">
										<span><i class="zmdi zmdi-chevron-right"></i></span>
									</a>
								</div>
							</div>
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