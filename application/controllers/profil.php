<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {


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


	public function index()	{
		$this->load->view('profil/exemple.php');
	}



	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////

	
	/**
	*	Affiche la timeline d'une personne
	*
	*
	*/
	public function get($id){

		// check si l'id existe bien dans la BDD
		if ( !$this->profil_model->exist($id) ){
			show_404('page');
		}

		// général
		$data['profil'] = $this->profil_model->getOne($id);
		$data['points'] = $this->point_model->getAllPointsOf($id);

		/* Récupération des commentaires de chaque point */
		foreach ($data['points'] as $value) {
			$data['commentaires'][] = $this->commentaire_model->getCommentairePoint($value->point_id); 
		}

		

		// statistique
		$data['nbPoint'] 		= $this->profil_model->getNbPoint($id);
		$data['nbCommentaire'] 	= $this->profil_model->getNbCommentaire($id);

		// données du header
		$data['titre'] = "Profil de " . $data['profil'][0]->profil_nom;

		// chargement des vues
		$this->load->view('template/header.php', $data);
		$this->load->view('profil/view_profil.php', $data);
		$this->load->view('template/footer.php');
	}
}