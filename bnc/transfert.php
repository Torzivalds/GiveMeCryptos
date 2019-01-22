<?php
session_start();
if (empty($_SESSION['adresseBNC'])) {
	header("Location: compte.php");
}
else{
	if (!empty($_GET['val']) && htmlspecialchars($_GET['val']) == 'oui') {
		//On envoi un mail comme quoi le gars veut un transfert
		
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
		$message_txt = "Adresse BNC : " . $_SESSION['adresseBNC'];
		$message_html = "<html><head></head><body>Adresse BNC : " . $_SESSION['adresseBNC'] . "</body></html>";
		//==========

		//=====Création de la boundary
		$boundary = "-----=".md5(rand());
		//==========
		 
		//=====Définition du sujet.
		$sujet = "Demande de transfert de fonds sur Give Me Bytecoin.";
		//=========
		 
		//=====Création du header de l'e-mail.
		$header = "From: \"Anonyme\"<anonyme@givemeBytecoin.fr>".$passage_ligne;
		$header.= "Reply-to: \"Anonyme\" <anonyme@givemeBytecoin.fr>".$passage_ligne;
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
}
?>


<!DOCTYPE HTML>
<html>
	<head>
	<?php include 'Fonctions/inclusionsHeader.html'; ?>
	<title>Demander à transfèrer les fonds - Give me Bytecoin</title>
	</head>
	<body>
	
	<div id="page">
	<?php include 'Fonctions/menu.php'; ?>
	<br><br><br><br><br><br>
	<div class="ubea-section-overflow" style="text-align: center; ">
		<p>
			Adresse du porte feuille Bytecoin :<br><input type="text" name="adresseBNC" value="<?php echo htmlspecialchars($_SESSION['adresseBNC']); ?>" size="50"><br>
			Êtes-vous sûr de vouloir faire une demande de transfert des fonds présents sur ce compte ?<br>
			<a href="transfert.php?val=oui">Oui, je le veux</a>
		</p>
	</div>
	</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<style type="text/css">.ubea-loader{ display: none; }</style>
	</body>
</html>