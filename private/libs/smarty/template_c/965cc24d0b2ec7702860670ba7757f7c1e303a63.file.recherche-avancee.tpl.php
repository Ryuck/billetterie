<?php /* Smarty version Smarty3rc4, created on 2011-04-15 10:13:58
         compiled from "C:/wamp/www/voituremoinschere/private/tpl/recherche-avancee.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41764da81a66ed0677-82104730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '965cc24d0b2ec7702860670ba7757f7c1e303a63' => 
    array (
      0 => 'C:/wamp/www/voituremoinschere/private/tpl/recherche-avancee.tpl',
      1 => 1302263079,
    ),
  ),
  'nocache_hash' => '41764da81a66ed0677-82104730',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="separator"></div>
<div id="corps">
	<div id="en-tete">
		<p class="tete-left"><?php echo $_smarty_tpl->getVariable('text_head')->value[0]['texte_head'];?>
</p>
		<?php if ($_smarty_tpl->getVariable('offre')->value){?>
			<p class="tete-right"><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('nb_offre')->value;?>
 offres disponibles.</p>
		<?php }?>
		<div class="separator"></div>
	</div>
	<div class="separator"></div>
<?php if (($_smarty_tpl->getVariable('offre')->value!=null)){?>
	<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('offre')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
	<?php echo $_smarty_tpl->tpl_vars['o']->value['offre_id'];?>
 + <?php echo $_smarty_tpl->tpl_vars['o']->value['modele_nbportes'];?>
 + <?php echo $_smarty_tpl->tpl_vars['o']->value['offre_prix'];?>
 + <?php echo $_smarty_tpl->tpl_vars['o']->value['motorisation_energie'];?>
<br />
	<?php }} ?>
<?php }elseif(($_smarty_tpl->getVariable('offre')->value==0)){?>
	Pas de recherche.
<?php }else{ ?>
	Pas de resultats.
<?php }?>