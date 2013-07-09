<?php
/**
 * Classe commune
 * Mère de toutes les autres classes, permet d'avoir des fonctionnalités communes classiques (insert, modif, avec sécurité...)
 *
 *
 *  Exemple d'utilisation (retourne l'age des 20 premieres Personnes actives, non archivées, triées par Nom croissant)
 *  $obj = new Personne();
 *  $filtres = array();
 *  $filtres[] = array('champ' => 'actif', 'valeur' => 1);
 *  $filtres[] = array('champ' => 'archive', 'valeur' => 0);
 *  $liste = $obj->getAll($filtres, array('nom' => 'ASC), 0, 20, array('age'));
 */

class Common {

	protected $table;
	
	private $prev_table = 'ryuk_billeterie_';
	
	function __construct($table)
	{
		$this->table = str_replace('ryuk_billeterie_', '', $table);
	}
		/**
	 * Ajoute un filtre dans une requete
	 * @param array $filtres 2 niveaux
	 * 		champ => nom_du_champ
	 * 		valeur => la_valeur
	 * 		signe => le_signe (optionnel, par defaut '=')
	 * 		operateur => loperateur (optionnel, par défaut 'AND')
	 * 		ex : $filtre[] = array('champ' => 'table_nom', 'valeur' => 'dupond');
	 * @return string requete
	 */
	function filter($filters) {
		$rq = '';

		if (is_array($filters)) {
			foreach ($filters as $f) {

				if (!isset($f['signe'])) {
					$f['signe'] = '=';
				}
				if (is_null($f['valeur'])) {
					$f['signe'] = '';
				}
				if (!isset($f['operateur'])) {
					$f['operateur'] = 'AND';
				}
				//TODO !! TEMP : Chevrons à ré-implémenter ultérieurement
				// commenté pour requêtes style table.champ =
				// $rq .= ' '.$f['operateur'].' `'.escape_string($f['champ']).'` '.$f['signe'];
				$rq .= ' '.$f['operateur'].' '.escape_string($f['champ']).' '.$f['signe'];
				if ($f['signe'] == 'IN') {
					$rq .= $f['valeur'];
				} elseif (is_null($f['valeur'])) {
					$rq .= 'IS NULL';
				} else {
					$rq .= '"'.$f['valeur'].'"';
				}
			}
		}
		return $rq;
	}

	/**
	 * Ajoute un tri dans une requete
	 * @param array $tri
	 * 		Liste de couple champ => valeur
	 * 		ex : $tri = array('table_nom' => 'ASC', 'table_prenom' => 'ASC');
	 * @return string requete
	 */
	function sort($sort) {

		$rq = '';

		if (is_array($sort)) {
			$rq .= ' ORDER BY ';
			foreach ($sort as $t => $v) {
				// !! TEMP : Chevrons à ré-implémenter ultérieurement
				// commenté pour reuêtes style ORDER BY table.champ
				// $rq .= '`'.escape_string($t).'` '.escape_string($v).', ';
				$rq .= ''.escape_string($t).' '.escape_string($v).', ';
			}
			$rq = substr($rq, 0, strlen($rq)-2);
		}

		return $rq;
	}

	/**
	 *
	 * Ajoute une limite dans une requete
	 * @param int $begin (début de la limite)
	 * @param int $nb (nombre de lignes)
	 * @return string requete
	 */
	function limit($begin, $nb) {

		if ($begin || $nb) {
			return ' LIMIT '.$begin.', '.$nb;
		}

		return '';
	}

	/**
	 * Ajoute des champs dans une requete
	 * @param array $field
	 * 		Liste de champ désiré
	 * 		ex : $champ = array('nom', 'prenom', 'age');
	 * @return string requete
	 */

	function field($field) {

		$rq = '';

		foreach($field as $c) {
			$rq .= $c.', ';
		}
		
		return substr($rq, 0, strlen($rq)-2);
	}

