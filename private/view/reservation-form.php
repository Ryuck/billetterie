<?php

if((!isset($_SESSION['prenom']) || empty($_SESSION['prenom'])) && (!isset($_SESSION['nom']) || empty($_SESSION['nom'])) && (!isset($_SESSION['email']) || empty($_SESSION['email']))){
	$_SESSION['civilite'] = "";
	$_SESSION['nom'] = "";
	$_SESSION['prenom'] = "";
	$_SESSION['adresse1'] = "";
	$_SESSION['adresse2'] = "";
	$_SESSION['cp'] = "";
	$_SESSION['ville'] = "";
	$_SESSION['email'] = "";
	$_SESSION['nb_billet'] = "1";
	$_SESSION['part_pro'] = "particulier";
}

$_S->assign('civilite', $_SESSION['civilite']);
$_S->assign('nom', $_SESSION['nom']);
$_S->assign('prenom', $_SESSION['prenom']);
$_S->assign('adresse1', $_SESSION['adresse1']);
$_S->assign('adresse2', $_SESSION['adresse2']);
$_S->assign('cp', $_SESSION['cp']);
$_S->assign('ville', $_SESSION['ville']);
$_S->assign('email', $_SESSION['email']);
$_S->assign('nb_billet', $_SESSION['nb_billet']);
$_S->assign('part_pro', $_SESSION['part_pro']);

$prixbarre = $prix_unitaire_billet*$_SESSION['nb_billet'];
if($_SESSION['nb_billet']%2 == 0){
	$prix = $prix_unitaire_billet * ($_SESSION['nb_billet']*0.75);
}else{
	$prix = $prix_unitaire_billet * ((($_SESSION['nb_billet']-1)*0.75)+1);
}

$_S->assign('prixbase', $prix_unitaire_billet);
$_S->assign('prix', $prix);
$_S->assign('prixbarre', $prixbarre);

?>