<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour gérer l'accès au point et aux types de point */
class M_Point extends MY_Model{

	protected $table = "points";

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
	 * Recupère les n derniers points donnés.
	 * @param  [type] $nb       Le nombre de point que l'on veut récupérer
	 * @param  [type] $limit    index à partir duquel on veut récupérer les point(ie, la pagination)
	 * @param  [type] $idProfil si null, on recupère de toute les personnes, sinon on recupère de cet id.
	 * @return [type]           
	 */
	public function getAllPoints ($nb=null, $limit=null, $idProfil=null) {

		// selon si l'id est défini ou non, on recupere les points de tout le 
		// monde ou de la personne concernée
		if (isset($idProfil)){
			$allPoints =  $this->db->select('*, donne.profil_nom AS profil_nom_donne')
				->from('points NATURAL JOIN types_point NATURAL JOIN recoit')
				->join('profils AS donne', 'donne.profil_id = profil_id_donne', 'inner')
				->where('recoit.profil_id', (int) $idProfil)
				->order_by('point_date_actualite', 'asc');
		} else {
			$allPoints =  $this->db->select('*, donne.profil_nom AS profil_nom_donne')
				->from('points NATURAL JOIN types_point')
				->join('profils AS donne', 'donne.profil_id = profil_id_donne', 'inner')
				->order_by('point_date_actualite', 'desc');
		}
		

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

		// recherche des personnes qui approuvent
		foreach ($allPoints as $point) {
			$point->approuve = $this->db->select('profil_id, profil_nom')
				->from('approuve NATURAL JOIN profils NATURAL JOIN points')
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
		$this->db->set('point_date_actualite', date('Y-m-d H:i:s', now()));
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