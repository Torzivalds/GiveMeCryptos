<?php
session_start();
?>


<!DOCTYPE HTML>
<html>
	<head>
	<title>Compte</title>
	<?php include 'Fonctions/inclusionsHeader.html'; ?>
	</head>
	<body>
	
	<div id="page">
	<?php include 'Fonctions/menu.php'; ?>
	<br><br><br><br><br><br>
	<div class="ubea-section" id="ubea-services" data-section="services">
			<div class="ubea-container">
				<div class="row">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center ubea-heading">
							<h2>Mon compte</h2>
							<?php
							if (!empty($_SESSION['adresseXMR'])) {
								include 'Fonctions/connectionBDD.php';
								$req = $bdd->prepare("SELECT `XMRVerif`, `XMRNonVerif`, `DateCreation` FROM `Comptes` WHERE `AdresseXMR` = ?");
								$req->execute(array(htmlspecialchars($_SESSION['adresseXMR'])));
								while ($donnees = $req->fetch())
								{
									$XMRVerif = $donnees['0'];
									$XMRNonVerif = $donnees['1'];
									$dateCreation = $donnees['2'];
								}
								?>
								<p>Vous avez <?php echo $XMRVerif; ?> XMR sur votre compte Give Me Monero.<br>Vous avez <?php echo $XMRNonVerif; ?> XMR en attente d'être vérifiés par un captcha.</p>
								<?php
								if ($XMRVerif > 0.05) {
									?>
									<a href="transfert.php">Demander le transfert des Monero</a>
									<?php
								}
							}
							else{
								?>
								<p>Vous n'êtes pas connectés.<br>Connectez-vous pour voire les statistiques de votre compte</p>
								<?php
							}
							?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<img src="images/captcha.jpg" alt="logo" height="50">
									</span>
									<div class="feature-copy">
										<h3>Pourquoi un captcha ?</h3>
										<p>Ce site utilise un captcha pour prouver que vous êtes bien un humain, et pas un robot automatisé. Si vous avez des difficultées avec le captcha ou une question à propos de ce dernier, veuillez nous contacter via le formulaire de contact du site.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<img src="images/transfert.png" alt="logo" height="50">
									</span>
									<div class="feature-copy">
										<h3>Transfert des Moneros</h3>
										<p>Les Moneros de votre compte Give Me Monero ne peuvent être transfèrés que vers l'adresse publique avec laquelle vous vous connectez. Pour qu'un transfert puisse avoir lieu, le compte Give Me Monero doit avoir été créé au moins 30 jours avant. Le montant minimum est de 0.05 XMR. Remarque : Les transferts ne sont pas automatiques; le transfert peut donc avoir lieu plusieurs jours après l'avoir demandé. La demade se fait sur cette page, lorsque vous avez un compte d'au moins 30 jours qui a au minimum 0.05 XMR.</p>
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
										<img src="images/cadena.png" alt="logo" height="60">
									</span>
									<div class="feature-copy">
										<h3>Sécurité</h3>
										<p>Give Me Monero n'utilise même pas de mot de passe, mais il est tout de même très sécurisé : Le site demande un captcha pour se connecter, ce qui rends plus compliqué aux robots de se connecter. Ensuite, les fonds ne peuvent être envoyés QUE dans le porte monnaie Monero qui correspond à l'adresse du compte, ce qui fait qu'un pirate ne pourra pas se transfèrer les fonds dans son porte monnaie Monero.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<img src="images/zzz.png" alt="logo" height="60">
									</span>
									<div class="feature-copy">
										<h3>Inactif</h3>
										<p>Si un compte est inactif plus de 30 jours, il est supprimé, et tous les gains sont perdus et nous ne les vous redonnerons pas, il vous faudra recréer un compte et repartir de zéro.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<img src="images/contact.png" alt="logo" height="60">
									</span>
									<div class="feature-copy">
										<h3>Contact</h3>
										<p>Pour toute question à propos du site de Give Me Monero, pour tous problèmes survenus sur ce site ou tout autre chose, veuillez nous contacter via le formulaire de contact sur cette page : <a href="contact.php">Contactez-nous ici</a></p>
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
	<style type="text/css">.ubea-loader{ display: none; }</style>
	</body>
</html>