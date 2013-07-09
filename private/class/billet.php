<?php

class Billet extends Common
{

	function __construct()
	{
		parent::__construct('ryuk_billeterie_billet');
	}
	
	/**
	 * Retourne toutes les infos necessaires à une recherche de billet par une hotesse
	 *
	 * @param array Filtres (cf. function filtre)
	 * @param array field du select (cf. function champ) - par defaut '*'
	 * @return array Les entrées sélectionnées
	 */
	function getInfoBillet($filters = null, $field = array('*')){
		$rq = 'SELECT ';
		$rq .= $this->field($field);
		$rq .= ' FROM ryuk_billeterie_billet
		INNER JOIN commande ON commande_id = billet_fk_commande_id
		INNER JOIN client ON client_id = commande_fk_client_id 
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
	
	/**
	 * Verifie si le numero de billet n'existe pas
	 *
	 * @param int $num_billet
	 * @return boolean
	 */
	function verif_billet($num_billet){
		$rq = 'SELECT billet_id 
		FROM ryuk_billeterie_billet
		WHERE billet_numero = "'.$num_billet.'"';
		
		$rs = query($rq);
		$rw = fetch_assoc($rs);
		free_result($rs);
		
		if($rw['billet_id']!=null)
			return false;
		return true;
	}
}

?>