<?php

//=====Si l'utilisateur n'est pas loggé on le redirige vers la page d'authentification
if(!isset($_SESSION['user'])){
	$view = "authentification";
}
//==========

?>