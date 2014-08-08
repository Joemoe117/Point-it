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
	public function getOneType($id, $attr='*') {
		return $this->db->select($attr)
					->from('types_point')
					->where('typept_id', $id)
					->order_by('typept_nom')
					->get()
					->result()[0];
	}


	/**
	*	function 	getAllPoints
	*	@return		Recupere tous les points et les info associés ainsi que les profils qui ont reçu les points
	*	
	*/
	public function getAllPoints ($nb=null, $limit=null) {
		$allPoints =  $this->db->select('*, donne.profil_nom AS profil_nom_donne')
			->from('points NATURAL JOIN types_point')
			->join('profils AS donne', 'donne.profil_id = profil_id_donne', 'inner')
			->order_by('point_date_actualite', 'desc');

		// Limit
		if (isset($nb) AND isset($limit))
			$allPoints = $allPoints->limit($nb, $limit);
		elseif (isset($nb))
			$allPoints = $allPoints->limit($nb);
						
		$allPoints = $allPoints->get()
			->result();

		// Recherche des profils qui ont reçu les points et ils seront stockés dans le champs recoit de chaque points
		foreach ($allPoints as $point) {
			$point->recoit = $this->db->select('profil_id, profil_nom, profil_image')
											->from('recoit NATURAL JOIN profils')
											->where('point_id', $point->point_id)
											->get()
											->result();
		}

		return $allPoints;
	}


	/**
	*	function 	getAllPointsOf
	*	@return		Recupere tous les points et les info associés d'un profil
	*	
	*/
	public function getAllPointsOf( $id, $nb=null, $limit=null) {
		$allPoints =  $this->db->select('point_id, typept_id, typept_nom, point_description, point_date_crea, point_date_evenement, profil_id_donne, donne.profil_nom AS profil_nom_donne')
			->from('points NATURAL JOIN types_point NATURAL JOIN recoit')
			->join('profils AS donne', 'donne.profil_id = profil_id_donne', 'inner')
			->where('recoit.profil_id', (int) $id)
			->order_by('point_date_actualite', 'desc');

		// Limit
		if (isset($nb) AND isset($limit))
			$allPoints = $allPoints->limit($nb, $limit);
		elseif (isset($nb))
			$allPoints = $allPoints->limit($nb);
		
		$allPoints = $allPoints->get()
			->result();

		// Recherche des profils qui ont reçu les points et ils seront stockés dans le champs recoit de chaque points
		foreach ($allPoints as $point) {
			$point->recoit = $this->db->select('profil_id, profil_nom, profil_image')
				->from('recoit NATURAL JOIN profils')
				->where('point_id', $point->point_id)
				->get()
				->result();
		}

		return $allPoints;
	}


	/**
	*	@param 		$id 	ID du point
	* 	@return 	Vrai si le point existe faux sinon
	**/

	public function typePointExist($id) {
		$nb = $this->db->from("types_point")
			->where('typept_id', $id)
			->count_all_results();

		if ($nb == 0 || $id == 0)
			return false;
		else
			return true;
	}











	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////
	// 									CREATE								 //
	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////

	/**
	*	@return  	ajoute un point dans la BDD
	*	TODO
	*
	*/
	public function createPoint( $typept_id, $profil_id_donne, $texte, $epique, $date = false){
		$this->db->set('typept_id', $typept_id);
		$this->db->set('profil_id_donne', $profil_id_donne);
		$this->db->set('point_description', $texte);
		$this->db->set('point_epique', $epique);
		if ($date)
			$this->db->set('point_date_evenement', $date);
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










	//////////////////////////////
	// 			UTILS 
	//////////////////////////////

	/**
	*	@return recupere le nombre de points distribué sur le site
	*
	*/
	public function count(){
		return $this->db->count_all_results('points');
	}

	public function exist($id=0){
		$nb = 	$this->db->from('types_point')
						->where('typept_id',  $id)
						->count_all_results();

		if ( $nb == 0 || $id == 0 ){
			return false;
		} else {
			return true;
		}
	}
}