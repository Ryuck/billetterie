<?php
$table_client = new Client();
$table_commande = new Commande();
$table_billet = new Billet();
$table_facture = new Facture();

//====Creation du nouveau client
$newclient = array(
	'nom' => $_SESSION['nom'],
	'prenom' => $_SESSION['prenom'],
	'email' => $_SESSION['email'],
	'civilite' => $_SESSION['civilite'],
	'adresse' => $_SESSION['adresse1'].' '.$_SESSION['adresse2'],
	'ville' => $_SESSION['ville'],
	'cp' => $_SESSION['cp'],
	'nature' => $_SESSION['part_pro'],
	'bonplan' => $_SESSION['bonplan']
);

$client_id = $table_client->create($newclient);
//=========

//=====qui dit nouveau client dit forcément nouvelle commande !
$newcommande = array(
	'fk_client_id' => $client_id,
	'date' => date("Y-m-d H:i:s"),
	'etat' => 'Paiement accepté'
);
$commande_id = $table_commande->create($newcommande);
//===========

//=====qui dit nouvelle commande dit nouveau(x) billet(s) !
$billet = array();
for($i=0;$i<$_SESSION['nb_billet'];$i++){
	//pour chaque billet, je genere un nouveau num billet
	do{
		$num_billet = num_billet_generate();
	}while(!$table_billet->verif_billet($num_billet));
	$newbillet = array(
		'fk_commande_id' => $commande_id,
		'numero' => $num_billet
	);
	$billet[$i]['numero'] = $num_billet;
	if(($i+1)%2==0){
		$newbillet += array('demi_tarif' => 'oui');
		$billet[$i]['tarif'] = "demi-tarif";
		$billet[$i]['prix'] = "4";
	}
	else{
		$newbillet += array('demi_tarif' => 'non');
		$billet[$i]['tarif'] = "plein tarif";
		$billet[$i]['prix'] = "8";
	}

	$table_billet->create($newbillet);
}
//==========

//=====Et on lui crée une petite facture qui va avec
$newfacture = array(
	'fk_commande_id' => $commande_id,
	'date' => date("Y-m-d H:i:s")
);
$facture_id = $table_facture->create($newfacture);
//==========

//=====variables pour la generation du pdf de la facture
switch ($newclient['civilite']){
	case "Monsieur":
	$newclient['civilite'] = "Mr";
	break;
	case "Madame":
	$newclient['civilite'] = "Mme";
	break;
	case "Mademoiselle":
	$newclient['civilite'] = "Mlle";
	break;
}
$nb_billet = $_SESSION['nb_billet'];
$part = explode(' ', $newfacture['date']);
$part = explode('-', $part['0']);
$newfacture['jour'] = $part[2];
$newfacture['mois'] = $part[1];
$newfacture['annee'] = $part[0];
//==========

//=====envoie du mail (qui génére les pdfs avant)
include(ACTION_PATH.'mail.php');
//==========

?>