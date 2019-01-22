<?php
session_start();
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

if (!empty($_POST['adresseXMR']) OR !empty($_SESSION['adresseXMR']) && !empty($_GET['ajoutXMR'])) {

	if (!empty($_POST['adresseXMR'])) {
		$adresseXMR = htmlspecialchars($_POST['adresseXMR']);
		$_SESSION['adresseXMR'] = $adresseXMR;
		if ($captcha == "pasverifie") {
			//Le captcha n'a pas été vérifié, donc on renvoie sur la page d'accueil
			header("Location: index.php");
			exit();
		}
	}
	else{
		$adresseXMR = htmlspecialchars($_SESSION['adresseXMR']);
	}
	//On a l'adresse XMR
	include "Fonctions/connectionBDD.php";

	//Regarder si l'adresse existe déjà
	//Si elle existe, on se "connecte"
	//Sinon, on ajoute celle-ci à la BDD
	$req = $bdd->prepare("SELECT `ID` FROM `Comptes` WHERE `AdresseXMR` = ?");
	$req->execute(array($adresseXMR));
	$nbResultats = 0;
	while ($donnees = $req->fetch())
	{
		$nbResultats = 1;
	}
	if ($nbResultats == 0) {
		//C'est un nouveau compte
		//Création du compte
		$avantCaptcha = rand (2, 12); //Le nombre de fois que la page rechargera avant que ne s'affiche le captcha
		$req = $bdd->prepare("INSERT INTO `Comptes` (`AdresseXMR`, `DerniereAction`, `ActionsRestantes`, `DateCreation`) VALUES ( ?, UNIX_TIMESTAMP(), ?, CURDATE() )");
		$req->execute(array($adresseXMR, $avantCaptcha));
		//Redirection vers la page de minage
		header("Location: faucet.php");
		exit();
	}
	else{
		//On vérifie que la dernière action a bien eut lieu il y a au moins 2min
		$req = $bdd->prepare("SELECT `DerniereAction`, UNIX_TIMESTAMP() FROM `Comptes` WHERE `AdresseXMR` = ?");
		$req->execute(array($adresseXMR));
		while ($donnees = $req->fetch())
		{
			$derniereAction = $donnees['0'];
			$tempsReel = $donnees['1'];
		}
		$derniereAction = $derniereAction+119;
		if ($derniereAction < $tempsReel) {
			//C'est bon !
			//On ajoute les XMR
			if (!empty($_GET['ajoutXMR'])) {
				//On ajoute des XMR non-vérifiés
				$req = $bdd->prepare("UPDATE `Comptes` SET `XMRNonVerif`= `XMRNonVerif`+ 0.00000010 WHERE `AdresseXMR` = ?");
				$req->execute(array($adresseXMR));
			}
		}
		//Le compte existe déjà, on met à zéro le temps
		$req = $bdd->prepare("UPDATE `Comptes` SET `DerniereAction`= UNIX_TIMESTAMP(),`ActionsRestantes`= `ActionsRestantes`-1 WHERE `AdresseXMR` = ?");
		$req->execute(array($adresseXMR));

		//On vérifie qu'il n'y ait pas un captcha à afficher

		$req = $bdd->prepare("SELECT `ActionsRestantes` FROM `Comptes` WHERE `AdresseXMR` = ?");
		$req->execute(array($adresseXMR));
		while ($donnees = $req->fetch())
		{
			$nbActionsRestantes = $donnees['0'];
		}

		if ($nbActionsRestantes < 1) {
			//Go to captcha !
			header("Location: captcha.php");
			exit();
		}
		else{
			//Redirection vers la page de minage
			header("Location: faucet.php");
			exit();
		}
	}
}
else{
	//On n'a pas l'adresse, retour à l'index
	header("Location: index.php");
	exit();
}
?>