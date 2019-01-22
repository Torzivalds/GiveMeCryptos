<?php  session_start();  ?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Give me Blackcoin, le site pour gagner des Blackcoins facilement et rapidement !</title>
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
							<p>Gagnez vos Blackcoins gratuitement et facilement !<br>
							Commencez dès maintenant !</p>
						</div>
					</div>
				</div>
				 
				<div class="row">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
							<h2 id="ccm">Comment ça marche ?</h2>
							<p>Le fonctionnement est très simple :<br>
								Vous inscrivez dans le formulaire l'adresse publique de votre porte feuille Blackcoin<br>
								Résolvez le captcha, et cliquez sur envoyer !<br>
								Ensuite, plus vous resterez sur la page longtemps, plus vous gagnerez du Blackcoin !
							</p>
						</div>
					</div>
				</div>
				<div style="text-align: center; display: flex; justify-content: center;">
					Vous n'avez pas de porte feuille Blackcoin ?<br>Créez le votre ici : fr.cryptonator.com/about/blk
				</div>
				<div style="display: flex;justify-content: center; text-align: center;">
					<form action="give.php" method="post">
						<input type="text" name="adresseBLK" placeholder="Entrez ici votre adresse de porte feuille Blackcoin" size="60" style="text-align: center; line-height: 30px; width: 80%;" required>
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
							<h2>C'est quoi le Blackcoin ?</h2>
							<p>BlackCoin est une monnaie numérique pair à pair avec un registre public décentralisé et distribué, qui, contrairement à ceux des banques traditionnelles, est visible et facilement compréhensible par n'importe qui.</p>
						</div>
					</div>
					<p>
						Pensez au Blackcoin comme à une banque populaire. Vos comptes ne peuvent pas être gelés, ils sont complètement et pour toujours gratuits, ils sont anonymes, beaucoup plus sûrs que la banque traditionnelle. Les paiements peuvent être envoyés à n'importe qui dans le monde en quelques secondes. Tout le monde peut créer un compte en téléchargeant le logiciel. Cette banque n'a pas de propriétaire et ne peut pas être fermée, parce que c'est peer to peer. Le Blackcoin est complètement transparent. Il y a un approvisionnement limité en pièces de monnaie qui le rendent précieux et un grand stock de richesse comme l'or. Les nouvelles pièces ne peuvent être générées que par le taux d'intérêt des réseaux de 1%. Chaque compte génère un intérêt de 1% par an pour aider à sécuriser le système. La technologie de BlackCoin ET sa communauté sont ce qui le rend si spécial. Des gens de partout dans le monde ont travaillé sans relâche pour faire de BlackCoin un top altcoin depuis sa création en 2014.
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