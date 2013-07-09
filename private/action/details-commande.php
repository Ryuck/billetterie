<?php

//Si on a bien un numéro de commande
if(isset($_GET['commande'])){
	$table_facture = new Facture();
	$table_billet = new Billet();
	
	//=====on cherche les infos de la facture via ce numéro de commande
	$filtres = array();
	$filtres[] = array('champ' => 'commande_id', 'valeur' => $_GET['commande']);
	$facture = $table_facture->getFacture($filtres);
	//===========
	
	//======Transformation de la civilité et de la date de la facture
	switch ($facture['0']['client_civilite']){
		case "Monsieur":
			$facture['0']['client_civilite'] = "Mr";
		break;
		case "Madame":
			$facture['0']['client_civilite'] = "Mme";
		break;
		case "Mademoiselle":
			$facture['0']['client_civilite'] = "Mlle";
		break;
	}
	$part = explode(' ', $facture['0']['facture_date']);
	$part = explode('-', $part['0']);
	$dateJour = $part[2];
	$dateMois = $part[1];
	//==========
	
	//=====Récupére le nombre de billet(s) commandé(s)
	$fil = array();
	$fil[] = array('champ' => 'billet_fk_commande_id', 'valeur' => $_GET['commande']);
	$nb_billet = $table_billet->getCount($fil);
	//==========
	
	//=====En fonction du nombre de billet on devine le prix de la commande et le nombre de billet plein tarif/demi tarif
	if($nb_billet%2 == 0){
		//s'il est paire on obtient un prix total = a 75% du prix total sans réduction
		$totalTTC = $prix_unitaire_billet * ($nb_billet*0.75);
		$nb_billet_demi = $nb_billet/2;
		$nb_billet_plein = $nb_billet_demi;
	}else{
		//sinon c'est la même mais avec un billet plein tarif en plus
		$totalTTC = $prix_unitaire_billet * ((($nb_billet-1)*0.75)+1);
		$nb_billet_demi = floor($nb_billet/2);
		$nb_billet_plein = floor($nb_billet/2)+1;
	}
	//==========
	
	//=====On génére ainsi du html dans une balise xml <result> pour la récupération en ajax 
	echo '<result><![CDATA[';
	echo '<div id="dialog-message" title="Commande n°'.$_GET['commande'].'">
			<div class="tb1">
				<div class="client">
					<p class="top">Client Facturé</p>
					<p class="content">
					'.$facture['0']['client_civilite'].' '.$facture['0']['client_nom'].' '.$facture['0']['client_prenom'].'<br />
					'.$facture['0']['client_adresse'].'<br />
					'.$facture['0']['client_cp'].' '.$facture['0']['client_ville'].'
					</p>
				</div>
				<div class="ref">
					<p class="top">Références</p>
					<p class="content">
					<span>N° Commande : </span>'.jenesuispasunzero($facture['0']['commande_id']).'<br />
					<span>N° Facture : </span>'.$dateMois.$dateJour.'-'.$facture['0']['client_id'].'-'.$facture['0']['facture_id'].'<br />
					<span>Date de la Facture : </span>'.formatDate(($facture['0']['facture_date'])).'<br />
					<span>N° Client : </span>CL'.jenesuispasunzero($facture['0']['client_id']).'
					</p>
				</div>
				<div class="separator"></div>
			</div>
			<div class="tb2">
				<table>
					<thead>
						<tr>
				           <th class="designation">Désignation</th>
				           <th class="quantite">Quantité</th>
				           <th class="prix">Prix unitaire TTC</th>
				           <th class="remise">Remise</th>
				           <th class="montant">Montant TTC</th>
				       </tr>
					</thead>
					<tbody>';
						if($nb_billet>0){
							echo '<tr>
										<td>Entrée Plein Tarif&nbsp;</td>
										<td>'.$nb_billet_plein.'</td>
										<td>'.$prix_unitaire_billet.'.00 €</td>
										<td>-</td>
										<td>'.$prix_unitaire_billet*$nb_billet_plein.'.00 €</td>
									</tr>';
							if($nb_billet_demi>0){
								echo '<tr>
										<td>Entrée Tarif Réduit</td>
										<td>'.$nb_billet_demi.'</td>
										<td>'.$prix_unitaire_billet.'.00 €</td>
										<td>-50%</td>
										<td>'.($prix_unitaire_billet/2)*$nb_billet_demi.'.00 €</td>
									</tr>';
							}
						}
				echo '</tbody>
				</table>';
		echo '</div>
			<div class="tb3">
				<table>
					<thead>
						<tr>
							<th class="totalht">Total HT</td>
							<th class="totaltva">Total TVA 5.5%</td>
							<th class="totalttc">Total TTC</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>'.number_format(($totalTTC-$totalTTC*0.055), 2).' €</td>
							<td>'.number_format($totalTTC*0.055, 2).' €</td>
							<td>'.$totalTTC.' €</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>';
	echo ']]></result>';
	//===========
}

?>