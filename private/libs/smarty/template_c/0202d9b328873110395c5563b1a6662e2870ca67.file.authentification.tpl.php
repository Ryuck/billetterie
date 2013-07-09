<?php /* Smarty version Smarty3rc4, created on 2011-11-22 19:54:07
         compiled from "C:/wamp/www/billetterie/private/tpl/authentification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190064ecbfddfdb12d7-51115703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0202d9b328873110395c5563b1a6662e2870ca67' => 
    array (
      0 => 'C:/wamp/www/billetterie/private/tpl/authentification.tpl',
      1 => 1320233438,
    ),
  ),
  'nocache_hash' => '190064ecbfddfdb12d7-51115703',
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