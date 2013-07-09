<?php /* Smarty version Smarty3rc4, created on 2013-06-06 00:14:27
         compiled from "/homez.488/deswebcr/www/ryuk/billetterie/private/tpl/authentification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69514766051afb6cfef37b6-20051499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e86a3f86f7fcee30f5bb9cae8e5aae085fb2f885' => 
    array (
      0 => '/homez.488/deswebcr/www/ryuk/billetterie/private/tpl/authentification.tpl',
      1 => 1370470459,
    ),
  ),
  'nocache_hash' => '69514766051afb6cfef37b6-20051499',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="gestion-entrees">
	<form method="POST" action="/billetterie/authentification.html?act=login">
	<label for="identifiant">Votre identifiant : </label>
	<input type="text" name="ident" id="identifiant" />
	<br />
	<br />
	<label for="password">Code secret : </label>
	<input type="password" name="pass" id="password" />
	<br />
	<button class="authentification">Valider</button>
	</form>
</div>