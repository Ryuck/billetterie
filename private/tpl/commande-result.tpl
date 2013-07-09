<table>
	<thead>
       <tr>
           <th class="datcom">Date commande</th>
           <th class="numcom">Numéro commande</th>
           <th class="clicom">Client</th>
           <th class="numclicom">Numéro client</th>
           <th class="pricom">Prix ttc</th>
           <th class="etacom">Etat</th>
           <th class="liencom"></th>
       </tr>
   </thead>
   <tbody>
   		<tr class="espace"><td></td></tr>
   		{foreach from=$commande item=c name=lastcommande}
			<tr class="{cycle values='repeat-1,repeat-2'}  {if $smarty.foreach.lastcommande.last}last {elseif $smarty.foreach.lastcommande.first}first {/if}">
				<td>{$c.commande_date}</td>
				<td>{$c.commande_id}</td>
				<td>{$c.client_nom} {$c.client_prenom}</td>
				<td>CL{$c.commande_fk_client_id}</td>
				<td>{$c.prix}€</td>
				<td>{$c.commande_etat}</td>
				<td>
					<a href="#" class="details com-{$c.commande_id}">Détails</a> - 
					<a href="#" class="facture com-{$c.commande_id}">Facture</a> - 
					<a href="#" class="billets com+{$c.commande_id}+{$c.client_nom}+{$c.client_prenom}">Envoyer les billets</a>
				</td>
			</tr>
		{/foreach}
   </tbody>
</table>
{include file="pagination.tpl"}