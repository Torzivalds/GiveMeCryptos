<?php
session_start();
//On fait une vérification : Il y a bien des actions à faire encore.
//Si c'est pas bon : give.php
if (!empty($_SESSION['adresseXMR'])) {
	include 'Fonctions/connectionBDD.php';
	$req = $bdd->prepare("SELECT `ActionsRestantes` FROM `Comptes` WHERE `AdresseXMR` = ?");
	$req->execute(array(htmlspecialchars($_SESSION['adresseXMR'])));
	while ($donnees = $req->fetch())
	{
		$ActionsRestantes = $donnees['0'];
	}
	if (empty($ActionsRestantes) OR $ActionsRestantes == 0) {
		header("Location: give.php");
	}
}
else{
	header("Location: index.php");
}

?>


<!DOCTYPE HTML>
<html>
	<head>
	<title>Give me Monero</title>
	<?php include 'Fonctions/inclusionsHeader.html'; ?>
	</head>
	<body>
	
	<div id="page">
	<?php include 'Fonctions/menu.php'; ?>
	<br><br><br><br><br><br>
	<div class="ubea-section-overflow" style="text-align: center; ">
		<p>
			Adresse du porte feuille Monero :<br><input type="text" name="adresseXMR" value="<?php echo htmlspecialchars($_SESSION['adresseXMR']); ?>" size="50"><br>
			En restant sur cette page, vous gagnez 10 centimes de Monero toutes les deux minutes !
			<blockquote id="adblocker">
				<div style="color: red;">Note : Si vous utilisez un bloqueur de publicité ou de scripts, vous ne gagnerez aucun monero !</div>
			</blockquote>
		</p>
		<script type="text/javascript" src="advertisement.js"></script>
	</div>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<style type="text/css">.ubea-loader{ display: none; }</style>
	</body>
</html>