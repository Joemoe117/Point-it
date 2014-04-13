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
					->from("profil")
					->order_by("nom")
					->get()
					->result();
	}



	/* Récupère le profil d'un membre et affiche son compte rendu de point */
	public function getOne($id){
	
		return $this->db->select('*')
					->from($this->table)
					->where('id', (int) $id)
					->get()
					->result();
	}
	

}