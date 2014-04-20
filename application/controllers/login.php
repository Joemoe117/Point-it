<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct()	{
		parent::__construct();

		// Chargement des models
		$this->load->model('profil_model');

	}



	public function index()
	{
		$this->login();
	}


	/**
	*	@return 	Affiche la page pour qu'un user se connecte
	*
	*/
	public function login(){
	
		$this->load->view('template/header_logout.php');
		$this->load->view('login/view_login.php');
		$this->load->view('template/footer.php');

		// récupération des posts
		$login 		= $this->input->post('login');
		$password 	= $this->input->post('password');

		// vérification du login, renvoie true si la connexion a réussie
		$res = $this->profil_model->checkLogin( $login, $password );

		// connexion réussie
		if ( $res != false ) {

			// Mise en place des sessions
			foreach ($res as $value) {
				$this->session->set_userdata('id', $value->profil_id);
				$this->session->set_userdata('login', $value->profil_nom);
				$this->session->set_userdata('image', $value->profil_image);
			}

			// Mise en place des cookies, pas encore utilisé
			set_cookie("id", $value->profil_id, 86500, "/");
			set_cookie("login", $value->profil_id, 86500, "/");
			set_cookie("image", $value->profil_id, 86500, "/");

			// redirection
			redirect('/timeline', 'refresh');
		}
	}


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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */