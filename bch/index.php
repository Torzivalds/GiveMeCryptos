<?php  session_start();  ?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Give me Bitcoin Cash, le site pour gagner des Bitcoin Cashs facilement et rapidement !</title>
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
							<p>Gagnez vos Bitcoin Cashs gratuitement et facilement !<br>
							Commencez dès maintenant !</p>
						</div>
					</div>
				</div>
				 
				<div class="row">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
							<h2 id="ccm">Comment ça marche ?</h2>
							<p>Le fonctionnement est très simple :<br>
								Vous inscrivez dans le formulaire l'adresse publique de votre porte feuille Bitcoin Cash<br>
								Résolvez le captcha, et cliquez sur envoyer !<br>
								Ensuite, plus vous resterez sur la page longtemps, plus vous gagnerez du Bitcoin Cash !
							</p>
						</div>
					</div>
				</div>
				<div style="text-align: center; display: flex; justify-content: center;">
					Vous n'avez pas de porte feuille Bitcoin Cash ?<br>Créez le votre ici : fr.cryptonator.com/about/BCH
				</div>
				<div style="display: flex;justify-content: center; text-align: center;">
					<form action="give.php" method="post">
						<input type="text" name="adresseBCH" placeholder="Entrez ici votre adresse de porte feuille Bitcoin Cash" size="60" style="text-align: center; line-height: 30px; width: 80%;" required>
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
							<h2>C'est quoi le Bitcoin Cash ?</h2>
							<p>Le Bitcoin Cash est une crypto-monnaie très ressemblante au Bitcoin, mais permet  des frais peu élevés et des confirmations fiables, plus que le Bitcoin.</p>
						</div>
					</div>
					<p>
						Bitcoin Cash apporte de l'argent solide au monde, remplissant ainsi la promesse initiale de Bitcoin en tant que «Cash électronique Peer-to-Peer». Les commerçants et les utilisateurs sont habilités avec des frais peu élevés et des confirmations fiables. L'avenir brille avec une croissance sans restriction, une adoption mondiale, une innovation sans permission et un développement décentralisé. <br>Tous les détenteurs de Bitcoin à partir du bloc 478558 sont également propriétaires de Bitcoin Cash. Tous sont les bienvenus pour rejoindre la communauté Bitcoin Cash à mesure que nous avançons dans la création de monnaie saine accessible au monde entier.
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