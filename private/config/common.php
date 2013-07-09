<?php

//Si debug true : utiliser trace($_SQL) pour afficher toutes les requetes et leur temps d'execution
define ('DEBUG_SQL', true);

/**
 * Constante pour la base de données
 */
define('BD_HOST', 'mysql51-75.bdb');
define('BD_LOGIN', 'deswebcrmutu');
define('BD_MDP', 'VsXSzSNa');
define('BD_BASE', 'deswebcrmutu');

/**
 * Constante pour les chemins d'acces
 */
define ('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/billetterie/');
define ('ROOT_URL', 'http://jeremy-dartois.desweb-creation.fr/billetterie/');
define ('PRIVATE_PATH', ROOT_PATH.'private/');
define ('CONFIG_PATH', PRIVATE_PATH.'config/');
define ('LIBS_PATH', PRIVATE_PATH.'libs/');
define ('CLASSE_PATH', PRIVATE_PATH.'class/');
define ('TPL_PATH', PRIVATE_PATH.'tpl/');
define ('ACTION_PATH', PRIVATE_PATH.'action/');
define ('VIEW_PATH', PRIVATE_PATH.'view/');
// variable necessaire a la librairie FPDF pour localiser les polices
define ('FPDF_FONTPATH', PRIVATE_PATH.'libs/font/');

/**
 * Constante pour les chemins d'acces au front (interface)
 */
define ('FRONT_URL', ROOT_URL.'front/');
define ('FRONT_PATH', ROOT_PATH.'front/');
define ('CSS_URL', FRONT_URL.'css/');
define ('IMAGE_URL', FRONT_URL.'image/');
define ('IMAGE_CSS_URL', FRONT_URL.'css/image/');
define ('IMAGE_PATH', FRONT_PATH.'image/');
define ('JS_URL', FRONT_URL.'js/');


$prix_unitaire_billet = "8";

?>
