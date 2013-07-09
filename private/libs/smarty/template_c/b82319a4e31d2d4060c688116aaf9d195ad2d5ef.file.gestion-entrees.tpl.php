<?php /* Smarty version Smarty3rc4, created on 2011-11-07 18:28:03
         compiled from "C:/wamp/www/billetterie/private/tpl/gestion-entrees.tpl" */ ?>
<?php /*%%SmartyHeaderCode:284574eb8233369a402-00796535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b82319a4e31d2d4060c688116aaf9d195ad2d5ef' => 
    array (
      0 => 'C:/wamp/www/billetterie/private/tpl/gestion-entrees.tpl',
      1 => 1320690044,
    ),
  ),
  'nocache_hash' => '284574eb8233369a402-00796535',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Gestion des billets</a></li>
			<li><a href="#tabs-2">Trouver un client</a></li>
			<li class="quit"><a href="#tabs-3">Déconnexion</a></li>
		</ul>
		<div id="tabs-1">
			<p>Scannez ou entrez ici le numéro du billet (13 caractères)</p>
			<input type="text" id="numbillet" name="numbillet" />
			<button class="recherche">Valider</button>
			<div class="result-content"></div>
		</div>
		<div id="tabs-2">
			<p>Nom de la personne apparaissant sur la facture</p>
			<input type="text" id="nomclient" name="nomclient" />
			<button class="recherche">Valider</button>
			<div class="result-content"></div>
		</div>
		
	</div>
