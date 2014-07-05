<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct()	{
		parent::__construct();

		// Chargement des models
		$this->load->model('profil_model');
		$this->load->model('commentaire_model');
		$this->load->model('point_model');
	}



	public function index()	{
		$this->login();
	}


	/**
	*	@return Affiche la page pour qu'un user se connecte
	*
	*/
	public function login() {
		// Si l'utilisateur est déjà connecté le rediriger vers la timeline
		if ($this->session->userdata('id'))
			redirect('/timeline', 'refresh');

		// Si le formulaire a été envoyé
		if($_SERVER['REQUEST_METHOD'] == 'POST') {

			// Récupération des posts
			$login 		= $this->input->post('login');
			$password 	= $this->input->post('password');
			$res = FALSE;


			// Mise en place des règles de validation
			$this->form_validation->set_rules('login', 'Login', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');


			// Si validation ok
			if ($this->form_validation->run() == TRUE)	{
				$res = $this->profil_model->checkLogin( $login, $password );
			}


			// Vérification du login, renvoie true si la connexion a réussie
			if ($res) {

				// Mise en place des sessions
				$this->session->set_userdata('id', $res->profil_id);
				$this->session->set_userdata('login', $res->profil_nom);
				$this->session->set_userdata('image', $res->profil_image);

				// Mise en place des cookies, pas encore utilisé
				set_cookie("id", $res->profil_id, 86500, "/");
				set_cookie("login", $res->profil_id, 86500, "/");
				set_cookie("image", $res->profil_id, 86500, "/");

				// Redirection vers la timeline
				redirect('/timeline', 'refresh');


			} else {
				$data['errors'][] = "Votre mot de passe ou votre login est invalide";
			}
		}

		// Sinon afficher la page d'accueil

		// Récupération des statistiques général
		$data["nb_profil"] 		= $this->profil_model->count();
		$data["nb_point"] 		= $this->point_model->count(); 
		$data["nb_commentaire"] = $this->commentaire_model->count();

		// Chargement des vues
		$data['titre'] = "Connexion";
		$this->load->view('template/header_logout.php', $data);
		$this->load->view('login/view_login.php', $data);
		$this->load->view('template/footer.php');	
	}


	/**
	*	@return 	Déconnecte l'utilisateur
	*
	*/
	public function logout(){
		$this->session->sess_destroy();
		redirect('/login', 'location');
	}


	/**
	 *	Inscription
	 *
	 *
	 */
	public function inscription() {
		// Si l'utilisateur est déjà connecté le rediriger vers la timeline
		if ($this->session->userdata('id'))
			redirect('/timeline', 'refresh');

		$data['titre'] = 'Inscription';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$login = $this->input->post('login');
			$pass = $this->input->post('pass');
			$pass_check = $this->input->post('pass_check');

			// Vérif nom dispo
			if ($this->profil_model->existNom($login)) {
				$data['errors']['login'] = "Quelqu'un a déjà pris ce nom ou t'as usurpé";
				$data['retry']['login'] = $login;
			}
			// Vérif mots de passes similaires
			elseif ($pass != $pass_check) {
				$data['errors']['pass'] = "Tu fais donc partie des gens pas doués, ton mot de passe est mal confirmé";
				$data['retry']['login'] = $login;
			}


			// Formulaire bon
			if (!isset($data['errors'])) {
				$id = $this->profil_model->create($login, $this->password->create_hash($pass), false);

				// Mise en place des sessions
				$this->session->set_userdata('id', $id);
				$this->session->set_userdata('login', $login);
				$this->session->set_userdata('image', null);

				// Mise en place des cookies, pas encore utilisé
				set_cookie("id", $id, 86500, "/");
				set_cookie("login", $login, 86500, "/");
				set_cookie("image", null, 86500, "/");

				$this->session->set_flashdata('first_visit', true);

				// Redirection vers la timeline
				redirect('/timeline', 'refresh');
			}
		}

		$this->load->view('template/header_logout.php', $data);
		$this->load->view('login/view_inscription.php');
		$this->load->view('template/footer.php');
	}


	/**
	* @return Hashage du mot de passe
	*
	*/
	private function hashpwd( $password ){
		$hashP = $this->password->create_hash($password);
		echo $hashP;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */