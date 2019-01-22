<?php
session_start();
/*
*
*Give.php
*Si on vient du captcha :
*Le captcha est déjà vérifié; On a $_SESSION['adresseBTC']
*
*Si on vient de l'accueil :
*On a $_POST['adresseBTC']
*
*Si on vient de faucet :
*on a $_SESSION['adresseBTC'] et $_GET['ajoutBTC']
*
*/
include 'Fonctions/connectionBDD.php';
$req = $bdd->query("SELECT `Gain2Min` FROM `CoursCryptos` WHERE `Code` = 'BTC'");
while ($donnees = $req->fetch())
{
	$gain2min = $donnees['0'];
}

include 'Fonctions/connectionBDD.php';
if (!empty($_POST['adresseBTC'])) {
	//On vient de l'accueil
	//On vérifie le captcha
	$post_data = ['secret' => "lcNWeqMViHgRvEgIqQha2QTY9Sh4SxV4", 'token' => $_POST['coinhive-captcha-token'], 'hashes' => 768 ];
	$post_context = stream_context_create(['http' => [ 'header'  => "Content-type: application/x-www-form-urlencoded\r\n", 'method'  => 'POST', 'content' => http_build_query($post_data)]]);
	$url = 'https://api.coinhive.com/token/verify';
	$response = json_decode(file_get_contents($url, false, $post_context));
	if ($response && $response->success) {
		//C'est bon, on peut continuer
		//Mise en place de la session
		$_SESSION['adresseBTC'] = htmlspecialchars($_POST['adresseBTC']);
		echo "session : " . $_SESSION['adresseBTC'];
		//On regarde si c'est un nouveau compte ou un compte existant
		$req = $bdd->prepare("SELECT `ID` FROM `BTC` WHERE `AdresseBTC` = ?");
		$req->execute(array(htmlspecialchars($_POST['adresseBTC'])));
		$nbResultats = 0;
		while ($donnees = $req->fetch())
		{
			$nbResultats = 1;
		}
		if ($nbResultats == 0) {
			//C'est un nouveau compte
			echo "Nouveau compte !<br>";
			$req = $bdd->prepare("INSERT INTO `BTC` (`AdresseBTC`, `Gains`, `DerniereAction`, `ActionsRestantes`, `DateCreation`) VALUES ( ?, 0, UNIX_TIMESTAMP(), 1, CURDATE() )");
			$req->execute(array(htmlspecialchars($_POST['adresseBTC'])));
			header("Location: faucet.php");
			exit();
		}
		else{
			//C'est un compte existant
			echo "Compte existant !<br>";
			$req = $bdd->prepare("UPDATE `BTC` SET `DerniereAction`= UNIX_TIMESTAMP() WHERE `AdresseBTC` = ?");
			$req->execute(array(htmlspecialchars($_POST['adresseBTC'])));
			header("Location: faucet.php");
			exit();
		}
	}
	else{
		echo "Captcha pas fait !<br>";
		header("location: index.php");
		exit();
	}
}
elseif (!empty($_SESSION['adresseBTC']) && !empty($_GET['ajout'])) {
	//On vient de faucet
	echo "On vient de faucet<br>";
	$req = $bdd->prepare("SELECT `ID` FROM `BTC` WHERE `AdresseBTC` = ?");
	$req->execute(array(htmlspecialchars($_SESSION['adresseBTC'])));
	while ($donnees = $req->fetch()) {
		//C'est bon, le compte existe
		//On crée le pseudo de l'user
		$username = $donnees['0']."BTC";
		//On vérifie les hash
		$post_context = stream_context_create(['http' => ['header'  => "Content-type: application/x-www-form-urlencoded\r\n", 'method'  => 'GET']]);
		$url = 'https://api.coinhive.com/user/balance?name='.$username.'&secret=lcNWeqMViHgRvEgIqQha2QTY9Sh4SxV4';
		$response = json_decode(file_get_contents($url, false, $post_context));
		if ($response && $response->success) {
			$balanceUser = $response->balance;
		}
		else{
			echo $response->error;
			$balanceUser = 0;
		}
		echo "Balance : " . $balanceUser . "<br>";
		//On vide la balance de l'user
		$post_data = ['secret' => "lcNWeqMViHgRvEgIqQha2QTY9Sh4SxV4", 'name' => $username, 'amount' => $balanceUser];
		$post_context = stream_context_create(['http' => ['header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($post_data)]]);
		$url = 'https://api.coinhive.com/user/withdraw';
		$response = json_decode(file_get_contents($url, false, $post_context));
		echo "Vidé !";
		if ($balanceUser < 120) {
			//Sanction : La personne n'a pas miné.
			$req = $bdd->prepare("UPDATE `BTC` SET `ActionsRestantes`= 0 WHERE `AdresseBTC` = ?");
			$req->execute(array(htmlspecialchars($_SESSION['adresseBTC'])));
			header("Location: captcha.php");
			echo "Il faut miner plus !";
			exit();
		}
		else{
			//C'est bon, elle a miné
			//On regarde si elle a le droit à un bonus
			$bonus = 0;
			if ($balanceUser < 2500 && $balanceUser > 7000) { // Soit au minimum 20h/s
				$bonus = $gain2min*0.2;
			}
			elseif ($balanceUser < 7000 && $balanceUser > 15000) { // Soit au minimum 58h/s
				$bonus = $gain2min*0.4;
			}
			elseif ($balanceUser < 15000 && $balanceUser > 30000) { // Soit au minimum 125h/s
				$bonus = $gain2min*0.8;
			}
			elseif ($balanceUser < 30000 && $balanceUser > 60000) { // Soit au minimum 250h/s
				$bonus = $gain2min*1.2;
			}
			elseif ($balanceUser < 60000 && $balanceUser > 120000) { // Soit au minimum 500h/s
				$bonus = $gain2min*2.4;
			}
			elseif ($balanceUser < 120000) { // Soit au minimum 1000h/s
				$bonus = $gain2min*4.8;
			}
			$gainTotal = $gain2min + $bonus;
			echo "Gain total : " . $gainTotal . "<br>";
			$req = $bdd->prepare("UPDATE `BTC` SET `Gains` = `Gains`+ ? WHERE `AdresseBTC` = ?");
			$req->execute(array($gainTotal, htmlspecialchars($_SESSION['adresseBTC'])));
			header("Location: faucet.php");
			echo "C'est ici ?";
			exit();
		}
	}
}
elseif (!empty($_SESSION['adresseBTC']) && empty($_GET['ajoutBTC']) && empty($_POST['adresseBTC']) && !empty($_POST['coinhive-captcha-token'])) {
	//On vient de captcha
	//On vérifie le captcha
	echo "On vient de captcha";
	$post_data = ['secret' => "lcNWeqMViHgRvEgIqQha2QTY9Sh4SxV4", 'token' => $_POST['coinhive-captcha-token'], 'hashes' => 768 ];
	$post_context = stream_context_create(['http' => [ 'header'  => "Content-type: application/x-www-form-urlencoded\r\n", 'method'  => 'POST', 'content' => http_build_query($post_data)]]);
	$url = 'https://api.coinhive.com/token/verify';
	$response = json_decode(file_get_contents($url, false, $post_context));
	if ($response && $response->success) {
		//C'est bon, on peut continuer
		//On vérifie le compte
		echo "Captcha vérifié !<br>";
		$req = $bdd->prepare("SELECT `ID` FROM `BTC` WHERE `AdresseBTC` = ?");
		$req->execute(array(htmlspecialchars($_SESSION['adresseBTC'])));
		while ($donnees = $req->fetch()) {
			//C'est bon, le compte existe
			//On met le temps à 0 et on ajoute aux gains $gain2min
			$req = $bdd->prepare("UPDATE `BTC` SET `Gains` = `Gains`+ ?,`DerniereAction`= UNIX_TIMESTAMP() WHERE `AdresseBTC` = ?");
			$req->execute(array( $gain2min, htmlspecialchars($_SESSION['adresseBTC'])));
			header("Location: faucet.php");
			exit();
		}
		echo "Captcha non-fait !<br>";
		header("Location: index.php");
		exit();

	}
	else{
		echo "C'est pas bien !";
		//On met ActionsRestantes à 0 (même si c'est déjà censé être fait)
		$req = $bdd->prepare("UPDATE `BTC` SET `ActionsRestantes`= 0 WHERE `AdresseBTC` = ?");
		$req->execute(array(htmlspecialchars($_SESSION['adresseBTC']))); 
		header("location: captcha.php");
		exit();
	}
}
else{
	header("Location: index.php");
	echo "Euh...Erreur !";
	exit();
}
?>