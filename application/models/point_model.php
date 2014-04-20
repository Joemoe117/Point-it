<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour gérer l'accès au point et aux types de point */
class Point_model extends CI_Model{

	/**
	*	function 	getAllType
	*	@return		Recupere tous les types de point
	*	
	*/
	public function getAllType(){
		return $this->db->select('*')
					->from("types_point")
					->order_by("typept_nom")
					->get()
					->result();
	}

	/**
	* @return 	recupere les 20 derniers points chronologiquement
	*
	*
	*/
	public function getLastTwenty(){
		return $this->db->select()
					->from("points NATURAL JOIN recoit NATURAL JOIN types_point NATURAL JOIN profils")
					->order_by("point_id")
					->get()
					->result();
	}

	public function count(){
		return $this->db->count_all_results('points');
	}


	public function getLastTwentyOf($id){

		return $this->db->select()
				->from("points NATURAL JOIN recoit NATURAL JOIN types_point NATURAL JOIN profils")
				->where('recoit.profil_id', (int) $id)
				->order_by("point_id")
				->get()
				->result();

	}

}