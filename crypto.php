<?php
include 'Fonctions/connectionBDD.php';
if (!empty($_POST['GainMaxMois'])) {
	$req = $bdd->prepare("UPDATE `CoursCryptos` SET `GainMaxParMois`= ? WHERE 1");
	$req->execute(array($_POST['GainMaxMois']));
}
if (!empty($_POST['MinimumRetrait'])) {
	$req = $bdd->prepare("UPDATE `CoursCryptos` SET `RetraitMin`= ?/`Cours` WHERE 1");
	$req->execute(array($_POST['MinimumRetrait']));
}
$bdd->exec("UPDATE `CoursCryptos` SET `Gain2Min`= `GainMaxParMois` / `Cours` / 21900 WHERE 1");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Changer les gains des cryptos</title>
</head>
<body>
	<?php
	$req = $bdd->query("SELECT * FROM `CoursCryptos` WHERE 1");
	while ($donnees = $req->fetch())
	{
		$code = $donnees['0'];
		$cours = $donnees['1'];
		$gainMaxParMois = $donnees['2'];
		$gain2Min = $donnees['3'];
		$retraitMin = $donnees['4'];
		$url = $donnees['5'];
		?>
		<h1><?php echo $code; ?></h1>
		<p>
			Cours : 
			<?php
			if (!empty($_POST['cours']) && $_POST['name'] == $code) {
				$req = $bdd->prepare("UPDATE `CoursCryptos` SET `Cours`= ? WHERE `Code` = ?");
				$req->execute(array($_POST['cours'], $code));
				?>
				<script language="javascript" type="text/javascript">
					window.location.replace("crypto.php");
				</script>
				<?php
			}
			?>
			<form action="crypto.php" method="post">
				<input type="text" name="cours" value="<?php echo $cours; ?>">€
				<input type="hidden" name="name" value="<?php echo $code; ?>">
				<input type="submit">
			</form><br>
			Gain maximum par mois : <?php echo $gainMaxParMois; ?>€, soit <?php echo ($gainMaxParMois/$cours); echo $code; ?><br>
			Gain toutes les deux minutes : <?php echo $gain2Min; ?> <?php echo $code; ?><br>
			Retrait minimum : 
			<?php
			if (!empty($_POST['retrait']) && $_POST['name'] == $code) {
				$retraitFinal = ($_POST['retrait']/$cours);
				$req = $bdd->prepare("UPDATE `CoursCryptos` SET `RetraitMin`= ? WHERE `Code` = ?");
				$req->execute(array($retraitFinal, $code));
				?>
				<script language="javascript" type="text/javascript">
					window.location.replace("crypto.php");
				</script>
				<?php
			}
			?>
			<form action="crypto.php" method="post">
				<input type="text" name="retrait" value="<?php echo ($cours*$retraitMin); ?>"> €, soit <?php echo $retraitMin; ?> <?php echo $code; ?>
				<input type="hidden" name="name" value="<?php echo $code; ?>">
				<input type="submit">
			</form><br>
			<?php echo $url; ?>
		</p>
		<?php
	}
	?>
	<h2>Changer le gain maximum par mois</h2>
	<form action="crypto.php" method="post">
		<input type="text" name="GainMaxMois" value="<?php echo $gainMaxParMois; ?>">€
		<input type="submit">
	</form><br><br>
	<h2>Changer le minimum de retrait en € pour TOUTES les cryptos</h2>
	<form action="crypto.php" method="post">
		<input type="text" name="MinimumRetrait">€
		<input type="submit">
	</form>
</body>
</html>