<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controlleur permettant de gérer les membres et l'affichage des profils, ainsi que leur configuration
 * @author ballanb
 * @version 1.0
 */
class Profil extends CI_Controller {

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
		$this->load->model('m_profil', "profilManager");
		$this->load->model('m_commentaire', "commentaireManager");
		$this->load->model('m_point', "pointManager");

	}

	/**
	 * Route qui renvoie par défaut sur le profil de la personne connecté
	 * @return [type]
	 */
	public function index()	{
		$this->get($this->session->userdata('id'));
	}



	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////

	
	/**
	 * Affiche le profil de la personne donnée en paramètre
	 * @param  $id 		
	 * 				l'id de la personne à affiche
	 * @return 
	 * 				Affiche le profil de l'id donné en param
	 * @author ballanb
	 */
	public function get($id){

		// check si l'id existe bien dans la BDD
		if ( !$this->profilManager->exist($id) ){
			show_404('page');
		}

		// général
		$data['profil'] = $this->profilManager->getOne($id);
		$data['points'] = $this->pointManager->getAllPointsOf($id);

		/* Récupération des commentaires de chaque point */
		foreach ($data['points'] as $value) {
			$data['commentaires'][$value->point_id] = $this->commentaireManager->getCommentairePoint($value->point_id); 
		}

		
		// statistique du profil
		$data['nbPoint'] 		= $this->profilManager->getNbPoint($id);
		$data['nbCommentaire'] 	= $this->profilManager->getNbCommentaire($id);
		$data['table_point']	= $this->profilManager->getNumberOfPointByType($id);

		// données du header
		$data['titre'] = "Profil de " . $data['profil']->profil_nom;
		$data['menu'] = "profil";

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
		$data['profil_nom'] = $this->profilManager->getOne($id, 'profil_nom')->profil_nom;
		$data['titre'] = 'Configuration du profil';
		$data['menu'] = 'profil';


		// Si le formulaire a été envoyé
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			//// Gestion du formulaire de l'AVATAR
			//////////////////////////////////////////////
			if ($this->input->post('form_name') == 'avatar') {

				// Constantes
				$avatar_max_size = '2000';
				$avatar_dimensions['width'] = 100;
				$avatar_dimensions['height'] = 100;
				$avatar_valide_extensions = 'jpg|jpeg|png|gif';
				$avatar_path = "./assets/images/avatars/".$id.'_'.$data['profil_nom'];
				if (!file_exists($avatar_path))
					mkdir($avatar_path, 0777, true);
				
				// renomme les fichiers
				$avatar_origin_name = 'origin.jpg';
				$avatar_resized_name = 'resized.jpg';

				// Détermine la config de "do_upload" pour vérifier le fichier
				$this->_clearDir($avatar_path);
				$config['upload_path'] = $avatar_path;
				$config['allowed_types'] = $avatar_valide_extensions;
				$config['file_name'] = $avatar_origin_name;
				$config['overwrite'] = true;
				$config['max_size']	= $avatar_max_size;


				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('avatar')) {
					$data['errors']['avatar'][] = "Erreur sur le fichier envoyé";
					$data['errors']['avatar'][] = $this->upload->display_errors();
				} else {
					$this->profilManager->setImage($id, base_url("/assets/images/avatars")."/".$id.'_'.$data['profil_nom'].'/'.$avatar_origin_name);
					$data['success']['avatar'] = "Votre image de profil a bien été enregistrée";
				}
			}

			//// Gestion du formulaire du NOUVEAU MOT DE PASSE
			//////////////////////////////////////////////
			elseif ($this->input->post('form_name') == 'new_password') {

				// Variables
				$pass_old = $this->input->post('old_pass');
				$pass_new = $this->input->post('new_pass');
				$pass_new_check = $this->input->post('new_pass_check');
				$pass_ok = true;

				if (!$this->profilManager->checkPass($id, $pass_old)) {
					$pass_ok = false;
					$data['errors']['new_password'][] = "Votre ancien mot de passe n'est pas correcte";
				}
				elseif ($pass_new !== $pass_new_check) {
					$pass_ok = false;
					$data['errors']['new_password'][] = "Vous avez mal confirmé votre nouveau mot de passe";
				}

				if ($pass_ok) {
					// Hashage et enregistrement du nouveau mot de passe
					$this->profilManager->setPass($id, $this->password->create_hash($pass_new));
					$data['success']['new_password'] = "Votre nouveau mot de passe a été enregistré";
				}

			}
		}

		// Chargement des vues
		$this->load->view('template/header.php', $data);
		$this->load->view('profil/view_config.php', $data);
		$this->load->view('template/footer.php');
	}

	














	/////////////////////////////////////////////////////////////////////////
	///							PRIVATE METHODS 						  ///
	/////////////////////////////////////////////////////////////////////////

	/**
	 * [_resizeImage description]
	 * @param  [type] $file_name  [description]
	 * @param  [type] $new_width  [description]
	 * @param  [type] $new_height [description]
	 * @return [type]             [description]
	 */
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

	/**
	 * [_clearDir description]
	 * @param  [type]  $dir    [description]
	 * @param  boolean $delete [description]
	 * @return [type]          [description]
	 */
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