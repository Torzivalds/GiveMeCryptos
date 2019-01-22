<?php
session_start();
if (!empty($_POST['nom']) && !empty($_POST['adresseXMR']) && !empty($_POST['sujet']) && !empty($_POST['message']) && !empty($_POST['mail'])) {
	$nom = htmlspecialchars($_POST['nom']);
	$mail = htmlspecialchars($_POST['mail']);
	$adresseXMR = htmlspecialchars($_POST['adresseXMR']);
	$sujet = htmlspecialchars($_POST['sujet']);
	$message = htmlspecialchars($_POST['message']);
	//On a toutes les infos envoèyées par l'user


	$mail = 'contact@myrasp.fr'; // Déclaration de l'adresse de destination.
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
	{
	    $passage_ligne = "\r\n";
	}
	else
	{
	    $passage_ligne = "\n";
	}
	//=====Déclaration des messages au format texte et au format HTML.
	$message_txt = "Sujet : " . $sujet . "<br>Nom : " . $nom . "<br>Adresse Monero : " . $adresseXMR . "<br>Message : " . $message;
	$message_html = "<html><head></head><body>Sujet : " . $sujet . "<br>Nom : " . $nom . "<br>Adresse Monero : " . $adresseXMR . "<br>Message : " . $message . "</body></html>";
	//==========

	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Nouveau message envoyé via Give Me Monero !";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: \" " . $nom . "\"<" . $mail . ">".$passage_ligne;
	$header.= "Reply-to: \" " . $nom . "\"<" . $mail . ">".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========

	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format texte.
	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_txt.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format HTML
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	//==========
	 
	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
	//==========
}
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
							<h2>Contact</h2>
							<p>
								<form action="contact.php" method="post">
									Votre nom : <br><input type="text-center" name="nom" required size="40"><br>
									Votre email : <br><input type="text-center" name="mail" required size="40"><br>
									Votre adresse Monero : <br><input type="text" name="adresseXMR" required size="40" <?php if(!empty($_SESSION['adresseXMR'])){echo $_SESSION['adresseXMR'];} ?>><br>
									Sujet : <br><input type="text" name="sujet" required size="40"><br>
									Message : <br><textarea name="message" rows="7" cols="40" required></textarea><br>
									<input type="submit">
								</form>
							</p>
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