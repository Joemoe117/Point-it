<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct()	{
		parent::__construct();
		session_start();
		

		// Chargement des models
		$this->load->model('profil_model');

		// Chargement header
		$this->load->view('template/header.php');
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
	
		$this->load->view('login/login.php');

		$this->load->view('template/footer.php');
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