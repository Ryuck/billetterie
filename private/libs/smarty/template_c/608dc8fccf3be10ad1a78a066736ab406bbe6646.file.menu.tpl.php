<?php /* Smarty version Smarty3rc4, created on 2011-04-26 15:17:49
         compiled from "C:/wamp/www/voituremoinschere/private/tpl/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90404db6e21d191db3-38200673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '608dc8fccf3be10ad1a78a066736ab406bbe6646' => 
    array (
      0 => 'C:/wamp/www/voituremoinschere/private/tpl/menu.tpl',
      1 => 1303831066,
    ),
  ),
  'nocache_hash' => '90404db6e21d191db3-38200673',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="elementrecherche">
			<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('type_vehicule')->value;?>
" id="typevehicule" name="typevehicule" />
			<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('marque_actuelle')->value;?>
" id="marqueactuelle" name="marqueactuelle" />
			<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('modele_actuel')->value;?>
" id="modeleactuel" name="modeleactuel" />
			MARQUES :<br />
			<div id="marque">
			<select>
			<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('marque_liste')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['marque_nom_url'];?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value['marque_nom']==$_smarty_tpl->getVariable('marque_actuelle')->value){?>selected="selected"<?php }?> > <?php echo $_smarty_tpl->tpl_vars['m']->value['marque_nom'];?>
</option>
			<?php }} ?>
			</select>
			</div>
			<br />
			MODELES :<br />
			<div id="modele">
			<select>
				<option value="" >Tout les modéles</option>
			<?php  $_smarty_tpl->tpl_vars['mo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('modele')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['mo']->key => $_smarty_tpl->tpl_vars['mo']->value){
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['mo']->value['modele_nom_url'];?>
" <?php if ($_smarty_tpl->tpl_vars['mo']->value['modele_nom']==$_smarty_tpl->getVariable('modele_actuel')->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['mo']->value['modele_nom'];?>
</option>
			<?php }} ?>
			</select>
			</div>
			<br />
			<input type="submit" value="Changer" class="change"/>
			<br />
			<hr />
			<?php if (($_smarty_tpl->getVariable('nb_vu')->value>0||$_smarty_tpl->getVariable('nb_occasion')->value>0)){?>
				<input type="checkbox" id="neuf" />Neuf <br />
				<?php if ($_smarty_tpl->getVariable('nb_occasion')->value>0){?>
					<input type="checkbox" id="occasion" /> Occasion <br />
				<?php }?>
				<?php if ($_smarty_tpl->getVariable('nb_vu')->value>0){?>
					<input type="checkbox" id="utilitaire" /> Utilitaire<br />
				<?php }?>
			</ul>
			<?php }?>
			<input type="checkbox" id="stock" /> En stock<br />
			<input type="checkbox" id="troisportes" /> 2 à 3 portes <br /><input type="checkbox"  id="cinqportes" /> plus de 3 portes<br /><hr />
			<label for="gamme">Type de carosserie :</label><br />
				<select id="gamme" name="gamme">
					<option value="" selected="selected">Choisissez ...</option>
				<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('carosserie')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['carosserie_nom'];?>
" > <?php echo $_smarty_tpl->tpl_vars['c']->value['carosserie_nom'];?>
</option>
				<?php }} ?>
				</select><br />
			<p>
			<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('offre_prix_max')->value;?>
" id="prix_max" name="prix_max" />
			<label for="amount">Prix maximum :</label>
			<input type="text" id="amount" name="amount" /> €
			</p>
			<div id="slider-range-min"></div>
			<br />
			<label for="energie">Carburant :</label><br />
				<select id="energie" name="energie">
				<option value="" selected="selected">Choisissez ...</option>
				<option value="essence" >Essence</option>
				<option value="diesel" >Diesel</option>
				</select><br />
			<label for="bv">Boite de vitesse :</label><br />
				<select id="bv" name="bv">
				<option value="" selected="selected">Choisissez ...</option>
				<option value="BVM" >Manuelle</option>
				<option value="BVA" >Automatique</option>
				<option value="BVR" >Robotisée</option>
				</select><br />
			<br />
			</div>
			
<script type="text/javascript">
<!--
window.onload = function() {
	
	$("#marque select").change(function() {
		$.ajax({
			url: ROOT_URL+'?act=menu&xml=1&modif=changemarque&marque='+$(this).val(),
			dataType:"xml",
			success:function(modeles){
				$('#modele').html($(modeles).find('modeles').text());
			}
		});
	});

	$("#elementrecherche .change").click(function(){
		marque = $('#marque select').val();
		modele = $('#modele select').val();
		typevehicule = $('#typevehicule').val();
		if(typevehicule != ""){
			if(modele != "")
				window.location.href = ROOT_URL+'/'+typevehicule+'/'+marque+'/'+modele+'/';
			else
				window.location.href = ROOT_URL+'/'+typevehicule+'/'+marque+'/';
		}
		if(modele != "")
			window.location.href = ROOT_URL+marque+'/'+modele+'/';
		else
		window.location.href = ROOT_URL+marque+'/';
	});
	
	$("#stock, #troisportes, #cinqportes, #neuf, #occasion, #utilitaire").click(function() {
		marque = $('#marqueactuelle').val();
		modele = $('#modeleactuel').val();
		typevehicule = $('#typevehicule').val();
		stock = $('#stock').is(":checked");
		bv = $('#bv').val();
		energie = $('#energie').val();
		prixmax = $('#amount').val();
		carosserie = $('#gamme').val();
		troisportes = $('#troisportes').is(":checked");
		cinqportes = $('#cinqportes').is(":checked");
		neuf = $('#neuf').is(":checked");
		occasion = $('#occasion').is(":checked");
		utilitaire = $('#utilitaire').is(":checked");
		$.ajax({
			url: ROOT_URL+'?act=menu&xml=1&modif=changerecherche&marque='+marque+'&modele='+modele+'&typevehicule='+typevehicule+'&stock='+stock+'&bv='+bv+'&energie='+energie+'&prixmax='+prixmax+'&carosserie='+carosserie+'&troisportes='+troisportes+'&cinqportes='+cinqportes+'&neuf='+neuf+'&occasion='+occasion+'&utilitaire='+utilitaire,
			dataType:"xml",
			success:function(xml){
				$('#nombre').html($(xml).find('nombre').text());
				$('#result-content').html($(xml).find('result').text());
			}
		});
	});
	
	$("#gamme, #energie, #bv").change(function() {
		marque = $('#marqueactuelle').val();
		modele = $('#modeleactuel').val();
		typevehicule = $('#typevehicule').val();
		stock = $('#stock').is(":checked");
		bv = $('#bv').val();
		energie = $('#energie').val();
		prixmax = $('#amount').val();
		carosserie = $('#gamme').val();
		troisportes = $('#troisportes').is(":checked");
		cinqportes = $('#cinqportes').is(":checked");
		neuf = $('#neuf').is(":checked");
		occasion = $('#occasion').is(":checked");
		utilitaire = $('#utilitaire').is(":checked");
		$.ajax({
			url: ROOT_URL+'?act=menu&xml=1&modif=changerecherche&marque='+marque+'&modele='+modele+'&typevehicule='+typevehicule+'&stock='+stock+'&bv='+bv+'&energie='+energie+'&prixmax='+prixmax+'&carosserie='+carosserie+'&troisportes='+troisportes+'&cinqportes='+cinqportes+'&neuf='+neuf+'&occasion='+occasion+'&utilitaire='+utilitaire,
			dataType:"xml",
			success:function(xml){
				$('#nombre').html($(xml).find('nombre').text());
				$('#result-content').html($(xml).find('result').text());
			}
		});
	});

	$("#slider-range-min").mouseup(function() {
		marque = $('#marqueactuelle').val();
		modele = $('#modeleactuel').val();
		typevehicule = $('#typevehicule').val();
		stock = $('#stock').is(":checked");
		bv = $('#bv').val();
		energie = $('#energie').val();
		prixmax = $('#amount').val();
		carosserie = $('#gamme').val();
		troisportes = $('#troisportes').is(":checked");
		cinqportes = $('#cinqportes').is(":checked");
		neuf = $('#neuf').is(":checked");
		occasion = $('#occasion').is(":checked");
		utilitaire = $('#utilitaire').is(":checked");
		$.ajax({
			url: ROOT_URL+'?act=menu&xml=1&modif=changerecherche&marque='+marque+'&modele='+modele+'&typevehicule='+typevehicule+'&stock='+stock+'&bv='+bv+'&energie='+energie+'&prixmax='+prixmax+'&carosserie='+carosserie+'&troisportes='+troisportes+'&cinqportes='+cinqportes+'&neuf='+neuf+'&occasion='+occasion+'&utilitaire='+utilitaire,
			dataType:"xml",
			success:function(xml){
				$('#nombre').html($(xml).find('nombre').text());
				$('#result-content').html($(xml).find('result').text());
			}
		});
	});
};
//-->
</script>