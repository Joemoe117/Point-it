<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour gérer l'accès au point et aux types de point */
class Approuve_model extends CI_Model{

	/**
	*	Rajoute dans la BDD un approuve de point
	*	
	*/
	public function create($idPoint, $idProfil){
		$existe = $this->db->select('*')
			->from('approuve')
			->where('profil_id',$idProfil )
			->where('point_id', $idPoint)
			->count_all_results();

		if ($existe > 0)
			return false;

		$this->db->set('point_id', 	$idPoint);
		$this->db->set('profil_id', $idProfil);
		$this->db->insert('approuve');

		return true;
	}


	/**
	 * 
	 */

	public function getApprouve($idPoint) {
		return $this->db->select('profil_id, profil_nom')
				->from('approuve NATURAL JOIN profils NATURAL JOIN points')
				->where('point_id', $idPoint)
				->get()
				->result();
	}
}