<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controlleur permettant de gérer l'authentification et la déconnexion d'un utilisateur
 */
class Login extends CI_Controller {

	// Question antibot et sa réponse
	const ANTIBOT_QUESTION = 'Que va-t-on faire, souvent à plusieurs, après avoir bu des bières ?';
	const ANTIBOT_REPONSE = 'miossec';

	public function __construct()	{
		parent::__construct();

		// Chargement des models
		$this->load->model('profil_model');
		$this->load->model('commentaire_model');
		$this->load->model('point_model');
	}


	/**
	 * Route par défaut qui renvoie sur la page d'accueil
	 * @return
	 */
	public function index()	{
		$this->login();
	}


	/**
	*	@return 
	*				Affiche la page pour qu'un user se connecte
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
				set_cookie("login", $res->profil_nom, 86500, "/");
				set_cookie("image", $res->profil_image, 86500, "/");

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
	* 	Déconnecte l'utilisateur connecté en détruisant la session
	*	@return 	
	*				Déconnecte l'utilisateur
	*
	*/
	public function logout(){
		$this->session->sess_destroy();
		redirect('/login', 'location');
	}


	/**
	 * Inscrit un utilisateur au site si les données fournies en paramètres sont correctes
	 * @return [type]
	 */
	public function inscription() {
		// Si l'utilisateur est déjà connecté le rediriger vers la timeline
		if ($this->session->userdata('id'))
			redirect('/timeline', 'refresh');

		$data['titre'] = 'Inscription';
		$data['antibot_question'] = self::ANTIBOT_QUESTION;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$login = $this->input->post('login');
			$pass = $this->input->post('pass');
			$pass_check = $this->input->post('pass_check');
			$antibot_reponse = $this->input->post('antibot_reponse');

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
			// Vérif question antibot
			elseif (strtolower($antibot_reponse) != self::ANTIBOT_REPONSE) {
				$data['errors']['antibot_reponse'] = "C'est pas la bonne réponse, ça commence par un M";
				$data['retry']['login'] = $login;
				$data['retry']['pass'] = $pass;
				$data['retry']['pass_check'] = $pass_check;
				$data['retry']['antibot_reponse'] = $antibot_reponse;
			}


			// Formulaire bon
			if (!isset($data['errors'])) {

				// captitalizze first letter of login
				$login = ucfirst($login);

				$id = $this->profil_model->create($login, $this->password->create_hash($pass), false);

				// Mise en place des sessions
				$this->session->set_userdata('id', $id);
				$this->session->set_userdata('login', $login);
				$this->session->set_userdata('image', null);

				// Mise en place des cookies, pas encore utilisé
				set_cookie("id", $id, 186500, "/");
				set_cookie("login", $login, 186500, "/");
				set_cookie("image", null, 186500, "/");

				$this->session->set_flashdata('first_visit', true);

				// création du dossier pour les photos
				mkdir(base_url("/assets/images/avatars")."/".$id.'_'.$login, 0777, true);

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
	public function hashpwd( $password ){
		$hashP = $this->password->create_hash($password);
		echo $hashP;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */