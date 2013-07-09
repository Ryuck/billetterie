<?php

//=====Recherche d'un billet
if(isset($_GET['recherche']) && $_GET['recherche']=="billet"){
	
	$table_billet = new Billet();
	if(isset($_GET['num'])){
		
		//=====Requete pour les infos du billet
		$filtres = array();
		$filtres[] = array('champ' => 'billet_numero', 'valeur' => $_GET['num']);
		$billet = $table_billet->getInfoBillet($filtres);
		//==========
		
		//=====On compte le nombre de billet 
		$filtre_billet = array();
		$filtre_billet[] = array('champ' => 'billet_fk_commande_id', 'valeur' => $billet['0']['commande_id']);
		$nb_billet = $table_billet->getCount($filtre_billet);
		//==========
		
		if($billet!=null){ //on a au moins un résultat
			//=====On génére ainsi du html dans une balise xml <result> pour la récupération en ajax 
			echo '<result><![CDATA[';
		 	if($billet['0']['billet_date_scan']!="0000-00-00 00:00:00"){
				echo '<p class="info-billet">Billet déjà scanné le '.formatDate($billet['0']['billet_date_scan']).'
			 	à '.returnHeure($billet['0']['billet_date_scan']).'</p>';
		 	}
		 	else{
		 		echo '<p class="info-billet">Billet Valide</p>';
		 	}
		 	echo '<p class="left"><span>Informations commande</span><br /><br />'.$nb_billet;
		 	if($nb_billet==1)
		 		echo ' billet acheté</p>';
		 	else
		 		echo ' billets achetés</p>';
		 	echo '<p class="right">'.$billet['0']['client_civilite'].' 
		 	<span>'.$billet['0']['client_nom'].' '.$billet['0']['client_prenom'].'<br />
		 	'.$billet['0']['client_adresse'].'<br />
		 	'.$billet['0']['client_cp'].' '.$billet['0']['client_ville'].'</span><br /><br />
		 	'.$billet['0']['client_email'];
			echo ']]></result>';
			//==========
		}
		else{ //on a pas de resultat
			//=====On génére ainsi du html dans une balise xml <result> pour la récupération en ajax 
			echo '<result><![CDATA[';
			echo '<p class="info-billet">Erreur : Billet inconnu</p>';
			echo ']]></result>';
			//==========
		}
		
		/** Ajout du scan du billet, je croyais qu'il ne fallait que rechercher le billet (d'où le nom de l'action portant à confusion) **/
		//=====On update l'info du billet en le mettant comme scanné (on supposera que cette action est faite après l'affichage des infos sur le billet)
		$infos = array('date_scan' => date("Y-m-d H:i:s"));
		$table_billet->change($infos, $billet['0']['billet_id']);
		//==========
	}
}
//==========
//=====Recherche d'un client
else if(isset($_GET['recherche']) && $_GET['recherche']=="client"){
	
	$table_client = new Client();
	
	if(isset($_GET['nom'])){
		
		//=====Requete pour les infos du client
		$filtres = array();
		$filtres[] = array('champ' => 'UPPER(client_nom)', 'valeur' => $_GET['nom']);
		$client = $table_client->getAll($filtres);
		//==========
		
		if($client!=null){ //on a au moins un client
			//=====On génére ainsi du html dans une balise xml <result> pour la récupération en ajax 
			echo '<result><![CDATA[';
			echo '<p class="recherche-client">Résultat(s) de la recherche</p>';
			echo '<table>
					<thead>
						<tr>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Nombre de billet</th>
							<th>Etat</th>
						</tr>
					</thead>
					<tbody>';
			//=====Chaque client est dans une ligne du tableau
			foreach($client as $key=>$c){
				
				//=====On fait une requete pour savoir combien on a de billet scanné et de billet non scanné pour ce client
				$filtre_nb_billet = array();
				$filtre_nb_billet_unscan = array();
				$field_nb_billet = array('count(*) as nb_billet');
				$filtre_nb_billet[] = array('champ' => 'client_id', 'valeur' => $c['client_id']);
				$filtre_nb_billet_unscan[] = array('champ' => 'client_id', 'valeur' => $c['client_id']);
				$filtre_nb_billet_unscan[] = array('champ' => 'billet_date_scan', 'valeur' => '0000-00-00 00:00:00', 'signe' => '!=');
				$nb_billet = $table_client->getInfoClient($filtre_nb_billet, $field_nb_billet);
				$nb_billet_unscan = $table_client->getInfoClient($filtre_nb_billet_unscan, $field_nb_billet);
				//==========
				
				echo '<tr class="separate"><td></td></tr>';
				echo '<tr>
						<td>'.$c['client_nom'].'</td>
						<td>'.$c['client_prenom'].'</td>
						<td>'.$nb_billet['0']['nb_billet'].'</td>';
				if($nb_billet_unscan['0']['nb_billet']==0)
					echo '<td>non scannés</td></tr>';
				else{
					echo '<td>'.$nb_billet_unscan['0']['nb_billet'];
					if($nb_billet_unscan['0']['nb_billet']=="1") 
						echo ' billet scanné</td></tr>';
					else
						echo ' billets scannés</td></tr>';
				}	
			}
			//==========
			echo '</tbody></table>]]></result>';
			//==========
		}
		else{ //pas de client trouvé
			//=====On génére ainsi du html dans une balise xml <result> pour la récupération en ajax 
			echo '<result><![CDATA[';
			echo '<p class="recherche-client">Résultat(s) de la recherche</p>';
			echo '<p class="erreur">Erreur : Nom inconnu</p>';
			echo ']]></result>';
			//==========
		}
	}
}
//==========

?>