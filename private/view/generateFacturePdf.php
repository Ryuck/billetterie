<?php

/** Cas où la facture est générée par un admin **/
if(isset($_GET['commande'])){
	$table_facture = new Facture();
	$table_billet = new Billet();
	
	//=====Requete pour obtenir les infos necessaires à la génération de la facture du client
	$filtres = array();
	$filtres[] = array('champ' => 'commande_id', 'valeur' => $_GET['commande']);
	$facture = $table_facture->getFacture($filtres);
	//==========
	
	//=====Mise en forme des variables
	switch ($facture['0']['client_civilite']){
		case "Monsieur":
			$facture['0']['client_civilite'] = "Mr";
		break;
		case "Madame":
			$facture['0']['client_civilite'] = "Mme";
		break;
		case "Mademoiselle":
			$facture['0']['client_civilite'] = "Mlle";
		break;
	}
	$part = explode(' ', $facture['0']['facture_date']);
	$part = explode('-', $part['0']);
	$dateJour = $part[2];
	$dateMois = $part[1];
	//==========
	
	//=====Compte et retourne le nombre de billet de la commande
	$fil = array();
	$fil[] = array('champ' => 'billet_fk_commande_id', 'valeur' => $_GET['commande']);
	$nb_billet = $table_billet->getCount($fil);
	//==========
	
	//====variables enregistrées dans un tableau $newclient pour correspondre avec les variables de l'action
	$newclient = array(
		'nom' => $facture['0']['client_nom'],
		'prenom' => $facture['0']['client_prenom'],
		'email' => $facture['0']['client_email'],
		'civilite' => $facture['0']['client_civilite'],
		'adresse' => $facture['0']['client_adresse'],
		'ville' => $facture['0']['client_ville'],
		'cp' => $facture['0']['client_cp']
	);
	//==========
	
	//=====Mise en forme des variables pour la correspondance
	$client_id = $facture['0']['client_id'];
	$commande_id = $_GET['commande'];
	$facture_id = $facture['0']['facture_id'];
	$part = explode(' ', $facture['0']['facture_date']);
	$part = explode('-', $part['0']);
	$newfacture['jour'] = $part[2];
	$newfacture['mois'] = $part[1];
	$newfacture['annee'] = $part[0];
	//==========
	
	//=====On inclut les fichiers pour la generation du pdf facture
	include(LIBS_PATH.'phpToPDF.php');
	include(ACTION_PATH.'generatefacturepdf.php');
	//==========
}
?>