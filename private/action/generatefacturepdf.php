<?php

$PDF=new phpToPDF();
$PDF->AddPage();
$PDF->SetFont('Arial','B',16);

//=====Définition des propriétés du tableau "Client facturé & References"
$proprietesTableau = array(
	'TB_ALIGN' => 'C',
	'L_MARGIN' => 0,
	'BRD_COLOR' => array(0,0,0),
	'BRD_SIZE' => '0.3',
);
//==========

//=====Définition des propriétés du header du tableau "Client facturé & References"
$proprieteHeader = array(
	'T_COLOR' => array(0, 0, 0),
	'T_SIZE' => 12,
	'T_FONT' => 'Arial',
	'T_ALIGN' => 'C',
	'V_ALIGN' => 'M',
	'T_TYPE' => 'B',
	'LN_SIZE' => 7,
	'BG_COLOR_COL0' => array(255, 255, 255),
	'BG_COLOR' => array(255, 255, 255),
	'BRD_COLOR' => array(0, 0, 0),
	'BRD_SIZE' => 0.2,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
);
//==========

//=====Contenu du header du tableau "Client facturé & References"
$contenuHeader = array(
	80, 20, 80,
	"Client Facturé", "", "Références",
);
//==========

//=====Définition des propriétés du reste du contenu du tableau "Client facturé & References"
$proprieteContenu = array(
	'T_COLOR' => array(0,0,0),
	'T_SIZE' => 10,
	'T_FONT' => 'Arial',
	'T_ALIGN_COL0' => 'L',
	'T_ALIGN' => 'L',
	'V_ALIGN' => 'M',
	'T_TYPE' => '',
	'LN_SIZE' => 6,
	'BG_COLOR_COL0' => array(255, 255, 255),
	'BG_COLOR' => array(255,255,255),
	'BRD_COLOR' => array(0,0,0),
	'BRD_SIZE' => 0.1,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
);
//==========

//=====Contenu du tableau "Client facturé & References"
$contenuTableau = array(
	' '.$newclient['civilite'].' '.$newclient['prenom'].' '.$newclient['nom'].' 
	'.$newclient['adresse'].' 
	'.$newclient['cp'].' '.$newclient['ville'], "", 
	' N° Commande : '.jenesuispasunzero($commande_id).' 
	N° Facture : '.$newfacture['mois'].$newfacture['jour'].'-'.$client_id.'-'.$facture_id.' 
	Date de la facture : '.$newfacture['jour'].'-'.$newfacture['mois'].'-'.$newfacture['annee'].'
	N° Client : CL'.jenesuispasunzero($client_id),
);
//==========

//=====Définition des propriétés du tableau "info sur billet(s)"
$proprietesTableauDeux = array(
	'TB_ALIGN' => 'C',
	'L_MARGIN' => 0,
	'BRD_COLOR' => array(0,0,0),
	'BRD_SIZE' => '0.3',
);
//==========

//=====Définition des propriétés du header du tableau "info sur billet(s)"
$proprieteHeaderDeux = array(
	'T_COLOR' => array(0, 0, 0),
	'T_SIZE' => 12,
	'T_FONT' => 'Arial',
	'T_ALIGN' => 'C',
	'V_ALIGN' => 'M',
	'T_TYPE' => 'B',
	'LN_SIZE' => 7,
	'BG_COLOR_COL0' => array(255, 255, 255),
	'BG_COLOR' => array(255, 255, 255),
	'BRD_COLOR' => array(0, 0, 0),
	'BRD_SIZE' => 0.2,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
);
//==========

//=====Contenu du header du tableau "info sur billet(s)"
$contenuHeaderDeux = array(
	80, 20, 25, 25, 30,
	"Désignation", "Qté", "Prix Unitaire
	TTC", "Remise", "Montant
	TTC",
);
//==========

//=====Définition des propriétés du reste du contenu du tableau "info sur billet(s)"
$proprieteContenuDeux = array(
	'T_COLOR' => array(0,0,0),
	'T_SIZE' => 10,
	'T_FONT' => 'Arial',
	'T_ALIGN_COL0' => 'C',
	'T_ALIGN' => 'C',
	'V_ALIGN' => 'M',
	'T_TYPE' => '',
	'LN_SIZE' => 6,
	'BG_COLOR_COL0' => array(255, 255, 255),
	'BG_COLOR' => array(255,255,255),
	'BRD_COLOR' => array(0,0,0),
	'BRD_SIZE' => 0.1,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
);	
//==========

