<?php /* Smarty version Smarty3rc4, created on 2011-04-26 13:17:01
         compiled from "C:/wamp/www/voituremoinschere/private/tpl/modele.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6814db6c5cd2d9972-47190241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1e3e7ce5107af95f539f975da6c080aa9a752e8' => 
    array (
      0 => 'C:/wamp/www/voituremoinschere/private/tpl/modele.tpl',
      1 => 1303819042,
    ),
  ),
  'nocache_hash' => '6814db6c5cd2d9972-47190241',
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
		<p class="tete-right"><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id="nombre"><?php echo $_smarty_tpl->getVariable('nb_offre')->value;?>
</div> offres correspondantes.</p>
		<div class="separator"></div>
	</div>
	<div id="menugauche">
			<?php $_template = new Smarty_Internal_Template("menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
			<div id="infomarque">
			<h2>Le modéle : </h2><br /><br />
			<p>
			<?php echo $_smarty_tpl->getVariable('modele_texte_complementaire')->value;?>

			</p>
			</div>
			</div>
			<div id="affichrecherche">
			<h2><?php echo $_smarty_tpl->getVariable('marque')->value;?>
 <?php echo $_smarty_tpl->getVariable('modele')->value;?>
 :</h2><br /><br />
			<div id="result-content">
			<table id="finition">
			<tr class="first"><td class="smalltd">Dispo.</td><td class="moytd">Finition</td><td class="moytd">Motorisation</td>
			<td class="smalltd">Type&nbre de portes</td><td class="smalltd" >Carburant</td><td class="smalltd" >Remise</td><td class="moytd">Prix avec remise</td><td class="smalltd">Economie</td><td></td></tr>

			<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('offre')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
			<?php if ($_smarty_tpl->tpl_vars['o']->value['modele_genre']=="VP"){?>
				<?php if ($_smarty_tpl->tpl_vars['o']->value['offre_neuf_occasion']=="neuf"){?>
					<?php $_smarty_tpl->tpl_vars['location'] = new Smarty_variable((@RACINE)."voiture-neuve/".($_smarty_tpl->getVariable('marque_url')->value)."/".($_smarty_tpl->tpl_vars['o']->value['modele_url'])."/".($_smarty_tpl->tpl_vars['o']->value['offre_ref']).".html", null, null);?>
				<?php }elseif($_smarty_tpl->tpl_vars['o']->value['offre_neuf_occasion']=="occasion"){?>
					<?php $_smarty_tpl->tpl_vars['location'] = new Smarty_variable((@RACINE)."voiture-occasion/".($_smarty_tpl->getVariable('marque_url')->value)."/".($_smarty_tpl->tpl_vars['o']->value['modele_url'])."/".($_smarty_tpl->tpl_vars['o']->value['offre_ref']).".html", null, null);?>
				<?php }?>
			<?php }elseif($_smarty_tpl->tpl_vars['o']->value['modele_genre']=="VU"){?>
				<?php $_smarty_tpl->tpl_vars['location'] = new Smarty_variable((@RACINE)."vehicule-utilitaire/".($_smarty_tpl->getVariable('marque_url')->value)."/".($_smarty_tpl->tpl_vars['o']->value['modele_url'])."/".($_smarty_tpl->tpl_vars['o']->value['offre_ref']).".html", null, null);?>
			<?php }?>
			<tr onclick="window.location.replace('<?php echo $_smarty_tpl->getVariable('location')->value;?>
')">
				<td>
				<?php if ($_smarty_tpl->tpl_vars['o']->value['offre_delai']=="stock"){?>
				<img src="<?php echo @IMAGE_URL;?>
dispo.png" alt="EN STOCK" />
				<?php }elseif($_smarty_tpl->tpl_vars['o']->value['offre_delai']=="arrivage"){?>
				<img src="<?php echo @IMAGE_URL;?>
arrivage.png" alt="ARRIVAGE" />
				<?php }?></td>
				<td><?php echo $_smarty_tpl->tpl_vars['o']->value['offre_finition'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['o']->value['motorisation_nom'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['o']->value['carosserie_nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['o']->value['modele_nbportes'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['o']->value['motorisation_energie'];?>
</td>
				<td><font color="#FEA101"><strong>-<?php echo $_smarty_tpl->tpl_vars['o']->value['offre_remise'];?>
%</strong></font></td>

				<td><h3><font color="#B31212"><?php echo $_smarty_tpl->tpl_vars['o']->value['offre_prix'];?>
€</font></h3></td>
				<td><?php echo sprintf("%d",$_smarty_tpl->tpl_vars['o']->value['offre_prix']*$_smarty_tpl->tpl_vars['o']->value['offre_remise']/100);?>
€</td>
				<td>
				<a href="<?php echo $_smarty_tpl->getVariable('location')->value;?>
">Voir l'offre</a>
				</td>
			</tr>
			<?php }} ?>

			
			</table><br />
			</div>
			</div>
</div>
<div class="separator"></div>	
			