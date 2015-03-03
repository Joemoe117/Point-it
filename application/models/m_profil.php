<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Modèle qui gère l'accès à la BDD pour obtenir les infos d'un membre */
class M_Profil extends MY_Model{

	protected $table = "profils";

	/**
	*	function 	getAllProfil
	*	@return		Recupere tous les membres
	*	
	*/
	public function getAll(){
		return $this->db->select('profil_id, profil_nom')
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
	 *	@param 		$nom 	name
	 *	@param 		$pass 	password
	 *	@param 		$image 	picture
	 *	
	 *	@return 	ID du profil ou false pour un échec
	 */
	public function create($nom, $pass, $image = false) {
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
	* Check if a user with the given credentials exists.
    * @param login
     *      the login of the user
	* @param password
     *      the password of the user
	* @return
    *       null if the user does not exist
    *       a user object with all the informations
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
     * Set a new image for the given user
     * @param $id
     *      id of the user
     * @param $avatar
     *      new avatar of the user
     */
	public function setImage($id, $avatar) {

		$data['profil_image'] = $avatar;

		$this->db->where('profil_id', $id)
			->update('profils', $data);
	}


	/**
	*	Change le mot de passe
	* @param id
    *       the id of the user to modify
    * @param password
    *       the new password
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
     * Return the number of points given to the given user
     * @param $id
     *      the id of the user
     * @return int
     *      the number of point given to this user
     */
	public function getNbPoint($id){
		return 	$this->db->select('*')
			->from("recoit")
			->where('profil_id',  $id)
			->count_all_results();
	}


    /**
     * Return the number of comments of this user
     * @param $id
     *      the id of the user
     * @return int
     *      the number of comments of this user
     */
	public function getNbCommentaire($id){
		return 	$this->db->select('*')
				->from("commentaires")
				->where('profil_id',  $id)
				->count_all_results();
	}

    /**
     * Check if a user exists with the given id
     * @param int $id
     *      the id of the user
     * @return bool
     *      true if this id exists
     *      false otherwise
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
     * Cechk if a user exists with the given name.
     * @param $name
     *      name to check
     * @return bool
     *      true if this name exists
     *      false otherwise
     */
	public function existNom($name) {
		$nb = $this->db->from("profils")
				->where('profil_nom', $name)
				->count_all_results();

		if ($nb == 0)
			return false;
		else
			return true;
	}


    /**
     * Return an array with the number of points by type of point
     * @param int $id
     *      the id of the user
     * @return mixed
     *      an array
     */
	public function getNumberOfPointByType( $id=0 ){
		return $this->db->select('profil_nom, typept_nom, count(typept_nom) AS nombre')
			->from('recoit NATURAL JOIN profils NATURAL JOIN points NATURAL JOIN types_point')
			->where('recoit.profil_id', (int) $id)
			->group_by('typept_nom')
			->get()
			->result();
	}

    /**
     * Set the last connection of the user.
     * Called on login.
     * @param int $id
     *      id of the user
     */
    public function setLastConnection( $id = 0 ){
        $this->db->set('profil_last_connection', 'NOW()', FALSE);
        $this->db->where('profil_id', $id);
        $this->db->update($this->table);
    }
}