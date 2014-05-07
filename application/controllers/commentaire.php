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
	public function ajouterCommentaireAjax(){
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$profil_id = $this->session->userdata('id');
			$point_id = $this->input->post('point_id');
			$texte = nl2br($this->input->post('commentaire'));

			// Vérification du post
			if (isset($profil_id) AND is_int($profil_id))
				$data['errors'][] = "Profil invalide";
			if (isset($point_id) AND is_int($point_id))
				$data['errors'][] = "Point invalide";
			if (isset($texte) AND is_string($texte))
				$data['errors'][] = "Commentaire invalide";

			// Si pas d'erreur, créer le commentaire
			if (!isset($data['errors'])) 
				$res = $this->commentaire_model->create($point_id, $profil_id, $texte);

			redirect('/timeline', 'location');
		}
	}





	public function create(){
		$profil_id 	= $this->session->userdata('id');
		$point_id	= $this->input->post('point_id', TRUE);
		$texte 		= $this->input->post('commentaire', TRUE);

		// TODO vérifier les champs
		echo now();
		$res = $this->commentaire_model->create( $point_id, $profil_id, $texte);

		redirect('/timeline', 'location');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */