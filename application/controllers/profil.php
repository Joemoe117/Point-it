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


	/**
	 *	Configurer son profil
	 *
	 *
	 */

	public function config() {
		// Récupération des informations générales
		$id = $this->session->userdata('id');
		$data['profil_nom'] = $this->profil_model->getOne($id, 'profil_nom')[0]->profil_nom;
		$data['titre'] = 'Configuration du profil';

		// Constantes
		$avatar_max_size = 10000000;
		$avatar_max_dimensions[0] = 180;
		$avatar_max_dimensions[1] = 180;
		$avatar_valide_extensions = ['jpg', 'jpeg', 'png', 'gif'];


		// Si le formulaire a été envoyé
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// Gestion du formulaire de l'avatar
			if ($this->input->post('form_name') == 'avatar') {
				$avatar = $this->input->file('avatar');
				// Erreur de transfert
				if ($avatar['error'] != UPLOAD_ERR_OK) {
					if ($avatar['error'] == UPLOAD_ERR_NO_FILE)
						$data['errors']['avatar'][] = 'Aucun fichier n\'a été téléchargé';
					else
						$data['errors']['avatar'][] = 'Le téléchargement de votre fichier a échoué... Veuillez recommencer ou contacter un admin';					
				}
				// Vérifications du fichier
				else {
					// Taille
					if ($avatar['size'] > $max_avatar_size)
						$data['errors']['avatar'][] = 'La taille du fichier est trop grande';

					// Extension
					$avatar_extension = strtolower(substr(strrchr($avatar['name'], '.'))); // Choppe l'extension sans le . et en minuscule
					if (!in_array($avatar_extension, $avatar_valide_extensions))
						$data['errors']['avatar'][] = 'L\'extension n\'est pas correcte';

					// Dimensions de l'image
					$avatar_dimensions = getimagesize($avatar['tmp_name']);
					if ($avatar_dimensions[0] > $avatar_max_dimensions[0] OR $avatar_dimensions[1] > $avatar_max_dimensions[1])
						$data['errors']['avatar'][] = 'Les dimensions de l\'image sont trop grandes';

				}
			}
		}

		


		// Chargement des vues
		$this->load->view('template/header.php', $data);
		$this->load->view('profil/view_config.php', $data);
		$this->load->view('template/footer.php');
	}
}