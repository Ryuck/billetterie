<?php

//=====On vérifie qu'on a bien reçu les variables necessaires
if(isset($_POST['adresse1']) && isset($_POST['civilite']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['confirmemail']) && isset($_POST['nb_billet']) && isset($_POST['cp']) && isset($_POST['ville'])){
	//=====On enregistre le tout en session
	if($_POST['civilite']=="Mr")
		$_SESSION['civilite'] = "Monsieur";
	else if($_POST['civilite']=="Mme")
		$_SESSION['civilite'] = "Madame";
	else if($_POST['civilite']=="Mlle")
		$_SESSION['civilite'] = "Mademoiselle";
	$_SESSION['nom'] = $_POST['nom'];
	$_SESSION['prenom'] = $_POST['prenom'];
	$_SESSION['adresse1'] = $_POST['adresse1'];
	$_SESSION['adresse2'] = $_POST['adresse2'];
	$_SESSION['cp'] = $_POST['cp'];
	$_SESSION['ville'] = $_POST['ville'];
	$_SESSION['email'] = $_POST['email'];
	if(isset($_SESSION['bonplan']))
		$_SESSION['bonplan'] = "Oui";
	else
		$_SESSION['bonplan'] = "Non";
	$_SESSION['nb_billet'] = $_POST['nb_billet'];
	$_SESSION['part_pro'] = $_POST['part_pro'];
	//==========
}
//=====Sinon on redirige sur l'accueil
else{
	header('Location : ROOT_URL');
}
//==========

//=====Calcul du prix
$prixbarre = $prix_unitaire_billet*$_SESSION['nb_billet'];
if($_SESSION['nb_billet']%2 == 0){
	$prix = $prix_unitaire_billet * ($_SESSION['nb_billet']*0.75);
}else{
	$prix = $prix_unitaire_billet * ((($_SESSION['nb_billet']-1)*0.75)+1);
}
//==========

//=====On assigne les variables
$_S->assign('civilite', $_SESSION['civilite']);
$_S->assign('nom', STRTOUPPER($_SESSION['nom']));
$_S->assign('prenom', STRTOUPPER($_SESSION['prenom']));
$_S->assign('adresse1', STRTOUPPER($_SESSION['adresse1']));
$_S->assign('adresse2', STRTOUPPER($_SESSION['adresse2']));
$_S->assign('cp', $_SESSION['cp']);
$_S->assign('ville', STRTOUPPER($_SESSION['ville']));
$_S->assign('email', $_SESSION['email']);
$_S->assign('nb_billet', $_SESSION['nb_billet']);
$_S->assign('part_pro', $_SESSION['part_pro']);
$_S->assign('prixbase', $prix_unitaire_billet);
$_S->assign('prix', $prix);
$_S->assign('prixbarre', $prixbarre);
//==========

?>