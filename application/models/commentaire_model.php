<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour gérer l'accès au point et aux types de point */
class Commentaire_model extends CI_Model{

	public function getLastTwentyPoints(){
		return $this->db->select('*')
				->from("commentaires NATURAL JOIN points")
				->order_by("point_id")
				->get(0)
				->result();
	}

	public function getLastTwentyPointsOf($id){
		return $this->db->select('*')
				->from("commentaires NATURAL JOIN points NATURAL JOIN profils")
				->where('point_id', (int) $id)
				->order_by("com_date")
				->get()
				->result();
	}

	public function count(){
		return $this->db->count_all_results('commentaires');
	}



}