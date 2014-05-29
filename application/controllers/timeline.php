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

		// Récupération des posts
		$personnes 		= $this->input->post('personnes', true);
		$point 			= $this->input->post('point', true);
		$texte	 		= nl2br($this->input->post('texte_point', true));
		$donneur 		= $this->session->userdata('id');


		$formOk = $this->_checkFormulaireAjoutPoint( $personnes, $point, $texte );

		

		// Si le formulaire est rempli correctement
		if ( $formOk == true ){

			// Vérification dans le modèle que les personnes existent bien
			if ( $this->idExistInModel( $personnes, $point) ) {
				show_404('page');
			}
			// On créér d'abord le point
			$point_id = $this->point_model->createPoint( $point, $donneur, $texte);

			// On ajoute ensuite les différentes personnes dans la distribution
			foreach ($personnes as $personne) {
				$this->point_model->createRecoit( $point_id, $personne );
			}

			// "rafraichissement" de la page
			redirect('/timeline', 'refresh');
		} else {
			// TODO afficher un message d'erreur
			show_404('page');
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



	/**
	*	Verifie que les id données existent bien dans la BDD avant d'ajouter les points
	*	@param 	$personnes 		array of personnes
	*	@param 	$points 		point
	*	@return vrai si les id existent, false sinon
	*/
	public function idExistInModel( $personnes = array(), $point = 0){

		foreach ($personnes as $value) {
			if ( !$this->profil_model->exist($value->profil_id) ){
				return false;
			}
		}

		if ( !$this->point_model->exist($point->typept_id) ){
			return false;
		}


		return true;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */