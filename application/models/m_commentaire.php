<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour gérer l'accès au point et aux types de point */
class M_Commentaire extends MY_Model{

	protected $table = "commentaires";

	public function count(){
		return $this->db->count_all_results($this->table);
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
		// On insere le commentaire
		$this->db->set('point_id', $id_point);
		$this->db->set('profil_id', $id_profil);
		$this->db->set('com_texte', $texte);
		$this->db->insert('commentaires'); 


		// on met a jour le dernier evenement du point
		$this->db->set('point_date_actualite', date('Y-m-d H:i:s', now()) );
		$this->db->where('point_id', $id_point);
		$this->db->update('points');
	}

}