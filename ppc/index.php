<?php  session_start();  ?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Give me Peercoin, le site pour gagner des Peercoins facilement et rapidement !</title>
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
							<p>Gagnez vos Peercoins gratuitement et facilement !<br>
							Commencez dès maintenant !</p>
						</div>
					</div>
				</div>
				 
				<div class="row">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
							<h2 id="ccm">Comment ça marche ?</h2>
							<p>Le fonctionnement est très simple :<br>
								Vous inscrivez dans le formulaire l'adresse publique de votre porte feuille Peercoin<br>
								Résolvez le captcha, et cliquez sur envoyer !<br>
								Ensuite, plus vous resterez sur la page longtemps, plus vous gagnerez du Peercoin !
							</p>
						</div>
					</div>
				</div>
				<div style="text-align: center; display: flex; justify-content: center;">
					Vous n'avez pas de porte feuille Peercoin ?<br>Créez le votre ici : fr.cryptonator.com/about/ppc
				</div>
				<div style="display: flex;justify-content: center; text-align: center;">
					<form action="give.php" method="post">
						<input type="text" name="adressePPC" placeholder="Entrez ici votre adresse de porte feuille Peercoin" size="60" style="text-align: center; line-height: 30px; width: 80%;" required>
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
							<h2>C'est quoi le Peercoin ?</h2>
							<p>Peercoin (PPC) est crypto-monnaie sécurisée à faible coût qui récompense les utilisateurs avec un rendement annuel de 1%.</p>
						</div>
					</div>
					<p>
						Peercoin est basé sur le logiciel Bitcoin mais est également une preuve de participation, ce qui signifie que vous obtenez un rendement annuel de 1% sur votre investissement Peercoin. Il n'y a pas de limite stricte sur le nombre de pièces, cependant les frais de transaction sont détruits ce qui ajoute un aspect déflationniste à la monnaie. En dehors de l'aspect preuve de mise en jeu, Peercoin peut également être créé par le minage.
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