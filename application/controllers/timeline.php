<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeline extends CI_Controller {



	public function __construct()	{
		parent::__construct();
		session_start();
		

		// Chargement des models
		$this->load->model('profil_model');
		$this->load->model('point_model');

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


		/* Génération du formulaire */
		$data['form_point'] = $this->point_model->getAllType();
		$data['form_profil'] = $this->profil_model->getAll();
			

		$this->load->view('timeline/exemple.php', $data	);

		$this->load->view('template/footer.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */