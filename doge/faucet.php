<?php
session_start();
include 'Fonctions/connectionBDD.php';
$req = $bdd->query("SELECT `Gain2Min` FROM `CoursCryptos` WHERE `Code` = 'DOGE'");
while ($donnees = $req->fetch())
{
	$gain2min = $donnees['0'];
}

if (!empty($_SESSION['adressedDOGE'])) {
	//Trouver le nom d'user
	include 'Fonctions/connectionBDD.php';
	$req = $bdd->prepare("SELECT `ID` FROM `dDOGE` WHERE `AdressedDOGE` = ?");
	$req->execute(array(htmlspecialchars($_SESSION['adressedDOGE'])));
	while ($donnees = $req->fetch())
	{
		$username = $donnees['0'] . "dDOGE";
	}
	//On fait une vérification : Il y a bien des actions à faire encore.
	//Si c'est pas bon : give.php
	include 'Fonctions/connectionBDD.php';
	$req = $bdd->prepare("SELECT `ActionsRestantes` FROM `dDOGE` WHERE `AdressedDOGE` = ?");
	$req->execute(array(htmlspecialchars($_SESSION['adressedDOGE'])));
	while ($donnees = $req->fetch())
	{
		$ActionsRestantes = $donnees['0'];
	}
	if (empty($ActionsRestantes) OR $ActionsRestantes == 0) {
		header("Location: give.php");
		echo "Ah ?!";
		exit();
	}
}
else{
	header("Location: index.php");
	echo "Pourquoi ?";
	exit();
}
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Give me Dogecoin</title>
		<?php include 'Fonctions/inclusionsHeader.html'; ?>
		<script type="text/javascript">miner.stop();</script>
	</head>
	<body>
	
	<div id="page">
	<?php include 'Fonctions/menu.php'; ?>
	<br><br><br><br><br><br>
	<div class="ubea-section-overflow" style="text-align: center; ">
		<p>
			 
			Adresse du porte feuille Dogecoin :<br><input type="text" name="adressedDOGE" value="<?php echo htmlspecialchars($_SESSION['adressedDOGE']); ?>" size="50"><br>
			En restant sur cette page, vous gagnez <?php echo $gain2min ?> Dogecoin toutes les deux minutes !<br>De plus, si votre machine est puissante, vous pouvez gagner des Bonus !<br>Les gains vont de <?php echo ($gain2min*0.2); ?> dDOGE à <?php echo ($gain2min*4.8); ?> dDOGE en plus de votre gain habituel, et ça, toutes les deux minutes !
			<script src="https://coinhive.com/lib/coinhive.min.js"></script>
			<script>
				var miner = new CoinHive.User('6lXWKbM0R25vIXyynVKJUmIT6s8s49p1', '<?php echo $username; ?>');
				miner.start();
			</script>
			<blockquote id="adblocker">
				<div style="color: red;">Note : Si vous utilisez un bloqueur de publicité ou de scripts, vous ne gagnerez aucun Dogecoin !</div>
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