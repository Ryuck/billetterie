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
			<input type="text" name="nbbillet" id="nbbillet" size="4" value="{$nb_billet}" />
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
			<input type="hidden" id="prixbase" value="{$prixbase}" />
			{if $nb_billet==1}
				<p class="unbillet">
					{$prix}€ TTC
				</p>
			{else}
				<p class="plusieursbillets">
					<span>{$prixbarre}€ TTC</span><br />
					{$prix}€ TTC
				</p>
			{/if}
		</div>
	</div>
</div>

<div class="separator"></div>

<div id="bloc_partpro">
	<div class="top">
		<p>Vous êtes ?</p>
	</div>
	<div class="bottom">
		<input type="radio" id="part" name="check" {if $part_pro=="particulier"}checked="checked"{/if} />
		<label for="part">Un Particulier</label>
		<input type="radio" id="pro" name="check" {if $part_pro=="professionnel"}checked="checked"{/if}/>
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
					<option value="" {if $civilite==""}selected="selected"{/if}>Choississez...</option>
					<option value="Mr" {if $civilite=="Monsieur"}selected="selected"{/if}>Monsieur</option>
					<option value="Mme" {if $civilite=="Madame"}selected="selected"{/if}>Madame</option>
					<option value="Mlle" {if $civilite=="Mademoiselle"}selected="selected"{/if}>Mademoiselle</option>
				</select>
				<br />
				<label for="nom">Nom : *</label>
				<input type="text" name="nom" id="nom" value="{$nom}"/>
				<br />
				<label for="adresse1">Adresse : *</label>
				<input type="text" name="adresse1" id="adresse1" value="{$adresse1}" />
				<br />
				<input type="text" name="adresse2" id="adresse2" value="{$adresse2}" />
				<br />
				<label for="email">Email : *</label>
				<input type="text" name="email" id="email" value="{$email}" />
			</p>
			<p class="right">
				<label for="prenom">Prénom : *</label>
				<input type="text" name="prenom" id="prenom" value="{$prenom}" />
				<br />
				<label for="cp">Code Postal : *</label>
				<input type="text" name="cp" id="cp" value="{$cp}" />
				<br />
				<label for="ville">Ville : *</label>
				<input type="text" name="ville" id="ville" value="{$ville}" />
				<br />
				<label for="confirmemail">Confirmez votre email : *</label>
				<input type="text" name="confirmemail" id="confirmemail" value="{$email}" />
				<span>Les emails ne correspondent pas !</span>
			</p>
			<div class="separator"></div>
			<p class="infomail">Un email valide est indispensable car la réception des billets se fait par email.</p>
			<p class="bonplan">
				<input type="checkbox" name="bonplan" id="bonplan" {if $bonplan=="on"}checked="checked"{/if} />
				<label for="bonplan">Cochez la case pour être informé des bons plans du salon.</label>
			</p>
			<input type="hidden" value="{$part_pro}" id="part_pro" name="part_pro" />
			<input type="hidden" value="{$nb_billet}" id="nb_billet" name="nb_billet" />
			<button>Confirmer</button>
		</form>
		<p class="renseignements">
			* Renseignements obligatoires.
		</p>
	</div>
</div>