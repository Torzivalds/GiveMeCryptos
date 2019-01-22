<?php
session_start();
?>


<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Confirmez le captcha ! - Give me Crypto</title>
	<?php include 'Fonctions/inclusionsHeader.html'; ?>
	</head>
	<body>
	
	<div id="page">
		<?php include 'Fonctions/menu.php'; ?>
		<br><br><br><br><br><br>
		<div class="ubea-section-overflow" style="text-align: center; ">
			<?php
			if (!empty($_GET['error']) && htmlspecialchars($_GET['error']) == 1) {
				?>
				<h3 style="color: red;">Ce site utilise votre machine pour faire des calculs.<br>Veuillez désactiver Adblock pour ce site, et ajouter une exeption à votre Antivirus pour les domaines suivants : <br>https://coinhive.com https://authedmine.com et https://givemecrypto.fr</h3>
				<?php
			}
			?>
			 
			<form action="give.php" method="post">
				<script src="https://authedmine.com/lib/captcha.min.js" async></script>
				<div class="coinhive-captcha" data-hashes="768" data-key="6lXWKbM0R25vIXyynVKJUmIT6s8s49p1" data-whitelabel="true">
					<em>Merci de désactiver adblock !</em>
				</div>
				<input type="submit" value="Continuer">
			</form>
			 
		</div>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<style type="text/css">.ubea-loader{ display: none; }</style>
	</body>
</html>