<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {


	public function __construct()	{
		parent::__construct();
		session_start();
		

		// Chargement des models
		$this->load->model('profil_model');

		// Chargement header
		$this->load->view('template/header.php');
	}


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
		

		// TODO
		$this->load->view('profil/exemple.php');


		
	}

	public function get($id){

		$res = $this->profil_model->getOne($id);

		foreach ($res as $value){
			$data['id'] 	= $value->id;
			$data['nom'] 	= $value->nom;
		}

		$this->load->view('profil/exemple.php', $data);



		$this->load->view('template/footer.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */