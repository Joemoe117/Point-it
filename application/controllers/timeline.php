<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeline extends CI_Controller {



	public function __construct()	{
		parent::__construct();
		
		// Redirection si non connecté
		if ( !$this->session->userdata('id')){
			redirect('/login', 'location');
		}

		// Chargement des models
		$this->load->model('profil_model');
		$this->load->model('point_model');
		$this->load->model('commentaire_model');

		
	}




	public function index()
	{
		$this->retrieve();
	}


	/**
	*	@return 	affiche la timeline des 20 derniers points distribuées
	*
	*
	*/
	public function retrieve(){

		/* Génération des informations du formulaire */
		$data['form_point'] = $this->point_model->getAllType();
		$data['form_profil'] = $this->profil_model->getAll();
			
		/* Recupération des derniers points */
		$data['points'] = $this->point_model->getAllPoints();

		/* Récupération des commentaires de chaque point */
		foreach ($data['points'] as $value) {
			$data['commentaires'][] = $this->commentaire_model->getCommentairePoint($value->point_id); 
		}

		$data['titre'] = "Timeline";

		// chargement des vues
		$this->load->view('template/header.php', $data);
		$this->load->view('timeline/view_timeline.php', $data	);
		$this->load->view('template/footer.php');
	}


	/**
	*	Permet de rajouter un point
	*
	*
	*/
	public function create(){
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Récupération des posts
			$personnes 		= (int)$this->input->post('personnes');
			$point 			= (int)$this->input->post('point');
			$texte	 		= nl2br($this->input->post('texte_point'));
			$donneur 		= (int)$this->session->userdata('id');

			// Vérification des Posts
			if (isset($personnes) AND !empty($personnes)) {
				foreach ($personnes as $personne) {
					if (!is_int($personne)) {
						$data['errors'][] = "Personnes invalide";
						break;
					}
				}				
			}
			else
				$data['errors'][] = "Personnes invalide";

			if (!isset($point) OR !is_int($point))
				$data['errors'][] = "Point invalide";
			if (!isset($texte) OR !is_string($texte))
				$data['errors'][] = "Texte invalide";
			if (!isset($donneur) OR !is_int($donneur))
				$data['errors'][] = "Donneur invalide";


			// Si le formulaire est rempli correctement
			if (!isset($data['errors'])) {
				// On créér d'abord le point
				$point_id = $this->point_model->createPoint( $point, $donneur, $texte);

				// On ajoute ensuite les différentes personnes dans la distribution
				foreach ($personnes as $personne) {
					$this->point_model->createRecoit( $point_id, $personne );
				}
			}
			else {
				foreach ($data['errors'] as $error) {
					echo $error;
				}
			}

			// "rafraichissement" de la page
			// redirect('/timeline', 'refresh');
			
		}			
	}


	///////////////////////////////////////////////////////////////////////////
	//							FONCTIONS PRIVEES 							 //
	///////////////////////////////////////////////////////////////////////////

	// TODO améliorer la vérification
	public function _checkFormulaireAjoutPoint( $personnes, $point, $texte ){

	 	if ( $personnes == null || $point == null || $texte == null ){
	 		return false;
	 	}
	 	
		return true;
	}

}