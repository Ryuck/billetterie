<?php /* Smarty version Smarty3rc4, created on 2013-06-06 00:26:56
         compiled from "/homez.488/deswebcr/www/ryuk/billetterie/private/tpl/gestion-commande.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153172016051afbb300c8b22-11413594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ebf90ca9859564aae760a4016d6e338a3af5651' => 
    array (
      0 => '/homez.488/deswebcr/www/ryuk/billetterie/private/tpl/gestion-commande.tpl',
      1 => 1364834976,
    ),
  ),
  'nocache_hash' => '153172016051afbb300c8b22-11413594',
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
