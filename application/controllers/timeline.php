<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeline extends CI_Controller {



	public function __construct()	{
		parent::__construct();
		
		// Redirection si non connecté
		if (!$this->session->userdata('id')){
			redirect('/login', 'location');
		}

		// Chargement des models
		$this->load->model('profil_model');
		$this->load->model('point_model');
		$this->load->model('commentaire_model');

		
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
		$initNbPoints = 5;

		/* Génération des informations du formulaire */
		$data['form_point'] = $this->point_model->getAllType();
		$data['form_profil'] = $this->profil_model->getAll();
			
		/* Recupération des $initNbPoints derniers points et des commentaires de chaque point */
		$data['points'] = $this->point_model->getAllPoints($initNbPoints);
		foreach ($data['points'] as $value) {
			$data['commentaires'][] = $this->commentaire_model->getCommentairePoint($value->point_id); 
		}

		
		// chargement des vues
		$data['titre'] = "Timeline";
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
		$data['points'] = $this->point_model->getAllPoints($nb, $limit);
		foreach ($data['points'] as $value) {
			$data['commentaires'][] = $this->commentaire_model->getCommentairePoint($value->point_id); 
		}
		$this->load->view('timeline/view_affiche_points.php', $data);
	}


	public function add_point() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			echo "POST<br>";
			var_dump($this->input->post());

			// récupération du Post
			$personnes 		= $this->input->post('personnes', true);
			$point 			= $this->input->post('point', true);
			$texte	 		= nl2br($this->input->post('texte_point', true)); // Ajoute un <br> pour chaque retour à la ligne
			$donneur 		= $this->session->userdata('id');

			$checkForm = $this->_checkFormAddPoint($personnes, $point, $texte, $donneur);

			// Si $checkForm vaut 0 Alors le formulaire est bon
			if ($checkForm === 0) {
				// On créér d'abord le point
				$point_id = $this->point_model->createPoint( $point, $donneur, $texte);

				// On ajoute ensuite les différentes personnes dans la distribution
				foreach ($personnes as $personne) {
					$this->point_model->createRecoit($point_id, $personne);
				}
			}
			// Sinon stockage des erreurs
			elseif (is_array($checkForm)) {
				$data['errors'] = $checkForm;
			}

			// TODO transférer les erreurs vers la timeline
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
	public function _checkFormAddPoint($personnes=null, $point=null, $texte=null, $donneur=null) {

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
					elseif (!$this->profil_model->exist($personne)) {
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
		elseif (!$this->point_model->typePointExist($point)) {
			$res[] = "Ce type de point n'existe pas";
		}

		// Vérif du texte de description
		if (is_null($texte) OR !$texte)
			$res[] = "Veuillez entrer une description";

		// Vérif du donneur
		if (is_null($donneur) OR
				!$donneur OR
				!$this->profil_model->exist($donneur)
		) {
			$res[] = "Qui t'as dit de toucher aux cookies ?";
		}

		// Si pas d'erreurs on envoie 0 valeur de réussite
		if (!isset($res))
			$res = 0;

		var_dump($res);
		return $res;
	}


	/**
	*	Verifie que les id données existent bien dans la BDD avant d'ajouter les points
	*	@param 	$personnes 		array of personnes
	*	@param 	$points 		point
	*	@return vrai si les id existent, false sinon
	*/
	public function idExistInModel( $personnes = array(), $point = 0) {

		foreach ($personnes as $value) {
			if (!$this->profil_model->exist($value->profil_id)) {
				return false;
			}
		}

		if (!$this->point_model->exist($point->typept_id)) {
			return false;
		}


		return true;
	}

}