<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modèle gérant l'accès à la BDD pour le leaderboard
 * @author gauvint
 */
class M_Leaderboard extends CI_Model {

	/**
	 * Récupère le classement général peut importe le type de point
	 * @param  integer $nb [description]
	 * @return [type]      [description]
	 */
	public function general($nb=0) {
		$query = $this->db->select('*, count(*) AS nb_points')
			->from('liste_points NATURAL JOIN profils')
			->group_by('profil_id')
			->order_by('nb_points', 'desc');

		if ($nb > 0)
			$query = $this->db->limit($nb);

		$query = $this->db->get()
			->result();

		return $query;
	}

	/**
	 * Récupère le classement selon le type du point
	 * @param  [type]  $type_point [description]
	 * @param  integer $nb         [description]
	 * @return [type]              [description]
	 */
	public function byTypePoint($type_point, $nb=0) {
		$query = $this->db->select('*, count(*) AS nb_points')
			->from('liste_points NATURAL JOIN profils')
			->where('typept_id', $type_point)
			->group_by('profil_id')
			->order_by('nb_points', "desc");

		if ($nb > 0)
			$query = $this->db->limit($nb);

		$query = $this->db->get()
			->result();

		return $query;
	}
}