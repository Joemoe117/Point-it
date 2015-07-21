<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Login
 * Manage login/logout/creating new user
 */
class Login extends CI_Controller {

	// Question antibot et sa réponse
	const ANTIBOT_QUESTION = 'Que va-t-on faire, souvent à plusieurs, après avoir bu des bières ?';
	const ANTIBOT_REPONSE = 'miossec';

    /**
     * Constructor
     */
	public function __construct()	{
		parent::__construct();

		// Chargement des models
		$this->load->model('m_profil', "profilManager");
		$this->load->model('m_commentaire', "commentaireManager");
		$this->load->model('m_point', "pointManager");
	}


  /**
   * Default route
   */
	public function index()	{
		$this->login();
	}


    /**
     * Connect a user to the website
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
			$valid = FALSE;


			// Validation rules
			$this->form_validation->set_rules('login', 'Login', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');


			// Si validation ok
			if ($this->form_validation->run() == TRUE)	{
				$valid = $this->profilManager->checkLogin( $login, $password );
			}

			// Vérification du login, renvoie true si la connexion a réussie
			if ($valid) {
		        // set the last connection of the user
		        $this->profilManager->setLastConnection($valid->profil_id);

				// Mise en place des sessions
				$this->session->set_userdata('id', $valid->profil_id);
				$this->session->set_userdata('login', $valid->profil_nom);
				$this->session->set_userdata('image', $valid->profil_image);

				// Redirection vers la timeline
				redirect('/timeline', 'refresh');

			} else {
				$data['errors'][] = "Votre mot de passe ou votre login est invalide";
			}
		}

		// Sinon afficher la page d'accueil

		// Récupération des statistiques général
		$data["nb_profil"] 		= $this->profilManager->count();
		$data["nb_point"] 		= $this->pointManager->count();
		$data["nb_commentaire"] = $this->commentaireManager->count();

		// Chargement des vues
		$data['titre'] = "Connexion";
		$this->load->view('template/header_logout.php', $data);
		$this->load->view('login/view_login.php', $data);
		$this->load->view('template/footer.php');
	}


    /**
     * Disconnect a user from the website
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
			if ($this->profilManager->existNom($login)) {
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

				$id = $this->profilManager->create($login, $this->password->create_hash($pass), false);

				// Mise en place des sessions
				$this->session->set_userdata('id', $id);
				$this->session->set_userdata('login', $login);
				$this->session->set_userdata('image', null);

				// Mise en place des cookies, pas encore utilisé
				set_cookie("id", $id, 9986500, "/");
				set_cookie("login", $login, 9986500, "/");
				set_cookie("image", null, 9986500, "/");

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
     * return a hashed password
     * Only use for debug or changing the password of a user
     * @param $password
     */
	public function hashpwd( $password ){
		$hashP = $this->password->create_hash($password);
		echo $hashP;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
