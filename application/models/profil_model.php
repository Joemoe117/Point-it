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
	



	/**
	*
	*
	*
	*/
	public function checkLogin($login, $password){

		$this->db->select();
		$this->db->where('profil_nom', $login);
		$query = $this->db->get('profils');
		$row = $query->row();


		if (!empty($row) && $this->password->validate_password($password, $row->profil_pass)){
			
			return 	$this->db->select('*')
					->from("profils")
					->where('profil_nom',  $login)
					->get()
					->result()[0];	// Envoie la première case du array pour éviter d'avoir un array en retour

		} else {
			return null;
		}
	}








	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////
	// 									UTILS								 //
	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////


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


	
	public function count(){
		return $this->db->count_all_results('profils');
	}

	/**
	*	@return 	Verifie qu'un profil existe vraiment dans la BDD
	*
	*/
	public function exist($id=0){
		$nb = $this->db->from("profils")
				->where('profil_id',  $id)
				->count_all_results();

		if ( $nb == 0 || $id == 0 ){
			return false;
		} else {
			return true;
		}
	}

}