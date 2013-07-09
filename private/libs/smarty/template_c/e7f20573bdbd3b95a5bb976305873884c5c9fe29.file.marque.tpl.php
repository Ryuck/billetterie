<?php /* Smarty version Smarty3rc4, created on 2011-04-26 13:13:38
         compiled from "C:/wamp/www/voituremoinschere/private/tpl/marque.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61144db6c502ceb535-21681881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7f20573bdbd3b95a5bb976305873884c5c9fe29' => 
    array (
      0 => 'C:/wamp/www/voituremoinschere/private/tpl/marque.tpl',
      1 => 1303819042,
    ),
  ),
  'nocache_hash' => '61144db6c502ceb535-21681881',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="separator"></div>
<div id="corps">
	<div id="en-tete">
		<p class="tete-left"><?php echo $_smarty_tpl->getVariable('text_head')->value;?>

		</p>
		<p class="tete-right"><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id="nombre"><?php echo $_smarty_tpl->getVariable('nb_modele')->value;?>
</div> modéles disponibles.</p>
		<div class="separator"></div>
	</div>
	<div id="menugauche">
			<?php $_template = new Smarty_Internal_Template("menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
			<div id="infomarque">
			<h2>La marque <?php echo $_smarty_tpl->getVariable('modele')->value[0]['marque_nom'];?>
</h2><br /><br />
			<p>
			<?php echo $_smarty_tpl->getVariable('modele')->value[0]['marque_texte_complement'];?>

			</p>
			</div>
			</div>
			<div id="affichrecherche">
			<h2>Présentation des modéles :</h2><br /><br />
			<div id="result-content">
			<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('modele')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
			<div class="sousmenu">
				<p><?php echo $_smarty_tpl->tpl_vars['m']->value['modele_nom'];?>
<br />à partir de <?php echo $_smarty_tpl->tpl_vars['m']->value['prix_min'];?>
€
				<br /><br />
				<a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['modele_nom_url'];?>
/">
				<img src="<?php echo @IMAGE_URL;?>
modele/small/<?php echo $_smarty_tpl->tpl_vars['m']->value['modele_photo'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['modele_photo'];?>
" />
				</a>
				</p>
				<p class="smalltext"><?php echo $_smarty_tpl->tpl_vars['m']->value['modele_texte_complementaire'];?>
</p>
			</div>
			<?php }} ?>
			</div>
			</div>
			<div class="separator"></div>
</div>

