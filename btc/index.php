<?php  session_start();  ?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Give me Bitcoin, le site pour gagner des Bitcoins facilement et rapidement !</title>
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
							<p>Gagnez vos Bitcoins gratuitement et facilement !<br>
							Commencez dès maintenant !</p>
						</div>
					</div>
				</div>
				 
				<div class="row">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
							<h2 id="ccm">Comment ça marche ?</h2>
							<p>Le fonctionnement est très simple :<br>
								Vous inscrivez dans le formulaire l'adresse publique de votre porte feuille Bitcoin<br>
								Résolvez le captcha, et cliquez sur envoyer !<br>
								Ensuite, plus vous resterez sur la page longtemps, plus vous gagnerez du Bitcoin !
							</p>
						</div>
					</div>
				</div>
				<div style="text-align: center; display: flex; justify-content: center;">
					Vous n'avez pas de porte feuille Bitcoin ?<br>Créez le votre ici : fr.cryptonator.com/about/btc
				</div>
				<div style="display: flex;justify-content: center; text-align: center;">
					<form action="give.php" method="post">
						<input type="text" name="adresseBTC" placeholder="Entrez ici votre adresse de porte feuille Bitcoin" size="60" style="text-align: center; line-height: 30px; width: 80%;" required>
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
							<h2>C'est quoi le Bitcoin ?</h2>
							<p>Le Bitcoin est la première crypto monnaie créée et est celle qui est la plus importante, de part le réseau, le prix et le nombre de Bitcoin dans le monde.</p>
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
										<h3>Décentralisé</h3>
										<p>Le réseau bitcoin n'est pas contrôlé par une autorité centrale. Chaque machine qui extrait des transactions bitcoin et des processus constitue une partie du réseau et les machines fonctionnent ensemble. Cela signifie qu'en théorie, une autorité centrale ne peut pas modifier la politique monétaire et provoquer un effondrement - ou simplement décider de leur retirer les bitcoins, comme la Banque centrale européenne a décidé de le faire à Chypre au début de 2013. Et si certaines parties du réseau se déconnectent pour une raison quelconque, l'argent continue de circuler.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<img src="images/oeil.png" alt="logo" height="50">
									</span>
									<div class="feature-copy">
										<h3>Simple</h3>
										<p>Les banques conventionnelles vous cassent les pieds simplement pour ouvrir un compte en banque. La mise en place de comptes marchands pour le paiement est une autre tâche très compliqué, en proie à la bureaucratie. Cependant, vous pouvez configurer une adresse bitcoin en quelques secondes, sans poser de questions, et sans frais payables.</p>
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
										<h3>Anonyme et gratuit</h3>
										<p>Les utilisateurs peuvent contenir plusieurs adresses bitcoin, et ils ne sont pas liés à des noms, adresses ou autres informations d'identification personnelle. Bitcoin est complètement transparent Bitcoin stocke les détails de chaque transaction qui s'est produite dans le réseau dans une énorme version d'un grand livre général, appelé blockchain. La blockchain dit tout. Si vous avez une adresse bitcoin utilisée publiquement, n'importe qui peut dire combien de bitcoins sont stockés à cette adresse. Ils ne savent tout simplement pas que c'est la votre. Les frais de transaction sont minuscules, et il n'y a pas de frais suplémentaires pour les transaction à l'international.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<img src="images/monnaie.png" alt="logo" height="60">
									</span>
									<div class="feature-copy">
										<h3>Rapide et non-récupérable</h3>
										<p>Vous pouvez envoyer de l'argent n'importe où et il arrivera quelques minutes plus tard, dès que le réseau bitcoin traitera le paiement. Lorsque vos bitcoins sont envoyés, il n'y a pas de retour, à moins que le destinataire ne vous les renvoie. Ils sont partis pour toujours.</p>
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