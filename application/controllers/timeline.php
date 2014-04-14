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
		$res = $this->point_model->getAllType();

		foreach ($res as $value){
			$data['point_id'][] 	= $value->id;
			$data['point_nom'][]	= $value->nom;
		}

		$this->load->view('timeline/exemple.php', $data	);

		$this->load->view('template/footer.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */