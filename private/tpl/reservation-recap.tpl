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
			<span class="recap">{$nb_billet}</span>
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
<div id="bloc_formulaire">
	<div class="top">
		Récapitalatif des informations saisies précédemment
	</div>
	<div class="body">
		<p class="left">
			Vous êtes un {$part_pro}<br />
			{$civilite} {$nom} {$prenom}<br />
			{$adresse1} {$adresse2}<br />
			{$cp} {$ville}<br />
			<br />
			{$email}
		</p>
	</div>
</div>
<div id="bottom-recap">
	<input type="checkbox" name="cgv" id="cgv" />
	<label for="cgv">J'ai lu et j'accepte <a href="#">les conditions générales de vente</a>.</label>
	<button class="modif">Modifier</button>
	<button class="valid">Valider</button>
</div>