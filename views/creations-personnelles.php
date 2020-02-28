<?php 
	require_once("views/header.php");
	require_once("controllers/CreationController.php"); 

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
	if(isset($_GET['previouspage']))
	{
		$controller->getPreviousPage();
	}
	if(isset($_GET['page']) && is_numeric($_GET['page']))
	{
		$controller->getPage($_GET['page']);
	}
	if(isset($_GET['nextpage']))
	{
		$controller->getNextPage();
	}
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