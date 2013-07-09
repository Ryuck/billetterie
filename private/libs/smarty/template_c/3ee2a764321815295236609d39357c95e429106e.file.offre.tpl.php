<?php /* Smarty version Smarty3rc4, created on 2011-04-12 15:11:31
         compiled from "C:/wamp/www/voituremoinschere/private/tpl/offre.tpl" */ ?>
<?php /*%%SmartyHeaderCode:220064da46ba33ebe80-95580241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ee2a764321815295236609d39357c95e429106e' => 
    array (
      0 => 'C:/wamp/www/voituremoinschere/private/tpl/offre.tpl',
      1 => 1302621082,
    ),
  ),
  'nocache_hash' => '220064da46ba33ebe80-95580241',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="en-tete">
	<p class="tete-left"><br /><?php echo $_smarty_tpl->getVariable('text_head')->value;?>
 <?php echo $_smarty_tpl->getVariable('offre')->value['offre_finition'];?>

	</p>
	<p class="tete-right">
		<br /><img src="<?php echo @IMAGE_URL;?>
<?php echo $_smarty_tpl->getVariable('offre')->value['marque_logo'];?>
.png" /><br /><br />
		<strong><?php echo $_smarty_tpl->getVariable('offre')->value['marque_nom'];?>
 <?php echo $_smarty_tpl->getVariable('offre')->value['modele_nom'];?>
</strong>
	</p>
	<div class="separator"></div>
</div>
<div id="descriptionoffre">
			<img src="<?php echo @IMAGE_URL;?>
modele/large/<?php echo $_smarty_tpl->getVariable('offre')->value['modele_nom'];?>
.png" />
			<table>
			<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font  size="6" color="red"><strong><?php echo $_smarty_tpl->getVariable('offre')->value['offre_prix'];?>
 € </strong></font><br /> 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font  size="4" color="red">Remise de <strong><?php echo $_smarty_tpl->getVariable('offre')->value['offre_remise'];?>
%</strong></font><br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font  size="4" color="#FE9901"><strong><?php echo sprintf("%d",$_smarty_tpl->getVariable('offre')->value['offre_prix']*$_smarty_tpl->getVariable('offre')->value['offre_remise']/100);?>
€ </strong></font><font size="4">d'économie !</font><br /><br />
			&nbsp;&nbsp;<font  size="3" >Frais de mise à disposition :</font><br />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font  size="4" ><strong>Gratuit</strong></font><br />
			
			</td>
			<td><br />    * Marque : <?php echo $_smarty_tpl->getVariable('offre')->value['marque_nom'];?>
<br />
    * Modèle : <?php echo $_smarty_tpl->getVariable('offre')->value['modele_nom'];?>
<br />
    * Finition : <?php echo $_smarty_tpl->getVariable('offre')->value['offre_finition'];?>
<br />
    * Motorisation : <?php echo $_smarty_tpl->getVariable('offre')->value['motorisation_nom'];?>
<br />
    * Garantie Constructeur : <?php echo $_smarty_tpl->getVariable('offre')->value['modele_duree_de_garantie'];?>
<br />
    * Carburant : <?php echo $_smarty_tpl->getVariable('offre')->value['motorisation_energie'];?>
<br />
    * Boite de vitesse : <?php echo $_smarty_tpl->getVariable('offre')->value['motorisation_type_boite'];?>
<br />
    * Emission CO2 : <?php echo $_smarty_tpl->getVariable('offre')->value['motorisation_co2'];?>
<br />
    * Carrosserie : <?php echo $_smarty_tpl->getVariable('offre')->value['carosserie_nom'];?>
 - <?php echo $_smarty_tpl->getVariable('offre')->value['nbportes'];?>
 portes - <?php echo $_smarty_tpl->getVariable('offre')->value['nbplaces'];?>
 places<br />
    * Disponibilité : En <?php echo $_smarty_tpl->getVariable('offre')->value['offre_delai'];?>
.
</td>
			</tr>
			<tr><td colspan="2" align="center"><font size="5" color=""><br /><a href="#" >Faites votre devis gratuit et personalisé</a><br/></font></td></tr>
			</table>
			</div>
			<div id="blocoffre1">
			<ul>
				<li><a href="#">Fiche technique</a></li>
				<li><a href="#">Equipement</a></li>
				<li><a href="#">Options</a></li>
				<li><a href="#">Couleur</a></li>
			</ul>
			<br /><br />
			Offre N° : 	<?php echo $_smarty_tpl->getVariable('offre')->value['offre_ref'];?>
<br />
<?php echo $_smarty_tpl->getVariable('offre')->value['offre_finition'];?>
<br />
Dénomination Commerciale : 	<?php echo $_smarty_tpl->getVariable('offre')->value['offre_commentaire_commercial'];?>
<br />
 <br />
Motorisation : <?php echo $_smarty_tpl->getVariable('offre')->value['motorisation_nom'];?>
<br />
Energie : 	<?php echo $_smarty_tpl->getVariable('offre')->value['motorisation_energie'];?>
<br />
Type de boite : <?php echo $_smarty_tpl->getVariable('offre')->value['motorisation_type_boite'];?>
<br />
Cylindrée : <?php echo $_smarty_tpl->getVariable('offre')->value['motorisation_cylindree'];?>
<br />
Norme de dépollution : 	<?php echo $_smarty_tpl->getVariable('offre')->value['motorisation_norme_depolution'];?>
<br />
Co2 : 	<?php echo $_smarty_tpl->getVariable('offre')->value['motorisation_co2'];?>
<br />
EcoBonus : <?php echo $_smarty_tpl->getVariable('offre')->value['offre_ecobonus'];?>
<br />
 <br />
Carrosserie :<br /> 	
Nbre de Portes : <?php echo $_smarty_tpl->getVariable('offre')->value['modele_nbportes'];?>
<br />
Nbre de Places: <?php echo $_smarty_tpl->getVariable('offre')->value['modele_nbplaces'];?>
<br />
 <br />
Véhicule : 	Immatriculé -10 kms<br />
<br />
<hr />
<font size="2" color="#716C66">*Dans de nombreux cas, la garantie constructeur démarre lors de l'arrivée du véhicule sur le parc du fournisseur européen.
La date ne peut être alors que confirmée lors de la livraison. </font><br />
			</div>
<div id="blocoffre2">
<table>
   <caption><font size="4" color="red">Offres similaires à votre recherche : </font></caption>
   <tfoot> 
       <tr>
           <th colspan="4"><a href="#">Voir plus d'offres similaires</a></th>
       </tr>
   </tfoot>
   <tbody>
       <tr>
           <td><font size="2"><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[0]['marque_nom'];?>
 <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[0]['modele_nom'];?>
<br />
           <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[0]['motorisation_nom'];?>
<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[0]['offre_finition'];?>
</font><br />
           <a href="<?php echo @RACINE;?>
<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[0]['type_vehicule_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[0]['marque_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[0]['modele_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[0]['offre_ref'];?>
.html">
		   <img src="<?php echo @IMAGE_URL;?>
modele/small/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[0]['modele_nom'];?>
.png" /></a><br />
		   <font size="2">Remise de -<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[0]['offre_remise'];?>
%<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[0]['offre_prix'];?>
€</font></td>
		   
           <td><font size="2"><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[1]['marque_nom'];?>
 <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[1]['modele_nom'];?>
<br />
           <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[1]['motorisation_nom'];?>
<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[1]['offre_finition'];?>
</font><br />
           <a href="<?php echo @RACINE;?>
<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[1]['type_vehicule_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[1]['marque_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[1]['modele_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[1]['offre_ref'];?>
.html">
		   <img src="<?php echo @IMAGE_URL;?>
modele/small/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[1]['modele_nom'];?>
.png" /></a><br />
		   <font size="2">Remise de -<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[1]['offre_remise'];?>
%<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[1]['offre_prix'];?>
€</font></td>
		   
		   <td><font size="2"><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[2]['marque_nom'];?>
 <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[2]['modele_nom'];?>
<br />
           <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[2]['motorisation_nom'];?>
<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[2]['offre_finition'];?>
</font><br />
           <a href="<?php echo @RACINE;?>
<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[2]['type_vehicule_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[2]['marque_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[2]['modele_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[2]['offre_ref'];?>
.html">
		   <img src="<?php echo @IMAGE_URL;?>
modele/small/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[2]['modele_nom'];?>
.png" /></a><br />
		   <font size="2">Remise de -<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[2]['offre_remise'];?>
%<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[2]['offre_prix'];?>
€</font></td>
		</tr>
		<tr>
           <td><font size="2"><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[3]['marque_nom'];?>
 <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[3]['modele_nom'];?>
<br />
           <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[3]['motorisation_nom'];?>
<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[3]['offre_finition'];?>
</font><br />
           <a href="<?php echo @RACINE;?>
<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[3]['type_vehicule_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[3]['marque_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[3]['modele_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[3]['offre_ref'];?>
.html">
		   <img src="<?php echo @IMAGE_URL;?>
modele/small/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[3]['modele_nom'];?>
.png" /></a><br />
		   <font size="2">Remise de -<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[3]['offre_remise'];?>
%<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[3]['offre_prix'];?>
€</font></td>
		   
           <td><font size="2"><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[4]['marque_nom'];?>
 <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[4]['modele_nom'];?>
<br />
           <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[4]['motorisation_nom'];?>
<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[4]['offre_finition'];?>
</font><br />
           <a href="<?php echo @RACINE;?>
<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[4]['type_vehicule_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[4]['marque_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[4]['modele_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[4]['offre_ref'];?>
.html">
		   <img src="<?php echo @IMAGE_URL;?>
modele/small/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[4]['modele_nom'];?>
.png" /></a><br />
		   <font size="2">Remise de -<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[4]['offre_remise'];?>
%<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[4]['offre_prix'];?>
€</font></td>
		   
		   <td><font size="2"><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[5]['marque_nom'];?>
 <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[5]['modele_nom'];?>
<br />
           <?php echo $_smarty_tpl->getVariable('offre_similaire')->value[5]['motorisation_nom'];?>
<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[5]['offre_finition'];?>
</font><br />
           <a href="<?php echo @RACINE;?>
<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[5]['type_vehicule_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[5]['marque_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[5]['modele_url'];?>
/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[5]['offre_ref'];?>
.html">
		   <img src="<?php echo @IMAGE_URL;?>
modele/small/<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[5]['modele_nom'];?>
.png" /></a><br />
		   <font size="2">Remise de -<?php echo $_smarty_tpl->getVariable('offre_similaire')->value[5]['offre_remise'];?>
%<br /><?php echo $_smarty_tpl->getVariable('offre_similaire')->value[5]['offre_prix'];?>
€</font></td>
		</tr>
	</tbody>
	</table>
</div>