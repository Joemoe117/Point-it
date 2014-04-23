<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour obtenir les infos d'un membre */
class Profil_model extends CI_Model{

	/**
	*	function 	getAllProfil
	*	@return		Recupere tous les membres
	*	
	*/
	public function getAll(){
		return $this->db->select('*')
					->from("profils")
					->order_by("profil_nom")
					->get()
					->result();
	}



	/* Récupère le profil d'un membre et affiche son compte rendu de point */
	public function getOne($id){
	
		return $this->db->select('*')
					->from("profils")
					->where('profil_id', (int) $id)
					->get()
					->result();
	}
	

	public function count(){
		return $this->db->count_all_results('profils');
	}


	/**
	*
	*
	*
	*/
	public function checkLogin($login, $password){

		$res = 	$this->db->select('*')
					->from("profils")
					->where('profil_nom',  $login)
					->where('profil_pass', $password)
					->count_all_results();

		// si identification réussie
		if ($res == 1) {
			return 	$this->db->select('*')
					->from("profils")
					->where('profil_nom',  $login)
					->where('profil_pass', $password)
					->get()
					->result()[0];	// Envoie la première case du array pour éviter d'avoir un array en retour
		} 

		return false;
	}





		/**
		* @return 		retourne le nombre de point possédé par une personne
		*
		*/
		public function getNbPoint($id){
			return 	$this->db->select('*')
				->from("recoit")
				->where('profil_id',  $id)
				->count_all_results();
		}


		/**
		* @return 		retourne le nombre de commentaire posté par une personne
		*
		*/
		public function getNbCommentaire($id){
				return 	$this->db->select('*')
						->from("commentaires")
						->where('profil_id',  $id)
						->count_all_results();
		}




}