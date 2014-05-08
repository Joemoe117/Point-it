<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct()	{
		parent::__construct();

		// Chargement des models
		$this->load->model('profil_model');
		$this->load->model('commentaire_model');
		$this->load->model('point_model');
	}



	public function index()
	{
		$this->login();
	}


	/**
	*	@return 	Affiche la page pour qu'un user se connecte
	*
	*/
	public function login() {

		// Si le formulaire a été envoyé
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Récupération des posts
			$login 		= $this->input->post('login');
			$password 	= $this->input->post('password');

			// Mise en place des règles de validation
			$this->form_validation->set_rules('login', 'Login', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');


			// Si validation ok
			if ($this->form_validation->run() == TRUE)	{
				$res = $this->profil_model->checkLogin( $login, $password );
			} else {
				//$this->load->view('formsuccess');
			}



			$res = $this->profil_model->checkLogin( $login, $password );

			// Vérification du login, renvoie true si la connexion a réussie
			if ( $res ) {

				// Mise en place des sessions
				$this->session->set_userdata('id', (int)$res->profil_id);
				$this->session->set_userdata('login', $res->profil_nom);
				$this->session->set_userdata('image', $res->profil_image);

				// Mise en place des cookies, pas encore utilisé
				set_cookie("id", $res->profil_id, 86500, "/");
				set_cookie("login", $res->profil_id, 86500, "/");
				set_cookie("image", $res->profil_id, 86500, "/");

				// redirection
				redirect('/timeline', 'refresh');
			}
			else { // TODO afficher le message d'erreur
				$data['error'][] = "Votre mot de passe ou votre login est invalide";
				echo $data['error'][0];
			}
		}

		// Récupération des statistiques général
		$data["nb_profil"] 		= $this->profil_model->count();
		$data["nb_point"] 		= $this->point_model->count(); 
		$data["nb_commentaire"] = $this->commentaire_model->count();

		// Initialisation du titre
		$data['titre'] = "Connexion";

		// Chargement des vues
		$this->load->view('template/header_logout.php', $data);
		$this->load->view('login/view_login.php', $data);
		$this->load->view('template/footer.php');	
	}


	/**
	*	@return 	déconnecte l'utilisateur
	*
	*/
	public function logout(){
		$this->session->sess_destroy();
		redirect('/login', 'location');
	}


	/**
	*	@return 	déconnecte l'utilisateur
	*
	*/
	public function _logout(){
		
	}


	public function hashpwd( $password ){



		$hashP = $this->password->create_hash($password);

		echo $hashP;
	}
}