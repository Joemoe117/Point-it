<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commentaire extends CI_Controller {



	public function __construct()	{
		parent::__construct();
		
		// Redirection si non connecté
		if ( !$this->session->userdata('id')){
			redirect('/login', 'location');
		}

		// Chargement des models
		$this->load->model('commentaire_model');

		// Chargement header
		$this->load->view('template/header.php');
	}

	/**
	*	@return 	ajoute un commentaire à un point donné
	*	@param 		id  	l'id du point auquel on veut ajouter un commentaire
	*
	*/
	public function ajouterCommentaire(){

		$profil_id 	= $this->session->userdata('id');
		$point_id	= $this->input->post('point_id', TRUE);
		$texte 		= $this->input->post('commentaire', TRUE);

		$res = $this->commentaire_model->create( $point_id, $profil_id, $texte);

		redirect('/timeline', 'location');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */