<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeline extends CI_Controller {



	public function __construct()	{
		parent::__construct();
		
		// Redirection si non connecté
		if ( !$this->session->userdata('id')){
			redirect('/login', 'location');
		}

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

		/* Génération des informations du formulaire */
		$data['form_point'] = $this->point_model->getAllType();
		$data['form_profil'] = $this->profil_model->getAll();
			
		/* Recupération des derniers points */
		$data['points'] = $this->point_model->getLastTwenty();

		$this->session->set_userdata('some_name', 'some_value');

		$this->load->view('timeline/view_timeline.php', $data	);

		$this->load->view('template/footer.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */