<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour gérer l'accès au point et aux types de point */
class M_approuve extends CI_Model{

	/**
	 * [create description]
	 * @param  [type] $idPoint
	 * @param  [type] $idProfil
	 * @return [type]
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
	 * Recupère les personnes qui approuvent le point donné
	 * @param  $idPoint
	 * 			
	 * @return 
	 */
	public function getApprouve($idPoint) {
		return $this->db->select('profil_id, profil_nom')
				->from('approuve NATURAL JOIN profils NATURAL JOIN points')
				->where('point_id', $idPoint)
				->get()
				->result();
	}
}