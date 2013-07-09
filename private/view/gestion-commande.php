<?php

//=====Si l'utilisateur n'est pas loggé on le redirige vers la page d'authentification
if(!isset($_SESSION['user'])){
	$view = "authentification";
}
//=========
else{
	
	$table_billet = new Billet();
	$table_commande = new Commande();
	
	//=====calcul du total commande
	$filtre_demi_tarif[] = array(
		'champ' => 'billet_demi_tarif',
		'valeur' => 'oui'
	);
	$total_demi_tarif = $table_billet->getCount($filtre_demi_tarif);
	$filtre_tarif_plein[] = array(
		'champ' => 'billet_demi_tarif',
		'valeur' => 'non'
	);
	$total_tarif_plein = $table_billet->getCount($filtre_tarif_plein);
	$total_commande = ($prix_unitaire_billet*$total_tarif_plein)+(($prix_unitaire_billet/2)*$total_demi_tarif);
	//==========
	
	//=====calcul du panier moyen
	$nb_commande = $table_commande->getCount();
	if ($nb_commande!=0)
	$panier_moyen = round(($total_commande/$nb_commande), 2);
	//==========
	
	//=====requete renvoyant un tableau des commandes
	$field = array('commande_date', 'commande_id', 'commande_fk_client_id', 'client_nom', 'client_prenom', 'commande_etat');
	$tri = array('commande_date'=>'ASC');
	$commande = $table_commande->getCommande($field, null, $tri, 0, $pagination['nb_per_page']);
	//==========
	
	//=====On parcours les commandes
	foreach($commande as $key=>$c){
		//On compte le nombre de billet plein tarif et demi-tarif avec getCount()
		//=====where de la requete
		$filtre_demi = array();
		$filtre_plein = array();
		
		$filtre_demi[] = array(
			'champ' => 'billet_demi_tarif',
			'valeur' => 'oui'
		);
		$filtre_demi[] = array(
			'champ' => 'billet_fk_commande_id',
			'valeur' => $commande[$key]['commande_id']
		);
		$filtre_plein[] = array(
			'champ' => 'billet_demi_tarif',
			'valeur' => 'non'
		);
		$filtre_plein[] = array(
			'champ' => 'billet_fk_commande_id',
			'valeur' => $commande[$key]['commande_id']
		);
		//==========
	
		//nombre de billet plein tarif = $table_billet->getCount($filtre_plein) et nombre de billet demi tarif = $table_billet->getCount($filtre_demi)
		//on obtient ainsi le prix
		$prix = ($prix_unitaire_billet*$table_billet->getCount($filtre_plein))+(($prix_unitaire_billet/2)*$table_billet->getCount($filtre_demi));
		
		//=====mise en forme des variables dans le tableau de la commande correspondante
		$commande[$key]['prix'] = $prix;
		$commande[$key]['commande_date'] = formatDate($commande[$key]['commande_date']);
		$commande[$key]['commande_fk_client_id'] = jenesuispasunzero($commande[$key]['commande_fk_client_id']);
		$commande[$key]['commande_id'] = jenesuispasunzero($commande[$key]['commande_id']);
		//==========
	}
	//==========
	
	//=====on calcule le nombre de pages max de la pagination
	$pagination['max'] = ceil($nb_commande / $pagination['nb_per_page']);
	//==========
	
	//=====On assigne les valeurs pour smarty
	$_S->assign('pagination', $pagination);
	$_S->assign('commande', $commande);
	$_S->assign('panier_moyen', $panier_moyen);
	$_S->assign('total_commande', $total_commande);
	//==========

}
?>