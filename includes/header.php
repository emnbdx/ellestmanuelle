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
						<?php 						
							function isCurrentPage($page)
							{
								$currentUri = end(explode("/", $_SERVER[REQUEST_URI]));
								if($currentUri === $page)
									echo " class=\"current\"";
							}
						?>
						<ul>
							<li class="menu-item">
								<a href="index.php"<?php isCurrentPage("index.php")?>>
								Accueil
								</a>
							</li>
							<li class="menu-item">
								<a href="#"<?php isCurrentPage("ateliers.php"); isCurrentPage("illustrations.php");?>>
								Prestations / intervention
								</a>
								<ul class="sub-menu">
									<li>
										<a href="ateliers.php">
											Animation d'/ateliers
											<i class="zmdi zmdi-chevron-right"></i>
										</a>
										<ul class="sub-menu menu-levels">
											<li><a href="ateliers.php#philosophie">Ma philosophie d’animation/ma plus value</a></li>
											<li><a href="ateliers.php#prestations">Types de prestations</a></li>
											<li><a href="ateliers.php#tarifs">Tarifs</a></li>
											<li><a href="ateliers.php#catalogue">Catalogue</a></li>
											<li><a href="ateliers.php#reference">Ils m’ont fait confiance</a></li>
										</ul>
									</li>
									<li>
										<a href="illustrations.php">
											Réalisation d'/illustrations
											<i class="zmdi zmdi-chevron-right"></i>
										</a>
										<ul class="sub-menu menu-levels">
											<li><a href="illustrations.php#albums">Albums jeunesse</a></li>
											<li><a href="illustrations.php#outils">Outils pédagogiques</a></li>
											<li><a href="illustrations.php#graphisme">Graphisme</a></li>
											<li><a href="illustrations.php#tarifs">Tarifs</a></li>
											<li><a href="illustrations.php#reference">Ils m’ont fait confiance</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li class="menu-item">
								<a href="creations-personnelles.php"<?php isCurrentPage("creations-personnelles.php")?>>
								Créations personnelles
								</a>
							</li>
							<li class="menu-item">
								<a href="qui-suis-je.php"<?php isCurrentPage("qui-suis-je.php")?>>
								Qui suis-je ?
								</a>
								<ul class="sub-menu">
									<li><a href="qui-suis-je.php#histoire">Mon histoire</a></li>
									<li><a href="qui-suis-je.php#cv">Mon CV</a></li>
								</ul>
							</li>
							<li class="menu-item">
								<a href="contact.php"<?php isCurrentPage("contact.php")?>>
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