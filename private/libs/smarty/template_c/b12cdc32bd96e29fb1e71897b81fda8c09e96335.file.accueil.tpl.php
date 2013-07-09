<?php /* Smarty version Smarty3rc4, created on 2011-04-20 15:08:20
         compiled from "C:/wamp/www/voituremoinschere/private/tpl/accueil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:229064daef6e4742fe0-11695399%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b12cdc32bd96e29fb1e71897b81fda8c09e96335' => 
    array (
      0 => 'C:/wamp/www/voituremoinschere/private/tpl/accueil.tpl',
      1 => 1303312094,
    ),
  ),
  'nocache_hash' => '229064daef6e4742fe0-11695399',
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
		<p class="tete-right"><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('nb_offre')->value;?>
 offres disponibles.</p>
		<div class="separator"></div>
	</div>
	<div class="separator"></div>
	<div id="recherche_marque">
	<p class="indent">Recherche par marque : </p><br />
	<div class="scroll-pane ui-widget ui-widget-header ui-corner-all">
	<div class="scroll-content">
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('marque')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
		<div class="scroll-content-item ui-widget-header">
		<a href="<?php echo $_smarty_tpl->tpl_vars['i']->value['marque_nom_url'];?>
/"><img src="<?php echo @IMAGE_URL;?>
<?php echo $_smarty_tpl->tpl_vars['i']->value['marque_logo'];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['i']->value['marque_logo'];?>
" /></a>
		<br />
		<p><a href="<?php echo $_smarty_tpl->tpl_vars['i']->value['marque_nom_url'];?>
/"><?php echo $_smarty_tpl->tpl_vars['i']->value['marque_nom'];?>
</a></p>
		</div>
	<?php }} ?>
	</div>
	<div class="scroll-bar-wrap ui-widget-content ui-corner-bottom">
		<div class="scroll-bar"></div>
	</div>
	</div>
	</div>
<div class="separator"></div>
<div id="selection">
	<h2>Notre selection :</h2><br /><br />
	<div id="left3">
		<h3>Meilleures Remises</h3><br /><br />
		<?php  $_smarty_tpl->tpl_vars['omr'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('offre_meilleures_remises')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['omr']->key => $_smarty_tpl->tpl_vars['omr']->value){
?>
		<table>
			<tr><td colspan="2"><?php echo $_smarty_tpl->tpl_vars['omr']->value['modele_nom'];?>
 à <?php echo $_smarty_tpl->tpl_vars['omr']->value['offre_prix'];?>
€</td></tr>
			<tr><td><img src="<?php echo @IMAGE_URL;?>
modele/small/<?php echo $_smarty_tpl->tpl_vars['omr']->value['modele_photo'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['omr']->value['modele_photo'];?>
" /></td>
			<td>remise<br />- <?php echo $_smarty_tpl->tpl_vars['omr']->value['offre_remise'];?>
% !</td></tr>
			<tr><td colspan="2"><?php echo $_smarty_tpl->tpl_vars['omr']->value['offre_finition'];?>
</td></tr>
		</table>
		<hr />
		<?php }} ?>
	</div>
	<div id="right3">
		<h3>Meilleurs prix</h3><br /><br />
		<?php  $_smarty_tpl->tpl_vars['omp'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('offre_meilleurs_prix')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['omp']->key => $_smarty_tpl->tpl_vars['omp']->value){
?>
		<table>
			<tr><td colspan="2"><?php echo $_smarty_tpl->tpl_vars['omp']->value['modele_nom'];?>
 à <?php echo $_smarty_tpl->tpl_vars['omp']->value['offre_prix'];?>
€</td></tr>
			<tr><td><img src="<?php echo @IMAGE_URL;?>
modele/small/<?php echo $_smarty_tpl->tpl_vars['omp']->value['modele_photo'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['omp']->value['modele_photo'];?>
" /></td>
			<td>remise<br />- <?php echo $_smarty_tpl->tpl_vars['omp']->value['offre_remise'];?>
% !</td></tr>
			<tr><td colspan="2"><?php echo $_smarty_tpl->tpl_vars['omp']->value['offre_finition'];?>
</td></tr>
		</table>
		<hr />
		<?php }} ?>
	</div>
</div>
<div id="droite">
<div id="recherche_avancee">
				<h2>Recherche avancée</h2><br /><br />	
				
<form method="post" action="<?php echo @ROOT_URL;?>
recherche-avancee.html">
<p>
	<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('offre_prix_max')->value;?>
" id="prix_max" name="prix_max" />
	<label for="amount">Prix maximum :</label>
	<input type="text" id="amount" name="amount" /> €
</p>

<div id="slider-range-min"></div>

				<label for="carburant">Carburant :</label>
				<select id="carburant" name="carburant">
				<option value="" selected="selected">Choisissez une energie</option>
				<option value="diesel">Diesel</option>
				<option value="essence">Essence</option>
				</select><br />
				<input type="radio" name="porte" value="3" id="porte3" /> <label for="porte3">3 portes et moins</label>
				<input type="radio" name="porte" value="4" id="porte4" /> <label for="porte4">4 portes et plus</label>
				<br /><br />
				<p class="center">
				<input type="submit" id="inputrecherche" value="Lancer une recherche" />
				</p>
</form>
</div>
</div>
<div class="separator"></div>
</div>
