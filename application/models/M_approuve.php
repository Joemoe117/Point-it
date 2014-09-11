<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour gérer l'accès au point et aux types de point */
class M_approuve extends CI_Model{

	protected $table = "approuve";

	/**
	 * [create description]
	 * @param  [type] $idPoint
	 * @param  [type] $idProfil
	 * @return 
	 * 			false si le point n'existe pas
	 * 			true sinon
	 */
	public function create($idPoint, $idProfil){
		// on vérifie que l'approuve n'existe pas déjà
		$existe = $this->db->select('*')
			->from('approuve')
			->where('profil_id',$idProfil )
			->where('point_id', $idPoint)
			->count_all_results();
		if ($existe > 0)
			return false;

		// si non, on l'ajoute
		$this->db->set('point_id',  (int) $idPoint);
		$this->db->set('profil_id', (int) $idProfil);
		$this->db->insert($this->table);

		// on met à jour la date du point
		$this->db->set('point_date_actualite', date('Y-m-d H:i:s', now()));
		$this->db->where('point_id', (int) $idPoint);
		$this->db->update("points");

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