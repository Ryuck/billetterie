<?php

$table_commande = new Commande();
$table_billet = new Billet();

//=====Récupération des données correspondantes à la page demandée
$pagination['current']=$_GET['page'];
$pagination['debut']=($pagination['current']-1)*$pagination['nb_per_page'];
$field = array('commande_date', 'commande_id', 'commande_fk_client_id', 'client_nom', 'client_prenom', 'commande_etat');
$tri = array('commande_date'=>'ASC');
$commande = $table_commande->getCommande($field, null, $tri, $pagination['debut'], $pagination['nb_per_page']);
//==========

//=====Pour chaque commande obtenue on met en forme les variables et on calcule le prix de la commande
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
$nb_commande = $table_commande->getCount();
$pagination['max']=ceil($nb_commande / $pagination['nb_per_page']);
//==========

//=====On assigne les valeurs pour smarty
$_S->assign('pagination', $pagination);
$_S->assign('commande', $commande);
//==========

//=====On génére ainsi du html dans une balise xml <result> pour la récupération en ajax 
echo '<result><![CDATA[';
echo $_S->fetch('commande-result.tpl');
echo ']]></result>';
//==========

?>