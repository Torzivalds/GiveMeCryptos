<?php  session_start();  ?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Give me Ethereum, le site pour gagner des Ethereums facilement et rapidement !</title>
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
							<p>Gagnez vos Ethereums gratuitement et facilement !<br>
							Commencez dès maintenant !</p>
						</div>
					</div>
				</div>
				 
				<div class="row">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
							<h2 id="ccm">Comment ça marche ?</h2>
							<p>Le fonctionnement est très simple :<br>
								Vous inscrivez dans le formulaire l'adresse publique de votre porte feuille Ethereum<br>
								Résolvez le captcha, et cliquez sur envoyer !<br>
								Ensuite, plus vous resterez sur la page longtemps, plus vous gagnerez du Ethereum !
							</p>
						</div>
					</div>
				</div>
				<div style="text-align: center; display: flex; justify-content: center;">
					Vous n'avez pas de porte feuille Ethereum ?<br>Créez le votre ici : fr.cryptonator.com/about/eth
				</div>
				<div style="display: flex;justify-content: center; text-align: center;">
					<form action="give.php" method="post">
						<input type="text" name="adresseETH" placeholder="Entrez ici votre adresse de porte feuille Ethereum" size="60" style="text-align: center; line-height: 30px; width: 80%;" required>
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
							<h2>C'est quoi le Ethereum ?</h2>
							<p>Ethereum est une plate-forme décentralisée qui gère des contrats intelligents: des applications qui fonctionnent exactement comme programmées sans aucune possibilité d'indisponibilité, de censure, de fraude ou d'interférence de tiers.</p>
						</div>
					</div>
					<p>
						Les applications fonctionnent sur une chaîne de blocs personnalisés, une infrastructure globale partagée extrêmement puissante qui peut déplacer la valeur et représenter la propriété. Cela permet aux développeurs de créer des marchés, de stocker des registres de dettes ou de promesses, de déplacer des fonds selon des instructions données depuis longtemps (comme un testament ou un contrat à terme) et beaucoup d'autres choses qui n'ont pas encore été inventées tout cela sans risques.
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