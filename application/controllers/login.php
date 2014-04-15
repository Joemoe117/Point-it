<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct()	{
		parent::__construct();
		session_start();
		

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
	}


	public function logout(){
		redirect('/login', 'location');
	}

	/**
	*	@return 	permet de logger l'utilisateur
	*	@param  	login 	le login de l'utilisateur
	*	@param  	password le mot de passe de l'utilisateur
	*/
	public function _login(){

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