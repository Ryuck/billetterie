<?php

$table_users = new User();

//=====Simple vérification de la connection des admins et hotesses
/** 
 * Exemple admin : Ident = sd-admin01 && Pass = !sd@a01
 * Exemple hotesse : Ident = sd-hotesse01 && pass = !sd@h01
 **/

if(isset($_POST['ident']) && isset($_POST['pass'])){
	$filtres = array();
	$filtres[] = array('champ' => 'users_pseudo', 'valeur' => $_POST['ident']);
	$filtres[] = array('champ' => 'users_pass', 'valeur' => sha1($_POST['pass']));

	$user = $table_users->getAll($filtres);

	if($user!=null){
		//si l'utilisateur existe dans la bdd on ajoute une variable de session
		$_SESSION['user'] = $user['0']['users_pseudo'];
		//et une variable de session définissant son "rang" (hotesse ou admin)
		$_SESSION['user_categorie'] = $user['0']['users_pseudo'];
		
		if($_SESSION['user_categorie'] == "admin") //Si il est admin on le redirige vers la gestion des commandes
		header("Location: ".ROOT_URL."gestion-commande.html");
		else if($_SESSION['user_categorie'] == "hotesse") //si c'est une hotesse on la redirige vers la gestion des entrees
		header("Location: ".ROOT_URL."gestion-entrees.html");
	}
}
//==========

?>