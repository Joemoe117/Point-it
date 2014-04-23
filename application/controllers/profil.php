<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {


	public function __construct()	{
		parent::__construct();

		// Redirection si non connecté
		if ( !$this->session->userdata('id')){
			redirect('/login', 'location');
		}
		

		// Chargement des models
		$this->load->model('profil_model');
		$this->load->model('point_model');
		$this->load->model('commentaire_model');

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

	/**
	*	Affiche la timeline d'une personne
	*
	*
	*/
	public function get($id){

		// général
		$data['profil'] = $this->profil_model->getOne($id);
		$data['points'] = $this->point_model->getLastTwentyOf($id);
		$data['commentaires'] = $this->commentaire_model->getLastTwentyPointsOf($id);


		// statistique
		$data['nbPoint'] 		= $this->profil_model->getNbPoint($id);
		$data['nbCommentaire'] 	= $this->profil_model->getNbCommentaire($id);

		// chargement des vues
		$this->load->view('profil/view_profil.php', $data);
		$this->load->view('template/footer.php');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */