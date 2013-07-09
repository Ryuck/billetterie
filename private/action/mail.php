<?php

/**********************************************************************/
//  Attention pour mail besoin de config le php.ini en local          //
/**********************************************************************/

/** Premier cas ou l'utilisateur souhaite juste ré-envoyer les billets par mails **/
if(isset($_GET['billet'])){
	if(isset($_GET['commande'])){
		//=====On récupére toutes les infos nécessaires à la génération des billets
		$table_billet = new Billet();
		$filtres = array();
		$filtres[] = array('champ' => 'commande_id', 'valeur' => $_GET['commande']);
		$champ = array('billet_numero', 'billet_demi_tarif');
		$billet_result = $table_billet->getInfoBillet($filtres, $champ);
		//==========
		
		//=====On met en forme pour que les variables correspondent avec celles de l'action de génération du pdf
		$billet=array();
		foreach($billet_result as $key=>$b){
			$billet[$key]['numero'] = $billet_result[$key]['billet_numero'];
			if ($billet_result[$key]['billet_demi_tarif']=="oui"){
				$billet[$key]['tarif'] = "demi-tarif";
				$billet[$key]['prix'] = "4";
				
			}
			else{
				$billet[$key]['tarif'] = "plein tarif";
				$billet[$key]['prix'] = "8";
			}
		}
		//==========
		
		//=====On genere le pdf
		include(LIBS_PATH.'phpToPDF.php');
		include(ACTION_PATH.'generatebilletpdf.php');
		//==========
	}
	
	// Déclaration de l'adresse de destination.
	$table_commande = new Commande();
	$filtres_mail = array();
	$filtres_mail[] = array('champ' => 'commande_id', 'valeur' => $_GET['commande']);
	$champ_mail = array('client_email');
	$mail = $table_commande->getCommande($champ_mail, $filtres_mail);
	$mail = $mail['0']['client_email'];
	
	// On filtre les serveurs qui rencontrent des bogues.
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	
	//=====Déclaration du message au format HTML.
	$message_html = "<html><head></head><body>Bonjour,<br />
	<p>Voici en pièces jointes de cet email vos billets au format PDF.</p>
	<p><b>Merci de les imprimer afin de les présenter à l'entrée du salon.</b></p>
	<p>Chaque billet donne droit à une seule entrée, pour plus d'informations veuillez consulter les conditions générales
	de vente.</p>
	<p>Cordialement, <br />
	L'équipe du Salon de la décoration.</p>
	</body></html>";
	//==========
	
	//=====Encryptage du pdf 
	$pdfcontentbillet = chunk_split(base64_encode($pdfcontentbillet));
	//==========
	
	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Réservation salon de la décoration";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: Salon de la decoration <contact@salondeladecoration.fr>".$passage_ligne;
	$header.= "Reply-to: contact@salondeladecoration.fr".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
	$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
	//=====Ajout du message au format HTML
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
	//==========
	
	//==========
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout de la pièce jointe.
	$message.= "Content-Type: application/pdf; name=\"ebillet.pdf\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
	$message.= "Content-Disposition: attachment; filename=\"ebillet.pdf\"".$passage_ligne;
	$message.= $passage_ligne.$pdfcontentbillet.$passage_ligne.$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
	//========== 
	 
	//=====Envoi de l'e-mail.
	var_dump($sujet);
	var_dump($message);
	var_dump($header);
	mail($mail,$sujet,$message,$header);
	//==========
	
}
/** Ou alors c'est un nouvel inscrit, on envoie facture+billet **/
else{ 
	//=====Génération des Pdfs
	include(LIBS_PATH.'phpToPDF.php');
	include(ACTION_PATH.'generatebilletpdf.php');

	include(ACTION_PATH.'generatefacturepdf.php');
	//==========

	//=====On filtre les serveurs qui rencontrent des bogues.
	$mail = $newclient['email'];
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	//==========
	
	//=====Déclaration du message au format HTML.
	$message_html = "<html><head></head><body>Bonjour,<br />
	<p>Vous venez de réserver vos billets pour le salon de la décoration qui se déroule les 6, 7, 8 Mars 2012 à Lille Grand Palais.
	Vous trouverez en pièces jointes de cet email votre facture et vos billets au format PDF.</p>
	<p><b>Merci de les imprimer afin de les présenter à l'entrée du salon.</b></p>
	<p>Chaque billet donne droit à une seule entrée, pour plus d'informations veuillez consulter les conditions générales
	de vente.</p>
	<p>Cordialement, <br />
	L'équipe du Salon de la décoration.</p>
	</body></html>";
	//==========
	
	//=====Encryptage des pdf 
	$pdfcontentbillet = chunk_split(base64_encode($pdfcontentbillet));
	$pdfcontentfacture = chunk_split(base64_encode($pdfcontentfacture));
	//==========
	
	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Réservation salon de la décoration";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: Salon de la decoration <contact@salondeladecoration.fr>".$passage_ligne;
	$header.= "Reply-to: contact@salondeladecoration.fr".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
	$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
	//=====Ajout du message au format HTML
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
	//==========
	
	//==========
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout de la pièce jointe pdf billets
	$message.= "Content-Type: application/pdf; name=\"ebillet.pdf\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
	$message.= "Content-Disposition: attachment; filename=\"ebillet.pdf\"".$passage_ligne;
	$message.= $passage_ligne.$pdfcontentbillet.$passage_ligne.$passage_ligne;
	//========== 
	
	//==========
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout de la pièce jointe pdf facture
	$message.= "Content-Type: application/pdf; name=\"facture.pdf\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
	$message.= "Content-Disposition: attachment; filename=\"facture.pdf\"".$passage_ligne;
	$message.= $passage_ligne.$pdfcontentfacture.$passage_ligne.$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
	//========== 
	 
	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
	//==========
}
?>