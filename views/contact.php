<div class="page-content">
	<!-- Breadcrumb Section -->
	<section class="breadcrumb-section breadcrumb-section-white section-box" style="background-image: url(/images/breadcrumb-contact.jpg)">
		<div class="container">
				<div class="breadcrumb-inner">
					<h1>Contact</h1>
					<ul class="breadcrumbs">
						<li>
							<a class="breadcrumbs-1" href="/">Accueil</a>
							/ Contact
						</li>
					</ul>
				</div>	
		</div>
	</section>
	<!-- End Breadcrumb Section -->
	<!-- Contact Section -->
	<section class="contact-section section-box">
		<div class="container">
				<div class="contact-content">
					<div class="row contact-quote">
						<div class="col-12 text-center">
							<h5>
								<b>Parce que rien ne vaut la rencontre et l’échange, ensemble, étudions votre demande.</b>
								<br/>
								Je vous laisse ici me décrire brièvement vos besoins et je vous contacte au plus vite pour trouver un terrain d’entente.
								<br/><br/>
							</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="quote-form">								
								<form class="form-contact js-contact-form" method="POST" action="/controllers/ContactController.php">
									<div class="form-input">
										<input type="text" name="name" placeholder="Nom" required>
									</div>
									<div class="form-input">
										<input type="email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" name="email" placeholder="Email">
									</div>
									<div class="form-input">
										<input type="tel" required name="tel" placeholder="Téléphone">
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
							<div class="contact-details text-center">
								<div class="contact-info text-left">
									<div class="contact-inner">
										<p><i class="zmdi zmdi-map"></i> 46300 Gourdon, Lot</p>
										<p class="center"><i class="zmdi zmdi-email"></i> contact@ellestmanuelle.fr</p>
									</div>
								</div>
								<img src="/images/contact-gourdon.jpg"/>
							</div>
						</div>
					</div>
				</div>
		</div>
	</section>
	<!-- End Contact Section -->
</div>