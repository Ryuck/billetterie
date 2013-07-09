<?php
//=====Si la personne est déjà identifié elle posséde une variable de session user
if(isset($_SESSION['user'])){
	//=====et une variable de session user_categorie
	if($_SESSION['user_categorie'] == "admin") //Si il est admin on le redirige vers la gestion des commandes
		header("Location: ".ROOT_URL."gestion-commande.html");
	else if($_SESSION['user_categorie'] == "hotesse") //si c'est une hotesse on la redirige vers la gestion des entrees
		header("Location: ".ROOT_URL."gestion-entrees.html");
	//==========
}
//==========
?>