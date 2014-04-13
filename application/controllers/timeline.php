<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeline extends CI_Controller {



	public function __construct()	{
		parent::__construct();
		session_start();
		

		// Chargement des models
		//$this->load->model('profil_model');

		// Chargement header
		$this->load->view('template/header.php');
	}




	public function index()
	{
		$this->retrieve();
	}


	/**
	*	@return 	affiche la timeline des 20 derniers points distribuées
	*
	*
	*/
	public function retrieve(){


		$this->load->view('timeline/exemple.php');

		$this->load->view('template/footer.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */