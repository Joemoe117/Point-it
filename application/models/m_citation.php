<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour gérer l'accès au point et aux types de point */
class M_Citation extends MY_Model{

	protected $table = "citations";

	/**
	*	function 	getAllType
	*	@return		Recupere tous les types de point
	*
	*/
	public function getAllType(){
		return $this->db->select('*')
					->from('types_point')
					->order_by('typept_nom')
					->get()
					->result();
	}


	/**
	*	function 	getOneType
	*	@return		Recupere un type de point
	*
	*/
	public function getOne($id) {
		return $this->db->select()
					->from($this->table)
					->where('profil_id', $id)
					->order_by('created')
					->get()
					->result();
	}
}
