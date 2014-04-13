<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('template/header.php');

		// TODO
		$this->load->view('profil/exemple.php');


		$this->load->view('template/footer.php');
	}


	/**
	*	@return 	Affiche le profil d'un utilisateur
	*	@param 		id 		l'id de la personne à récupérer
	*
	*/
	public function get($id){

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