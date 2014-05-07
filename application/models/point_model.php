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
	*	@return		Recupere tous les points et les info associés ainsi que les profils qui ont reçu les points
	*	
	*/
	public function getAllPoints (){
		$allPoints =  $this->db->select('point_id, typept_id, typept_nom, point_description, point_date_crea, point_date_evenement, profil_id_donne, Donne.profil_nom AS profil_nom_donne')
						->from('Points NATURAL JOIN Types_Point')
						->join('Profils AS Donne', 'Donne.profil_id = profil_id_donne', 'inner')
						->order_by('point_date_actualite', 'desc')
						->get()
						->result();

		// Recherche des profils qui ont reçu les points et ils seront stockés dans le champs recoit de chaque points
		foreach ($allPoints as $point) {
			$point->recoit = $this->db->select('profil_id, profil_nom, profil_image')
											->from('Recoit NATURAL JOIN Profils')
											->where('point_id', $point->point_id)
											->get()
											->result();
		}

		return $allPoints;
	}

	/**
	*	function 	getAllPoints
	*	@return		Recupere tous les points et les info associés ainsi que les profils qui ont reçu les points
	*	
	*/
	public function getAllPointsOf( $id ){
		$allPoints =  $this->db->select('point_id, typept_id, typept_nom, point_description, point_date_crea, point_date_evenement, profil_id_donne, Donne.profil_nom AS profil_nom_donne')
						->from('Points NATURAL JOIN Types_Point NATURAL JOIN recoit')
						->join('Profils AS Donne', 'Donne.profil_id = profil_id_donne', 'inner')
						->where('recoit.profil_id', (int) $id)
						->order_by('point_date_actualite', 'desc')
						->get()
						->result();

		// Recherche des profils qui ont reçu les points et ils seront stockés dans le champs recoit de chaque points
		foreach ($allPoints as $point) {
			$point->recoit = $this->db->select('profil_id, profil_nom, profil_image')
											->from('Recoit NATURAL JOIN Profils')
											->where('point_id', $point->point_id)
											->get()
											->result();
		}

		return $allPoints;
	}



	/**
	* @return 	recupere les 20 derniers points chronologiquement
	*
	*
	*/
	public function getLastTwenty(){
		return $this->db->select()
					->from("points NATURAL JOIN recoit NATURAL JOIN types_point NATURAL JOIN profils")
					->order_by("point_id", 'desc')
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


	/**
	*	@return  	ajoute un point dans la BDD
	*	TODO
	*
	*/
	public function createPoint( $typept_id, $profil_id_donne, $texte ){
		$this->db->set('typept_id', $typept_id);
		$this->db->set('profil_id_donne', $profil_id_donne);
		$this->db->set('point_description', $texte);
		$this->db->insert('points');

		// on renvoie l'id de la transaction
		return $this->db->insert_id();
	}





	/**
	*	@return  	
	*	TODO
	*
	*/
	public function createRecoit( $point_id, $profil_id ){
		$this->db->set('point_id', $point_id);
		$this->db->set('profil_id', $profil_id);
		$this->db->insert('recoit');

	}

}