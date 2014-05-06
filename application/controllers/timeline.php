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
		$data['points'] = $this->point_model->getLastTwenty();

		/* Récupération des commentaires de chaque point */
		foreach ($data['points'] as $key => $value) {
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
		$texte	 		= $this->input->post('texte_point', true);
		$donneur 		= $this->session->userdata('id');

		// TODO vérifier les données
		// utilisser et écrire la fonction privée _checkFormulaireAjoutPoint
	 	
		$formOk = $this->_checkFormulaireAjoutPoint( $personnes, $point, $texte );


		// Si le formulaire est rempli correctement
		if ( $formOk == true ){
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
			echo "Rempli bien le formulaire tocard";
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */