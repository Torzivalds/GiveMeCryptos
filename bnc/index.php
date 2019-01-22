<?php  session_start();  ?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Give me Bytecoin, le site pour gagner des Bytecoins facilement et rapidement !</title>
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
							<p>Gagnez vos Bytecoins gratuitement et facilement !<br>
							Commencez dès maintenant !</p>
						</div>
					</div>
				</div>
				 
				<div class="row">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
							<h2 id="ccm">Comment ça marche ?</h2>
							<p>Le fonctionnement est très simple :<br>
								Vous inscrivez dans le formulaire l'adresse publique de votre porte feuille Bytecoin<br>
								Résolvez le captcha, et cliquez sur envoyer !<br>
								Ensuite, plus vous resterez sur la page longtemps, plus vous gagnerez du Bytecoin !
							</p>
						</div>
					</div>
				</div>
				<div style="text-align: center; display: flex; justify-content: center;">
					Vous n'avez pas de porte feuille Bytecoin ?<br>Créez le votre ici : fr.cryptonator.com/about/BNC
				</div>
				<div style="display: flex;justify-content: center; text-align: center;">
					<form action="give.php" method="post">
						<input type="text" name="adresseBNC" placeholder="Entrez ici votre adresse de porte feuille Bytecoin" size="60" style="text-align: center; line-height: 30px; width: 80%;" required>
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
							<h2>C'est quoi le Bytecoin ?</h2>
							<p>Bytecoin permet des transactions sûres, sécurisées et anonymes dans le monde entier. Les algorithmes de Bytecoin ne permettent pas aux autres utilisateurs de connaître le solde de votre portefeuille, à qui vous envoyez de l'argent et d'où vous recevez vos fonds.</p>
						</div>
					</div>
					<p>
						Le Bytecoin est une crypto-monnaie décentralisée libre et ouverte. Toute personne intéressée peut rejoindre le réseau Bytecoin et participer au développement des devises. Les bytecoins deviennent progressivement plus chers avec le temps, puisque l'émission de nouveaux bytecoin est plafonnée. De plus, le nombre de nouveaux Bytecoin émis à chaque bloc est légèrement décroissant. En conséquence, Bytecoin gagne de la valeur et le taux de change augmente.
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