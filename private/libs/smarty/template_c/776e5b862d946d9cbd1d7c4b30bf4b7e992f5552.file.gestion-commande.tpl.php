<?php /* Smarty version Smarty3rc4, created on 2011-11-22 20:20:43
         compiled from "C:/wamp/www/billetterie/private/tpl/gestion-commande.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186694ecc041b802990-24533155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '776e5b862d946d9cbd1d7c4b30bf4b7e992f5552' => 
    array (
      0 => 'C:/wamp/www/billetterie/private/tpl/gestion-commande.tpl',
      1 => 1321993240,
    ),
  ),
  'nocache_hash' => '186694ecc041b802990-24533155',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="gestion-commande">
	<button class="quit">Déconnexion</button>
	<p>Total des commandes : <?php echo $_smarty_tpl->getVariable('total_commande')->value;?>
€ TTC | Panier Moyen : <?php echo $_smarty_tpl->getVariable('panier_moyen')->value;?>
€ TTC</p>
	<div class="separator"></div>
	<div id="result-content">
		<?php $_template = new Smarty_Internal_Template("commande-result.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	</div>
</div>
<div id="result-details-commande">

</div>
