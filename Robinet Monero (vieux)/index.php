<?php  session_start();  ?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Give me Monero, le site pour gagner des Moneros facilement et rapidement !</title>
	<?php include 'Fonctions/inclusionsHeader.html'; ?>
	</head>
	<body>
	
	<div id="page">
	<?php include 'Fonctions/menu.php'; ?>
	<br><br><br>
	<div class="ubea-section-overflow">

		<div class="ubea-section" id="ubea-services" data-section="services">
			<div class="ubea-container">
				<div class="row"  style="display: flex; justify-content: center;">
					<div class="col-md-6">
						<div style="color: #FF5126;font-size: 18px; text-align: center;">
							<p>Gagnez vos Moneros gratuitement et facilement !<br>
							Commencez dès maintenant !</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
							<h2 id="ccm">Comment ça marche ?</h2>
							<p>Le fonctionnement est très simple :<br>
								Vous inscrivez dans le formulaire l'adresse publique de votre porte feuille Monero<br>
								Résolvez le captcha, et cliquez sur envoyer !<br>
								Ensuite, plus vous resterez sur la page longtemps, plus vous gagnerez du Monero !
							</p>
						</div>
					</div>
				</div>
				<div style="text-align: center; display: flex; justify-content: center;">
					Vous n'avez pas de porte feuille Monero ?<br>Créez le votre ici : fr.cryptonator.com/about/xmr
				</div>
				<div style="display: flex;justify-content: center; text-align: center;">
					<form action="give.php" method="post">
						<input type="text" name="adresseXMR" placeholder="Entrez ici votre adresse de porte feuille Monero" size="60" style="text-align: center; line-height: 30px; width: 80%;" required>
						<script src="https://authedmine.com/lib/captcha.min.js" async></script>
						<div id="pourquoi" class="coinhive-captcha" data-hashes="768" data-key="6lXWKbM0R25vIXyynVKJUmIT6s8s49p1" data-whitelabel="true">
							<em>Merci de désactiver adblock !</em>
						</div>

						<input type="submit"/>
					</form>
				</div>
				<div class="row">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
							<h2>C'est quoi le Monero ?</h2>
							<p>Le Monero est une crypto-monnaie sûre, privée, intraçable.<br>
							Il est open source et disponible gratuitement à tous.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">

							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<img src="images/cadena.png" alt="logo" height="50">
									</span>
									<div class="feature-copy">
										<h3>Sécurisé</h3>
										<p>En utilisant la puissance d'un réseau de consensus peer-to-peer distribués, chaque transaction est sécurisée cryptographiquement. Les comptes individuels ont un mot mnémonique de 25 mots affiché lors de leur création, qui peut être écrit pour sauvegarder le compte. Les fichiers de compte sont cryptés avec une phrase secrète pour s'assurer qu'ils ne valent rien s'ils sont volés.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<img src="images/oeil.png" alt="logo" height="50">
									</span>
									<div class="feature-copy">
										<h3>Intraçable</h3>
										<p>En tirant parti des signatures anneau, une propriété particulière de certains types de cryptographie, Monero permet des transactions insondables. Cela signifie qu'il est ambigu de savoir quels fonds ont été dépensés et qu'il est donc extrêmement improbable qu'une transaction puisse être liée à un utilisateur particulier.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 animate-box" data-animate-effect="fadeIn">
						<div class="row">
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<img src="images/clef.png" alt="logo" height="60">
									</span>
									<div class="feature-copy">
										<h3>Privé</h3>
										<p>Monero utilise un système cryptographique qui vous permet d'envoyer et de recevoir des fonds sans que vos transactions soient visibles publiquement sur la blockchain (le grand livre distribué des transactions). Cela garantit que vos achats, reçus et autres transferts restent confidentiels par défaut.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<img src="images/monnaie.png" alt="logo" height="60">
									</span>
									<div class="feature-copy">
										<h3>Rentable</h3>
										<p>Contrairement au Bitcoin et à ses dérivés, le Monero est basé sur un tout nouveau protocole - CryptoNote - qui utilise l'algorithme de hachage Cryptonite lors de l'extraction. Cet algorithme est à l'épreuve de l'ASIC, ce qui signifie qu'il peut toujours être rentable d'exploiter uniquement un processeur ou une carte graphique.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	</body>
</html>