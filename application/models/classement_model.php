<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Classement_model extends CI_Model {

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