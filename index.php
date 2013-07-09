<?php

if (isset($_REQUEST['xml'])) {
	header("content-type: application/xml; charset=utf-8");
} else {
	header("content-type: text/html; charset=utf-8");
}

//includes
include('private/config/common.php');
include(LIBS_PATH.'smarty.php');
include(LIBS_PATH.'database.php');
include(LIBS_PATH.'function.php');
include(CLASSE_PATH.'common.php');
include(CLASSE_PATH.'client.php');
include(CLASSE_PATH.'commande.php');
include(CLASSE_PATH.'billet.php');
include(CLASSE_PATH.'facture.php');
include(CLASSE_PATH.'user.php');

//connexion base de données
database_login();
//démarrage de la session
session_start();

//Gestion pagination
$pagination = array();
$pagination['nb_per_page']= 10;
$pagination['current'] = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
$pagination['max'] = 0;
$pagination['debut'] = ($pagination['current'] -1) * $pagination['nb_per_page'];

//Gestion parametres
$action =  isset($_REQUEST['act']) && $_REQUEST['act'] ? $_REQUEST['act'] : '';
$view =  isset($_REQUEST['view']) && $_REQUEST['view'] ? $_REQUEST['view'] : 'accueil';

//echo xml pour gestion interne en onglet (ajax)
if (isset($_REQUEST['xml'])) {
	echo '<?xml version="1.0" encoding="utf-8"?><info>';
}

//Actions
if (file_exists(ACTION_PATH . htmlentities($action) . '.php')) {
	include ACTION_PATH . htmlentities($action) . '.php';
}

//Visu
if (!$action && file_exists(VIEW_PATH . htmlentities($view) . '.php')) {
	include VIEW_PATH . htmlentities($view) . '.php';
}

//deconnexion base de donnée
database_logout();

$_S->assign('view', $view);

//Gestion affichage template
if (isset($_REQUEST['xml'])) {
	echo '</info>';
	exit();
}

//Création du fil d'ariane en fonction de la vue
switch($view){
	case "authentification":
		$_S->assign('ariane', '<div><a href="'.ROOT_URL.'" >Accueil</a></div>
		<div class="puce"></div> 
		<div>Authentification</div>');
	break;
	case "gestion-commande":
		$_S->assign('ariane', '<div><a href="'.ROOT_URL.'" >Accueil</a></div>
		<div class="puce"></div> 
		<div><a href="'.ROOT_URL.'authentification.html">Authentification de l\'utilisateur</a></div>
		<div class="puce"></div> 
		<div>Gestion des commandes</div>');
	break;
	case "gestion-entrees":
		$_S->assign('ariane', '<div><a href="'.ROOT_URL.'" >Accueil</a></div>
		<div class="puce"></div> 
		<div><a href="'.ROOT_URL.'authentification.html">Authentification de l\'utilisateur</a></div>
		<div class="puce"></div> 
		<div>Gestion des entrées</div>');
	break;
	case "reservation-form":
		$_S->assign('ariane', '<div><a href="'.ROOT_URL.'" >Accueil</a></div>
		<div class="puce"></div> 
		<div>Formulaire de réservation</div>');
	break;
	case "reservation-recap":
		$_S->assign('ariane', '<div><a href="'.ROOT_URL.'" >Accueil</a></div>
		<div class="puce"></div> 
		<div><a href="'.ROOT_URL.'reservation-form.html">Formulaire de réservation</a></div>
		<div class="puce"></div> 
		<div>Récapitulatif du formulaire de réservation</div>');
	break;
}

$_S->display('page.tpl');

?>