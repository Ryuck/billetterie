<?php
//===== Alors oui, il sert à rien, mais j'avais pas envie de le supprimer =====//
if(isset($_GET['commande'])){
	$table_billet = new Billet();
	$filtres = array();
	$filtres[] = array('champ' => 'commande_id', 'valeur' => $_GET['commande']);
	$champ = array('billet_numero', 'billet_demi_tarif');
	$billet_result = $table_billet->getInfoBillet($filtres, $champ);
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

	include(ACTION_PATH.'generatebilletpdf.php');
}
?>