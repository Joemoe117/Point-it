<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour obtenir les infos d'un membre */
class M_Profil extends CI_Model{

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



	/* Récupère le profil complet d'un membre ou juste un attribut si demandé */
	public function getOne($id, $attr='*') {
	
		return $this->db->select($attr)
					->from("profils")
					->where('profil_id', (int) $id)
					->get()
					->result()[0];
	}
	

	/**
	 *	Ajouter un compte
	 *
	 *	@param 		$nom 	Nom du profil	
	 *	@param 		$pass 	Mot de passe du profil
	 *	@param 		$image 	Avatar du profil (optionel)
	 *	
	 *	@return 	ID du profil ou false pour un échec
	 */
	public function create($nom, $pass, $image=false) {
		$data['profil_nom'] = $nom;
		$data['profil_pass'] = $pass;
		if ($image)
			$data['profil_image'] = $image;

		$this->db->insert('profils', $data);

		// Récupération ID
		$query = $this->db->select('profil_id')
			->from('profils')
			->where('profil_nom', $nom)
			->limit(1)
			->get()
			->result();

		if (!empty($query))
			return $query[0]->profil_id;
		else
			return false;
	}


	/**
	*
	*
	*
	*/
	public function checkLogin($login, $password) {

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


	/**
	*	Vérifie si le mdp d'un profil_id est correcte
	*
	*	@return bool 	true si bon, false si faux
	*/
	public function checkPass($id, $password) {

		$this->db->select();
		$this->db->where('profil_id', $id);
		$query = $this->db->get('profils');
		$row = $query->row();

		if (!empty($row) && $this->password->validate_password($password, $row->profil_pass))
			return true;
		else
			return false;
	}


	/**
	*	Change l'avatar
	*
	*/
	public function setImage($id, $avatar) {

		$data['profil_image'] = $avatar;

		$this->db->where('profil_id', $id)
			->update('profils', $data);
	}


	/**
	*	Change le mot de passe
	*
	*/
	public function setPass($id, $password) {

		$data['profil_pass'] = $password;

		$this->db->where('profil_id', $id)
			->update('profils', $data);
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


	/**
	*	@return 	Verifie que le nom d'un profil existe déjà dans la BDD
	*
	*/
	public function existNom($nom) {
		$nb = $this->db->from("profils")
				->where('profil_nom', $nom)
				->count_all_results();

		if ($nb == 0)
			return false;
		else
			return true;
	}


	/**
	 * [getNumberOfPointByType description]
	 * @param  integer $id [description]
	 * @return [type]      [description]
	 */
	public function getNumberOfPointByType( $id=0 ){
		return $this->db->select('profil_nom, typept_nom, count(typept_nom) AS nombre')
			->from('recoit NATURAL JOIN profils NATURAL JOIN points NATURAL JOIN types_point')
			->where('recoit.profil_id', (int) $id)
			->group_by('typept_nom')
			->get()
			->result();
	}
}