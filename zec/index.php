<?php  session_start();  ?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Give me Zcash, le site pour gagner des Zcashs facilement et rapidement !</title>
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
							<p>Gagnez vos Zcashs gratuitement et facilement !<br>
							Commencez dès maintenant !</p>
						</div>
					</div>
				</div>
				 
				<div class="row">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
							<h2 id="ccm">Comment ça marche ?</h2>
							<p>Le fonctionnement est très simple :<br>
								Vous inscrivez dans le formulaire l'adresse publique de votre porte feuille Zcash<br>
								Résolvez le captcha, et cliquez sur envoyer !<br>
								Ensuite, plus vous resterez sur la page longtemps, plus vous gagnerez du Zcash !
							</p>
						</div>
					</div>
				</div>
				<div style="text-align: center; display: flex; justify-content: center;">
					Vous n'avez pas de porte feuille Zcash ?<br>Créez le votre ici : fr.cryptonator.com/about/ZEC
				</div>
				<div style="display: flex;justify-content: center; text-align: center;">
					<form action="give.php" method="post">
						<input type="text" name="adresseZEC" placeholder="Entrez ici votre adresse de porte feuille Zcash" size="60" style="text-align: center; line-height: 30px; width: 80%;" required>
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
							<h2>C'est quoi le Zcash ?</h2>
							<p>Zcash est une crypto-monnaie décentralisée et open-source qui offre la confidentialité et la transparence sélective des transactions.</p>
						</div>
					</div>
					<p>
						Le protocole a été lancé en octobre 2016 et est basé sur une recherche cryptographique évaluée par des pairs, et construit par une équipe d'ingénierie spécialisée dans la sécurité sur une plate-forme open source basée sur la base de code testée par Bitcoin Core. Si Bitcoin est comme http pour l'argent, Zcash est https. Zcash offre une confidentialité totale des paiements, tout en maintenant un réseau décentralisé utilisant une blockchain publique. Contrairement à Bitcoin, les transactions Zcash peuvent être protégées pour masquer l'expéditeur, le destinataire et la valeur de toutes les transactions sur la chaîne de blocs. Seuls ceux qui ont la bonne vue peuvent voir le contenu. Les utilisateurs ont un contrôle total et peuvent choisir de fournir aux autres leur clé de vue à leur discrétion. Les transactions Zcash ne dépendent pas de la coopération d'autres parties.
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