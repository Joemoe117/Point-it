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


	/** 
	*	@return 	Récupère tous les commentaires d'un point 	
	*	@param 		id 		l'id du point pour lequel on veut récupérer les commentaires
	*/
	public function getCommentairePoint($id){
		return $this->db->select('*')
					->from("commentaires NATURAL JOIN points NATURAL JOIN profils")
					->where('point_id', (int) $id)
					->order_by("com_date")
					->get()
					->result();
	}


	/**
	*	@return 	ajoute un point dans la BDD
	*
	*/
	public function create( $id_point, $id_profil, $texte){
		$this->db->set('point_id', $id_point);
		$this->db->set('profil_id', $id_profil);
		$this->db->set('com_texte', $texte);
		$this->db->insert('commentaires'); 
	}

}