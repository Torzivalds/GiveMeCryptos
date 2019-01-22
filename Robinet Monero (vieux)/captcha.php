<?php
session_start();
//Vérifier que le captcha a bien été validé
$post_data = [
	'secret' => "lcNWeqMViHgRvEgIqQha2QTY9Sh4SxV4", // <- Your secret key
	'token' => $_POST['coinhive-captcha-token'],
	'hashes' => 768
];

$post_context = stream_context_create([
	'http' => [
		'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		'method'  => 'POST',
		'content' => http_build_query($post_data)
	]
]);

$url = 'https://api.coinhive.com/token/verify';
$response = json_decode(file_get_contents($url, false, $post_context));

if ($response && $response->success) {
	$captcha = "verifie";
	echo "C'est bon !";
}
else{
	$captcha = "pasverifie";
	echo "C'est pas bon !";
}

if ($captcha == "verifie") {
	$adresseXMR = htmlspecialchars($_SESSION['adresseXMR']); //L'adresse XMR de l'user
	//Connection BDD
	include "Fonctions/connectionBDD.php";
	//Vérifier qu'il y a bien > 1 d'actions restantes
	$req = $bdd->prepare("SELECT `ActionsRestantes` FROM `Comptes` WHERE `AdresseXMR` = ?");
	$req->execute(array($adresseXMR));
	while ($donnees = $req->fetch())
	{
		$nbActionsRestantes = $donnees['0'];
	}
	if ($nbActionsRestantes < 1) {
		//C'est bon !
		//Mettre au hazard 3 à 13 d'actions restantes, et remettre à 0 le time et mettre les XMR en attente en validés
		$newNbActions = rand(3, 13);
		$req = $bdd->prepare("UPDATE `Comptes` SET `XMRVerif`= `XMRVerif`+`XMRNonVerif`, `XMRNonVerif`= 0, `DerniereAction`= UNIX_TIMESTAMP(), `ActionsRestantes`= ? WHERE `AdresseXMR` = ?");
		$req->execute(array($newNbActions, $adresseXMR));
		//Go miner
		header("Location: faucet.php");
		exit();
	}
	else{
		//Non, on n'a rien à faire ici, direction la page de minage
		header("Location: faucet.php");
		exit();
	}
}
?>


<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Confirmez le captcha ! - Give me Monero</title>
	<?php include 'Fonctions/inclusionsHeader.html'; ?>
	</head>
	<body>
	
	<div id="page">
	<?php include 'Fonctions/menu.php'; ?>
	<br><br><br><br><br><br>
	<div class="ubea-section-overflow" style="text-align: center; ">
		<form action="captcha.php" method="post">
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