<?php  session_start();  ?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Give me Emercoin, le site pour gagner des Emercoins facilement et rapidement !</title>
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
							<p>Gagnez vos Emercoins gratuitement et facilement !<br>
							Commencez dès maintenant !</p>
						</div>
					</div>
				</div>
				 
				<div class="row">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
							<h2 id="ccm">Comment ça marche ?</h2>
							<p>Le fonctionnement est très simple :<br>
								Vous inscrivez dans le formulaire l'adresse publique de votre porte feuille Emercoin<br>
								Résolvez le captcha, et cliquez sur envoyer !<br>
								Ensuite, plus vous resterez sur la page longtemps, plus vous gagnerez du Emercoin !
							</p>
						</div>
					</div>
				</div>
				<div style="text-align: center; display: flex; justify-content: center;">
					Vous n'avez pas de porte feuille Emercoin ?<br>Créez le votre ici : fr.cryptonator.com/about/emc
				</div>
				<div style="display: flex;justify-content: center; text-align: center;">
					<form action="give.php" method="post">
						<input type="text" name="adresseEMC" placeholder="Entrez ici votre adresse de porte feuille Emercoin" size="60" style="text-align: center; line-height: 30px; width: 80%;" required>
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
							<h2>C'est quoi le Emercoin ?</h2>
							<p>Le Emercoin est une crypto-monnaie nouvelle, avec son lot de particularitées.</p>
						</div>
					</div>
					<p>
						EmerCoin (EMC) est une crypto-monnaie décentralisée et open-source créée fin 2013 et basée sur les technologies de Bitcoin, Namecoin et Peercoin. Il utilise le mécanisme de consensus de preuve de participation qui génère un intérêt annuel de 6% pour aider à maintenir le réseau. EmerCoin implémente également le protocole RFC3489 (STUN) qui utilise des serveurs distribués géographiquement pour la découverte IP externe. Une autre caractéristique intéressante d'EmerCoin réside dans sa blockchain qui fournit un système de stockage de nom-valeur, incluant un serveur DNS intégré pour les domaines .coin, .emc, .lib, .bazar.
					</p>
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