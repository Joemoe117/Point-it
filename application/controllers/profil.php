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


		// Si le formulaire a été envoyé
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// Gestion du formulaire de l'AVATAR
			if ($this->input->post('form_name') == 'avatar') {

				// Constantes
				$avatar_max_size = '2000';
				// $avatar_max_dimensions['width'] = '180';
				// $avatar_max_dimensions['height'] = '180';
				$avatar_dimensions['width'] = 100;
				$avatar_dimensions['height'] = 100;
				$avatar_valide_extensions = 'jpg|jpeg|png|gif';
				$avatar_path = './assets/images/avatars/'.$id.'_'.$data['profil_nom'];
				$avatar_origin_name = 'origin';
				$avatar_resized_name = 'resized';

				// Détermine la config de "do_upload" pour vérifier le fichier
				$this->_clearDir($avatar_path);
				$config['upload_path'] = $avatar_path;
				$config['allowed_types'] = $avatar_valide_extensions;
				$config['file_name'] = $avatar_origin_name;
				$config['overwrite'] = true;
				$config['max_size']	= $avatar_max_size;
				// $config['max_width']  = $avatar_max_dimensions['width'];
				// $config['max_height']  = $avatar_max_dimensions['height'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('avatar')) {
					$data['errors']['avatar'][] = "Erreur sur le fichier envoyé";
					$data['errors']['avatar'][] = $this->upload->display_errors();
				}
				else {

					$data['success']['avatar'] = "Votre image de profil a bien été enregistrée";

					// if ($this->_resizeImage($avatar_path.'/'.$avatar_origin_name, $avatar_dimensions['width'], $avatar_dimensions['height']))
					// 	$data['success']['avatar'] = "Votre image de profil a bien été enregistrée";
					// else
					// 	$data['errors']['avatar'][] = "Erreur de création de l'image... Contactez l'administrateur";
				}
			}

			// Gestion du formulaire du NOUVEAU MOT DE PASSE
			elseif ($this->input->post('form_name') == 'new_password') {

				// Variables
				$pass_old = $this->input->post('old_pass');
				$pass_new = $this->input->post('new_pass');
				$pass_new_check = $this->input->post('new_pass_check');
				$pass_ok = true;

				if (!$this->profil_model->checkPass($id, $pass_old)) {
					$pass_ok = false;
					$data['errors']['new_password'][] = "Votre ancien mot de passe n'est pas correcte";
				}
				elseif ($pass_new !== $pass_new_check) {
					$pass_ok = false;
					$data['errors']['new_password'][] = "Vous avez mal confirmé votre nouveau mot de passe";
				}

				if ($pass_ok) {
					// Hashage et enregistrement du nouveau mot de passe
					$this->profil_model->setPass($id, $this->password->create_hash($pass_new));
					$data['success']['new_password'] = "Votre nouveau mot de passe a été enregistré";
				}

			}
		}

		// Chargement des vues
		$this->load->view('template/header.php', $data);
		$this->load->view('profil/view_config.php', $data);
		$this->load->view('template/footer.php');
	}

	// PRIVATE MÉTHODES

	private function _resizeImage($file_name, $new_width, $new_height) {

		list($width, $height) = getimagesize($file_name);

		if($width > $height && $new_height < $height)
			$new_height = $height / ($width / $new_width);
		else if ($width < $height && $new_width < $width)
			$new_width = $width / ($height / $new_height);   
		else {
			$new_width = $width;
			$new_height = $height;
		}

		$thumb = imagecreatetruecolor($new_width, $new_height);
		$source = imagecreatefromjpeg($file_name);
		imagecopyresized($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

		return imagejpeg($thumb);
	}

	private function _clearDir($dir, $delete = false) {
		$dossier = $dir;
		$dir = opendir($dossier);
		while($file = readdir($dir)) {
			if(!in_array($file, array(".", ".."))) {
				if(is_dir("$dossier/$file"))
					clear_dir("$dossier/$file", true);
				else
					unlink("$dossier/$file");
			}
		}
		closedir($dir);
		
		if($delete == true) {
			rmdir("$dossier/$file");
		}
}
}