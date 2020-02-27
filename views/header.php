<?php 
	include("controllers/HeaderController.php"); 

	$controller = new HeaderController();
?>

<header class="header">
	<!-- Show Desktop Header -->
	<div class="show-desktop-header header-hp-1 style-header-hp-1">
		<div id="js-navbar-fixed" class="menu-desktop">
			<div class="container-fluid">
				<div class="menu-desktop-inner">
					<!-- Logo -->
					<div class="logo">
						<p class="title">Ellestmanuelle</p>
						<p class="subtitle">vous l’êtes aussi</p>
					</div>
					<!-- Main Menu -->
					<nav class="main-menu">
						
						<ul>
							<li class="menu-item">
								<a href="index"<?php $controller->addCurrentClass(""); $controller->addCurrentClass("index")?>>
								Accueil
								</a>
							</li>
							<li class="menu-item">
								<a href="#"<?php $controller->addCurrentClass("ateliers"); $controller->addCurrentClass("illustrations");?>>
								Prestations / intervention
								</a>
								<ul class="sub-menu">
									<li>
										<a href="ateliers">
											Animation d'/ateliers
											<i class="zmdi zmdi-chevron-right"></i>
										</a>
										<ul class="sub-menu menu-levels">
											<li><a href="ateliers#philosophie">Ma philosophie d’animation/ma plus value</a></li>
											<li><a href="ateliers#prestations">Types de prestations</a></li>
											<li><a href="ateliers#tarifs">Tarifs</a></li>
											<li><a href="ateliers#catalogue">Catalogue</a></li>
											<li><a href="ateliers#reference">Ils m’ont fait confiance</a></li>
										</ul>
									</li>
									<li>
										<a href="illustrations">
											Réalisation d'/illustrations
											<i class="zmdi zmdi-chevron-right"></i>
										</a>
										<ul class="sub-menu menu-levels">
											<li><a href="illustrations#albums">Albums jeunesse</a></li>
											<li><a href="illustrations#outils">Outils pédagogiques</a></li>
											<li><a href="illustrations#graphisme">Graphisme</a></li>
											<li><a href="illustrations#tarifs">Tarifs</a></li>
											<li><a href="illustrations#reference">Ils m’ont fait confiance</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="menu-item">
								<a href="creations-personnelles"<?php $controller->addCurrentClass("creations-personnelles")?>>
								Créations personnelles
								</a>
							</li>
							<li class="menu-item">
								<a href="qui-suis-je"<?php $controller->addCurrentClass("qui-suis-je")?>>
								Qui suis-je ?
								</a>
								<ul class="sub-menu">
									<li><a href="qui-suis-je#histoire">Mon histoire</a></li>
									<li><a href="qui-suis-je#cv">Mon CV</a></li>
								</ul>
							</li>
							<li class="menu-item">
								<a href="contact"<?php $controller->addCurrentClass("contact")?>>
								Contact
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Show Mobile Header -->
	<div  id="js-navbar-mb-fixed" class="show-mobile-header">
		<!-- Logo And Hamburger Button -->
		<div class="mobile-top-header">
			<div class="logo-mobile">
				<p class="title">ellestmanuelle.fr</p>
				<p class="subtitle">vous l’êtes aussi</p>
			</div>
			<button class="hamburger hamburger--spin hidden-tablet-landscape-up" id="toggle-icon">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</div>
		<!-- Au Navbar Menu -->
		<div class="au-navbar-mobile navbar-mobile-1">
			<div class="au-navbar-menu">
				<ul>
					<li class="drop">
						<a class="drop-link" href="">
							Accueil
						</a>
					</li>
					<li class="drop">							
						<a class="drop-link" href="#">
							Prestations / intervention
							<span class="arrow">
								<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</a>							
						<ul class="drop-menu bottom-right">
							<li class="drop">
								<a class="drop-link" href="#">
								Animation d'ateliers
								<span class="arrow">
									<i class="zmdi zmdi-chevron-down"></i>
								</span>
								</a>
								<ul class="drop-menu bottom-right">
									<li><a class="drop-menu-inner" href="ateliers.php#philosophie">Ma philosophie d’animation/ma plus value</a></li>
									<li><a class="drop-menu-inner" href="ateliers.php#prestations">Types de prestations</a></li>
									<li><a class="drop-menu-inner" href="ateliers.php#tarifs">Tarifs</a></li>
									<li><a class="drop-menu-inner" href="ateliers.php#catalogue">Catalogue</a></li>
									<li><a class="drop-menu-inner" href="ateliers.php#reference">Ils m’ont fait confiance</a></li>
								</ul>
							</li>
							<li class="drop">
								<a class="drop-link" href="#">
								Réalisation d'illustrations
								<span class="arrow">
									<i class="zmdi zmdi-chevron-down"></i>
								</span>
								</a>
								<ul class="drop-menu bottom-right">
									<li><a class="drop-menu-inner" href="illustrations.php#albums">Albums jeunesse</a></li>
									<li><a class="drop-menu-inner" href="illustrations.php#outils">Outils pédagogiques</a></li>
									<li><a class="drop-menu-inner" href="illustrations.php#graphisme">Graphisme</a></li>
									<li><a class="drop-menu-inner" href="illustrations.php#tarifs">Tarifs</a></li>
									<li><a class="drop-menu-inner" href="illustrations.php#reference">Ils m’ont fait confiance</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="drop">
						<a class="drop-link" href="creations-personnelles.php">
							Créations personnelles
						</a>
					</li>
					<li class="drop">
						<a class="drop-link" href="#">
							Qui suis-je ?
							<span class="arrow">
								<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</a>
						<ul class="drop-menu bottom-right">
							<li><a href="qui-suis-je.php#histoire">Mon histoire</a></li>
							<li><a href="qui-suis-je.php#cv">Mon CV</a></li>
						</ul>
					</li>
					<li class="drop">
						<a class="drop-link" href="contact.php">
							Contact
						</a>
					</li>
				</ul>
			</div>				
		</div>
	</div>
</header>