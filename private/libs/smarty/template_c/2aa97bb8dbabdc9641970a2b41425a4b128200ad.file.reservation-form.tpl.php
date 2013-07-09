<?php /* Smarty version Smarty3rc4, created on 2013-04-17 23:53:39
         compiled from "/homez.488/deswebcr/www/ryuk/billetterie/private/tpl/reservation-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1890944181516f19e3e5e874-99118663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2aa97bb8dbabdc9641970a2b41425a4b128200ad' => 
    array (
      0 => '/homez.488/deswebcr/www/ryuk/billetterie/private/tpl/reservation-form.tpl',
      1 => 1364834977,
    ),
  ),
  'nocache_hash' => '1890944181516f19e3e5e874-99118663',
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
			<input type="text" name="nbbillet" id="nbbillet" size="4" value="<?php echo $_smarty_tpl->getVariable('nb_billet')->value;?>
" />
			<button class="plus">+</button>
			<button class="moins">-</button>
		</div>
	</div>
	<div class="web">
		<div class="top">
			<p>Offre Web</p>
		</div>
		<div class="bottom">
			<p>La 2ème à moitié prix<br/>pour une entrée achetée</p>
		</div>
	</div>
	<div class="total">
		<div class="top">
			<p>Total TTC</p>
		</div>
		<div class="bottom">
			<input type="hidden" id="prixbase" value="<?php echo $_smarty_tpl->getVariable('prixbase')->value;?>
" />
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

<div id="bloc_partpro">
	<div class="top">
		<p>Vous êtes ?</p>
	</div>
	<div class="bottom">
		<input type="radio" id="part" name="check" <?php if ($_smarty_tpl->getVariable('part_pro')->value=="particulier"){?>checked="checked"<?php }?> />
		<label for="part">Un Particulier</label>
		<input type="radio" id="pro" name="check" <?php if ($_smarty_tpl->getVariable('part_pro')->value=="professionnel"){?>checked="checked"<?php }?>/>
		<label for="pro">Un Professionnel</label>
	</div>
</div>

<div id="bloc_formulaire">
	<div class="top">
		Adresse de facturation
	</div>
	<div class="body">
		<form id="form_reservation"  onsubmit="return false" action="reservation-recap.html" method="post" >
			<p class="left">
				<label for="civilite">Civilité : *</label>
				<select name="civilite" id="civilite">
					<option value="" <?php if ($_smarty_tpl->getVariable('civilite')->value==''){?>selected="selected"<?php }?>>Choississez...</option>
					<option value="Mr" <?php if ($_smarty_tpl->getVariable('civilite')->value=="Monsieur"){?>selected="selected"<?php }?>>Monsieur</option>
					<option value="Mme" <?php if ($_smarty_tpl->getVariable('civilite')->value=="Madame"){?>selected="selected"<?php }?>>Madame</option>
					<option value="Mlle" <?php if ($_smarty_tpl->getVariable('civilite')->value=="Mademoiselle"){?>selected="selected"<?php }?>>Mademoiselle</option>
				</select>
				<br />
				<label for="nom">Nom : *</label>
				<input type="text" name="nom" id="nom" value="<?php echo $_smarty_tpl->getVariable('nom')->value;?>
"/>
				<br />
				<label for="adresse1">Adresse : *</label>
				<input type="text" name="adresse1" id="adresse1" value="<?php echo $_smarty_tpl->getVariable('adresse1')->value;?>
" />
				<br />
				<input type="text" name="adresse2" id="adresse2" value="<?php echo $_smarty_tpl->getVariable('adresse2')->value;?>
" />
				<br />
				<label for="email">Email : *</label>
				<input type="text" name="email" id="email" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
" />
			</p>
			<p class="right">
				<label for="prenom">Prénom : *</label>
				<input type="text" name="prenom" id="prenom" value="<?php echo $_smarty_tpl->getVariable('prenom')->value;?>
" />
				<br />
				<label for="cp">Code Postal : *</label>
				<input type="text" name="cp" id="cp" value="<?php echo $_smarty_tpl->getVariable('cp')->value;?>
" />
				<br />
				<label for="ville">Ville : *</label>
				<input type="text" name="ville" id="ville" value="<?php echo $_smarty_tpl->getVariable('ville')->value;?>
" />
				<br />
				<label for="confirmemail">Confirmez votre email : *</label>
				<input type="text" name="confirmemail" id="confirmemail" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
" />
				<span>Les emails ne correspondent pas !</span>
			</p>
			<div class="separator"></div>
			<p class="infomail">Un email valide est indispensable car la réception des billets se fait par email.</p>
			<p class="bonplan">
				<input type="checkbox" name="bonplan" id="bonplan" <?php if ($_smarty_tpl->getVariable('bonplan')->value=="on"){?>checked="checked"<?php }?> />
				<label for="bonplan">Cochez la case pour être informé des bons plans du salon.</label>
			</p>
			<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('part_pro')->value;?>
" id="part_pro" name="part_pro" />
			<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('nb_billet')->value;?>
" id="nb_billet" name="nb_billet" />
			<button>Confirmer</button>
		</form>
		<p class="renseignements">
			* Renseignements obligatoires.
		</p>
	</div>
</div>