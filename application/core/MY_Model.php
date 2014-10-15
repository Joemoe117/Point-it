<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// -----------------------------------------------------------------------------

class MY_Model extends CI_Model{

	/**
	 * Permet d'insérer dans la BDD une entrée
	 * @param  array  $options_echappees     [description]
	 * @param  array  $options_non_echappees [description]
	 * @return [type]                        [description]
	 */
	public function create($options_echappees = array(), $options_non_echappees = array()){
		//	Vérification des données à insérer
		if(empty($options_echappees) AND empty($options_non_echappees))
		{
			return false;
		}
		
		return (bool) $this->db->set($options_echappees)
	                               ->set($options_non_echappees, null, false)
	                               ->insert($this->table);
	}

	/**
	 * [read description]
	 * @param  string $select [description]
	 * @param  array  $where  [description]
	 * @param  [type] $nb     [description]
	 * @param  [type] $debut  [description]
	 * @return [type]         [description]
	 */
	public function read($select = '*', $where = array(), $nb = null, $debut = null){
		return $this->db->select($select)
	                        ->from($this->table)
	                        ->where($where)
	                        ->limit($nb, $debut)
	                        ->get()
	                        ->result();
	}
	
	/**
	 * [update description]
	 * @param  [type] $where                 [description]
	 * @param  array  $options_echappees     [description]
	 * @param  array  $options_non_echappees [description]
	 * @return [type]                        [description]
	 */
	public function update($where, $options_echappees = array(), $options_non_echappees = array()){		
		//	Vérification des données à mettre à jour
		if(empty($options_echappees) AND empty($options_non_echappees))
		{
			return false;
		}
		
		//	Raccourci dans le cas où on sélectionne l'id
		if(is_integer($where))
		{
			$where = array('id' => $where);
		}

		return (bool) $this->db->set($options_echappees)
	                               ->set($options_non_echappees, null, false)
	                               ->where($where)
	                               ->update($this->table);
	}
	
	/**
	 * [delete description]
	 * @param  [type] $where [description]
	 * @return [type]        [description]
	 */
	public function delete($where){
		if(is_integer($where))
		{
			$where = array('id' => $where);
		}
		
		return (bool) $this->db->where($where)
	                               ->delete($this->table);
	}

	/**
	 * Retourne le nombre de valeur d'une table en fonction des paramètres donnés
	 * @param  array  $champ  
	 *         			Les colonnes sur lesquelles sont filtres les résultats
	 * @param  [type] $valeur 
	 *         			Les valeurs à rechercher
	 * @return [type] 
	 *         			un entier contenant le nombre d'entréee correspondant au paramètre
	 */
	public function count($champ = array(), $valeur = null) {
		return (int) $this->db->where($champ, $valeur)
	                              ->from($this->table)
	                              ->count_all_results();
	}
}

/* End of file MY_Model.php */
/* Location: ./system/application/core/MY_Model.php */