//=====Contenu du tableau "info sur billet(s)"
if($nb_billet%2 == 0){
		$totalTTC = $prix_unitaire_billet * ($nb_billet*0.75);
		$nb_billet_demi = $nb_billet/2;
		$nb_billet_plein = $nb_billet_demi;
	}else{
		$totalTTC = $prix_unitaire_billet * ((($nb_billet-1)*0.75)+1);
		$nb_billet_demi = floor($nb_billet/2);
		$nb_billet_plein = floor($nb_billet/2)+1;
}
if($nb_billet>0){
	$contenuTableauDeux = array(
		' Entrée Plein Tarif', 
		$nb_billet_plein, 
		$prix_unitaire_billet.'.00 euros', 
		'-', 
		$prix_unitaire_billet*$nb_billet_plein.'.00 euros',
	);
	if($nb_billet_demi>0){
		$contenuTableauDeux = array(
			' Entrée Plein Tarif', 
			$nb_billet_plein, 
			$prix_unitaire_billet.'.00 euros', 
			'-', 
			$prix_unitaire_billet*$nb_billet_plein.'.00 euros',
			' Entrée Tarif Réduit', 
			$nb_billet_demi, 
			$prix_unitaire_billet.'.00 euros', 
			'-50%', 
			($prix_unitaire_billet/2)*$nb_billet_demi.'.00 euros',
		);
	}
}
//==========

//=====Définition des propriétés du tableau "Totaux"
$proprietesTableauTrois = array(
	'TB_ALIGN' => 'L',
	'L_MARGIN' => 35,
	'BRD_COLOR' => array(0,0,0),
	'BRD_SIZE' => '0.3',
);
//==========

//=====Définition des propriétés du header du tableau "Totaux"
$proprieteHeaderTrois = array(
	'T_COLOR' => array(0, 0, 0),
	'T_SIZE' => 12,
	'T_FONT' => 'Arial',
	'T_ALIGN' => 'C',
	'V_ALIGN' => 'M',
	'T_TYPE' => 'B',
	'LN_SIZE' => 7,
	'BG_COLOR_COL0' => array(255, 255, 255),
	'BG_COLOR' => array(255, 255, 255),
	'BRD_COLOR' => array(0, 0, 0),
	'BRD_SIZE' => 0.2,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
);
//==========

//=====Contenu du header du tableau "Totaux"
$contenuHeaderTrois = array(
	50, 50, 50,
	"Total HT", "Total TVA 5.5%", "Total TTC",
);
//==========

//=====Définition des propriétés du reste du contenu du tableau "Totaux"
$proprieteContenuTrois = array(
	'T_COLOR' => array(0,0,0),
	'T_SIZE' => 10,
	'T_FONT' => 'Arial',
	'T_ALIGN_COL0' => 'C',
	'T_ALIGN' => 'C',
	'V_ALIGN' => 'M',
	'T_TYPE' => '',
	'LN_SIZE' => 6,
	'BG_COLOR_COL0' => array(255, 255, 255),
	'BG_COLOR' => array(255,255,255),
	'BRD_COLOR' => array(0,0,0),
	'BRD_SIZE' => 0.1,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
);	
//==========

//=====Contenu du tableau "Totaux"
$contenuTableauTrois = array(
	number_format(($totalTTC-$totalTTC*0.055), 2).' euros', number_format(($totalTTC*0.055), 2).' euros', $totalTTC.'.00 euros',
);
//==========	

//=====Ajout des tableaux et du texte dans le pdf
$PDF->MultiCell(0, 10, "FACTURE\nSALON DE LA DECORATION DE LILLE\n\n", 0, "C", 0);
$PDF->drawTableau($PDF, $proprietesTableau, $proprieteHeader, $contenuHeader, $proprieteContenu, $contenuTableau);
$PDF->Ln(15);
$PDF->drawTableau($PDF, $proprietesTableauDeux, $proprieteHeaderDeux, $contenuHeaderDeux, $proprieteContenuDeux, $contenuTableauDeux);
$PDF->Ln(15);
$PDF->drawTableau($PDF, $proprietesTableauTrois, $proprieteHeaderTrois, $contenuHeaderTrois, $proprieteContenuTrois, $contenuTableauTrois);
$PDF->Ln(20);
$PDF->MultiCell(0, 10, "Facture libellée en euros.\nRèglement effectué par Carte Bancaire.", 0, "L", 0);
//==========

//=====génération du pdf
if(isset($_GET['output']) && $_GET['output']) //si on demande simplement un affichage
	$PDF->Output();
else //sinon on le génére "à la volée" en le stockant dans une variable
	$pdfcontentfacture = $PDF->Output('facture_'.$newfacture['mois'].$newfacture['jour'].'-'.$client_id.'-'.$facture_id.'.pdf', "S");
//==========

?>