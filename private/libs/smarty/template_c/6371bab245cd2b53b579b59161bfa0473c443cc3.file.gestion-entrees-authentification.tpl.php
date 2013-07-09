<?php /* Smarty version Smarty3rc4, created on 2011-11-02 11:30:41
         compiled from "C:/wamp/www/billetterie/private/tpl/gestion-entrees-authentification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:266094eb129e10eaef2-94513260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6371bab245cd2b53b579b59161bfa0473c443cc3' => 
    array (
      0 => 'C:/wamp/www/billetterie/private/tpl/gestion-entrees-authentification.tpl',
      1 => 1320233438,
    ),
  ),
  'nocache_hash' => '266094eb129e10eaef2-94513260',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="gestion-entrees">
	<label for="identifiant">Votre identifiant : </label>
	<input type="text" name="identifiant" id="identifiant" />
	<br />
	<br />
	<label for="password">Code secret : </label>
	<input type="password" name="password" id="password" />
	<br />
	<button class="authentification">Valider</button>
</div>