	/**
	 * Récupère le nombre d'entrée total de la table
	 *
	 * @param array $filters (optionnel) (cf. function filtre)
	 * @return int Nombre d'entrée
	 */
	function getCount($filters = null) {

		$rq = 'SELECT COUNT(*) AS nb FROM `'.$this->prev_table.$this->table.'` WHERE 1 ';
		
		$rq .= $this->filter($filters);

		$rs = query($rq);
		$rw = fetch_assoc($rs);
		free_result($rs);
		return $rw['nb'];
	}

	/**
	 * Retourne une entrée
	 *
	 * @param int Id
	 * @param array field du select (optionnel) (cf. function field)
	 * @return array L'entrée qui correspond à l'id donné
	 */
	function get($id, $field = array('*'))
	{

		$rq = 'SELECT ';
		$rq .= $this->field($field);
		$rq .= ' FROM `'.$this->prev_table.$this->table.'` WHERE `'.$this->table.'_id` = %d';
		$rq = sprintf($rq, escape_string($id));

		$rs = query($rq);
		$rw = fetch_assoc($rs);
		free_result($rs);
		return $rw;
	}

	/**
	 * Retourne toutes les entrées de la table
	 *
	 * @param array Filtres (cf. function filtre)
	 * @param array Tris (cf. function tri)
	 * @param int Début (cf. function limit)
	 * @param int Fin (cf. function limit)
	 * @param array field du select (cf. function champ) - par defaut '*'
	 * @return array Les entrées sélectionnées
	 */
	function getAll($filters = null, $sort = null, $begin = null, $nb = null, $field = array('*')) {

		$rq = 'SELECT ';
		$rq .= $this->field($field);
		$rq .= ' FROM `'.$this->prev_table.$this->table . '` WHERE 1';
		$rq .= $this->filter($filters);
		$rq .= $this->sort($sort);
		$rq .= $this->limit($begin, $nb);

		$rs = query($rq);

		$result = array();
		while ($rw = fetch_assoc($rs)) {
			$result[] = $rw;
		}

		free_result($rs);

		return $result;

	}

	/**
	 *
	 * Créer une entrée dans la table
	 * @param array $infos (liste des field par couple champ => valeur)
	 * 		ex : $infos = array('nom' => 'dupond', 'prenom' => 'pierre');
	 * @return int L'id crée
	 */
	function create($infos){
		$rq = 'INSERT INTO `' . $this->prev_table.$this->table . '` (';
		
		foreach ($infos as $info => $value) {
			$rq .= '`'.escape_string($this->table) . '_' . escape_string($info) . '`, ';
		}
		$rq = substr($rq, 0, strlen($rq)-2);
		$rq .= ') VALUES (';
		foreach ($infos as $info => $value) {
			if (is_null($value)) {
				$rq .= 'NULL, ';
			} elseif ($value === 'now') {
				$rq .= 'NOW(), ';
			} else {
				$rq .= '"' . escape_string(trim($value)) . '", ';
			}
		}
		$rq = substr($rq, 0, strlen($rq)-2) . ')';
		query($rq);

		$id = insert_id();

		return $id;

	}
	
	/**
	 *
	 * Modifie une entrée dans la table
	 * @param array $infos (liste des champs à modifier par couple f => valeur)
	 * 		ex : $infos = array('nom' => 'dupond', 'prenom' => 'pierre');
	 * @param int $id l'id modifié
	 */
	function change($infos, $id) {

		$rq = 'UPDATE `' . $this->prev_table.$this->table . '` SET ';
		
		foreach ($infos as $info => $value) {
			if (is_null($value)) {
				$rq .= '`'.escape_string($this->table) . '_' . escape_string($info) . '` = NULL, ';
			} elseif ($value === 'now') {
				$rq .= '`'.escape_string($this->table) . '_' . escape_string($info) . '` = NOW(), ';
			} else {
				$rq .= '`'.escape_string($this->table) . '_' . escape_string($info) . '` = "' . escape_string(trim($value)) . '", ';
			}
		}
		$rq = substr($rq, 0, strlen($rq)-2);
		$rq .= ' WHERE `' . escape_string($this->table) . '_id` = ' . escape_string($id);

		query($rq);
	}
}

?>