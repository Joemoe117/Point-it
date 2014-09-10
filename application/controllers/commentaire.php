<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controleur gérant les commentaires
 * @author ballanb
 */
class Commentaire extends CI_Controller {


	/**
	 * Constructeur
	 */
	public function __construct()	{
		parent::__construct();
		
		// Redirection si non connecté
		if ( !$this->session->userdata('id')){
			redirect('/login', 'location');
		}

		// Chargement des models
		$this->load->model('commentaire_model', "commentaireManager");

		// Chargement header
		$this->load->view('template/header.php');
	}

	/**
	 * Ajoute un commentaire
	 * @return 
	 */
	public function create(){
		$profil_id 	= $this->session->userdata('id');
		$point_id	= $this->input->post('point_id', TRUE);
		$texte 		= $this->input->post('commentaire', TRUE);

		// TODO vérifier les champs
		$res = $this->commentaireManager->create( $point_id, $profil_id, $texte);

		redirect('/timeline', 'location');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/commentaire.php */