<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour obtenir les infos d'une personnes */

class Profil_Model extends CI_Model
{
	protected $table = 'membre, point';

	
	/**
	*	function 	getAllProfil
	*	@return		Recupere tous les membres
	*	
	*/
	public function getAll(){
		return $this->db->select('*')
					->from("membre")
					->order_by("membre_pseudo")
					->get()
					->result();
	}



	/* Récupère le profil d'un membre et affiche son compte rendu de point */
	public function getOne($id){
	
		return $this->db->select('*')
					->from($this->table)
					->where('membre_id', (int) $id)
					->join('distribution', 'membre_id = distribution_membre_id')
					->get()
					->result();
	
	}
	

}