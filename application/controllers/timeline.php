<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Classe permettant d'afficher la timeline du site résumant les derniers
 * points ajoutés au site et également a donner de points
 */
class Timeline extends CI_Controller {

	// Déclaration des constantes
	const POINT_BY_PAGE = 10;
	const POINT_BY_PAGE_ADD = 10;

	public function __construct()	{
		parent::__construct();
		
		// Redirection si non connecté
		if (!$this->session->userdata('id')){
			redirect('/login', 'location');
		}

		// Chargement des models
		$this->load->model('m_profil', "profilManager");
		$this->load->model('m_commentaire', "commentaireManager");
		$this->load->model('m_point', "pointManager");

	}

	public function index()	{
		$this->retrieve();
	}

	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////

	/**
	*	@return 	affiche la timeline
	*
	*
	*/
	public function retrieve() {

		/* Génération des informations du formulaire */
		$data['form_point'] = $this->pointManager->getAllType();
		$data['form_profil'] = $this->profilManager->getAll();
			
		/* Recupération des $initNbPoints derniers points et des commentaires de chaque point */
		$data['points'] = $this->pointManager->getAllPoints(self::POINT_BY_PAGE);
		foreach ($data['points'] as $value) {
			$data['commentaires'][$value->point_id] = $this->commentaireManager->getCommentairePoint($value->point_id); 
		}
		
		// chargement des vues
		$data['titre'] 	= "Timeline";
		$data['menu']	= "timeline";
		$data['point_by_page']	= self::POINT_BY_PAGE;
		$data['point_by_page_add']	= self::POINT_BY_PAGE_ADD;
		$this->load->view('template/header.php', $data);
		$this->load->view('timeline/view_timeline.php', $data);
		$this->load->view('template/footer.php');
	}


	/**
	 * 	@param 	$nb 	Le nombre de point à afficher
	 * 	@param 	$limit 	À partir de quel point on récupère $nb points
	 *
	 *	@return Revoie le HTML pour afficher des points supplémentaires à la timeline
	 */
	public function get_points($nb, $limit) {
		/* Recupération des $nb points et des commentaires de chaque point */
		$data['points'] = $this->pointManager->getAllPoints($nb, $limit);
		foreach ($data['points'] as $value) {
			$data['commentaires'][$value->point_id] = $this->commentaireManager->getCommentairePoint($value->point_id); 
		}
		$this->load->view('timeline/view_affiche_points.php', $data);
	}


	public function add_point() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			// récupération du Post
			$personnes 		= $this->input->post('personnes', true);
			$point 			= $this->input->post('point', true);
			$texte	 		= nl2br($this->input->post('texte_point', true)); // Ajoute un <br> pour chaque retour à la ligne
			$donneur 		= $this->session->userdata('id');
			$date			= $this->input->post('date', true);

			// Comme le typage en PHP c'est de la merde, je le fais à la main
			if ($this->input->post('epique', true) == 'true')
				$epique 	= true;
			else
				$epique 	= false;


			$checkForm = $this->_checkFormAddPoint($personnes, $point, $texte, $epique, $donneur, $date);

			// Si $checkForm vaut 0 Alors le formulaire est bon
			if ($checkForm === 0) {
				// Si il existe une date d'évenement, la convertir en timestamp et enregistrer le point
				if (!(is_null($date) OR empty($date) OR !$date))
					$point_id = $this->pointManager->createPoint( $point, $donneur, $texte, $epique, $date);
				// Sinon on crée juste le point
				else
					$point_id = $this->pointManager->createPoint( $point, $donneur, $texte, $epique);

				// On ajoute ensuite les différentes personnes dans la distribution
				foreach ($personnes as $personne) {
					$this->pointManager->createRecoit($point_id, $personne);
				}

				// Envoie du message de succès
				$type_point = $this->pointManager->getOneType($point);
				$this->session->set_flashdata('add_point_success', 'Ajout d\'un point '.$type_point->typept_nom.'<br>'.$type_point->typept_success);
			}
			// Sinon transfère des erreurs
			elseif (is_array($checkForm))
				$this->session->set_flashdata('add_point_errors', $checkForm);
		}
		

		redirect('/timeline', 'refresh');
	}






	///////////////////////////////////////////////////////////////////////////
	//							FONCTIONS PRIVEES 							 //
	///////////////////////////////////////////////////////////////////////////

	/**
	 * 	@param 	$personnes 	Les personnes qui reçoivent le point
	 *	@param 	$point 		ID du type_point
	 *	@param 	$texte 		Description point
	 *	@param 	$donneur 	ID du profil qui donne le point
	 *	
	 * 	@return $res 		Retourne 0 si formualaire OK sinon le tableau d'erreurs
	 */
	private function _checkFormAddPoint($personnes=false, $point=false, $texte=false, $epique=false, $donneur=false, $date=false) {

		// Vérif des personnes
		if (is_null($personnes) OR !$personnes)
			$res[] = "Veuillez entrer une personne";
		else {
			if (is_array($personnes)) {
				foreach ($personnes as $key => $personne) {
					if (empty($personne)) {
						$res[] = "Les personnes sélectionnées sont dans un mauvais format";
						break;
					}
					elseif (!$this->pointManager->exist($personne)) {
						$res[] = "Des personnes sélectionnées n'existent pas";
						break;
					}
				}
			}
			else
				$res[] = "Arrête de faire n'importe quoi avec les formulaires...";
		}

		// Vérif du point
		if (is_null($point) OR !$point)
			$res[] = "Veuillez entrer un type de point";
		elseif (!$this->pointManager->typePointExist($point)) {
			$res[] = "Ce type de point n'existe pas";
		}

		// Vérif du texte de description
		if (is_null($texte) OR !$texte)
			$res[] = "Veuillez entrer une description";

		if (is_null($epique) OR !is_bool($epique))
			$res[] = "Veuiller dire si le point est épique ou non";

		// Vérif du donneur
		if (is_null($donneur) OR
				!$donneur OR
				!$this->pointManager->exist($donneur)
		) {
			$res[] = "Stope tes magouilles jeune branleur";
		}

		// Vérif de la date de l'évenement
		if (!(is_null($date) OR empty($date) OR !$date)) {
			if (!$this->_validateDate($date))
				$res[] = "La date n'est pas dans le bon format";
		}



		// Si pas d'erreurs on envoie 0 valeur de réussite
		if (!isset($res))
			$res = 0;

		return $res;
	}

	private function _validateDate($date) {
		// On regarde si le format est bien en aaaa-mm-jj et que la date existe
		if (preg_match('#^([0-9]{4})-([0-9]{2})-([0-9]{2})$#', $date, $checkDate) AND checkdate($checkDate[2], $checkDate[3], $checkDate[1])) 
			return true;
		else
			return false;
	}


	/**
	*	Verifie que les id données existent bien dans la BDD avant d'ajouter les points
	*	@param 	$personnes 		array of personnes
	*	@param 	$points 		point
	*	@return vrai si les id existent, false sinon
	*/
	private function _idExistInModel( $personnes = array(), $point = 0) {

		foreach ($personnes as $value) {
			if (!$this->profilManager->exist($value->profil_id)) {
				return false;
			}
		}

		if (!$this->pointManager->exist($point->typept_id)) {
			return false;
		}


		return true;
	}

}