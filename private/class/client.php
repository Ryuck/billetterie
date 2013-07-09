<?php

class Client extends Common
{

	function __construct()
	{
		parent::__construct('ryuk_billeterie_client');
	}
	
	/**
	 * Retourne toutes les infos necessaires à une recherche d'une personne par une hotesse
	 *
	 * @param array Filtres (cf. function filtre)
	 * @param array field du select (cf. function champ) - par defaut '*'
	 * @return array Les entrées sélectionnées
	 */
	function getInfoClient($filters = null, $field = array('*')){
		$rq = 'SELECT ';
		$rq .= $this->field($field);
		$rq .= ' FROM ryuk_billeterie_client
		INNER JOIN ryuk_billeterie_commande ON client_id = commande_fk_client_id
		INNER JOIN ryuk_billeterie_billet ON commande_id = 	billet_fk_commande_id 
		WHERE 1';
		$rq .= $this->filter($filters);
		$rs = query($rq);
		
		$result = array();
		while ($rw = fetch_assoc($rs)) {
			$result[] = $rw;
		}
		
		free_result($rs);

		return $result;
		
	}
}

?>