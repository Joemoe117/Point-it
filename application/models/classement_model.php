<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Classement_model extends CI_Model {

	public function general($nb=0) {
		$query = $this->db->select('profil_nom, count(*) AS nb_points')
			->from('liste_points')
			->group_by('profil_nom')
			->order_by('nb_points');

		if ($nb > 0)
			$query = $this->db->limit($nb);

		$query = $this->db->get()
			->result();

		return $query;
	}

	public function byTypePoint($type_point, $nb=0) {
		$query = $this->db->select('profil_nom, count(*) AS nb_points')
			->from('liste_points')
			->where('typept_nom', $type_point)
			->group_by('profil_nom')
			->order_by('nb_points');

		if ($nb > 0)
			$query = $this->db->limit($nb);

		$query = $this->db->get()
			->result();

		return $query;
	}
}