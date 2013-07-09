<?php /* Smarty version Smarty3rc4, created on 2011-04-15 10:11:16
         compiled from "C:/wamp/www/voituremoinschere/private/tpl/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:320024da819c46d77a4-12995027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9afc7f67be91a4e78626b261bc20113ae813ae62' => 
    array (
      0 => 'C:/wamp/www/voituremoinschere/private/tpl/header.tpl',
      1 => 1302862272,
    ),
  ),
  'nocache_hash' => '320024da819c46d77a4-12995027',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<img src="<?php echo @IMAGE_URL;?>
logo.jpg" alt="" />
<br />
<?php echo $_smarty_tpl->getVariable('nb_vu')->value;?>
 vu et <?php echo $_smarty_tpl->getVariable('nb_occasion')->value;?>
 vo
<?php if (($_smarty_tpl->getVariable('nb_vu')->value>0||$_smarty_tpl->getVariable('nb_occasion')->value>0)){?>
<ul>
	<li><a href="<?php echo @ROOT_URL;?>
voiture-neuve/">Voitures Neuves</a></li>
	<?php if ($_smarty_tpl->getVariable('nb_occasion')->value>0){?>
	<li><a href="<?php echo @ROOT_URL;?>
voiture-occasion/">Voitures d'occasion</a></li>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('nb_vu')->value>0){?>
	<li><a href="<?php echo @ROOT_URL;?>
vehicule-utilitaire/">Utilitaire</a></li>
	<?php }?>
</ul>
<?php }?>