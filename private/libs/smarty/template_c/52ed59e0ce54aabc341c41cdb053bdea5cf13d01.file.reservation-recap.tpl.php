<?php /* Smarty version Smarty3rc4, created on 2011-10-24 20:28:43
         compiled from "C:/wamp/www/billetterie/private/tpl/reservation-recap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:261724ea5ca7b63dbf0-83282012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52ed59e0ce54aabc341c41cdb053bdea5cf13d01' => 
    array (
      0 => 'C:/wamp/www/billetterie/private/tpl/reservation-recap.tpl',
      1 => 1319488118,
    ),
  ),
  'nocache_hash' => '261724ea5ca7b63dbf0-83282012',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="bloc_reservation">
	<div class="reservation">
		<div class="top">
			<p>Votre réservation</p>
		</div>
		<div class="bottom">
			<p>Salon de la décoration Lille Grand Palais<br />6, 7, 8 Mars 2009</p>
		</div>
	</div>
	<div class="billet">
		<div class="top">
			<p>Nombre de billets</p>
		</div>
		<div class="bottom">
			<span class="recap"><?php echo $_smarty_tpl->getVariable('nb_billet')->value;?>
</span>
		</div>
	</div>
	<div class="web">
		<div class="top">
			<p>Offre Web</p>
		</div>
		<div class="bottom">
			<p>1 entrée achetée la deuxième à moitié prix</p>
		</div>
	</div>
	<div class="total">
		<div class="top">
			<p>Total TTC</p>
		</div>
		<div class="bottom">
			<?php if ($_smarty_tpl->getVariable('nb_billet')->value==1){?>
				<p class="unbillet">
					<?php echo $_smarty_tpl->getVariable('prix')->value;?>
€ TTC
				</p>
			<?php }else{ ?>
				<p class="plusieursbillets">
					<span><?php echo $_smarty_tpl->getVariable('prixbarre')->value;?>
€ TTC</span><br />
					<?php echo $_smarty_tpl->getVariable('prix')->value;?>
€ TTC
				</p>
			<?php }?>
		</div>
	</div>
</div>
<div class="separator"></div>
<div id="bloc_formulaire">
	<div class="top">
		Récapitalatif des informations saisies précédemment
	</div>
	<div class="body">
		<p class="left">
			Vous êtes un <?php echo $_smarty_tpl->getVariable('part_pro')->value;?>
<br />
			<?php echo $_smarty_tpl->getVariable('civilite')->value;?>
 <?php echo $_smarty_tpl->getVariable('nom')->value;?>
 <?php echo $_smarty_tpl->getVariable('prenom')->value;?>
<br />
			<?php echo $_smarty_tpl->getVariable('adresse1')->value;?>
 <?php echo $_smarty_tpl->getVariable('adresse2')->value;?>
<br />
			<?php echo $_smarty_tpl->getVariable('cp')->value;?>
 <?php echo $_smarty_tpl->getVariable('ville')->value;?>
<br />
			<br />
			<?php echo $_smarty_tpl->getVariable('email')->value;?>

		</p>
	</div>
</div>
<div id="bottom-recap">
	<input type="checkbox" name="cgv" id="cgv" />
	<label for="cgv">J'ai lu et j'accepte <a href="#">les conditions générales de vente</a>.</label>
	<button class="modif">Modifier</button>
	<button class="valid">Valider</button>
</div>