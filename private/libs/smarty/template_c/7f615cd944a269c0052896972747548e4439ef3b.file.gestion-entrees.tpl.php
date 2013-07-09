<?php /* Smarty version Smarty3rc4, created on 2013-06-06 00:21:40
         compiled from "/homez.488/deswebcr/www/ryuk/billetterie/private/tpl/gestion-entrees.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134084980651afb9f42a5929-99211585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f615cd944a269c0052896972747548e4439ef3b' => 
    array (
      0 => '/homez.488/deswebcr/www/ryuk/billetterie/private/tpl/gestion-entrees.tpl',
      1 => 1364834976,
    ),
  ),
  'nocache_hash' => '134084980651afb9f42a5929-99211585',
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
