<?php

class Facture extends Common
{

	function __construct()
	{
		parent::__construct('ryuk_billeterie_facture');
	}
	
	/**
	 * Retourne toutes les infos necessaires à la génération d'une facture
	 *
	 * @param array Filtres (cf. function filtre)
	 * @param array field du select (cf. function champ) - par defaut '*'
	 * @return array Les entrées sélectionnées
	 */
	function getFacture($filters = null, $field = array('*')){
		$rq = 'SELECT ';
		$rq .= $this->field($field);
		$rq .= ' FROM ryuk_billeterie_facture
		INNER JOIN ryuk_billeterie_commande ON facture_fk_commande_id = commande_id
		INNER JOIN ryuk_billeterie_client ON commande_fk_client_id = client_id 
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