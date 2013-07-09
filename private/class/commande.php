<?php

class Commande extends Common
{

	function __construct()
	{
		parent::__construct('ryuk_billeterie_commande');
	}

	/**
	 * Retourne les entrées utiles pour la gestion des commandes
	 *
	 * @param array Filtres (cf. function filtre)
	 * @param array Tris (cf. function tri)
	 * @param int Début (cf. function limit)
	 * @param int Fin (cf. function limit)
	 * @param array field du select (cf. function champ) - par defaut '*'
	 * @return array Les entrées sélectionnées
	 */
	function getCommande($field = array('*'), $filters = null, $sort = null, $begin = null, $nb = null){
		$rq = 'SELECT ';
		$rq .= $this->field($field);
		$rq .= ' FROM `ryuk_billeterie_commande` 
		INNER JOIN ryuk_billeterie_client ON client_id = commande_fk_client_id';
		$rq .= $this->filter($filters);
		$rq .= $this->sort($sort);
		$rq .= $this->limit($begin, $nb);
		//echo $rq;
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