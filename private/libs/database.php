<?php

$_SQL = array();
$_SQL['list'] = array();
$_SQL['nb_sql'] = 0;
$_SQL['time_sql'] = 0;

$db = null;

/**
 * Connexion a la base de données avec les identifiants donnés en config/common.php
 * @param STRING hôte
 * @param STRING login
 * @param STRING mdp
 * @param STRING base
 * @return BOOL true ou false si connecté avec succès
 *
 */
function database_login($bdHost=BD_HOST, $bdLogin=BD_LOGIN, $bdPass=BD_MDP, $bdBase=BD_BASE)
{
	global $db;
	$db = @mysql_connect($bdHost, $bdLogin, $bdPass);
	// si la connexion a échoué
	if(!$db) return false;
	mysql_select_db($bdBase, $db);
	mysql_set_charset('utf8');
	return true;
}


/**
 * Remplacement de la fonction query
 *
 * @param string $rq (la requete SQL)
 * @return resource
 */
function query($rq)
{
	//En mode debug (cf. config/common.php) : création d'un tableau avec la liste des requêtes et leur temps d'exécution
	if (DEBUG_SQL)
	{
		global $_SQL;
		$t1 = microtime(true);
		$rs = mysql_query($rq . ';');
		$t2 = microtime(true);
		$rq = str_replace("\n", ' ', $rq);
		$rq = str_replace("\t", ' ', $rq);
		$rq = str_replace("\r", ' ', $rq);
		$_SQL['list'][] = array('sql' => $rq, 'time' => $t2-$t1);
		$_SQL['nb_sql']++;
		$_SQL['time_sql']+=$t2-$t1;
	}
	else
	{
		$rs = mysql_query($rq . ';');
	}

	//En cas d'erreur, affichage de l'erreur
	if (!$rs) {

		echo '<h1 class="titre">Erreur SQL : "'.bd_error().'"</h1>';
		echo '<strong>La requête :</strong> '.$rq;
		echo '<br/><strong>Trace de l\'erreur : </strong><br/>';
		trace(debug_backtrace());
		database_logout();
		exit();
	}
	return $rs;
}

/**
 * Remplacement de la fonction mysql_fetch_assoc
 *
 * @param ressource $rs
 * @return array
 */
function fetch_assoc(&$rs)
{
	return mysql_fetch_assoc($rs);
}

/**
 * Retourne l'ensemble des résultats obtenus
 * par un fetch_assoc
 *
 * @param ressource $rs
 * @return array
 *
 */
function fetch_assoc_all(&$rs)
{
	$rw = array();
	while($row = mysql_fetch_assoc($rs))
		$rw[] = $row;
	return $rw;
}

/**
 * Remplacement de la fonction mysql_fetch_array
 *
 * @param ressource $rs
 * @return array
 */
function fetch_array(&$rs) {
	return mysql_fetch_array($rs);
}

/**
 * Remplacement de la fonction mysql_fetch_row
 *
 * @param ressource $rs
 * @return array
 */
function fetch_row(&$rs) {
	return mysql_fetch_row($rs);
}

/**
 * Remplacement de la fonction mysql_num_rows
 *
 * @param resource $rs
 * @return int
 */
function num_rows(&$rs) {
	return mysql_num_rows($rs);
}

/**
 * Remplacement de la fonction mysql_result
 *
 * @param resource $rs
 * @return int
 */

function result(&$rs) {
	return mysql_result($rs, 0);
}

/**
 * Remplacement de la fonction insert_id
 *
 * @return int
 */
function insert_id() {
	return mysql_insert_id();
}

/**
 * Remplacement de la fonction real_escape_string en prenant en compte les magic_quotes
 *
 * @param string $string
 * @return string
 */
function escape_string(&$string) {
	if (get_magic_quotes_gpc()) {
		$string = stripslashes($string);
	}

	return mysql_real_escape_string($string);
}

/**
 * Remplacement de la fonction free_result
 *
 * @param resource $rs
 */
function free_result($rs)
{
	mysql_free_result($rs);
}

/**
 * Remplacement de la fonction error
 *
 * @return string
 */
function bd_error()
{
	return mysql_error();
}

/**
 * Deconnexion de la base de donnee
 *
 * @return bool
 */
function database_logout()
{
	global $db;
	return @mysql_close($db);
}


?>