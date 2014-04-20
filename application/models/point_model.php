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
	*	function 	getAllPoints
	*	@return		Recupere tous les points et les info associés
	*	
	*/
	public function getAllPoints(){
		return $this->db->select('point_id, typept_id, typept_nom, point_description, point_date_crea, point_date_evenement, profil_id_donne, Donne.profil_nom AS profil_nom_donne')
					->from('Points NATURAL JOIN Types_Point')
					->join('Profils AS Donne', 'Donne.profil_id = profil_id_donne', 'inner')
					->order_by('typept_nom')
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



	public function getLastTwentyOf($id){

		return $this->db->select()
				->from("points NATURAL JOIN recoit NATURAL JOIN types_point NATURAL JOIN profils")
				->where('recoit.profil_id', (int) $id)
				->order_by("point_id")
				->get()
				->result();

	}

}